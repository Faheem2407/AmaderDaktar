<!DOCTYPE html>
<html lang="en">
    
    <head>
        @include('partials.meta')
    </head>
    
    <body class="account-page">
        <!-- Main Wrapper -->
        <div class="main-wrapper">
            <!-- Header Section -->
            @include('partials.header')
            <!-- /Header Section -->
            <!-- Page Content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <!-- Login Tab Content -->
                            <div class="account-content">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-md-7 col-lg-6 login-left">
                                        <img src="{{ asset('main_assets/img/login-banner.png') }}" class="img-fluid"
                                        alt="Doccure Login">
                                    </div>
                                    <div class="col-md-12 col-lg-6 login-right">
                                        <div class="login-header">
                                            <h3>
                                                Login
                                                <span>
                                                    Doccure
                                                </span>
                                            </h3>
                                        </div>
                                        <form action="{{ route('login.post') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Phone</label>
                                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                                                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-group-flex">
                                                    <label class="form-label">Password</label>
                                                </div>
                                                <div class="pass-group">
                                                    <input type="password" name="password" class="form-control pass-input">
                                                    <span class="feather-eye-off toggle-password"></span>
                                                </div>
                                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="mb-3 form-check-box">
                                                <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                                    <label class="form-check-label" for="remember">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary-gradient w-100" type="submit">Sign in</button>
                                            </div>
                                        </form>

                                        <div class="login-or">
                                            <span class="or-line"></span>
                                            <span class="span-or">or</span>
                                        </div>

                                        <div class="account-signup">
                                            <p>Don't have an account? <a href="{{ route('patient.register') }}">Sign Up</a></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /Login Tab Content -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->
            <!-- Footer Content -->
            @include('partials.footer')
            <!-- /Footer Content -->
            <!-- Cursor -->
            <div class="mouse-cursor cursor-outer">
            </div>
            <div class="mouse-cursor cursor-inner">
            </div>
            <!-- /Cursor -->
        </div>
        <!-- /Main Wrapper -->
        <!-- Script Content -->
        @include('partials.script')
        <!-- /Script Content -->
    </body>

</html>