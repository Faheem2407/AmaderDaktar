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
                        <h1>Login</h1>
                        <p class="account-subtitle">Access to our dashboard</p>

                        @if ($errors->any())
                            <div class="alert alert-danger">{{ $errors->first() }}</div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('admin.login.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary w-100" type="submit">Login</button>
                            </div>
                        </form>

                        <div class="text-center forgotpass"><a href="{{ route('admin.forgot-password') }}">Forgot Password?</a></div>

                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>

                        <div class="text-center dont-have">Don’t have an account? <a href="{{ route('admin.register') }}">Register</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.partials.script')
</body>
</html>
