<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Язык определяется первым сегментом адреса: /en/design — английский,
     * /kk/design — казахский, /design — русский (основной).
     *
     * Так язык виден прямо в URL и не зависит от сессии — это обязательное
     * условие для статической выгрузки сайта, где сессий нет вовсе.
     */
    public function handle(Request $request, Closure $next)
    {
        $segment = $request->segment(1);

        $locale = in_array($segment, site_locales(), true)
            ? $segment
            : default_locale();

        App::setLocale($locale);

        return $next($request);
    }
}
