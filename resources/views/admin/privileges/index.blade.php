<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Privileges</title>
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
                <h3 class="page-title">Manage Admin Privileges</h3>
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
                                        <th>Role</th>
                                        <th>Permissions</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($admins as $admin)
                                        @php
                                            $privilege = \App\Models\AdminPrivilege::where('admin_id', $admin->id)->first();
                                            $permissionCount = $privilege ? count($privilege->permissions) : 0;
                                        @endphp
                                        <tr>
                                            <td>#ADM{{ str_pad($admin->id, 4, '0', STR_PAD_LEFT) }}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>
                                                <span class="badge bg-primary">Admin</span>
                                            </td>
                                            <td>
                                                {{ $permissionCount }} permissions
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.privileges.show', $admin->id) }}"
                                                   class="btn btn-sm btn-primary">
                                                    <i class="fe fe-edit"></i> Manage
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center text-danger fw-bold">
                                            No admins found
                                        </td>
                                    </tr>
                                </tbody>
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
