<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{
    public function appendRow(Request $request)
    {
        $name    = $request->input('name', '—');
        $phone   = $request->input('phone') ?: $request->input('number', '—');
        $service = $request->input('service', '—');
        $source  = $request->input('source', 'Сайт');

        $text = "📩 *Новая заявка*\n\n"
              . "👤 Имя: {$name}\n"
              . "📞 Телефон: {$phone}\n"
              . "🔧 Услуга: {$service}\n"
              . "📍 Источник: {$source}";

        $token  = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');

        $response = Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id'    => $chatId,
            'text'       => $text,
            'parse_mode' => 'Markdown',
        ]);

        if ($response->successful()) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Ошибка отправки'], 500);
    }
}
