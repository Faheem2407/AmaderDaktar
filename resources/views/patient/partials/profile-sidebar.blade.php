<!-- Profile Sidebar -->
<div class="profile-sidebar patient-sidebar profile-sidebar-new">
    
    <!-- Profile Widget -->
    <div class="widget-profile pro-widget-content">
        <div class="profile-info-widget">
            <a href="{{ route('patient.profile-settings') }}" class="booking-doc-img">
                <img src="{{ asset(optional(auth()->user())->avatar ?? 'main_assets/img/doctors-dashboard/profile-06.jpg') }}" alt="User Image">
            </a>
            <div class="profile-det-info">
                <h3>
                    <a href="{{ route('patient.profile-settings') }}">
                        {{ auth()->user()->name ?? 'Patient Name' }}
                    </a>
                </h3>
                <div class="patient-details">
                    <h5 class="mb-0">
                        Patient ID : {{ 'PT' . auth()->id() }}
                    </h5>
                </div>
                <span>
                    {{ optional(auth()->user())->gender ?? 'Unknown' }} 
{{--                     <i class="fa-solid fa-circle"></i> 
                    {{ optional(auth()->user())->age ?? 'N/A' }} years --}}
                </span>
            </div>
        </div>
    </div>
    <!-- /Profile Widget -->

    <!-- Dashboard Menu -->
    <div class="dashboard-widget">
        <nav class="dashboard-menu">
            <ul>
                <li class="{{ request()->routeIs('patient.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('patient.dashboard') }}">
                        <i class="isax isax-category-2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="isax isax-calendar-1"></i>
                        <span>My Appointments</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="isax isax-star-1"></i>
                        <span>Favourites</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="isax isax-user-octagon"></i>
                        <span>Dependants</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="isax isax-note-21"></i>
                        <span>Medical Records</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="isax isax-wallet-2"></i>
                        <span>Wallet</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="isax isax-document-text"></i>
                        <span>Invoices</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="isax isax-messages-1"></i>
                        <span>Message</span>
                        <small class="unread-msg">7</small>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="isax isax-note-1"></i>
                        <span>Vitals</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('patient.profile-settings*') ? 'active' : '' }}">
                    <a href="{{ route('patient.profile-settings') }}">
                        <i class="isax isax-setting-2"></i>
                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="isax isax-logout"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /Dashboard Menu -->

</div>
<!-- /Profile Sidebar -->
