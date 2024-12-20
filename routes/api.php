<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\Api\AuthController;
use App\Http\Controllers\Auth\Api\StoreController;
use App\Http\Controllers\Auth\Api\TransactionController;
use App\Http\Controllers\Auth\Api\ItemScanController;

Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [StoreController::class, 'storeWithFilesAndUser']);
Route::middleware([])->group(function () {
    Route::get('/type-store', [StoreController::class, 'getType']);
});
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/stores', [StoreController::class, 'index']);
    
    Route::get('/transactions', [TransactionController::class, 'index']);
    Route::post('/transactions', [TransactionController::class, 'store']);
    Route::post('/validate-qr', [TransactionController::class, 'validateQR']);

    Route::post('/scan-item', [ItemScanController::class, 'scan']);
    
    Route::post('/change-password', [AuthController::class, 'changePassword']);
});
