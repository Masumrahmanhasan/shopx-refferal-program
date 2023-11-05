<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.index');
    }

    public function store(Request $request)
    {
        $transaction = Transaction::query()->create([
            'user_id'=> auth()->user()->id,
            'account' => $request->input('account'),
            'gateway' => $request->input('gateway'),
            'trxn_id' => $request->input('trxn_id'),
            'amount' => 200,
            'type' => 'activation',
        ]);

        $user_activation_req = auth()->user()->activation()->create([
            'transaction_id' => $transaction->id,
        ]);

        return redirect()->back();
    }
}
