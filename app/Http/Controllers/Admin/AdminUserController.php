<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Admin list
     */
    public function index()
    {
        $admins = User::where('role', 'admin')->whereNot('id',1)->latest()->get();
        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show create admin form
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store new admin
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'nullable|unique:users,phone',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'                 => $request->name,
            'email'                => $request->email,
            'phone'                => $request->phone,
            'password'             => Hash::make($request->password),
            'role'                 => 'admin',
            'is_approved_as_admin' => 1,
        ]);

        return redirect()
            ->route('admin.admins.index')
            ->with('success', 'New admin created successfully');
    }

    /**
     * Update admin
     */
    public function update(Request $request, User $admin)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'phone' => 'nullable|unique:users,phone,' . $admin->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $admin->name  = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return back()->with('success', 'Admin updated successfully.');
    }

    /**
     * Delete admin
     */
    public function destroy(User $admin)
    {
        $admin->delete();

        return back()->with('success', 'Admin deleted successfully.');
    }
}
