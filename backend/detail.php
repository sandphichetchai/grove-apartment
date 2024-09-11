<?php
session_start();
require_once "../connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>รายละเอียด</title>
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
                        <h3 class="fw-bold mb-3">View Room</h3>
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
                                <a href="#.php">View Room</a>
                            </li>
                        </ul>
                    </div>
                    <div class="page-category">Help users find your address.</div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-header d-flex">
                                            <div class="card-title">Room List</div>
                                            <div class="ms-auto"><button class="btn btn-success" type="submit"
                                                    name="insertroom">เพิ่มห้อง</button></div>
                                        </div>
                                        <div class=" card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12">
                                                    <?php
                                                    // Fetch all customers
                                                    $stmt = $conn->prepare("SELECT * FROM tb_room");
                                                    $stmt->execute();
                                                    $customers = $stmt->fetchAll();

                                                    if ($customers) {
                                                    ?>
                                                    <table class="table table-bordered table-striped">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>Room ID</th>
                                                                <th>หมายเลขห้อง</th>
                                                                <th>รายละเอียดห้อง</th>
                                                                <th>ขนาดห้อง</th>
                                                                <th>จำนวนคนต่อห้อง</th>
                                                                <th>ราคา Fullboard</th>
                                                                <th>ราคา Halfboard</th>
                                                                <th>สถานะ</th>
                                                                <th>รายละเอียด</th>
                                                                <th>ลบ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($customers as $customer): ?>
                                                            <tr>
                                                                <td><?= $customer['room_id'] ?? '-' ?></td>
                                                                <td><?= $customer['room_number'] ?? '-' ?></td>
                                                                <td><?= $customer['room_detail'] ?? '-' ?></td>
                                                                <td><?= $customer['room_size'] ?? '-' ?></td>
                                                                <td><?= $customer['room_capacity'] ?? '-' ?>
                                                                </td>
                                                                <td><?= $customer['fullboard_price'] ?? '-' ?>
                                                                </td>
                                                                <td><?= $customer['halfboard_price'] ?? '-' ?>
                                                                </td>
                                                                <td>
                                                                    <?php
            // แสดงสถานะตามค่า rental_status
            if ($customer['rental_status'] == "0") {
                echo "ไม่ว่าง";
            } elseif ($customer['rental_status'] == "1") {
                echo "ว่าง";
            } else {
                echo "-";
            }
            ?>
                                                                </td>
                                                                <td class="d-flex">
                                                                    <a href="#.php?id=<?= $customer['room_id'] ?>"
                                                                        class="btn btn-warning btn-sm">ดูรายละเอียด</a>
                                                                </td>
                                                                <td>
                                                                    <a href="#.php?id=<?= $customer['room_id'] ?>&action=delete"
                                                                        class="btn btn-danger btn-sm"
                                                                        onclick="return confirm('ต้องการลบห้องหมายเลข <?= $customer['room_number'] ?> หรือไม่?')">ลบ</a>
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
                </script>
</body>

</html>
<?php include "footer.php" ?>