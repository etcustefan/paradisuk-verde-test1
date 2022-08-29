<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./assets/fonts/Poppins/index.css" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Paradisul verde</title>
    <script src="https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.0/dist/index.umd.min.js"></script>
    <script type="module" src="./js/form.js"></script>
</head>

<body>
<nav class="navbar">
    <div class="navbar__mask"></div>
    <div class="container">
        <div class="navbar__logo">
            <img src="./assets/images/logo.svg" alt="Paradisul verde" class="u-image-contain">
        </div>
        <div class="navbar__menu-items">
            <a href="/" class="heading-4 navbar__menu-item">
                Regulament
            </a>
            <a href="/" class="heading-4 navbar__menu-item">
                Pret
            </a>
            <a href="/" class="heading-4 navbar__menu-item">
                Despre noi
            </a>
            <a href="/" class="heading-4 navbar__menu-item">
                Contactează-ne
            </a>
            <a href="/" class="navbar__menu-fb">
                <img src="./assets/icons/facebook.svg" alt="Facebook" class="u-image-contain">
            </a>
        </div>
        <div class="navbar__menu-toggle">
            <span class="navbar__menu-icon"></span>
        </div>
    </div>
</nav>
<header class="home-header container">
    <div class="home-header__content">
        <h1 class="heading-1">
            Paradisul verde
        </h1>
        <h3 class="heading-3">
            Pescuit sportiv
        </h3>
        <a href="#rezerva_loc" class="button">
            Rezerva loc
        </a>
    </div>
    <div class="home-header__image">
        <img src="./assets/images/banner.jpg" alt="Iaz Paradisul Verde" class="u-image-cover">
    </div>
</header>
<div class="home-details container">
    <div class="home-details__rules">
        <div class="home-details__rules-header">
            <h4 class="heading-4">
                Vezi regulament
            </h4>
            <div class="home-details__rules-arrow">
                <img src="./assets/icons/chevron.svg" class="u-image-contain">
            </div>
        </div>
        <div class="home-details__rules-body display-none">
            <div class="body-copy home-details__rules-item">
                Inainte de instalarea pe locul de pescuit, <span>PESCARUL</span>, va consulta prezentul regulament si va achita taxa corespunzatoare pentru pescuit. Achitarea taxei reprezinta <span>ACORDUL</span> pescarului fata de prezentul regulament!
            </div>
            <div class="body-copy home-details__rules-item">
                Inainte de instalarea pe locul de pescuit, <span>PESCARUL</span>, va consulta prezentul regulament si va achita taxa corespunzatoare pentru pescuit. Achitarea taxei reprezinta <span>ACORDUL</span> pescarului fata de prezentul regulament!
            </div>
            <div class="body-copy home-details__rules-item">
                Inainte de instalarea pe locul de pescuit, <span>PESCARUL</span>, va consulta prezentul regulament si va achita taxa corespunzatoare pentru pescuit. Achitarea taxei reprezinta <span>ACORDUL</span> pescarului fata de prezentul regulament!
            </div>
            <div class="body-copy home-details__rules-item">
                Inainte de instalarea pe locul de pescuit, <span>PESCARUL</span>, va consulta prezentul regulament si va achita taxa corespunzatoare pentru pescuit. Achitarea taxei reprezinta <span>ACORDUL</span> pescarului fata de prezentul regulament!
            </div>
        </div>
    </div>
    <div class="home-details__prices">
        <h2 class="heading-2">
            Preturi:
        </h2>
        <div class="home-details__prices-container">
            <div class="heading-4 home-details__prices-row">
                <span>50 Ron</span> (C & R, cu eliberare) 12H
            </div>
            <div class="heading-4 home-details__prices-row">
                <span>100 Ron</span> (C & R, cu eliberare) 12H
            </div>
            <div class="heading-4 home-details__prices-row">
                <span>50 Ron</span> (C & R, cu eliberare) 12H
            </div>
            <div class="heading-4 home-details__prices-row">
                <span>50 Ron</span> (C & R, cu eliberare) 12H
            </div>
        </div>
    </div>
</div>
<div class="home-book container " id="rezerva_loc">
    @if (Session::has('type_error'))
        <div class="alert alert-success text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <p>{{ Session::get('type_error') }}</p>
        </div>
    @endif
        @if (Session::has('success'))
        <div class="alert alert-success text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif
    <h2 class="heading-2">
        Rezerva un loc la pescuit
    </h2>
    <div class="home-book__contact">
        <h4 class="heading-4">
            Daca intampinati dificultati puteti apela la:
        </h4>
        <a href="tel:+40789789789" class="heading-4 home-book__contact-info">
            <div class="home-book__contact-icon">
                <img src="./assets/icons/phone.svg" alt="Phone" class="u-image-contain">
            </div>
            <span>
                    Stefan:
                </span>
            <div class="link">
                +40798 895 985
            </div>
        </a>
        <a href="tel:+40789789789" class="heading-4 home-book__contact-info">
            <div class="home-book__contact-icon">
                <img src="./assets/icons/phone.svg" alt="Phone" class="u-image-contain">
            </div>
            <span>
                    Yousef:
                </span>
            <div class="link">
                +40798 895 985
            </div>
        </a>
    </div>
    <div class="home-book__container">
        <h3 class="heading-3">
            Alege un loc
        </h3>
        <div class="home-book__map mt-16" id="map"></div>
        <h4 class="heading-4 mt-40">
            Locuri alese:
        </h4>
        <div class="home-book__delete-spots small-copy mt-16 text-danger display-none">
                <span>
                    Stergeți locuri
                </span>
            <span>
                    Anulați
                </span>
        </div>
        <div class="home-book__spots mt-16">
        </div>
        <h4 class="heading-4 mt-24">
            Tipul rezervarii
        </h4>
        <div class="home-book__type-togggle mt-8">
            <div class="body-copy active-type-toggle" id="home-book-day">
                12H
            </div>
            <div class="body-copy" id="home-book-days">
                24H +
            </div>
        </div>
        <form action="<?= route('confirm'); ?>" method="get" class="mt-24">
            @csrf
            <input type="text" name="stand" value="Casuta1,Casuta2,Casuta5,Casuta7">
{{--            <input type="text" class="display-none" id="spots" name="spots" required>--}}
            <div class="input-group">
                <label for="from_date" class="input-group__label">
                    Data rezervarii
                </label>
                <input type="date" name="from_date" id="from_date" class="input-group__input" min="2022-08-16" required>
            </div>
            <div class="input-group mt-16 display-none" id="home-book-end-date">
                <label for="to_date" class="input-group__label">
                    Ultima zi
                </label>
                <input type="date" name="to_date" id="to_date" class="input-group__input" min="2022-08-17">
            </div>
            <div class="input-group display-none mt-16" id="home-book-fishermen">
                <label for="count_fishers" class="input-group__label">
                    Numar de pescari
                </label>
                <input type="number" name="count_fishers" id="fishermen" class="input-group__input" min="1" step="1">
            </div>
            <div class="input-group mt-16">
                <label for="name" class="input-group__label">
                    Nume complet
                </label>
                <input type="text" name="name" id="name" class="input-group__input" required>
            </div>
            <div class="input-group mt-16">
                <label for="phone_number" class="input-group__label">
                    Numar de telefon
                </label>
                <input type="text" name="phone_number" id="phone" class="input-group__input" required>
            </div>
            <div class="input-group mt-16">
                <button type="submit" class="button mt-24">
                    Rezerva loc
                </button>
            </div>
        </form>
    </div>
</div>
<div class="home-about container">
    <div class="home-about__content">
        <h2 class="heading-2 mb-24">
            Despre noi
        </h2>
        <p class="body-copy">
            Paradisul verde a pornit din dorinta de a prinde peste
            Paradisul verde a pornit Paradisul verde a pornit din dorintaParadisul verde a pornit din dorinta de a prinde
            <br>
            <br>
            pesterinde pesterinta de a prinde peste Paradisul verde a pornParadisul verde a pornit din dorinta de a prinde peste Paradisul verde a pornit din dorinta de a prinde peste Paradisul verde a pornit din dorinta de a prinde peste
        </p>
    </div>
    <div class="home-about__images-container">
        <div class="home-about__fish">
            <img src="./assets/images/fish.svg" class="u-image-contain">
        </div>
        <div class="home-about__carousel">
            <div class="home-about__slide">
                <img src="./assets/images/etcu.jpg" alt="Pescar cu peste" class="u-image-cover">
            </div>
        </div>
    </div>
</div>
<div class="home-contact container">
    <h2 class="heading-2 mb-32">
        Contactează-ne
    </h2>
    <div class="home-contact__map">
        <img src="./assets/images/map.jpg" alt="Harta" class="u-image-cover">
    </div>
    <div class="home-contact__details">
        <div class="home-contact__details-row mb-24">
            <div class="home-contact__details-icon">
                <img src="./assets/icons/pin.svg" class="u-image-contain">
            </div>
            <div class="home-contact__detaills-content">
                <div class="body-copy">
                    Sat Iepureni com. Movileni jud. Iasi,
                    <br>
                    Balta Paradisul Verde Epureni Isvoare
                </div>
                <a href="#" class="button mt-16">
                    Deschide pe waze
                </a>
            </div>
        </div>
        <div class="home-contact__details-row mb-16">
            <div class="home-book__contact-icon">
                <img src="./assets/icons/phone.svg" alt="Phone" class="u-image-contain">
            </div>
            <span class="body-copy">
                    Stefan:
                </span>
            <div class="link">
                +40798 895 985
            </div>
        </div>
        <div class="home-contact__details-row mb-24">
            <div class="home-book__contact-icon">
                <img src="./assets/icons/phone.svg" alt="Phone" class="u-image-contain">
            </div>
            <span class="body-copy">
                    Yousef:
                </span>
            <div class="link">
                +40798 895 985
            </div>
        </div>
        <a href="#" class="home-contact__details-row">
            <div class="home-contact__details-icon">
                <img src="./assets/icons/facebook.svg" class="u-image-contain">
            </div>
            <div class="home-contact__detaills-content">
                <div class="body-copy">
                    Facebook: Paradisul verde
                </div>
            </div>
        </a>
    </div>
</div>
<footer class="footer">

</footer>
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
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly"
    defer
></script>
</body>

</html>
