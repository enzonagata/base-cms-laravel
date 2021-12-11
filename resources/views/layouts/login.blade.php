<!doctype html>
<html class="fixed">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{  asset('cms/plugins/bootstrap/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{  asset('cms/plugins/animate/animate.css')}}" />

    <link rel="stylesheet" href="{{  asset('cms/plugins/font-awesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{  asset('cms/plugins/magnific-popup/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{  asset('cms/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{  asset('cms/css/theme.css')}}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{  asset('cms/css/custom.css')}}">

    <!-- Head Libs -->
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="master/style-switcher/style.switcher.localstorage.js"></script>

</head>

<body>
    <!-- start: page -->
    @yield('content')
    <!-- end: page -->

    <!-- Vendor -->
    <script src="{{ asset('cms/plugins/jquery/jquery.js')}}"></script>
    <script src="{{ asset('cms/plugins/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
    <script src="{{ asset('cms/plugins/jquery-cookie/jquery.cookie.js')}}"></script>
    <script src="{{ asset('cms/plugins/popper/umd/popper.min.js')}}"></script>
    <script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{ asset('cms/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{ asset('cms/plugins/common/common.js')}}"></script>
    <script src="{{ asset('cms/plugins/nanoscroller/nanoscroller.js')}}"></script>
    <script src="{{ asset('cms/plugins/magnific-popup/jquery.magnific-popup.js')}}"></script>
    <script src="{{ asset('cms/plugins/jquery-placeholder/jquery.placeholder.js')}}"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('cms/js/theme.js')}}"></script>

    <!-- Theme Custom -->
    <script src="{{ asset('cms/js/custom.js')}}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ asset('cms/js/theme.init.js')}}"></script>
    <!-- Analytics to Track Preview Website -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');		  ga('create', 'UA-42715764-8', 'auto');		  ga('send', 'pageview');		
    </script>
</body>

</html>