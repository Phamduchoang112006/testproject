<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laravel @yield('title')</title>
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('assets/dest/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/dest/vendors/colorbox/example3/colorbox.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/dest/rs-plugin/css/settings.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/dest/rs-plugin/css/responsive.css') }}">
	<link rel="stylesheet" title="style" href="{{ asset('assets/dest/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/dest/css/animate.css') }}">
	<link rel="stylesheet" title="style" href="{{ asset('assets/dest/css/huong-style.css') }}">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<style>
		body {
			font-family: 'Inter', sans-serif !important;
			background-color: #f8f9fa;
		}
		.single-item {
			background: #fff;
			border-radius: 12px;
			overflow: hidden;
			box-shadow: 0 4px 15px rgba(0,0,0,0.05);
			transition: all 0.3s ease;
			border: none;
			margin-bottom: 30px;
		}
		.single-item:hover {
			transform: translateY(-5px);
			box-shadow: 0 10px 25px rgba(0,0,0,0.1);
		}
		.single-item-header img {
			width: 100%;
			object-fit: cover;
			transition: transform 0.5s ease;
		}
		.single-item:hover .single-item-header img {
			transform: scale(1.05);
		}
		.single-item-body {
			padding: 20px 15px;
		}
		.single-item-title {
			font-weight: 600;
			font-size: 16px;
			color: #333;
			margin-bottom: 10px;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
		}
		.flash-sale { color: #e74c3c; font-weight: bold; }
		.flash-del { color: #95a5a6; text-decoration: line-through; font-size: 14px; margin-right: 8px;}
		.single-item-caption {
			padding: 0 15px 20px;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		.beta-btn.primary {
			background: #3498db;
			border-radius: 6px;
			color: #fff;
			border: none;
			padding: 8px 15px;
			transition: background 0.3s;
		}
		.beta-btn.primary:hover {
			background: #2980b9;
			color: #fff;
		}
		.add-to-cart {
			background: #f1f2f6;
			color: #3498db;
			width: 38px;
			height: 38px;
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			transition: all 0.3s;
		}
		.add-to-cart:hover {
			background: #3498db;
			color: #fff;
		}
		.header-bottom {
			background: linear-gradient(135deg, #0277b8 0%, #005f93 100%) !important;
			box-shadow: 0 2px 10px rgba(0,0,0,0.1);
		}
		.main-menu ul li a {
			font-weight: 500;
			letter-spacing: 0.5px;
		}
		h4 {
			font-weight: 700;
			color: #2c3e50;
			position: relative;
			padding-bottom: 10px;
			margin-bottom: 20px;
		}
		h4::after {
			content: '';
			position: absolute;
			bottom: 0;
			left: 0;
			width: 50px;
			height: 3px;
			background: #e74c3c;
			border-radius: 2px;
		}
	</style>
</head>
<body>

	@include('header')

	<div class="rev-slider">
        @yield('content_header')
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
                @yield('content')
			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

	@include('footer')

	<!-- include js files -->
	<script src="{{ asset('assets/dest/js/jquery.js') }}"></script>
	<script src="{{ asset('assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js') }}"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="{{ asset('assets/dest/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
	<script src="{{ asset('assets/dest/vendors/colorbox/jquery.colorbox-min.js') }}"></script>
	<script src="{{ asset('assets/dest/vendors/animo/Animo.js') }}"></script>
	<script src="{{ asset('assets/dest/vendors/dug/dug.js') }}"></script>
	<script src="{{ asset('assets/dest/js/scripts.min.js') }}"></script>
	<script src="{{ asset('assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
	<script src="{{ asset('assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
	<script src="{{ asset('assets/dest/js/waypoints.min.js') }}"></script>
	<script src="{{ asset('assets/dest/js/wow.min.js') }}"></script>
	<!--customjs-->
	<script src="{{ asset('assets/dest/js/custom2.js') }}"></script>
	<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>
    @yield('script')
</body>
</html>
