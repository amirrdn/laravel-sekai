<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Check if the application is in maintenance mode
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and create the application instance
$app = require_once __DIR__.'/../bootstrap/app.php';

// Handle the incoming HTTP request using Laravel's HTTP Kernel
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// Capture the incoming request
$request = Request::capture();

// Get the response from the kernel
$response = $kernel->handle($request);

// Send the response to the browser
$response->send();

// Clean up after the request has been handled
$kernel->terminate($request, $response);
