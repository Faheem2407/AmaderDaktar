<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                {{-- <li class="menu-title"><span>Main</span></li> --}}

                <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fe fe-home"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fe fe-layout"></i> <span>Appointments</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.specialities.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.specialities.index') }}">
                        <i class="fe fe-users"></i> <span>Specialities</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.doctors.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.doctors.index') }}">
                        <i class="fe fe-user-plus"></i> <span>Doctors</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.patients') ? 'active' : '' }}">
                    <a href="{{ route('admin.patients') }}">
                        <i class="fe fe-user"></i> <span>Patients</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fe fe-star-o"></i> <span>Reviews</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fe fe-activity"></i> <span>Transactions</span>
                    </a>
                </li>
                
                <li class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings.index') }}">
                        <i class="fe fe-vector"></i>
                        <span>Settings</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.admins.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.admins.index') }}">
                        <i class="fe fe-user-plus"></i>
                        <span>Admin Profiles</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.privileges.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.privileges.index') }}">
                        <i class="fe fe-shield"></i>
                        <span>Privileges</span>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</div>
