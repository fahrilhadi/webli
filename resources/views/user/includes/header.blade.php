<header class="header-menu-area">
    <div class="header-menu-content dashboard-menu-content pr-30px pl-30px bg-white shadow-sm">
        <div class="container-fluid">
            <div class="main-menu-content">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="logo-box logo--box">
                            <a href="{{ route('dashboard') }}" class="logo"><img src="{{ asset('frontend/images/logo.png') }}" alt="logo"></a>
                            <div class="user-btn-action">
                                <div class="off-canvas-menu-toggle main-menu-toggle icon-element icon-element-sm shadow-sm" data-toggle="tooltip" data-placement="top" title="Main menu">
                                    <i class="la la-bars"></i>
                                </div>
                            </div>
                        </div><!-- end logo-box -->
                        <div class="menu-wrapper">
                            <div class="nav-right-button d-flex align-items-center">
                                <div class="user-action-wrap d-flex align-items-center">

                                    @php
                                        $id = Auth::user()->id;
                                        $userProfile = App\Models\User::findOrFail($id);
                                    @endphp

                                    <div class="shop-cart user-profile-cart">
                                        <ul>
                                            <li>
                                                <div class="shop-cart-btn">
                                                    <div class="avatar-sm">
                                                        <img class="rounded-full img-fluid" src="{{ !empty($userProfile->photo) ? asset('/storage/public/user/profile/' . $userProfile->photo) : asset('/frontend/images/no_image.png') }}" alt="Avatar image">
                                                    </div>
                                                    <span class="dot-status bg-5"></span>
                                                </div>
                                                <ul class="cart-dropdown-menu after-none p-0 notification-dropdown-menu">
                                                    <li class="menu-heading-block d-flex align-items-center">
                                                        <div class="avatar-sm flex-shrink-0 d-block">
                                                            <img class="rounded-full img-fluid" src="{{ !empty($userProfile->photo) ? asset('/storage/public/user/profile/' . $userProfile->photo) : asset('/frontend/images/no_image.png') }}" alt="Avatar image">
                                                        </div>
                                                        <div class="ml-2">
                                                            <h4 class="text-black">{{ $userProfile->name }}</h4>
                                                            <span class="d-block fs-14 lh-20">{{ $userProfile->occupation }}</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <ul class="generic-list-item">
                                                            <li>
                                                                <a href="{{ route('user.profile.index') }}">
                                                                    <i class="la la-user mr-1"></i> Profile
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="shopping-cart.html">
                                                                    <i class="la la-key mr-1"></i> Change Password
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                                    <i class="la la-power-off mr-1"></i> Logout
                                                                </a>
                                                                
                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                    @csrf
                                                                </form>                                                                
                                                            </li>
                                                            <li><div class="section-block"></div></li>
                                                            <li>
                                                                <a href="{{ url('/') }}" class="position-relative">
                                                                    <span class="fs-16 font-weight-semi-bold d-block">WebLI</span>
                                                                    <span class="lh-20 d-block fs-13 text-gray">Website Basic Listening Instruction</span>
                                                                    <span class="position-absolute top-0 right-0 mt-3 mr-3 fs-18 text-gray">
                                                                    <i class="la la-external-link"></i>
                                                                </span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div><!-- end shop-cart -->
                                </div>
                            </div><!-- end nav-right-button -->
                        </div><!-- end menu-wrapper -->
                    </div><!-- end col-lg-10 -->
                </div><!-- end row -->
            </div>
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-content -->
    <div class="off-canvas-menu custom-scrollbar-styled main-off-canvas-menu">
        <div class="off-canvas-menu-close main-menu-close icon-element icon-element-sm shadow-sm" data-toggle="tooltip" data-placement="left" title="Close menu">
            <i class="la la-times"></i>
        </div><!-- end off-canvas-menu-close -->
        <h4 class="off-canvas-menu-heading pt-90px">Account</h4>
        <ul class="generic-list-item off-canvas-menu-list pt-1 pb-2 border-bottom border-bottom-gray">
            <li><a href="dashboard.html">Dashboard</a></li>
            <li><a href="dashboard-message.html">My Course</a></li>
        </ul>
        <h4 class="off-canvas-menu-heading pt-20px">Profile</h4>
        <ul class="generic-list-item off-canvas-menu-list pt-1 pb-2 border-bottom border-bottom-gray">
            <li><a href="dashboard-purchase-history.html">Edit Profile</a></li>
            <li><a href="dashboard-purchase-history.html">Change Password</a></li>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div><!-- end off-canvas-menu -->
    <div class="body-overlay"></div>
</header><!-- end header-menu-area -->