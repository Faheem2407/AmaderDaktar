<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['name', 'email', 'phone', 'password', 'role', 'avatar', 'is_approved_as_admin', 'is_approved_as_doctor', 'is_super_admin'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
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

    public function hasPermission($permission): bool
    {
        if ($this->is_super_admin) {
            return true;
        }

        if ($this->role !== 'admin') {
            return false;
        }

        $privilege = AdminPrivilege::where('admin_id', $this->id)->first();

        if (!$privilege) {
            return false;
        }

        return in_array($permission, $privilege->permissions);
    }

    public function isSuperAdmin(): bool
    {
        return $this->role === 'admin' && $this->is_super_admin;
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

    public function isDoctor()
    {
        return $this->role === 'doctor';
    }

    public function isPatient()
    {
        return $this->role === 'patient';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
