<?php
require '../connect.php';
require 'top-nav.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="assets/css/setting.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/contact.css">
</head>

<style>
</style>

<body>
    <!------------------------------------------------------------------ Banner ------------------------------------------------------------------>
    <div class="container-fluid px-0">
        <img src="assets/img/IMG_9010.jpg" class="d-block w-100" style="aspect-ratio:16/6;" alt="">
    </div>
    <div class="carousel-caption">
        <h2 class="section-titlex">Contact Us</h2>
    </div>

    <!------------------------------------------------------------------ Content ------------------------------------------------------------------>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <form action="POST">
                        <div class="form-group mt-5">
                            <label for="name">Your name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Your email</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Subject</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Subject</label>
                            <textarea cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <input type="submit" value="Submit" class="btn text-white my-3" style="background-color: green;">
                    </form>
                </div>
                <div class="col-6">
                    <div class="container">
                        <div class="row mt-5">
                            <h4 class="section-title">Get In Touch</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat asperiores architecto quae labore. Omnis ad animi velit harum sequi impedit esse dolores obcaecati enim? Unde nulla quisquam totam repudiandae sit.</p>
                            <br><br>

                            <h4 class="section-title">Contact Details</h4>
                            <p>Luxurious Hotel Resort & Spa, 1234 Street Name, Koh Samui- Surat Thani, Thailand</p>
                            <hr>
                            <p>+66 12345 67890</p>
                            <hr>
                            <p>abcd@website.com</p>
                            <br><br>

                            <h4 class="section-title">Follow Us</h4>
                            <div class="d-flex" style="font-size: 25px;">
                                <a class="text-black" href="#"><i class="fa-brands fa-facebook"></i></a>
                                <a class="text-black" href="#"><i class="fa-brands fa-instagram mx-2"></i></a>
                                <a class="text-black" href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a class="text-black" href="#"><i class="fa-brands fa-youtube mx-2"></i></a>
                                <a class="text-black" href="#"><i class="fa-brands fa-line""></i></a>
                            </div>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!------------------------------------------------------------------ Map ------------------------------------------------------------------>
    <div class=" map-container mt-5">
                                        <div class="map-embed">
                                            <iframe frameborder="0" style="width: 100%; aspect-ratio: 16/5;" < src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3874.2374735432036!2d100.5165155!3d13.824774000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29b9d112039eb%3A0x67739979b71d1f5a!2zMzE4Lzgg4LiL4Lit4LiiIOC4p-C4h-C4qOC5jOC4quC4p-C5iOC4suC4hyAxMSDguKfguIfguKjguYzguKrguKfguYjguLLguIcg4LmA4LiC4LiV4Lia4Liy4LiH4LiL4Li34LmI4LitIOC4geC4o-C4uOC4h-C5gOC4l-C4nuC4oeC4q-C4suC4meC4hOC4oyAxMDgwMA!5e0!3m2!1sth!2sth!4v1724836050483!5m2!1sth!2sth" allowfullscreen></iframe>
                                        </div>
                            </div>
</body>

</html>

<?php
require 'footer.php';
?>