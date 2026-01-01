<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show login form
    public function showLogin()
    {
        return view('login');
    }

    // Login using phone
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'phone' => 'required|string',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->remember)) {

            $user = Auth::user();

            // Doctor approval check
            if ($user->role === 'doctor' && !$user->is_approved_as_doctor) {
                Auth::logout();
                return back()->withErrors([
                    'phone' => 'Your account is under admin review. Please wait for approval.',
                ]);
            }

            $request->session()->regenerate();

            if ($user->role === 'doctor') {
                return redirect()->route('doctor.dashboard');
            }

            if ($user->role === 'patient') {
                return redirect()->route('patient.dashboard');
            }

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
        }

        return back()->withErrors([
            'phone' => 'The provided credentials do not match our records.',
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
