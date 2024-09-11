<?php
session_start();
require_once "../connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Electricity</title>
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
                        <h3 class="fw-bold mb-3">View Electricity</h3>
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
                                <a href="#.php">View Electricity</a>
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
                                            <div class="card-title">Electricity List</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12">
                                                    <?php
                                                    // Fetch all customers
                                                    $stmt = $conn->prepare("SELECT * FROM tb_electricity");
                                                    $stmt->execute();
                                                    $customers = $stmt->fetchAll();

                                                    if ($customers) {
                                                    ?>
                                                    <table class="table table-bordered table-striped">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>Electric ID</th>
                                                                <th>หมายเลขห้อง</th>
                                                                <th>เดือน/ปี</th>
                                                                <th>หน่วยที่ใช้ไป</th>
                                                                <th>ราคา/หน่วย</th>
                                                                <th>ราคารวม</th>
                                                                <th>รายละเอียด</th>
                                                                <th>ลบ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($customers as $customer): ?>
                                                            <tr>
                                                                <td><?= $customer['electricity_id'] ?? '-' ?></td>
                                                                <td><?= $customer['room_id'] ?? '-' ?></td>
                                                                <td><?= $customer['month_year'] ?? '-' ?></td>
                                                                <td><?= $customer['unit_used'] ?? '-' ?></td>
                                                                <td><?= $customer['unit_price'] ?? '-' ?></td>
                                                                <td>
                                                                    <?= $customer['total_price'] ?? '-' ?>
                                                                </td>

                                                                <td class="d-flex">
                                                                    <a href="#.php?id=<?= $customer['electricity_id'] ?>"
                                                                        class="btn btn-warning btn-sm">ดูรายละเอียด</a>
                                                                </td>
                                                                <td>
                                                                    <a href="#.php?id=<?= $customer['electricity_id'] ?>&action=delete"
                                                                        class="btn btn-danger btn-sm"
                                                                        onclick="return confirm('ต้องการลบ Water หมายเลข <?= $customer['electricity_id'] ?> หรือไม่?')">ลบ</a>
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