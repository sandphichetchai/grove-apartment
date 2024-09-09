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

            totalPrice -= selectedRooms[roomIndex].price;
            selectedRooms.splice(roomIndex, 1);

            if (!selectedRooms.some((room) => room.roomId === roomId)) {
                roomBoardTypeMap.delete(roomId);
            }

            updateSummary();
        }
    });
});
