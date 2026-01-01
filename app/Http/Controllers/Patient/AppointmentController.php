<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\DoctorAvailability;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Auth::user()->appointmentsAsPatient()->with('doctor', 'availability')->orderBy('appointment_date', 'desc')->orderBy('start_time', 'desc')->paginate(10);

        return view('patient.appointments.index', compact('appointments'));
    }

    public function create($doctorId)
    {
        $doctor = User::where('role', 'doctor')->findOrFail($doctorId);
        $availabilities = $doctor->doctorAvailabilities()->active()->with('clinic')->get()->groupBy('day');

        return view('patient.appointments.create', compact('doctor', 'availabilities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'availability_id' => 'required|exists:doctor_availabilities,id',
            'appointment_date' => 'required|date|after:yesterday',
            'start_time' => 'required|date_format:H:i',
            'reason' => 'required|string|max:500',
        ]);

        $availability = DoctorAvailability::findOrFail($request->availability_id);

        // Validate slot availability
        $bookedCount = $availability
            ->appointments()
            ->where('appointment_date', $request->appointment_date)
            ->where('start_time', $request->start_time)
            ->whereIn('status', ['pending', 'confirmed'])
            ->count();

        if ($bookedCount >= $availability->max_patients) {
            return back()->with('error', 'This time slot is no longer available');
        }

        // Validate date matches availability day
        $dayName = strtolower(date('l', strtotime($request->appointment_date)));
        if ($dayName !== $availability->day) {
            return back()->with('error', 'Selected date does not match availability day');
        }

        try {
            DB::beginTransaction();

            $appointment = Appointment::create([
                'patient_id' => Auth::id(),
                'doctor_id' => $request->doctor_id,
                'availability_id' => $request->availability_id,
                'appointment_date' => $request->appointment_date,
                'start_time' => $request->start_time,
                'end_time' => date('H:i', strtotime($request->start_time) + $availability->duration * 60),
                'status' => 'pending',
                'reason' => $request->reason,
                'fee' => $availability->appointment_fee ?? 0,
                'payment_status' => 'pending',
            ]);

            if ($appointment->fee == 0) {
                $appointment->update(['payment_status' => 'paid']);
            }

            DB::commit();

            return redirect()->route('patient.appointments.index')->with('success', 'Appointment booked successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to book appointment. Please try again.');
        }
    }

    public function cancel($id)
    {
        $appointment = Auth::user()->appointmentsAsPatient()->findOrFail($id);

        if (!$appointment->canBeCancelled()) {
            return back()->with('error', 'Appointments can only be cancelled 24 hours in advance.');
        }

        $appointment->update(['status' => 'cancelled']);

        return back()->with('success', 'Appointment cancelled successfully.');
    }

    public function getAvailableSlots(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'date' => 'required|date',
        ]);

        $dayName = strtolower(date('l', strtotime($request->date)));

        $availabilities = DoctorAvailability::where('user_id', $request->doctor_id)->where('day', $dayName)->active()->get();

        $availableSlots = [];
        foreach ($availabilities as $availability) {
            $slots = $availability->generateTimeSlots();
            foreach ($slots as $slot) {
                if ($slot['is_available']) {
                    $availableSlots[] = [
                        'availability_id' => $availability->id,
                        'start_time' => $slot['start_time'],
                        'end_time' => $slot['end_time'],
                        'type' => $availability->type,
                        'clinic' => $availability->clinic ? $availability->clinic->name : 'General',
                        'fee' => $availability->appointment_fee,
                    ];
                }
            }
        }

        return response()->json([
            'success' => true,
            'slots' => $availableSlots,
        ]);
    }
}
