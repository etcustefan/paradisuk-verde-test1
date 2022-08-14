<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    {{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

    {{--    <!-- CSRF Token -->--}}
    {{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

    {{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

    {{--    <!-- Scripts -->--}}
    {{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

    {{--    <!-- Fonts -->--}}
    {{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
    {{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./assets/fonts/Poppins/index.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Paradisul verde</title>
</head>
<body>
<div id="app">
    <nav class="navbar">
        <div class="navbar__mask"></div>
        <div class="container">
            <div class="navbar__logo">
                <a href="<?php echo route('/') ?>"><img src="./assets/images/logo.svg" alt="Paradisul verde" class="u-image-contain"></a>
            </div>
            <div class="navbar__menu-items">
                <a href="/" class="heading-4 navbar__menu-item">
                    Regulament
                </a>
                <a href="/" class="heading-4 navbar__menu-item">
                    Despre noi
                </a>
                <a href="/" class="heading-4 navbar__menu-item">
                    Contactează-ne
                </a>
                <a href="#" class="navbar__menu-fb">
                    <img src="./assets/icons/facebook.svg" alt="Facebook" class="u-image-contain">
                </a>
                <a href="#" class="button">
                    Rezerva loc
                </a>
            </div>
            <div class="navbar__menu-toggle">
                <span class="navbar__menu-icon"></span>
            </div>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
<script>
    //rules section
    const rulesToggle = document.querySelector(".home-details__rules-header");
    const rulesBody = document.querySelector(".home-details__rules-body");

    rulesToggle.addEventListener('click', () => {
        rulesBody.classList.contains('display-none') ? openRules() : closeRules();
    });

    function closeRules() {
        rulesBody.classList.add('display-none');
        rulesToggle.classList.remove('home-details__rules-header--active');
    }

    function openRules() {
        rulesBody.classList.remove('display-none');
        rulesToggle.classList.add('home-details__rules-header--active');
    }

    //navbar on mobile
    const navbarToggle = document.querySelector(".navbar__menu-toggle");
    const navbarMenu = document.querySelector(".navbar__menu-items");

    navbarToggle.addEventListener('click', () => {
        navbarToggle.classList.contains('navbar__menu-toggle--active') ? closeNavbar() : openNavbar();
    });

    function closeNavbar() {
        navbarToggle.classList.remove('navbar__menu-toggle--active');
        navbarMenu.classList.remove('navbar__menu-items--active');
    }

    function openNavbar() {
        navbarToggle.classList.add('navbar__menu-toggle--active');
        navbarMenu.classList.add('navbar__menu-items--active');
    }

    window.addEventListener('scroll', () => closeNavbar());
</script>
</html>

