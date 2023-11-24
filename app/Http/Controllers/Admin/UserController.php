<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Jobs\ReferrelPointJob;
use App\Models\Media;
use App\Models\User;
use App\Models\UserRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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

    public function create()
    {
        $users = User::query()
            ->where('status', 'active')
            ->get();
        return view('admin.users.create', compact('users'));
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

    public function store(UserStoreRequest $request)
    {
        $user = User::query()->create($request->validated());

        Media::upload($user, $request->file('avatar'), 'media/user/avatar', 'avatar');
        return response()->json(['message' => 'User created successfully'], 200);
    }

    public function edit(User $user)
    {
        $users = User::query()
            ->where('status', 'active')
            ->get();

        return view('admin.users.edit', compact('users', 'user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'status' => $request->input('status'),
        ]);

        if ($request->filled('password')) {

        }
    }

    /**
     * @return Factory|View|Application
     **/
    public function requested(): Factory|View|Application
    {
        $users = User::query()->with('avatar', 'activation.transaction')
            ->where('status', 'inactive')
            ->whereHas('activation', function($query) {
                return $query->whereNot('status', 'reject');
            })
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
        return response()->json(['message' => 'User deleted successfully'], 200);
    }

    public function bulkDelete(Request $request)
    {
        User::query()->whereIn('id', $request->user_id)->delete();
        return response()->json(['message' => 'Users Deleted successfully'], 200);
    }

    public function bulkStatusChange(Request $request)
    {
        if ($request->status === 'approved') {
            UserRequest::query()
                ->whereIn('user_id', $request->user_id)
                ->update(['status' => $request->status]);
            User::query()->whereIn('id', $request->user_id)->update(['status' => 'active']);
            return response()->json(['message' => 'Status updated successfully'], 200);
        }

        UserRequest::query()
            ->whereIn('user_id', $request->user_id)
            ->update(['status' => $request->status]);

        return response()->json(['message' => 'Status updated successfully'], 200);
    }
}
