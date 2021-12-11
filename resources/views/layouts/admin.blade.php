<!doctype html>
<html class="fixed sidebar-left-collapsed">

<head>

	<!-- Basic -->
	<meta charset="UTF-8">

	<title>@yield('title')</title>
	<meta name="keywords" content="" />
	<meta name="description" content="Painel Administrativo">
	<meta name="author" content="no author">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
		rel="stylesheet" type="text/css">

	<!-- plugins CSS -->
	<link rel="stylesheet" href="{{  asset('cms/plugins/bootstrap/css/bootstrap.css') }}" />
	<link rel="stylesheet" href="{{  asset('cms/plugins/animate/animate.css') }}" />

	<link rel="stylesheet" href="{{  asset('cms/plugins/font-awesome/css/all.min.css') }}" />
	<link rel="stylesheet" href="{{  asset('cms/plugins/magnific-popup/magnific-popup.css') }}" />
	<link rel="stylesheet" href="{{  asset('cms/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css') }}" />
	<link rel="stylesheet" href="{{  asset('cms/plugins/select2/css/select2.css') }}" />
	<link rel="stylesheet" href="{{  asset('cms/plugins/select2-bootstrap-theme/select2-bootstrap.min.css') }}" />

	<!-- Specific Page plugins CSS -->
	<link rel="stylesheet" href="{{  asset('cms/plugins/owl.carousel/assets/owl.carousel.css') }}" />
	<link rel="stylesheet" href="{{  asset('cms/plugins/owl.carousel/assets/owl.theme.default.css') }}" />

	<link rel="stylesheet" href="{{  asset('cms/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />
	<link rel="stylesheet" href="{{  asset('cms/plugins/summernote/summernote-bs4.css') }}" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="{{  asset('cms/css/theme.css') }}" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="{{  asset('cms/css/custom.css') }}" />

	<!-- Specific Page Vendor CSS -->
	<link rel="stylesheet" href="{{  asset('cms/plugins/pnotify/pnotify.custom.css') }}" />

	<!-- Head Libs -->
	<script src="{{ asset('cms/plugins/modernizr/modernizr.js') }}"></script>

</head>

<body>
	<section class="body">

		<!-- start: header -->
		<header class="header">
			<div class="logo-container">
				<a href="javascript:;" class="logo">
					<img src="{{ asset('img/logo.png') }}"  alt="Painel Administrativo" />
				</a>
				<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
					data-fire-event="sidebar-left-opened">
					<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
				</div>
			</div>

			<!-- start: search & user box -->
			<div class="header-right">
				<div id="userbox" class="userbox">
					<a href="index.html#" data-toggle="dropdown">
						<figure class="profile-picture">
							<img src="{{ asset('cms/img/user.png') }}" alt="Joseph Doe" class="rounded-circle"
								data-lock-picture="{{ asset('cms/img/user.png') }}" />
						</figure>
						<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
							<span class="name">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</span>
						</div>
						<i class="fa custom-caret"></i>
					</a>

					<div class="dropdown-menu">
						<ul class="list-unstyled mb-2">
							<li class="divider"></li>
							<li>
								<a role="menuitem" tabindex="-1" href="{{ route('logout') }}" onclick="event.preventDefault();
								document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i> Logout</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST"
									style="display: none;">
									@csrf
								</form>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- end: search & user box -->
		</header>
		<!-- end: header -->

		<div class="inner-wrapper">
			<!-- start: sidebar -->
			<aside id="sidebar-left" class="sidebar-left">

				@include('admin.blocks.menu')

			</aside>
			<!-- end: sidebar -->

			<section role="main" class="content-body card-margin">
				@yield('content')

				<!-- end: page -->
			</section>
		</div>


	</section>

	<!-- plugins -->
	<script src="{{ asset('cms/plugins/jquery/jquery.js') }}"></script>
	<script src="{{ asset('cms/plugins/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
	<script src="{{ asset('cms/plugins/jquery-cookie/jquery.cookie.js') }}"></script>
	<script src="{{ asset('cms/plugins/popper/umd/popper.min.js') }}"></script>
	<script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.js') }}"></script>
	<script src="{{ asset('cms/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('cms/plugins/common/common.js') }}"></script>
	<script src="{{ asset('cms/plugins/nanoscroller/nanoscroller.js') }}"></script>
	<script src="{{ asset('cms/plugins/magnific-popup/jquery.magnific-popup.js') }}"></script>
	<script src="{{ asset('cms/plugins/jquery-placeholder/jquery.placeholder.js') }}"></script>
	<script src="{{ asset('cms/plugins/pnotify/pnotify.custom.js') }}"></script>
	<script src="{{ asset('cms/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('cms/plugins/datatables/media/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('cms/plugins/select2/js/select2.js') }}"></script>

	<!-- Specific Page plugins -->
	<script src="{{ asset('cms/plugins/jquery-appear/jquery.appear.js') }}"></script>
	<script src="{{ asset('cms/plugins/owl.carousel/owl.carousel.js') }}"></script>
	<script src="{{ asset('cms/plugins/isotope/isotope.js') }}"></script>
	<script src="{{ asset('cms/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js') }}"></script>
	<script src="{{ asset('cms/plugins/summernote/summernote-bs4.js') }}"></script>
	<script src="{{ asset('cms/js/mustache.js') }}"></script>
	<script src="{{ asset('cms/js/jquery.mask.min.js') }}"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="{{ asset('cms/js/theme.js') }}"></script>
	<script src="{{ asset('cms/js/gallery.js') }}"></script>

	<!-- Theme Custom -->
	<script src="{{ asset('cms/js/custom.js') }}"></script>

	<!-- Analytics to Track Preview Website -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');		  ga('create', 'UA-42715764-8', 'auto');		  ga('send', 'pageview');		
	</script>
	<!-- Scripts -->

	<script src="{{ asset('cms/js/imagesFunctions.js') }}"></script>
	<script src="{{ asset('cms/js/scripts.js') }}"></script>
</body>

</html>