@php
    $user = auth()->user();

    $doctorProfile = \App\Models\DoctorProfile::with('speciality')
        ->where('user_id', $user->id)
        ->first();

    $avatar = $user->avatar
        ? asset($user->avatar)
        : asset('main_assets/img/doctors-dashboard/doctor-profile-img.jpg');

    $speciality = $doctorProfile?->speciality?->name ?? 'Not Set';
@endphp


<!-- Profile Sidebar -->
<div class="profile-sidebar doctor-sidebar profile-sidebar-new">

    <!-- Profile Widget -->
    <div class="widget-profile pro-widget-content">
        <div class="profile-info-widget">
            <a href="{{ route('doctor.dashboard') }}" class="booking-doc-img">
                <img src="{{ $avatar }}" alt="Doctor Image">
            </a>

            <div class="profile-det-info">
                <h3>
                    <a href="{{ route('doctor.dashboard') }}">
                        {{ $user->name }}
                    </a>
                </h3>

                <div class="patient-details">
                    <h5 class="mb-0">{{ $speciality }}</h5>
                </div>

                <span class="badge doctor-role-badge">
                    <i class="fa-solid fa-circle"></i> Doctor
                </span>
            </div>
        </div>
    </div>
    <!-- /Profile Widget -->

    <!-- Availability -->
    <div class="doctor-available-head">
        <div class="input-block input-block-new">
            <label class="form-label">
                Availability <span class="text-danger">*</span>
            </label>
            <select class="form-control">
                <option>I am Available Now</option>
                <option>Not Available</option>
            </select>
        </div>
    </div>
    <!-- /Availability -->

    <!-- Dashboard Menu -->
    <div class="dashboard-widget">
        <nav class="dashboard-menu">
            <ul>

                <li class="{{ request()->routeIs('doctor.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('doctor.dashboard') }}">
                        <i class="isax isax-category-2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="isax isax-clipboard-tick"></i>
                        <span>Requests</span>
                        <small class="unread-msg">2</small>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="isax isax-calendar-1"></i>
                        <span>Appointments</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="isax isax-calendar-tick"></i>
                        <span>Available Timings</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa-solid fa-user-injured"></i>
                        <span>My Patients</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="isax isax-clock"></i>
                        <span>Specialties & Services</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="isax isax-star-1"></i>
                        <span>Reviews</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="isax isax-profile-tick"></i>
                        <span>Accounts</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="isax isax-document-text"></i>
                        <span>Invoices</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa-solid fa-money-bill-1"></i>
                        <span>Payout Settings</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="isax isax-messages-1"></i>
                        <span>Message</span>
                        <small class="unread-msg">7</small>
                    </a>
                </li>

                <li class="{{ request()->routeIs('doctor.profile-settings*') ? 'active' : '' }}">
                    <a href="{{ route('doctor.profile-settings') }}">
                        <i class="isax isax-setting-2"></i>
                        <span>Profile Settings</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span>Social Media</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="isax isax-key"></i>
                        <span>Change Password</span>
                    </a>
                </li>

                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="isax isax-logout"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
    <!-- /Dashboard Menu -->

</div>
<!-- /Profile Sidebar -->
