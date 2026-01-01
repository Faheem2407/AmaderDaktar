<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public function resetPage($token)
    {
        return view('admin.reset-password', ['token' => $token]);
    }

    public function resetSubmit(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
            'token'    => 'required',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->password = Hash::make($request->password);
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
                ? redirect()->route('admin.login')->with('success', 'Password updated successfully.')
                : back()->withErrors(['email' => __($status)]);
    }
}
