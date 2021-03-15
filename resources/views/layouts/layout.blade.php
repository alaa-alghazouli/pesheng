<!DOCTYPE HTML>
<html>
	<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pesheng</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

    <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="/favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="/css/bootstrap.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/css/owl.theme.default.min.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="/css/magnific-popup.css">

	<link rel="stylesheet" href="/css/style.css">

	<!-- Modernizr JS -->
	<script src="/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

    <!-- Galery Page -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="/gallery-clean.css">

    <!-- Gallery -->
    <link rel='stylesheet' href='https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css'>

	</head>
	<body>

    <nav id="colorlib-main-nav" role="navigation">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle active"><i></i></a>
		<div class="js-fullheight colorlib-table">
			<div class="colorlib-table-cell js-fullheight">
				<div class="row">
					<div class="col-md-12">
						<ul>
							<li class="{{ Request::segment(1) === 'home' ? 'active' : null }}"><a href="\">Home</a></li>
							<li class="{{ Request::segment(1) === 'works' ? 'active' : null }}"><a href="\works">Work</a></li>
							<li class="{{ Request::segment(1) === 'albums' ? 'active' : null }}"><a href="\albums">Photos</a></li>
							<li class="{{ Request::segment(1) === 'services' ? 'active' : null }}"><a href="\services">Services</a></li>
							<li class="{{ Request::segment(1) === 'about' ? 'active' : null }}"><a href="\about">About</a></li>
							<li class="{{ Request::segment(1) === 'contact' ? 'active' : null }}"><a href="\contact">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
                        <h2 class="head-title">Last Work</h2>
                        {{--@php $works = DB::table('works')->latest('updated_at')->take(4)->get() @endphp
                        @foreach ($works as $works)
                        <a href="{{url('storage/'.$works->img)}}" class="gallery image-popup-link text-center" style="background-image: url({{url('storage/'.$works->img)}});">
							<span><i class="icon-search3"></i></span>
						</a>
                        @endforeach
						--}}
					</div>
				</div>
			</div>
		</div>
	</nav>

	<div id="colorlib-page">
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="colorlib-navbar-brand">
							<a class="colorlib-logo" href="home">@auth Admin Panel @endauth @guest Pesheng @endguest </a>
						</div>
						<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
					</div>
				</div>
			</div>
        </header>

	        @yield ('contents')
	</div>

	<!-- jQuery -->
	<script src="/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="/js/jquery.waypoints.min.js"></script>
	<!-- Owl Carousel -->
	<script src="/js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="/js/jquery.magnific-popup.min.js"></script>
	<script src="/js/magnific-popup-options.js"></script>

	<!-- Main JS (Do not remove) -->
	<script src="/js/main.js"></script>

    <!-- gallery Page  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script> baguetteBox.run('.tz-gallery'); </script>

    <!-- gallery -->
    <script src='https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js'></script>
    <script src='https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js'></script>
    <script src='https://cdn.rawgit.com/sachinchoolur/lg-autoplay.js/master/dist/lg-autoplay.js'></script>
    <script src='https://cdn.rawgit.com/sachinchoolur/lg-share.js/master/dist/lg-share.js'></script>
    <script src='https://cdn.rawgit.com/sachinchoolur/lg-fullscreen.js/master/dist/lg-fullscreen.js'></script>
    <script src='https://cdn.rawgit.com/sachinchoolur/lg-zoom.js/master/dist/lg-zoom.js'></script>
    <script src='https://cdn.rawgit.com/sachinchoolur/lg-hash.js/master/dist/lg-hash.js'></script>
    <script src='https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js'></script>
    <script  src="/js/script.js"></script>


	</body>
</html>

