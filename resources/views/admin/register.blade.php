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
                        <h1>Register</h1>
                        <p class="account-subtitle">Access to our dashboard</p>

                        @if ($errors->any())
                            <div class="alert alert-danger">{{ $errors->first() }}</div>
                        @endif

                        <form action="{{ route('admin.register.submit') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                            </div>

                            <div class="mb-0">
                                <button class="btn btn-primary w-100" type="submit">Register</button>
                            </div>
                        </form>

                        <div class="login-or"><span class="or-line"></span><span class="span-or">or</span></div>

                        <div class="text-center dont-have">Already have an account?
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
