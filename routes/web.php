<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\PasswordResetController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\SpecialityController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Doctor\DashboardController as DoctorDashboardController;
use App\Http\Controllers\Patient\DashboardController as PatientDashboardController;
use App\Http\Controllers\Doctor\DoctorProfileSettingsController;
use App\Http\Controllers\Doctor\DoctorAvailabilityController;
use App\Http\Controllers\Patient\AppointmentController;
use App\Http\Controllers\Patient\PatientProfileSettingsController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminPrivilegeController;

Route::get('/', [PageController::class, 'home'])->name('home');

// Admin Auth Routes start
Route::get('/admin/login', [AuthController::class, 'loginPage'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'loginSubmit'])->name('admin.login.submit');

Route::get('/admin/register', [AuthController::class, 'registerPage'])->name('admin.register');
Route::post('/admin/register', [AuthController::class, 'registerSubmit'])->name('admin.register.submit');

Route::get('/admin/forgot-password', [AuthController::class, 'forgotPasswordPage'])->name('admin.forgot-password');
Route::post('/admin/forgot-password', [AuthController::class, 'forgotPasswordSubmit'])->name('admin.forgot-password.submit');

Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::get('/admin/reset-password/{token}', [PasswordResetController::class, 'resetPage'])->name('password.reset');
Route::post('/admin/reset-password', [PasswordResetController::class, 'resetSubmit'])->name('password.update');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
});
// ! Admin Auth Routes end.

Route::get('/patient-register', [RegisterController::class, 'patientRegister'])->name('patient.register');
Route::post('/patient-register', [RegisterController::class, 'patientRegisterPost'])->name('patient.register.post');

Route::get('/doctor/register', [RegisterController::class, 'doctorRegister'])->name('doctor.register');
Route::post('/doctor/register', [RegisterController::class, 'doctorRegisterPost'])->name('doctor.register.post');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink']);
// Reset Password
Route::get('admin/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('admin/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// Dashboard routes
Route::middleware(['auth'])->group(function () {
    Route::get('/doctor/dashboard', [DoctorDashboardController::class, 'index'])->name('doctor.dashboard');
    Route::get('/doctor/profile-settings', [DoctorProfileSettingsController::class, 'index'])->name('doctor.profile-settings');
    Route::put('/doctor/profile-settings', [DoctorProfileSettingsController::class, 'update'])->name('doctor.profile-settings.update');
    Route::get('/doctor/available-timings', [DoctorAvailabilityController::class, 'availability'])->name('doctor.availability');

    // patient
    Route::get('/patient/dashboard', [PatientDashboardController::class, 'index'])->name('patient.dashboard');
    // Patient profile settings
    Route::get('/patient/profile-settings', [PatientProfileSettingsController::class, 'index'])->name('patient.profile-settings');
    Route::put('/patient/profile-settings', [PatientProfileSettingsController::class, 'update'])->name('patient.profile-settings.update');
});

// ==================== ADMIN ROUTES WITH PERMISSION MIDDLEWARE ====================

// Dashboard - requires dashboard permission
Route::prefix('admin')
    ->middleware(['auth', 'admin.access:dashboard'])
    ->group(function () {
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
    });

// Admin Profiles - requires admins.view permission
Route::prefix('admin')
    ->middleware(['auth', 'admin.access:admins.view'])
    ->group(function () {
        Route::get('/admins', [AdminUserController::class, 'index'])->name('admin.admins.index');
    });

Route::prefix('admin')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/admins', [AdminUserController::class, 'index'])
            ->middleware('admin.access:admins.view')
            ->name('admin.admins.index');
        Route::get('/admins/create', [AdminUserController::class, 'create'])
            ->middleware('admin.access:admins.create')
            ->name('admin.admins.create');
        Route::post('/admins', [AdminUserController::class, 'store'])
            ->middleware('admin.access:admins.create')
            ->name('admin.admins.store');
        Route::put('/admins/{admin}', [AdminUserController::class, 'update'])
            ->middleware('admin.access:admins.edit')
            ->name('admin.admins.update');
        Route::delete('/admins/{admin}', [AdminUserController::class, 'destroy'])
            ->middleware('admin.access:admins.delete')
            ->name('admin.admins.destroy');
    });

// Doctors Management - requires doctors.view permission
Route::prefix('admin')
    ->middleware(['auth', 'admin.access:doctors.view'])
    ->group(function () {
        Route::get('doctors', [DoctorController::class, 'index'])->name('admin.doctors.index');
    });

Route::prefix('admin')
    ->middleware(['auth', 'admin.access:doctors.create'])
    ->group(function () {
        Route::post('doctors', [DoctorController::class, 'store'])->name('admin.doctors.store');
    });

Route::prefix('admin')
    ->middleware(['auth', 'admin.access:doctors.edit'])
    ->group(function () {
        Route::put('doctors/{doctor}', [DoctorController::class, 'update'])->name('admin.doctors.update');
        Route::patch('admin/doctors/{doctor}/toggle-approval', [DoctorController::class, 'toggleApproval'])->name('admin.doctors.toggle-approval');
    });

Route::prefix('admin')
    ->middleware(['auth', 'admin.access:doctors.delete'])
    ->group(function () {
        Route::delete('doctors/{doctor}', [DoctorController::class, 'destroy'])->name('admin.doctors.destroy');
        Route::delete('admin/doctors/documents/{document}', [DoctorController::class, 'deleteDocument'])->name('admin.doctors.delete-document');
    });

// Patients Management - requires patients.view permission
Route::prefix('admin')
    ->middleware(['auth', 'admin.access:patients.view'])
    ->group(function () {
        Route::get('/patient-list', [PatientController::class, 'patientsList'])->name('admin.patients');
    });

// Specialities Management - requires specialities.view permission
Route::prefix('admin')
    ->middleware(['auth', 'admin.access:specialities.view'])
    ->group(function () {
        Route::get('/specialities', [SpecialityController::class, 'index'])->name('admin.specialities.index');
    });

Route::prefix('admin')
    ->middleware(['auth', 'admin.access:specialities.create'])
    ->group(function () {
        Route::post('/specialities', [SpecialityController::class, 'store'])->name('admin.specialities.store');
    });

Route::prefix('admin')
    ->middleware(['auth', 'admin.access:specialities.edit'])
    ->group(function () {
        Route::put('/specialities/{speciality}', [SpecialityController::class, 'update'])->name('admin.specialities.update');
    });

Route::prefix('admin')
    ->middleware(['auth', 'admin.access:specialities.delete'])
    ->group(function () {
        Route::delete('/specialities/{speciality}', [SpecialityController::class, 'destroy'])->name('admin.specialities.destroy');
    });

// Settings Management - requires settings.view permission
Route::prefix('admin')
    ->middleware(['auth', 'admin.access:settings.view'])
    ->group(function () {
        Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings.index');
    });

Route::prefix('admin')
    ->middleware(['auth', 'admin.access:settings.edit'])
    ->group(function () {
        Route::post('/settings', [SettingController::class, 'update'])->name('admin.settings.update');
    });

// ==================== PRIVILEGE MANAGEMENT ROUTES ====================

// Privilege Management Routes - requires admins.edit permission
Route::prefix('admin')
    ->middleware(['auth', 'admin.access:privileges.edit'])
    ->group(function () {
        Route::get('/privileges', [AdminPrivilegeController::class, 'index'])->name('admin.privileges.index');
        Route::get('/privileges/{admin}', [AdminPrivilegeController::class, 'show'])->name('admin.privileges.show');
        Route::put('/privileges/{admin}', [AdminPrivilegeController::class, 'update'])->name('admin.privileges.update');
    });

// ==================== FALLBACK ROUTES FOR EXISTING FUNCTIONALITY ====================
// These routes maintain backward compatibility but should eventually use permission middleware

// Fallback for routes that might be accessed directly
Route::prefix('admin')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/doctors/approval/{id}', [DoctorController::class, 'approval'])->name('admin.doctors.approval');
        Route::post('/doctors/status/{id}', [DoctorController::class, 'status'])->name('admin.doctors.status');
        Route::get('/doctors/view/{id}', [DoctorController::class, 'view'])->name('admin.doctors.view');
        // Patient routes
        Route::get('/patients/view/{id}', [PatientController::class, 'view'])->name('admin.patients.view');
        Route::post('/patients/status/{id}', [PatientController::class, 'status'])->name('admin.patients.status');
        // Speciality routes
        Route::get('/specialities/view/{id}', [SpecialityController::class, 'view'])->name('admin.specialities.view');
    });

Route::middleware(['auth'])
    ->prefix('doctor')
    ->name('doctor.')
    ->group(function () {
        Route::get('/dashboard', [DoctorDashboardController::class, 'index'])->name('dashboard');

        Route::get('/profile-settings', [DoctorProfileSettingsController::class, 'index'])->name('profile-settings');
        Route::put('/profile-settings', [DoctorProfileSettingsController::class, 'update'])->name('profile-settings.update');

        Route::get('/availability', [DoctorAvailabilityController::class, 'availability'])->name('availability.index');
        Route::post('/availability', [DoctorAvailabilityController::class, 'store'])->name('availability.store');
        Route::delete('/availability/delete-all-day', [DoctorAvailabilityController::class, 'deleteAllDay'])->name('availability.delete-all-day');
        Route::get('/availability/day-slots', [DoctorAvailabilityController::class, 'getDaySlots'])->name('availability.day-slots');
        Route::post('/availability/update-status', [DoctorAvailabilityController::class, 'updateAvailabilityStatus'])->name('availability.update-status');
    });

/*
|--------------------------------------------------------------------------
| Patient Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('patient')
    ->name('patient.')
    ->group(function () {
        Route::get('/dashboard', [PatientDashboardController::class, 'index'])->name('dashboard');

        Route::get('/profile-settings', [PatientProfileSettingsController::class, 'index'])->name('profile-settings');
        Route::put('/profile-settings', [PatientProfileSettingsController::class, 'update'])->name('profile-settings.update');

        // Appointments
        Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
        Route::get('/appointments/book/{doctor}', [AppointmentController::class, 'create'])->name('appointments.create');
        Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
        Route::post('/appointments/{id}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel');
        Route::get('/appointments/available-slots', [AppointmentController::class, 'getAvailableSlots'])->name('appointments.available-slots');
    });

// Public routes (doctors listing for patients)
Route::get('/doctors', [AppointmentController::class, 'listDoctors'])->name('doctors.list');
Route::get('/doctors/{id}', [AppointmentController::class, 'showDoctor'])->name('doctors.show');
