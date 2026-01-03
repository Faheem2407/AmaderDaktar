<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .time-slots li {
            position: relative;
            padding: 10px 15px;
            margin-bottom: 8px;
            background: #f8f9fa;
            border-radius: 8px;
            list-style: none;
            border-left: 4px solid #2E6FF0;
        }

        .slot-space {
            background: #e9ecef;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            color: #6c757d;
            margin-left: 8px;
        }

        .loading {
            display: none;
            text-align: center;
            padding: 30px;
        }

        .add-slot,
        .del-slot {
            cursor: pointer;
            font-weight: 500;
            padding: 6px 12px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .add-slot {
            color: #2E6FF0;
            background: rgba(46, 111, 240, 0.1);
        }

        .add-slot:hover {
            background: rgba(46, 111, 240, 0.2);
        }

        .del-slot {
            color: #dc3545;
            background: rgba(220, 53, 69, 0.1);
        }

        .del-slot:hover {
            background: rgba(220, 53, 69, 0.2);
        }

        .time-slots {
            padding-left: 0;
            margin-bottom: 0;
        }

        .availability-status .form-select {
            border-radius: 8px;
            border-color: #e5e7eb;
            padding: 10px 15px;
        }

        .nav-tabs .nav-link {
            color: #6c757d;
            border: none;
            padding: 12px 20px;
            border-radius: 8px 8px 0 0;
        }

        .nav-tabs .nav-link.active {
            color: #2E6FF0;
            background: #fff;
            border-bottom: 3px solid #2E6FF0;
        }

        .tab-pane {
            background: #fff;
            padding: 20px;
            border-radius: 0 8px 8px 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .slot-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 15px;
            background: #f8f9fa;
            border-radius: 8px;
            margin-bottom: 8px;
            border-left: 4px solid #2E6FF0;
        }

        .slot-time {
            font-weight: 600;
            color: #2D3748;
        }

        .slot-details {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .slot-badge {
            background: rgba(46, 111, 240, 0.1);
            color: #2E6FF0;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
        }
    </style>
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header Section -->
        @include('doctor.partials.auth-header')
        <!-- /Header Section -->

        <!-- Breadcrumb -->
        <div class="breadcrumb-bar">
            <div class="container">
                <div class="row align-items-center inner-banner">
                    <div class="col-md-12 col-12 text-center">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('doctor.dashboard') }}"><i
                                            class="isax isax-home-15"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Doctor</li>
                                <li class="breadcrumb-item active">Available Slots</li>
                            </ol>
                            <h2 class="breadcrumb-title">Available Slots</h2>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-bg">
                <img src="{{ asset('main_assets/img/bg/breadcrumb-bg-01.png') }}" alt="img"
                    class="breadcrumb-bg-01">
                <img src="{{ asset('main_assets/img/bg/breadcrumb-bg-02.png') }}" alt="img"
                    class="breadcrumb-bg-02">
                <img src="{{ asset('main_assets/img/bg/breadcrumb-icon.png') }}" alt="img"
                    class="breadcrumb-bg-03">
                <img src="{{ asset('main_assets/img/bg/breadcrumb-icon.png') }}" alt="img"
                    class="breadcrumb-bg-04">
            </div>
        </div>
        <!-- /Breadcrumb -->

        <!-- Page Content -->
        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 col-xl-3 theiaStickySidebar">

                        <!-- Profile Sidebar -->
                        @include('doctor.partials.profile-sidebar')
                        <!-- /Profile Sidebar -->

                    </div>

                    <div class="col-lg-8 col-xl-9">
                        <div class="dashboard-card">
                            <div class="dashboard-card-head">
                                <div class="header-title">
                                    <h5>Manage Available Slots</h5>
                                </div>
                            </div>
                            <div class="dashboard-card-body">

                                <div class="availability-status mb-4">
                                    <label class="form-label fw-semibold mb-2">Availability Status</label>
                                    <select class="form-select" id="availability-status">
                                        <option value="1"
                                            {{ Auth::user()->doctorProfile && Auth::user()->doctorProfile->is_available ? 'selected' : '' }}>
                                            I am Available Now
                                        </option>
                                        <option value="0"
                                            {{ Auth::user()->doctorProfile && !Auth::user()->doctorProfile->is_available ? 'selected' : '' }}>
                                            Not Available
                                        </option>
                                    </select>
                                </div>

                                <div class="slot-management">
                                    <ul class="nav nav-tabs mb-3">
                                        @foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                                            <li class="nav-item">
                                                <a class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                    data-bs-toggle="tab" href="#{{ $day }}">
                                                    {{ ucfirst($day) }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <div class="tab-content">
                                        @foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                                id="{{ $day }}">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h6 class="mb-0">{{ ucfirst($day) }} Slots</h6>
                                                    <div>
                                                        <span class="add-slot me-2" data-day="{{ $day }}">
                                                            <i class="fa-solid fa-plus me-1"></i> Add Slot
                                                        </span>
                                                        <span class="del-slot" data-day="{{ $day }}">
                                                            <i class="fa-solid fa-trash me-1"></i> Delete All
                                                        </span>
                                                    </div>
                                                </div>

                                                <div id="{{ $day }}-slots" class="position-relative">
                                                    <div class="loading">
                                                        <div class="spinner-border spinner-border-sm text-primary"
                                                            role="status"></div>
                                                        <span class="ms-2">Loading...</span>
                                                    </div>
                                                    @php
                                                        $dayAvailabilities = $availabilities[$day] ?? collect();
                                                    @endphp
                                                    @include('doctor.partials.time-slots', [
                                                        'dayAvailabilities' => $dayAvailabilities,
                                                        'day' => $day,
                                                    ])
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Content -->

        <!-- Add Slot Modal -->
        <div class="modal fade" id="addSlotModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form id="add-slot-form">
                        @csrf
                        <input type="hidden" id="slot-day" name="day">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Time Slot</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Start Time</label>
                                    <input type="time" class="form-control" name="start_time" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">End Time</label>
                                    <input type="time" class="form-control" name="end_time" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Duration (minutes)</label>
                                    <input type="number" class="form-control" name="duration" value="30"
                                        min="10" max="120" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Interval (minutes)</label>
                                    <input type="number" class="form-control" name="interval" value="30"
                                        min="10" max="120" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Max Patients per Slot</label>
                                    <input type="number" class="form-control" name="max_patients" value="1"
                                        min="1" max="10" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Appointment Fee ($)</label>
                                    <input type="number" class="form-control" name="appointment_fee" min="0"
                                        step="0.01">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" id="submit-slot-btn">Add Slot</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteSlotModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center py-4">
                        <div class="modal-icon mb-3">
                            <i class="fa-solid fa-triangle-exclamation text-warning" style="font-size: 48px;"></i>
                        </div>
                        <h5 class="mb-3">Delete All Slots?</h5>
                        <p class="mb-4">Are you sure you want to remove <strong>all slots</strong> for <strong
                                id="delete-day-name"></strong>? This action cannot be undone.</p>
                        <div class="d-flex justify-content-center gap-2">
                            <button type="button" class="btn btn-danger px-4" id="confirm-delete">Yes,
                                Delete</button>
                            <button type="button" class="btn btn-secondary px-4"
                                data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Content -->
        @include('partials.footer')
        <!-- /Footer Content -->

        <!-- Cursor -->
        <div class="mouse-cursor cursor-outer"></div>
        <div class="mouse-cursor cursor-inner"></div>
        <!-- /Cursor -->

    </div>
    <!-- /Main Wrapper -->

    <!-- Script Content -->
    @include('partials.script')

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            let currentDay = '';
            let addSlotModal = new bootstrap.Modal(document.getElementById('addSlotModal'));
            let deleteSlotModal = new bootstrap.Modal(document.getElementById('deleteSlotModal'));

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Availability status
            $('#availability-status').change(function() {
                $.post("{{ route('doctor.availability.update-status') }}", {
                        is_available: $(this).val()
                    })
                    .done(res => toastr[res.success ? 'success' : 'error'](res.message))
                    .fail(() => toastr.error('Failed to update status'));
            });

            // Add Slot
            $(document).on('click', '.add-slot', function() {
                currentDay = $(this).data('day');
                $('#slot-day').val(currentDay);
                $('#add-slot-form')[0].reset();
                $('input[name="duration"]').val(30);
                $('input[name="interval"]').val(30);
                $('input[name="max_patients"]').val(1);
                $('input[name="appointment_fee"]').val('');
                addSlotModal.show();
            });

            // Delete Slot
            $(document).on('click', '.del-slot', function() {
                currentDay = $(this).data('day');
                $('#delete-day-name').text(currentDay.charAt(0).toUpperCase() + currentDay.slice(1));
                deleteSlotModal.show();
            });

            // Confirm Delete
            $('#confirm-delete').click(function() {
                $.ajax({
                    url: "{{ route('doctor.availability.delete-all-day') }}",
                    type: 'DELETE',
                    data: {
                        day: currentDay
                    },
                    beforeSend: function() {
                        $('#' + currentDay + '-slots .loading').show();
                    },
                    success: function(res) {
                        if (res.success) {
                            toastr.success(res.message);
                            $('#' + currentDay + '-slots').html(res.html || '');
                        } else toastr.error(res.message || 'Failed to delete slots');
                        deleteSlotModal.hide();
                    },
                    error: function() {
                        toastr.error('Failed to delete slots');
                    },
                    complete: function() {
                        $('#' + currentDay + '-slots .loading').hide();
                    }
                });
            });

$('#add-slot-form').submit(function(e) {
    e.preventDefault();
    const day = $('#slot-day').val();
    const submitBtn = $('#submit-slot-btn');
    const originalText = submitBtn.html();

    // Collect form data as an array of one slot (you can extend this for multiple slots)
    const slotData = [{
        start_time: $('input[name="start_time"]').val(),
        end_time: $('input[name="end_time"]').val(),
        duration: $('input[name="duration"]').val(),
        interval: $('input[name="interval"]').val(),
        max_patients: $('input[name="max_patients"]').val(),
        appointment_fee: $('input[name="appointment_fee"]').val(),
    }];

    submitBtn.prop('disabled', true).html(
        '<i class="fa-solid fa-spinner fa-spin me-2"></i>Adding...'
    );

    $.ajax({
        url: "{{ route('doctor.availability.store') }}",
        type: 'POST',
        data: {
            day: day,
            slots: slotData,
        },
        success: function(res) {
            if (res.success) {
                toastr.success(res.message);
                $('#' + day + '-slots').html(res.html || '');
                addSlotModal.hide();
            } else {
                toastr.error(res.message || 'Failed to add slot');
            }
        },
        error: function(xhr) {
            let msg = xhr.responseJSON?.errors ? Object.values(xhr.responseJSON.errors)[0][0] : 'Failed to add slot';
            toastr.error(msg);
        },
        complete: function() {
            submitBtn.prop('disabled', false).html(originalText);
        }
    });
});

        });
    </script>
    <!-- /Script Content -->
</body>

</html>
