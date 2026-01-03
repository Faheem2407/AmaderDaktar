<!DOCTYPE html>
<html lang="en">
<head>
    @include('patient.partials.meta')
    <title>My Appointments</title>
</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->
    @include('patient.partials.header')
    <!-- /Header -->

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}"><i class="isax isax-home-15"></i></a>
                            </li>
                            <li class="breadcrumb-item">Patient</li>
                            <li class="breadcrumb-item active" aria-current="page">Appointments</li>
                        </ol>
                        <h2 class="breadcrumb-title">My Appointments</h2>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <div class="row">

                <!-- Profile Sidebar -->
                <div class="col-lg-4 col-xl-3 theiaStickySidebar">
                    @include('patient.partials.profile-sidebar')
                </div>
                <!-- / Profile Sidebar -->

                <div class="col-lg-8 col-xl-9">
                    <div class="dashboard-header mb-3">
                        <h3>Appointments</h3>
                    </div>

                    <div class="dashboard-card">
                        <div class="dashboard-card-body">

                            <div class="custom-new-table">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Doctor</th>
                                                <th>Date & Time</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($appointments as $appointment)
                                            <tr>
                                                <td>
                                                    <a href="javascript:void(0);">
                                                        <span class="link-primary">{{ $appointment->appointment_id }}</span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('doctor.profile.show', $appointment->doctor->id) }}" class="avatar avatar-sm me-2">
                                                            <img class="avatar-img rounded-3" src="{{ $appointment->doctor->avatar ? asset($appointment->doctor->avatar) : asset('main_assets/img/doctors/doctor-default.jpg') }}" alt="Doctor Image">
                                                        </a>
                                                        <a href="{{ route('doctor.profile.show', $appointment->doctor->id) }}">Dr. {{ $appointment->doctor->name }}</a>
                                                    </h2>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}, {{ \Carbon\Carbon::parse($appointment->start_time)->format('h:i A') }}</td>
                                                <td>{{ ucfirst($appointment->type ?? 'Clinic Visit') }}</td>
                                                <td>
                                                    @php
                                                        $statusClass = [
                                                            'pending' => 'badge-soft-purple',
                                                            'confirmed' => 'badge-soft-success',
                                                            'completed' => 'badge-soft-success',
                                                            'cancelled' => 'badge-soft-danger',
                                                            'no_show' => 'badge-soft-warning'
                                                        ][$appointment->status] ?? 'badge-soft-secondary';
                                                    @endphp
                                                    <span class="badge badge-xs p-2 {{ $statusClass }} inline-flex align-items-center">
                                                        <i class="fa-solid fa-circle me-1 fs-5"></i>
                                                        {{ ucfirst($appointment->status) }}
                                                    </span>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-muted">No appointments found.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <!-- /Page Content -->

    @include('partials.footer')

</div>

<script src="{{ asset('main_assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('main_assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('main_assets/js/script.js') }}"></script>

</body>
</html>
