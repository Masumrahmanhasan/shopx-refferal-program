<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WalletController extends Controller
{
    public function index()
    {
        $transactions = Transaction::query()
            ->where('user_id', auth()->id())
            ->orderByDesc('id')
            ->get();
        return view('wallet', compact('transactions'));
    }

    public function withdraw(Request $request)
    {
        $request->validate([
            'account' => 'required',
            'amount' => 'required',
            'gateway' => 'required',
        ]);

        Transaction::query()->create([
            'user_id' => auth()->id(),
            'gateway' => $request->input('gateway'),
            'trxn_id' => Str::random(10),
            'amount' => $request->input('amount'),
            'account' => $request->input('account'),
            'type' => 'withdraw',
        ]);

        auth()->user()?->deductBalance($request->input('amount'));

        return redirect()->route('wallet');
    }
}
