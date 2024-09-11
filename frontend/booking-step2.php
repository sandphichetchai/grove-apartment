<?php
include '../connect.php';
include 'top-nav.php';

$checkIn = isset($_POST['checkIn']) ? $_POST['checkIn'] : 'none';
$checkOut = isset($_POST['checkOut']) ? $_POST['checkOut'] : 'none';
$adult = isset($_POST['adult']) ? $_POST['adult'] : 'none';
$child = isset($_POST['child']) ? $_POST['child'] : 'none';

// Perform database query after redirection logic
$stmt = $conn->prepare("SELECT * FROM tb_room WHERE room_capacity >= :guest");
$stmt->bindParam(':guest', $guest, PDO::PARAM_INT);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking Step 2</title>
    <link rel="stylesheet" href="assets/css/setting.css">
    <link rel="stylesheet" href="assets/css/booking.css">

    <style>
    .form-control,
    .form-select {
        border-radius: 0 !important;
    }

    input.form-control,
    .form-select {
        height: 40px;
    }

    .right-side #roomSelect hr:last-child {
        display: none !important;
    }
    </style>
</head>

<body>

    <main class="container-fluid d-flex" style="padding-inline: 10%;">

        <section class="left-side container" style="flex: 1 1 65%;">

            <div class="container mt-5">
                <div class="step-indicator d-flex justify-content-around">
                    <div class="step">
                        <a href="booking-step1.php">
                            <div class="circle" id="step-one">1</div>
                        </a>
                        <div class="label">Rooms</div>
                    </div>
                    <div class="step completed">
                        <a href="#">
                            <div class="circle active" id="step-two">2</div>
                        </a>
                        <div class="label">Payment</div>
                    </div>
                    <div class="step">
                        <a href="#">
                            <div class="circle" id="step-three">3</div>
                        </a>
                        <div class="label">Complete</div>
                    </div>
                </div>
            </div>

            <div class="container menu-overlay d-flex justify-content-center px-0">
                <form method="get" class="booking-group shadow w-100 d-flex flex-row bg-white mt-5" role="group"
                    id="roomFilterForm">

                    <div class="booking-check d-flex justify-content-center align-items-center ps-4"
                        style="flex: 1 1 80%;">
                        <input type="text" class="form-control" id="inputCodeBtn" placeholder="ใช้โค้ดที่นี่">
                    </div>

                    <div class="booking-check d-flex justify-content-center align-items-center" style="flex: 1 1 20%;">
                        <button type="submit" class="btn btn-sm" id="useCodeBtn"
                            style="width: 100px; height: 40px; background-color: var(--green);"
                            name="useCode">ใช้คูปอง</button>
                    </div>
                </form>
            </div>

            <div id="orderForm" class="container mt-5 px-0">
                <form class="row g-3">
                    <div class="col-md-6">
                        <label for="inputFname" class="form-label">ชื่อจริง *</label>
                        <input type="text" class="form-control" id="inputFname">
                    </div>
                    <div class="col-md-6">
                        <label for="inputLname" class="form-label">นามสกุล *</label>
                        <input type="text" class="form-control" id="inputLname">
                    </div>

                    <div class="col-md-12">
                        <label for="inputCompany" class="form-label">บริษัท (ถ้ามี)</label>
                        <input type="text" class="form-control" id="inputCompany" placeholder="ABC (Thailand) Co., Ltd">
                    </div>

                    <div class="col-md-6">
                        <label for="inputState" class="form-label">ประเทศ *</label>
                        <input type="text" class="form-control" id="inputState">
                    </div>
                    <div class="col-md-6">
                        <label for="inputProvince" class="form-label">จังหวัด *</label>
                        <input type="text" class="form-control" id="inputProvince">
                    </div>

                    <div class="col-md-6">
                        <label for="inputDistrict" class="form-label">เขต / อำเภอ *</label>
                        <input type="text" class="form-control" id="inputDistrict">
                    </div>
                    <div class="col-md-6">
                        <label for="inputSubDistrict" class="form-label">แขวง / ตำบล *</label>
                        <input type="text" class="form-control" id="inputSubDistrict">
                    </div>

                    <div class="col-md-12">
                        <label for="inputAddress" class="form-label">ที่อยู่ *</label>
                        <input type="text" class="form-control" id="inputAddress"
                            placeholder="10/125 ซอย 5 หมู่บ้านสุขใจ 2">
                    </div>

                    <div class="col-md-6">
                        <label for="inputZip" class="form-label">รหัสไปรษณีย์ *</label>
                        <input type="text" class="form-control" id="inputZip" placeholder="12400">
                    </div>

                    <div class="col-md-6">
                        <label for="inputTel" class="form-label">
                            โทรศัพท์ *</label>
                        <input type="text" class="form-control" id="inputTel">
                    </div>
                    <div class="col-md-12">
                        <label for="inputEmail" class="form-label">
                            อีเมล *</label>
                        <input type="text" class="form-control" id="inputEmail" placeholder="info@gmail.com">
                    </div>

                    <div class="col-md-12">
                        <label for="moreText" class="form-label">
                            บันทึกเพิ่มเติม (ถ้ามี)</label>
                        <textarea type="text" class="form-control" id="inputTextArea" rows="5"></textarea>
                    </div>

                    <div class="col-md-12">
                        <p class="w-100 py-2 px-2 mt-3 border border-dark">** ชำระเงินโดยการโอนเงินเข้าบัญชีธนาคาร
                            โดยหลังการชำระเงิน กรุณาส่งหลักฐานยืนยันพร้อมเลขที่ใบสั่งซื้อ เพื่อดำเนินการส่งของต่อไป **
                        </p>
                    </div>

                    <hr>

                    <div class="col-md-12 mt-1">
                        <p class="w-100">Your personal data will be used to process your order, support your experience
                            throughout this website, and for other purposes described in our นโยบายความเป็นส่วนตัว.</p>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary"
                            style="width: 100px; height: 40px;">สั่งซื้อ</button>
                    </div>
                </form>
            </div>
        </section>

        <section class="right-side container" style="flex: 1 1 35%;">

            <div class="card shadow h-auto mb-4">
                <form method="post" action="booking-step3.php">
                    <div class="card-header">
                        <h5 class="card-title">Your Stay</h5>
                    </div>

                    <div class="card-body">
                        <div id="guestDefault">
                            <p class="card-text">Dates: <?php echo $checkIn . " - " . $checkOut ?></p>
                            <p class="card-text">Guests: <?php echo $adult . " Adult , " . $child . " Child" ?></p>
                            <input type="hidden" name="checkIn" value="<?php echo $checkIn; ?>">
                            <input type="hidden" name="checkOut" value="<?php echo $checkOut; ?>">
                            <input type="hidden" name="adult" value="<?php echo $adult; ?>">
                            <input type="hidden" name="child" value="<?php echo $child; ?>">
                        </div>
                        <div id="roomSelect">

                            <?php 
                            if (isset($_POST['rooms']) && !empty($_POST['rooms'])) {
                                $rooms = isset($_POST['rooms']) ? $_POST['rooms'] : [];
                                $total = isset($_POST['totalPrice']) ? $_POST['totalPrice'] : '฿ 0';

                                foreach ($rooms as $index => $room) {
                                    $checkIn = isset($room['checkIn']) && !empty($room['checkIn']) ? htmlspecialchars($room['checkIn']) : 'none';
                                    $checkOut = isset($room['checkOut']) && !empty($room['checkOut']) ? htmlspecialchars($room['checkOut']) : 'none';
                                    $adult = isset($room['adult']) && !empty($room['adult']) ? htmlspecialchars($room['adult']) : 'none';
                                    $child = isset($room['child']) && !empty($room['child']) ? htmlspecialchars($room['child']) : 'none';
                                    $roomId = isset($room['roomId']) && !empty($room['roomId']) ? htmlspecialchars($room['roomId']) : 'none';
                                    $roomNumber = isset($room['roomNumber']) && !empty($room['roomNumber']) ? htmlspecialchars($room['roomNumber']) : 'none';
                                    $roomSize = isset($room['roomSize']) && !empty($room['roomSize']) ? htmlspecialchars($room['roomSize']) : 'none';
                                    $roomCapacity = isset($room['roomCapacity']) && !empty($room['roomCapacity']) ? htmlspecialchars($room['roomCapacity']) : 'none';
                                    $boardType = isset($room['boardType']) && !empty($room['boardType']) ? htmlspecialchars($room['boardType']) : 'none';
                                    $price = isset($room['price']) && !empty($room['price']) ? htmlspecialchars($room['price']) : 'none';
                            ?>

                            <div class="card w-100" id="roomCard<?php echo $index; ?>">

                                <p class="card-text">Dates: <?php echo $checkIn . " - " . $checkOut ?></p>
                                <p class="card-text">Guests: <?php echo $adult . " Adult , " . $child . " Child" ?></p>
                                <p class="card-text">Room ID: <?php echo $roomId; ?></p>
                                <p class="card-text">Room Number: <?php echo $roomNumber; ?></p>
                                <p class="card-text">Size: <?php echo $roomSize; ?> sqm</p>
                                <p class="card-text">Capacity: <?php echo $roomCapacity; ?> Adults</p>
                                <p class="card-text">Board Type: <?php echo $boardType; ?></p>
                                <p class="card-text">Price: ฿ <?php echo $price; ?></p>

                                <button type="button" class="btn btn-danger btn-sm w-100 mb-4 remove-room-btn"
                                    style="height: 40px;" data-index="<?php echo $index; ?>">Remove</button>
                            </div>

                            <div id="roomInputs">
                                <input type="hidden" name="rooms[<?php echo $index; ?>][checkIn]"
                                    value="<?php echo $checkIn; ?>">
                                <input type="hidden" name="rooms[<?php echo $index; ?>][checkOut]"
                                    value="<?php echo $checkOut; ?>">
                                <input type="hidden" name="rooms[<?php echo $index; ?>][adult]"
                                    value="<?php echo $adult; ?>">
                                <input type="hidden" name="rooms[<?php echo $index; ?>][child]"
                                    value="<?php echo $child; ?>">
                                <input type="hidden" name="rooms[<?php echo $index; ?>][roomId]"
                                    value="<?php echo $roomId; ?>">
                                <input type="hidden" name="rooms[<?php echo $index; ?>][roomNumber]"
                                    value="<?php echo $roomNumber; ?>">
                                <input type="hidden" name="rooms[<?php echo $index; ?>][roomSize]"
                                    value="<?php echo $roomSize; ?>">
                                <input type="hidden" name="rooms[<?php echo $index; ?>][roomCapacity]"
                                    value="<?php echo $roomCapacity; ?>">
                                <input type="hidden" name="rooms[<?php echo $index; ?>][boardType]"
                                    value="<?php echo $boardType; ?>">
                                <input type="hidden" name="rooms[<?php echo $index; ?>][price]"
                                    value="<?php echo $price; ?>" class="room-price">
                            </div>

                            <?php 
                                }
                            } else {
                                echo '<p>No rooms selected.</p>';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="card-footer px-3 py-3">
                        <div class="footer-total d-flex justify-content-between mt-3 mb-3">
                            <h5 class="card-title">Total</h5>
                            <input type="text" class="card-title"
                                style="font-size: 18px; text-align: right; background: transparent" id="totalPrice"
                                name="totalPrice" value="<?php echo $total ?>" readonly>
                        </div>
                        <div class="footer-nextstep d-flex gap-2">
                            <input type="submit" class="btn w-50" id="prev-step-btn" name="prevStep" value="Back"
                                style="color: var(--green); background-color: #fff; border: 2px var(--green) solid !important">
                            <input type="submit" class="btn w-50" id="next-step-btn" name="nextStep" value="Next"
                                style="color: #fff; background-color: var(--green);">
                        </div>
                    </div>
                </form>
            </div>

            <div class="card shadow h-auto mb-4">
                <div class="card-header">
                    <h5 class="card-title">Need Assistance?</h5>
                </div>

                <div class="card-body">
                    <p class="card-text">Our dedicated reservations team is ready to help you around the clock.</p>
                    <p class="card-text">
                        <i class="fa-solid fa-location-dot" style="font-size: 21px;"></i>
                        <span>318/8 Wongsawang11, Wongsawang, Bangsue, Bangkok, Thailand</span>
                    </p>

                    <p class="card-text">
                        <i class="fa-solid fa-phone"></i>
                        <span>062-373-8955</span>
                    </p>

                    <p class="card-text">
                        <i class="fa-solid fa-envelope"></i>
                        <span>info@gmail.com</span>
                    </p>
                </div>
            </div>
        </section>
    </main>

    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const removeButtons = document.querySelectorAll(".remove-room-btn");
        const totalPriceField = document.getElementById("totalPrice");
        const guestDefault = document.getElementById("guestDefault");
        const roomSelect = document.getElementById("roomSelect");

        // Function to update the total price
        function updateTotalPrice() {
            let total = 0;
            document.querySelectorAll(".room-price").forEach(roomPriceField => {
                total += parseFloat(roomPriceField.value);
            });
            totalPriceField.value = `฿ ${total.toFixed(0)}`;
        }

        // Function to check if there are any room cards left
        function updateGuestDefaultVisibility() {
            const roomCards = roomSelect.querySelectorAll(".card");
            if (roomCards.length > 0) {
                guestDefault.style.display = "none";
            } else {
                guestDefault.style.display = "block";
            }
        }

        // Attach event listeners to remove buttons
        removeButtons.forEach((button) => {
            button.addEventListener("click", (e) => {
                const roomIndex = e.target.dataset.index;
                const roomCard = document.getElementById(`roomCard${roomIndex}`);

                // SweetAlert confirmation
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (roomCard) {
                            roomCard.remove();
                        }

                        // Remove inputs related to the room
                        const roomInputs = document.querySelectorAll(
                            `input[name^="rooms[${roomIndex}]"]`);
                        roomInputs.forEach(input => input.remove());

                        // Update total price after room is removed
                        updateTotalPrice();

                        // Update guestDefault visibility
                        updateGuestDefaultVisibility();

                        // Show SweetAlert for successful removal
                        Swal.fire('Deleted!', 'The room has been removed.', 'success');
                    }
                });
            });
        });

        // Initial call to check visibility on page load
        updateGuestDefaultVisibility();
        // Update the total price on page load
        updateTotalPrice();
    });
    </script>

</body>

<?php include 'footer.php'; ?>

</html>