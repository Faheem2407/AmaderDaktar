<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.meta')
    <title>Book Appointment - Dr. {{ $doctor->name }}</title>
</head>
<body>

@php
    use Carbon\Carbon;

    $selectedSlot = request('slot');
    $selectedAvailability = request('availability')
        ? $doctor->doctorAvailabilities->where('id', request('availability'))->first()
        : null;

    // Calculate appointment date based on selected day
    $appointmentDate = null;
    if ($selectedAvailability) {
        $today = Carbon::today();
        $appointmentDate = $today->next($selectedAvailability->day);
    }
@endphp

<div class="main-wrapper">
    @include('doctor.partials.auth-header')

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-12 text-center">
                    <nav class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">
                                    <i class="isax isax-home-15"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Booking</li>
                        </ol>
                        <h2 class="breadcrumb-title">Book Appointment</h2>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="content doctor-content">
        <div class="container">

            <!-- Doctor Info -->
            <div class="card mb-4">
                <div class="card-body d-flex align-items-center">
                    <img class="me-3 rounded" width="80"
                         src="{{ $doctor->avatar ? asset($doctor->avatar) : asset('main_assets/img/doctors/doctor-default.jpg') }}">
                    <div>
                        <h5 class="mb-1">Dr. {{ $doctor->name }}</h5>
                        <p class="mb-0 text-muted">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $doctor->address?->full_address ?? 'Bangladesh' }}
                        </p>
                        <p class="mb-0 fw-semibold">
                            Fee: ৳{{ number_format($doctor->doctorProfile->default_fee, 2) }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Time Slots -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Select Time Slot</h5>
                </div>
                <div class="card-body">
                    @foreach($doctor->doctorAvailabilities as $availability)
                        <h6 class="text-capitalize">{{ $availability->day }}</h6>
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            @foreach($availability->generateTimeSlots() as $slot)
                                <a href="?availability={{ $availability->id }}&slot={{ $slot['start_time'] }}"
                                   class="btn btn-sm {{ $selectedSlot === $slot['start_time'] && request('availability') == $availability->id ? 'btn-primary' : 'btn-outline-primary' }}">
                                    {{ Carbon::createFromFormat('H:i', $slot['start_time'])->format('h:i A') }}
                                </a>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- ================= CONFIRMATION FORM ================= --}}
            @if($selectedSlot && $selectedAvailability)
                <form method="POST" action="{{ route('appointments.store') }}">
                    @csrf

                    <!-- Hidden Booking Data -->
                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                    <input type="hidden" name="availability_id" value="{{ $selectedAvailability->id }}">
                    <input type="hidden" name="appointment_date" value="{{ $appointmentDate->toDateString() }}">
                    <input type="hidden" name="start_time" value="{{ $selectedSlot }}">
                    <input type="hidden" name="end_time"
                           value="{{ Carbon::createFromFormat('H:i', $selectedSlot)
                               ->addMinutes($selectedAvailability->duration)
                               ->format('H:i') }}">

                    <div class="row">

                        <!-- Patient Info -->
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="mb-0">Patient Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input class="form-control" value="{{ auth()->user()->name }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input class="form-control" value="{{ auth()->user()->phone }}" readonly>
                                    </div>

                                    <!-- Appointment Type -->
                                    <div class="mb-3">
                                        <label class="form-label">Appointment Type</label>
                                        <select name="type" class="form-select" required>
                                            <option value="clinic_visit">Clinic Visit</option>
                                            <option value="video_call">Video Call</option>
                                            <option value="audio_call">Audio Call</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Booking Summary -->
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="mb-0">Booking Summary</h5>
                                </div>
                                <div class="card-body">
                                    <p><strong>Date:</strong><br>{{ $appointmentDate->format('d M Y') }}</p>
                                    <p><strong>Time:</strong><br>{{ Carbon::createFromFormat('H:i', $selectedSlot)->format('h:i A') }}</p>
                                    <hr>
                                    <p class="fw-bold mb-0">
                                        Total:
                                        <span class="float-end">
                                            ৳{{ number_format($selectedAvailability->appointment_fee ?? $doctor->doctorProfile->default_fee, 2) }}
                                        </span>
                                    </p>
                                </div>
                            </div>

                            <!-- Confirm Button -->
                            <button type="submit" class="btn btn-primary w-100 fw-semibold">
                                Confirm & Book Appointment
                            </button>
                        </div>

                    </div>
                </form>
            @endif

        </div>
    </div>

    @include('partials.footer')
</div>

<script src="{{ asset('main_assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('main_assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('main_assets/js/script.js') }}"></script>

</body>
</html>
