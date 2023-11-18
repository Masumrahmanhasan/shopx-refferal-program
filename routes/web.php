<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\SupportTicketController;
use App\Http\Controllers\User\WalletController;
use App\Http\Controllers\User\ReferrelController;
use App\Http\Controllers\User\TaskController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\FaqController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/upload-avatar', [ProfileController::class, 'upload'])->name('profile.upload');

    Route::get('/support', [SupportTicketController::class, 'index'])->name('support.index');
    Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet');
    Route::get('/referrel', [ReferrelController::class, 'index'])->name('referrel.index');

    Route::get('/task', [TaskController::class, 'index'])->name('task');
    Route::get('/task/{task}/take', [TaskController::class, 'takeTask'])->name('task.take');

    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::post('/verify-payment', [PaymentController::class, 'store'])->name('verify.payment');

});

require __DIR__.'/auth.php';

