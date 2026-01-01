<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;

class PatientProfileSettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $address = $user->address;
        return view('patient.profile-settings', compact('user', 'address'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'phone'      => 'required|string|unique:users,phone,' . auth()->id(),
            'avatar'     => 'nullable|image|max:4096',
            'gender'     => 'nullable|in:male,female',
            'dob'        => 'nullable|date',
            'address'    => 'nullable|string|max:255',
            'city'       => 'nullable|string|max:100',
            'district'   => 'nullable|string|max:100',
            'country'    => 'nullable|string|max:100',
            'pincode'    => 'nullable|string|max:20',
            'blood_group'=> 'nullable|string|max:10',
        ]);

        $user = Auth::user();
        $user->name   = $request->first_name . ' ' . $request->last_name;
        $user->phone  = $request->phone;
        $user->gender = $request->gender;
        $user->dob    = $request->dob;
        $user->blood_group = $request->blood_group;

        if ($request->hasFile('avatar')) {
            if ($user->avatar) deleteImage($user->avatar);
            $user->avatar = storeFile($request->file('avatar'), 'patients');
        }

        $user->save();

        Address::updateOrCreate(
            ['user_id' => $user->id],
            [
                'address'  => $request->address,
                'city'     => $request->city,
                'district' => $request->district,
                'country'  => $request->country,
                'pincode'  => $request->pincode,
            ]
        );

        return redirect()->route('patient.profile-settings')->with('success', 'Profile updated successfully.');
    }
}
