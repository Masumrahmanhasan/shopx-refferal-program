<?php

use Illuminate\Support\Facades\Route;


Route::get('/login', [\App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('login.view');
Route::post('/login', [\App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login');

Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
