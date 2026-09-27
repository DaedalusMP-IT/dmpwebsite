<?php

use Illuminate\Support\Facades\App;

/**
 * Языки сайта. Первый — основной: его страницы лежат в корне, без префикса.
 */
function site_locales(): array
{
    return ['ru', 'en', 'kk'];
}

function default_locale(): string
{
    return site_locales()[0];
}

/**
 * Префикс текущего языка в адресе: '' для основного, '/en' и '/kk' для остальных.
 */
function locale_prefix(?string $locale = null): string
{
    $locale = $locale ?: App::getLocale();

    return $locale === default_locale() ? '' : '/' . $locale;
}

/**
 * Ссылка на страницу сайта с учётом текущего языка.
 *
 *   locale_url()          → /          (ru)  |  /en          (en)
 *   locale_url('design')  → /design    (ru)  |  /en/design   (en)
 *
 * Такие адреса работают одинаково и у Laravel, и у статической выгрузки,
 * поэтому переключение языка не зависит от сессии.
 */
function locale_url(string $path = '', ?string $locale = null): string
{
    $path = trim($path, '/');
    $prefix = locale_prefix($locale);

    if ($path === '') {
        return $prefix === '' ? '/' : $prefix;
    }

    return $prefix . '/' . $path;
}

/**
 * Текущий адрес на другом языке — для переключателя языков.
 * С /en/design ссылка «ҚАЗ» ведёт на /kk/design, а «РУС» — на /design.
 */
function switch_locale_url(string $locale): string
{
    $segments = array_values(array_filter(explode('/', request()->path())));

    if (isset($segments[0]) && in_array($segments[0], site_locales(), true)) {
        array_shift($segments);
    }

    return locale_url(implode('/', $segments), $locale);
}
