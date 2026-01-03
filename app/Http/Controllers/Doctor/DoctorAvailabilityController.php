<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\DoctorAvailability;
use App\Models\DoctorProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DoctorAvailabilityController extends Controller
{
    /* ===================== VIEW ===================== */
    public function availability()
    {
        $availabilities = DoctorAvailability::where('user_id', Auth::id())
            ->orderBy('start_time')
            ->get()
            ->groupBy('day');

        return view('doctor.availability', compact('availabilities'));
    }

    /* ===================== STORE SLOT ===================== */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'day' => 'required|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'slots' => 'required|array|min:1',
            'slots.*.start_time' => 'required|date_format:H:i',
            'slots.*.end_time' => 'required|date_format:H:i|after:slots.*.start_time',
            'slots.*.duration' => 'required|integer|min:10|max:120',
            'slots.*.interval' => 'required|integer|min:10|max:120',
            'slots.*.max_patients' => 'required|integer|min:1|max:10',
            'slots.*.appointment_fee' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {
            $userId = Auth::id();
            $day = $validated['day'];

            // -------- Delete all existing slots for the day --------
            DoctorAvailability::where('user_id', $userId)
                ->where('day', $day)
                ->delete();

            $latestFee = 0;

            // -------- Create new slots --------
            foreach ($validated['slots'] as $slot) {
                $latestFee = $slot['appointment_fee'];

                DoctorAvailability::create([
                    'user_id' => $userId,
                    'day' => $day,
                    'start_time' => $slot['start_time'],
                    'end_time' => $slot['end_time'],
                    'duration' => $slot['duration'],
                    'interval' => $slot['interval'],
                    'max_patients' => $slot['max_patients'],
                    'appointment_fee' => $latestFee,
                    'is_active' => true,
                ]);
            }

            // -------- Update doctor's default fee --------
            DoctorProfile::updateOrCreate(
                ['user_id' => $userId],
                [
                    'default_fee' => $latestFee,
                    'is_available' => true,
                ]
            );

            DB::commit();

            // -------- Reload slots for that day --------
            $dayAvailabilities = DoctorAvailability::where('user_id', $userId)
                ->where('day', $day)
                ->orderBy('start_time')
                ->get();

            $html = view('doctor.partials.time-slots', [
                'dayAvailabilities' => $dayAvailabilities,
                'day' => $day,
            ])->render();

            return response()->json([
                'success' => true,
                'message' => 'Slots updated successfully',
                'html' => $html,
            ]);

        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Failed to update slots',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /* ===================== DELETE ALL SLOTS OF A DAY ===================== */
    public function deleteAllDay(Request $request)
    {
        $request->validate([
            'day' => 'required|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
        ]);

        DoctorAvailability::where('user_id', Auth::id())
            ->where('day', $request->day)
            ->delete();

        $html = view('doctor.partials.time-slots', [
            'dayAvailabilities' => collect(),
            'day' => $request->day,
        ])->render();

        return response()->json([
            'success' => true,
            'message' => 'All slots deleted successfully',
            'html' => $html,
        ]);
    }

    /* ===================== AVAILABILITY TOGGLE ===================== */
    public function updateAvailabilityStatus(Request $request)
    {
        $request->validate([
            'is_available' => 'required|in:0,1',
        ]);

        $profile = DoctorProfile::firstOrCreate(
            ['user_id' => Auth::id()],
            ['is_available' => true]
        );

        $profile->update([
            'is_available' => (bool) $request->is_available,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Availability status updated',
        ]);
    }
}
