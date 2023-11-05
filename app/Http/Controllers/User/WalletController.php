<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index()
    {
        $transactions = Transaction::query()->where('user_id', auth()->id())->orderByDesc('id')->get();
        return view('wallet', compact('transactions'));
    }
}
