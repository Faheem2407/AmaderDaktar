<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminPrivilege extends Model
{
    protected $fillable = [
        'admin_id',
        'permissions'
    ];

    protected $casts = [
        'permissions' => 'array'
    ];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public static function getPermissionList(): array
    {
        return [
            'dashboard' => 'View Dashboard',
            'admins.view' => 'View Admins',
            'admins.create' => 'Create Admins',
            'admins.edit' => 'Edit Admins',
            'admins.delete' => 'Delete Admins',
            'doctors.view' => 'View Doctors',
            'doctors.create' => 'Create Doctors',
            'doctors.edit' => 'Edit Doctors',
            'doctors.delete' => 'Delete Doctors',
            'doctors.approve' => 'Approve/Disapprove Doctors',
            'patients.view' => 'View Patients',
            'patients.edit' => 'Edit Patients',
            'patients.delete' => 'Delete Patients',
            'specialities.view' => 'View Specialities',
            'specialities.create' => 'Create Specialities',
            'specialities.edit' => 'Edit Specialities',
            'specialities.delete' => 'Delete Specialities',
            'settings.view' => 'View Settings',
            'settings.edit' => 'Edit Settings',
            'privileges.edit' => 'Edit Privileges'
        ];
    }
}