<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class TelegramController extends Controller
{
    public function appendRow(Request $request)
    {
        try {
            $data = $request->validate([
                'name'    => ['required', 'string', 'max:100'],
                'phone'   => ['nullable', 'string', 'max:32'],
                'number'  => ['nullable', 'string', 'max:32'],
                'service' => ['nullable', 'string', 'max:100'],
                'source'  => ['nullable', 'string', 'max:100'],
                'comment' => ['nullable', 'string', 'max:1000'],
                // honeypot: боты заполняют скрытое поле, люди — нет
                'website' => ['prohibited'],
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->validator->errors()->first(),
            ], 422);
        }

        $phone = trim($data['phone'] ?? $data['number'] ?? '');

        if ($phone === '' || !preg_match('/^[\d\s\+\-\(\)]{7,20}$/', $phone)) {
            return response()->json([
                'success' => false,
                'message' => 'Укажите корректный номер телефона',
            ], 422);
        }

        $token  = config('services.telegram.bot_token');
        $chatId = config('services.telegram.chat_id');

        if (blank($token) || blank($chatId)) {
            Log::error('Telegram: не заданы TELEGRAM_BOT_TOKEN / TELEGRAM_CHAT_ID');

            return response()->json([
                'success' => false,
                'message' => 'Форма временно недоступна. Позвоните нам, пожалуйста.',
            ], 500);
        }

        $text = "📩 <b>Новая заявка с сайта</b>\n\n"
              . "👤 Имя: " . e($data['name']) . "\n"
              . "📞 Телефон: " . e($phone) . "\n"
              . "🔧 Услуга: " . e($data['service'] ?? '—') . "\n"
              . "📍 Страница: " . e($data['source'] ?? 'Сайт');

        if (filled($data['comment'] ?? null)) {
            $text .= "\n💬 Комментарий: " . e($data['comment']);
        }

        try {
            $response = Http::timeout(10)
                ->retry(2, 300, throw: false)
                ->asForm()
                ->post("https://api.telegram.org/bot{$token}/sendMessage", [
                    'chat_id'                  => $chatId,
                    'text'                     => $text,
                    'parse_mode'               => 'HTML',
                    'disable_web_page_preview' => true,
                ]);
        } catch (\Throwable $e) {
            Log::error('Telegram: запрос не выполнен', ['error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'Не удалось отправить заявку. Попробуйте ещё раз.',
            ], 502);
        }

        if ($response->successful() && $response->json('ok') === true) {
            return response()->json(['success' => true]);
        }

        Log::error('Telegram: API вернул ошибку', [
            'status' => $response->status(),
            'body'   => $response->json('description') ?? $response->body(),
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Не удалось отправить заявку. Попробуйте ещё раз.',
        ], 502);
    }
}
