<?php
include '../connect.php';
include 'top-nav.php';

// Initialize variables
$checkIn = isset($_GET['input-datein']) ? $_GET['input-datein'] : 'no';
$checkOut = isset($_GET['input-dateout']) ? $_GET['input-dateout'] : 'no';
$guest = isset($_GET['guest-count']) ? $_GET['guest-count'] : 0;
$adult = isset($_GET['adult-count']) ? $_GET['adult-count'] : 0;
$child = isset($_GET['child-count']) ? $_GET['child-count'] : 0;
$total = isset($_GET['total']) ? $_GET['total'] : 0;

$roomNumber = isset($_GET['roomNumber']) ? $_GET['roomNumber'] : 'no';
$roomSize = isset($_GET['roomSize']) ? $_GET['roomSize'] : 'no';
$roomCapacity = isset($_GET['roomCapacity']) ? $_GET['roomCapacity'] : 'no';
$roomBoardType = isset($_GET['roomBoardType']) ? $_GET['roomBoardType'] : 'no';
$roomPrice = isset($_GET['roomPrice']) ? $_GET['roomPrice'] : 'no';
$removeRoom = isset($_GET['removeRoom']) ? $_GET['removeRoom'] : 'no';

// Perform database query after redirection logic
$stmt = $conn->prepare("SELECT * FROM tb_room WHERE room_capacity >= :guest");
$stmt->bindParam(':guest', $guest, PDO::PARAM_INT);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "checkIn " . $checkIn . " &checkOut " . $checkOut . " &guest " . $guest . " &adult " . $adult . " &child " . $child . " &total " . $total;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking Step 1</title>
    <link rel="stylesheet" href="assets/css/setting.css">
    <link rel="stylesheet" href="assets/css/booking.css">

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

                    <div class="booking-check card d-flex flex-column justify-content-center align-items-center"
                        style="flex: 1 1 25%;">
                        <label for="input-datein"
                            class="w-100 h-50 d-flex flex-column justify-content-center align-items-center my-auto"
                            id="label-datein" style="cursor: pointer; border-right: 2px #dedede solid"><strong>Check
                                In</strong>
                            <p class="mb-0"><?php echo $checkIn ?></p>
                        </label>

                        <input type="date" class="booking-input form-control my-auto" id="input-datein"
                            name="input-datein" value="<?php echo htmlspecialchars($checkIn); ?>"
                            style="display: none;">
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
                            name="input-dateout" value="<?php echo htmlspecialchars($checkOut); ?>"
                            style="display: none;">
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
                                data-room-checkIn="<?= htmlspecialchars($checkIn) ?>"
                                data-room-checkOut="<?= htmlspecialchars($checkOut) ?>"
                                data-room-adult="<?= htmlspecialchars($adult) ?>"
                                data-room-child="<?= htmlspecialchars($child) ?>"
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
                                data-room-checkIn="<?= htmlspecialchars($checkIn) ?>"
                                data-room-checkOut="<?= htmlspecialchars($checkOut) ?>"
                                data-room-adult="<?= htmlspecialchars($adult) ?>"
                                data-room-child="<?= htmlspecialchars($child) ?>"
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
                <form method="post" action="booking-step2.php">
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

                        <div id="roomSelect"></div>

                        <div id="roomInputs"></div>
                    </div>

                    <div class="card-footer px-3 py-3">
                        <div class="footer-total d-flex justify-content-between mt-3 mb-3">
                            <h5 class="card-title">Total</h5>
                            <input type="text" class="card-title"
                                style="font-size: 18px; text-align: right; background: transparent" id="totalPrice"
                                name="totalPrice" value="฿ <?php echo $total ?>" readonly>
                        </div>
                        <div class="footer-nextstep d-flex justify-content-end">
                            <input type="submit" class="btn w-50" id="next-step-btn" name="nextStep" value="Next"
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
    document.addEventListener("DOMContentLoaded", () => {
        // Select elements
        const summaryBox = document.getElementById("roomSelect");
        var roomInputsContainer = document.querySelector("#roomInputs");
        console.log("Room Inputs Container:", roomInputsContainer);
        if (roomInputsContainer) {
            console.log(
                "HTML of Room Inputs Container:",
                roomInputsContainer.innerHTML
            );
        } else {
            console.log("Room Inputs Container not found");
        }
        const totalBox = document.querySelector(
            ".right-side .card-footer .footer-total .card-title:last-child"
        );
        const nextStepBtn = document.getElementById("next-step-btn");
        const roomSelectBtns = document.querySelectorAll(".room-select-btn");
        const guestDefault = document.getElementById("guestDefault");

        // Check for required elements
        if (!summaryBox || !totalBox || !nextStepBtn) {
            console.error("One or more required elements are missing");
            return;
        }

        let selectedRooms = [];
        let totalPrice = 0;
        const roomBoardTypeMap = new Map(); // Tracks selected board type for each room

        const updateSummary = () => {
            if (summaryBox) {
                summaryBox.innerHTML = "";
            }
            if (roomInputsContainer) {
                roomInputsContainer.innerHTML = "";
            }

            selectedRooms.forEach((room, index) => {
                if (summaryBox) {
                    summaryBox.innerHTML += `
                    <div class="card w-100" id="roomCard${index}">
                    <p class="card-text">Dates: ${room.checkIn} - ${room.checkOut}</p>
                    <p class="card-text">Guests: adult ${room.adult} , child ${room.child}</p>
                    <p class="card-text">Room Number: ${room.roomNumber}</p>
                    <p class="card-text">Size: ${room.roomSize} sqm</p>
                    <p class="card-text">Capacity: ${room.roomCapacity} Adults</p>
                    <p class="card-text">Board Type: ${room.boardType}</p>
                    <p class="card-text">Price: ฿ ${room.price}</p>
                    <button type="button" class="btn btn-danger btn-sm w-100 remove-room-btn" style="height: 40px;" data-index="${index}">Remove</button>
                    </div>
                    <hr>
                `;
                }

                if (roomInputsContainer) {
                    roomInputsContainer.innerHTML += `
                    <input type="hidden" name="rooms[${index}][checkIn]" value="${room.checkIn}">
                    <input type="hidden" name="rooms[${index}][checkOut]" value="${room.checkOut}">
                    <input type="hidden" name="rooms[${index}][adult]" value="${room.adult}">
                    <input type="hidden" name="rooms[${index}][child]" value="${room.child}">
                    <input type="hidden" name="rooms[${index}][roomId]" value="${room.roomId}">
                    <input type="hidden" name="rooms[${index}][roomNumber]" value="${room.roomNumber}">
                    <input type="hidden" name="rooms[${index}][roomSize]" value="${room.roomSize}">
                    <input type="hidden" name="rooms[${index}][roomCapacity]" value="${room.roomCapacity}">
                    <input type="hidden" name="rooms[${index}][boardType]" value="${room.boardType}">
                    <input type="hidden" name="rooms[${index}][price]" value="${room.price}">
                `;
                }
            });

            if (totalBox) {
                totalBox.value = `฿ ${totalPrice}`;
            }

            if (nextStepBtn) {
                nextStepBtn.style.display =
                    selectedRooms.length > 0 ? "block" : "none";
            }

            if (guestDefault) {
                guestDefault.style.display =
                    selectedRooms.length > 0 ? "none" : "block";
            }
        };

        // Event listener for room selection buttons
        roomSelectBtns.forEach((btn) => {
            btn.addEventListener("click", (e) => {
                e.preventDefault();

                const checkIn = e.target.dataset.roomCheckin;
                const checkOut = e.target.dataset.roomCheckout;
                const adult = e.target.dataset.roomAdult;
                const child = e.target.dataset.roomChild;
                const roomId = e.target.dataset.roomId;
                const roomNumber = e.target.dataset.roomNumber;
                const roomSize = e.target.dataset.roomSize;
                const roomCapacity = e.target.dataset.roomCapacity;
                const fullBoardPrice = parseFloat(e.target.dataset.fullboardPrice);
                const halfBoardPrice = parseFloat(e.target.dataset.halfboardPrice);
                const boardType = e.target.dataset.boardType;

                // Determine the price based on board type
                const price =
                    boardType === "fullboard" ? fullBoardPrice : halfBoardPrice;

                // Check if the room has already been selected with a different board type
                if (roomBoardTypeMap.has(roomId)) {
                    const existingBoardType = roomBoardTypeMap.get(roomId);
                    if (existingBoardType !== boardType) {
                        return;
                    }
                }

                // Check if the same board type is already selected for the room
                const existingRoomIndex = selectedRooms.findIndex(
                    (room) => room.roomId === roomId && room.boardType === boardType
                );
                if (existingRoomIndex > -1) {
                    return;
                }

                // Remove existing selection if it exists
                const existingRoomIndexToRemove = selectedRooms.findIndex(
                    (room) => room.roomId === roomId
                );
                if (existingRoomIndexToRemove > -1) {
                    totalPrice -= selectedRooms[existingRoomIndexToRemove].price;
                    selectedRooms.splice(existingRoomIndexToRemove, 1);
                }

                // Add the new room selection
                selectedRooms.push({
                    checkIn,
                    checkOut,
                    adult,
                    child,
                    roomId,
                    roomNumber,
                    roomSize,
                    roomCapacity,
                    boardType,
                    price,
                });
                roomBoardTypeMap.set(roomId, boardType);
                totalPrice += price;

                // Update the summary box with the selected room details
                updateSummary();
            });
        });

        // Delegated event listener for remove buttons
        summaryBox.addEventListener("click", (e) => {
            if (e.target.classList.contains("remove-room-btn")) {
                const roomIndex = e.target.dataset.index;
                const roomId = selectedRooms[roomIndex].roomId;

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
                        // Proceed with room removal
                        totalPrice -= selectedRooms[roomIndex].price;
                        selectedRooms.splice(roomIndex, 1);

                        // Check if the roomId no longer exists in selectedRooms and remove from map
                        if (!selectedRooms.some((room) => room.roomId === roomId)) {
                            roomBoardTypeMap.delete(roomId);
                        }

                        updateSummary();

                        // Show success message after removal
                        Swal.fire(
                            'Deleted!',
                            'The room has been removed.',
                            'success'
                        );
                    }
                });
            }
        });

    });
    </script>

</body>

<?php include 'footer.php'; ?>

</html>