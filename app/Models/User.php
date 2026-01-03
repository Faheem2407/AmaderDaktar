<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'role', 'avatar', 
        'is_approved_as_admin', 'is_approved_as_doctor', 'is_super_admin'
    ];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_approved_as_admin' => 'boolean',
            'dob' => 'date',
        ];
    }

    public function doctorProfile()
    {
        return $this->hasOne(DoctorProfile::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function doctorAvailabilities()
    {
        return $this->hasMany(DoctorAvailability::class, 'user_id');
    }

    public function appointmentsAsDoctor()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    public function appointmentsAsPatient()
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    public function reviewsGiven()
    {
        return $this->hasMany(Review::class, 'patient_id');
    }

    public function reviewsReceived()
    {
        return $this->hasManyThrough(
            Review::class,
            Appointment::class,
            'doctor_id',
            'appointment_id',
            'id',
            'id'
        )->with('patient');
    }
}
