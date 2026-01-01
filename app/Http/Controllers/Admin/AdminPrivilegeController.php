<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\AdminPrivilege;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPrivilegeController extends Controller
{
    public function index()
    {
        $admins = User::where('role', 'admin')
            ->where('is_super_admin', false)
            ->orderBy('name')
            ->get();

        return view('admin.privileges.index', [
            'admins' => $admins,
            'permissionList' => AdminPrivilege::getPermissionList(),
        ]);
    }

    public function show($id)
    {
        $admin = User::where('id', $id)
            ->where('role', 'admin')
            ->where('is_super_admin', false)
            ->firstOrFail();

        $privilege = AdminPrivilege::where('admin_id', $id)->first();
        $permissions = $privilege ? $privilege->permissions : [];

        return view('admin.privileges.show', [
            'admin' => $admin,
            'permissions' => $permissions,
            'permissionList' => AdminPrivilege::getPermissionList(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $admin = User::where('id', $id)
            ->where('role', 'admin')
            ->where('is_super_admin', false)
            ->firstOrFail();

        $validated = $request->validate([
            'permissions'   => 'nullable|array',
            'permissions.*' => 'string|in:' . implode(',', array_keys(AdminPrivilege::getPermissionList())),
        ]);

        DB::transaction(function () use ($admin, $validated) {
            AdminPrivilege::updateOrCreate(
                ['admin_id' => $admin->id],
                ['permissions' => $validated['permissions'] ?? []]
            );
        });

        return redirect()
            ->route('admin.privileges.show', $admin->id)
            ->with('success', 'Privileges updated successfully.');
    }
}
