<?php

use Illuminate\Support\Facades\Route;


Route::get('/login', [\App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('login.view');
Route::post('/login', [\App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::post('/users/bulk-status-change', [\App\Http\Controllers\Admin\UserController::class, 'bulkStatusChange'])->name('users.change.status');
    Route::get('/users/unverified', [\App\Http\Controllers\Admin\UserController::class, 'unverified'])->name('users.unverified');
    Route::get('/users/waiting-verification', [\App\Http\Controllers\Admin\UserController::class, 'requested'])->name('users.requested');
    Route::post('/users/{user}/approve', [\App\Http\Controllers\Admin\UserController::class, 'approve'])->name('users.approve');

    Route::resource('/users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('/tasks', \App\Http\Controllers\Admin\TaskController::class);
    Route::resource('/faqs', \App\Http\Controllers\Admin\FaqController::class);

    Route::get('/transactions/withdraw-request', [\App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('transactions.withdraw-request');
    Route::get('/transactions/approved-transactions', [\App\Http\Controllers\Admin\TransactionController::class, 'allTransactions'])->name('transactions.approved');

    Route::resource('supports', \App\Http\Controllers\Admin\SupportController::class);

    Route::get('/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'profile'])->name('settings.profile');

    Route::post('/logout', [\App\Http\Controllers\Admin\LoginController::class, 'destroy'])->name('logout');
});


