<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpecialityController extends Controller
{
    public function index()
    {
        $specialities = Speciality::latest()->get();
        return view('admin.specialities.index', compact('specialities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = ['name' => $request->name];

        if ($request->hasFile('image')) {
            $originalName = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $request->file('image')->getClientOriginalName());
            $request->file('image')->storeAs('specialities', $originalName, 'public');
            $data['image'] = 'specialities/'.$originalName;
        }

        Speciality::create($data);

        return back()->with('success', 'Speciality added successfully.');
    }

    public function update(Request $request, Speciality $speciality)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $speciality->name = $request->name;

        if ($request->hasFile('image')) {
            if ($speciality->image && Storage::exists('public/'.$speciality->image)) {
                Storage::delete('public/'.$speciality->image);
            }

            $originalName = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $request->file('image')->getClientOriginalName());
            $request->file('image')->storeAs('specialities', $originalName, 'public');
            $speciality->image = 'specialities/'.$originalName;
        }

        $speciality->save();

        return back()->with('success', 'Speciality updated successfully.');
    }

    public function destroy(Speciality $speciality)
    {
        if ($speciality->image && Storage::exists('public/'.$speciality->image)) {
            Storage::delete('public/'.$speciality->image);
        }

        $speciality->delete();

        return back()->with('success', 'Speciality deleted successfully.');
    }
}

