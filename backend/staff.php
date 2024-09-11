<?php
session_start();
require_once "../connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Staff</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />

    <link href="assets/css/profile.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include "side.php"; ?>
        <div class="main-panel">
            <?php include "nav.php"; ?>
            <div class="container">
                <div class="page-inner">
                    <div class="page-header mb-0">
                        <h3 class="fw-bold mb-3">View Staff</h3>
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
                                <a href="#.php">View Staff</a>
                            </li>
                        </ul>
                    </div>
                    <div class="page-category">Help users find your address.</div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-header">
                                            <div class="card-title">Staff List</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12">
                                                    <?php
                                                    // Fetch all customers
                                                    $stmt = $conn->prepare("SELECT * FROM tb_staff");
                                                    $stmt->execute();
                                                    $customers = $stmt->fetchAll();

                                                    if ($customers) {
                                                    ?>
                                                    <table class="table table-bordered table-striped">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>เลขประจำตัวประชาชน</th>
                                                                <th>คำนำหน้าชื่อ</th>
                                                                <th>ชื่อ</th>
                                                                <th>นามสกุล</th>
                                                                <th>อีเมลล์</th>
                                                                <th>ที่อยู่</th>
                                                                <th>เบอร์โทร</th>
                                                                <th>ชื่อผู้ใช้</th>
                                                                <th>รูป</th>
                                                                <th>สถานะผู้ใช้</th>
                                                                <th>วันที่สมัคร</th>
                                                                <th>แก้ไข</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($customers as $customer): ?>
                                                            <tr>
                                                                <td><?= $customer['citizen_id'] ?? '-' ?></td>
                                                                <td><?= $customer['title'] ?? '-' ?></td>
                                                                <td><?= $customer['first_name'] ?? '-' ?></td>
                                                                <td><?= $customer['last_name'] ?? '-' ?></td>
                                                                <td><?= $customer['email'] ?? '-' ?></td>
                                                                <td><?= $customer['address'] ?? '-' ?></td>
                                                                <td><?= $customer['phone_number'] ?? '-' ?></td>
                                                                <td><?= $customer['username'] ?? '-' ?></td>
                                                                <td><img src="assets/img_profile/<?= $customer['img_profile'] ?>"
                                                                        alt="" style="width:40px; height:40px"></td>
                                                                <td>
                                                                    <?php
            // แสดงสถานะตามค่า status
            if ($customer['status'] === 0) {
                echo "Admin";
            } elseif ($customer['status'] === 1) {
                echo "Staff";
            } else {
                echo "-";
            }
            ?>
                                                                </td>

                                                                <td><?= $customer['date_joined'] ?? '-' ?></td>

                                                                <td class="d-flex">
                                                                    <a href="#.php?id=<?= $customer['staff_id'] ?>"
                                                                        class="btn btn-warning btn-sm me-1"
                                                                        onclick="return confirm('ต้องการแก้ไขไอดี <?= $customer['staff_id'] ?> หรือไม่?')">แก้ไข</a>
                                                                    <a href="#.php?id=<?= $customer['staff_id'] ?>&action=delete"
                                                                        class="btn btn-danger btn-sm"
                                                                        onclick="return confirm('ต้องการลบไอดี <?= $customer['staff_id'] ?> หรือไม่?')">ลบ</a>
                                                                </td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>


                                                    </table>

                                                    <?php
                                                    } else {
                                                        echo "<p>No customers found.</p>";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                document.getElementById('phone_number').addEventListener('input', function(e) {
                    if (e.target.value.length > 10) {
                        e.target.value = e.target.value.slice(0, 10);
                    }
                });
                </script>

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
</body>

</html>
<?php include "footer.php" ?>