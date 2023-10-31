<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = User::where('role', '!=', 'admin')->when(true, function ($query) {
            return $query->selectRaw('count(*) as total')
                ->selectRaw('sum(status = "active") as active')
                ->selectRaw('sum(status = "inactive") as inactive');
        })->first();

        return view('admin.dashboard', compact('data'));
    }
}
