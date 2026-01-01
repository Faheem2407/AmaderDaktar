<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    // =============================
    // Login
    // =============================
    public function loginPage()
    {
        return view('admin.login');
    }

    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }

        $user = Auth::user();

        if ($user->role !== 'admin') {
            Auth::logout();
            return back()->withErrors(['email' => 'Access denied. Only admins can login here.']);
        }

        if (!$user->is_approved_as_admin) {
            Auth::logout();
            return back()->withErrors(['email' => 'Admin approval pending.']);
        }

        return redirect()->route('admin.dashboard');
    }

    // =============================
    // Register
    // =============================
    public function registerPage()
    {
        return view('admin.register');
    }

    public function registerSubmit(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'                  => $request->name,
            'email'                 => $request->email,
            'password'              => Hash::make($request->password),
            'role'                  => 'admin',
            'is_approved_as_admin'  => false, 
        ]);

        return redirect()->route('admin.login')
                ->with('success', 'Registration successful. Wait for admin approval.');
    }

    // =============================
    // Forgot Password
    // =============================
    public function forgotPasswordPage()
    {
        return view('admin.forgot-password');
    }

    public function forgotPasswordSubmit(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        Password::sendResetLink($request->only('email'));

        return back()->with('success', 'Password reset link sent to your email.');
    }

    // =============================
    // Logout
    // =============================
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }


    // =============================
    // Dashboard
    // =============================

    public function dashboard()
    {
        $doctorsCount = User::where('role', 'doctor')->count();
        $patientsCount = User::where('role', 'patient')->count();

        return view('admin.dashboard', compact('doctorsCount', 'patientsCount'));
    }
}
