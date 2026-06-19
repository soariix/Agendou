<?php

use App\Http\Controllers\AuthController;

Route::post('/auth/register-tenant', [AuthController::class, 'registerTenant']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('/auth/me', [AuthController::class, 'me']);
});
