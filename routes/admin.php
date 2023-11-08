<?php

use Illuminate\Support\Facades\Route;


Route::get('/login', [\App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('login.view');
Route::post('/login', [\App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');


    Route::get('/users/unverified', [\App\Http\Controllers\Admin\UserController::class, 'unverified'])->name('users.unverified');
    Route::get('/users/waiting-verification', [\App\Http\Controllers\Admin\UserController::class, 'requested'])->name('users.requested');
    Route::post('/users/{user}/approve', [\App\Http\Controllers\Admin\UserController::class, 'approve'])->name('users.approve');
    Route::resource('/users', \App\Http\Controllers\Admin\UserController::class);

    Route::get('/tasks', [\App\Http\Controllers\Admin\TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [\App\Http\Controllers\Admin\TaskController::class, 'create'])->name('tasks.create');
    Route::get('/tasks/store', [\App\Http\Controllers\Admin\TaskController::class, 'store'])->name('tasks.store');

    Route::get('/faqs', [\App\Http\Controllers\Admin\FaqController::class, 'index'])->name('faqs.index');


    Route::post('/logout', [\App\Http\Controllers\Admin\LoginController::class, 'destroy'])->name('logout');
});


