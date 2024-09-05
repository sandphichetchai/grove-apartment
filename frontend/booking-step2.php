<?php
include '../connect.php';
include 'top-nav.php';

// Initialize variables
$checkIn = isset($_GET['checkIn']) ? $_GET['checkIn'] : 'no check in';
$checkOut = isset($_GET['checkOut']) ? $_GET['checkOut'] : 'no check out';
$guest = isset($_GET['guest']) ? $_GET['guest'] : 0;
$adult = isset($_GET['adult']) ? $_GET['adult'] : 0;
$child = isset($_GET['child']) ? $_GET['child'] : 0;
$total = isset($_GET['total']) ? $_GET['total'] : 0;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['nextStep'])) {
        // Redirect to booking-step2.php with the current data
        header('Location: booking-step2.php?' . http_build_query([
            'checkIn' => $checkIn,
            'checkOut' => $checkOut,
            'guest' => $guest,
            'adult' => $adult,
            'child' => $child,
            'total' => $total
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

echo $checkIn . " & " . $checkOut . " &g " . $guest . " &a " . $adult . " &c " . $child . " &t " . $total;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking Step 1</title>
    <link rel="stylesheet" href="assets/css/setting.css">
    <link rel="stylesheet" href="assets/css/booking.css">

    <!-- flatpickr JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
    .flatpickr-innerContainer {
        justify-content: center;
    }

    .flatpickr-calendar {
        width: 200%;
        z-index: 9999;
        top: 100% !important;
        left: 0 !important;
        border-radius: 0;
        background-color: #fff;
    }

    .flatpickr-day:hover,
    .flatpickr-day:focus {
        background-color: #b3d4fc;
        /* เปลี่ยนสีเมื่อเลื่อนเมาส์ */
    }

    .flatpickr-day.selected,
    .flatpickr-day.startRange,
    .flatpickr-day.endRange {
        background-color: #4a90e2;
        /* เปลี่ยนสีของวันที่ที่ถูกเลือก */
        color: #fff;
    }
    </style>
</head>

<body>

    <main class="container-fluid d-flex" style="padding-inline: 10%;">

        <section class="left-side container" style="flex: 1 1 65%;">

            <div class="container mt-5">
                <div class="step-indicator d-flex justify-content-around">
                    <div class="step completed">
                        <a href="booking-step1.php">
                            <div class="circle active" id="step-one">1</div>
                        </a>
                        <div class="label">Rooms</div>
                    </div>
                    <div class="step">
                        <a href="#">
                            <div class="circle" id="step-two">2</div>
                        </a>
                        <div class="label">Add-Ons</div>
                    </div>
                    <div class="step">
                        <a href="#">
                            <div class="circle" id="step-three">3</div>
                        </a>
                        <div class="label">Payment</div>
                    </div>
                    <div class="step">
                        <a href="#">
                            <div class="circle" id="step-four">4</div>
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
                <form action="#" method="get">
                    <div class="card-header">
                        <h5 class="card-title">Your Stay</h5>
                        <!-- <hr style="width: 10%; height: 3px; border: none; background-color: var(--green)"> -->
                    </div>

                    <div class="card-body">
                        <p class="card-text">Dates: <?php echo $checkIn . " - " . $checkOut ?></p>
                        <p class="card-text">Guests: <?php echo $adult . " Adult , " . $child . " Child" ?></p>
                    </div>

                    <div class="card-footer">
                        <div class="footer-total d-flex justify-content-between">
                            <h6 class="card-title">Total</h6>
                            <h6 class="card-title"><?php echo "฿ " . $total ?></h6>
                        </div>
                        <div class="footer-nextstep d-flex gap-2">
                            <input type="submit" class="btn w-50" id="prev-step-btn" name="prevStep" value="Prev Step"
                                style="color: var(--green); background-color: #fff; border: 2px var(--green) solid !important">
                            <input type="submit" class="btn w-50" id="next-step-btn" name="nextStep" value="Next Step"
                                style="display: none; color: #fff; background-color: var(--green);">
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

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const roomSelectBtns = document.querySelectorAll('.room-select-btn');
        const summaryBox = document.querySelector('.right-side .card-body');
        const totalBox = document.querySelector(
            '.right-side .card-footer .footer-total .card-title:last-child');
        const nextStepBtn = document.getElementById('next-step-btn');

        let selectedRooms = [];
        let totalPrice = 0;
        const roomBoardTypeMap = new Map(); // Tracks selected board type for each room

        const updateSummary = () => {
            summaryBox.innerHTML = '';
            selectedRooms.forEach((room, index) => {
                summaryBox.innerHTML += `
            <p class="card-text">Room Number: ${room.roomNumber}</p>
            <p class="card-text">Size: ${room.roomSize} sqm</p>
            <p class="card-text">Capacity: ${room.roomCapacity} Adults</p>
            <p class="card-text">Board Type: ${room.boardType}</p>
            <p class="card-text">Price: ฿ ${room.price}</p>
            <button class="btn btn-danger btn-sm remove-room-btn" data-index="${index}">Remove</button>
            <hr>
            `;
            });

            totalBox.textContent = `฿ ${totalPrice}`;

            // Show or hide "Next Step" button based on selected rooms
            if (selectedRooms.length > 0) {
                nextStepBtn.style.display = 'block';
            } else {
                nextStepBtn.style.display = 'none';
            }
        };

        roomSelectBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();

                const roomId = e.target.dataset.roomId;
                const roomNumber = e.target.dataset.roomNumber;
                const roomSize = e.target.dataset.roomSize;
                const roomCapacity = e.target.dataset.roomCapacity;
                const fullBoardPrice = parseFloat(e.target.dataset.fullboardPrice);
                const halfBoardPrice = parseFloat(e.target.dataset.halfboardPrice);
                const boardType = e.target.dataset.boardType;

                // Determine the price based on board type
                const price = boardType === 'fullboard' ? fullBoardPrice : halfBoardPrice;

                // Check if the room has already been selected with a different board type
                if (roomBoardTypeMap.has(roomId)) {
                    const existingBoardType = roomBoardTypeMap.get(roomId);
                    if (existingBoardType !== boardType) {
                        // Room has a different board type already selected, so prevent this selection
                        // alert(
                        //     `Room ${roomId} already has ${existingBoardType} selected. Please remove the existing selection before adding a new one.`
                        //     );
                        return;
                    }
                }

                // Check if the same board type is already selected for the room
                const existingRoomIndex = selectedRooms.findIndex(room => room.roomId ===
                    roomId && room.boardType === boardType);
                if (existingRoomIndex > -1) {
                    // Same board type is already selected, prevent re-selection
                    // alert(`Room ${roomId} already has ${boardType} selected.`);
                    return;
                }

                // Remove existing selection if it exists
                const existingRoomIndexToRemove = selectedRooms.findIndex(room => room
                    .roomId === roomId);
                if (existingRoomIndexToRemove > -1) {
                    totalPrice -= selectedRooms[existingRoomIndexToRemove].price;
                    selectedRooms.splice(existingRoomIndexToRemove, 1);
                }

                // Add the new room selection
                selectedRooms.push({
                    roomId,
                    roomNumber,
                    roomSize,
                    roomCapacity,
                    boardType,
                    price
                });
                roomBoardTypeMap.set(roomId, boardType);
                totalPrice += price;

                // Update the summary box with the selected room details
                updateSummary();
            });
        });

        // Delegated event listener for remove buttons
        summaryBox.addEventListener('click', (e) => {
            if (e.target.classList.contains('remove-room-btn')) {
                const roomIndex = e.target.dataset.index;
                const roomId = selectedRooms[roomIndex].roomId;

                totalPrice -= selectedRooms[roomIndex].price;
                selectedRooms.splice(roomIndex, 1);

                // Remove the room from the tracking map if no other rooms with the same ID
                if (!selectedRooms.some(room => room.roomId === roomId)) {
                    roomBoardTypeMap.delete(roomId);
                }

                // Re-render the selected rooms
                updateSummary();
            }
        });
    });
    </script>

</body>

<?php include 'footer.php'; ?>

</html>