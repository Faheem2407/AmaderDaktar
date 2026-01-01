<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Privileges - {{ $admin->name }}</title>
    @include('admin.partials.meta')
    @include('admin.partials.styles')
    <style>
        .permission-group {
            margin-bottom: 25px;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
        }
        .permission-group h5 {
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 15px;
            color: #333;
        }
        .permission-item {
            margin-bottom: 10px;
            padding: 8px 15px;
            background: #f8f9fa;
            border-radius: 5px;
            transition: all 0.3s;
        }
        .permission-item:hover {
            background: #e9ecef;
        }
        .permission-item label {
            cursor: pointer;
            margin-bottom: 0;
            font-weight: 500;
        }
        .select-all-btn {
            margin-bottom: 15px;
        }
        .permission-category {
            font-weight: 600;
            color: #495057;
            margin-bottom: 10px;
            padding-left: 10px;
            border-left: 3px solid #28a745;
        }
    </style>
</head>
<body>
<div class="main-wrapper">
    @include('admin.partials.header')
    @include('admin.partials.sidebar')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">
                            Manage Privileges for 
                            <span class="text-primary">{{ $admin->name }}</span>
                        </h3>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('admin.privileges.index') }}" class="btn btn-secondary">
                            <i class="fe fe-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
            </div>
            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Admin Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Name:</strong> {{ $admin->name }}</p>
                                    <p><strong>Email:</strong> {{ $admin->email }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Role:</strong> 
                                        <span class="badge badge-primary">Admin</span>
                                    </p>
                                    <p><strong>Joined:</strong> {{ $admin->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <form action="{{ route('admin.privileges.update', $admin->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Permission Settings</h4>
                                <p class="card-text text-muted mb-0">
                                    Select the permissions you want to grant to this admin.
                                </p>
                            </div>
                            <div class="card-body">
                                @php
                                    $permissionGroups = [
                                        'Dashboard' => ['dashboard'],
                                        'Admins Management' => ['admins.view', 'admins.create', 'admins.edit', 'admins.delete'],
                                        'Doctors Management' => ['doctors.view', 'doctors.create', 'doctors.edit', 'doctors.delete', 'doctors.approve'],
                                        'Patients Management' => ['patients.view', 'patients.edit', 'patients.delete'],
                                        'Specialities Management' => ['specialities.view', 'specialities.create', 'specialities.edit', 'specialities.delete'],
                                        'Settings' => ['settings.view', 'settings.edit'],
                                    ];
                                @endphp
                                
                                @foreach($permissionGroups as $groupName => $groupPermissions)
                                    <div class="permission-group">
                                        <h5>{{ $groupName }}</h5>
                                        <button type="button" 
                                                class="btn btn-sm btn-outline-primary mb-3 select-all-btn" 
                                                data-group="{{ $groupName }}">
                                            Select All
                                        </button>
                                        <div class="row">
                                            @foreach($groupPermissions as $permission)
                                                @if(isset($permissionList[$permission]))
                                                    <div class="col-md-4">
                                                        <div class="permission-item">
                                                            <div class="form-check">
                                                                <input type="checkbox" 
                                                                       class="form-check-input permission-checkbox" 
                                                                       id="perm_{{ $permission }}"
                                                                       name="permissions[]" 
                                                                       value="{{ $permission }}"
                                                                       {{ in_array($permission, $permissions) ? 'checked' : '' }}
                                                                       data-group="{{ $groupName }}">
                                                                <label class="form-check-label" for="perm_{{ $permission }}">
                                                                    {{ $permissionList[$permission] }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                                
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fe fe-save"></i> Save Privileges
                                    </button>
                                    <a href="{{ route('admin.privileges.index') }}" class="btn btn-secondary btn-lg">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.partials.scripts')
<script>
$(document).ready(function() {
    // Select all permissions in a group
    $('.select-all-btn').click(function() {
        const group = $(this).data('group');
        const checkboxes = $(`.permission-checkbox[data-group="${group}"]`);
        const allChecked = checkboxes.length === checkboxes.filter(':checked').length;
        
        checkboxes.prop('checked', !allChecked);
    });

    // Individual checkbox selection
    $('.permission-checkbox').change(function() {
        const group = $(this).data('group');
        const checkboxes = $(`.permission-checkbox[data-group="${group}"]`);
        const allChecked = checkboxes.length === checkboxes.filter(':checked').length;
        
        // Update select all button text
        const selectAllBtn = $(`.select-all-btn[data-group="${group}"]`);
        selectAllBtn.text(allChecked ? 'Deselect All' : 'Select All');
    });

    // Initialize button texts
    $('.select-all-btn').each(function() {
        const group = $(this).data('group');
        const checkboxes = $(`.permission-checkbox[data-group="${group}"]`);
        const allChecked = checkboxes.length === checkboxes.filter(':checked').length;
        
        $(this).text(allChecked ? 'Deselect All' : 'Select All');
    });
});
</script>
</body>
</html>