<div class="sidebar-header">
    <div>
        <img src="{{ asset('frontend/images/favicon.png') }}" class="logo-icon" alt="logo icon">
    </div>
    <div>
        <h4 class="logo-text">WeBLI</h4>
    </div>
    <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
    </div>
 </div>
<!--navigation-->
<ul class="metismenu" id="menu">
    <li class="{{ request()->routeIs('admin.dashboard') ? 'mm-active' : '' }}">
        <a href="{{ route('admin.dashboard') }}">
            <div class="parent-icon"><i class='bx bx-home-alt'></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>
    <li class="menu-label">My Courses</li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-cart'></i>
            </div>
            <div class="menu-title">eCommerce</div>
        </a>
        <ul>
            <li> <a href="ecommerce-products.html"><i class='bx bx-radio-circle'></i>Products</a>
            </li>
            <li> <a href="ecommerce-products-details.html"><i class='bx bx-radio-circle'></i>Product Details</a>
            </li>
        </ul>
    </li>
    <li class="menu-label">Landing Page</li>
    <li class="{{ request()->routeIs('admin.home.index','admin.home.edit') ? 'mm-active' : '' }}">
        <a href="{{ route('admin.home.index') }}">
            <div class="parent-icon"><i class="bx bx-radio-circle"></i>
            </div>
            <div class="menu-title">Home</div>
        </a>
    </li>
    <li class="{{ request()->routeIs('admin.about.index','admin.about.edit') ? 'mm-active' : '' }}">
        <a href="{{ route('admin.about.index') }}">
            <div class="parent-icon"><i class="bx bx-radio-circle"></i>
            </div>
            <div class="menu-title">About</div>
        </a>
    </li>
    <li class="{{ request()->routeIs('admin.features.index','admin.features.create','admin.features.edit') ? 'mm-active' : '' }}">
        <a href="{{ route('admin.features.index') }}">
            <div class="parent-icon"><i class="bx bx-radio-circle"></i>
            </div>
            <div class="menu-title">Features</div>
        </a>
    </li>
    <li class="{{ request()->routeIs('admin.how-to-use.index','admin.how-to-use.create','admin.how-to-use.edit') ? 'mm-active' : '' }}">
        <a href="{{ route('admin.how-to-use.index') }}">
            <div class="parent-icon"><i class="bx bx-radio-circle"></i>
            </div>
            <div class="menu-title">How To Use</div>
        </a>
    </li>
    <li class="{{ request()->routeIs('admin.faq.index','admin.faq.create','admin.faq.edit') ? 'mm-active' : '' }}">
        <a href="{{ route('admin.faq.index') }}">
            <div class="parent-icon"><i class="bx bx-radio-circle"></i>
            </div>
            <div class="menu-title">FAQ</div>
        </a>
    </li>
    <li class="{{ request()->routeIs('admin.contact.index','admin.contact.show','admin.contact.edit') ? 'mm-active' : '' }}">
        <a href="{{ route('admin.contact.index') }}">
            <div class="parent-icon"><i class="bx bx-radio-circle"></i>
            </div>
            <div class="menu-title">Contact</div>
        </a>
    </li>
    <li class="menu-label">Users Management</li>
    <li class="{{ request()->routeIs('admin.students-data.index') ? 'mm-active' : '' }}">
        <a href="{{ route('admin.students-data.index') }}">
            <div class="parent-icon"><i class="bx bx-radio-circle"></i>
            </div>
            <div class="menu-title">Students</div>
        </a>
    </li>
</ul>