<base href="{{ url('/') }}">
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@stack('title') | {{ config('app.name') }}</title>

<!--  Essential META Tags -->
<meta content="author" name="{{ $meta_author ?? get_static_option('meta_author') }}">
<meta content="keywords" name="{{ $meta_keywords ?? get_static_option('meta_keywords') }}">
<meta property="og:title" content="{{ $meta_author ?? get_static_option('meta_author') }}">
<meta property="og:description" content="{{ $meta_description ?? get_static_option('meta_description') }}">
<meta property="og:image" content="{{ $meta_image ?? asset(get_static_option('meta_image')) }}">
<meta property="og:url" content="{{ $meta_url ?? url('/') }}">
<meta property="og:type" content="website"/>
<meta name="twitter:card" content="summary_large_image">

<!--  Non-Essential, But Recommended -->
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta name="twitter:image:alt" content="{{ config('app.name') }}">

<!--  Non-Essential, But Required for Analytics -->
<meta property="fb:app_id" content="your_app_id" />
<meta name="twitter:site" content="@website-username">

<!-- Favicons -->
<link href="{{ asset(get_static_option('fav_icon') ?? get_static_option('no_image')) }}" rel="icon">
<link href="{{ asset(get_static_option('fav_icon') ?? get_static_option('no_image')) }}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('assets/frontend/vendor/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/frontend/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/frontend/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ asset('assets/frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">

<!-- =======================================================
* Template Name: Arsha - v4.1.0
* Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
* Developed by: DATATECH BD LTD
======================================================== -->

<!--====== AJAX ======-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
