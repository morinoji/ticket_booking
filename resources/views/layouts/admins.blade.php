<!DOCTYPE html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Zeta admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Zeta admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('theme/assets/images/logo/favicon-icon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('theme/assets/images/logo/favicon-icon.png')}}" type="image/x-icon">

    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/assets/css/vendors/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/assets/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/assets/css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/assets/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/assets/css/vendors/feather-icon.css')}}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/assets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/assets/css/vendors/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/assets/css/vendors/owlcarousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/assets/css/vendors/rating.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('theme/assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/assets/css/responsive.css')}}">
    @yield('css')
</head>
<body>
<div class="loader-wrapper">
    <div class="loader">
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-ball"></div>
    </div>
</div>
<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    @include('partials.header')

    <div class="page-body-wrapper">
        @include('partials.sidebar')
        @yield('content')
        @include('partials.footer')
    </div>

</div>
<script src="{{asset('theme/assets/js/jquery-3.5.1.min.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('theme/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{asset('theme/assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('theme/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- scrollbar js-->
<script src="{{asset('theme/assets/js/scrollbar/simplebar.js')}}"></script>
<script src="{{asset('theme/assets/js/scrollbar/custom.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{asset('theme/assets/js/config.js')}}"></script>
<!-- Plugins JS start-->
<script src="{{asset('theme/assets/js/sidebar-menu.js')}}"></script>
<script src="{{asset('theme/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('theme/assets/js/rating/jquery.barrating.js')}}"></script>
<script src="{{asset('theme/assets/js/rating/rating-script.js')}}"></script>
<script src="{{asset('theme/assets/js/owlcarousel/owl.carousel.js')}}"></script>
<script src="{{asset('theme/assets/js/ecommerce.js')}}"></script>
<script src="{{asset('theme/assets/js/product-list-custom.js')}}"></script>
<!-- Plugins JS Ends-->
<script src="{{asset('theme/assets/js/form-validation-custom.js')}}"></script>
<!-- Theme js-->
<script src="{{asset('theme/assets/js/script.js')}}"></script>
<script src="{{asset('theme/assets/js/theme-customizer/customizer.js')}}"></script>

@yield('js')
</body>
</html>
