<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navigation</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/setting.css">
    <link rel="stylesheet" href="assets/css/top-nav.css">
</head>

<body>
    <header>
        <div class="container-left">
            <div class="content-tell">
                <div class="tell">
                    <i class="fa-solid fa-phone" style="color: #ffffff;"></i>
                </div>
                <span>062-373-8955</span>
            </div>
            <div class="content-address">
                <div class="address">
                    <i class="fa-solid fa-location-dot" style="color: #ffffff;"></i>
                </div>
                <span>318/8 Wongsawang11, Wongsawang, Bangsue, Bangkok, Thailand</span>
            </div>
        </div>
        <div class="container-right">
            <div class="my-account">
                <p>My Account</p>
            </div>
            <div class="book-now">
                <i class='bx bxs-bell-ring'></i>
                <span>Book Now</span>
            </div>
        </div>
    </header>

    <nav class="navbar">
        <div class="logo">
            <img src="img/Air Jordan 1 Skyblue.png" alt="Logo">
            <span class="brand-name">MyBrand</span>
        </div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">New Arrival</a></li>
            <li><a href="#">Product</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="auth-links">
            <a href="#">Sign In</a>
            <a href="#">Profile</a>
        </div>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <div class="mobile-menu">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">New Arrival</a></li>
            <li><a href="#">Product</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Sign In</a></li>
            <li><a href="#">Profile</a></li>
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