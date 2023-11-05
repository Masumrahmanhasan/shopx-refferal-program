<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin_login');
    }

    /**
     * @throws ValidationException
     */
    public function login(LoginRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = $this->authenticate($request);

        Auth::login($user);

        return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
    }

    /**
     * @throws ValidationException
     */
    public function authenticate(Request $request)
    {
        $user = User::query()
            ->where('email', $request->input('email'))
            ->where('role', 'admin')
            ->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            return $user;
        }

        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
