<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        abort_if(!session()->has('booking'), 404);

        $booking = session('booking');
        $doctor = User::with('doctorProfile')->findOrFail($booking['doctor_id']);

        return view('checkout.index', compact('booking','doctor'));
    }

    public function store(Request $request)
    {
        $booking = session('booking');

        Appointment::create([
            'appointment_id' => 'APT-'.strtoupper(Str::random(8)),
            'patient_id' => auth()->id(),
            'doctor_id' => $booking['doctor_id'],
            'availability_id' => $booking['availability_id'],
            'appointment_date' => $booking['date'],
            'start_time' => $booking['start_time'],
            'end_time' => $booking['end_time'],
            'fee' => $booking['fee'],
            'status' => 'confirmed',
            'payment_status' => 'paid'
        ]);

        session()->forget('booking');

        return redirect()->route('home')->with('success','Appointment booked successfully!');
    }
}

