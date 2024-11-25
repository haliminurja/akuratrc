<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Akurat Center</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('landing/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/main.css') }}">
    @yield('css')
</head>

<body>

    <button class="scroll__top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    @include('landing.layouts.header')
    <main class="fix">
        @yield('content')
    </main>
    @include('landing.layouts.footer')

    <script src="{{ asset('landing/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('landing/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.odometer.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('landing/js/gsap.js') }}"></script>
    <script src="{{ asset('landing/js/ScrollTrigger.js') }}"></script>
    <script src="{{ asset('landing/js/SplitText.js') }}"></script>
    <script src="{{ asset('landing/js/gsap-animation.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.parallaxScroll.min.js') }}"></script>
    <script src="{{ asset('landing/js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('landing/js/ajax-form.js') }}"></script>
    <script src="{{ asset('landing/js/wow.min.js') }}"></script>
    <script src="{{ asset('landing/js/aos.j') }}s"></script>
    <script src="{{ asset('landing/js/main.js') }}"></script>
    <script>
        function rangeSlide(value) {
            document.getElementById('rangeValue').innerHTML = value;
        }
    </script>
    @yield('javascript')
</body>

</html>
