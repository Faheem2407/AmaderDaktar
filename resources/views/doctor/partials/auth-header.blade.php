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
                        <div class="header-menu">
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
                        </div>
                    </nav>
                </div>
            </header>
            <!-- /Header -->