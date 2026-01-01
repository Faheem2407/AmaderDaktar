<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.meta')
</head>
<body class="account-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        @include('partials.header')
        <!-- /Header -->

        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-8 offset-md-2">

                        <!-- Register Tab Content -->
                        <div class="account-content">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-7 col-lg-6 login-left">
                                    <img src="{{ asset('main_assets/img/login-banner.png') }}" class="img-fluid" alt="Doccure Register">
                                </div>
                                <div class="col-md-12 col-lg-6 login-right">
                                    <div class="login-header">
                                        <h3>
                                            Patient Register
                                            <a href="{{ route('doctor.register') }}">Are you a Doctor?</a>
                                        </h3>
                                    </div>

                                    <form action="{{ route('patient.register.post') }}" method="POST">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Phone</label>
                                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                                            @error('phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="pass-group">
                                                <input type="password" name="password" class="form-control pass-input">
                                                <span class="feather-eye-off toggle-password"></span>
                                            </div>
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <div class="pass-group">
                                                <input type="password" name="password_confirmation" class="form-control pass-input">
                                                <span class="feather-eye-off toggle-password"></span>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <button class="btn btn-primary-gradient w-100" type="submit">
                                                Sign Up
                                            </button>
                                        </div>

                                        <div class="login-or">
                                            <span class="or-line"></span>
                                            <span class="span-or">or</span>
                                        </div>

                                        <div class="account-signup">
                                            <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /Register Tab Content -->

                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Content -->

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
    <!-- /Script Content -->

</body>
</html>
