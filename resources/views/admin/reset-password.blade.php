<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.partials.meta')
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
                        <h1>Reset Password</h1>

                        @if ($errors->any())
                            <div class="alert alert-danger">{{ $errors->first() }}</div>
                        @endif

                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="mb-3">
                                <input class="form-control" type="email" name="email" placeholder="Email" required>
                            </div>

                            <div class="mb-3">
                                <input class="form-control" type="password" name="password" placeholder="New Password" required>
                            </div>

                            <div class="mb-3">
                                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                            </div>

                            <button class="btn btn-primary w-100" type="submit">Reset Password</button>
                        </form>

                        <div class="text-center dont-have">
                            <a href="{{ route('admin.login') }}">Back to Login</a>
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
