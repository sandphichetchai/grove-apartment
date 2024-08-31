<?php
require '../connect.php';
require 'top-nav.php';
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="assets/css/setting.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/about.css">

    <!-- FancyBox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
</head>

<style>
    .gallery-img {
        width: 100%;
        height: auto;
    }
</style>

<body>
    <!------------------------------------------------------------------ Banner ------------------------------------------------------------------>
    <div class="container-fluid px-0">
        <img src="assets/img/IMG_9010.jpg" class="d-block w-100" style="aspect-ratio:16/6;" alt="">
    </div>
    <div class="carousel-caption">
        <h2 class="section-titlex">Gallery</h2>
    </div>

    <!------------------------------------------------------------------ Gallery ------------------------------------------------------------------>
    <div class="container-fluid px-0 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <a href="assets/img/p1.jpg" data-fancybox="gallery">
                        <img src="assets/img/p1.jpg" alt="Image 1" class="gallery-img">
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <a href="assets/img/p2.jpg" data-fancybox="gallery">
                        <img src="assets/img/p2.jpg" alt="Image 2" class="gallery-img">
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <a href="assets/img/p3.jpg" data-fancybox="gallery">
                        <img src="assets/img/p3.jpg" alt="Image 3" class="gallery-img">
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <a href="assets/img/p1.jpg" data-fancybox="gallery">
                        <img src="assets/img/p1.jpg" alt="Image 4" class="gallery-img">
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <a href="assets/img/p2.jpg" data-fancybox="gallery">
                        <img src="assets/img/p2.jpg" alt="Image 5" class="gallery-img">
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <a href="assets/img/p3.jpg" data-fancybox="gallery">
                        <img src="assets/img/p3.jpg" alt="Image 6" class="gallery-img">
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <a href="assets/img/p1.jpg" data-fancybox="gallery">
                        <img src="assets/img/p1.jpg" alt="Image 7" class="gallery-img">
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <a href="assets/img/p2.jpg" data-fancybox="gallery">
                        <img src="assets/img/p2.jpg" alt="Image 8" class="gallery-img">
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <a href="assets/img/p3.jpg" data-fancybox="gallery">
                        <img src="assets/img/p3.jpg" alt="Image 9" class="gallery-img">
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <a href="assets/img/p1.jpg" data-fancybox="gallery">
                        <img src="assets/img/p1.jpg" alt="Image 10" class="gallery-img">
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <a href="assets/img/p2.jpg" data-fancybox="gallery">
                        <img src="assets/img/p2.jpg" alt="Image 11" class="gallery-img">
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <a href="assets/img/p3.jpg" data-fancybox="gallery">
                        <img src="assets/img/p3.jpg" alt="Image 12" class="gallery-img">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- FancyBox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-fancybox="gallery"]').fancybox({
                loop: true, // เลื่อนได้วนรอบ
                buttons: [
                    "slideShow",
                    "fullScreen",
                    "thumbs",
                    "close"
                ],
            });
        });
    </script>
</body>

</html>

<?php
require 'footer.php';
?>