<?php

use Illuminate\Support\Facades\Route;


Route::get('/login', [\App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('login.view');
Route::post('/login', [\App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');

    Route::post('/logout', [\App\Http\Controllers\Admin\LoginController::class, 'destroy'])->name('logout');
});


