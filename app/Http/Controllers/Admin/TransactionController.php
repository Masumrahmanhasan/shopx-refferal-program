<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::query()
            ->with('user')
            ->where('type', 'withdraw')
            ->whereNot('status', 'approved')
            ->get();

        return view('admin.transactions.withdraw_request', compact('transactions'));
    }

    public function allTransactions()
    {
        $transactions = Transaction::query()
            ->with('user')
            ->get();

        return view('admin.transactions.all_transactions', compact('transactions'));
    }

    public function changeStatus()
    {

    }
}
