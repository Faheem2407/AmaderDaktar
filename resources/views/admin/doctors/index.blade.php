<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doccure - Doctor List</title>
    @include('admin.partials.meta')
    @include('admin.partials.styles')
</head>
<body>
<div class="main-wrapper">
    @include('admin.partials.header')
    @include('admin.partials.sidebar')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">List of Doctors</h3>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDoctor">
                            + Add Doctor
                        </a>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Doctor Table -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                            <tr>
                                <th>Doctor Name</th>
                                <th>Phone</th>
                                <th>Joined</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($doctors as $doctor)
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a class="avatar avatar-sm me-2">
                                                <img class="avatar-img rounded-circle"
                                                     src="{{ $doctor->doctorProfile?->photo
                                                        ? asset('storage/'.$doctor->doctorProfile->photo)
                                                        : asset('assets/img/doctors/doctor-thumb-01.jpg') }}">
                                            </a>
                                            {{ $doctor->name }}
                                        </h2>
                                    </td>
                                    <td>{{ $doctor->phone }}</td>
                                    <td>{{ $doctor->created_at->format('d M Y') }}</td>
                                    <td>
                                        <span class="badge {{ $doctor->is_approved_as_doctor ? 'bg-success' : 'bg-warning' }}">
                                            {{ $doctor->is_approved_as_doctor ? 'Approved' : 'Pending' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="actions d-flex flex-wrap gap-1">
                                            <!-- Toggle Approval -->
                                            <a class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#toggleApproval{{ $doctor->id }}">
                                                {{ $doctor->is_approved_as_doctor ? 'Reject' : 'Approve' }}
                                            </a>

                                            <!-- Edit -->
                                            <a class="btn btn-sm bg-success-light" data-bs-toggle="modal" data-bs-target="#editDoctor{{ $doctor->id }}">
                                                <i class="fe fe-pencil"></i> Edit
                                            </a>

                                            <!-- Delete -->
                                            <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal" data-bs-target="#deleteDoctor{{ $doctor->id }}">
                                                <i class="fe fe-trash"></i> Delete
                                            </a>

                                            @if(optional(optional($doctor->doctorProfile)->documents)->count() > 0)
                                                <a class="btn btn-sm btn-info-light" data-bs-toggle="modal" data-bs-target="#viewDocs{{ $doctor->id }}">
                                                    <i class="fe fe-file-text"></i> Documents
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <!-- Toggle Approval Modal -->
                                <div class="modal fade" id="toggleApproval{{ $doctor->id }}">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body text-center py-4">
                                                <h4>{{ $doctor->is_approved_as_doctor ? 'Reject' : 'Approve' }} Doctor</h4>
                                                <p>Are you sure you want to {{ $doctor->is_approved_as_doctor ? 'reject' : 'approve' }} <strong>{{ $doctor->name }}</strong>?</p>
                                                <form method="POST" action="{{ route('admin.doctors.toggle-approval', $doctor->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-primary">
                                                        Yes, {{ $doctor->is_approved_as_doctor ? 'Reject' : 'Approve' }}
                                                    </button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- View Documents Modal -->
                                <div class="modal fade" id="viewDocs{{ $doctor->id }}">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5>Documents of {{ $doctor->name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
{{--                                                 @if(optional($doctor->doctorProfile)->documents->count())
                                                    <ul>
                                                        @foreach($doctor->doctorProfile->documents as $doc)
                                                            <li>
                                                                <a href="{{ asset('storage/'.$doc->file) }}" target="_blank">{{ basename($doc->file) }}</a>
                                                                <form method="POST" action="{{ route('admin.doctors.delete-document', $doc->id) }}" class="d-inline ms-2" >
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                                                </form>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <p>No documents available.</p>
                                                @endif --}}

                                                @if(optional(optional($doctor->doctorProfile)->documents)->count() > 0)
                                                    <ul>
                                                        @foreach(optional($doctor->doctorProfile)->documents as $doc)
                                                            <li>
                                                                <a href="{{ asset('storage/' . $doc->file) }}" target="_blank">
                                                                    {{ basename($doc->file) }}
                                                                </a>
                                                                <form method="POST" action="{{ route('admin.doctors.delete-document', $doc->id) }}" class="d-inline ms-2">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger" >
                                                                        Remove
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <p>No documents available.</p>
                                                @endif                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit Doctor Modal -->
                                <div class="modal fade" id="editDoctor{{ $doctor->id }}">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <form method="POST" action="{{ route('admin.doctors.update', $doctor) }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5>Edit Doctor</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label>Name</label>
                                                            <input name="name" class="form-control" value="{{ $doctor->name }}" required>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label>Phone</label>
                                                            <input name="phone" type="phone" class="form-control" value="{{ $doctor->phone }}" required>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label>BMDC No</label>
                                                            <input name="bmdc_no" class="form-control" value="{{ optional($doctor->doctorProfile)->bmdc_no }}">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label>Medical College</label>
                                                            <input name="medical_college" class="form-control" value="{{ optional($doctor->doctorProfile)->medical_college }}">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label>Session</label>
                                                            <input name="session" class="form-control" value="{{ optional($doctor->doctorProfile)->session }}">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label>Post Graduation</label>
                                                            <input name="post_graduation" class="form-control" value="{{ optional($doctor->doctorProfile)->post_graduation }}">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label>Speciality</label>
                                                            <select name="speciality_id" class="form-control" required>
                                                                @foreach($specialities as $spec)
                                                                    <option value="{{ $spec->id }}" @selected(optional($doctor->doctorProfile)->speciality_id == $spec->id)>
                                                                        {{ $spec->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label>Photo</label>
                                                            <input type="file" name="photo" class="form-control">
                                                            @if(optional($doctor->doctorProfile)->photo)
                                                                <img src="{{ asset('storage/'.$doctor->doctorProfile->photo) }}" class="img-thumbnail mt-2" width="100">
                                                            @endif
                                                        </div>

                                                        <!-- Add More Documents -->
                                                        <div class="col-md-12 mb-3">
                                                            <label>Add More Documents</label>
                                                            <input type="file" name="documents[]" multiple class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary w-100">Update Doctor</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Doctor Modal -->
                                <div class="modal fade" id="deleteDoctor{{ $doctor->id }}">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body text-center py-4">
                                                <h4>Delete Doctor</h4>
                                                <p>Are you sure you want to delete <strong>{{ $doctor->name }}</strong>?</p>
                                                <form method="POST" action="{{ route('admin.doctors.destroy', $doctor) }}" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Add Doctor Modal -->
            <div class="modal fade" id="addDoctor">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('admin.doctors.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5>Add New Doctor</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input name="name" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <input name="phone" type="phone" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Password <span class="text-danger">*</span></label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Confirm Password <span class="text-danger">*</span></label>
                                        <input type="password" name="password_confirmation" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>BMDC No</label>
                                        <input name="bmdc_no" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Medical College</label>
                                        <input name="medical_college" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Session</label>
                                        <input name="session" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Post Graduation</label>
                                        <input name="post_graduation" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Speciality <span class="text-danger">*</span></label>
                                        <select name="speciality_id" class="form-control" required>
                                            <option value="">Select Speciality</option>
                                            @foreach($specialities as $spec)
                                                <option value="{{ $spec->id }}">{{ $spec->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Photo</label>
                                        <input type="file" name="photo" class="form-control">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Documents</label>
                                        <input type="file" name="documents[]" multiple class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary w-100">Add Doctor</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@include('admin.partials.scripts')
</body>
</html>
