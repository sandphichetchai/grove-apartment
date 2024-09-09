document.addEventListener("DOMContentLoaded", () => {
    const bookingData = window.bookingData || {};

    // Select DOM elements
    const summaryBox = document.getElementById("roomSelect");
    const roomInputsContainer = document.querySelector("#roomInputs");
    const totalBox = document.querySelector(
        ".right-side .card-footer .footer-total .card-title:last-child"
    );
    const nextStepBtn = document.getElementById("next-step-btn");
    const prevStepBtn = document.getElementById("prev-step-btn");
    const roomSelectBtns = document.querySelectorAll(".room-select-btn");
    const guestDefault = document.getElementById("guestDefault");

    // Initialize selectedRooms from the global bookingData
    const selectedRooms = bookingData.rooms || [];
    let totalPrice = parseFloat(bookingData.totalPrice.replace("฿ ", "") || 0);

    const roomBoardTypeMap = new Map();

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
                    <p class="card-text">Guests: adult ${room.adult}, child ${room.child}</p>
                    <p class="card-text">Room Number: ${room.roomNumber}</p>
                    <p class="card-text">Size: ${room.roomSize} sqm</p>
                    <p class="card-text">Capacity: ${room.roomCapacity} Adults</p>
                    <p class="card-text">Board Type: ${room.boardType}</p>
                    <p class="card-text">Price: ฿ ${room.price}</p>
                    <button type="button" class="btn btn-danger btn-sm w-100 mb-4 remove-room-btn" style="height: 40px;" data-index="${index}">Remove</button>
                    </div>
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
                    <input type="hidden" name="rooms[${index}][price]" value="${room.price}" class="room-price">
                `;
            }
        });

        if (totalBox) {
            totalBox.textContent = `฿ ${totalPrice.toFixed(2)}`;
        }
    };

    summaryBox.addEventListener("click", (e) => {
        if (e.target && e.target.classList.contains("remove-room-btn")) {
            const index = e.target.getAttribute("data-index");
            if (confirm("Are you sure you want to remove this room?")) {
                selectedRooms.splice(index, 1);
                updateSummary();
            }
        }
    });

    roomSelectBtns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            const roomIndex = e.target.getAttribute("data-index");
            if (selectedRooms[roomIndex]) {
                alert("This room is already selected.");
            } else {
                selectedRooms.push({
                    checkIn: document.getElementById(`checkIn${roomIndex}`)
                        .value,
                    checkOut: document.getElementById(`checkOut${roomIndex}`)
                        .value,
                    adult: document.getElementById(`adult${roomIndex}`).value,
                    child: document.getElementById(`child${roomIndex}`).value,
                    roomId: document.getElementById(`roomId${roomIndex}`).value,
                    roomNumber: document.getElementById(
                        `roomNumber${roomIndex}`
                    ).value,
                    roomSize: document.getElementById(`roomSize${roomIndex}`)
                        .value,
                    roomCapacity: document.getElementById(
                        `roomCapacity${roomIndex}`
                    ).value,
                    boardType: document.getElementById(`boardType${roomIndex}`)
                        .value,
                    price: document.getElementById(`price${roomIndex}`).value,
                });
                updateSummary();
            }
        });
    });

    if (nextStepBtn) {
        nextStepBtn.addEventListener("click", () => {
            document.querySelector("input[name='step']").value = "step2";
        });
    }

    if (prevStepBtn) {
        prevStepBtn.addEventListener("click", () => {
            document.querySelector("input[name='step']").value = "step1";
        });
    }

    updateSummary();
});
