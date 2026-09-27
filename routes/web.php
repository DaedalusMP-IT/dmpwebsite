<?php

use App\Http\Controllers\TelegramController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Страницы сайта
|--------------------------------------------------------------------------
|
| Язык задаётся префиксом адреса, а не сессией: /design — русский,
| /en/design — английский, /kk/design — казахский. Благодаря этому каждая
| языковая версия имеет собственный постоянный URL, и сайт можно целиком
| выгрузить в статические файлы (см. export-static.sh).
|
*/

$pages = function () {
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('/design', [PageController::class, 'design'])->name('design');
    Route::get('/automation', [PageController::class, 'automation'])->name('automation');
    Route::get('/arvr', [PageController::class, 'arvr'])->name('arvr');
    Route::get('/vacancies', [PageController::class, 'vacancies'])->name('vacancies');
    Route::get('/projects', [PageController::class, 'projects'])->name('projects');
    Route::get('/news', [PageController::class, 'news'])->name('news');
    Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
};

// Дополнительные языки: /en/... и /kk/...
Route::prefix('{locale}')
    ->whereIn('locale', ['en', 'kk'])
    ->name('loc.')
    ->group($pages);

// Основной язык — в корне, без префикса
$pages();

/*
|--------------------------------------------------------------------------
| Приём заявок с форм (отправка в Telegram)
|--------------------------------------------------------------------------
|
| На Vercel папка api/ — это serverless-функция, и платформа срезает префикс
| /api перед передачей запроса в Laravel: внешний POST /api/submit приходит
| в приложение как /submit. Поэтому регистрируем оба пути — /api/submit
| работает при локальном `php artisan serve`, /submit — на проде.
|
| Если приём заявок вынесен на отдельный хостинг (см. backend-hosterkz/),
| эти маршруты остаются как запасной вариант, а формы шлют заявку по адресу
| из переменной FORM_ENDPOINT.
|
*/

Route::post('/api/submit', [TelegramController::class, 'appendRow'])->name('submit');
Route::post('/submit', [TelegramController::class, 'appendRow'])->name('submit.vercel');
