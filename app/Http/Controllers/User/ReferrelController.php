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
            ->join('users', 'users.id', '=', 'user_referrels.user_id')
            ->selectRaw('COALESCE(sum(CASE WHEN generation = "first" AND users.status = "active" THEN 1 ELSE 0 END), 0) as first_active')
            ->selectRaw('COALESCE(sum(CASE WHEN generation = "first" AND users.status = "inactive" THEN 1 ELSE 0 END), 0) as first_inactive')
            ->selectRaw('COALESCE(sum(CASE WHEN generation = "second" AND users.status = "active" THEN 1 ELSE 0 END), 0) as second_active')
            ->selectRaw('COALESCE(sum(CASE WHEN generation = "second" AND users.status = "inactive" THEN 1 ELSE 0 END), 0) as second_inactive')
            ->selectRaw('COALESCE(sum(CASE WHEN generation = "third" AND users.status = "active" THEN 1 ELSE 0 END), 0) as third_active')
            ->selectRaw('COALESCE(sum(CASE WHEN generation = "third" AND users.status = "inactive" THEN 1 ELSE 0 END), 0) as third_inactive')
            ->groupBy('user_id')
            ->first();

        if (!$data) {
            $data = (object)[
                'first_active' => 0,
                'first_inactive' => 0,
                'second_active' => 0,
                'second_inactive' => 0,
                'third_active' => 0,
                'third_inactive' => 0,
            ];
        }
        return view('referrel', compact('referrals', 'data'));
    }
}
