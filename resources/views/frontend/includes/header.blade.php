<header class="header-menu-area bg-white">
    <div class="header-menu-content pr-150px pl-150px bg-white">
        <div class="container-fluid">
            <div class="main-menu-content">
                <a href="#" class="down-button"><i class="la la-angle-down"></i></a>
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="logo-box justify-content-between">
                            <a href="" class="logo"><img src="{{ asset('frontend/images/logo.png') }}" alt="logo"></a>
                            <div class="user-btn-action">
                                <div class="off-canvas-menu-toggle main-menu-toggle icon-element icon-element-sm shadow-sm" data-toggle="tooltip" data-placement="top" title="Main menu">
                                    <i class="la la-bars"></i>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col-lg-2 -->
                    <div class="col-lg-9">
                        <div class="menu-wrapper">
                            <nav class="main-menu mx-auto">
                                <ul class="d-flex justify-content-center">
                                    <li>
                                        <a href="#home" onclick="scrollToSection(event, 'home')">Home</a>
                                    </li>
                                    <li>
                                        <a href="#features" onclick="scrollToSection(event, 'features')">Features</a>
                                    </li>
                                    <li>
                                        <a href="#how-to-use">How to Use</a>
                                    </li>
                                    <li>
                                        <a href="#faqs">FAQs</a>
                                    </li>
                                </ul><!-- end ul -->
                            </nav><!-- end main-menu -->
                            <div class="nav-right-button ml-auto">
                                <a href="{{ url('/login') }}" class="btn theme-btn theme-btn-sm lh-26 theme-btn-transparent mr-2"><i class="la la-sign-in mr-1"></i> Sign in</a>
                                <a href="#" class="btn theme-btn theme-btn-sm lh-26 shadow-none"><i class="la la-plus mr-1"></i> Sign up</a>
                            </div><!-- end nav-right-button -->
                        </div><!-- end menu-wrapper -->
                    </div><!-- end col-lg-9 -->
                </div><!-- end row -->
            </div>
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-content -->
    <div class="off-canvas-menu custom-scrollbar-styled main-off-canvas-menu">
        <div class="off-canvas-menu-close main-menu-close icon-element icon-element-sm shadow-sm" data-toggle="tooltip" data-placement="left" title="Close menu">
            <i class="la la-times"></i>
        </div><!-- end off-canvas-menu-close -->
        <ul class="generic-list-item off-canvas-menu-list pt-90px">
            <li>
                <a href="#home" onclick="scrollToSection(event, 'home')">Home</a>
            </li>
            <li>
                <a href="#features">Features</a>
            </li>
            <li>
                <a href="#how-to-use">How to Use</a>
            </li>
            <li>
                <a href="#faqs">FAQs</a>
            </li>
        </ul>
        <div class="btn-box px-4 pt-5 text-center">
            <a href="{{ url('/login') }}" class="btn theme-btn theme-btn-sm theme-btn-transparent"><i class="la la-sign-in mr-1"></i> Login</a>
            <span class="fs-15 font-weight-medium d-inline-block mx-2">Or</span>
            <a href="#" class="btn theme-btn theme-btn-sm shadow-none"><i class="la la-plus mr-1"></i> Sign up</a>
        </div>
    </div><!-- end off-canvas-menu -->
    <div class="body-overlay"></div>
</header><!-- end header-menu-area -->