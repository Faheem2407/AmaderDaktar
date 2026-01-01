<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorDocument extends Model
{
    protected $fillable = ['doctor_profile_id', 'file'];

    public function profile()
    {
        return $this->belongsTo(DoctorProfile::class);
    }
}

