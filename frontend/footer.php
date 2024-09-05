<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/setting.css">

    <!-- bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->

    <style>
    footer {
        padding: 3rem;
    }

    footer li,
    footer a,
    footer i {
        color: var(--white) !important;
    }

    .link-body-emphasis i {
        font-size: 24px;
    }

    .location-icon i,
    .phone-icon i {
        font-size: 22px;
    }

    #send-mail input,
    #send-mail button {
        border-radius: 0;
    }

    @media screen and (max-width: 575px) {
        footer {
            padding: 1.5rem !important;
        }

        .rights-reserved ul li {
            margin-left: 0 !important;
            margin-right: 1rem !important;
        }

        .link-body-emphasis i {
            font-size: 22px;
        }

        .location-icon i,
        .phone-icon i {
            font-size: 19px;
        }
    }
    </style>
</head>

<body>

    <div class="container-fluid px-0 text-white" style="background-color: #333;">
        <footer>
            <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">About</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">About</a></li>
                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">
                    <form>
                        <h5>Subscribe to our newsletter</h5>
                        <p>Monthly digest of what's new and exciting from us.</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2" id="send-mail">
                            <label for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address"
                                fdprocessedid="ri4x4m">
                            <button class="btn btn-primary" type="submit" name="subscribe"
                                fdprocessedid="v9vnvq">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="rights-reserved d-flex flex-column flex-sm-row justify-content-between pt-4 mt-4 border-top">
                <p>© 2024 Grove Residences Company, Inc. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3">
                        <a class="link-body-emphasis" href="#">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a class="link-body-emphasis" href="#">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a class="link-body-emphasis" href="#">
                            <i class="fa-solid fa-envelope"></i>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a class="link-body-emphasis location-icon" href="#">
                            <i class="fa-solid fa-location-dot"></i>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a class="link-body-emphasis phone-icon" href="#">
                            <i class="fa-solid fa-phone"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </footer>
    </div>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- aos animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
    AOS.init({
        once: false,
        duration: 800,
        easing: 'ease',
    });
    </script>

</body>


</html>