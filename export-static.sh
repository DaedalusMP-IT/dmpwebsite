#!/bin/bash
#
# Выгрузка сайта в статические HTML-файлы для Vercel.
#
# Страницы рендерит локальный Laravel, результат складывается в static-export/:
# русская версия — в корне, английская и казахская — в /en и /kk.
# Приём заявок в выгрузку не входит: формы шлют их на адрес FORM_ENDPOINT
# (см. backend-hosterkz/README.md).
#
# Запуск:
#   FORM_ENDPOINT=https://api.daedalus.kz/submit.php ./export-static.sh
#
set -euo pipefail

# Язык теперь определяется адресом, а не сессией, поэтому сервер для выгрузки
# может обойтись без хранилищ сессий и кэша — иначе на чистой машине
# artisan serve падает из-за отсутствующих папок в storage/.
export SESSION_DRIVER=array
export CACHE_STORE=array
export QUEUE_CONNECTION=sync

OUTPUT="static-export"
PORT="${PORT:-8123}"
BASE_URL="http://127.0.0.1:${PORT}"
PAGES=(design automation arvr vacancies projects news contacts)
LOCALES=(en kk)          # ru — основной язык, лежит в корне

if [ -z "${FORM_ENDPOINT:-}" ]; then
    echo "!! FORM_ENDPOINT не задан — формы будут слать заявки на сам сайт,"
    echo "!! а в статике принимать их некому."
    echo "!! Пример: FORM_ENDPOINT=https://api.daedalus.kz/submit.php ./export-static.sh"
    echo
fi

if ! command -v php >/dev/null 2>&1; then
    echo "PHP не найден. Запустите экспорт в Docker:"
    echo
    echo "  docker run --rm -v \"\$PWD\":/app -w /app -e FORM_ENDPOINT=\"\$FORM_ENDPOINT\" \\"
    echo "    php:8.2-cli sh -c 'apt-get update -qq && apt-get install -y -qq curl >/dev/null && ./export-static.sh'"
    exit 1
fi

echo "Запускаю локальный сервер на порту ${PORT}…"
php artisan serve --port="${PORT}" --no-reload >/dev/null 2>&1 &
SERVER_PID=$!
trap 'kill "${SERVER_PID}" 2>/dev/null || true' EXIT

for _ in $(seq 1 40); do
    curl -sf -o /dev/null "${BASE_URL}/up" && break
    sleep 0.5
done

if ! curl -sf -o /dev/null "${BASE_URL}/up"; then
    echo "Сервер не поднялся. Проверьте: php artisan serve --port=${PORT}"
    exit 1
fi

echo "Очищаю ${OUTPUT}/…"
rm -rf "${OUTPUT}"
mkdir -p "${OUTPUT}"

fetch() {   # fetch <путь на сайте> <файл на диске>
    local url="$1" dest="$2"
    mkdir -p "$(dirname "${dest}")"
    if ! curl -sf "${BASE_URL}${url}" -o "${dest}"; then
        echo "  ОШИБКА: ${url}"
        return 1
    fi
    printf '  %-28s → %s\n' "${url:-/}" "${dest}"
}

echo "Выгружаю страницы…"
fetch "/" "${OUTPUT}/index.html"
for page in "${PAGES[@]}"; do
    fetch "/${page}" "${OUTPUT}/${page}/index.html"
done

for locale in "${LOCALES[@]}"; do
    fetch "/${locale}" "${OUTPUT}/${locale}/index.html"
    for page in "${PAGES[@]}"; do
        fetch "/${locale}/${page}" "${OUTPUT}/${locale}/${page}/index.html"
    done
done

echo "Копирую статику…"
cp -r public/build "${OUTPUT}/build"
cp -r public/public "${OUTPUT}/public"
for asset in global.css index.css index.js favicon.ico robots.txt; do
    cp "public/${asset}" "${OUTPUT}/${asset}" 2>/dev/null || true
done

# Адрес приёма заявок вынесен отдельным файлом: его можно поправить прямо
# на хостинге, не пересобирая сайт.
cat > "${OUTPUT}/form-config.js" <<JS
// Куда формы отправляют заявки. Поменяйте адрес — и всё заработает по-новому,
// пересобирать сайт не нужно.
window.FORM_ENDPOINT = "${FORM_ENDPOINT:-}";
JS

# outputDirectory здесь не указываем: он задаётся в настройках проекта Vercel
# (Output Directory = "."), иначе две настройки конфликтуют между собой.
cat > "${OUTPUT}/vercel.json" <<'JSON'
{
  "cleanUrls": true,
  "trailingSlash": false
}
JSON

echo
echo "Готово. Файлов: $(find "${OUTPUT}" -name '*.html' | wc -l | tr -d ' ') страниц в ${OUTPUT}/"
echo "Проверьте адрес приёма заявок в выгруженном HTML:"
echo "  grep -o 'form-endpoint[^>]*' ${OUTPUT}/index.html"
