<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserReferrel;

class ReferrelController extends Controller
{
    public function index()
    {
        $referrals = UserReferrel::query()
            ->with('associate')
            ->where('user_id', auth()->id())
            ->get();
        $data = UserReferrel::query()
            ->where('user_id', auth()->id())
            ->selectRaw('COALESCE(sum(generation = "first"), 0) as first')
            ->selectRaw('COALESCE(sum(generation = "second"), 0) as second')
            ->selectRaw('COALESCE(sum(generation = "third"), 0) as third')
            ->groupBy('user_id')
            ->first();

        return view('referrel', compact('referrals', 'data'));
    }
}
