<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.meta')
</head>
<body>

<div class="main-wrapper">

    <!-- Header -->
    @include('doctor.partials.auth-header')
    <!-- /Header -->

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 text-center">
                    <nav class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('doctor.dashboard') }}">
                                    <i class="isax isax-home-15"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">Doctor</li>
                            <li class="breadcrumb-item active">Doctor Profile</li>
                        </ol>
                        <h2 class="breadcrumb-title">Doctor Profile</h2>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content doctor-content">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-xl-3 theiaStickySidebar">
                    @include('doctor.partials.profile-sidebar')
                </div>

                <div class="col-lg-8 col-xl-9">

                    <div class="dashboard-header">
                        <h3>Profile Settings</h3>
                    </div>

                    <div class="setting-title">
                        <h5>Profile</h5>
                    </div>

                    <form method="POST"
                          action="{{ route('doctor.profile-settings.update') }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Profile Image -->
                        <div class="setting-card">
                            <div class="change-avatar img-upload">
                                <div class="profile-img">
                                    <img
                                        src="{{ $user->avatar ? asset($user->avatar) : asset('main_assets/img/doctors-dashboard/doctor-profile-img.jpg') }}"
                                        alt="Doctor Avatar"
                                        class="img-fluid rounded-circle"
                                        style="width: 120px; height: 120px; object-fit: cover;"
                                    >
                                </div>

                                <div class="upload-img">
                                    <h5>Profile Image</h5>
                                    <div class="imgs-load d-flex align-items-center">
                                        <div class="change-photo">
                                            Upload New
                                            <input type="file"
                                                   name="photo"
                                                   class="upload"
                                                   accept="image/*">
                                        </div>
                                    </div>
                                    <p class="text-muted mt-2">JPG, PNG. Max 4MB</p>
                                </div>
                            </div>
                        </div>


                        <!-- Information -->
                        <div class="setting-title">
                            <h5>Information</h5>
                        </div>

                        <div class="setting-card">
                            <div class="row">

                                <!-- First Name -->
                                <div class="col-lg-4">
                                    <div class="form-wrap">
                                        <label class="form-label">
                                            First Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text"
                                               name="first_name"
                                               class="form-control"
                                               value="{{ old('first_name', explode(' ', $user->name)[0] ?? '') }}"
                                               required>
                                    </div>
                                </div>

                                <!-- Last Name -->
                                <div class="col-lg-4">
                                    <div class="form-wrap">
                                        <label class="form-label">
                                            Last Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text"
                                               name="last_name"
                                               class="form-control"
                                               value="{{ old('last_name', explode(' ', $user->name)[1] ?? '') }}"
                                               required>
                                    </div>
                                </div>

                                <!-- Speciality -->
                                <div class="col-lg-4">
                                    <div class="form-wrap">
                                        <label class="form-label">
                                            Speciality <span class="text-danger">*</span>
                                        </label>
                                        <select name="speciality_id"
                                                class="form-control"
                                                required>
                                            <option value="">Select Speciality</option>
                                            @foreach($specialities as $speciality)
                                                <option value="{{ $speciality->id }}"
                                                    {{ optional($doctorProfile)->speciality_id == $speciality->id ? 'selected' : '' }}>
                                                    {{ $speciality->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="col-lg-4">
                                    <div class="form-wrap">
                                        <label class="form-label">
                                            Phone Number <span class="text-danger">*</span>
                                        </label>
                                        <input type="text"
                                               name="phone"
                                               class="form-control"
                                               value="{{ old('phone', $user->phone) }}"
                                               required>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="modal-btn text-end">
                            <button type="submit" class="btn btn-primary prime-btn">
                                Save Changes
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
    <!-- /Page Content -->

    @include('partials.footer')

</div>

@include('partials.script')

</body>
</html>
