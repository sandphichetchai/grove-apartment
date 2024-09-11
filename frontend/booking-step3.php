<?php
include '../connect.php';
include 'top-nav.php';

// Initialize variables
$checkIn = isset($_POST['checkIn']) ? $_POST['checkIn'] : 'none';
$checkOut = isset($_POST['checkOut']) ? $_POST['checkOut'] : 'none';
$adult = isset($_POST['adult']) ? $_POST['adult'] : 'none';
$child = isset($_POST['child']) ? $_POST['child'] : 'none';

$guest = isset($_GET['guest-count']) ? $_GET['guest-count'] : 'none';
$total = isset($_GET['total']) ? $_GET['total'] : 'none';

$roomNumber = isset($_GET['roomNumber']) ? $_GET['roomNumber'] : 00;
$roomSize = isset($_GET['roomSize']) ? $_GET['roomSize'] : 00;
$roomCapacity = isset($_GET['roomCapacity']) ? $_GET['roomCapacity'] : 00;
$roomBoardType = isset($_GET['roomBoardType']) ? $_GET['roomBoardType'] : 00;
$roomPrice = isset($_GET['roomPrice']) ? $_GET['roomPrice'] : 00;
$removeRoom = isset($_GET['removeRoom']) ? $_GET['removeRoom'] : 00;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['nextStep'])) {
        // Debug output
        error_log('Redirecting to booking-step2.php with parameters: ' . http_build_query([
            'checkIn' => $checkIn,
            'checkOut' => $checkOut,
            'guest' => $guest,
            'adult' => $adult,
            'child' => $child,
            'total' => $total,
            'roomNumber' => $roomNumber,
            'roomSize' => $roomSize,
            'roomCapacity' => $roomCapacity,
            'roomBoardType' => $roomBoardType,
            'roomPrice' => $roomPrice,
            'removeRoom' => $removeRoom
        ]));

        // Redirect to booking-step2.php with the current data
        header('Location: booking-step2.php?' . http_build_query([
            'checkIn' => $checkIn,
            'checkOut' => $checkOut,
            'guest' => $guest,
            'adult' => $adult,
            'child' => $child,
            'total' => $total,
            'roomNumber' => $roomNumber,
            'roomSize' => $roomSize,
            'roomCapacity' => $roomCapacity,
            'roomBoardType' => $roomBoardType,
            'roomPrice' => $roomPrice,
            'removeRoom' => $removeRoom

        ]));
        exit; // Ensure no further code is executed
    } elseif (isset($_GET['prevStep'])) {
        // Redirect to booking-step1.php with the current data
        header('Location: booking-step1.php?' . http_build_query([
            'checkIn' => $checkIn,
            'checkOut' => $checkOut,
            'guest' => $guest,
            'adult' => $adult,
            'child' => $child,
            'total' => $total
        ]));
        exit; // Ensure no further code is executed
    }
}

// Perform database query after redirection logic
$stmt = $conn->prepare("SELECT * FROM tb_room WHERE room_capacity >= :guest");
$stmt->bindParam(':guest', $guest, PDO::PARAM_INT);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display data (this should be after the redirection logic)

echo "checkIn " . $checkIn . " & " . $checkOut . " &g " . $guest . " &a " . $adult . " &c " . $child . " &t " . $total;
echo "<br>roomNumber " .$roomNumber . " &roomSize " . $roomSize . " &roomCapacity " . $roomCapacity . " &roomBoardType " . $roomBoardType . " &roomPrice " . $roomPrice . " &removeRoom " . $removeRoom;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking Step 2</title>
    <link rel="stylesheet" href="assets/css/setting.css">
    <link rel="stylesheet" href="assets/css/booking.css">
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
                    <div class="step">
                        <a href="#">
                            <div class="circle" id="step-two">2</div>
                        </a>
                        <div class="label">Payment</div>
                    </div>
                    <div class="step completed">
                        <a href="#">
                            <div class="circle active" id="step-three">3</div>
                        </a>
                        <div class="label">Complete</div>
                    </div>
                </div>
            </div>

            <div class="container menu-overlay d-flex justify-content-center px-0">
                <form method="get" action="#" class="booking-group shadow w-100 d-flex flex-row bg-white mt-5"
                    role="group" id="roomFilterForm">

                    <div class="booking-check card d-flex flex-column justify-content-center align-items-center"
                        style="flex: 1 1 25%;">
                        <label for="input-datein"
                            class="w-100 h-50 d-flex flex-column justify-content-center align-items-center my-auto"
                            id="label-datein" style="cursor: pointer; border-right: 2px #dedede solid"><strong>Check
                                In</strong>
                            <p class="mb-0"><?php echo $checkIn ?></p>
                        </label>

                        <input type="date" class="booking-input form-control my-auto" id="input-datein"
                            name="input-datein" value="" style="display: none;">
                    </div>

                    <div class="booking-check card d-flex flex-column justify-content-center align-items-center"
                        style="flex: 1 1 25%;">
                        <label for="input-dateout"
                            class="w-100 h-50 d-flex flex-column justify-content-center align-items-center my-auto"
                            id="label-dateout" style="cursor: pointer; border-right: 2px #dedede solid"><strong>Check
                                Out</strong>
                            <p class="mb-0"><?php echo $checkOut ?></p>
                        </label>

                        <input type="date" class="booking-input form-control my-auto" id="input-dateout"
                            name="input-dateout" value="" style="display: none;">
                    </div>

                    <div class="booking-check card d-flex flex-column justify-content-center align-items-center"
                        style="flex: 1 1 25%;">
                        <label for="guest-toggle" id="guest-label"
                            class="w-100 h-50 d-flex flex-column justify-content-center align-items-center my-auto"
                            style="cursor: pointer; border-right: 2px #dedede solid">
                            <span><strong>Guests</strong></span>
                            <span class="text-center" id="guest-count"
                                style="width: 100px;"><?php echo $guest ?>&nbsp;Guest(s)</span>
                        </label>

                        <input type="hidden" id="guest-count-hidden" name="guest-count" value="<?php echo $guest ?>">

                        <div class="bg-white p-3" id="guest-options"
                            style="width: calc(200% + 1px); display: none; position: absolute; top: 100%; left: -1px; z-index: 9998;">

                            <div class="guest-type"
                                style="display: flex; justify-content: space-between; align-items: center;">
                                <div class="guest-box">
                                    <strong>Adult</strong>
                                    <p style="margin: 0; color: #888;">Ages 13 or above</p>
                                </div>
                                <div class="guest-box d-flex align-items-center">
                                    <button class="guest-btn"
                                        onclick="event.preventDefault(); updateGuestCount('adult', -1);">-</button>
                                    <input type="text" id="adult-count" name="adult-count" class="text-center"
                                        style="width: 25px;" value="<?php echo $adult ?>" readonly>
                                    <button class="guest-btn"
                                        onclick="event.preventDefault(); updateGuestCount('adult', 1);">+</button>
                                </div>
                            </div>

                            <hr class="w-100">

                            <div class="guest-type"
                                style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                                <div class="guest-box">
                                    <strong>Child</strong>
                                    <p style="margin: 0; color: #888;">Ages 12 or below</p>
                                </div>
                                <div class="guest-box d-flex align-items-center">
                                    <button class="guest-btn"
                                        onclick="event.preventDefault(); updateGuestCount('child', -1);">-</button>
                                    <input type="text" id="child-count" name="child-count" class="text-center"
                                        style="width: 25px;" value="<?php echo $child ?>" readonly>
                                    <button class="guest-btn"
                                        onclick="event.preventDefault(); updateGuestCount('child', 1);">+</button>
                                </div>
                            </div>

                            <div class="d-flex">
                                <button class="btn ms-auto" id="guest-ok-btn"
                                    style="background-color: var(--green);">OK</button>
                            </div>
                        </div>
                    </div>

                    <div class="booking-check d-flex justify-content-center align-items-center" style="flex: 1 1 25%;">
                        <input type="submit" class="card text text-white" id="filter-btn" name="filter"
                            style="width: 80%; height: 65%; background-color: var(--green); border-radius: 0;"
                            value="Search">
                    </div>
                </form>
            </div>

            <div id="roomResults" class="container mt-5 px-0">
                <!-- Filtered rooms will be displayed here -->
                <?php foreach ($results as $row) { ?>

                <div class="d-flex mb-5">
                    <div class="card-header me-4">
                        <img src="assets/img/IMG_9010.jpg" style="width: 300px; aspect-ratio: 4/3" alt="...">
                    </div>

                    <div class="card-body flex-grow-1">
                        <h5 class="card-title">room ID: <?= htmlspecialchars($row['room_id']) ?></h5>
                        <h5 class="card-title">Number: <?= htmlspecialchars($row['room_number']) ?></h5>
                        <hr>
                        <p class="card-text">Detail: <?= htmlspecialchars($row['room_detail']) ?></p>
                        <p class="card-text">Size: <?= htmlspecialchars($row['room_size']) ?></p>
                        <p class="card-text">Capacity: <?= htmlspecialchars($row['room_capacity']) ?></p>
                        <p class="card-text">Status: <?= htmlspecialchars($row['rental_status']) ?></p>

                        <hr>

                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="card-title">Full Board</h5>
                            <h5 class="card-title"><?= htmlspecialchars("฿ " . $row['fullboard_price']) ?></h5>
                        </div>

                        <p class="card-text">Nulla non rhoncus metus, nec tincidunt nisl. Mauris lacinia enim diam,
                            nec porta velit blandit vel vestibulum.</p>

                        <div class="card-footer d-flex mt-4 gap-3">
                            <a class="btn text-white py-3 px-5 room-select-btn" href="#"
                                data-room-id="<?= htmlspecialchars($row['room_id']) ?>"
                                data-room-number="<?= htmlspecialchars($row['room_number']) ?>"
                                data-room-size="<?= htmlspecialchars($row['room_size']) ?>"
                                data-room-capacity="<?= htmlspecialchars($row['room_capacity']) ?>"
                                data-fullboard-price="<?= htmlspecialchars($row['fullboard_price']) ?>"
                                data-halfboard-price="<?= htmlspecialchars($row['halfboard_price']) ?>"
                                data-board-type="fullboard">Select</a>
                            <a href="#" class="text-black align-self-center">View Room
                                <i class="fa-solid fa-chevron-right" style="color: #333; font-size: 14px;"></i></a>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="card-title">Half Board</h5>
                            <h5 class="card-title"><?= htmlspecialchars("฿ " . $row['halfboard_price']) ?></h5>
                        </div>

                        <p class="card-text">Nulla non rhoncus metus, nec tincidunt nisl. Mauris lacinia enim diam,
                            nec porta velit blandit vel vestibulum.</p>

                        <div class="card-footer d-flex mt-4 gap-3">
                            <a class="btn text-white py-3 px-5 room-select-btn" href="#"
                                data-room-id="<?= htmlspecialchars($row['room_id']) ?>"
                                data-room-number="<?= htmlspecialchars($row['room_number']) ?>"
                                data-room-size="<?= htmlspecialchars($row['room_size']) ?>"
                                data-room-capacity="<?= htmlspecialchars($row['room_capacity']) ?>"
                                data-fullboard-price="<?= htmlspecialchars($row['fullboard_price']) ?>"
                                data-halfboard-price="<?= htmlspecialchars($row['halfboard_price']) ?>"
                                data-board-type="halfboard">Select</a>
                            <a href="#" class="text-black align-self-center">View Room
                                <i class="fa-solid fa-chevron-right" style="color: #333; font-size: 14px;"></i></a>
                        </div>

                    </div>
                </div>

                <hr class="mb-5">

                <?php } ?>
            </div>
        </section>

        <section class="right-side container" style="flex: 1 1 35%;">

            <div class="card shadow h-auto mb-4">
                <form method="post" action="booking-step3.php">
                    <div class="card-header">
                        <h5 class="card-title">Your Stay</h5>
                    </div>

                    <div class="card-body">
                        <p class="card-text">Dates:
                            <?php echo htmlspecialchars($checkIn) . " - " . htmlspecialchars($checkOut); ?></p>
                        <p class="card-text">Guests:
                            <?php echo htmlspecialchars($adult) . " Adult, " . htmlspecialchars($child) . " Child"; ?>
                        </p>

                        <div id="roomSelect">

                            <?php
                            // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            //     // รับข้อมูลจาก POST
                            //     $checkIn = htmlspecialchars($_POST['checkIn']);
                            //     $checkOut = htmlspecialchars($_POST['checkOut']);
                            //     $adult = htmlspecialchars($_POST['adult']);
                            //     $child = htmlspecialchars($_POST['child']);
                            //     $rooms = $_POST['rooms']; // รับ array ของ rooms

                            //     // แสดงข้อมูล
                            //     echo "Check-in: " . $checkIn . "<br>";
                            //     echo "Check-out: " . $checkOut . "<br>";
                            //     echo "Guests: " . $adult . " Adult, " . $child . " Child<br><br>";

                            //     // แสดงรายละเอียดห้องพัก
                            //     foreach ($rooms as $room) {
                            //         echo "Room ID: " . htmlspecialchars($room['roomId']) . "<br>";
                            //         echo "Room Number: " . htmlspecialchars($room['roomNumber']) . "<br>";
                            //         echo "Size: " . htmlspecialchars($room['roomSize']) . " sqm<br>";
                            //         echo "Capacity: " . htmlspecialchars($room['roomCapacity']) . " Adults<br>";
                            //         echo "Board Type: " . htmlspecialchars($room['boardType']) . "<br>";
                            //         echo "Price: ฿ " . htmlspecialchars($room['price']) . "<br><br>";
                            //     }
                            // } else {
                            //     echo "No data received.";
                            // }
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
                            <input type="submit" class="btn w-50" id="prev-step-btn" name="prevStep" value="Prev Step"
                                style="color: var(--green); background-color: #fff; border: 2px var(--green) solid !important">
                            <input type="submit" class="btn w-50" id="next-step-btn" name="nextStep" value="Next Step"
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

    <script src="assets/js/checkin.js"></script>

</body>

<?php include 'footer.php'; ?>

</html>