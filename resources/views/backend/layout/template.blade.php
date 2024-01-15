<!doctype html>
<html lang="en" class="semi-dark">


<!-- Mirrored from codervent.com/rukada/demo/vertical/dashboard-eCommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jan 2023 17:30:44 GMT -->
<head>
	@include('backend.includes.header')
	@yield('page-title')
	@include('backend.includes.css')
	@yield('body-css')
</head>
 
<body>
	<!--wrapper-->
	<div class="wrapper">
	@include('backend.includes.menubar')

	@include('backend.includes.topbar')
		<!--start page wrapper -->
		<div class="page-wrapper">
	       @yield('body-content')
		</div>
		<!--end page wrapper -->
		@include('backend.includes.footer')
	</div>
	<!--end wrapper-->
	
	@include('backend.includes.script')
	@yield('body-script')
</body> 


</html