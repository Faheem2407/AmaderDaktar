<!DOCTYPE html> 
<html lang="en">
<head>
    <head>
        @include('patient.partials.meta')
    </head>
    <body>

        <!-- Main Wrapper -->
        <div class="main-wrapper">
        
            <!-- Header -->
            <header class="header header-custom header-fixed inner-header relative">
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
                    </nav>
                </div>
            </header>
            <!-- /Header -->

            <!-- Breadcrumb -->
            <div class="breadcrumb-bar">
                <div class="container">
                    <div class="row align-items-center inner-banner">
                        <div class="col-md-12 col-12 text-center">
                            <nav aria-label="breadcrumb" class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="isax isax-home-15"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">Patient</li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                                <h2 class="breadcrumb-title">Patient Dashboard</h2>
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
                        
                        <!-- Profile Sidebar -->
                        <div class="col-lg-4 col-xl-3 theiaStickySidebar">
                            
                            <!-- Profile Sidebar -->
                            @include('patient.partials.profile-sidebar')
                            <!-- /Profile Sidebar -->
                            
                        </div>
                        <!-- / Profile Sidebar -->
                        
                        <div class="col-lg-8 col-xl-9">
                            <div class="dashboard-header">
                                <h3>Dashboard</h3>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 d-flex">
                                    <div class="favourites-dashboard w-100">
                                        <div class="book-appointment-head">
                                            <h3><span>Book a new</span>Appointment</h3>
                                            <span class="add-icon"><a href="search.html"><i class="fa-solid fa-circle-plus"></i></a></span>
                                        </div>
                                    </div>                              
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 d-flex">
                                    <div class="dashboard-card w-100">
                                        <div class="dashboard-card-head">
                                            <div class="header-title">
                                                <h5>Reports</h5>
                                            </div>                                          
                                        </div>
                                        <div class="dashboard-card-body">
                                            <div class="account-detail-table">
                                                <!-- Tab Menu -->
                                                <nav class="patient-dash-tab border-0 pb-0">
                                                   <ul class="nav nav-tabs-bottom">
                                                        <li class="nav-item">
                                                           <a class="nav-link active" href="#appoint-tab" data-bs-toggle="tab">Appointments</a>
                                                        </li>
                                                        <li class="nav-item">
                                                           <a class="nav-link" href="#medical-tab" data-bs-toggle="tab">Medical Records</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#prsc-tab" data-bs-toggle="tab">Prescriptions</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#invoice-tab" data-bs-toggle="tab">Invoices</a>
                                                        </li>
                                                   </ul>
                                               </nav>
                                               <!-- /Tab Menu -->
                                               
                                               <!-- Tab Content -->
                                               <div class="tab-content pt-0">
                                                   
                                                   <!-- Appointments Tab -->
                                                   <div id="appoint-tab" class="tab-pane fade show active">
                                                    <div class="custom-new-table">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover table-center mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>Doctor</th>
                                                                        <th>Date</th>
                                                                        <th>Type</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <a href="javascript:void(0);"><span class="link-primary">#AP1236</span></a>
                                                                        </td>
                                                                        <td>
                                                                            <h2 class="table-avatar">
                                                                                <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                                    <img class="avatar-img rounded-3" src="{{ asset('main_assets/img/doctors/doctor-thumb-24.jpg') }}" alt="User Image">
                                                                                </a>
                                                                                <a href="doctor-profile.html">Dr. Robert Womack</a>
                                                                            </h2>
                                                                        </td>
                                                                        <td>21 Mar 2024, 10:30 AM</td>
                                                                        <td>Video call</td>
                                                                        <td>
                                                                            <span class="badge badge-xs p-2 badge-soft-purple inline-flex align-items-center"><i class="fa-solid fa-circle me-1 fs-5"></i>Upcoming</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <a href="javascript:void(0);"><span class="link-primary">#AP3656</span></a>
                                                                        </td>   
                                                                        <td>
                                                                            <h2 class="table-avatar">
                                                                                <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                                    <img class="avatar-img rounded-3" src="{{ asset('main_assets/img/doctors/doctor-thumb-23.jpg') }}" alt="User Image">
                                                                                </a>
                                                                                <a href="doctor-profile.html">Dr. Patricia Cassidy</a>
                                                                            </h2>
                                                                        </td>
                                                                        <td>28 Mar 2024, 11:40 AM</td>  
                                                                     <td>Clinic Visit</td>
                                                                     <td>
                                                                        <span class="badge badge-xs p-2 badge-soft-purple inline-flex align-items-center"><i class="fa-solid fa-circle me-1 fs-5"></i>Completed</span>
                                                                     </td>
                                                                 </tr>
                                                                 <tr>
                                                                     <td>
                                                                        <a href="javascript:void(0);"><span class="link-primary">#AP1246</span></a>
                                                                     </td>  
                                                                     <td>
                                                                         <h2 class="table-avatar">
                                                                             <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                                 <img class="avatar-img rounded-3" src="{{ asset('main_assets/img/doctors/doctor-thumb-22.jpg') }}" alt="User Image">
                                                                             </a>
                                                                             <a href="doctor-profile.html">Dr. Kevin Evans</a>
                                                                         </h2>
                                                                     </td>
                                                                     <td>02 Apr 2024, 09:20 AM</td> 
                                                                     <td>Audio Call</td>
                                                                     <td>
                                                                        <span class="badge badge-xs p-2 badge-soft-success inline-flex align-items-center"><i class="fa-solid fa-circle me-1 fs-5"></i>Completed</span>
                                                                     </td>
                                                                 </tr>
                                                                 <tr>
                                                                     <td>
                                                                        <a href="javascript:void(0);"><span class="link-primary">#AP6985</span></a> 
                                                                     </td>
                                                                     <td>
                                                                         <h2 class="table-avatar">
                                                                             <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                                 <img class="avatar-img rounded-3" src="{{ asset('main_assets/img/doctors/doctor-thumb-25.jpg') }}" alt="User Image">
                                                                             </a>
                                                                             <a href="doctor-profile.html">Dr. Lisa Keating</a>
                                                                         </h2>
                                                                     </td>
                                                                     <td>15 Apr 2024, 04:10 PM</td>     
                                                                     <td>Clinic Visit</td>
                                                                     <td>
                                                                        <span class="badge badge-xs p-2 badge-soft-danger inline-flex align-items-center"><i class="fa-solid fa-circle me-1 fs-5"></i>Cancelled</span>
                                                                     </td>
                                                                 </tr>
                                                                 <tr>
                                                                     <td>
                                                                        <a href="javascript:void(0);"><span class="link-primary">#AP3659</span></a>
                                                                     </td>  
                                                                     <td>
                                                                         <h2 class="table-avatar">
                                                                             <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                                 <img class="avatar-img rounded-3" src="{{ asset('main_assets/img/doctors/doctor-thumb-26.jpg') }}" alt="User Image">
                                                                             </a>
                                                                             <a href="doctor-profile.html">Dr. John Hammer</a>
                                                                         </h2>
                                                                     </td>
                                                                     <td>10 May 2024, 06:00 PM</td> 
                                                                     <td>Video Call</td>
                                                                     <td>
                                                                        <span class="badge badge-xs p-2 badge-soft-purple inline-flex align-items-center"><i class="fa-solid fa-circle me-1 fs-5"></i>Upcoming</span>
                                                                     </td>
                                                                 </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                   </div>
                                                   <!-- /Appointments Tab -->
                                                   
                                                   <!-- Medical Records Tab -->
                                                   <div class="tab-pane fade" id="medical-tab">
                                                        <div class="custom-table">
                                                            <div class="table-responsive">
                                                                <table class="table table-center mb-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>ID</th>
                                                                            <th>Name</th>
                                                                            <th>Date</th>
                                                                            <th>Record For</th>
                                                                            <th>Comments</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><a href="javascript:void(0);" class="link-primary">#MR1236</a></td>
                                                                            <td>
                                                                                <a href="javascript:void(0);" class="lab-icon">Electro cardiography</a>
                                                                            </td>
                                                                            <td>24 Mar 2024</td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    <a href="paitent-details.html" class="avatar avatar-sm me-2">
                                                                                        <img class="avatar-img rounded-3" src="{{ asset('main_assets/img/doctors-dashboard/profile-06.jpg') }}" alt="User Image">
                                                                                    </a>
                                                                                    <a href="paitent-details.html">Hendrita Clark</a>
                                                                                </h2>
                                                                            </td>
                                                                            <td>Take Good Rest</td>
                                                                            <td>
                                                                                <div class="action-item">
                                                                                    <a href="javascript:void(0);"  data-bs-toggle="modal" data-bs-target="#view_report">
                                                                                        <i class="isax isax-link-2"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);">
                                                                                        <i class="isax isax-import"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                                        <i class="isax isax-trash"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><a href="javascript:void(0);" class="link-primary">#MR3656</a></td>
                                                                            <td>
                                                                                <a href="javascript:void(0);" class="lab-icon">Complete Blood Count</a>
                                                                            </td>
                                                                            <td>10 Apr 2024</td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    <a href="paitent-details.html" class="avatar avatar-sm me-2">
                                                                                        <img class="avatar-img rounded-3" src="{{ asset('main_assets/img/dependent/dependent-01.jpg') }}" alt="User Image">
                                                                                    </a>
                                                                                    <a href="paitent-details.html">Laura Stewart</a>
                                                                                </h2>
                                                                            </td>
                                                                            <td>Stable, no change</td>
                                                                            <td>
                                                                                <div class="action-item">
                                                                                    <a href="javascript:void(0);"  data-bs-toggle="modal" data-bs-target="#view_report">
                                                                                        <i class="isax isax-link-2"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);">
                                                                                        <i class="isax isax-import"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                                        <i class="isax isax-trash"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><a href="javascript:void(0);" class="link-primary">#MR1246</a></td>
                                                                            <td>
                                                                                <a href="javascript:void(0);" class="lab-icon">Blood Glucose Test</a>
                                                                            </td>
                                                                            <td>19 Apr 2024</td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    <a href="paitent-details.html" class="avatar avatar-sm me-2">
                                                                                        <img class="avatar-img rounded-3" src="{{ asset('main_assets/img/dependent/dependent-02.jpg') }}" alt="User Image">
                                                                                    </a>
                                                                                    <a href="paitent-details.html">Mathew Charles </a>
                                                                                </h2>
                                                                            </td>
                                                                            <td>All Clear</td>
                                                                            <td>
                                                                                <div class="action-item">
                                                                                    <a href="javascript:void(0);"  data-bs-toggle="modal" data-bs-target="#view_report">
                                                                                        <i class="isax isax-link-2"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);">
                                                                                        <i class="isax isax-import"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                                        <i class="isax isax-trash"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><a href="javascript:void(0);" class="link-primary">#MR6985</a></td>
                                                                            <td>
                                                                                <a href="javascript:void(0);" class="lab-icon">Liver Function Tests</a>
                                                                            </td>
                                                                            <td>27 Apr 2024</td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    <a href="paitent-details.html" class="avatar avatar-sm me-2">
                                                                                        <img class="avatar-img rounded-3" src="{{ asset('main_assets/img/dependent/dependent-03.jpg') }}" alt="User Image">
                                                                                    </a>
                                                                                    <a href="paitent-details.html">Christopher Joseph</a>
                                                                                </h2>
                                                                            </td>
                                                                            <td>Stable, no change</td>
                                                                            <td>
                                                                                <div class="action-item">
                                                                                    <a href="javascript:void(0);"  data-bs-toggle="modal" data-bs-target="#view_report">
                                                                                        <i class="isax isax-link-2"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);">
                                                                                        <i class="isax isax-import"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                                        <i class="isax isax-trash"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td ><a href="#" class="link-primary">#MR3659</a></td>
                                                                            <td>
                                                                                <a href="javascript:void(0);" class="lab-icon">Blood Cultures</a>
                                                                            </td>
                                                                            <td>10 May  2024</td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    <a href="paitent-details.html" class="avatar avatar-sm me-2">
                                                                                        <img class="avatar-img rounded-3" src="{{ asset('main_assets/img/dependent/dependent-04.jpg') }}" alt="User Image">
                                                                                    </a>
                                                                                    <a href="paitent-details.html">Elisa Salcedo</a>
                                                                                </h2>
                                                                            </td>
                                                                            <td>Take Good Rest</td>
                                                                            <td>
                                                                                <div class="action-item">
                                                                                    <a href="javascript:void(0);"  data-bs-toggle="modal" data-bs-target="#view_report">
                                                                                        <i class="isax isax-link-2"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);">
                                                                                        <i class="isax isax-import"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                                        <i class="isax isax-trash"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                   </div>
                                                   <!-- /Medical Records Tab -->

                                                    <!-- Prescriptions Tab -->
                                                   <div class="tab-pane fade" id="prsc-tab">
                                                        <div class="custom-table">
                                                            <div class="table-responsive">
                                                                <table class="table table-center mb-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>ID</th>
                                                                            <th>Name</th>
                                                                            <th>Date</th>
                                                                            <th>Prescriped By</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="link-primary"><a href="#"  data-bs-toggle="modal" data-bs-target="#view_prescription">#P1236</a></td>
                                                                            <td>
                                                                                <a href="javascript:void(0);" class="lab-icon prescription">Prescription</a>
                                                                            </td>
                                                                            <td>21 Mar 2024, 10:30 AM</td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                                        <img class="avatar-img rounded-3" src="{{ asset('main_assets/img/doctors/doctor-thumb-02.jpg') }}" alt="User Image">
                                                                                    </a>
                                                                                    <a href="doctor-profile.html">Edalin Hendry</a>
                                                                                </h2>
                                                                            </td>
                                                                            <td>
                                                                                <div class="action-item">
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
                                                                                        <i class="isax isax-link-2"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);">
                                                                                        <i class="isax isax-import"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                                        <i class="isax isax-trash"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>    
                                                                            <td class="link-primary"><a href="#"  data-bs-toggle="modal" data-bs-target="#view_prescription">#P3656</a></td>
                                                                            <td>
                                                                                <a href="javascript:void(0);" class="lab-icon prescription">Prescription</a>
                                                                            </td>
                                                                            <td>28 Mar 2024, 11:40 AM</td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                                        <img class="avatar-img rounded-3" src="{{ asset('main_assets/img/doctors/doctor-thumb-05.jpg') }}" alt="User Image">
                                                                                    </a>
                                                                                    <a href="doctor-profile.html">John Homes</a>
                                                                                </h2>
                                                                            </td>
                                                                            <td>
                                                                                <div class="action-item">
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
                                                                                        <i class="isax isax-link-2"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);">
                                                                                        <i class="isax isax-import"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                                        <i class="isax isax-trash"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>    
                                                                            <td class="link-primary"><a href="#"  data-bs-toggle="modal" data-bs-target="#view_prescription">#P1246</a></td>
                                                                            <td>
                                                                                <a href="javascript:void(0);" class="lab-icon prescription">Prescription</a>
                                                                            </td>
                                                                            <td>11 Apr 2024, 09:00 AM</td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                                        <img class="avatar-img rounded-3" src="{{ asset('main_assets/img/doctors/doctor-thumb-03.jpg') }}" alt="User Image">
                                                                                    </a>
                                                                                    <a href="doctor-profile.html">Shanta Neill</a>
                                                                                </h2>
                                                                            </td>
                                                                            <td>
                                                                                <div class="action-item">
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
                                                                                        <i class="isax isax-link-2"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);">
                                                                                        <i class="isax isax-import"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                                        <i class="isax isax-trash"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>                                                        
                                                                            <td class="link-primary"><a href="#"  data-bs-toggle="modal" data-bs-target="#view_prescription">#P6985</a></td>
                                                                            <td>
                                                                                <a href="javascript:void(0);" class="lab-icon prescription">Prescription</a>
                                                                            </td>
                                                                            <td>15 Apr 2024, 02:30 PM</td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                                        <img class="avatar-img rounded-3" src="{{ asset('main_assets/img/doctors/doctor-thumb-08.jpg') }}" alt="User Image">
                                                                                    </a>
                                                                                    <a href="doctor-profile.html">Anthony Tran</a>
                                                                                </h2>
                                                                            </td>
                                                                            <td>
                                                                                <div class="action-item">
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
                                                                                        <i class="isax isax-link-2"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);">
                                                                                        <i class="isax isax-import"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                                        <i class="isax isax-trash"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>                                                        
                                                                            <td class="link-primary"><a href="#" data-bs-toggle="modal" data-bs-target="#view_prescription">#P3659</a></td>
                                                                            <td>
                                                                                <a href="javascript:void(0);" class="lab-icon prescription">Prescription</a>
                                                                            </td>
                                                                            <td>23 Apr 2024, 06:40 PM</td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                                        <img class="avatar-img rounded-3" src="{{ asset('main_assets/img/doctors/doctor-thumb-01.jpg') }}" alt="User Image">
                                                                                    </a>
                                                                                    <a href="doctor-profile.html">Susan Lingo</a>
                                                                                </h2>
                                                                            </td>
                                                                            <td>
                                                                                <div class="action-item">
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
                                                                                        <i class="isax isax-link-2"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);">
                                                                                        <i class="isax isax-import"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                                        <i class="isax isax-trash"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                   </div>
                                                    <!-- Prescriptions Tab -->

                                                     <!--Invoices Tab -->
                                                   <div class="tab-pane fade" id="invoice-tab">
                                                        <div class="custom-table">
                                                            <div class="table-responsive">
                                                                <table class="table table-center mb-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>ID</th>
                                                                            <th>Doctor</th>
                                                                            <th>Appointment Date</th>
                                                                            <th>Booked on</th>
                                                                            <th>Amount</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><a href="#" data-bs-toggle="modal" data-bs-target="#invoice_view" class="link-primary">#INV1236</a></td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                                        <img class="avatar-img rounded-3" src="{{ asset('main_assets/img/doctors/doctor-thumb-21.jpg') }}" alt="User Image">
                                                                                    </a>
                                                                                    <a href="doctor-profile.html">Edalin Hendry</a>
                                                                                </h2>
                                                                            </td>
                                                                            <td>24 Mar 2024</td>
                                                                            <td>21 Mar 2024</td>
                                                                            <td>$300</td>
                                                                            <td>
                                                                                <div class="action-item">
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#invoice_view">
                                                                                        <i class="isax isax-link-2"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                                        <i class="isax isax-trash"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><a href="#" data-bs-toggle="modal" data-bs-target="#invoice_view" class="link-primary">#NV3656</a></td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                                        <img class="avatar-img rounded-3" src="{{ asset('main_assets/img/doctors/doctor-thumb-13.jpg') }}" alt="User Image">
                                                                                    </a>
                                                                                    <a href="doctor-profile.html">John Homes</a>
                                                                                </h2>
                                                                            </td>
                                                                            <td>17 Mar 2024</td>
                                                                            <td>14 Mar 2024</td>
                                                                            <td>$450</td>
                                                                            <td>
                                                                                <div class="action-item">
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#invoice_view">
                                                                                        <i class="isax isax-link-2"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                                        <i class="isax isax-trash"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><a href="#" data-bs-toggle="modal" data-bs-target="#invoice_view" class="link-primary">#INV1246</a></td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                                        <img class="avatar-img rounded-3" src="{{ asset('main_assets/img/doctors/doctor-thumb-03.jpg') }}" alt="User Image">
                                                                                    </a>
                                                                                    <a href="doctor-profile.html">Shanta Neill</a>
                                                                                </h2>
                                                                            </td>
                                                                            <td>11 Mar 2024</td>
                                                                            <td>07 Mar 2024</td>
                                                                            <td>$250</td>
                                                                            <td>
                                                                                <div class="action-item">
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#invoice_view">
                                                                                        <i class="isax isax-link-2"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                                        <i class="isax isax-trash"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><a href="#" data-bs-toggle="modal" data-bs-target="#invoice_view" class="link-primary">#INV6985</a></td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                                        <img class="avatar-img rounded-3" src="{{ asset('main_assets/img/doctors/doctor-thumb-08.jpg') }}" alt="User Image">
                                                                                    </a>
                                                                                    <a href="doctor-profile.html">Anthony Tran</a>
                                                                                </h2>
                                                                            </td>
                                                                            <td>26 Feb 2024</td>
                                                                            <td>23 Feb 2024</td>
                                                                            <td>$320</td>
                                                                            <td>
                                                                                <div class="action-item">
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#invoice_view">
                                                                                        <i class="isax isax-link-2"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                                        <i class="isax isax-trash"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><a href="#" data-bs-toggle="modal" data-bs-target="#invoice_view"  class="link-primary">#INV3659</a></td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                                                        <img class="avatar-img rounded-3" src="{{ asset('main_assets/img/doctors/doctor-thumb-01.jpg') }}" alt="User Image">
                                                                                    </a>
                                                                                    <a href="doctor-profile.html">Susan Lingo</a>
                                                                                </h2>
                                                                            </td>
                                                                            <td>18 Feb 2024</td>
                                                                            <td>15 Feb 2024</td>
                                                                            <td>$480</td>
                                                                            <td>
                                                                                <div class="action-item">
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#invoice_view">
                                                                                        <i class="isax isax-link-2"></i>
                                                                                    </a>
                                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                                        <i class="isax isax-trash"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                   </div>
                                                    <!-- Invoices Tab -->
                                                       
                                               </div>
                                               <!-- Tab Content -->
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
           
        </div>
        <!-- /Main Wrapper -->

        <!-- Add Dependent Modal-->
        <div class="modal fade custom-modals" id="add_dependent">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Add Dependant</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <form action="#">                   
                        <div class="add-dependent">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-wrap pb-0">
                                            <div class="change-avatar img-upload">
                                                <div class="profile-img">
                                                    <i class="fa-solid fa-file-image"></i>
                                                </div>
                                                <div class="upload-img">
                                                    <h5>Profile Image</h5>
                                                    <div class="imgs-load d-flex align-items-center">
                                                        <div class="change-photo">
                                                            Upload New 
                                                            <input type="file" class="upload">
                                                        </div>
                                                        <a href="#" class="upload-remove">Remove</a>
                                                    </div>
                                                    <p>Your Image should Below 4 MB, Accepted format jpg,png,svg</p>
                                                </div>          
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Relationship</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">DOB <span class="text-danger">*</span></label>
                                            <div class="form-icon">
                                                <input type="text" class="form-control datetimepicker">
                                                <span class="icon"><i class="fa-regular fa-calendar-days"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Select Gender</label>
                                            <select class="select">
                                                <option>Select</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">                  
                            <div class="modal-btn text-end">
                                <a href="#" class="btn btn-gray" data-bs-toggle="modal" data-bs-dismiss="modal">Cancel</a>
                                <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Add Dependent Modal-->

        <!--View Invoice -->
        <div class="modal fade custom-modals" id="invoice_view">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">View Invoice</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>              
                    <div class="modal-body pb-0">
                        <div class="prescribe-download">
                            <h5>21 Mar  2024</h5>
                            <ul>
                                <li><a href="javascript:void(0);" class="print-link"><i class="isax isax-printer"></i></a></li>
                                <li><a href="#" class="btn btn-md btn-primary-gradient rounded-pill">Download</a></li>
                            </ul>                           
                        </div>
                        <div class="view-prescribe invoice-content mb-0">
                            <div class="invoice-item">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="invoice-logo">
                                            <img src="{{ asset('main_assets/img/logo.svg') }}" alt="logo">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="invoice-details">
                                            Invoice No : <span> #INV005</span><br>
                                            Issued: <span>21 Mar 2024</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Invoice Item -->
                            <div class="invoice-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="invoice-info">
                                            <h6 class="customer-text">Billing From</h6>
                                            <p class="invoice-details invoice-details-two">
                                                Edalin Hendry <br>
                                                806 Twin Willow Lane, <br>
                                                Newyork, USA <br>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="invoice-info">
                                            <h6 class="customer-text">Billing To</h6>
                                            <p class="invoice-details invoice-details-two">
                                                Richard Wilson <br>
                                                299 Star Trek Drive<br>
                                                Florida, 32405, USA<br>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="invoice-info invoice-info2">
                                            <h6 class="customer-text">Payment Method</h6>
                                            <p class="invoice-details">
                                                Debit Card <br>
                                                XXXXXXXXXXXX-2541<br>
                                                HDFC Bank<br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Invoice Item -->
                            
                            <!-- Invoice Item -->
                            <div class="invoice-item invoice-table-wrap">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6>Invoice Details</h6>
                                        <div class="invoice-table">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Description</th>
                                                            <th>Quatity</th>
                                                            <th>VAT</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-gray-9">General Consultation</td>
                                                            <td>1</td>
                                                            <td>$0</td>
                                                            <td>$150</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-gray-9">Video Call</td>
                                                            <td>1</td>
                                                            <td>$0</td>
                                                            <td>$100</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-4 ms-auto">
                                        <div class="table-responsive">
                                            <table class="invoice-table-two table">
                                                <tbody>
                                                <tr>
                                                    <th>Subtotal:</th>
                                                    <td><span>$350</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Discount:</th>
                                                    <td><span>-10%</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Amount:</th>
                                                    <td><span>$315</span></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Invoice Item -->
                            
                            <!-- Invoice Information -->
                            <div class="other-info mb-0">
                                <h6 class="mb-2">Other information</h6>
                                <p class="text-gray-9 mb-0">An account of the present illness, which includes the circumstances surrounding the onset of recent health changes and the chronology of subsequent events that have led the patient to seek medicine</p>
                            </div>
                            <!-- /Invoice Information -->
                            
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <!-- /View Invoice -->          

         <!--View Report -->
         <div class="modal fade custom-modals" id="view_report">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">View Report</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>              
                    <div class="modal-body pb-0">
                        <div class="prescribe-download gap-2">
                            <h5>21 Mar  2024</h5>
                            <ul>
                                <li><a href="javascript:void(0);" class="print-link"><i class="fa-solid fa-print"></i></a></li>
                                <li><a href="#" class="btn btn-md btn-primary-gradient rounded-pill">Download</a></li>
                            </ul>                           
                        </div>
                        <div class="view-prescribe-details p-0 border-0">
                            
                            <!-- Invoice Item -->
                            <div class="invoice-item">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="invoice-info d-flex align-items-center">
                                            <div class="clinic-image d-inline-flex align-items-center justify-content-center">
                                                <img src="{{ asset('main_assets/img/icons/vtaplus.svg') }}" alt="img">
                                            </div>
                                            <div>
                                                <h6 class="fs-16 fw-semibold">Vitalplus Clinic</h6>
                                                <p class="fs-14 fw-medium">Dr. Sandy Maria</p>
                                                <p class="fs-14">MBLS,MS</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="invoice-info2">
                                            <p><span>Test Type : </span>CBC</p>
                                            <p><span>Collected On : </span>20 Mar 2024, 10:00 AM</p>
                                            <p><span>Reported On :  </span>21 Mar 2024, 11:00 AM</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="patient-infos d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                            <div class="d-flex align-items-center">
                                                <span class="avatar me-2">
                                                    <img src="{{ asset('main_assets/img/doctors-dashboard/profile-06.jpg') }}" class="rounded" alt="img">
                                                </span>
                                                <div>
                                                    <h6 class="fs-14 fw-medium">Hendrita Kearns</h6>
                                                    <p>Patient ID : PT254654</p>
                                                </div>
                                            </div>
                                            <div>
                                                <h6 class="fs-14 fw-medium">Gender</h6>
                                                <p>Female</p>
                                            </div>
                                            <div>
                                                <h6 class="fs-14 fw-medium">Age</h6>
                                                <p>32 years </p>
                                            </div>
                                            <div>
                                                <h6 class="fs-14 fw-medium">Blood</h6>
                                                <p>O+</p>
                                            </div>
                                            <div>
                                                <h6 class="fs-14 fw-medium">Type</h6>
                                                <p>Outpatient</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Invoice Item -->
                            
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
                                <h6>Complete Blood Count(CBC)</h6>
                                <p class="fs-14 mb-0"><span class="text-gray-9">Primary Test Type :</span> Blood</p>
                            </div>

                            <!-- Invoice Item -->
                            <div class="invoice-item invoice-table-wrap">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive inv-table">
                                            <table class="invoice-table table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Investigation</th>
                                                        <th>Result</th>
                                                        <th>Reference Value</th>
                                                        <th>Unit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="report-title" colspan="4">HEMOGLOBIN</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Hemoglobin (Hb)</td>
                                                        <td>12.5<span class="badge badge-info-transparent text-xs d-inline-block rounded-pill ms-1">Low</span></td>
                                                        <td>13.0 - 17.0</td>
                                                        <td>g/dL</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="report-title" colspan="4">RBC COUNT</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total RBC Count</td>
                                                        <td>5.2</td>
                                                        <td>4.5 - 5.5</td>
                                                        <td>million cells/µL</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="report-title" colspan="4">BLOOD INDICES</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Packed Cell Volume (PCV)</td>
                                                        <td class="text-danger">57.5<span class="badge badge-danger-transparent text-xs d-inline-block rounded-pill ms-1">High</span></td>
                                                        <td>40 - 50</td>
                                                        <td>%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mean Corpuscular Volume (MCV) <span class="fs-10 text-gray-6">Calculated</span></td>
                                                        <td>87.75</td>
                                                        <td>83 - 101</td>
                                                        <td>fL</td>
                                                    </tr>
                                                    <tr>
                                                        <td>MCH Calculated</td>
                                                        <td>27.72</td>
                                                        <td>27 - 32</td>
                                                        <td>pg</td>
                                                    </tr>
                                                    <tr>
                                                        <td>MCHC Calculated</td>
                                                        <td>32.8</td>
                                                        <td>32.5 - 34.5</td>
                                                        <td>g/dL</td>
                                                    </tr>
                                                    <tr>
                                                        <td>RDW</td>
                                                        <td>13.6</td>
                                                        <td>11.6 - 14.0</td>
                                                        <td>%</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="report-title" colspan="4">WBC COUNT</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total WBC Count</td>
                                                        <td>9000</td>
                                                        <td>4000 - 11000</td>
                                                        <td>cells/µL</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="report-title" colspan="4">DIFFERENTIAL WBC COUNT</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Neutrophils</td>
                                                        <td>60</td>
                                                        <td>50 - 62</td>
                                                        <td>%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lymphocytes</td>
                                                        <td>31</td>
                                                        <td>20 - 40</td>
                                                        <td>%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Eosinophils</td>
                                                        <td>01</td>
                                                        <td>00 - 06</td>
                                                        <td>%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Monocytes</td>
                                                        <td>07</td>
                                                        <td>00 - 10</td>
                                                        <td>%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Basophils</td>
                                                        <td>01</td>
                                                        <td>00 - 02</td>
                                                        <td>%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Platelet Count</td>
                                                        <td>248157</td>
                                                        <td>150000 - 410000</td>
                                                        <td>µL</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Invoice Item -->

                            <p class="mb-2"><span class="text-gray-9 fw-medium">Instruments :</span> Fully Automated Cell Counter - Mindray 300</p>
                            <p class="mb-3"><span class="text-gray-9 fw-medium">Interpretation :</span> Further confirm for Anemia</p>

                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="scan-wrap">
                                        <h6>Scan to download report</h6>
                                        <img src="{{ asset('main_assets/img/scan.png') }}" alt="scan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="prescriber-info">
                                        <h6>Dr. Edalin Hendry</h6>
                                        <p>Dept of Cardiology</p>
                                    </div>
                                </div>
                            </div>

                            <ul class="nav inv-paginate justify-content-center">
                                <li>Page 01 of <a href="#" data-bs-toggle="modal" data-bs-target="#view_prescription2" data-bs-dismiss="modal">02</a></li>
                            </ul>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <!-- /View Report -->

        <!--View Prescription -->
        <div class="modal fade custom-modals" id="view_prescription">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">View Prescription</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>              
                    <div class="modal-body pb-0">
                        <div class="prescribe-download">
                            <h5>21 Mar  2024</h5>
                            <ul>
                                <li><a href="javascript:void(0);" class="print-link"><i class="isax isax-printer"></i></a></li>
                                <li><a href="#" class="btn btn-primary-gradient rounded-pill">Download</a></li>
                            </ul>                           
                        </div>
                        <div class="view-prescribe invoice-content mb-0">
                            <div class="invoice-item">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="invoice-logo">
                                            <img src="{{ asset('main_assets/img/logo.svg') }}" alt="logo">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="invoice-details">
                                            <strong>Prescription ID :</strong> #PR-123 <br>
                                            <strong>Issued:</strong> 21 Mar 2024
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Invoice Item -->
                            <div class="invoice-item">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="invoice-info">
                                            <h6 class="customer-text">Doctor Details</h6>
                                            <p class="invoice-details invoice-details-two">
                                                Edalin Hendry <br>
                                                806 Twin Willow Lane, <br>
                                                Newyork, USA <br>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="invoice-info invoice-info2">
                                            <h6 class="customer-text">Patient Details</h6>
                                            <p class="invoice-details">
                                                Adrian Marshall <br>
                                                299 Star Trek Drive,<br>
                                                Florida, 32405, USA <br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Invoice Item -->
                            
                            <!-- Invoice Item -->
                            <div class="invoice-item invoice-table-wrap">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6>Prescription  Details</h6>
                                        <div class="table-responsive">
                                            <table class="invoice-table table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Medicine Name</th>
                                                        <th>Dosage</th>
                                                        <th>Frequency</th>
                                                        <th>Duration</th>
                                                        <th>Timings</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Ecosprin 75MG [Asprin 75 MG Oral Tab]</td>
                                                        <td>75 mg <span>Oral Tab</span></td>
                                                        <td>1-0-0-1</td>
                                                        <td>1 month</td>
                                                        <td>Before Meal</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alexer 90MG Tab</td>
                                                        <td>90 mg <span>Oral Tab</span></td>
                                                        <td>1-0-0-1</td>
                                                        <td>1 month</td>
                                                        <td>Before Meal</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ramistar XL2.5</td>
                                                        <td>60 mg <span>Oral Tab</span></td>
                                                        <td>1-0-0-0</td>
                                                        <td>1 month</td>
                                                        <td>After Meal</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Metscore</td>
                                                        <td>90 mg <span>Oral Tab</span></td>
                                                        <td>1-0-0-1</td>
                                                        <td>1 month</td>
                                                        <td>After Meal</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Invoice Item -->
                            
                            <!-- Invoice Information -->
                            <div class="other-info">
                                <h4>Other information</h4>
                                <p class="mb-0">An account of the present illness, which includes the circumstances surrounding the onset of recent health changes and the chronology of subsequent events that have led the patient to seek medicine</p>
                            </div>
                            <div class="other-info">
                                <h4>Follow Up</h4>
                                <p class="mb-0">Follow up after 3 months, Have to come on empty stomach</p>
                            </div>
                            <div class="prescriber-info">
                                <h6>Dr. Edalin Hendry</h6>
                                <p>Dept of Cardiology</p>
                            </div>
                            <!-- /Invoice Information -->
                            
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <!-- /View Prescription -->

        <!-- Delete -->
        <div class="modal fade custom-modals" id="delete_modal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body p-4 text-center">
                        <form action="https://doccure.dreamstechnologies.com/html/template/patient-dashboard.html">
                            <span class="del-icon mb-2 mx-auto">
                                <i class="isax isax-trash"></i>
                            </span>
                            <h3 class="mb-2">Delete Record</h3>
                            <p class="mb-3">Are you sure you want to delete this record?</p>
                            <div class="d-flex justify-content-center flex-wrap gap-3">
                                <a href="#" class="btn btn-md btn-dark rounded-pill" data-bs-dismiss="modal">Cancel</a>
                                <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Yes Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete -->

        <!-- jQuery -->
        <script src="{{ asset('main_assets/js/jquery-3.7.1.min.js') }}"></script>
        
        <!-- Bootstrap Core JS -->
        <script src="{{ asset('main_assets/js/bootstrap.bundle.min.js') }}"></script>
        
        <!-- Sticky Sidebar JS -->
        <script src="{{ asset('main_assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
        <script src="{{ asset('main_assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}" ></script>

        <!-- select JS -->
        <script src="{{ asset('main_assets/plugins/select2/js/select2.min.js') }}" ></script>

        <!-- Owl Carousel JS -->
        <script src="{{ asset('main_assets/js/owl.carousel.min.js') }}"></script>

        <!-- Apexchart JS -->
        <script src="{{ asset('main_assets/plugins/apex/apexcharts.min.js') }}"></script>
        <script src="{{ asset('main_assets/plugins/apex/chart-data.js') }}" ></script>

        <!-- Datepicker JS -->
        <script src="{{ asset('main_assets/js/moment.min.js') }}"></script>
        <script src="{{ asset('main_assets/js/bootstrap-datetimepicker.min.js') }}" ></script>

        <!-- Circle Progress JS -->
        <script src="{{ asset('main_assets/js/circle-progress.min.js') }}"></script>
        
        <!-- Custom JS -->
        <script src="{{ asset('main_assets/js/script.js') }}"></script>
</body>
</html>