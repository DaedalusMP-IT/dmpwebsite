<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Use /tmp for storage in serverless environments (Vercel)
        if (isset($_ENV['APP_STORAGE'])) {
            $this->app->useStoragePath($_ENV['APP_STORAGE']);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
