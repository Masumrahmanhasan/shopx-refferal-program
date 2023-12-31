<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.view');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/users/bulk-status-change', [UserController::class, 'bulkStatusChange'])->name('users.change.status');
    Route::post('/users/bulk-delete', [UserController::class, 'bulkDelete'])->name('users.bulk.delete');
    Route::get('/users/unverified', [UserController::class, 'unverified'])->name('users.unverified');
    Route::get('/users/waiting-verification', [UserController::class, 'requested'])->name('users.requested');
    Route::post('/users/{user}/approve', [UserController::class, 'approve'])->name('users.approve');

    Route::resource('/users', UserController::class);
    Route::resource('/tasks', TaskController::class);
    Route::resource('/faqs', FaqController::class);

    Route::get('/transactions/withdraw-request', [TransactionController::class, 'index'])->name('transactions.withdraw-request');
    Route::post('/transactions/withdraw/bulk-status-change', [TransactionController::class, 'bulkStatusChange'])->name('transactions.withdraw-request.change-status');
    Route::get('/transactions/all-transactions', [TransactionController::class, 'allTransactions'])->name('transactions.approved');

    Route::resource('supports', SupportController::class);

    Route::get('/settings', [SettingsController::class, 'profile'])->name('settings.profile');

    Route::get('/billings', [SettingsController::class, 'billings'])->name('settings.billings');
    Route::post('/billings/update', [SettingsController::class, 'billingUpdate'])->name('settings.billings.update');

    Route::post('/update-profile', [SettingsController::class, 'updateProfile'])->name('update.profile');
    Route::post('/update-password', [SettingsController::class, 'updatePassword'])->name('update.password');

    Route::get('/website-settings', [SettingsController::class, 'websiteSettings'])->name('websiteSettings');
    Route::post('/website-settings/update', [SettingsController::class, 'websiteSettingsUpdate'])->name('websiteSettings.update');

    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});


