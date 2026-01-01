<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Speciality;
use App\Models\DoctorProfile;
use Illuminate\Support\Facades\Auth;

class DoctorProfileSettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $doctorProfile = DoctorProfile::with('speciality')
            ->where('user_id', $user->id)
            ->first();

        $specialities = Speciality::where('status', 'active')->get();

        return view('doctor.profile-settings', compact(
            'user',
            'doctorProfile',
            'specialities'
        ));
    }

    public function update(Request $request)
    {
        $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'phone'         => 'required|string|unique:users,phone,' . auth()->id(),
            'speciality_id' => 'required|exists:specialities,id',
            'photo'         => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $user = auth()->user();

        if ($request->hasFile('photo')) {
            if ($user->avatar) {
                deleteImage($user->avatar);
            }
            $user->avatar = storeFile($request->file('photo'), 'doctors');
        }

        $user->name  = $request->first_name . ' ' . $request->last_name;
        $user->phone = $request->phone;
        $user->save();

        DoctorProfile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'speciality_id' => $request->speciality_id,
            ]
        );

        return back()->with('success', 'Profile updated successfully');
    }
}
