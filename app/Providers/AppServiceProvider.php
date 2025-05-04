<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Log;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $monolog = Log::getLogger();
        $monolog->pushHandler(new StreamHandler(storage_path('logs/log.txt'), Logger::INFO));
    }
}
