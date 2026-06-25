<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfessionalController;

Route::post('/auth/register-tenant', [AuthController::class, 'registerTenant']);
Route::post('/auth/login',           [AuthController::class, 'login']);

Route::middleware(['auth:api', 'tenant'])->group(function () {
    Route::get('/auth/me', [AuthController::class, 'me']);

    // Serviços
    Route::get('/services',          [ServiceController::class, 'index']);
    Route::post('/services',         [ServiceController::class, 'store']);
    Route::get('/services/{id}',     [ServiceController::class, 'show']);
    Route::put('/services/{id}',     [ServiceController::class, 'update']);
    Route::delete('/services/{id}',  [ServiceController::class, 'destroy']);

    // Profissionais
    Route::get('/professionals',         [ProfessionalController::class, 'index']);
    Route::post('/professionals',        [ProfessionalController::class, 'store']);
    Route::get('/professionals/{id}',    [ProfessionalController::class, 'show']);
    Route::put('/professionals/{id}',    [ProfessionalController::class, 'update']);
    Route::delete('/professionals/{id}', [ProfessionalController::class, 'destroy']);
});
