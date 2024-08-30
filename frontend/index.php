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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <style>
    img,
    .card-img-top {
        border-radius: 0;
    }

    a.btn {
        color: var(--white);
        background-color: var(--green);
        border-radius: 0;
    }

    .card.shadow {
        height: 100%;
    }

    .container-fluid {
        padding-inline: 1%;
        margin-top: 1rem;
    }
    </style>

</head>

<style>
</style>

<body>
    <!------------------------------------------------------------ Banner Carousel ------------------------------------------------------------>
    <div class="container-fluid px-0">
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
                    <img src="assets/img/commu.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h2>Grove Apartment</h2>

                        <a href="#" target="_blank">Visit Room</a>
                    </div>
                </div>
                <div class="carousel-item">

                    <img src="assets/img/commu.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h2>Groove Room 1</h2>

                        <a href="#">Visit Website</a>
                    </div>
                </div>
                <div class="carousel-item">

                    <img src="assets/img/commu.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h2>Groove Room 2</h2>

                        <a href="#">Visit Website</a>
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

    <div class="container-fluid menu-overlay d-flex justify-content-center" id="check-bar">

        <div class="d-flex flex-row w-100" role="group" style="gap: 0;">
            <a class="text text-black text-center" href="#" style="text-decoration: none; flex-grow: 1;">
                <div class="card p-2" style="width: 100%;">
                    <p class="my-auto">Check In</p>
                    <p class="my-auto">1</p>
                </div>
            </a>
            <a class="text text-black text-center" href="#" style="text-decoration: none; flex-grow: 1;">
                <div class="card p-2" style="width: 100%;">
                    <p class="my-auto">Check Out</p>
                    <p class="my-auto">2</p>
                </div>
            </a>
            <a class="text text-black text-center" href="#" style="text-decoration: none; flex-grow: 1;">
                <div class="card p-2" style="width: 100%;">
                    <p class="my-auto">Guests</p>
                    <p class="my-auto">3</p>
                </div>
            </a>
            <a class="text text-white text-center" href="#" style="text-decoration: none; flex-grow: 1;">
                <div class="card p-2 text-white" style="background-color: var(--green); width: 100%;">
                    <p class="my-auto">Book Now</p>
                </div>
            </a>
        </div>
    </div>

    <!------------------------------------------------------------------ Content ------------------------------------------------------------------>
    <div class="container pt-2 pb-5 text-center">
        <h1 class="section-title">Welcome To Groove Apartment</h1>

        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo hic eligendi voluptatem inventore doloremque
            totam architecto deleniti! Aperiam deserunt nobis vel quas natus. Architecto ex illum dolor reprehenderit
            saepe rem!</p>

        <a class="btn" href="#">Learn More</a>
    </div>

    <!------------------------------------------------------------------- About ------------------------------------------------------------------->

    <div class="container-fluid bg-white d-flex px-0">
        <div class="col-md-6 testimonial-text my-auto">
            <h3 class="section-title-left text-start">About Us</h3>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus eaque consequatur blanditiis rem
                magnam laudantium unde vero itaque eveniet, impedit veritatis temporibus ducimus est optio perspiciatis.
                Natus ipsa officiis rerum.
            </p>
            <a class="btn" href="#">Learn More</a>
        </div>
        <div class="col-md-6">
            <img src="assets/img/IMG_9010.jpg" alt="Scenic view" class="testimonial-img">

        </div>
    </div>

    <!------------------------------------------------------------------- Our Rooms ------------------------------------------------------------------->
    <div class="container-fluid py-4 px-0">
        <div class="container text-center">
            <h1 class="section-title">Our Rooms</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium cumque quas, beatae, necessitatibus
                officiis consectetur nisi in modi atque sit repellendus velit nemo, consequatur doloremque ab. Ullam
                magnam nulla voluptates.</p>
        </div>
        <!-- Card Slider -->
        <div class="container-fluid mt-5">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
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
                    <div class="swiper-slide">
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
                    <div class="swiper-slide">
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
    <div class="container-fluid bg-white d-flex px-0">
        <div class="col-md-6">
            <img src="assets/img/commu.jpg" alt="Scenic view" class="testimonial-img">
        </div>
        <div class="col-md-6 testimonial-text my-auto">
            <blockquote class="blockquote">

                <p class="mb-0">We enjoyed our stay at Luxurious hotel greatly, the staff were friendly and
                    attentive to
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
                                <p class="card-text text-start mb-0"><i class="fa-solid fa-tag"
                                        style="color: var(--green); margin-right: .5rem;"></i>20% of August
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
                                <p class="card-text text-start mb-0"><i class="fa-solid fa-tag"
                                        style="color: var(--green); margin-right: .5rem;"></i></i>10% off families in
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
                                <p class="card-text text-start mb-0"><i class="fa-solid fa-tag"
                                        style="color: var(--green); margin-right: .5rem;"></i></i>20% of August
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
                                <p class="card-text text-start mb-0"><i class="fa-solid fa-tag"
                                        style="color: var(--green); margin-right: .5rem;"></i></i>1 Adult is free when
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
                                <p class="card-text text-start mb-0"><i class="fa-solid fa-tag"
                                        style="color: var(--green); margin-right: .5rem;"></i></i>10% off families in
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
        <iframe id="youtube-video" src="" frameborder="0"
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
                            <i class="fas fa-city" style="color: var(--green);"></i>
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
                            <i class="fas fa-swimming-pool" style="color: var(--green);"></i>
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
                            <i class="fas fa-compass" style="color: var(--green);"></i>
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
                            <i class="fas fa-subway" style="color: var(--green);"></i>
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
    <div class="container-fluid bg-white px-0 py-4 text-center">
        <div class="container pt-3">
            <h4 class="section-title">Our Gallery</h4>
        </div>
        <div class="container">
            <!-- Gallery -->
            <div class="row">
                <div class="gallery-content col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <img src="assets/img/IMG_9010.jpg" class="w-100 shadow-1-strong shadow mb-4"
                        alt="Boat on Calm Water" />

                    <img src="assets/img/commu.jpg" class="w-100 shadow-1-strong shadow mb-4"
                        alt="Wintry Mountain Landscape" />
                </div>

                <div class="gallery-content col-lg-4 mb-4 mb-lg-0">
                    <img src="assets/img/IMG_9010.jpg" class="w-100 shadow-1-strong shadow mb-4"
                        alt="Mountains in the Clouds" />

                    <img src="assets/img/commu.jpg" class="w-100 shadow-1-strong shadow mb-4"
                        alt="Boat on Calm Water" />
                </div>

                <div class="gallery-content col-lg-4 mb-4 mb-lg-0">
                    <img src="assets/img/IMG_9010.jpg" class="w-100 shadow-1-strong shadow mb-4" alt="Waves at Sea" />

                    <img src="assets/img/commu.jpg" class="w-100 shadow-1-strong shadow mb-4"
                        alt="Yosemite National Park" />
                </div>
            </div>
            <!-- Gallery -->
        </div>
    </div>

    <script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3, // 3 cards per view (33.33% width each)
        spaceBetween: 30,
        loop: false,
        grabCursor: true,
        breakpoints: {
            0: {
                slidesPerView: 1, // 1 card per view for smaller screens
            },
            768: {
                slidesPerView: 2, // 2 cards per view for medium screens
            },
            1024: {
                slidesPerView: 3, // 3 cards per view for larger screens
            }
        },
    });
    </script>

    <script>
    document.getElementById('play-video').addEventListener('click', function(event) {
        event.preventDefault();
        const videoPopup = document.getElementById('video-popup');
        const overlay = document.getElementById('overlay');
        const youtubeVideo = document.getElementById('youtube-video');

        // แสดง popup และ overlay
        videoPopup.style.display = 'block';
        overlay.style.display = 'block';

        // ใช้ setTimeout เพื่อรอให้ popup ปรากฏก่อน แล้วเปลี่ยนค่า opacity
        setTimeout(function() {
            videoPopup.classList.add('show');
        }, 10); // ใช้ค่า delay เล็กน้อยเพื่อให้ transition มีผล

        // ตั้งค่า URL ของวิดีโอ YouTube ที่จะเล่น
        youtubeVideo.src = 'https://www.youtube.com/embed/YBdekGSC68A?autoplay=0';
    });

    document.getElementById('overlay').addEventListener('click', function() {
        const videoPopup = document.getElementById('video-popup');
        const youtubeVideo = document.getElementById('youtube-video');

        // ลบคลาส .show เพื่อให้เกิด transition ซ่อน popup
        videoPopup.classList.remove('show');

        // ตั้ง timeout เพื่อรอให้ transition เสร็จสิ้นก่อนซ่อน popup และ overlay
        setTimeout(function() {
            videoPopup.style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
            // หยุดการเล่นวิดีโอ
            youtubeVideo.src = '';
        }, 500);
    });
    </script>

</body>

</html>

<?php
require 'footer.php';
?>