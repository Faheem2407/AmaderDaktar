<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\DoctorProfile;
use App\Models\DoctorDocument;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = User::where('role', 'doctor')
            ->with(['doctorProfile.speciality', 'doctorProfile.documents'])
            ->latest()
            ->get();

        $specialities = Speciality::where('status', 'active')->get();

        return view('admin.doctors.index', compact('doctors', 'specialities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|confirmed|min:8',
            'speciality_id' => 'required|exists:specialities,id',
            'bmdc_no' => 'nullable|string',
            'medical_college' => 'nullable|string',
            'session' => 'nullable|string',
            'post_graduation' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'documents.*' => 'nullable|file|mimes:pdf,doc,docx,jpeg,png,jpg|max:5120',
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'doctor',
            'is_approved_as_doctor' => true,
        ]);

        $profileData = [
            'user_id' => $user->id,
            'speciality_id' => $request->speciality_id,
            'bmdc_no' => $request->bmdc_no,
            'medical_college' => $request->medical_college,
            'session' => $request->session,
            'post_graduation' => $request->post_graduation,
        ];

        if ($request->hasFile('photo')) {
            $profileData['photo'] = $request->file('photo')->store('doctors/photos', 'public');
        }

        $profile = DoctorProfile::create($profileData);

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $doc) {
                $originalName = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $doc->getClientOriginalName());
                $doc->storeAs('doctors/documents', $originalName, 'public');

                DoctorDocument::create([
                    'doctor_profile_id' => $profile->id,
                    'file' => 'doctors/documents/'.$originalName,
                ]);
            }
        }


        return back()->with('success', 'Doctor added successfully');
    }

    public function update(Request $request, User $doctor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|unique:users,phone,' . $doctor->id,
            'speciality_id' => 'required|exists:specialities,id',
            'bmdc_no' => 'nullable|string',
            'medical_college' => 'nullable|string',
            'session' => 'nullable|string',
            'post_graduation' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'documents.*' => 'nullable|file|mimes:pdf,doc,docx,jpeg,png,jpg|max:5120',
        ]);

        // Update user basic info
        $doctor->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        // Update or create doctor profile safely
        $profile = $doctor->doctorProfile()->updateOrCreate(
            [], // No "where" conditions — since it's one-to-one, it will create if not exists
            [
                'speciality_id' => $request->speciality_id,
                'bmdc_no' => $request->bmdc_no,
                'medical_college' => $request->medical_college,
                'session' => $request->session,
                'post_graduation' => $request->post_graduation,
            ]
        );

        // Update photo
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($profile->photo && Storage::exists('public/' . $profile->photo)) {
                Storage::delete('public/' . $profile->photo);
            }

            // Store new photo
            $profile->photo = $request->file('photo')->store('doctors/photos', 'public');
            $profile->save();
        }

        // Add new documents
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $doc) {
                $originalName = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $doc->getClientOriginalName());
                $path = $doc->storeAs('doctors/documents', $originalName, 'public');

                DoctorDocument::create([
                    'doctor_profile_id' => $profile->id,
                    'file' => 'doctors/documents/' . $originalName,
                ]);
            }
        }

        return back()->with('success', 'Doctor updated successfully');
    }

    public function destroy(User $doctor)
    {
        $doctor->delete();
        return back()->with('success', 'Doctor deleted successfully');
    }

    public function toggleApproval($id)
    {
        $doctor = User::findOrFail($id);
        $doctor->is_approved_as_doctor = !$doctor->is_approved_as_doctor;
        $doctor->save();
        return back()->with('success', 'Doctor approval status updated');
    }

    public function deleteDocument(DoctorDocument $document)
    {
        if (Storage::exists('public/' . $document->file)) {
            Storage::delete('public/' . $document->file);
        }
        $document->delete();
        return back()->with('success', 'Document removed successfully');
    }
}
