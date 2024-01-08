<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::query()
            ->with('user')
            ->where('type', 'withdraw')
            ->whereNotIn('status', ['checked', 'approved', 'rejected', 'checking'])
            ->get();

        return view('admin.transactions.withdraw_request', compact('transactions'));
    }

    public function checking()
    {
        $transactions = Transaction::query()
            ->with('user')
            ->where('type', 'withdraw')
            ->where('status', 'checking')
            ->get();

        return view('admin.transactions.withdraw_request_checking', compact('transactions'));
    }

    public function checked()
    {
        $transactions = Transaction::query()
            ->with('user')
            ->where('type', 'withdraw')
            ->where('status', 'checked')
            ->get();

        return view('admin.transactions.withdraw_request_checked', compact('transactions'));
    }

    public function allTransactions()
    {
        $transactions = Transaction::query()
            ->with('user')
            ->get();

        return view('admin.transactions.all_transactions', compact('transactions'));
    }

    public function bulkStatusChange(Request $request): JsonResponse
    {
        Transaction::query()
            ->whereIn('id', $request->transaction_id)
            ->update(['status' => $request->status]);

        if ($request->status === 'rejected') {
            Transaction::query()->whereIn('id', $request->transaction_id)
                ->where('status', 'rejected')
                ->each(function ($transaction) {
                    $transaction->user->increment('balance', $transaction->amount);
                });
        }

        return response()->json(['message' => 'Status updated successfully'], 200);
    }
}
