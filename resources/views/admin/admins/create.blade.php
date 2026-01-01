<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Admin</title>
    @include('admin.partials.meta')
    @include('admin.partials.styles')
</head>
<body>

<div class="main-wrapper">
    @include('admin.partials.header')
    @include('admin.partials.sidebar')

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <h3 class="page-title">Create Admin Profile</h3>
            </div>

            <div class="card">
                <div class="card-body">

                    <form method="POST" action="{{ route('admin.admins.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <button class="btn btn-primary">
                            Create Admin
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@include('admin.partials.scripts')
</body>
</html>
