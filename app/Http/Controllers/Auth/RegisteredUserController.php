<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Jobs\GenerationJob;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Exception;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws Exception
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        $referral = User::query()
            ->where('referral_id', $request->input('referral_id'))
            ->first();

        if (!$referral) {
            throw ValidationException::withMessages([
                'referral_id' => 'Invalid referral code',
            ]);
        }

        $user = User::query()->create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => $request->input('password'),
            'referral_id' => random_int(111111, 999999),
            'referred_by' => $request->input('referral_id'),
            'status' => 'inactive',
        ]);

        Auth::login($user);

        GenerationJob::dispatch($user, $referral);

        return redirect(RouteServiceProvider::HOME);
    }
}
