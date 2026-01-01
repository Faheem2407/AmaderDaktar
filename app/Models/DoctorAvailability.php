<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DoctorAvailability extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'day', 'start_time', 'end_time', 'duration', 'interval', 'max_patients', 'appointment_fee', 'is_active'];

    protected $casts = [
        'start_time' => 'string',
        'end_time' => 'string',
        'is_active' => 'boolean',
    ];

    public function generateTimeSlots(): array
    {
        $slots = [];

        $start = Carbon::createFromFormat('H:i', $this->start_time);
        $end = Carbon::createFromFormat('H:i', $this->end_time);

        while ($start->copy()->addMinutes($this->duration)->lte($end)) {
            $slots[] = [
                'start_time' => $start->format('H:i'),
                'end_time' => $start->copy()->addMinutes($this->duration)->format('H:i'),
            ];

            $start->addMinutes($this->interval);
        }

        return $slots;
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function appointments()
    {
        return $this->hasMany(App\Models\Appointment::class, 'availability_id');
    }
}
