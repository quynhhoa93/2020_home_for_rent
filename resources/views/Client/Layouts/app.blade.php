<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="advanced custom search, agency, agent, business, clean, corporate, directory, google maps, homes, idx agent, listing properties, membership packages, property, real broker, real estate, real estate agent, real estate agency, realtor">
<meta name="description" content="FindHouse - Real Estate HTML Template">
<meta name="CreativeLayers" content="ATFN">
<!-- css file -->
{{-- <link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.css')}}"> --}}
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="assets/css/responsive.css">
<!-- Title -->
<title>{{ $title }}</title>
<!-- Favicon -->
<link href="assets/images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="assets/images/favicon.ico" sizes="128x128" rel="shortcut icon" />

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="wrapper">
	<div class="preloader"></div>

    <!-- Main Header Nav -->
	@include('client.Layouts.header')
	<!-- Modal -->

	@yield('content')

    <!-- Footer -->
	@include('client.Layouts.footer')
    <!-- end footer -->
</div>
<!-- Wrapper End -->
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="assets/js/jquery-migrate-3.0.0.min.js"></script>
<script type="text/javascript" src="assets/js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.mmenu.all.js"></script>
<script type="text/javascript" src="assets/js/ace-responsive-menu.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/js/isotop.js"></script>
<script type="text/javascript" src="assets/js/snackbar.min.js"></script>
<script type="text/javascript" src="assets/js/simplebar.js"></script>
<script type="text/javascript" src="assets/js/parallax.js"></script>
<script type="text/javascript" src="assets/js/scrollto.js"></script>
<script type="text/javascript" src="assets/js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="assets/js/jquery.counterup.js"></script>
<script type="text/javascript" src="assets/js/wow.min.js"></script>
<script type="text/javascript" src="assets/js/slider.js"></script>
<script type="text/javascript" src="assets/js/timepicker.js"></script>
<!-- Custom script for all pages -->
<script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>
