<!DOCTYPE html> 
<html lang="en">
<head>
    @include('partials.meta')
</head>
<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
    
        <!-- Header -->
        @include('patient.partials.auth-header')
        <!-- /Header -->

        <!-- Breadcrumb -->
        <div class="breadcrumb-bar">
            <div class="container">
                <div class="row align-items-center inner-banner">
                    <div class="col-md-12 col-12 text-center">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('patient.dashboard') }}"><i class="isax isax-home-15"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Patient</li>
                                <li class="breadcrumb-item active">Settings</li>
                            </ol>
                            <h2 class="breadcrumb-title">Settings</h2>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-bg">
                <img src="{{ asset('main_assets/img/bg/breadcrumb-bg-01.png') }}" alt="img" class="breadcrumb-bg-01">
                <img src="{{ asset('main_assets/img/bg/breadcrumb-bg-02.png') }}" alt="img" class="breadcrumb-bg-02">
                <img src="{{ asset('main_assets/img/bg/breadcrumb-icon.png') }}" alt="img" class="breadcrumb-bg-03">
                <img src="{{ asset('main_assets/img/bg/breadcrumb-icon.png') }}" alt="img" class="breadcrumb-bg-04">
            </div>
        </div>
        <!-- /Breadcrumb -->
        
        <!-- Page Content -->
        <div class="content">
            <div class="container">
                <div class="row">
                
                    <div class="col-lg-4 col-xl-3 theiaStickySidebar">
                        <!-- Profile Sidebar -->
                        @include('patient.partials.profile-sidebar')
                        <!-- /Profile Sidebar -->                       
                    </div>
                    
                    <div class="col-lg-8 col-xl-9">
                        {{-- <nav class="settings-tab mb-1">
                            <ul class="nav nav-tabs-bottom" role="tablist">
                                 <li class="nav-item" role="presentation">
                                    <a class="nav-link active" href="#">Profile</a>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <a class="nav-link" href="#">Change Password</a>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                     <a class="nav-link" href="#">2 Factor Authentication</a>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                     <a class="nav-link" href="#">Delete Account</a>
                                 </li>
                            </ul>
                        </nav> --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="border-bottom pb-3 mb-3">
                                    <h5>Profile Settings</h5>
                                </div>

                                <form action="{{ route('patient.profile-settings.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="setting-card">
                                        <label class="form-label mb-2">Profile Photo</label>
                                        <div class="change-avatar img-upload">
                                            <div class="profile-img">
                                                @if($user->avatar)
                                                    <img src="{{ asset($user->avatar) }}" alt="User Image">
                                                @else
                                                    <i class="fa-solid fa-file-image"></i>
                                                @endif
                                            </div>
                                            <div class="upload-img">
                                                <div class="imgs-load d-flex align-items-center">
                                                    <div class="change-photo">
                                                        Upload New 
                                                        <input type="file" name="avatar" class="upload">
                                                    </div>
                                                    @if($user->avatar)
                                                        <a href="#" class="upload-remove" onclick="event.preventDefault(); document.getElementById('remove-avatar').submit();">Remove</a>
                                                    @endif
                                                </div>
                                                <p>Your Image should be below 4 MB. Accepted formats: jpg, png, svg</p>
                                            </div>          
                                        </div>
                                    </div>

                                    <div class="setting-title">
                                        <h6>Information</h6>
                                    </div>

                                    <div class="setting-card">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="first_name" class="form-control"
                                                           value="{{ old('first_name', explode(' ', $user->name)[0] ?? '') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="last_name" class="form-control"
                                                           value="{{ old('last_name', explode(' ', $user->name)[1] ?? '') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                                    <input type="date" name="dob" class="form-control"
       value="{{ old('dob', $user->dob ? \Carbon\Carbon::parse($user->dob)->format('Y-m-d') : '') }}">

                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                                    <input type="text" name="phone" class="form-control"
                                                           value="{{ old('phone', $user->phone) }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Gender</label>
                                                    <select name="gender" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="male" {{ $user->gender=='male'?'selected':'' }}>Male</option>
                                                        <option value="female" {{ $user->gender=='female'?'selected':'' }}>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Blood Group</label>
                                                    <select name="blood_group" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="A+ve" {{ old('blood_group', $user->blood_group ?? '')=='A+ve'?'selected':'' }}>A+ve</option>
                                                        <option value="A-ve" {{ old('blood_group', $user->blood_group ?? '')=='A-ve'?'selected':'' }}>A-ve</option>
                                                        <option value="B+ve" {{ old('blood_group', $user->blood_group ?? '')=='B+ve'?'selected':'' }}>B+ve</option>
                                                        <option value="B-ve" {{ old('blood_group', $user->blood_group ?? '')=='B-ve'?'selected':'' }}>B-ve</option>
                                                        <option value="AB+ve" {{ old('blood_group', $user->blood_group ?? '')=='AB+ve'?'selected':'' }}>AB+ve</option>
                                                        <option value="AB-ve" {{ old('blood_group', $user->blood_group ?? '')=='AB-ve'?'selected':'' }}>AB-ve</option>
                                                        <option value="O+ve" {{ old('blood_group', $user->blood_group ?? '')=='O+ve'?'selected':'' }}>O+ve</option>
                                                        <option value="O-ve" {{ old('blood_group', $user->blood_group ?? '')=='O-ve'?'selected':'' }}>O-ve</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="setting-title">
                                        <h6>Address</h6>
                                    </div>






                                    <div class="setting-card">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" name="address" value="{{ old('address', $address->address ?? '') }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">City</label>
                                                    <input type="text" name="city" value="{{ old('city', $address->city ?? '') }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">District</label>
                                                    <input type="text" name="district" value="{{ old('district', $address->district ?? '') }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Country</label>
                                                    <input type="text" name="country" value="{{ old('country', $address->country ?? '') }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Pincode</label>
                                                    <input type="text" name="pincode" value="{{ old('pincode', $address->pincode ?? '') }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-btn text-end">
                                        <a href="#" class="btn btn-md btn-light rounded-pill">Cancel</a>
                                        <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Save Changes</button>
                                    </div>
                                </form>

                            </div>
                        </div>
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
