<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.partials.meta-header')
</head>
<body>

<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left">
                    <a href="{{ route('home') }}"><img class="img-fluid" src="{{ asset('assets/img/logo.jpeg') }}" alt="Logo"></a>
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Forgot Password?</h1>
                        <p class="account-subtitle">Enter your email to get a password reset link</p>

                        @if ($errors->any())
                            <div class="alert alert-danger">{{ $errors->first() }}</div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('admin.forgot-password.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input class="form-control" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="mb-0">
                                <button class="btn btn-primary w-100" type="submit">Send Reset Link</button>
                            </div>
                        </form>

                        <div class="text-center dont-have">Remember your password?
                            <a href="{{ route('admin.login') }}">Login</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.partials.script')
</body>
</html>
