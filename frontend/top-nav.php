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
</head>

<body style="background-color: var(--body-white) !important;">

    <header class="top-header">
        <div class="container-left">
            <div class="content-tell">
                <div class="tell-icon">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <span>062-373-8955</span>
            </div>
            <div class="content-address">
                <div class="address-icon">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <span>318/8 Wongsawang11, Wongsawang, Bangsue, Bangkok, Thailand</span>
            </div>
        </div>
        <div class="container-right">
            <div class="account">
                <div class="user-icon">
                    <i class="fa-solid fa-user"></i>
                </div>
                <span>Sign&nbsp;In</span>
            </div>
            <div class="book-now">
                <div class="bell-icon">
                    <i class="fa-solid fa-bell-concierge"></i>
                </div>
                <span>Book&nbsp;Now</span>
            </div>
        </div>
    </header>

    <nav class="top-nav">
        <div class="logo">
            <a href="#">
                <img src="assets/img/Grove-Photoroom.png" alt="Grove Logo">
            </a>
            <a href="#">
                <span class="brand-name">Grove&nbsp;Residences</span>
            </a>
        </div>
        <ul class="nav-links" style="margin-bottom: 0;">
            <li><a href="#">Home</a></li>
            <li><a href="#">Accommodation</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">About&nbsp;Us</a></li>
            <li><a href="#">Contact&nbsp;Us</a></li>
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

</body>


</html>