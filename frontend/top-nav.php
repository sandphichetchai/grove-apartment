<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/setting.css">
    <link rel="stylesheet" href="assets/css/top-nav.css">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- aos animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body style="background-color: var(--body-white) !important;">

    <header class="top-header">
        <div class="container-left">
            <div class="content-tell">
                <a href="tel:062-373-8955" target="_blank">
                    <div class="tell-icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <span>062-373-8955</span>
                </a>
            </div>
            <div class="content-address">
                <a href="https://maps.app.goo.gl/CD6y3pChrYcj1nNDA" target="_blank">
                    <div class="address-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <span>318/8 Wongsawang11, Wongsawang, Bangsue, Bangkok, Thailand</span>
                </a>
            </div>
        </div>
        <div class="container-right">
            <div class="account">
                <a href="account.php">
                    <div class="user-icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <span>My&nbsp;Account</span>
                </a>
            </div>
            <div class="book-now">
                <a href="booknow.php">
                    <div class="bell-icon">
                        <i class="fa-solid fa-bell-concierge"></i>
                    </div>
                    <span>Book&nbsp;Now</span>
                </a>
            </div>
        </div>
    </header>

    <nav class="top-nav">
        <div class="logo">
            <a href="index.php">
                <img src="assets/img/Grove-Photoroom.png" alt="Grove Logo">
                <span class="brand-name">Grove&nbsp;Residences</span>
            </a>
        </div>
        <ul class="nav-links" style="margin-bottom: 0;">
            <li><a href="index.php">Home</a></li>
            <li><a href="accommodation.php">Accommodation</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="aboutus.php">About&nbsp;Us</a></li>
            <li><a href="contactus.php">Contact&nbsp;Us</a></li>
        </ul>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <div class="mobile-menu">
        <ul>
            <!-- <hr style="width: 100%; margin-top: 0;"> -->
            <li><a href="#">Home</a></li>
            <li><a href="#">New Arrival</a></li>
            <li><a href="#">Product</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Sign&nbsp;In</a></li>
        </ul>
    </div>

    <script>
        document.querySelector('.hamburger').addEventListener('click', () => {
            document.querySelector('.mobile-menu').classList.toggle('active');
            document.querySelector('.hamburger').classList.toggle('active');
        });
    </script>

    <!-- bootstrap -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script> -->

</body>


</html>