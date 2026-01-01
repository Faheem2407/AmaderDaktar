<!DOCTYPE html> 
<html lang="en">
    <head>
        @include('partials.meta')
    </head>
    <body>

        <!-- Main Wrapper -->
        <div class="main-wrapper">
        
            <!-- Header Section -->
            @include('doctor.partials.auth-header')
            <!-- /Header Section -->

            <!-- Breadcrumb -->
            <div class="breadcrumb-bar">
                <div class="container">
                    <div class="row align-items-center inner-banner">
                        <div class="col-md-12 col-12 text-center">
                            <nav aria-label="breadcrumb" class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('doctor.dashboard') }}"><i class="isax isax-home-15"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">Doctor</li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                                <h2 class="breadcrumb-title">Dashboard</h2>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb-bg">
                    <img src="{{ asset('main_assets/img/bg/breadcrumb-bg-01.png') }}" alt="img" class="breadcrumb-bg-01">
                    <img src="{{ asset('main_assets/img/bg/breadcrumb-bg-02.png') }}" alt="img" class="breadcrumb-bg-02">
                    <img src="{{ asset('main_assets/img/bg/breadcrumb-icon.png') }}" alt="img" class="breadcrumb-bg-03">
                    <img src="{{ asset('main_assets/img/bg/breadcrumb-icon.png') }}" alt="img" class="breadcrumb-bg-04">
                </div>
            </div>
            <!-- /Breadcrumb -->
            
            <!-- Page Content -->
            <div class="content">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-4 col-xl-3 theiaStickySidebar">
                            
                            <!-- Profile Sidebar -->
                            @include('doctor.partials.profile-sidebar')
                            <!-- /Profile Sidebar -->                               
                        
                        </div>
                        
                        <div class="col-lg-8 col-xl-9">

                            <div class="row">
                                <div class="col-xl-4 d-flex">
                                    <div class="dashboard-box-col w-100">
                                        <div class="dashboard-widget-box">
                                            <div class="dashboard-content-info">
                                                <h6>Total Patient</h6>
                                                <h4>978</h4>
                                                <span class="text-success"><i class="fa-solid fa-arrow-up"></i>15% From Last Week</span>
                                            </div>
                                            <div class="dashboard-widget-icon">
                                                <span class="dash-icon-box"><i class="fa-solid fa-user-injured"></i></span>
                                            </div>
                                        </div>
                                        <div class="dashboard-widget-box">
                                            <div class="dashboard-content-info">
                                                <h6>Patients Today</h6>
                                                <h4>80</h4>
                                                <span class="text-danger"><i class="fa-solid fa-arrow-up"></i>15% From Yesterday</span>
                                            </div>
                                            <div class="dashboard-widget-icon">
                                                <span class="dash-icon-box"><i class="fa-solid fa-user-clock"></i></span>
                                            </div>
                                        </div>
                                        <div class="dashboard-widget-box">
                                            <div class="dashboard-content-info">
                                                <h6>Appointments Today</h6>
                                                <h4>50</h4>
                                                <span class="text-success"><i class="fa-solid fa-arrow-up"></i>20% From Yesterday</span>
                                            </div>
                                            <div class="dashboard-widget-icon">
                                                <span class="dash-icon-box"><i class="fa-solid fa-calendar-days"></i></span>
                                            </div>
                                        </div>
                                    </div>                          
                                </div>
                                <div class="col-xl-8 d-flex">
                                    <div class="dashboard-card w-100">
                                        <div class="dashboard-card-head">
                                            <div class="header-title">
                                                <h5>Appointment</h5>
                                            </div>
                                            <div class="dropdown header-dropdown">
                                                <a class="dropdown-toggle nav-tog" data-bs-toggle="dropdown" href="javascript:void(0);">
                                                    Last 7 Days
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="javascript:void(0);" class="dropdown-item">
                                                        Today
                                                    </a>
                                                    <a href="javascript:void(0);" class="dropdown-item">
                                                        This Month
                                                    </a>
                                                    <a href="javascript:void(0);" class="dropdown-item">
                                                        Last 7 Days
                                                    </a>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="dashboard-card-body">
                                            <div class="table-responsive">
                                                <table class="table dashboard-table appoint-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="patient-info-profile">
                                                                    <a href="appointments.html" class="table-avatar">
                                                                        <img src="{{ asset('main_assets/img/doctors-dashboard/profile-01.jpg') }}" alt="Img">
                                                                    </a>
                                                                    <div class="patient-name-info">
                                                                        <span>#Apt0001</span>
                                                                        <h5><a href="appointments.html">Adrian Marshall</a></h5>
                                                                    </div>
                                                                </div>
                                                                
                                                            </td>
                                                            <td>
                                                                <div class="appointment-date-created">
                                                                    <h6>11 Nov 2024 10.45 AM</h6>
                                                                    <span class="badge table-badge">General</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="apponiment-actions d-flex align-items-center">
                                                                    <a href="#" class="text-success-icon me-2"><i class="fa-solid fa-check"></i></a>
                                                                    <a href="#" class="text-danger-icon"><i class="fa-solid fa-xmark"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="patient-info-profile">
                                                                    <a href="appointments.html" class="table-avatar">
                                                                        <img src="{{ asset('main_assets/img/doctors-dashboard/profile-02.jpg') }}" alt="Img">
                                                                    </a>
                                                                    <div class="patient-name-info">
                                                                        <span>#Apt0002</span>
                                                                        <h5><a href="appointments.html">Kelly Stevens</a></h5>
                                                                    </div>
                                                                </div>
                                                                
                                                            </td>
                                                            <td>
                                                                <div class="appointment-date-created">
                                                                    <h6>10 Nov 2024 11.00 AM</h6>
                                                                    <span class="badge table-badge">Clinic Consulting</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="apponiment-actions d-flex align-items-center">
                                                                    <a href="#" class="text-success-icon me-2"><i class="fa-solid fa-check"></i></a>
                                                                    <a href="#" class="text-danger-icon"><i class="fa-solid fa-xmark"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="patient-info-profile">
                                                                    <a href="appointments.html" class="table-avatar">
                                                                        <img src="{{ asset('main_assets/img/doctors-dashboard/profile-03.jpg') }}" alt="Img">
                                                                    </a>
                                                                    <div class="patient-name-info">
                                                                        <span>#Apt0003</span>
                                                                        <h5><a href="appointments.html">Samuel Anderson</a></h5>
                                                                    </div>
                                                                </div>
                                                                
                                                            </td>
                                                            <td>
                                                                <div class="appointment-date-created">
                                                                    <h6>03 Nov 2024 02.00 PM</h6>
                                                                    <span class="badge table-badge">General</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="apponiment-actions d-flex align-items-center">
                                                                    <a href="#" class="text-success-icon me-2"><i class="fa-solid fa-check"></i></a>
                                                                    <a href="#" class="text-danger-icon"><i class="fa-solid fa-xmark"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="patient-info-profile">
                                                                    <a href="appointments.html" class="table-avatar">
                                                                        <img src="{{ asset('main_assets/img/doctors-dashboard/profile-04.jpg') }}" alt="Img">
                                                                    </a>
                                                                    <div class="patient-name-info">
                                                                        <span>#Apt0004</span>
                                                                        <h5><a href="appointments.html">Catherine Griffin</a></h5>
                                                                    </div>
                                                                </div>
                                                                
                                                            </td>
                                                            <td>
                                                                <div class="appointment-date-created">
                                                                    <h6>01 Nov 2024 04.00 PM</h6>
                                                                    <span class="badge table-badge">Clinic Consulting</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="apponiment-actions d-flex align-items-center">
                                                                    <a href="#" class="text-success-icon me-2"><i class="fa-solid fa-check"></i></a>
                                                                    <a href="#" class="text-danger-icon"><i class="fa-solid fa-xmark"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="patient-info-profile">
                                                                    <a href="appointments.html" class="table-avatar">
                                                                        <img src="{{ asset('main_assets/img/doctors-dashboard/profile-05.jpg') }}" alt="Img">
                                                                    </a>
                                                                    <div class="patient-name-info">
                                                                        <span>#Apt0005</span>
                                                                        <h5><a href="appointments.html">Robert Hutchinson</a></h5>
                                                                    </div>
                                                                </div>
                                                                
                                                            </td>
                                                            <td>
                                                                <div class="appointment-date-created">
                                                                    <h6>28 Oct 2024 05.30 PM</h6>
                                                                    <span class="badge table-badge">General</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="apponiment-actions d-flex align-items-center">
                                                                    <a href="#" class="text-success-icon me-2"><i class="fa-solid fa-check"></i></a>
                                                                    <a href="#" class="text-danger-icon"><i class="fa-solid fa-xmark"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>
                                                    
                        </div>
                    </div>

                </div>

            </div>      
            <!-- /Page Content -->
   
    <!-- Footer Content -->
    @include('partials.footer')
    <!-- /Footer Content -->

    <!-- Cursor -->
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>
    <!-- /Cursor -->
       
</div>
<!-- /Main Wrapper -->

<!-- Script Content -->
@include('partials.script')
<!-- /Script Content -->
</body>
</html>