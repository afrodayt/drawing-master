<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Waitlist;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WaitlistController extends Controller
{
    public function join(Request $request)
    {
        $validated = $request->validate([
            'event_id'   => 'required|integer',
            'event_name' => 'nullable|string',
            'event_date' => 'nullable|string',
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'phone'      => 'required|string|max:64',
        ]);

        $waitlist = Waitlist::create([
            'event_id' => $validated['event_id'],
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'phone'    => $validated['phone'],
        ]);

        $this->sendTelegramMessage($waitlist, $validated['event_name'] ?? null, $validated['event_date'] ?? null);

        return response()->json(['ok' => true, 'id' => $waitlist->id]);
    }

    public function availability()
    {
        $max = config('services.event_max_attendees', 12);

        $paidCounts = Lead::where('payment_status', 'paid')
            ->selectRaw('event_id, COUNT(*) as cnt')
            ->groupBy('event_id')
            ->pluck('cnt', 'event_id');

        return response()->json([
            'max'  => $max,
            'paid' => $paidCounts,
        ]);
    }

    protected function sendTelegramMessage(Waitlist $waitlist, ?string $eventName, ?string $eventDate): void
    {
        $token  = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');

        if (! $token || ! $chatId) {
            Log::warning('Telegram credentials missing — skipping waitlist alert', [
                'waitlist_id' => $waitlist->id,
            ]);
            return;
        }

        $eventLabel = $eventName ?: ('Event #' . $waitlist->event_id);
        $dateLabel  = $eventDate ? "\n*Date:* {$eventDate}" : '';

        $message  = "📋 *Waitlist signup #{$waitlist->id}*\n\n";
        $message .= "*Event:* {$eventLabel}{$dateLabel}\n\n";
        $message .= "*Client:* {$waitlist->name}\n";
        $message .= "*Email:* {$waitlist->email}\n";
        $message .= "*Phone:* {$waitlist->phone}\n";

        try {
            $client = new Client();
            $client->post("https://api.telegram.org/bot{$token}/sendMessage", [
                'form_params' => [
                    'chat_id'    => $chatId,
                    'text'       => $message,
                    'parse_mode' => 'Markdown',
                ],
            ]);

            $waitlist->update(['telegram_sent' => true]);
        } catch (\Throwable $e) {
            Log::error('Telegram waitlist alert failed', [
                'waitlist_id' => $waitlist->id,
                'error'       => $e->getMessage(),
            ]);
        }
    }
}
