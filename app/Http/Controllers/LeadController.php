<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Получаем объект selectedEvent напрямую без валидации
        $selectedEvent = $request->input('selectedEvent');

        // Отправка сообщения в Telegram
        $this->sendMessageToTelegram($validated, $selectedEvent);

        return response()->json(['message' => 'Lead created successfully'], 201);
    }

    private function sendMessageToTelegram($data, $selectedEvent)
    {
        $client = new Client();
        $token = env('TELEGRAM_BOT_TOKEN'); // Получаем токен из .env
        $chatId = env('TELEGRAM_CHAT_ID'); // Получаем chat_id из .env

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
}
