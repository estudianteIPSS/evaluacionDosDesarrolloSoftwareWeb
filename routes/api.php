<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// Rutas públicas
Route::post('/register', [AuthController::class, 'register'])
    ->name('api.register');

Route::post('/login', [AuthController::class, 'login'])
    ->name('api.login');

// Rutas protegidas
Route::middleware('jwt')->group(function () {

    Route::apiResource('projects', ProjectController::class)
        ->names('api.projects');

});