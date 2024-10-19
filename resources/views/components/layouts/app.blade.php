<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ $title ?? 'Tech Tonic' }}</title>
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('home-page-assets/img/fav.webp')}}">
    <!-- Author Meta -->
    <meta name="author" content="Trch Tonic">
    <!-- Meta Description -->
    <meta name="description" content="E-commerce portal relating to mobile and mobile related accessories">
    <!-- Meta Keyword -->
    <meta name="keywords" content="ecommerce, mobile, shop, stripe, watch, earphone">
    <!--
		CSS
		============================================= -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->

    <link rel="stylesheet" href="{{asset('home-page-assets/css/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('home-page-assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('home-page-assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('home-page-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('home-page-assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('home-page-assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('home-page-assets/css/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{asset('home-page-assets/css/ion.rangeSlider.css')}}" />
    <link rel="stylesheet" href="{{asset('home-page-assets/css/ion.rangeSlider.skinFlat.css')}}" />
    <link rel="stylesheet" href="{{asset('home-page-assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('home-page-assets/css/main.css')}}">
    @vite('resources/css/app.css', 'resources/js/app.js')
    @livewireStyles
    <style>
        .banner-area {
            background-image: url({{ asset('home-page-assets/img/banner/banner-bg1.svg')}});
        background-position: center;
        background-repeat: no-repeat;

        background-size: cover;
        position: relative;
        }

        @media (max-width: 768px) {
            .banner-area .fullscreen {
                height: 650px !important;
            }
        }

        .banner-area .active-banner-slider .owl-nav {
            position: absolute;
            right: 0;
            bottom: -200px;
        }

        @media (max-width: 1920px) {
            .banner-area .active-banner-slider .owl-nav {
                right: -115px;
            }
        }

        @media (max-width: 1680px) {
            .banner-area .active-banner-slider .owl-nav {
                right: 0px;
            }
        }

        @media (max-width: 991px) {
            .banner-area .active-banner-slider .owl-nav {
                display: none;
            }
        }

        .banner-area .active-banner-slider .owl-nav .owl-prev,
        .banner-area .active-banner-slider .owl-nav .owl-next {
            display: inline-block;
            margin: 10px;
            opacity: .5;
            -webkit-transition: all 0.3s ease 0s;
            -moz-transition: all 0.3s ease 0s;
            -o-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }

        .banner-area .active-banner-slider .owl-nav .owl-prev:hover,
        .banner-area .active-banner-slider .owl-nav .owl-next:hover {
            opacity: 1;
        }

        .banner-area .banner-content {
            padding-left: 10px;
        }

        @media (max-width: 991px) {
            .banner-area .banner-content {
                padding-left: 0;
            }
        }

        .banner-area .banner-content h1 {
            font-size: 60px;
            line-height: 66px;
            font-weight: 700;
            margin-bottom: 30px;
        }

        @media (max-width: 767px) {
            .banner-area .banner-content h1 {
                font-size: 35px;
                line-height: 46px;
            }
        }

        .banner-area .banner-content p {
            margin: 0;
        }

        @media (max-width: 991px) {
            .banner-area .banner-img {
                display: none;
            }
        }




       
    </style>
</head>

<body class="bg-slate-200">
    @livewire('partials.navbar')
    <main>
        {{ $slot }}
    </main>
    @livewire('partials.footer')
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

    <script src="{{asset('home-page-assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="{{asset('home-page-assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('home-page-assets/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('home-page-assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('home-page-assets/js/jquery.sticky.js')}}"></script>
    <script src="{{asset('home-page-assets/js/nouislider.min.js')}}"></script>
    <script src="{{asset('home-page-assets/js/countdown.js')}}"></script>
    <script src="{{asset('home-page-assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('home-page-assets/js/owl.carousel.min.js')}}"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{asset('home-page-assets/js/gmaps.min.js')}}"></script>
    <script src="{{asset('home-page-assets/js/main.js')}}"></script>
    <script>
        /*=================================
    Javascript for banner area carousel
    ==================================*/
        $(".active-banner-slider").owlCarousel({
            items: 1,
            autoplay: false,
            autoplayTimeout: 5000,
            loop: true,
            nav: true,
            navText: ["<img src='{{asset('home-page-assets/img/banner/prev.png')}}'>", "<img src='{{asset('home-page-assets/img/banner/next.png')}}'>"],
            dots: false
        });
    </script>

    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
    <x-livewire-alert::scripts />

</body>

</html>