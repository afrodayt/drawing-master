<?php
namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'                    => 'required|string|max:255',
            'phone'                   => 'required|string|max:15',
            'email'                   => 'required|string|max:255',
            'message'                 => 'required|string|max:1000',
            'selectedEvent'           => 'sometimes|array',
            'selectedEvent.eventName' => 'sometimes|required_with:selectedEvent|string',
            'selectedEvent.date'      => 'sometimes|required_with:selectedEvent|string',
            'selectedEvent.time'      => 'sometimes|required_with:selectedEvent|string',
            'selectedEvent.price'     => 'sometimes|required_with:selectedEvent|numeric',
            'selectedEvent.location'  => 'sometimes|required_with:selectedEvent|string',
            'security.nonce'          => 'required|string|min:32|max:64', // Добавляем валидацию
        ]);

        $selectedEvent = $request->input('selectedEvent');

        $leadData = [
            'name'           => $validated['name'],
            'phone'          => $validated['phone'],
            'email'          => $validated['email'],
            'message'        => $validated['message'],
            'payment_status' => 'pending',
            'security_nonce' => $validated['security']['nonce'], // Сохраняем nonce
        ];

        if ($selectedEvent) {
            $leadData = array_merge($leadData, [
                'event_id'       => $selectedEvent['id'] ?? null,
                'event_name'     => $selectedEvent['eventName'] ?? null,
                'event_date'     => $selectedEvent['date'] === '%' ? 'Every' : ($selectedEvent['date'] ?? null),
                'event_time'     => $selectedEvent['time'] ?? null,
                'event_price'    => $selectedEvent['price'] ?? null,
                'event_location' => $selectedEvent['location'] ?? null,
            ]);
        }

        $lead = Lead::create($leadData);

        return response()->json([
            'message' => 'Lead created successfully',
            'leadId'  => $lead->id,
        ], 201);
    }
}
/*
    {
    private function sendMessageToTelegram($data, $selectedEvent)
    {
        $client = new Client();
        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');

        $message = "New order:\n";
        $message .= "Name: {$data['name']}\n";
        $message .= "Phone: {$data['phone']}\n";
        $message .= "Email: {$data['email']}\n";
        $message .= "Message: {$data['message']}\n";
        if ($selectedEvent) {
            $message .= "Event Details:\n";
            $message .= "Event Name: {$selectedEvent['eventName']}\n";
            $message .= "Date: {$selectedEvent['date']}\n";
            $message .= "Time: {$selectedEvent['time']}\n";
            $message .= "Price: {$selectedEvent['price']}\n";
            $message .= "Location: {$selectedEvent['location']}\n";
        }

        $response = $client->post("https://api.telegram.org/bot{$token}/sendMessage", [
            'form_params' => [
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'Markdown',
            ],
        ]);

        return $response;
    }
    */
// }
