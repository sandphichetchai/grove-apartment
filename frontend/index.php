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
    #guest-options {
        border: 4px var(--green) solid;
    }

    .guest-btn {
        width: 35px;
        height: 35px;
        text-align: center;
        font-size: 20px;
        font-weight: 600;
        padding: 0;
        border: none;
        border-radius: 100%;
        color: #fff;
        background-color: var(--green);
    }

    .flatpickr-calendar {
        width: 100%;
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

<style>
</style>

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
                    <div class="carousel-caption">
                        <h2>Groove Apartment</h2>
                        <a href="#" target="_blank">Visit Room</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/commu.jpg" class="d-block w-100" style="aspect-ratio:16/9;" alt="...">
                    <div class="carousel-caption">
                        <h2>Groove Room</h2>
                        <a href="#">Visit Website</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/commu.jpg" class="d-block w-100" style="aspect-ratio:16/9;" alt="...">
                    <div class="carousel-caption">
                        <h2>Groove Room</h2>
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
    <div class="container-fluid menu-overlay d-flex justify-content-center">

        <div class="d-flex flex-row w-100" role="group">
            <div class="card position-relative" style="flex-grow: 1;">
                <label for="input-datein" class="my-auto" id="label-datein"
                    style="width: 100%; height: 100%; cursor: pointer; display: flex; justify-content: center; align-items: center;">Check
                    In</label>
                <input type="date" class="booking-input form-control my-auto" id="input-datein" name="input-datein"
                    value="" style="display: none;">
            </div>
            <div class="card position-relative" style="flex-grow: 1;">
                <label for="input-dateout" class="my-auto" id="label-dateout"
                    style="width: 100%; height: 100%; cursor: pointer; display: flex; justify-content: center; align-items: center;">Check
                    Out</label>
                <input type="date" class="booking-input form-control my-auto" id="input-dateout" name="input-dateout"
                    value="" style="display: none;">
            </div>
            <div class="card" style="flex-grow: 1; height: auto; position: relative;">
                <label for="guest-toggle" id="guest-label"
                    style="width: 100%; height: 100%; cursor: pointer; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                    <span>Guests</span>
                    <span class="text-center" id="guest-count" style="width: 100px;">2 Guest(s)</span>
                </label>
                <div class="p-3" id="guest-options"
                    style="width: 100%; display: none; position: absolute; top: 100%; left: 0; background-color: #fff">
                    <div class="guest-type" style="display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <strong>Adult</strong>
                            <p style="margin: 0; color: #888;">Ages 13 or above</p>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <button class="guest-btn" onclick="updateGuestCount('adult', -1)">-</button>
                            <span class="mx-1 text-center" id="adult-count" style="width: 20px;"> 1 </span>
                            <button class="guest-btn" onclick="updateGuestCount('adult', 1)">+</button>
                        </div>
                    </div>
                    <div class="guest-type"
                        style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <div>
                            <strong>Child</strong>
                            <p style="margin: 0; color: #888;">Ages 12 or below</p>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <button class="guest-btn" onclick="updateGuestCount('child', -1)">-</button>
                            <span class="mx-1 text-center" id="child-count" style="width: 20px;"> 1 </span>
                            <button class="guest-btn" onclick="updateGuestCount('child', 1)">+</button>
                        </div>
                    </div>
                    <div class="d-flex">
                        <a class="btn ms-auto" href="">OK</a>
                    </div>
                </div>
            </div>

            <a class="text text-white text-center" href="#" style="text-decoration: none; flex-grow: 1;">
                <div class="card text-white" style="background-color: var(--green); width: 100%;">
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
        <a class="btn btn-success" href="#">Learn More</a>
    </div>

    <!------------------------------------------------------------------- About ------------------------------------------------------------------->
    <div class="container-fluid bg-white px-0">
        <div class="row">
            <div class="col-md-6 col-sm-1 testimonial-text my-auto">
                <h3 class="section-title-left text-start">About Us</h3>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus eaque consequatur blanditiis rem
                    magnam laudantium unde vero itaque eveniet, impedit veritatis temporibus ducimus est optio
                    perspiciatis. Natus ipsa officiis rerum.
                </p>
                <a class="btn btn-success" href="#">Learn More</a>
            </div>
            <div class="col-md-6 col-sm-1">
                <img src="assets/img/IMG_9010.jpg" alt="Scenic view" class="testimonial-img">
            </div>
        </div>
    </div>

    <!------------------------------------------------------------------- Our Rooms ------------------------------------------------------------------->
    <div class="container-fluid  py-4 px-0">
        <div class="container text-center">
            <h1 class="section-title">Our Rooms</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium cumque quas, beatae, necessitatibus
                officiis consectetur nisi in modi atque sit repellendus velit nemo, consequatur doloremque ab. Ullam
                magnam nulla voluptates.</p>
        </div>
        <!-- Card -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 d-flex justify-content-center">
                    <div class="card shadow" style="width: 24rem; height:auto">
                        <img src="assets/img/front.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-start">Room 1</h5>
                            <hr>
                            <p class="card-text text-start">Some quick example text to build on the card title and make
                                up the bulk of the card's content.</p>
                            <a href="#" class="btn float-start text-white" style="background-color: #446c1c;">500 บาท /
                                คืน</a>
                            <a href="#" class="text-decoration-none text-black float-end pt-2">View Room ></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-4 d-flex justify-content-center">
                    <div class="card shadow" style="width: 24rem; height:auto">
                        <img src="assets/img/front.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-start">Room 2</h5>
                            <hr>
                            <p class="card-text text-start">Some quick example text to build on the card title and make
                                up the bulk of the card's content.</p>
                            <a href="#" class="btn float-start text-white" style="background-color: #446c1c;">500 บาท /
                                คืน</a>
                            <a href="#" class="text-decoration-none text-black float-end pt-2">View Room ></a>
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
        <div class="container card-group jusify-content-center">
            <div class="col-lg-4 col-sm-1 card shadow ms-auto" style="width: 14rem; height:auto">
                <img src="assets/img/IMG_9010.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-start">Card title</h5>
                    <hr>
                    <p class="card-text text-start">1 Adult is free when booking in July</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-1 card shadow mx-2" style="width: 14rem; height:auto">
                <img src="assets/img/IMG_9010.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-start">Card title</h5>
                    <hr>
                    <p class="card-text text-start">10% off families in march</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-1 card shadow ms-auto" style="width: 14rem; height:auto">
                <img src="assets/img/IMG_9010.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-start">Card title</h5>
                    <hr>
                    <p class="card-text text-start">20% of August booking for couples</p>
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
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="play-icon">
                    <i class="fa fa-play"></i>
                </a>
            </div>
        </div>
    </div>

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
    <div class="container-fluid bg-white px-0 py-4 text-center">
        <div class="container pt-3">
            <h4 class="section-title">Our Gallery</h4>
        </div>
        <div class="container">
            <!-- Gallery -->
            <div class="row">
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <img src="assets/img/IMG_9010.jpg" class="w-100 shadow-1-strong rounded shadow mb-4"
                        alt="Boat on Calm Water" />

                    <img src="assets/img/commu.jpg" class="w-100 shadow-1-strong rounded shadow mb-4"
                        alt="Wintry Mountain Landscape" />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="assets/img/IMG_9010.jpg" class="w-100 shadow-1-strong rounded shadow mb-4"
                        alt="Mountains in the Clouds" />

                    <img src="assets/img/commu.jpg" class="w-100 shadow-1-strong rounded shadow mb-4"
                        alt="Boat on Calm Water" />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="assets/img/IMG_9010.jpg" class="w-100 shadow-1-strong rounded shadow mb-4"
                        alt="Waves at Sea" />

                    <img src="assets/img/commu.jpg" class="w-100 shadow-1-strong rounded shadow mb-4"
                        alt="Yosemite National Park" />
                </div>
            </div>
            <!-- End Gallery -->
        </div>
    </div>

    <script>
    // input date
    document.addEventListener('DOMContentLoaded', function() {
        var labelDateIn = document.getElementById('label-datein');
        var labelDateOut = document.getElementById('label-dateout');
        var inputDateIn = document.getElementById('input-datein');
        var inputDateOut = document.getElementById('input-dateout');

        // ใช้ Flatpickr กับ inputDateIn
        flatpickr(inputDateIn, {
            onChange: function(selectedDates, dateStr, instance) {
                labelDateIn.textContent = 'Check In: ' +
                    dateStr; // อัปเดต label ด้วยวันที่ที่เลือก
            },
            appendTo: labelDateIn.closest('.card'), // ให้ปฏิทินอยู่ใต้ .card
            positionElement: labelDateIn.closest('.card') // กำหนดตำแหน่งปฏิทิน
        });

        // ใช้ Flatpickr กับ inputDateOut
        flatpickr(inputDateOut, {
            onChange: function(selectedDates, dateStr, instance) {
                labelDateOut.textContent = 'Check Out: ' +
                    dateStr;
            },
            appendTo: labelDateOut.closest('.card'), // ให้ปฏิทินอยู่ใต้ .card
            positionElement: labelDateOut.closest('.card') // กำหนดตำแหน่งปฏิทิน
        });

        // แสดงปฏิทินเมื่อคลิกที่ labelDateIn
        labelDateIn.addEventListener('click', function() {
            event.preventDefault(); // ป้องกันการดีฟอลต์ที่อาจทำให้เกิดการเลื่อนหน้า
            inputDateIn._flatpickr.open();
        });

        // แสดงปฏิทินเมื่อคลิกที่ labelDateOut
        labelDateOut.addEventListener('click', function() {
            event.preventDefault();
            inputDateOut._flatpickr.open();
        });
    });

    // input guest number
    document.getElementById('guest-label').addEventListener('click', function() {
        var guestOptions = document.getElementById('guest-options');

        event.preventDefault();

        if (guestOptions.style.display === 'none' || guestOptions.style.display === '') {
            guestOptions.style.display = 'block';
        } else {
            guestOptions.style.display = 'none';
        }
    });

    document.getElementById('guest-ok-btn').addEventListener('click', function() {
        event.preventDefault();
        document.getElementById('guest-options').style.display = 'none';
    });

    function updateGuestCount(type, change) {
        var countElement = document.getElementById(type + '-count');
        var count = parseInt(countElement.textContent);
        count = Math.max(0, count + change);
        countElement.textContent = count;
        updateTotalGuests();
    }

    function updateTotalGuests() {
        var adultCount = parseInt(document.getElementById('adult-count').textContent);
        var childCount = parseInt(document.getElementById('child-count').textContent);
        var totalGuests = adultCount + childCount;
        document.getElementById('guest-count').textContent = totalGuests + ' Guest(s)';
    }
    </script>

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