<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./assets/fonts/Poppins/index.css" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Paradisul verde</title>
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
<div class="confirm-page container">
    <h2 class="heading-2">
        Confirma datele rezervarii
    </h2>
    <div class="confirm-page__contact">
        <h4 class="heading-4">
            Daca intampinati dificultati puteti apela la:
        </h4>
        <a href="tel:+40789789789" class="heading-4 confirm-page__contact-info">
            <div class="confirm-page__contact-icon">
                <img src="./assets/icons/phone.svg" alt="Phone" class="u-image-contain">
            </div>
            <span>
                    Stefan:
                </span>
            <div class="link">
                +40798 895 985
            </div>
        </a>
        <a href="tel:+40789789789" class="heading-4 confirm-page__contact-info">
            <div class="confirm-page__contact-icon">
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
    <div class="confirm-page__container">
        <form action="<?= route('delete')?>">
            <input type="hidden" name="stand" value="<?= $stand?>">
            <input type="hidden" name="name" value="<?= $name ?>">
            <input type="hidden" name="from_date" value="<?= $from_date ?>">
            <input type="hidden" name="to_date" value="<?= $to_date ?>">
            <button type="submit" class="confirm-page__spot">Modifica datele introduse</button>
        </form>
        <h4 class="heading-4 mt-16">
            Locuri alese:
        </h4>
        <div class="confirm-page__spots mt-16">
            <div class="confirm-page__spot">
                <?= $stand ?>
            </div>
        </div>
        <div class="confirm-page__row mt-16">
            <h4 class="heading-4">
                Numarul de pescari
            </h4>
            <div class="body-copy text-secondary">
                <?= $count_fishers ?>
            </div>
        </div>
        <div class="confirm-page__row mt-16">
            <h4 class="heading-4">
                Data rezervarii
            </h4>
            <div class="body-copy text-secondary">
                <?= $from_date ?>
            </div>
        </div>
        <div class="confirm-page__row mt-16" id="end_date">
            <h4 class="heading-4">
                Data eliberarii
            </h4>
            <div class="body-copy text-secondary">
                <?=  $to_date?>
            </div>
        </div>
        <div class="confirm-page__row mt-16">
            <h4 class="heading-4">
                Nume
            </h4>
            <div class="body-copy text-secondary">
                Etcu Stefan
            </div>
        </div>
        <div class="confirm-page__row mt-16">
            <h4 class="heading-4">
                Numar de telefon
            </h4>
            <div class="body-copy text-secondary">
                0789908908
            </div>
        </div>
        <form action="<?php echo route('checkout') ?>" method="get">
            @csrf
            <input type="hidden" value="<?= $stand ?>" name="stand">
            <input type="hidden" value="<?= $name ?>" name="name">
            <input type="hidden" value="<?= $from_date ?>" name="from_date">
            <input type="hidden" value="<?= $to_date ?>" name="to_date">
            <input type="hidden" value="<?= $phone_number ?>" name="phone_number">
            <input type="hidden" value="<?= $price ?>" name="price">
            <button type="submit" class="button">Plateste <?= $price ?> Ron</button>
        </form>
    </div>
</div>
<footer class="footer">

</footer>
<script>
    let start_date = <?= $from_date ?>;
    let end_date = <?= $to_date ?>;

        if(start_date === end_date){
            document.getElementById('end_date').style.display = 'none';
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
</body>

</html>
