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

        $user_id = auth()->id();
        $generations = ['first', 'second', 'third'];
        $statuses = ['active', 'inactive'];

        $data = collect($generations)
            ->crossJoin($statuses)
            ->flatMap(function ($combination) use ($user_id) {
                list($generation, $status) = $combination;

                $key = "{$generation}_{$status}";

                return [$key => UserReferrel::query()->where('user_id', $user_id)
                    ->where('generation', $generation)
                    ->whereHas('associate', function ($query) use ($status) {
                        $query->where('status', $status);
                    })
                    ->count()];
            })->toArray();

        $data = (object)$data;

        return view('referrel', compact('referrals', 'data'));
    }
}
