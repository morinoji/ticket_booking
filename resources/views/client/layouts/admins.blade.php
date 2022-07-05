<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
@yield('title')
    <!-- Icon title -->
    <link rel=" shortcut icon" type="image/x-icon" href="{{asset('RouteBus/assets/images/Logo.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- fontAwesome Css -->
    <link rel="stylesheet" href="{{asset('RouteBus/assets/css/fontawesome.css')}}" />
    <!-- Swiper Css -->
    <link rel="stylesheet" href="{{asset('RouteBus/assets/css/swiper-bundle.min.css')}}">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" type="text/css" href="{{asset('RouteBus/assets/css/bootstrap.min.css')}}">

    <!-- Style Css -->
    <link rel="stylesheet" href="{{asset('RouteBus/assets/css/style.css')}}">
    @yield('css')
    <!-- Responsive Css -->
    <!-- <link rel="stylesheet" href="./assets/css/responsive.css"> -->
</head>

<body>

<!-- Begin Header -->
@include('client.components.header')
<!-- End Header -->

<!-- Begin Banner -->
@yield('content')
<!-- End Brand -->

<!-- Begin Footer -->
@include('client.components.footer')
<!-- End Footer -->

<!-- Begin Offcanvas Mobile -->
<div class="offcanvas offcanvas-end header-offCanvas" tabindex="-1" id="offcanvasMenu"
     aria-labelledby="offcanvasMenuLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasMenuLabel"></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <nav class="nav header-offCanvas__list flex-column">
            <a class="nav-link active" aria-current="page" href="#">
                Tuyến đường
            </a>
            <a class="nav-link" href="#">
                Hãng xe
            </a>
            <a class="nav-link" href="#">
                Thuê xe hợp đồng
            </a>
        </nav>
    </div>
</div>
<!--  End Offcanvas Mobile -->

<!-- Jquery JS -->
<script type="text/javascript" src="{{asset('RouteBus/assets/js/jquery.min.js')}}"></script>
<!-- Script Bootstrap -->
<script type="text/javascript" src="{{asset('RouteBus/assets/js/bootstrap.bundle.min.js')}}"></script>
<!-- Swiper JS -->
<script type="text/javascript" src="{{asset('RouteBus/assets/js/swiper-bundle.min.js')}}"></script>
@yield('js')
<script>
    // ==================== Slide Banner Image ================
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 10,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        // Navigation arrows
        navigation: {
            nextEl: '.banner-slide>.swiper-button-next',
            prevEl: '.banner-slide>.swiper-button-prev',
        },
        direction: 'horizontal',
        autoplay: {
            delay: 5000,
        },
    });

    // Slide Route Popular
    var swiper = new Swiper(".popularSwiper", {
        spaceBetween: 10,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        // Navigation arrows
        navigation: {
            nextEl: '.popular-slide>.swiper-button-next',
            prevEl: '.popular-slide>.swiper-button-prev',
        },
        direction: 'horizontal',
        // autoplay: {
        //     delay: 5000,
        // },
    });

    // Slide Route Popular Mobile
    var swiper = new Swiper(".popularMbSwiper", {
        spaceBetween: 16,
        // loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        // Navigation arrows
        navigation: false,
        direction: 'horizontal',
        breakpoints: {
            425: {
                slidesPerView: 1.5,
            },
            450: {
                slidesPerView: 3,
            },
        }
        // autoplay: {
        //     delay: 5000,
        // },
    });

    // Slide Brand Taxi
    var swiper = new Swiper(".brandSwiper", {
        slidesPerView: 1,
        spaceBetween: 22,
        // loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        // Navigation arrows
        navigation: {
            nextEl: '.brand-slide>.swiper-button-next',
            prevEl: '.brand-slide>.swiper-button-prev',
        },
        direction: 'horizontal',
        autoplay: {
            delay: 7000,
        },
        breakpoints: {
            1440: {
                slidesPerView: 4,
            },

            1280: {
                slidesPerView: 3,
            },

            425: {
                slidesPerView: 1.5,
            },
        }
    });



    function searchRoute(searchParams) {
        if (!searchParams) {
            searchParams = new URLSearchParams(window.location.search)
        }
        searchParams.set('query-route', $('#searchRoute').val())
        window.location.href=window.location.origin+"/?"+searchParams.toString();
    }

    function searchComp(searchParams) {
        if (!searchParams) {
            searchParams = new URLSearchParams(window.location.search)
        }
        searchParams.set('query-comp', $('#searchComp').val())
        window.location.href=window.location.origin+"/?"+searchParams.toString();
    }
</script>
</body>

</html>
