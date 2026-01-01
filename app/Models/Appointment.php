<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['appointment_id', 'patient_id', 'doctor_id', 'availability_id', 'appointment_date', 'start_time', 'end_time', 'status', 'reason', 'notes', 'fee', 'payment_status', 'payment_method'];

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

    // Relationships
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

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('appointment_date', '>=', now()->toDateString())->whereIn('status', ['pending', 'confirmed']);
    }

    // Helper methods
    public function getFormattedDateAttribute()
    {
        return $this->appointment_date->format('M d, Y');
    }

    public function getFormattedTimeAttribute()
    {
        return date('h:i A', strtotime($this->start_time));
    }

    public function getDateTimeAttribute()
    {
        return $this->appointment_date->format('Y-m-d') . ' ' . $this->start_time;
    }

    public function canBeCancelled()
    {
        $appointmentDateTime = \Carbon\Carbon::parse($this->date_time);
        return $appointmentDateTime->diffInHours(now()) > 24;
    }
}
