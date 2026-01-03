<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id', 'patient_id', 'doctor_id', 'availability_id', 
        'appointment_date', 'start_time', 'end_time', 'status', 
        'reason', 'notes', 'fee', 'payment_status','type', 'payment_method'
    ];

    protected $casts = [
        'appointment_date' => 'date',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
        'fee' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($appointment) {
            $appointment->appointment_id = 'APT' . strtoupper(uniqid());
        });
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function availability()
    {
        return $this->belongsTo(DoctorAvailability::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
