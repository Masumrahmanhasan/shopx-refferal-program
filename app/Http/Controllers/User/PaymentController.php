<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.index');
    }

    public function store(Request $request): RedirectResponse
    {
        $transaction = Transaction::query()->create([
            'user_id'=> auth()->id,
            'account' => $request->input('account'),
            'gateway' => $request->input('gateway'),
            'trxn_id' => $request->input('trxn_id'),
            'amount' => 200,
            'type' => 'activation',
        ]);

        auth()->user()?->activation()->create([
            'transaction_id' => $transaction->id,
        ]);

        return redirect()->back();
    }
}
