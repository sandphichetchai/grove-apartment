<?php
require '../connect.php';
require 'top-nav.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="assets/css/setting.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/about.css">
</head>

<style>
    .accordion-button::after {
        display: none;
    }

    .accordion-button.collapsed .icon-minus {
        display: none;
    }

    .accordion-button .icon-plus {
        display: none;
    }

    .accordion-button.collapsed .icon-plus {
        display: inline-block;
    }

    .accordion-button .icon-minus {
        display: inline-block;
    }

    .accordion-button {
        background-color: #edefec;
        border: none;
        box-shadow: none;
        color: #000;
        font-weight: bold;
    }

    .accordion-button:not(.collapsed) {
        background-color: #edefec !important;
        color: #000;
    }

    .accordion-body {
        background-color: #edefec;
        padding-left: 54px;
        padding-right: 54px;
    }

    .accordion-item {
        border: none;
        /* เอาขอบออก */
    }

    .accordion-item+.accordion-item {
        border-top: none;
    }
</style>

<body>
    <!------------------------------------------------------------------ Banner ------------------------------------------------------------------>
    <div class="container-fluid px-0">
        <img src="assets/img/IMG_9010.jpg" class="d-block w-100" style="aspect-ratio:16/6;" alt="">
    </div>
    <div class="carousel-caption">
        <h2 class="section-titlex">About Us</h2>
    </div>

    <!------------------------------------------------------------------ Content ------------------------------------------------------------------>
    <div class="container p-5">
        <div class="row">
            <h4 class="section-title">Our Hotel</h4>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est rem veritatis veniam tenetur repellat fuga accusantium corrupti consequatur cumque itaque quae, labore quidem dicta quis dolor consequuntur nam earum ratione?</p>
            <br>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque autem corporis, beatae deserunt iure adipisci enim magnam. Saepe possimus reiciendis vel repellendus enim voluptatibus explicabo, minus impedit nostrum veniam nemo!</p>
        </div>
    </div>

    <!------------------------------------------------------------------ Video ------------------------------------------------------------------>
    <div class="container">
        <div class="video-section">
            <div>
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="play-icon">
                    <i class="fa fa-play"></i>
                </a>
            </div>
        </div>
    </div>

    <!------------------------------------------------------------------ FAQ ------------------------------------------------------------------>
    <div class="container p-5">
        <div class="row">
            <h4 class="section-title">Hotel FAQ's</h4>
        </div>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <span class="icon-plus"><i class="fa-solid fa-circle-plus pe-2" style="color: #446c1c; font-size:25px;"></i></span>
                        <span class="icon-minus"><i class="fa-solid fa-circle-minus pe-2" style="color: #446c1c; font-size:25px;"></i></span>
                        My flight arrives early in the morning, what time can I check in?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <span class="icon-plus"><i class="fa-solid fa-circle-plus pe-2" style="color: #446c1c; font-size:25px;"></i></span>
                        <span class="icon-minus"><i class="fa-solid fa-circle-minus pe-2" style="color: #446c1c; font-size:25px;"></i></span>
                        Is breakfast included as standard with all rooms?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <span class="icon-plus"><i class="fa-solid fa-circle-plus pe-2" style="color: #446c1c; font-size:25px;"></i></span>
                        <span class="icon-minus"><i class="fa-solid fa-circle-minus pe-2" style="color: #446c1c; font-size:25px;"></i></span>
                        Do you provide a child day care service?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <span class="icon-plus"><i class="fa-solid fa-circle-plus pe-2" style="color: #446c1c; font-size:25px;"></i></span>
                        <span class="icon-minus"><i class="fa-solid fa-circle-minus pe-2" style="color: #446c1c; font-size:25px;"></i></span>
                        Are airport pickups available for late night flight arrivals?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------------------------------------------------------------------ Gallery ------------------------------------------------------------------>
    <div class="container">
        <div class="row">
            <!-- <div class="col-lg-4 col-md-12 mb-4 mb-lg-0"> -->
            <img src="assets/img/IMG_9010.jpg" class="w-25 mb-4" alt="Boat on Calm Water" />
            <img src="assets/img/commu.jpg" class="w-25 mb-4" alt="Wintry Mountain Landscape" />
            <img src="assets/img/IMG_9010.jpg" class="w-25 mb-4" alt="Boat on Calm Water" />
            <img src="assets/img/commu.jpg" class="w-25 mb-4" alt="Wintry Mountain Landscape" />
            <!-- </div> -->
        </div>
    </div>

</body>

</html>

<?php
require 'footer.php';
?>