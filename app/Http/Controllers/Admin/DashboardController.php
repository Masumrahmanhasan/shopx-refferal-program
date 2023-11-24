<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = User::query()
            ->where('role', '!=', 'admin')
            ->leftJoin('user_requests', 'users.id', '=', 'user_requests.user_id')
            ->selectRaw('COALESCE(count(users.id), 0) as total')
            ->selectRaw('COALESCE(sum(users.status = "active"), 0) as active')
            ->selectRaw('COALESCE(sum(users.status = "inactive"), 0) as inactive')
            ->selectRaw('COALESCE(sum(user_requests.status = "new"), 0) as new_requests')
            ->first();

        if (!$data) {
            $data = (object)[
                'total' => 0,
                'active' => 0,
                'inactive' => 0,
                'new_requests' => 0,
            ];
        }
        $transactions = Transaction::query()->take(5)->latest()->get();
        return view('admin.dashboard', compact('data', 'transactions'));
    }
}
