<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\DoctorProfile;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $doctorProfile = DoctorProfile::with('speciality')
            ->where('user_id', $user->id)
            ->first();

        return view('doctor.dashboard', compact('user', 'doctorProfile'));
    }
}
