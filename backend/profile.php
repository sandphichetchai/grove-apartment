<?php
session_start();
require_once "../connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Google Maps - Kaiadmin Bootstrap 5 Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />

    <link href="assets/css/profile.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php
        include "side.php";
        ?>
        <div class="main-panel">
            <?php
            include "nav.php";
            ?>
            <div class="container">
                <div class="page-inner">
                    <div class="page-header mb-0">
                        <h3 class="fw-bold mb-3">View Profile</h3>
                        <ul class="breadcrumbs mb-3">
                            <li class="nav-home">
                                <a href="index.php">
                                    <i class="icon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="profile.php">View Profile</a>
                            </li>
                            <!-- <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li> -->
                            <!-- <li class="nav-item">
                                <a href="#">Google Maps</a>
                            </li> -->
                        </ul>
                    </div>
                    <div class="page-category">Help users find your address.</div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-header">
                                            <div class="card-title">Edit Profile</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 col-lg-4">
                                                    <form method="POST" action="edit/edit_profile.php" enctype="multipart/form-data">
                                                        <?php
                                                        if (isset($_GET['id'])) {
                                                            $id = $_GET['id'];
                                                            $stmt = $conn->prepare("SELECT * FROM tb_staff WHERE staff_id = ?");
                                                            $stmt->execute([$id]);
                                                            $data = $stmt->fetch();

                                                            if ($data) {
                                                                $title = $data['title'];
                                                                $citizen_id = $data['citizen_id'];
                                                                $first_name = $data['first_name'];
                                                                $last_name = $data['last_name'];
                                                                $phone_number = $data['phone_number'];
                                                                $salary = $data['salary'];
                                                                $address = $data['address'];
                                                                $email = $data['email'];
                                                            } else {
                                                                $title = "ไม่มี";
                                                            }
                                                        } else {
                                                            $title = "ไม่มี";
                                                            $title = "ไม่มี";
                                                            $citizen_id = "ไม่มี";
                                                            $first_name = "ไม่มี";
                                                            $last_name = "ไม่มี";
                                                            $phone_number = "ไม่มี";
                                                            $salary = "ไม่มี";
                                                            $address = "ไม่มี";
                                                            $email = "ไม่มี";
                                                        }
                                                        ?>
                                                        <div class="form-group">
                                                            <label for="title">Title</label>
                                                            <input type="text" hidden value="<?= $data['staff_id']; ?>" required class="form-control" name="staff_id">
                                                            <input type="text" value="<?php echo htmlspecialchars($title); ?>" name="title" class="form-control" id="title" placeholder="Enter title" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email2">Firstname</label>
                                                            <input type="text" value="<?php echo htmlspecialchars($first_name); ?>" name="first_name" class="form-control" id="first_name" placeholder="Enter firstname" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="lastname">Lastname</label>
                                                            <input type="text" value="<?php echo htmlspecialchars($last_name); ?>" name="last_name" class="form-control" id="last_name" placeholder="Enter lastname" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="citizen">Citizen</label>
                                                            <input type="number" value="<?php echo htmlspecialchars($citizen_id); ?>" name="citizen_id" class="form-control" id="citizen" placeholder="Enter citizen" />
                                                        </div>
                                                </div>
                                                <div class="col-md-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label for="phone_number">Phone Number</label>
                                                        <input type="number" value="<?php echo htmlspecialchars($phone_number); ?>" name="phone_number" class="form-control" id="phone_number" placeholder="Enter Phone Number" maxlength="10" pattern="\d{10}" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="salary">Salary</label>
                                                        <input type="text" value="<?php echo htmlspecialchars($salary); ?>" name="salary" class="form-control" id="salary" placeholder="Enter salary" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="text" value="<?php echo htmlspecialchars($address); ?>" name="address" class="form-control" id="address" placeholder="Enter Address" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email2">Email Address</label>
                                                        <input type="email" value="<?php echo htmlspecialchars($email); ?>" name="email" class="form-control" id="email2" placeholder="Enter Email" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label for="img_profile">Image</label>
                                                        <input type="file" id="imgInput" name="img_profile" class="form-control" name="img_profile" />
                                                        <img class="img-fluid" src="../backend/assets/img_profile/<?php echo $data['img_profile']; ?>" id="previewImg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-action">
                                                <button type="submit" name="update" class="btn btn-success">Submit</button>
                                                <a href="../../grove-apartment/backend/index.php" class="btn btn-danger">Cancel</a>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="footer">
                    <div class="container-fluid d-flex justify-content-between">
                        <nav class="pull-left">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="http://www.themekita.com"> ThemeKita</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"> Help </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"> Licenses </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="copyright">
                            2024, made with <i class="fa fa-heart heart text-danger"></i> by
                            <a href="http://www.themekita.com">ThemeKita</a>
                        </div>
                        <div>
                            Distributed by
                            <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
                        </div>
                    </div>
                </footer>
            </div>

            <!-- Custom template | don't include it in your project! -->
            <div class="custom-template">
                <div class="title">Settings</div>
                <div class="custom-content">
                    <div class="switcher">
                        <div class="switch-block">
                            <h4>Logo Header</h4>
                            <div class="btnSwitch">
                                <button type="button" class="selected changeLogoHeaderColor" data-color="dark"></button><button
                                    type="button"
                                    class="selected changeLogoHeaderColor"
                                    data-color="blue"></button>
                                <button
                                    type="button"
                                    class="changeLogoHeaderColor"
                                    data-color="purple"></button>
                                <button
                                    type="button"
                                    class="changeLogoHeaderColor"
                                    data-color="light-blue"></button>
                                <button
                                    type="button"
                                    class="changeLogoHeaderColor"
                                    data-color="green"></button>
                                <button
                                    type="button"
                                    class="changeLogoHeaderColor"
                                    data-color="orange"></button>
                                <button
                                    type="button"
                                    class="changeLogoHeaderColor"
                                    data-color="red"></button>
                                <button
                                    type="button"
                                    class="changeLogoHeaderColor"
                                    data-color="white"></button>
                                <br />
                                <button
                                    type="button"
                                    class="changeLogoHeaderColor"
                                    data-color="dark2"></button>
                                <button
                                    type="button"
                                    class="changeLogoHeaderColor"
                                    data-color="blue2"></button>
                                <button
                                    type="button"
                                    class="changeLogoHeaderColor"
                                    data-color="purple2"></button>
                                <button
                                    type="button"
                                    class="changeLogoHeaderColor"
                                    data-color="light-blue2"></button>
                                <button
                                    type="button"
                                    class="changeLogoHeaderColor"
                                    data-color="green2"></button>
                                <button
                                    type="button"
                                    class="changeLogoHeaderColor"
                                    data-color="orange2"></button>
                                <button
                                    type="button"
                                    class="changeLogoHeaderColor"
                                    data-color="red2"></button>
                            </div>
                        </div>
                        <div class="switch-block">
                            <h4>Navbar Header</h4>
                            <div class="btnSwitch">
                                <button
                                    type="button"
                                    class="changeTopBarColor"
                                    data-color="dark"></button>
                                <button
                                    type="button"
                                    class="changeTopBarColor"
                                    data-color="blue"></button>
                                <button
                                    type="button"
                                    class="changeTopBarColor"
                                    data-color="purple"></button>
                                <button
                                    type="button"
                                    class="changeTopBarColor"
                                    data-color="light-blue"></button>
                                <button
                                    type="button"
                                    class="changeTopBarColor"
                                    data-color="green"></button>
                                <button
                                    type="button"
                                    class="changeTopBarColor"
                                    data-color="orange"></button>
                                <button
                                    type="button"
                                    class="changeTopBarColor"
                                    data-color="red"></button>
                                <button
                                    type="button"
                                    class="changeTopBarColor"
                                    data-color="white"></button>
                                <br />
                                <button
                                    type="button"
                                    class="changeTopBarColor"
                                    data-color="dark2"></button>
                                <button
                                    type="button"
                                    class="selected changeTopBarColor"
                                    data-color="blue2"></button>
                                <button
                                    type="button"
                                    class="changeTopBarColor"
                                    data-color="purple2"></button>
                                <button
                                    type="button"
                                    class="changeTopBarColor"
                                    data-color="light-blue2"></button>
                                <button
                                    type="button"
                                    class="changeTopBarColor"
                                    data-color="green2"></button>
                                <button
                                    type="button"
                                    class="changeTopBarColor"
                                    data-color="orange2"></button>
                                <button
                                    type="button"
                                    class="changeTopBarColor"
                                    data-color="red2"></button>
                            </div>
                        </div>
                        <div class="switch-block">
                            <h4>Sidebar</h4>
                            <div class="btnSwitch">
                                <button
                                    type="button"
                                    class="selected changeSideBarColor"
                                    data-color="white"></button>
                                <button
                                    type="button"
                                    class="changeSideBarColor"
                                    data-color="dark"></button>
                                <button
                                    type="button"
                                    class="changeSideBarColor"
                                    data-color="dark2"></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="custom-toggle">
                    <i class="icon-settings"></i>
                </div>
            </div>
        </div>
        <!-- กำหนดให้ใส่เบอร์โทรสํพท์ได้แค่ 10 ตัว -->
        <script>
            document.getElementById('phone_number').addEventListener('input', function(e) {
                if (e.target.value.length > 10) {
                    e.target.value = e.target.value.slice(0, 10);
                }
            });
        </script>

        <!-- profile -->
        <script>
            let imgInput = document.getElementById('imgInput');
            let previewImg = document.getElementById('previewImg');

            imgInput.onchange = evt => {
                const [file] = imgInput.files;
                if (file) {
                    previewImg.src = URL.createObjectURL(file)
                }
            }
        </script>

        <footer>
            <?php include "footer.php" ?>
        </footer>
</body>

</html>