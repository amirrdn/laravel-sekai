<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\Api\AuthController;
use App\Http\Controllers\Auth\Api\StoreController;
use App\Http\Controllers\Auth\Api\TransactionController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/stores', [StoreController::class, 'index']);
    Route::post('/stores', [StoreController::class, 'store']);
    
    Route::get('/transactions', [TransactionController::class, 'index']);
    Route::post('/transactions', [TransactionController::class, 'store']);
    Route::post('/validate-qr', [TransactionController::class, 'validateQR']);
    
    Route::post('/change-password', [AuthController::class, 'changePassword']);
});
