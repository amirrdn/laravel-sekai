<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Foundation\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // if (app()->environment('local')) {
        //     \URL::forceScheme('https');
        // }
    }
}
