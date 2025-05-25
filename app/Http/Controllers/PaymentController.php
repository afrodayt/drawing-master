<?php
namespace App\Http\Controllers;
use GuzzleHttp\Client;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function createCheckoutSession(Request $request)
    {
        try {
            // Преобразование eventId в строку перед валидацией
            $request->merge([
                'eventId'        => (string) $request->eventId,
                'eventName'      => $request->eventName ?? '',
                'eventDate'      => $request->eventDate ?? '',
                'eventTime'      => $request->eventTime ?? '',
                'eventLocation'  => $request->eventLocation ?? '',
                'security_nonce' => $request->securityNonce ?? '',
            ]);

            $validated = $request->validate([
                'price'          => 'required|numeric',
                'eventId'        => 'required|integer',
                'eventName'      => 'required|string',
                'eventDate'      => 'required|date',
                'eventTime'      => 'required|string',
                'eventLocation'  => 'required|string',
                'name'           => 'required|string',
                'email'          => 'required|email',
                'phone'          => 'required|string',
                'message'        => 'nullable|string',
                'security_nonce' => 'nullable|string',
            ]);

            $stripeSecret = config('services.stripe.secret');
            if (empty($stripeSecret)) {
                throw new \Exception("Stripe secret key is not configured.");
            }

            Stripe::setApiKey($stripeSecret);

            $frontendUrl = config('app.frontend_url');
            if (empty($frontendUrl)) {
                throw new \Exception("Frontend URL (FRONTEND_URL) is not configured.");
            }

            // Подготовка метаданных
            $metadata = [
                'event_id'       => $validated['eventId'],
                'name'           => $validated['name'],
                'email'          => $validated['email'],
                'phone'          => $validated['phone'] ?? '',
                'message'        => $validated['message'] ?? '',
                'price'          => $validated['price'],
                'eventName'      => $validated['eventName'],
                'eventDate'      => $validated['eventDate'],
                'eventTime'      => $validated['eventTime'],
                'eventLocation'  => $validated['eventLocation'],
                'security_nonce' => $validated['security_nonce'], // Добавляем в метаданные
            ];

            // Замена % на Every для даты события
            if ($metadata['eventDate'] === '%') {
                $metadata['eventDate'] = 'Every';
            }

            // Санитизация метаданных
            $metadata = array_map(function ($value) {
                return is_string($value) ? strip_tags($value) : $value;
            }, $metadata);

            Log::debug('Creating Stripe session with metadata:', $metadata);

            // Создаем запись в leads перед сессией Stripe
            $lead = Lead::create([
                'name'           => $validated['name'],
                'email'          => $validated['email'],
                'phone'          => $validated['phone'] ?? null,
                'message'        => $validated['message'] ?? null,
                'event_id'       => $validated['eventId'],
                'event_name'     => $validated['eventName'],
                'event_date'     => $validated['eventDate'],
                'event_time'     => $validated['eventTime'],
                'event_location' => $validated['eventLocation'],
                'event_price'    => $validated['price'],
                'payment_status' => 'pending',
                'security_nonce' => $validated['security_nonce'],
            ]);

            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items'           => [[
                    'price_data' => [
                        'currency'     => 'cad',
                        'product_data' => [
                            'name'        => $validated['eventName'] ?: 'Event #' . $validated['eventId'],
                            'description' => $this->buildEventDescription($validated),
                        ],
                        'unit_amount'  => (int) round($validated['price'] * 100),
                    ],
                    'quantity'   => 1,
                ]],
                'mode'                 => 'payment',
                'success_url'          => $frontendUrl . '/thank-you?session_id={CHECKOUT_SESSION_ID}&lead_id=' . $lead->id,
                'cancel_url'           => $frontendUrl . '/?canceled=true',
                'customer_email'       => $validated['email'],
                'metadata'             => array_merge($metadata, [
                    'lead_id' => $lead->id, // Добавляем ID лида в метаданные Stripe
                ]),
            ]);

            // Обновляем lead с session_id
            $lead->update([
                'stripe_session_id' => $session->id,
            ]);

            $this->sendTelegramMessage($lead, $session, 'pending');

            Log::info('Stripe session created successfully', [
                'session_id' => $session->id,
                'lead_id'    => $lead->id,
                'event_id'   => $validated['eventId'],
                'amount'     => $validated['price'],
            ]);

            return response()->json([
                'sessionId'   => $session->id,
                'checkoutUrl' => $session->url,
                'leadId'      => $lead->id,
                'debug'       => [
                    'mode'     => $session->livemode ? 'live' : 'test',
                    'metadata' => $metadata,
                ],
            ]);

        } catch (\Exception $e) {
            Log::error('Checkout session error', [
                'error'   => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
                'request' => $request->all(),
            ]);
            return response()->json([
                'error'   => $e instanceof \Stripe\Exception\ApiErrorException
                ? 'Payment processing error'
                : 'Application error',
                'details' => $e->getMessage(),
            ], $e instanceof \Stripe\Exception\ApiErrorException  ? 400 : 500);
        }
    }

/**
 * Формирует описание события для Stripe
 */
    private function buildEventDescription(array $data): string
    {
        $description = [];

        if (! empty($data['eventDate'])) {
            $date          = $data['eventDate'] === '%' ? 'Every' : $data['eventDate'];
            $description[] = "Date: " . $date;
        }

        if (! empty($data['eventTime'])) {
            $description[] = "Time: " . $data['eventTime'];
        }

        if (! empty($data['eventLocation'])) {
            $description[] = "Location: " . $data['eventLocation'];
        }

        return implode(' | ', $description);
    }

    protected function sendTelegramMessage(Lead $lead, $session, string $paymentStatus = 'pending')
    {
        $client = new Client();
        $token  = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');

        $message = "🧾 *New Order #{$lead->id}*\n\n";
        $message .= "*Client:* {$lead->name}\n";
        $message .= "*Email:* {$lead->email}\n";
        $message .= "*Phone:* {$lead->phone}\n\n";
        $message .= "*Event:* {$lead->event_name}\n";
        $message .= "*Date:* {$lead->event_date}\n";
        $message .= "*Time:* {$lead->event_time}\n";
        $message .= "*Location:* {$lead->event_location}\n";
        $message .= "*Amount:* " . number_format($lead->event_price, 2) . " CAD\n\n";
        $message .= "*Payment status:* " . ucfirst($paymentStatus) . "\n\n";
        $message .= "*Message:*\n{$lead->message}\n\n";

        try {
            $client->post("https://api.telegram.org/bot{$token}/sendMessage", [
                'form_params' => [
                    'chat_id'    => $chatId,
                    'text'       => $message,
                    'parse_mode' => 'Markdown',
                ],
            ]);

            Log::info('Telegram message sent for order', [
                'lead_id' => $lead->id,
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to send Telegram message', [
                'lead_id' => $lead->id,
                'error'   => $e->getMessage(),
            ]);
        }
    }

}
