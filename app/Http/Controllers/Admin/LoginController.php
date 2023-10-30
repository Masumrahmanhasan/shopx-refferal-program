<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use function Symfony\Component\String\s;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * @throws ValidationException
     */
    public function login(LoginRequest $request): void
    {
        $this->authenticate($request);
    }

    /**
     * @throws ValidationException
     */
    public function authenticate(Request $request): void
    {
        if ($user = ! Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        $user = Auth::user();

    }
}
