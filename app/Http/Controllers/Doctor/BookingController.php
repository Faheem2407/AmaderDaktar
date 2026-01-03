<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\DoctorAvailability;
use Illuminate\Support\Carbon;

class BookingController extends Controller
{
    public function create(User $doctor)
    {
        $doctor->load(['doctorProfile','doctorAvailabilities']);

        return view('doctor.booking', compact('doctor'));
    }

    public function selectSlot(User $doctor, DoctorAvailability $availability, $time)
    {
        session([
            'booking' => [
                'doctor_id' => $doctor->id,
                'availability_id' => $availability->id,
                'date' => now()->toDateString(),
                'start_time' => $time,
                'end_time' => Carbon::createFromFormat('H:i', $time)
                                    ->addMinutes($availability->duration)
                                    ->format('H:i'),
                'fee' => $availability->appointment_fee 
                        ?? $doctor->doctorProfile->default_fee
            ]
        ]);

        return redirect()->route('checkout.index');
    }
}

