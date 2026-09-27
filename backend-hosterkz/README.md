# Приём заявок на hoster.kz

Автономный PHP-скрипт: принимает заявку с форм сайта и отправляет её в Telegram.
Laravel и composer не нужны — только PHP 7.4+.

## Что залить на хостинг

Из этой папки — два файла:

```
submit.php
config.php      (сделать из config.example.php)
```

Положить в папку, доступную по HTTP. Например, если на hoster.kz заведён
поддомен `api.daedalus.kz` с корнем `public_html/api`, то путь будет:

```
https://api.daedalus.kz/submit.php
```

## Настройка

1. Скопировать `config.example.php` → `config.php`.
2. Заполнить:
   - `bot_token` — токен от @BotFather;
   - `chat_id` — куда слать заявки;
   - `allowed_origins` — домены сайта на Vercel (без них браузер заблокирует
     запрос: это разные домены, работает CORS).
3. Права на `config.php` — `600` или `640`, чтобы токен не читался снаружи.

## Подключение фронтенда (Vercel)

Сайт на Vercel — статические файлы из `static-export/`. Адрес приёмника заявок
указывается в одном файле:

```js
// static-export/form-config.js
window.FORM_ENDPOINT = "https://api.daedalus.kz/submit.php";
```

Его можно править прямо на хостинге — пересобирать сайт не нужно.

При пересборке страниц адрес подставляется из переменной окружения:

```bash
FORM_ENDPOINT=https://api.daedalus.kz/submit.php ./export-static.sh
```

Если адрес не задан, формы шлют заявку на сам сайт (`/api/submit`) — это имеет
смысл, только когда приём заявок живёт вместе с фронтендом.

Полная инструкция по развёртыванию — в [DEPLOY.md](../DEPLOY.md).

## Проверка

```bash
curl -i -X POST https://api.daedalus.kz/submit.php \
  -H 'Content-Type: application/json' \
  -H 'Origin: https://www.daedalus.kz' \
  -d '{"name":"Тест","phone":"+7 776 623 11 77","service":"Проверка","source":"curl"}'
```

Ожидаемо: `HTTP/1.1 200`, тело `{"success":true}` и сообщение в Telegram.

Другие ответы:

| Код | Что значит |
|-----|------------|
| 403 | Домен не в `allowed_origins` |
| 422 | Не заполнено имя или телефон не прошёл проверку |
| 429 | Превышен лимит заявок с одного IP (`rate_limit_per_hour`) |
| 500 | Нет `config.php` либо не заданы `bot_token` / `chat_id` |
| 502 | Telegram не принял сообщение — причина в error_log хостинга |

## Что уже встроено

- CORS с белым списком доменов и обработкой preflight-запроса `OPTIONS`
- honeypot-поле `website` против спам-ботов
- ограничение частоты по IP (по умолчанию 10 заявок в час)
- экранирование пользовательского ввода перед вставкой в HTML-сообщение
- работа и через cURL, и через `file_get_contents` — смотря что включено на хостинге
- ошибки пишутся в `error_log` хостинга, пользователю уходит нейтральный текст
