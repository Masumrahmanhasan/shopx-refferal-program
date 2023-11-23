<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class SettingsController extends Controller
{
    public function profile()
    {
        return view('admin.settings.profile');
    }

    public function billings()
    {
        return view('admin.settings.billings');
    }

    public function billingUpdate(Request $request)
    {
        $keys = $request->only('bkash', 'nagad');
        foreach ($keys as $key => $value) {
            Setting::query()->updateOrInsert(
                ['key' => $key],  // Search condition
                ['value' => $value] // Values to update or insert
            );
        }
        return response()->json([
            'success' => true,
            'message' => 'Settings has been changed successfully'
        ]);
    }

    public function updateProfile(Request $request)
    {

        $validated = $request->validateWithBag('updateProfile', [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255', Rule::unique(User::class)->ignore($request->user()->id)],
        ]);

        $request->user()->fill($validated);
        $request->user()->save();
        return response()->json([
            'success' => true,
            'message' => 'Profile has been changed successfully'
        ]);

    }
    public function updatePassword(Request $request)
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Password has been changed successfully'
        ]);
    }
}
