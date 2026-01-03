<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorProfile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'speciality_id', 'bmdc_no', 'medical_college', 'session', 'post_graduation', 'photo','bio','years_of_experience','total_awards', 'default_fee', 'is_available'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }

    public function documents()
    {
        return $this->hasMany(DoctorDocument::class);
    }
}
