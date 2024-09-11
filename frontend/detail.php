<?php
require '../connect.php';
require 'top-nav.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link rel="stylesheet" href="assets/css/setting.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/detail.css">
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
    <div class="container">
        <div class="row py-4">
            <!-------------------- Section Left -------------------->
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="row justify-content-center">
                    <h3 class="text-center">THIS FOR TITLE</h3>
                    <div class="d-flex justify-content-center text-center pt-1">
                        <div>
                            <p><i class="fa-solid fa-bed mx-2 ps-3" style="color: #446c1c; font-size:20px;"></i>Sleeps:
                                2 Adults</p>
                        </div>
                        <div>
                            <p><i class="fa-solid fa-ruler mx-2 ps-3" style="color: #446c1c; font-size:20px;"></i>Size:
                                35sqm</p>
                        </div>
                        <div>
                            <p><i class="fas fa-binoculars mx-2 ps-3" style="color: #446c1c; font-size:20px;"></i>City:
                                View</p>
                        </div>
                    </div>
                    <img src="assets/img/commu.jpg" class="mt-3 mb-5" alt="" style="width: 100%; height: 50vh;">

                    <!------------------------------------------------------------------- Description ------------------------------------------------------------------->
                    <h4 class="text-center section-title">Room Description</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste dolorum magni sit, odio mollitia,
                        autem molestiae fugiat ad, perspiciatis commodi adipisci deleniti nisi nesciunt incidunt
                        repellendus? Magnam magni quaerat non.</p>
                    <br>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur perferendis sapiente
                        reiciendis. Dignissimos ratione aliquid, tenetur ea architecto in aut perferendis porro dolore
                        facere ex neque quia, minus sunt esse.</p>

                    <!------------------------------------------------------------------- Facilities ------------------------------------------------------------------->
                    <h4 class="text-center section-title">Facilities</h4>
                    <div class="row text-center">
                        <div class="col-6 col-md-3">
                            <i class="fas fa-wifi fa-2x" style="color:#446c1c;"></i>
                            <p>High speed in-room wifi</p>
                        </div>
                        <div class="col-6 col-md-3">
                            <i class="fas fa-swimming-pool fa-2x" style="color:#446c1c;"></i>
                            <p>Swimming pool</p>
                        </div>
                        <div class="col-6 col-md-3">
                            <i class="fas fa-hot-tub fa-2x" style="color:#446c1c;"></i>
                            <p>Hot tub</p>
                        </div>
                        <div class="col-6 col-md-3">
                            <i class="fas fa-bath fa-2x" style="color:#446c1c;"></i>
                            <p>Bath</p>
                        </div>
                        <div class="col-6 col-md-3">
                            <i class="fas fa-cocktail fa-2x" style="color:#446c1c;"></i>
                            <p>Mini bar</p>
                        </div>
                        <div class="col-6 col-md-3">
                            <i class="fas fa-child fa-2x" style="color:#446c1c;"></i>
                            <p>Child friendly</p>
                        </div>
                        <div class="col-6 col-md-3">
                            <i class="fas fa-gamepad fa-2x" style="color:#446c1c;"></i>
                            <p>Games room</p>
                        </div>
                        <div class="col-6 col-md-3">
                            <i class="fas fa-wheelchair fa-2x" style="color:#446c1c;"></i>
                            <p>Wheelchair access</p>
                        </div>
                    </div>

                    <!------------------------------------------------------------------- Video ------------------------------------------------------------------->
                    <h4 class="text-center section-title pb-2">Video</h4>
                    <div class="video-section">
                        <div>
                            <a href="#" class="play-icon" id="play-video">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Popup สำหรับวิดีโอ -->
                    <div id="video-popup">
                        <iframe id="content-video"
                            src="https://www.facebook.com/plugins/video.php?href=https://fb.watch/uuy-9e4B1E/?autoplay=0&mute=1"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>

                    <!-- พื้นหลังที่มืดลง -->
                    <div id="overlay" class="overlay"></div>

                    <!------------------------------------------------------------------- Booking ------------------------------------------------------------------->
                    <h4 class="text-center section-title pt-4">Booking Policy</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <span class="icon-plus"><i class="fa-solid fa-circle-plus pe-2"
                                            style="color: #446c1c; font-size:25px;"></i></span>
                                    <span class="icon-minus"><i class="fa-solid fa-circle-minus pe-2"
                                            style="color: #446c1c; font-size:25px;"></i></span>
                                    My flight arrives early in the morning, what time can I check in?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus
                                        neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas
                                        nunc est, posuere sed convallis tincidunt.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span class="icon-plus"><i class="fa-solid fa-circle-plus pe-2"
                                            style="color: #446c1c; font-size:25px;"></i></span>
                                    <span class="icon-minus"><i class="fa-solid fa-circle-minus pe-2"
                                            style="color: #446c1c; font-size:25px;"></i></span>
                                    Is breakfast included as standard with all rooms?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus
                                        neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas
                                        nunc est, posuere sed convallis tincidunt.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <span class="icon-plus"><i class="fa-solid fa-circle-plus pe-2"
                                            style="color: #446c1c; font-size:25px;"></i></span>
                                    <span class="icon-minus"><i class="fa-solid fa-circle-minus pe-2"
                                            style="color: #446c1c; font-size:25px;"></i></span>
                                    Do you provide a child day care service?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus
                                        neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas
                                        nunc est, posuere sed convallis tincidunt.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <span class="icon-plus"><i class="fa-solid fa-circle-plus pe-2"
                                            style="color: #446c1c; font-size:25px;"></i></span>
                                    <span class="icon-minus"><i class="fa-solid fa-circle-minus pe-2"
                                            style="color: #446c1c; font-size:25px;"></i></span>
                                    Are airport pickups available for late night flight arrivals?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus
                                        neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas
                                        nunc est, posuere sed convallis tincidunt.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-------------------- Section Right -------------------->
            <div class="col-lg-4 col-md-12 col-sm-12 px-5">

                <!------------------------------------------------------------------- เมนูจองด้านขวา ------------------------------------------------------------------->
                <!-- ยังไม่ได้ทำ -->
                <div class="row">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus veniam amet sit officia
                        temporibus consectetur velit. Necessitatibus, sapiente suscipit culpa fugit sed rerum vitae
                        placeat neque dicta totam magni voluptatem?</p>
                </div>

                <!------------------------------------------------------------------- Assistance ------------------------------------------------------------------->
                <div class="row">
                    <div class="card shadow w-100 text-start p-4" style="height: auto;">
                        <h4 class="section-title-left">
                            Need Assistance?
                        </h4>
                        <P>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates mollitia fugiat maiores
                            quos ducimus sed aliquid deserunt enim saepe, architecto labore eum aspernatur, error
                            assumenda adipisci hic est consectetur repudiandae!</P>
                        <div class="d-flex">
                            <p><i class="fa-solid fa-location-dot pe-3" style="color: #446c1c; font-size:25px;"></i>55
                                Columbus Circle, New York, NY</p>
                        </div>
                        <div class="d-flex pt-1">
                            <p><i class="fa-solid fa-phone pe-3"
                                    style="color: #446c1c; font-size:20px;"></i>1111-2222-3333</p>
                        </div>
                        <div class="d-flex pt-1">
                            <p><i class="fa-solid fa-envelope pe-3"
                                    style="color: #446c1c; font-size:20px;"></i>booking@example.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <!------------------------------------------------------------------- Other Rooms ------------------------------------------------------------------->
    <!-- ยังไม่ได้ทำ -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h4 class="text-center section-title pb-2">Other Rooms</h4>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var dateInput = document.getElementById('side_date');

        // เมื่อมีการคลิกที่อินพุต, ให้เรียกใช้งาน open() เพื่อเปิดปฏิทิน
        dateInput.addEventListener('click', function() {
            this.showPicker();
        });
    });
    </script>

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
    // show video
    // document.getElementById('play-video').addEventListener('click', function(event) {
    //     event.preventDefault();
    //     const videoPopup = document.getElementById('video-popup');
    //     const overlay = document.getElementById('overlay');
    //     const contentVideo = document.getElementById('content-video');

    //     // แสดง popup และ overlay
    //     videoPopup.style.display = 'block';
    //     overlay.style.display = 'block';

    //     // ใช้ setTimeout เพื่อรอให้ popup ปรากฏก่อน แล้วเปลี่ยนค่า opacity
    //     setTimeout(function() {
    //         videoPopup.classList.add('show');
    //     }, 10); // ใช้ค่า delay เล็กน้อยเพื่อให้ transition มีผล

    //     // ตั้งค่า URL ของวิดีโอ YouTube ที่จะเล่น
    //     contentVideo.src =
    //         'https://www.facebook.com/plugins/video.php?href=https://fb.watch/uuy-9e4B1E/?autoplay=0&mute=1';
    // });

    // document.getElementById('overlay').addEventListener('click', function() {
    //     const videoPopup = document.getElementById('video-popup');
    //     const contentVideo = document.getElementById('content-video');

    //     // ลบคลาส .show เพื่อให้เกิด transition ซ่อน popup
    //     videoPopup.classList.remove('show');

    //     // ตั้ง timeout เพื่อรอให้ transition เสร็จสิ้นก่อนซ่อน popup และ overlay
    //     setTimeout(function() {
    //         videoPopup.style.display = 'none';
    //         document.getElementById('overlay').style.display = 'none';
    //         // หยุดการเล่นวิดีโอ
    //         contentVideo.src = '';
    //     }, 500);
    // });
    </script>
</body>

</html>
<?php require 'footer.php'; ?>