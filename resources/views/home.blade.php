<!DOCTYPE html>
<html lang="en">
<head>
    @include('home-partials.meta')
    @include('home-partials.style')
</head>
<body>
<div class="main-wrapper home-three">

    @include('home-partials.header')
    @include('home-partials.banner')

    <!-- Specialities Section -->
    <section class="clinics-section">
        <div class="shapes">
            <img src="{{ asset('main_assets/img/shapes/shape-1.png') }}" alt="shape-image" class="img-fluid shape-1">
            <img src="{{ asset('main_assets/img/shapes/shape-2.png') }}" alt="shape-image" class="img-fluid shape-2">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 aos" data-aos="fade-up">
                    <div class="section-heading">
                        <h2>Specialities</h2>
                        <p>Access to expert physicians and surgeons, advanced technologies and top-quality surgery facilities right here.</p>
                    </div>
                </div>
                <div class="col-md-6 text-end aos" data-aos="fade-up">
                    <div class="owl-nav slide-nav-1 text-end nav-control"></div>
                </div>
            </div>
            <div class="owl-carousel clinics owl-theme aos" data-aos="fade-up">
                @foreach($specialities as $speciality)
                    <div class="item">
                        <div class="clinic-item">
                            <div class="clinics-card">
                                <div class="clinics-img">
                                    <img src="{{ $speciality->image ? asset($speciality->image) : asset('main_assets/img/clinic/clinic-default.jpg') }}" alt="clinic-image" class="img-fluid">
                                </div>
                                <div class="clinics-info">
                                    <span class="clinic-img">
                                        <img src="{{ $speciality->image ? asset($speciality->image) : asset('main_assets/img/category/category-default.svg') }}" alt="{{ $speciality->name }}" class="img-fluid">
                                    </span>
                                    <a href="#"><span>{{ $speciality->name }}</span></a>
                                </div>
                            </div>
                            <div class="clinics-icon">
                                <a href="#"><i class="isax isax-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Specialities Section -->

    <!-- Browse by Specialities Section -->
    <section class="specialities-section">
        <div class="shapes">
            <img src="{{ asset('main_assets/img/shapes/shape-3.png') }}" alt="shape-image" class="img-fluid shape-3">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 aos" data-aos="fade-up">
                    <div class="section-heading bg-area">
                        <h2>Browse by Specialities</h2>
                        <p>Find experienced doctors across all specialties</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($specialities as $speciality)
                    <div class="col-xl-3 col-lg-4 col-md-6 aos" data-aos="fade-up">
                        <div class="specialist-card d-flex">
                            <div class="specialist-img">
                                <img src="{{ $speciality->image ? asset($speciality->image) : asset('main_assets/img/category/category-default.svg') }}" alt="{{ $speciality->name }}" class="img-fluid">
                            </div>
                            <div class="specialist-info">
                                <a href="#">
                                    <h4>{{ $speciality->name }}</h4>
                                </a>
                                <p>{{ $speciality->doctors()->count() }} Doctors</p>
                            </div>
                            <div class="specialist-nav ms-auto">
                                <a href="#"><i class="isax isax-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Browse by Specialities Section -->

    <!-- Best Doctor Section -->
    <section class="our-doctors-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-heading">
                        <h2>Book Our Best Doctor</h2>
                        <p>Meet our experts & book online</p>
                    </div>
                </div>
            </div>

            <div class="owl-carousel our-doctors owl-theme">
                @forelse($doctors as $doctor)
                    @php $profile = $doctor->doctorProfile; @endphp
                    <div class="item">
                        <div class="our-doctors-card">
                            <div class="doctors-header">
                                <img src="{{ $doctor->avatar ? asset($doctor->avatar) : asset('main_assets/img/doctors/doctor-default.jpg') }}" alt="{{ $doctor->name }}" class="img-fluid">
                                <div class="img-overlay">
                                    <span>৳{{ number_format($profile->default_fee ?? 0, 2) }}</span>
                                </div>
                            </div>

                            <div class="doctors-body">
                                <h4>{{ $doctor->name }}</h4>
                                <p>{{ $profile?->speciality?->name ?? 'Specialist Doctor' }}</p>

                                <div class="location d-flex">
                                    <p><i class="isax isax-location5"></i> Bangladesh</p>
                                    <p class="ms-auto">
                                        <i class="isax isax-user"></i> {{ $doctor->appointmentsAsDoctor()->count() }} Consultations
                                    </p>
                                </div>

                                <div class="row row-sm">
                                    <div class="col-6">
                                        <a href="{{ route('doctor.profile.show', $doctor->id) }}" class="btn btn-dark w-100">View Profile</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ route('booking.create', $doctor->id) }}" class="btn btn-primary w-100">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center py-5">No doctors available</p>
                @endforelse
            </div>
        </div>
    </section>
    <!-- /Best Doctor Section -->

    @include('home-partials.blogs')
    @include('home-partials.footer')

    <!-- Cursor -->
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>
</div>
<!-- /Main Wrapper -->

<!-- ScrollToTop -->
<div class="progress-wrap active-progress">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
    </svg>
</div>

@include('home-partials.script')
</body>
</html>
