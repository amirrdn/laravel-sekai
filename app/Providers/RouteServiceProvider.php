<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->routes(function () {
            Route::prefix('api') // Prefix "api" untuk semua rute API
                ->middleware('api') // Middleware grup "api"
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php')); // Muat file routes/api.php

            Route::middleware('web') // Middleware grup "web"
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php')); // Muat file routes/web.php
        });
    }
}
