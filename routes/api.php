<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [ApiAuthController::class, 'register'])->name('register');
    Route::post('/login', [ApiAuthController::class, 'login'])->name('login');
    Route::post('/logout', [ApiAuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [ApiAuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [ApiAuthController::class, 'me'])->middleware('auth:api')->name('me');
});
