@extends('layouts.app')
@section('content')
    <header class="home-header container">
        <div class="home-header__content">
            <h1 class="heading-1">
                Paradisul verde
            </h1>
            <h3 class="heading-3">
                Pescuit sportiv
            </h3>
            <a href="#" class="button">
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
                    Inainte de instalarea pe locul de pescuit, <span>PESCARUL</span>, va consulta prezentul regulament
                    si va achita taxa corespunzatoare pentru pescuit. Achitarea taxei reprezinta <span>ACORDUL</span>
                    pescarului fata de prezentul regulament!
                </div>
                <div class="body-copy home-details__rules-item">
                    Inainte de instalarea pe locul de pescuit, <span>PESCARUL</span>, va consulta prezentul regulament
                    si va achita taxa corespunzatoare pentru pescuit. Achitarea taxei reprezinta <span>ACORDUL</span>
                    pescarului fata de prezentul regulament!
                </div>
                <div class="body-copy home-details__rules-item">
                    Inainte de instalarea pe locul de pescuit, <span>PESCARUL</span>, va consulta prezentul regulament
                    si va achita taxa corespunzatoare pentru pescuit. Achitarea taxei reprezinta <span>ACORDUL</span>
                    pescarului fata de prezentul regulament!
                </div>
                <div class="body-copy home-details__rules-item">
                    Inainte de instalarea pe locul de pescuit, <span>PESCARUL</span>, va consulta prezentul regulament
                    si va achita taxa corespunzatoare pentru pescuit. Achitarea taxei reprezinta <span>ACORDUL</span>
                    pescarului fata de prezentul regulament!
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
    <div class="home-book container">
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
        <div class="home-book__container" if="#rezerva-loc">
            <h3 class="heading-3">
                Alege un loc
            </h3>
            <div class="home-book__map" id="map"></div>
            <h4 class="heading-4 mt-40">
                Loc ales: <span class="ml-16 text-secondary">Casuta 4</span>
            </h4>
            <h4 class="heading-4 mt-24">
                Alegeti o zi
            </h4>
            <h4 class="heading-4 mt-24">
                Tipul rezervarii
            </h4>
            <!-- <div class="home-book__type-input">
                <div class="radio-input mt-16">
                    <input class="radio-input__input" type="radio" id="12h" name="booking-type" value="12h" checked="checked">
                    <label class="radio-input__label" for="12h">
                        <div class="radio-input__label-circle"></div>
                        <span class="body-copy">12 H</span>
                    </label>
                </div>
                <div class="radio-input mt-16">
                    <input class="radio-input__input" type="radio" id="24h" name="booking-type" value="24h">
                    <label class="radio-input__label" for="24h">
                        <div class="radio-input__label-circle"></div>
                        <span class="body-copy">24 H</span>
                    </label>
                </div>
                <div class="radio-input mt-16">
                    <input class="radio-input__input" type="radio" id="48h" name="booking-type" value="48h">
                    <label class="radio-input__label" for="48h">
                        <div class="radio-input__label-circle"></div>
                        <span class="body-copy">48 H</span>
                    </label>
                </div>
            </div> -->
            <form action="<?php echo route('checkBooking') ?>" method="get" class="mt-24 ">
                <div class="input-group">
                    <label for="name" class="input-group__label">
                        Nume complet
                    </label>
                    <input type="text" name="name" id="name" class="input-group__input">
                    <!-- <div class="input-group__error mt-8">
                        test
                    </div> -->
                </div>

                <div class="input-group mt-16">
                    <label for="phone_number" class="input-group__label">
                        Numar de telefon
                    </label>
                    <input type="text" name="phone_number" id="phone_number" class="input-group__input">
                    <!-- <div class="input-group__error mt-8">
                        test
                    </div> -->
                </div>

                <div class="input-group mt-16">
                    <label for="stand" class="input-group__label">
                        Loc ales
                    </label>
                    <input type="text" name="stand" id="stand" class="input-group__input">
                </div>
                <div class="input-group mt-16">
                    <label for="count_fishers" class="input-group__label">
                        Pescari
                    </label>
                    <input  type="number" name="count_fishers" id="count_fishers"
                           class="align-items-baseline" max="16" min="1">
                </div>
                <div class="input-group mt-16">
                    <label for="from_date" class="input-group__label">
                        From date
                    </label>
                    <input type="text" name="from_date" id="from_date" class="input-group__input">
                </div>
                <div class="input-group mt-16">
                    <label for="to_date" class="input-group__label">
                        To date
                    </label>
                    <input type="text" name="to_date" id="to_date" class="input-group__input">
                </div>

                <button type="submit" class="button mt-24">
                    Rezerva loc
                </button>
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
                Paradisul verde a pornit Paradisul verde a pornit din dorintaParadisul verde a pornit din dorinta de a
                prinde
                <br>
                <br>
                pesterinde pesterinta de a prinde peste Paradisul verde a pornParadisul verde a pornit din dorinta de a
                prinde peste Paradisul verde a pornit din dorinta de a prinde peste Paradisul verde a pornit din dorinta
                de a prinde peste
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
@endsection
