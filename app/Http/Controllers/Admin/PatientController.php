<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class PatientController extends Controller
{
    public function patientsList()
    {
        $patients = User::where('role', 'patient')
            ->latest()
            ->get();

        return view('admin.patients.index', compact('patients'));
    }
}
