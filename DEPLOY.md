# Развёртывание: фронтенд на Vercel, приём заявок на hoster.kz

Сайт разделён на две независимые части:

| Где | Что лежит | Из какой папки |
|-----|-----------|----------------|
| Vercel | готовые HTML-страницы, картинки, стили, скрипты | `static-export/` |
| hoster.kz | приём заявок с форм и отправка их в Telegram | `backend-hosterkz/` |

PHP на Vercel больше не выполняется: страницы заранее собраны в статические
файлы. Весь серверный код живёт на hoster.kz.

---

## 1. hoster.kz — приём заявок

Залить два файла в папку, доступную по HTTP (например, поддомен
`api.daedalus.kz` с корнем `public_html/api`):

```
backend-hosterkz/submit.php   →  /submit.php
backend-hosterkz/config.php   →  /config.php     (сделать из config.example.php)
```

В `config.php` заполнить `bot_token`, `chat_id` и `allowed_origins` — список
доменов сайта. Без последнего браузер заблокирует отправку: страницы и приёмник
заявок теперь на разных доменах, и работает проверка CORS.

Права на `config.php` — `600` или `640`: в нём токен бота.

Проверка:

```bash
curl -i -X POST https://api.daedalus.kz/submit.php \
  -H 'Content-Type: application/json' \
  -H 'Origin: https://www.daedalus.kz' \
  -d '{"name":"Тест","phone":"+7 776 623 11 77","service":"Проверка","source":"curl"}'
```

Ожидается `200` и `{"success":true}`, в Telegram приходит сообщение.
Разбор остальных кодов ответа — в [backend-hosterkz/README.md](backend-hosterkz/README.md).

---

## 2. Vercel — страницы сайта

В `static-export/` уже лежит собранный сайт: 24 страницы, по 8 на каждый из
трёх языков.

**Шаг 1.** Вписать адрес приёмника заявок в `static-export/form-config.js`:

```js
window.FORM_ENDPOINT = "https://api.daedalus.kz/submit.php";
```

Это единственное место, где указан адрес бэкенда. Файл можно править и после
заливки, прямо на хостинге — пересобирать сайт не нужно.

**Шаг 2.** В настройках проекта на Vercel (Settings → General) указать:

```
Root Directory:   static-export
Framework Preset: Other
Build Command:    (пусто)
```

После этого Vercel отдаёт готовые файлы и не запускает PHP. Корневой
`vercel.json` остаётся нетронутым — если понадобится вернуть прежнюю схему с
Laravel на Vercel, достаточно очистить Root Directory.

---

## 3. Языки

Язык теперь определяется адресом, а не сессией:

```
/            /design            русский  (основной, без префикса)
/en          /en/design         английский
/kk          /kk/design         казахский
```

У каждой языковой версии постоянный URL — их видят поисковики, и ссылку можно
отправить сразу на нужном языке. Переключатель языков ведёт на тот же раздел:
с `/kk/contacts` кнопка «РУС» открывает `/contacts`.

---

## 4. Пересборка страниц после правок

Правки в `resources/views/` не попадают на сайт сами — страницы нужно
выгрузить заново:

```bash
FORM_ENDPOINT=https://api.daedalus.kz/submit.php ./export-static.sh
```

Скрипт поднимает Laravel локально, скачивает все 24 страницы, копирует картинки
и стили в `static-export/`. Нужен PHP 8.4 и установленный `vendor/`.

Если PHP локально нет — тем же скриптом через Docker:

```bash
docker run --rm -v "$PWD":/app -w /app \
  -e FORM_ENDPOINT=https://api.daedalus.kz/submit.php php:8.4-cli \
  sh -c 'apt-get update -qq && apt-get install -y -qq curl >/dev/null && ./export-static.sh'
```

После выгрузки — закоммитить `static-export/` и запушить: Vercel задеплоит сам.

---

## Что где настраивается

| Нужно поменять | Где |
|----------------|-----|
| Куда приходят заявки | `config.php` на hoster.kz → `chat_id` |
| Адрес приёмника заявок | `static-export/form-config.js` |
| Домены, которым разрешено слать заявки | `config.php` на hoster.kz → `allowed_origins` |
| Тексты и переводы | `lang/ru`, `lang/en`, `lang/kk` → пересобрать |
| Вёрстку страниц | `resources/views/` → пересобрать |
