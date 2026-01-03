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