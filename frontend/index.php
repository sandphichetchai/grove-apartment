<?php
require '../connect.php';
require 'top-nav.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="assets/css/setting.css">
    <link rel="stylesheet" href="assets/css/index.css">

    <!-- flatpickr JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <style>
    .flatpickr-innerContainer {
        justify-content: center;
    }

    .flatpickr-calendar {
        width: 200%;
        z-index: 9999;
        top: 100% !important;
        left: 0 !important;
        border-radius: 0;
        background-color: #fff;
    }

    .flatpickr-day:hover,
    .flatpickr-day:focus {
        background-color: #b3d4fc;
        /* เปลี่ยนสีเมื่อเลื่อนเมาส์ */
    }

    .flatpickr-day.selected,
    .flatpickr-day.startRange,
    .flatpickr-day.endRange {
        background-color: #4a90e2;
        /* เปลี่ยนสีของวันที่ที่ถูกเลือก */
        color: #fff;
    }
    </style>
</head>

<body>
    <!------------------------------------------------------------ Banner Carousel ------------------------------------------------------------>
    <div class="container-fluid px-0 mt-0">
        <div id="carouselExampleIndicators" class="carousel slide">

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img/commu.jpg" class="d-block w-100" style="aspect-ratio:16/9;" alt="...">
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                        <h2>Groove&nbsp;Apartment&nbsp;1</h2>
                        <a class="btn btn-primary d-flex" href="#" target="_blank"
                            style="background-color: #007bff;">Visit&nbsp;<p class="mb-0">Room</p>
                        </a>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="assets/img/commu.jpg" class="d-block w-100" style="aspect-ratio:16/9;" alt="...">
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                        <h2>Groove&nbsp;Apartment&nbsp;2</h2>
                        <a class="btn btn-primary d-flex" href="#" target="_blank"
                            style="background-color: #007bff;">Visit&nbsp;<p class="mb-0">Room</p>
                        </a>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="assets/img/commu.jpg" class="d-block w-100" style="aspect-ratio:16/9;" alt="...">
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                        <h2>Groove&nbsp;Apartment&nbsp;3</h2>
                        <a class="btn btn-primary d-flex" href="#" target="_blank"
                            style="background-color: #007bff;">Visit&nbsp;<p class="mb-0">Room</p>
                        </a>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!------------------------------------------------------------------ Menu ------------------------------------------------------------------>
    <div class="container-fluid menu-overlay d-flex justify-content-center">
        <form method="get" action="booking-step1.php" class="booking-group w-100 d-flex flex-row" role="group">

            <div class="booking-check card position-relative" style="flex: 1 1 25%;">
                <label for="input-datein"
                    class="w-100 h-100 d-flex flex-column justify-content-center align-items-center my-auto"
                    id="label-datein" style="cursor: pointer; border-right: 1px #dedede solid"><strong>Check
                        In</strong>
                    <p class="mb-0">yyyy/mm/dd</p>
                </label>

                <input type="date" class="booking-input form-control my-auto" id="input-datein" name="input-datein"
                    value="" style="display: none;">
            </div>

            <div class="booking-check card position-relative" style="flex: 1 1 25%;">
                <label for="input-dateout"
                    class="w-100 h-100 d-flex flex-column justify-content-center align-items-center my-auto"
                    id="label-dateout" style="cursor: pointer; border-right: 1px #dedede solid"><strong>Check
                        Out</strong>
                    <p class="mb-0">yyyy/mm/dd</p>
                </label>

                <input type="date" class="booking-input form-control my-auto" id="input-dateout" name="input-dateout"
                    value="" style="display: none;">
            </div>

            <div class="booking-check card" style="flex: 1 1 25%;">
                <label for="guest-toggle" id="guest-label"
                    class="w-100 h-100 d-flex flex-column justify-content-center align-items-center my-auto"
                    style="cursor: pointer;">
                    <span><strong>Guests</strong></span>
                    <span class="text-center" id="guest-count" style="width: 100px;">2 Guest(s)</span>
                </label>

                <input type="hidden" id="guest-count-hidden" name="guest-count" value="2">

                <div class="bg-white p-3" id="guest-options"
                    style="width: calc(200% + 1px); display: none; position: absolute; top: 100%; left: -1px; z-index: 9998;">

                    <div class="guest-type" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="guest-box">
                            <strong>Adult</strong>
                            <p style="margin: 0; color: #888;">Ages 13 or above</p>
                        </div>
                        <div class="guest-box d-flex align-items-center">
                            <button class="guest-btn"
                                onclick="event.preventDefault(); updateGuestCount('adult', -1);">-</button>
                            <input type="text" class="text-center" id="adult-count" name="adult-count"
                                style="width: 25px;" value="1" readonly>
                            <button class="guest-btn"
                                onclick="event.preventDefault(); updateGuestCount('adult', 1);">+</button>
                        </div>
                    </div>

                    <hr class="w-100">

                    <div class="guest-type"
                        style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <div class="guest-box">
                            <strong>Child</strong>
                            <p style="margin: 0; color: #888;">Ages 12 or below</p>
                        </div>
                        <div class="guest-box d-flex align-items-center">
                            <button class="guest-btn"
                                onclick="event.preventDefault(); updateGuestCount('child', -1);">-</button>
                            <input type="text" class="text-center" id="child-count" name="child-count"
                                style="width: 25px;" value="1" readonly>
                            <button class="guest-btn"
                                onclick="event.preventDefault(); updateGuestCount('child', 1);">+</button>
                        </div>
                    </div>

                    <div class="d-flex">
                        <button class="btn ms-auto" id="guest-ok-btn"
                            style="background-color: var(--green);">OK</button>
                    </div>
                </div>
            </div>

            <div class="booking-check d-flex justify-content-center align-items-center" style="flex: 1 1 25%;">
                <input type="submit" class="w-100 h-100 card text text-white" id="filter-btn" name="filter"
                    style="background-color: var(--green); border-radius: 0;" value="Book Now">
            </div>
        </form>
    </div>

    <!------------------------------------------------------------------ Content ------------------------------------------------------------------>
    <div class="article-container container pt-2 pb-5 text-center">
        <h1 class="section-title">Welcome To Groove Apartment</h1>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo hic eligendi voluptatem inventore doloremque
            totam architecto deleniti! Aperiam deserunt nobis vel quas natus. Architecto ex illum dolor reprehenderit
            saepe rem!</p>
        <a class="btn" href="#">Learn More</a>
    </div>

    <!------------------------------------------------------------------- About ------------------------------------------------------------------->
    <div class="article-container container-fluid bg-white px-0 d-flex">

        <div class="section-article col-md-6 col-sm-1 my-auto">
            <h3 class="section-title-left text-start">About Us</h3>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus eaque consequatur blanditiis rem
                magnam laudantium unde vero itaque eveniet, impedit veritatis temporibus ducimus est optio
                perspiciatis. Natus ipsa officiis rerum.
            </p>
            <a class="btn" href="#">Learn More</a>
        </div>
        <div class="section-article col-md-6 col-sm-1 p-0">
            <img src="assets/img/IMG_9010.jpg" alt="Scenic view" class="testimonial-img">
        </div>
    </div>

    <!------------------------------------------------------------------- Our Rooms ------------------------------------------------------------------->
    <div class="ourroom-container container-fluid py-4 px-0">

        <div class="container text-center">
            <h1 class="section-title">Our Rooms</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium cumque quas, beatae, necessitatibus
                officiis consectetur nisi in modi atque sit repellendus velit nemo, consequatur doloremque ab. Ullam
                magnam nulla voluptates.</p>
        </div>
        <!-- Card Slider -->
        <div class="card-slider container-fluid mt-5">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide" data-aos="fade-down">
                        <div class="card shadow">
                            <img src="assets/img/front.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-start">Room 1</h5>
                                <hr>
                                <p class="card-text text-start">Some quick example text to build on the card title and
                                    make
                                    up the bulk of the card's content.</p>

                                <a class="btn float-start text-white" href="room-detail.php">500 บาท /
                                    คืน</a>
                                <a href="#" class="text-decoration-none text-black float-end pt-2">View Room <i
                                        class="fa-solid fa-chevron-right" style="color: #333; font-size: 14px;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" data-aos="fade-down">
                        <div class="card shadow">
                            <img src="assets/img/front.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-start">Room 2</h5>
                                <hr>
                                <p class="card-text text-start">Some quick example text to build on the card title and
                                    make
                                    up the bulk of the card's content.</p>
                                <a class="btn float-start text-white" href="room-detail.php">500 บาท /
                                    คืน</a>
                                <a href="#" class="text-decoration-none text-black float-end pt-2">View Room <i
                                        class="fa-solid fa-chevron-right" style="color: #333; font-size: 14px;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" data-aos="fade-down">
                        <div class="card shadow">
                            <img src="assets/img/front.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-start">Room 3</h5>
                                <hr>
                                <p class="card-text text-start">Some quick example text to build on the card title and
                                    make
                                    up the bulk of the card's content.</p>
                                <a class="btn float-start text-white" href="room-detail.php">500 บาท /
                                    คืน</a>
                                <a href="#" class="text-decoration-none text-black float-end pt-2">View Room <i
                                        class="fa-solid fa-chevron-right" style="color: #333; font-size: 14px;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card shadow">
                            <img src="assets/img/front.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-start">Room 4</h5>
                                <hr>
                                <p class="card-text text-start">Some quick example text to build on the card title and
                                    make
                                    up the bulk of the card's content.</p>
                                <a class="btn float-start text-white" href="room-detail.php">500 บาท /
                                    คืน</a>
                                <a href="#" class="text-decoration-none text-black float-end pt-2">View Room <i
                                        class="fa-solid fa-chevron-right" style="color: #333; font-size: 14px;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card shadow">
                            <img src="assets/img/front.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-start">Room 5</h5>
                                <hr>
                                <p class="card-text text-start">Some quick example text to build on the card title and
                                    make
                                    up the bulk of the card's content.</p>
                                <a class="btn float-start text-white" href="room-detail.php">500 บาท /
                                    คืน</a>
                                <a href="#" class="text-decoration-none text-black float-end pt-2">View Room <i
                                        class="fa-solid fa-chevron-right" style="color: #333; font-size: 14px;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------------------------------------------------------------------- Blog ------------------------------------------------------------------->
    <div class="article-container container-fluid bg-white px-0 d-flex">
        <div class="section-article col-md-6 col-sm-1 p-0">
            <img src="assets/img/commu.jpg" alt="Scenic view" class="testimonial-img">
        </div>
        <div class="section-article col-md-6 col-sm-1 testimonial-text my-auto">
            <blockquote class="blockquote">
                <p class="mb-0">We enjoyed our stay at Luxurious hotel greatly, the staff were friendly and attentive to
                    every one of our needs.</p>
                <footer class="blockquote-footer pt-4">Olivia Simons</footer>
            </blockquote>
        </div>
    </div>

    <!------------------------------------------------------------------- Offer ------------------------------------------------------------------->
    <div class="container-fluid py-4 px-0 text-center justify-content-center">
        <div class="container">
            <p class="section-title">Spacial Offers</p>
        </div>

        <!-- Card Slider -->
        <div class="container-fluid mt-5">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card shadow">
                            <img src="assets/img/IMG_9010.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-start">Room 1</h5>
                                <hr>
                                <p class="card-text text-start mb-0"><i class="fa-solid fa-tag"></i>20% of August
                                    booking for couples</p>

                                <a href="#" class="text-decoration-none text-black float-end pt-2">View Room <i
                                        class="fa-solid fa-chevron-right" style="color: #333; font-size: 14px;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card shadow">
                            <img src="assets/img/IMG_9010.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-start">Room 2</h5>
                                <hr>
                                <p class="card-text text-start mb-0"><i class="fa-solid fa-tag"></i>10% off families
                                    in
                                    march</p>

                                <a href="#" class="text-decoration-none text-black float-end pt-2">View Room <i
                                        class="fa-solid fa-chevron-right" style="color: #333; font-size: 14px;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card shadow">
                            <img src="assets/img/IMG_9010.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-start">Room 3</h5>
                                <hr>
                                <p class="card-text text-start mb-0"><i class="fa-solid fa-tag"></i>20% of August
                                    booking for couples</p>

                                <a href="#" class="text-decoration-none text-black float-end pt-2">View Room <i
                                        class="fa-solid fa-chevron-right" style="color: #333; font-size: 14px;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card shadow">
                            <img src="assets/img/IMG_9010.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-start">Room 4</h5>
                                <hr>
                                <p class="card-text text-start mb-0"><i class="fa-solid fa-tag"></i>1 Adult is free
                                    when
                                    booking in July</p>

                                <a href="#" class="text-decoration-none text-black float-end pt-2">View Room <i
                                        class="fa-solid fa-chevron-right" style="color: #333; font-size: 14px;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card shadow">
                            <img src="assets/img/IMG_9010.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-start">Room 5</h5>
                                <hr>
                                <p class="card-text text-start mb-0"><i class="fa-solid fa-tag"></i>10% off families
                                    in
                                    march</p>

                                <a href="#" class="text-decoration-none text-black float-end pt-2">View Room <i
                                        class="fa-solid fa-chevron-right" style="color: #333; font-size: 14px;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------------------------------------------------------------------- Video ------------------------------------------------------------------->
    <div class="container-fluid px-0 my-4">
        <div class="video-section">
            <div>
                <h1>Book online today and look forward to a relaxing stay with us</h1>
                <p>Watch our video tour now and imagine yourself here</p>

                <a href="#" class="play-icon" id="play-video">

                    <i class="fa fa-play"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Popup สำหรับวิดีโอ -->
    <div id="video-popup" class="video-popup">
        <iframe id="content-video" src="" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
    </div>

    <!-- พื้นหลังที่มืดลง -->
    <div id="overlay" class="overlay"></div>

    <!------------------------------------------------------------------- Facilities ------------------------------------------------------------------->
    <div class="container-fluid py-4 px-0">
        <div class="container">
            <h2 class="section-title">Hotel Facilities</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="facility-card">
                        <div class="facility-icon">
                            <i class="fas fa-city"></i>
                        </div>
                        <div>
                            <div class="facility-title">City Views</div>
                            <div class="facility-description">Proin felis mauris, fermentum non condimentum id,
                                porttitor in nisl curabitur euismod convallis.</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="facility-card">
                        <div class="facility-icon">
                            <i class="fas fa-swimming-pool"></i>
                        </div>
                        <div>
                            <div class="facility-title">Swimming Pool</div>
                            <div class="facility-description">Proin felis mauris, fermentum non condimentum id,
                                porttitor in nisl curabitur euismod convallis.</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="facility-card">
                        <div class="facility-icon">
                            <i class="fas fa-compass"></i>
                        </div>
                        <div>
                            <div class="facility-title">South Facing</div>
                            <div class="facility-description">Proin felis mauris, fermentum non condimentum id,
                                porttitor in nisl curabitur euismod convallis.</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="facility-card">
                        <div class="facility-icon">
                            <i class="fas fa-subway"></i>
                        </div>
                        <div>
                            <div class="facility-title">Subway Nearby</div>
                            <div class="facility-description">Proin felis mauris, fermentum non condimentum id,
                                porttitor in nisl curabitur euismod convallis.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------------------------------------------------------------------- Gallery ------------------------------------------------------------------->
    <div class="gallery-contianer container-fluid bg-white px-0 py-4 text-center">
        <div class="container pt-3">
            <h4 class="section-title">Our Gallery</h4>
        </div>
        <div class="container">
            <!-- Gallery -->
            <div class="row">
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <img src="assets/img/IMG_9010.jpg" class="w-100 shadow-1-strong shadow mb-4"
                        alt="Boat on Calm Water" />

                    <img src="assets/img/commu.jpg" class="w-100 shadow-1-strong shadow mb-4"
                        alt="Wintry Mountain Landscape" />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="assets/img/IMG_9010.jpg" class="w-100 shadow-1-strong shadow mb-4"
                        alt="Mountains in the Clouds" />

                    <img src="assets/img/commu.jpg" class="w-100 shadow-1-strong shadow mb-4"
                        alt="Boat on Calm Water" />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="assets/img/IMG_9010.jpg" class="w-100 shadow-1-strong shadow mb-4" alt="Waves at Sea" />

                    <img src="assets/img/commu.jpg" class="w-100 shadow-1-strong shadow mb-4"
                        alt="Yosemite National Park" />
                </div>
            </div>
            <!-- End Gallery -->
        </div>
    </div>

    <script src="assets/js/checkin.js"></script>

    <script>
    // card slider
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3, // 3 cards per view (33.33% width each)
        spaceBetween: 30,
        loop: false,
        grabCursor: true,
        breakpoints: {
            0: {
                slidesPerView: 1, // 1 card per view for screens min-width: 0px
            },
            768: {
                slidesPerView: 2, // 2 cards per view for screens min-width: 768px
            },
            1024: {
                slidesPerView: 3, // 3 cards per view for screens min-width: 1024px
            }
        },
    });
    </script>

    <script>
    // show video
    document.getElementById('play-video').addEventListener('click', function(event) {
        event.preventDefault();
        const videoPopup = document.getElementById('video-popup');
        const overlay = document.getElementById('overlay');
        const contentVideo = document.getElementById('content-video');

        // แสดง popup และ overlay
        videoPopup.style.display = 'block';
        overlay.style.display = 'block';

        // ใช้ setTimeout เพื่อรอให้ popup ปรากฏก่อน แล้วเปลี่ยนค่า opacity
        setTimeout(function() {
            videoPopup.classList.add('show');
        }, 10); // ใช้ค่า delay เล็กน้อยเพื่อให้ transition มีผล

        // ตั้งค่า URL ของวิดีโอ YouTube ที่จะเล่น
        contentVideo.src =
            'https://www.facebook.com/plugins/video.php?href=https://fb.watch/uuy-9e4B1E/?autoplay=0&mute=1';
    });

    document.getElementById('overlay').addEventListener('click', function() {
        const videoPopup = document.getElementById('video-popup');
        const contentVideo = document.getElementById('content-video');

        // ลบคลาส .show เพื่อให้เกิด transition ซ่อน popup
        videoPopup.classList.remove('show');

        // ตั้ง timeout เพื่อรอให้ transition เสร็จสิ้นก่อนซ่อน popup และ overlay
        setTimeout(function() {
            videoPopup.style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
            // หยุดการเล่นวิดีโอ
            contentVideo.src = '';
        }, 500);
    });
    </script>

</body>

</html>

<?php
require 'footer.php';
?>