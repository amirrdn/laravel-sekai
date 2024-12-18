<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Exceptions\Handler as CustomHandler;
use Illuminate\Foundation\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            \Illuminate\Contracts\Debug\ExceptionHandler::class,
            CustomHandler::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
