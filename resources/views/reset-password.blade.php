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

                        <div class="account-content">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-7 col-lg-6 login-left">
                                    <img src="{{ asset('main_assets/img/login-banner.png') }}" class="img-fluid" alt="Doccure Reset Password">
                                </div>
                                <div class="col-md-12 col-lg-6 login-right">
                                    <div class="login-header">
                                        <h3>Reset Password</h3>
                                        <p>Enter your email and new password to reset your password.</p>
                                    </div>

                                    @if(session('status'))
                                        <div class="alert alert-success">{{ session('status') }}</div>
                                    @endif

                                    <form action="{{ route('password.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">

                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input name="email" class="form-control" type="email" value="{{ old('email') }}" required>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">New Password</label>
                                            <input name="password" class="form-control" type="password" required>
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input name="password_confirmation" class="form-control" type="password" required>
                                        </div>

                                        <div class="mb-3">
                                            <button class="btn btn-primary-gradient w-100" type="submit">Reset Password</button>
                                        </div>

                                        <div class="account-signup">
                                            <p>Remember your password? <a href="{{ route('login') }}">Sign In</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

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
