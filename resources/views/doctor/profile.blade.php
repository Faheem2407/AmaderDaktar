<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.meta')
    <style>
        .doctor-stats{list-style:none;padding:0;margin:0;display:flex;gap:15px;flex-wrap:wrap}
        .doctor-stats li{min-width:160px;background:#f8f9fa;border-radius:12px;padding:12px 16px;display:flex;align-items:center;gap:12px;box-shadow:0 2px 6px rgba(0,0,0,.05);transition:.2s ease}
        .doctor-stats li:hover{transform:translateY(-3px);box-shadow:0 6px 12px rgba(0,0,0,.1)}
        .stat-icon{width:45px;height:45px;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0}
        .bg-blue{background:#007bff}
        .bg-dark-blue{background:#004085}
        .bg-green{background:#28a745}
        .stat-info h5{margin:0;font-size:1rem;font-weight:600}
        .stat-info p{margin:0;font-size:.85rem;color:#6c757d}
        .bottom-book-btn{background:#f1f3f5;padding:12px 18px;border-radius:12px;display:flex;align-items:center;gap:40px;box-shadow:0 2px 6px rgba(0,0,0,.05)}
        .session-price span{font-weight:700}
        .apt-btn{font-weight:600;border-radius:8px}
        .business-hours-list{list-style:none;padding:0;margin:0}
        .business-hours-list li{padding:12px 0;border-bottom:1px solid #e9ecef;display:flex;justify-content:space-between;align-items:center;font-size:.95rem}
        .business-hours-list li:last-child{border-bottom:none}
        .day-name{font-weight:600;text-transform:capitalize}
        .time-range{font-weight:500;color:#495057}
        @media (max-width:768px){.doc-profile-card-bottom{flex-direction:column;align-items:flex-start;gap:20px}}
    </style>
</head>
<body>
<div class="main-wrapper">
@include('doctor.partials.auth-header')
<div class="breadcrumb-bar">
    <div class="container text-center">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="isax isax-home-15"></i></a></li>
                <li class="breadcrumb-item active">Doctor Profile</li>
            </ol>
            <h2 class="breadcrumb-title">Doctor Profile</h2>
        </nav>
    </div>
</div>
<div class="content">
<div class="container">
<div class="card doc-profile-card mb-4">
<div class="card-body">
<div class="doctor-widget d-flex flex-wrap w-100">
<div class="doc-info-left d-flex">
    <div class="doctor-img me-3">
        <img src="{{ $doctor->avatar ? asset($doctor->avatar) : asset('main_assets/img/doctors/doctor-default.jpg') }}" class="img-fluid" alt="{{ $doctor->name }}">
    </div>
    <div class="doc-info-cont">
        <span class="badge doc-avail-badge"><i class="fa-solid fa-circle"></i>{{ $doctor->doctorProfile->is_available ? 'Available' : 'Unavailable' }}</span>
        <h4 class="doc-name">Dr. {{ $doctor->name }}
            @if($doctor->doctorProfile->speciality)
                <span class="badge doctor-role-badge"><i class="fa-solid fa-circle"></i>{{ $doctor->doctorProfile->speciality->name }}</span>
            @endif
        </h4>
        <p>{{ $doctor->doctorProfile->post_graduation ?? '' }}</p>
        <p>Speaks : English, Bengali</p>
        <p class="address-detail"><i class="feather-map-pin"></i>{{ $doctor->address?->full_address ?? 'Bangladesh' }}</p>
    </div>
</div>
<div class="doc-info-right ms-auto">
    <div class="rating d-flex align-items-center gap-2">
        @for($i=1;$i<=5;$i++)<i class="fas fa-star" style="color:#ffc107"></i>@endfor
        <strong>5.0</strong>
        <a href="#review">({{ $doctor->reviewsReceived()->count() }}) Reviews</a>
    </div>
</div>
<div class="doc-profile-card-bottom mt-4 d-flex justify-content-between align-items-center flex-wrap w-100">
    <ul class="doctor-stats">
        <li><span class="stat-icon bg-blue"><img src="{{ asset('main_assets/img/icons/calendar3.svg') }}" width="22"></span>
            <div class="stat-info"><h5>{{ $doctor->appointmentsAsDoctor()->count() }}+</h5><p>Appointments</p></div>
        </li>
        <li><span class="stat-icon bg-dark-blue"><img src="{{ asset('main_assets/img/icons/bullseye.svg') }}" width="22"></span>
            <div class="stat-info"><h5>{{ $doctor->doctorProfile->years_of_experience ?? 0 }} Years</h5><p>Experience</p></div>
        </li>
        <li><span class="stat-icon bg-green"><img src="{{ asset('main_assets/img/icons/bookmark-star.svg') }}" width="22"></span>
            <div class="stat-info"><h5>{{ $doctor->doctorProfile->total_awards ?? 0 }}</h5><p>Awards</p></div>
        </li>
    </ul>
    <div class="bottom-book-btn">
        <p class="session-price mb-0"><span class="text-primary">৳{{ number_format($doctor->doctorProfile->default_fee ?? 0,2) }}</span> per Session</p>
        <a href="{{ route('booking.create', $doctor->id) }}" class="btn btn-primary apt-btn">Book Appointment</a>
    </div>
</div>
</div>
</div>
</div>
<div class="doctors-detailed-info">
<ul class="information-title-list">
    <li class="active"><a href="#doc_bio">Doctor Bio</a></li>
    <li><a href="#business_hours">Availability</a></li>
    <li><a href="#review">Reviews</a></li>
</ul>
<div class="doc-information-main">
<div class="doc-information-details" id="doc_bio">
    <div class="detail-title"><h4>Doctor Bio</h4></div>
    <p>{{ $doctor->doctorProfile->bio ?? 'No bio available.' }}</p>
</div>
<div class="doc-information-details" id="business_hours">
    <div class="detail-title"><h4>Business Hours</h4></div>
    <ul class="business-hours-list">
        @foreach(['monday','tuesday','wednesday','thursday','friday','saturday','sunday'] as $day)
            @php $availability = $doctor->doctorAvailabilities->where('day', $day)->first(); @endphp
            <li><span class="day-name">{{ ucfirst($day) }}</span>
            @if($availability)<span class="time-range">{{ \Carbon\Carbon::parse($availability->start_time)->format('h:i A') }} – {{ \Carbon\Carbon::parse($availability->end_time)->format('h:i A') }}</span>
            @else<span class="text-muted">Not Available</span>@endif</li>
        @endforeach
    </ul>
</div>
<div class="doc-information-details" id="review">
    <div class="detail-title"><h4>Reviews ({{ $doctor->reviewsReceived()->count() }})</h4></div>
    @php $reviews = $doctor->reviewsReceived()->latest()->get(); @endphp
    @if($reviews->isEmpty())
        <p class="text-muted">No reviews yet. Be the first to review this doctor!</p>
    @else
        @foreach($reviews as $review)
            <div class="doc-review-card mb-3 p-3 border rounded" style="background:#f8f9fa">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <strong>{{ $review->patient->name }}</strong>
                    <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                </div>
                <div class="mb-2">
                    @for($i=1; $i<=5; $i++)
                        @if($i <= $review->rating)<i class="fas fa-star text-warning"></i>
                        @else<i class="far fa-star text-warning"></i>@endif
                    @endfor
                </div>
                <p class="mb-0">{{ $review->comment ?? '-' }}</p>
            </div>
        @endforeach
    @endif
</div>
</div>
</div>
</div>
@include('partials.footer')
</div>
<script src="{{ asset('main_assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('main_assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('main_assets/js/script.js') }}"></script>
</body>
</html>
