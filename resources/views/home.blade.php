<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The responsive professional Doccure template offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
    <meta name="keywords" content="practo clone, doccure, doctor appointment, Practo clone html template, doctor booking template">
    <meta name="author" content="Practo Clone HTML Template - Doctor Booking Template">
    <meta property="og:url" content="https://doccure.dreamstechnologies.com/html/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Doctors Appointment HTML Website Templates | Doccure">
    <meta property="og:description" content="The responsive professional Doccure template offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
    <meta property="og:image" content="{{ asset('main_assets/img/preview-banner.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="https://doccure.dreamstechnologies.com/html/">
    <meta property="twitter:url" content="https://doccure.dreamstechnologies.com/html/">
    <meta name="twitter:title" content="Doctors Appointment HTML Website Templates | Doccure">
    <meta name="twitter:description" content="The responsive professional Doccure template offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
    <meta name="twitter:image" content="{{ asset('main_assets/img/preview-banner.jpg') }}"> 
    <title>Doccure</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('main_assets/img/favicon.png') }}" type="image/x-icon">

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('main_assets/img/apple-touch-icon.png') }}">

    <!-- Theme Settings Js -->
    <script src="{{ asset('main_assets/js/theme-script.js') }}" type="955622e3ea3e52fdc5233a66-text/javascript"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('main_assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('main_assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main_assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('main_assets/css/feather.css') }}">

    <!-- Iconsax CSS-->
    <link rel="stylesheet" href="{{ asset('main_assets/css/iconsax.css') }}">

    <!-- Owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('main_assets/css/owl.carousel.min.css') }}">

    <!-- select CSS -->
    <link rel="stylesheet" href="{{ asset('main_assets/plugins/select2/css/select2.min.css') }}">

    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{ asset('main_assets/css/aos.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('main_assets/css/custom.css') }}">
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper home-three">

        <!-- Header -->
        <header class="header header-trans header-three header-eight">
            <div class="container">
                <nav class="navbar navbar-expand-lg header-nav">
                    <div class="navbar-header">
                        <a id="mobile_btn" href="javascript:void(0);">
                            <span class="bar-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </a>
                        <a href="{{ route('home') }}" class="navbar-brand logo">
                            <img src="{{ asset('main_assets/img/logo.jpeg') }}" class="img-fluid" alt="Logo">
                        </a>
                    </div>
                    <div class="main-menu-wrapper">
                        <div class="menu-header">
                            <a href="{{ route('home') }}" class="menu-logo">
                                <img src="{{ asset('main_assets/img/logo.jpeg') }}" class="img-fluid" alt="Logo">
                            </a>
                            <a id="menu_close" class="menu-close" href="javascript:void(0);">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <ul class="nav header-navbar-rht">
                        <li class="contact-item">
                            <i class="isax isax-call"></i>
                            <span>Contact :</span>+1 315 369 5943
                        </li>

                        @auth
                            <li class="nav-item">
                                @if(auth()->user()->role === 'doctor')
                                    <a class="nav-link btn btn-primary header-login d-inline-flex align-items-center"
                                       href="{{ route('doctor.dashboard') }}">
                                        <i class="isax isax-category"></i> Dashboard
                                    </a>
                                @elseif(auth()->user()->role === 'patient')
                                    <a class="nav-link btn btn-primary header-login d-inline-flex align-items-center"
                                       href="{{ route('patient.dashboard') }}">
                                        <i class="isax isax-category"></i> Dashboard
                                    </a>
                                @elseif(auth()->user()->role === 'admin')
                                    <a class="nav-link btn btn-primary header-login d-inline-flex align-items-center"
                                       href="{{ route('admin.dashboard') }}">
                                        <i class="isax isax-category"></i> Dashboard
                                    </a>
                                @endif
                            </li>
                        @endauth

                        @guest
                            <li class="nav-item">
                                <a class="nav-link btn btn-primary header-login d-inline-flex align-items-center"
                                   href="{{ route('patient.register') }}">
                                    <i class="isax isax-user-octagon"></i> Login / Sign up
                                </a>
                            </li>
                        @endguest
                    </ul>

                </nav>
            </div>
        </header>
        <!-- /Header -->

        <!-- Home Banner -->
        <section class="doctor-search-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 aos" data-aos="fade-up">
                        <div class="doctor-search">
                            <div class="banner-header">
                                <h2><span>Search Doctor,</span> Make an Appointment</h2>
                                <p>Access to expert physicians and surgeons, advanced technologies and top-quality surgery facilities right here.</p>
                            </div>
                            <div class="doctor-form">
                                <form action="#" class="doctor-search">
                                    <div class="input-box-twelve">
                                        <div class="search-input input-block">
                                            <input type="text" class="form-control" placeholder="Location"> 
                                            <a class="current-loc-icon current_location" href="javascript:void(0);">
                                                <i class="isax isax-location"></i>
                                            </a>
                                        </div>
                                        <div class="search-input input-block">                                          
                                            <select class="select form-control">
                                                <option>Select Department</option>
                                                <option>Cardiology</option>
                                                <option>Neurology</option>
                                                <option>Urology</option>
                                            </select>
                                            <a class="current-loc-icon current_location" href="javascript:void(0);">
                                                <i class="isax isax-user-tag"></i>
                                            </a>
                                        </div>
                                        <div class="input-block">
                                            <div class="search-btn-info">
                                                <a href="search-2.html" class="btn btn-primary"><i class="isax isax-search-normal"></i>Search</a>
                                            </div>
                                        </div>                                      
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 aos" data-aos="fade-up">
                        <img src="{{ asset('main_assets/img/banner/doctor-banner.png') }}" class="img-fluid dr-img" alt="doctor-image">
                    </div>
                </div>
            </div>
        </section>
        <!-- /Home Banner -->

        <!-- Clinic Section -->
        <section class="clinics-section">
            <div class="shapes">
                <img src="{{ asset('main_assets/img/shapes/shape-1.png') }}" alt="shape-image" class="img-fluid shape-1">
                <img src="{{ asset('main_assets/img/shapes/shape-2.png') }}" alt="shape-image" class="img-fluid shape-2">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 aos" data-aos="fade-up">
                        <div class="section-heading">
                            <h2>Clinic & Specialities</h2>
                            <p>Access to expert physicians and surgeons, advanced technologies and top-quality surgery
                                facilities right here.</p>
                        </div>
                    </div>
                    <div class="col-md-6 text-end aos" data-aos="fade-up">
                        <div class="owl-nav slide-nav-1 text-end nav-control"></div>
                    </div>
                </div>
                <div class="owl-carousel clinics owl-theme aos" data-aos="fade-up">
                    <div class="item">
                        <div class="clinic-item">
                            <div class="clinics-card">
                                <div class="clinics-img">
                                    <img src="{{ asset('main_assets/img/clinic/clinic-1.jpg') }}" alt="clinic-image" class="img-fluid">
                                </div>
                                <div class="clinics-info">
                                    <span class="clinic-img">
                                        <img src="{{ asset('main_assets/img/category/category-01.svg') }}" alt="kidney-image" class="img-fluid">
                                    </span>
                                    <a href="#"><span>Urology</span></a>
                                </div>
                            </div>
                            <div class="clinics-icon">
                                <a href="#"><i class="isax isax-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="clinic-item">
                            <div class="clinics-card">
                                <div class="clinics-img">
                                    <img src="{{ asset('main_assets/img/clinic/clinic-2.jpg') }}" alt="clinic-image" class="img-fluid">
                                </div>
                                <div class="clinics-info">
                                    <span class="clinic-img">
                                        <img src="{{ asset('main_assets/img/category/category-02.svg') }}" alt="bone-image" class="img-fluid">
                                    </span>
                                    <a href="#"><span>Orthopedic</span></a>
                                </div>
                            </div>
                            <div class="clinics-icon">
                                <a href="#"><i class="isax isax-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="clinic-item">
                            <div class="clinics-card">
                                <div class="clinics-img">
                                    <img src="{{ asset('main_assets/img/clinic/clinic-4.jpg') }}" alt="client-image" class="img-fluid">
                                </div>
                                <div class="clinics-info">
                                    <span class="clinic-img">
                                        <img src="{{ asset('main_assets/img/category/category-03.svg') }}" alt="heart-image" class="img-fluid">
                                    </span>
                                    <a href="#"><span>Cardiologist</span></a>
                                </div>
                            </div>
                            <div class="clinics-icon">
                                <a href="#"><i class="isax isax-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="clinic-item">
                            <div class="clinics-card">
                                <div class="clinics-img">
                                    <img src="{{ asset('main_assets/img/clinic/clinic-3.jpg') }}" alt="client-image" class="img-fluid">
                                </div>
                                <div class="clinics-info">
                                    <span class="clinic-img">
                                        <img src="{{ asset('main_assets/img/category/category-04.svg') }}" alt="teeth-image" class="img-fluid">
                                    </span>
                                    <a href="#"><span>Dentist</span></a>
                                </div>
                            </div>
                            <div class="clinics-icon">
                                <a href="#"><i class="isax isax-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="clinic-item">
                            <div class="clinics-card">
                                <div class="clinics-img">
                                    <img src="{{ asset('main_assets/img/clinic/clinic-5.jpg') }}" alt="client-image" class="img-fluid">
                                </div>
                                <div class="clinics-info">
                                    <span class="clinic-img">
                                        <img src="{{ asset('main_assets/img/category/category-05.svg') }}" alt="brain-image" class="img-fluid">
                                    </span>
                                    <a href="#"><span>Neurology</span></a>
                                </div>
                            </div>
                            <div class="clinics-icon">
                                <a href="#"><i class="isax isax-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="clinic-item">
                            <div class="clinics-card">
                                <div class="clinics-img">
                                    <img src="{{ asset('main_assets/img/clinic/clinic-1.jpg') }}" alt="clinic-image" class="img-fluid">
                                </div>
                                <div class="clinics-info">
                                    <span class="clinic-img">
                                        <img src="{{ asset('main_assets/img/category/category-06.svg') }}" alt="heart-image" class="img-fluid">
                                    </span>
                                    <a href="#"><span>Cardiologist</span></a>
                                </div>
                            </div>
                            <div class="clinics-icon">
                                <a href="#"><i class="isax isax-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Clinic Section -->

        <!-- Specialities Section -->
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
                    <div class="col-xl-3 col-lg-4 col-md-6 aos" data-aos="fade-up">
                        <div class="specialist-card d-flex">
                            <div class="specialist-img">
                                <img src="{{ asset('main_assets/img/category/1.png') }}" alt="kidney-image" class="img-fluid">
                            </div>
                            <div class="specialist-info">
                                <a href="#">
                                    <h4>Urology</h4>
                                </a>
                                <p>21 Doctors</p>
                            </div>
                            <div class="specialist-nav ms-auto">
                                <a href="#"><i class="isax isax-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 aos" data-aos="fade-up">
                        <div class="specialist-card d-flex">
                            <div class="specialist-img">
                                <img src="{{ asset('main_assets/img/category/2.png') }}" alt="bone-image" class="img-fluid">
                            </div>
                            <div class="specialist-info">
                                <a href="#">
                                    <h4>Orthopedic</h4>
                                </a>
                                <p>30 Doctors</p>
                            </div>
                            <div class="specialist-nav ms-auto">
                                <a href="#"><i class="isax isax-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 aos" data-aos="fade-up">
                        <div class="specialist-card d-flex">
                            <div class="specialist-img">
                                <img src="{{ asset('main_assets/img/category/4.png') }}" alt="heart-image" class="img-fluid">
                            </div>
                            <div class="specialist-info">
                                <a href="#">
                                    <h4>Cardiologist</h4>
                                </a>
                                <p>15 Doctors</p>
                            </div>
                            <div class="specialist-nav ms-auto">
                                <a href="#"><i class="isax isax-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 aos" data-aos="fade-up">
                        <div class="specialist-card d-flex">
                            <div class="specialist-img">
                                <img src="{{ asset('main_assets/img/category/5.png') }}" alt="brain-image" class="img-fluid">
                            </div>
                            <div class="specialist-info">
                                <a href="#">
                                    <h4>Dentist</h4>
                                </a>
                                <p>35 Doctors</p>
                            </div>
                            <div class="specialist-nav ms-auto">
                                <a href="#"><i class="isax isax-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 aos" data-aos="fade-up">
                        <div class="specialist-card d-flex">
                            <div class="specialist-img">
                                <img src="{{ asset('main_assets/img/category/3.png') }}" alt="brain-image" class="img-fluid">
                            </div>
                            <div class="specialist-info">
                                <a href="#">
                                    <h4>Neurology</h4>
                                </a>
                                <p>25 Doctors</p>
                            </div>
                            <div class="specialist-nav ms-auto">
                                <a href="#"><i class="isax isax-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 aos" data-aos="fade-up">
                        <div class="specialist-card d-flex">
                            <div class="specialist-img">
                                <img src="{{ asset('main_assets/img/category/6.png') }}" alt="bone-image" class="img-fluid">
                            </div>
                            <div class="specialist-info">
                                <a href="#">
                                    <h4>Pediatrist</h4>
                                </a>
                                <p>10 Doctors</p>
                            </div>
                            <div class="specialist-nav ms-auto">
                                <a href="#"><i class="isax isax-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 aos" data-aos="fade-up">
                        <div class="specialist-card d-flex">
                            <div class="specialist-img">
                                <img src="{{ asset('main_assets/img/category/7.png') }}" alt="heart-image" class="img-fluid">
                            </div>
                            <div class="specialist-info">
                                <a href="#">
                                    <h4>Veterinary</h4>
                                </a>
                                <p>20 Doctors</p>
                            </div>
                            <div class="specialist-nav ms-auto">
                                <a href="#"><i class="isax isax-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 aos" data-aos="fade-up">
                        <div class="specialist-card d-flex">
                            <div class="specialist-img">
                                <img src="{{ asset('main_assets/img/category/8.png') }}" alt="kidney-image" class="img-fluid">
                            </div>
                            <div class="specialist-info">
                                <a href="#">
                                    <h4>Psychiatrist</h4>
                                </a>
                                <p>12 Doctors</p>
                            </div>
                            <div class="specialist-nav ms-auto">
                                <a href="#"><i class="isax isax-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Specialities Section -->

        <!-- Best Doctor Section -->
        <section class="our-doctors-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 aos" data-aos="fade-up">
                        <div class="section-heading">
                            <h2>Book Our Best Doctor</h2>
                            <p>Meet our experts & book online</p>
                        </div>
                    </div>
                    <div class="col-md-6 text-end aos" data-aos="fade-up">
                        <div class="owl-nav slide-nav-2 text-end nav-control"></div>
                    </div>
                </div>
                <div class="owl-carousel our-doctors owl-theme aos" data-aos="fade-up">
                    <div class="item">
                        <div class="our-doctors-card">
                            <div class="doctors-header">
                                <a href="#"><img src="{{ asset('main_assets/img/doctors/doctor-01.jpg') }}" alt="Ruby Perrin" class="img-fluid"></a>
                                <div class="img-overlay">
                                    <span>$20 - $50</span>
                                </div>
                            </div>
                            <div class="doctors-body">
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <span class="d-inline-block average-ratings">3.5</span>
                                </div>
                                <a href="doctor-profile.html">
                                    <h4>Dr. Ruby Perrin</h4>
                                </a>
                                <p>BDS, MDS - Oral & Maxillofacial Surgery</p>
                                <div class="location d-flex">
                                    <p><i class="isax isax-location5"></i>Georgia, USA</p>
                                    <p class="ms-auto"><i class="isax isax-user"></i>450 Consultations</p>
                                </div>
                                <div class="row row-sm">
                                    <div class="col-6">
                                        <a href="doctor-profile.html" class="btn btn-dark w-100" tabindex="0">View Profile</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="booking.html" class="btn btn-primary w-100" tabindex="0">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="our-doctors-card">
                            <div class="doctors-header">
                                <a href="#"><img src="{{ asset('main_assets/img/doctors/doctor-04.jpg') }}" alt="Deborah Angel" class="img-fluid"></a>
                                <div class="img-overlay">
                                    <span>$30 -$60</span>
                                </div>
                            </div>
                            <div class="doctors-body">
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-ratings">3.0</span>
                                </div>
                                <a href="doctor-profile.html">
                                    <h4>Dr. Lisa Graham</h4>
                                </a>
                                <p>MBBS, MD - Cardialogist</p>
                                <div class="location d-flex">
                                    <p><i class="isax isax-location5"></i>San Diego, USA</p>
                                    <p class="ms-auto"><i class="isax isax-user"></i>120 Consultations</p>
                                </div>
                                <div class="row row-sm">
                                    <div class="col-6">
                                        <a href="doctor-profile.html" class="btn btn-dark w-100" tabindex="0">View Profile</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="booking.html" class="btn btn-primary w-100" tabindex="0">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="our-doctors-card">
                            <div class="doctors-header">
                                <a href="#"><img src="{{ asset('main_assets/img/doctors/doctor-03.jpg') }}" alt="Sofia Brient" class="img-fluid"></a>
                                <div class="img-overlay">
                                    <span>$15 -$30</span>
                                </div>
                            </div>
                            <div class="doctors-body">
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-ratings">3.0</span>
                                </div>
                                <a href="doctor-profile.html">
                                    <h4>Dr. Carrie Soderberg</h4>
                                </a>
                                <p>MBBS, DNB - Neurology</p>
                                <div class="location d-flex">
                                    <p><i class="isax isax-location5"></i>Dallas, USA</p>
                                    <p class="ms-auto"><i class="isax isax-user"></i>300 Consultations</p>
                                </div>
                                <div class="row row-sm">
                                    <div class="col-6">
                                        <a href="doctor-profile.html" class="btn btn-dark w-100" tabindex="0">View Profile</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="booking.html" class="btn btn-primary w-100" tabindex="0">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="our-doctors-card">
                            <div class="doctors-header">
                                <a href="#"><img src="{{ asset('main_assets/img/doctors/doctor-02.jpg') }}" alt="Darren Elder" class="img-fluid"></a>
                                <div class="img-overlay">
                                    <span>$20 - $50</span>
                                </div>
                            </div>
                            <div class="doctors-body">
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <span class="d-inline-block average-ratings">4.0</span>
                                </div>
                                <a href="doctor-profile.html">
                                    <h4>Dr. Matthew Ruiz</h4>
                                </a>
                                <p>BDS, MDS - Oral & Maxillofacial Surgery</p>
                                <div class="location d-flex">
                                    <p><i class="isax isax-location5"></i>Georgia, USA</p>
                                    <p class="ms-auto"><i class="isax isax-user"></i>450 Consultations</p>
                                </div>
                                <div class="row row-sm">
                                    <div class="col-6">
                                        <a href="doctor-profile.html" class="btn btn-dark w-100" tabindex="0">View Profile</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="booking.html" class="btn btn-primary w-100" tabindex="0">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Best Doctor Section -->

        <!-- Clinic Features Section -->
        <section class="clinic-features-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 aos" data-aos="fade-up">
                        <div class="section-heading">
                            <h2>Availabe Features in Our Clinic</h2>
                            <p>Meet our Experts & Book Online</p>
                        </div>
                    </div>
                    <div class="col-md-6 text-end aos" data-aos="fade-up">
                        <div class="owl-nav slide-nav-3 text-end nav-control"></div>
                    </div>
                </div>
                <div class="owl-carousel clinic-feature owl-theme aos" data-aos="fade-up">
                    <div class="item">
                        <div class="clinic-features">
                            <img src="{{ asset('main_assets/img/clinic/clinic-6.jpg') }}" alt="clinic-image" class="img-fluid">
                        </div>
                        <div class="clinic-feature-overlay">
                            <a href="#" class="img-overlay">Operation</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="clinic-features">
                            <img src="{{ asset('main_assets/img/clinic/clinic-7.jpg') }}" alt="clinic-image" class="img-fluid">
                        </div>
                        <div class="clinic-feature-overlay">
                            <a href="#" class="img-overlay">Medical</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="clinic-features">
                            <img src="{{ asset('main_assets/img/clinic/clinic-8.jpg') }}" alt="clinic-image" class="img-fluid">
                        </div>
                        <div class="clinic-feature-overlay">
                            <a href="#" class="img-overlay">Patient Ward</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="clinic-features">
                            <img src="{{ asset('main_assets/img/clinic/clinic-9.jpg') }}" alt="clinic-image" class="img-fluid">
                        </div>
                        <div class="clinic-feature-overlay">
                            <a href="#" class="img-overlay">Test Room</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="clinic-features">
                            <img src="{{ asset('main_assets/img/clinic/clinic-10.jpg') }}" alt="clinic-image" class="img-fluid">
                        </div>
                        <div class="clinic-feature-overlay">
                            <a href="#" class="img-overlay">ICU</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Clinic Features Section -->

        <!-- Blog Section -->
        <section class="our-blog-section blogs-three">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 aos" data-aos="fade-up">
                        <div class="section-heading">
                            <h2>Blogs and News</h2>
                            <p>Read Professional Articles and Latest Articles</p>
                        </div>
                    </div>
                    <div class="col-md-6 text-end aos" data-aos="fade-up">
                        <div class="owl-nav slide-nav-4 text-end nav-control"></div>
                    </div>
                </div>
                <div class="owl-carousel blogs owl-theme aos" data-aos="fade-up">
                    <div class="item">
                        <div class="our-blogs">
                            <div class="blogs-img">
                                <a href="blog-details.html"><img src="{{ asset('main_assets/img/blog/blog-26.jpg') }}" alt="blog-image"
                                        class="img-fluid"></a>
                                <div class="blogs-overlay d-flex">
                                    <img src="{{ asset('main_assets/img/clients/client-11.jpg') }}" alt="Ruby Perrin" class="img-fluid">
                                    <span class="blogs-writter">Ruby Perrin</span>
                                </div>
                            </div>
                            <div class="blogs-info">
                                <span class="blog-slug">Urology</span>
                                <h4><a href="blog-details.html">Revolutionizing Healthcare: The Rise of Online Doctor Booking</a></h4>
                                <p>Explore how online doctor booking is revolutionize access to healthcare efficiency.
                                </p>
                                <div class="blogs-nav d-flex align-items-center justify-content-between">
                                    <span class="blogs-time"><i class="isax isax-calendar-1"></i>03 Apr 2024</span>
                                    <a href="blog-details.html" class="blogs-btn btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="our-blogs">
                            <div class="blogs-img">
                                <a href="blog-details.html"><img src="{{ asset('main_assets/img/blog/blog-27.jpg') }}" alt="blog-image"
                                        class="img-fluid"></a>
                                <div class="blogs-overlay d-flex">
                                    <img src="{{ asset('main_assets/img/clients/client-12.jpg') }}" alt="Ruby Perrin" class="img-fluid">
                                    <span class="blogs-writter">Lynette Williams</span>
                                </div>
                            </div>
                            <div class="blogs-info">
                                <span class="blog-slug">Neurology</span>
                                <h4><a href="blog-details.html">Neurology and Technology: A New Frontier in Brain Health</a></h4>
                                <p>Discover the intersection of technology and neurology, transforming treatments.
                                </p>
                                <div class="blogs-nav d-flex align-items-center justify-content-between">
                                    <span class="blogs-time"><i class="isax isax-calendar-1"></i>10 Apr 2024</span>
                                    <a href="blog-details.html" class="blogs-btn btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="our-blogs">
                            <div class="blogs-img">
                                <a href="blog-details.html"><img src="{{ asset('main_assets/img/blog/blog-28.jpg') }}" alt="blog-image"
                                        class="img-fluid"></a>
                                <div class="blogs-overlay d-flex">
                                    <img src="{{ asset('main_assets/img/clients/client-03.jpg') }}" alt="Ruby Perrin" class="img-fluid">
                                    <span class="blogs-writter">Mathew Rulz</span>
                                </div>
                            </div>
                            <div class="blogs-info">
                                <span class="blog-slug">Orthopedic</span>
                                <h4><a href="blog-details.html">Beating Strong: The Digital Revolution in Cardiac Care</a></h4>
                                <p>Discover how digital advancements are transforming cardiac care, making heart health.
                                </p>
                                <div class="blogs-nav d-flex align-items-center justify-content-between">
                                    <span class="blogs-time"><i class="isax isax-calendar-1"></i>15 Apr 2024</span>
                                    <a href="blog-details.html" class="blogs-btn btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="our-blogs">
                            <div class="blogs-img">
                                <a href="blog-details.html"><img src="{{ asset('main_assets/img/blog/blog-29.jpg') }}" alt="blog-image"
                                        class="img-fluid"></a>
                                <div class="blogs-overlay d-flex">
                                    <img src="{{ asset('main_assets/img/clients/client-09.jpg') }}" alt="Sofia Brient" class="img-fluid">
                                    <span class="blogs-writter">Sofia Brient</span>
                                </div>
                            </div>
                            <div class="blogs-info">
                                <span class="blog-slug">Ophthalmology</span>                                
                                <h4><a href="blog-details.html">Understanding and Preventing Glaucoma: A Detailed Guide</a></h4>
                                <p>Glaucoma is a leading cause of blindness worldwide, yet many do not realize they have it</p>
                                <div class="blogs-nav d-flex align-items-center justify-content-between">
                                    <span class="blogs-time"><i class="isax isax-calendar-1"></i>18 Apr 2024</span>
                                    <a href="blog-details.html" class="blogs-btn btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="our-blogs">
                            <div class="blogs-img">
                                <a href="blog-details.html"><img src="{{ asset('main_assets/img/blog/blog-30.jpg') }}" alt="blog-image"
                                        class="img-fluid"></a>
                                <div class="blogs-overlay d-flex">
                                    <img src="{{ asset('main_assets/img/clients/client-02.jpg') }}" alt="Olga Barlow" class="img-fluid">
                                    <span class="blogs-writter">Olga Barlow</span>
                                </div>
                            </div>
                            <div class="blogs-info">
                                <span class="blog-slug">Dental Care</span>                              
                                <h4><a href="blog-details.html">5 Essential Tips for Maintaining Optimal Oral Health</a></h4>
                                <p>Learn the top five daily practices to keep your teeth and gums healthy. </p>
                                <div class="blogs-nav d-flex align-items-center justify-content-between">
                                    <span class="blogs-time"><i class="isax isax-calendar-1"></i>18 Apr 2024</span>
                                    <a href="blog-details.html" class="blogs-btn btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="our-blogs">
                            <div class="blogs-img">
                                <a href="blog-details.html"><img src="{{ asset('main_assets/img/blog/blog-31.jpg') }}" alt="blog-image"
                                        class="img-fluid"></a>
                                <div class="blogs-overlay d-flex">
                                    <img src="{{ asset('main_assets/img/clients/client-04.jpg') }}" alt="Linda Tobin" class="img-fluid">
                                    <span class="blogs-writter">Linda Tobin</span>
                                </div>
                            </div>
                            <div class="blogs-info">
                                <span class="blog-slug">Veterinary</span>
                                <h4><a href="blog-details.html">Pet Emergencies: How to Recognize and React</a></h4>
                                <p>This critical guide covers the most common emergencies seen in pets, including choking.</p>
                                <div class="blogs-nav d-flex align-items-center justify-content-between">
                                    <span class="blogs-time"><i class="isax isax-calendar-1"></i>24 Apr 2024</span>
                                    <a href="blog-details.html" class="blogs-btn btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Blog Section -->

        <!-- Footer -->
        <footer class="footer footer-three">

            <!-- Footer Top -->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <!-- Footer Widget -->
                            <div class="footer-widget footer-about">
                                <div class="footer-logo">
                                    <img src="{{ asset('main_assets/img/footer-logo.png') }}" alt="logo">
                                </div>
                                <div class="footer-about-content">
                                    <p>Effortlessly schedule your medical appointments with Doccure. Connect with healthcare professionals, manage appointments & prioritize your well being </p>
                                    <div class="social-icon">
                                        <ul>
                                            <li> <a href="javascript:void(0);"><i class="fa-brands fa-facebook"></i></a>
                                            </li>
                                            <li> <a href="javascript:void(0);"><i class="fab fa-twitter"></i> </a>
                                            </li>
                                            <li> <a href="javascript:void(0);"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                            <li> <a href="javascript:void(0);"><i class="fab fa-instagram"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /Footer Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!-- Footer Widget -->
                            <div class="footer-widget footer-menu">
                                <h2 class="footer-title">For Patients</h2>
                                <ul>
                                    <li><a href="search.html">Search for Doctors</a>
                                    </li>
                                    <li><a href="login.html">Login</a>
                                    </li>
                                    <li><a href="register.html">Register</a>
                                    </li>
                                    <li><a href="booking.html">Booking</a>
                                    </li>
                                    <li><a href="patient-dashboard.html">Patient Dashboard</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /Footer Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!-- Footer Widget -->
                            <div class="footer-widget footer-menu">
                                <h2 class="footer-title">For Doctors</h2>
                                <ul>
                                    <li><a href="appointments.html">Appointments</a>
                                    </li>
                                    <li><a href="chat.html">Chat</a>
                                    </li>
                                    <li><a href="login.html">Login</a>
                                    </li>
                                    <li><a href="doctor-register.html">Register</a>
                                    </li>
                                    <li><a href="doctor-dashboard.html">Doctor Dashboard</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /Footer Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!-- Footer Widget -->
                            <div class="footer-widget footer-contact">
                                <h2 class="footer-title">Contact Us</h2>
                                <div class="footer-contact-info">
                                    <div class="footer-address"> <span><i class="isax isax-location5"></i></span>
                                        <p>3556 Beech Street, San Francisco,
                                            <br>California, CA 94108
                                        </p>
                                    </div>
                                    <p><i class="isax isax-call5"></i>+1 315 369 5943</p>
                                    <p class="mb-0"> <i class="isax isax-sms5"></i>
                                        <a href="https://doccure.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="2e4a414d4d5b5c4b6e4b564f435e424b004d4143">[email&#160;protected]</a></p>
                                </div>
                            </div>
                            <!-- /Footer Widget -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Footer Top -->

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <!-- Copyright -->
                    <div class="copyright">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="copyright-text">
                                    <p class="mb-0">Copyright © 2025 Doccure. All Rights Reserved</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <!-- Copyright Menu -->
                                <div class="copyright-menu">
                                    <ul class="policy-menu">
                                        <li><a href="terms-condition.html">Terms and Conditions</a>
                                        </li>
                                        <li><a href="privacy-policy.html">Policy</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /Copyright Menu -->
                            </div>
                        </div>
                    </div>
                    <!-- /Copyright -->

                </div>
            </div>
            <!-- /Footer Bottom -->

        </footer>
        <!-- /Footer -->

        <!-- Cursor -->
        <div class="mouse-cursor cursor-outer"></div>
        <div class="mouse-cursor cursor-inner"></div>
        <!-- /Cursor -->

    </div>
    <!-- /Main Wrapper -->

    <!-- ScrollToTop -->
    <div class="progress-wrap active-progress">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 228.265px;">
            </path>
        </svg>
    </div>
    <!-- /ScrollToTop -->

    <!-- jQuery -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{ asset('main_assets/js/jquery-3.7.1.min.js') }}" ></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('main_assets/js/bootstrap.bundle.min.js') }}" ></script>

    <!-- Owl Carousel JS -->
    <script src="{{ asset('main_assets/js/owl.carousel.min.js') }}" ></script>

    <!-- Slick JS -->
    <script src="{{ asset('main_assets/js/slick.js') }}" ></script>

    <!-- Datepicker JS -->
    <script src="{{ asset('main_assets/js/moment.min.js') }}" ></script>
    <script src="{{ asset('main_assets/js/bootstrap-datetimepicker.min.js') }}" ></script>

    <!-- select JS -->
    <script src="{{ asset('main_assets/plugins/select2/js/select2.min.js') }}" ></script>

    <!-- BacktoTop JS -->
    <script src="{{ asset('main_assets/js/backToTop.js') }}" ></script>

    <!-- Animation JS -->
    <script src="{{ asset('main_assets/js/aos.js') }}" ></script>

    <!-- Custom JS -->
    <script src="{{ asset('main_assets/js/script.js') }}" ></script>

</body>
</html>