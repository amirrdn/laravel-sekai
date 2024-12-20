<?php

// Bootstrapping Laravel
require_once __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Menangani permintaan HTTP
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

// Mengirim respons
$response->send();

// Menyelesaikan proses
$kernel->terminate($request, $response);
