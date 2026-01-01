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
use App\Http\Controllers\Patient\PatientProfileSettingsController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AdminUserController;


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
    Route::put('/doctor/profile-settings',[DoctorProfileSettingsController::class, 'update'])->name('doctor.profile-settings.update');
    Route::get('/patient/dashboard', [PatientDashboardController::class, 'index'])->name('patient.dashboard');
    // Patient profile settings
    Route::get('/patient/profile-settings', [PatientProfileSettingsController::class, 'index'])->name('patient.profile-settings');
    Route::put('/patient/profile-settings', [PatientProfileSettingsController::class, 'update'])->name('patient.profile-settings.update');
});


Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('doctors', [DoctorController::class, 'index'])->name('admin.doctors.index');
    Route::post('doctors', [DoctorController::class, 'store'])->name('admin.doctors.store');
    Route::put('doctors/{doctor}', [DoctorController::class, 'update'])->name('admin.doctors.update');
    Route::delete('doctors/{doctor}', [DoctorController::class, 'destroy'])->name('admin.doctors.destroy');
    Route::patch('admin/doctors/{doctor}/toggle-approval', [DoctorController::class, 'toggleApproval'])->name('admin.doctors.toggle-approval');
    Route::delete('admin/doctors/documents/{document}', [DoctorController::class, 'deleteDocument'])->name('admin.doctors.delete-document');

    Route::get('/patient-list', [PatientController::class, 'patientsList'])->name('admin.patients');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('admin.settings.update');
});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/specialities', [SpecialityController::class, 'index'])->name('specialities.index');
    Route::post('/specialities', [SpecialityController::class, 'store'])->name('specialities.store');
    Route::put('/specialities/{speciality}', [SpecialityController::class, 'update'])->name('specialities.update');
    Route::delete('/specialities/{speciality}', [SpecialityController::class, 'destroy'])->name('specialities.destroy');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/admins', [AdminUserController::class, 'index'])->name('admin.admins.index');
    Route::get('/admins/create', [AdminUserController::class, 'create'])->name('admin.admins.create');
    Route::post('/admins', [AdminUserController::class, 'store'])->name('admin.admins.store');
});

