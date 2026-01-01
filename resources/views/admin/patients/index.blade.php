<!DOCTYPE html>
<html lang="en">
<head>
    <title>Patient List</title>
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
                <h3 class="page-title">Patients</h3>
            </div>

            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="patientsTable" class="table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Patient</th>
                                    <th>Age</th>
                                    <th>Blood Group</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Joined</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($patients as $patient)
                                    <tr>
                                        <td>#PT{{ str_pad($patient->id, 4, '0', STR_PAD_LEFT) }}</td>

                                        <td>
                                            <h2 class="table-avatar">
                                                <a class="avatar avatar-sm me-2">
                                                    <img class="avatar-img rounded-circle"
                                                         src="{{ $patient->avatar
                                                            ? asset('storage/'.$patient->avatar)
                                                            : asset('assets/img/patients/default-patient.jpg') }}">
                                                </a>
                                                {{ $patient->name }}
                                            </h2>
                                        </td>

                                        <td>
                                            @if($patient->dob)
                                                @php
                                                    $dob = \Carbon\Carbon::parse($patient->dob);
                                                    $diff = $dob->diff(now());
                                                @endphp
                                                {{ $diff->y }}y {{ $diff->m }}m {{ $diff->d }}d
                                            @else
                                                N/A
                                            @endif
                                        </td>

                                        <td>{{ $patient->blood_group ?? 'N/A' }}</td>
                                        <td>{{ $patient->phone ?? 'N/A' }}</td>
                                        <td>{{ ucfirst($patient->gender ?? 'N/A') }}</td>
                                        <td>{{ $patient->created_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

@include('admin.partials.scripts')

{{-- DataTable Init --}}
<script>
    $(document).ready(function () {
        $('#patientsTable').DataTable({
            pageLength: 10,
            ordering: true,
            responsive: true,
            language: {
                emptyTable: "No patients found"
            }
        });
    });
</script>

</body>
</html>
