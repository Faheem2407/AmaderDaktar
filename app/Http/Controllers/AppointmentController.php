<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\DoctorAvailability;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('patient_id', Auth::id())->latest()->get();
        return view('appointments.index', compact('appointments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'availability_id' => 'required|exists:doctor_availabilities,id',
            'appointment_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'type' => 'required|in:clinic_visit,video_call,audio_call', // validate type
        ]);

        $availability = DoctorAvailability::findOrFail($request->availability_id);

        $fee = $availability->appointment_fee ?? $availability->doctor->doctorProfile->default_fee;

        $appointment = Appointment::create([
            'appointment_id' => 'APT-' . strtoupper(Str::random(8)),
            'patient_id' => auth()->id(),
            'doctor_id' => $request->doctor_id,
            'availability_id' => $request->availability_id,
            'appointment_date' => $request->appointment_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'type' => $request->type,
            'fee' => $fee,
        ]);

        return redirect()->route('patient.appointments.index')
                        ->with('success', 'Appointment booked successfully!');
    }

}

