<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Speciality;

class PageController extends Controller
{
    public function home()
    {
        // Fetch specialities for carousel and browse section
        $specialities = Speciality::where('status', 'active')->get();

        // Fetch doctors with their profile and speciality, only available and approved
        $doctors = User::with(['doctorProfile.speciality'])
            ->where('role', 'doctor')
            ->where('is_approved_as_doctor', true)
            ->whereHas('doctorProfile', fn ($q) => $q->where('is_available', true))
            ->latest()
            ->get();

        return view('home', compact('specialities', 'doctors'));
    }
}
