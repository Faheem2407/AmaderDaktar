<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doccure - Specialities</title>
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
                <div class="row">
                    <div class="col-sm-7 col-auto">
                        <h3 class="page-title">Specialities</h3>
                    </div>
                    <div class="col-sm-5 col">
                        <a href="#AddSpecialityModal" data-bs-toggle="modal" class="btn btn-primary float-end mt-2">Add</a>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Specialities Table -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Speciality</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($specialities as $speciality)
                                        <tr>
                                            <td>#SP{{ $speciality->id }}</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    @if($speciality->image)
                                                    <a class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset($speciality->image) }}" alt="{{ $speciality->name }}">
                                                    </a>
                                                    @endif
                                                    {{ $speciality->name }}
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="actions">
                                                    <a href="#EditSpecialityModal{{ $speciality->id }}" data-bs-toggle="modal" class="btn btn-sm bg-success-light">
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a>
                                                    <a href="#DeleteSpecialityModal{{ $speciality->id }}" data-bs-toggle="modal" class="btn btn-sm bg-danger-light">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="EditSpecialityModal{{ $speciality->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form action="{{ route('admin.specialities.update', $speciality) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Speciality</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label>Name</label>
                                                                <input type="text" name="name" class="form-control" value="{{ $speciality->name }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Image</label>
                                                                <input type="file" name="image" class="form-control">
                                                                @if($speciality->image)
                                                                    <img src="{{ asset('storage/'.$speciality->image) }}" class="img-thumbnail mt-2" width="80">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary w-100">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="DeleteSpecialityModal{{ $speciality->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center">
                                                        <h4>Delete Speciality</h4>
                                                        <p>Are you sure you want to delete <strong>{{ $speciality->name }}</strong>?</p>
                                                        <form method="POST" action="{{ route('admin.specialities.destroy', $speciality) }}">
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
                </div>
            </div>

            <!-- Add Modal -->
            <div class="modal fade" id="AddSpecialityModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route('admin.specialities.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Add Speciality</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary w-100">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Add Modal -->

        </div>
    </div>
</div>

@include('admin.partials.scripts')
</body>
</html>
