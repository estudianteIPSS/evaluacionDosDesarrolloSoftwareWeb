<?php

use App\Http\Controllers\ProjectPageController;
use App\Http\Controllers\WebAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Autenticación
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', [WebAuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [WebAuthController::class, 'login'])
        ->name('login.store');

    Route::get('/register', [WebAuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [WebAuthController::class, 'register'])
        ->name('register.store');
});

/*
|--------------------------------------------------------------------------
| Rutas autenticadas
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::post('/logout', [WebAuthController::class, 'logout'])
        ->name('logout');

    Route::get('/', function () {
        return redirect()->route('projects.index');
    });

    Route::get('/projects', [ProjectPageController::class, 'index'])
        ->name('projects.index');

    Route::post('/projects', [ProjectPageController::class, 'store'])
        ->name('projects.store');

    Route::get('/projects/create', [ProjectPageController::class, 'create'])
        ->name('projects.create');

    Route::get('/projects/{project}', [ProjectPageController::class, 'show'])
        ->name('projects.show');

    Route::put('/projects/{project}', [ProjectPageController::class, 'update'])
        ->name('projects.update');

    Route::delete('/projects/{project}', [ProjectPageController::class, 'destroy'])
        ->name('projects.destroy');

    Route::get('/projects/{project}/delete', [ProjectPageController::class, 'delete'])
        ->name('projects.delete');

    Route::get('/projects/{project}/edit', [ProjectPageController::class, 'edit'])
        ->name('projects.edit');
});