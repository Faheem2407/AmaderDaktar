<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Profiles</title>
    @include('admin.partials.meta')
    @include('admin.partials.styles')
</head>
<body>

<div class="main-wrapper">
    @include('admin.partials.header')
    @include('admin.partials.sidebar')

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header d-flex justify-content-between">
                <h3 class="page-title">Admin Profiles</h3>
                <a href="{{ route('admin.admins.create') }}" class="btn btn-primary">
                    + Add Admin
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">

                        @if($admins->count() > 0)
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $admin)
                                <tr>
                                    <td>#ADM{{ str_pad($admin->id, 4, '0', STR_PAD_LEFT) }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->created_at->format('d M Y') }}</td>
                                    <td>
                                        <div class="actions">
                                            <a href="#EditAdminModal{{ $admin->id }}" data-bs-toggle="modal"
                                               class="btn btn-sm bg-success-light">
                                                <i class="fe fe-pencil"></i> Edit
                                            </a>
                                            <a href="#DeleteAdminModal{{ $admin->id }}" data-bs-toggle="modal"
                                               class="btn btn-sm bg-danger-light">
                                                <i class="fe fe-trash"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="EditAdminModal{{ $admin->id }}">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form method="POST" action="{{ route('admin.admins.update', $admin) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Admin</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label>Name</label>
                                                        <input type="text" name="name" class="form-control"
                                                               value="{{ $admin->name }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Email</label>
                                                        <input type="email" name="email" class="form-control"
                                                               value="{{ $admin->email }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Phone</label>
                                                        <input type="text" name="phone" class="form-control"
                                                               value="{{ $admin->phone }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Password (optional)</label>
                                                        <input type="password" name="password" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Confirm Password</label>
                                                        <input type="password" name="password_confirmation" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary w-100">
                                                        Update Admin
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="DeleteAdminModal{{ $admin->id }}">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <h4>Delete Admin</h4>
                                                <p>
                                                    Are you sure you want to delete
                                                    <strong>{{ $admin->name }}</strong>?
                                                </p>
                                                <form method="POST" action="{{ route('admin.admins.destroy', $admin) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        Yes, Delete
                                                    </button>
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <table class="table table-hover mb-0">
                                <tr>
                                    <td class="text-center text-danger fw-bold">
                                        No admins found
                                    </td>
                                </tr>
                            </table>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@include('admin.partials.scripts')
</body>
</html>
