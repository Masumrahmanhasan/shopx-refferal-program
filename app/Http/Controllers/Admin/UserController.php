<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->with('avatar')
            ->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function requested()
    {
        $users = User::query()->with('avatar')
            ->where('status', 'inactive')
            ->whereHas('activation')
            ->paginate(10);

        return view('admin.users.requested', compact('users'));
    }

    public function approve(User $user)
    {
        $user->activation->update([
           'status' => 'approved'
        ]);

        return redirect()->back();
    }
}
