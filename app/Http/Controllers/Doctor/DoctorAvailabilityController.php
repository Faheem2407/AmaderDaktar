<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\DoctorAvailability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorAvailabilityController extends Controller
{
    public function availability()
    {
        $availabilities = DoctorAvailability::where('user_id', Auth::id())->orderBy('day')->get()->groupBy('day');

        return view('doctor.availability', compact('availabilities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'day' => 'required|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'duration' => 'required|integer|min:10|max:120',
            'interval' => 'required|integer|min:10|max:120',
            'max_patients' => 'required|integer|min:1|max:10',
            'appointment_fee' => 'nullable|numeric|min:0',
        ]);

        try {
            DoctorAvailability::create([
                'user_id' => Auth::id(),
                'is_active' => true,
                'day' => $validated['day'],
                'start_time' => $validated['start_time'],
                'end_time' => $validated['end_time'],
                'duration' => $validated['duration'],
                'interval' => $validated['interval'],
                'max_patients' => $validated['max_patients'],
                'appointment_fee' => $validated['appointment_fee'] ?? 0,
            ]);

            return response()->json(['success' => true, 'message' => 'Slot added successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function deleteAllDay(Request $request)
    {
        $request->validate([
            'day' => 'required|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
        ]);

        DoctorAvailability::where('user_id', Auth::id())->where('day', $request->day)->delete();

        return response()->json([
            'success' => true,
            'message' => 'All slots deleted',
        ]);
    }

    public function getDaySlots(Request $request)
    {
        $request->validate([
            'day' => 'required|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
        ]);

        $availabilities = DoctorAvailability::where('user_id', Auth::id())->where('day', $request->day)->orderBy('start_time')->get();

        $html = view('doctor.partials.time-slots', [
            'dayAvailabilities' => $availabilities,
        ])->render();

        return response()->json(['success' => true, 'html' => $html]);
    }

    public function updateAvailabilityStatus(Request $request)
    {
        $request->validate(['is_available' => 'required|in:0,1']);

        Auth::user()->doctorProfile->update([
            'is_available' => (bool) $request->is_available,
        ]);

        return response()->json(['success' => true, 'message' => 'Availability status updated']);
    }
}
