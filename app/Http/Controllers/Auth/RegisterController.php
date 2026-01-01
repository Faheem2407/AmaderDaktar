<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    // Show Doctor Register Form
    public function doctorRegister()
    {
        return view('doctor.register');
    }

    // Doctor Registration
    public function doctorRegisterPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|unique:users,phone|max:20',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'doctor',
        ]);

        return redirect()->route('login')->with('status', 'Your account is under admin review. You will be able to login after approval.');
    }

    // Show Patient Register Form
    public function patientRegister()
    {
        return view('patient.register');
    }

    // Patient Registration
    public function patientRegisterPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|unique:users,phone|max:20',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'patient',
        ]);

        auth()->login($user);

        return redirect()->route('patient.dashboard');
    }
}
