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
            'address' => 'required|string|max:255',
            'products' => 'required|array',
            'summary' => 'required|string|max:255',
        ]);

        // Получаем продукты из запроса и фильтруем их
        $selectedProducts = array_filter($validated['products'], function ($product) {
            return $product['selected'] && $product['count'] > 0;
        });

        // Отправка сообщения в Telegram
        $this->sendMessageToTelegram($validated, $selectedProducts);

        return response()->json(['message' => 'Lead created successfully'], 201);
    }

    private function sendMessageToTelegram($data, $selectedProducts)
    {
        $client = new Client();
        $token = env('TELEGRAM_BOT_TOKEN'); // Получаем токен из .env
        $chatId = env('TELEGRAM_CHAT_ID'); // Получаем chat_id из .env

        $message = "Нове замовлення:\n";
        $message .= "Ім'я: {$data['name']}\n";
        $message .= "Телефон: {$data['phone']}\n";
        $message .= "Адреса: {$data['address']}\n";
        $message .= "Вибрані продукти:\n";


        foreach ($selectedProducts as $product) {
            $message .= "- {$product['productName']}: {$product['count']} шт.\n";
        }

        $message .= "На сумму: {$data['summary']} грн\n";

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
