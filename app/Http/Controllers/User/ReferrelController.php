<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserReferrel;
use Illuminate\Http\Request;

class ReferrelController extends Controller
{
    public function index()
    {
        $user = UserReferrel::query()->where('user_id', auth()->id())->get();
        return view('referrel');
    }
}
