<?php

/**
 * Приём заявок с форм сайта и отправка их в Telegram.
 *
 * Самостоятельный скрипт без зависимостей — рассчитан на обычный PHP-хостинг
 * (hoster.kz и любой другой с PHP 7.4+). Настройки — в config.php.
 */

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

// Конфиг ищем сначала на уровень выше корня сайта: там он недоступен по HTTP
// даже если обработчик PHP однажды перестанет работать и файлы начнут
// отдаваться как обычный текст. Рядом со скриптом — запасной вариант.
$configFile = null;

foreach ([dirname(__DIR__) . '/config.php', __DIR__ . '/config.php'] as $candidate) {
    if (is_file($candidate)) {
        $configFile = $candidate;
        break;
    }
}

if ($configFile === null) {
    http_response_code(500);
    error_log('submit.php: нет config.php — скопируйте config.example.php');
    exit(json_encode(['success' => false, 'message' => 'Форма не настроена'], JSON_UNESCAPED_UNICODE));
}

$config = require $configFile;

/* ------------------------------- CORS -------------------------------- */

$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
$allowed = $config['allowed_origins'] ?? [];

if ($origin !== '' && in_array($origin, $allowed, true)) {
    header('Access-Control-Allow-Origin: ' . $origin);
    header('Vary: Origin');
    header('Access-Control-Allow-Methods: POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Accept, X-Requested-With');
    header('Access-Control-Max-Age: 86400');
}

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'OPTIONS') {
    http_response_code($origin !== '' && !in_array($origin, $allowed, true) ? 403 : 204);
    exit;
}

if ($origin !== '' && !in_array($origin, $allowed, true)) {
    http_response_code(403);
    error_log('submit.php: запрос с неразрешённого домена ' . $origin);
    exit(json_encode(['success' => false, 'message' => 'Домен не разрешён'], JSON_UNESCAPED_UNICODE));
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    http_response_code(405);
    exit(json_encode(['success' => false, 'message' => 'Метод не поддерживается'], JSON_UNESCAPED_UNICODE));
}

/* ----------------------------- входные данные ------------------------ */

$raw = file_get_contents('php://input') ?: '';
$input = json_decode($raw, true);

if (!is_array($input)) {
    $input = $_POST;  // запасной вариант: обычная отправка формы
}

$field = static function (string $key) use ($input): string {
    $value = $input[$key] ?? '';
    return is_string($value) ? trim($value) : '';
};

$fail = static function (string $message, int $code = 422): void {
    http_response_code($code);
    exit(json_encode(['success' => false, 'message' => $message], JSON_UNESCAPED_UNICODE));
};

// Honeypot: поле скрыто от людей, его заполняют только боты.
if ($field('website') !== '') {
    exit(json_encode(['success' => true], JSON_UNESCAPED_UNICODE));
}

$name = mb_substr($field('name'), 0, 100);
$phone = mb_substr($field('phone') ?: $field('number'), 0, 32);
$service = mb_substr($field('service'), 0, 100);
$source = mb_substr($field('source'), 0, 100);
$comment = mb_substr($field('comment') ?: $field('message'), 0, 1000);

if ($name === '') {
    $fail('Укажите имя');
}

if (!preg_match('/^[\d\s\+\-\(\)]{7,20}$/u', $phone)) {
    $fail('Укажите корректный номер телефона');
}

/* ----------------------- ограничение частоты по IP ------------------- */

$limit = (int)($config['rate_limit_per_hour'] ?? 0);

if ($limit > 0) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $ip = trim(explode(',', $ip)[0]);
    $file = sys_get_temp_dir() . '/tg_rate_' . md5($ip) . '.txt';

    $hits = array_filter(
        is_file($file) ? (array)json_decode((string)file_get_contents($file), true) : [],
        static fn($ts) => is_int($ts) && $ts > time() - 3600
    );

    if (count($hits) >= $limit) {
        $fail('Слишком много заявок. Попробуйте позже или позвоните нам.', 429);
    }

    $hits[] = time();
    @file_put_contents($file, json_encode(array_values($hits)), LOCK_EX);
}

/* --------------------------- отправка в Telegram --------------------- */

$token = (string)($config['bot_token'] ?? '');
$chatId = (string)($config['chat_id'] ?? '');

if ($token === '' || $chatId === '') {
    http_response_code(500);
    error_log('submit.php: не заданы bot_token / chat_id в config.php');
    exit(json_encode([
        'success' => false,
        'message' => 'Форма временно недоступна. Позвоните нам, пожалуйста.',
    ], JSON_UNESCAPED_UNICODE));
}

$esc = static fn(string $v): string => htmlspecialchars($v, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

$text = "📩 <b>Новая заявка с сайта</b>\n\n"
      . "👤 Имя: " . $esc($name) . "\n"
      . "📞 Телефон: " . $esc($phone) . "\n"
      . "🔧 Услуга: " . $esc($service !== '' ? $service : '—') . "\n"
      . "📍 Страница: " . $esc($source !== '' ? $source : 'Сайт');

if ($comment !== '') {
    $text .= "\n💬 Комментарий: " . $esc($comment);
}

$payload = http_build_query([
    'chat_id' => $chatId,
    'text' => $text,
    'parse_mode' => 'HTML',
    'disable_web_page_preview' => 'true',
]);

$url = "https://api.telegram.org/bot{$token}/sendMessage";
$body = null;

if (function_exists('curl_init')) {
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_CONNECTTIMEOUT => 10,
    ]);
    $body = curl_exec($ch);

    if ($body === false) {
        error_log('submit.php: cURL — ' . curl_error($ch));
        $body = null;
    }

    curl_close($ch);
} else {
    // На хостингах без cURL, но с allow_url_fopen
    $context = stream_context_create(['http' => [
        'method' => 'POST',
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
        'content' => $payload,
        'timeout' => 15,
        'ignore_errors' => true,
    ]]);
    $body = @file_get_contents($url, false, $context) ?: null;
}

$result = $body !== null ? json_decode($body, true) : null;

if (is_array($result) && ($result['ok'] ?? false) === true) {
    exit(json_encode(['success' => true], JSON_UNESCAPED_UNICODE));
}

http_response_code(502);
error_log('submit.php: Telegram вернул — ' . (is_array($result) ? ($result['description'] ?? $body) : (string)$body));

exit(json_encode([
    'success' => false,
    'message' => 'Не удалось отправить заявку. Попробуйте ещё раз.',
], JSON_UNESCAPED_UNICODE));
