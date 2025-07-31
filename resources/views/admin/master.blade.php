<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png') }}" type="image/png"/>

	<meta name="csrf-token" content="{{ csrf_token() }}">

	{{-- CSS Files --}}
    @stack('admin-prepend-style')
    @include('admin.includes.style')
    @stack('admin-addon-style')
    
	<title>@yield('admin-title')</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			@include('admin.includes.sidebar')
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		@include('admin.includes.header')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			@yield('admin-content')
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		 <div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		@include('admin.includes.footer')
	</div>
	<!--end wrapper-->

    {{-- Js Scripts --}}
    @stack('admin-prepend-script')
    @include('admin.includes.script')
    @stack('admin-addon-script')
    
</body>

</html>