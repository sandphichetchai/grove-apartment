<?php
require '../connect.php';
require 'top-nav.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="assets/css/setting.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/blog.css">
</head>

<style>
    .section-titlex {
        font-size: 24px;
        font-weight: 700;
        text-align: center;
        margin-bottom: 30px;
        flex-grow: 0;
        position: relative;
    }

    .section-titlex::after {
        content: "";
        width: 60px;
        height: 3px;
        background-color: #446c1c;
        position: absolute;
        left: 50%;
        bottom: -30px;
        transform: translateX(-50%);
    }

    /* .container {
        max-width: 50%;
    } */

    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: Arial, sans-serif;
    }

    .pagination span {
        margin-right: 10px;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        border: 1px solid #ddd;
        margin: 0 4px;
        border-radius: 4px;
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
    }

    .pagination a.active {
        background-color: #446c1c;
        color: white;
        border: 1px solid #446c1c;
    }

    .page-item.active .page-link {
        background-color: #446c1c;
        border-color: #446c1c;
        color: white;
    }

    .page-item.disabled .page-link {
        background-color: transparent;
        border: none;
        color: black;
    }
</style>

<body>
    <!------------------------------------------------------------------ Banner ------------------------------------------------------------------>
    <div class="container-fluid px-0">
        <img src="assets/img/IMG_9010.jpg" class="d-block w-100" style="aspect-ratio:16/6;" alt="">
    </div>
    <div class="carousel-caption">
        <h2 class="section-titlex">Groove Apartment</h2>
    </div>

    <!------------------------------------------------------------------ Filter ------------------------------------------------------------------>
    <div class="container d-flex pt-5 pb-2">
        <p>Filter by:</p> &nbsp; | &nbsp;
        <a href="#" class="text-decoration-none text-black">All</a> &nbsp; | &nbsp;
        <a href="#" class="text-decoration-none text-black">Rooms</a> &nbsp; | &nbsp;
        <a href="#" class="text-decoration-none text-black">???</a> &nbsp;

        <div class="ms-auto">
            <select class="form-select" aria-label="Default select example">
                <option selected>Defaul Sorting</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
    </div>

    <!------------------------------------------------------------------ Content ------------------------------------------------------------------>
    <div class="container-fluid">
        <div class="container">
            <div class="row my-4">
                <div class="col-6 mb-4 d-flex justify-content-center">
                    <div class="card" style="width: 100%; height:auto">
                        <img src="assets/img/front.jpeg" class="card-img-top" style="aspect-ratio:15/8;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-start">Room 1</h5>
                            <hr>
                            <p class="card-text text-start">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn float-start text-white" style="background-color: #446c1c;">500 บาท / คืน</a>
                            <a href="#" class="text-decoration-none text-black float-end pt-2">View Room ></a>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4 d-flex justify-content-center">
                    <div class="card" style="width: 100%; height:auto">
                        <img src="assets/img/p1.jpg" class="card-img-top" style="aspect-ratio:15/8;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-start">Room 2</h5>
                            <hr>
                            <p class="card-text text-start">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn float-start text-white" style="background-color: #446c1c;">500 บาท / คืน</a>
                            <a href="#" class="text-decoration-none text-black float-end pt-2">View Room ></a>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4 d-flex justify-content-center">
                    <div class="card" style="width: 100%; height:auto">
                        <img src="assets/img/p2.jpg" class="card-img-top" style="aspect-ratio:15/8;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-start">Room 3</h5>
                            <hr>
                            <p class="card-text text-start">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn float-start text-white" style="background-color: #446c1c;">500 บาท / คืน</a>
                            <a href="#" class="text-decoration-none text-black float-end pt-2">View Room ></a>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4 d-flex justify-content-center">
                    <div class="card" style="width: 100%; height:auto">
                        <img src="assets/img/p3.jpg" class="card-img-top" style="aspect-ratio:15/8;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-start">Room 4</h5>
                            <hr>
                            <p class="card-text text-start">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn float-start text-white" style="background-color: #446c1c;">500 บาท / คืน</a>
                            <a href="#" class="text-decoration-none text-black float-end pt-2">View Room ></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------------------------------------------------------------------ Pagination ------------------------------------------------------------------>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Page 1 of 3</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

</body>

</html>

<?php
require 'footer.php';
?>