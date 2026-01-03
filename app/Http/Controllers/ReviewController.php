<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $appointment_id)
    {
        $appointment = Appointment::where('id', $appointment_id)
            ->where('patient_id', Auth::id())
            ->where('status', 'completed') 
            ->firstOrFail();

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        Review::updateOrCreate(
            ['appointment_id' => $appointment->id, 'patient_id' => Auth::id()],
            [
                'doctor_id' => $appointment->doctor_id,
                'rating' => $request->rating,
                'comment' => $request->comment,
            ]
        );

        return back()->with('success', 'Review submitted successfully!');
    }
}
