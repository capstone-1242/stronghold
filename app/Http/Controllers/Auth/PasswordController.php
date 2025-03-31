<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password as PasswordRule;

class PasswordController extends Controller
{
    /**
     * Show the password reset request form.
     */
    public function request()
    {
        return view('auth.forgot-password');
    }

    /**
     * Send the password reset link to the provided email address.
     */
    public function email(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withErrors(['email' => __($status)]);
    }

    /**
     * Show the password reset form.
     */
    public function reset(Request $request, $token = null)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    /**
     * Handle the password reset.
     */
    public function update(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', PasswordRule::defaults(), 'confirmed'],
            'token' => ['required'],
        ]);

        // Reset the password
        $status = Password::reset(
            $validated,
            function ($user) use ($validated) {
                $user->forceFill([
                    'password' => Hash::make($validated['password']),
                ])->save();
            }
        );

        // Return a response based on the outcome
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
