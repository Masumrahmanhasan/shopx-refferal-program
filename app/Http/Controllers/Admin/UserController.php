<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\ReferrelPointJob;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    public function index(): Factory|View|Application
    {
        $users = User::query()
            ->with('avatar')
            ->where('status', 'active')
            ->whereNot('role', 'admin')
            ->get();

        return view('admin.users.index', compact('users'));
    }

    public function unverified(): Factory|View|Application
    {
        $users = User::query()
            ->with('avatar')
            ->where('status', 'inactive')
            ->whereNot('role', 'admin')
            ->get();

        return view('admin.users.inactive', compact('users'));
    }

    public function show(User $user)
    {

    }

    /**
     * @return Factory|View|Application
     */
    public function requested(): Factory|View|Application
    {
        $users = User::query()->with('avatar')
            ->where('status', 'inactive')
            ->whereHas('activation')
            ->paginate(10);

        return view('admin.users.requested', compact('users'));
    }

    public function approve(User $user): \Illuminate\Http\RedirectResponse
    {
        $user->update(['status' => 'active'])
            ->activation
            ->update(['status' => 'approved']);

        ReferrelPointJob::dispatchSync($user);
        return redirect()->back();
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
