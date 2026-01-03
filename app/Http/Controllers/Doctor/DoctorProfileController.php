<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\User;

class DoctorProfileController extends Controller
{
    /**
     * Show a doctor's profile
     *
     * @param int $id Doctor ID
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $doctor = User::with([
            'doctorProfile.speciality',
            'doctorAvailabilities',
            'appointmentsAsDoctor.patient',
        ])
        ->where('role', 'doctor')
        ->findOrFail($id);

        return view('doctor.profile', compact('doctor'));
    }
}
