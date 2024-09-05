// input date
document.addEventListener("DOMContentLoaded", function () {
    var labelDateIn = document.getElementById("label-datein");
    var labelDateOut = document.getElementById("label-dateout");
    var inputDateIn = document.getElementById("input-datein");
    var inputDateOut = document.getElementById("input-dateout");

    // ใช้ Flatpickr กับ inputDateIn
    flatpickr(inputDateIn, {
        onChange: function (selectedDates, dateStr, instance) {
            labelDateIn.innerHTML =
                '<strong>Check In</strong><p class="mb-0">' + dateStr + "</p>"; // อัปเดต label ด้วยวันที่ที่เลือก
        },
        appendTo: labelDateIn.closest(".card"), // ให้ปฏิทินอยู่ใต้ .card
        positionElement: labelDateIn.closest(".card"), // กำหนดตำแหน่งปฏิทิน
    });

    // ใช้ Flatpickr กับ inputDateOut
    flatpickr(inputDateOut, {
        onChange: function (selectedDates, dateStr, instance) {
            labelDateOut.innerHTML =
                '<strong>Check Out</strong><p class="mb-0">' + dateStr + "</p>";
        },
        appendTo: labelDateOut.closest(".card"), // ให้ปฏิทินอยู่ใต้ .card
        positionElement: labelDateOut.closest(".card"), // กำหนดตำแหน่งปฏิทิน
    });

    // แสดงปฏิทินเมื่อคลิกที่ labelDateIn
    labelDateIn.addEventListener("click", function () {
        event.preventDefault(); // ป้องกันการดีฟอลต์ที่อาจทำให้เกิดการเลื่อนหน้า
        inputDateIn._flatpickr.open();
    });

    // แสดงปฏิทินเมื่อคลิกที่ labelDateOut
    labelDateOut.addEventListener("click", function () {
        event.preventDefault();
        inputDateOut._flatpickr.open();
    });
});

// input guest number
document.getElementById("guest-label").addEventListener("click", function () {
    var guestOptions = document.getElementById("guest-options");

    event.preventDefault();

    if (
        guestOptions.style.display === "none" ||
        guestOptions.style.display === ""
    ) {
        guestOptions.style.display = "block";
    } else {
        guestOptions.style.display = "none";
    }
});

document.getElementById("guest-ok-btn").addEventListener("click", function () {
    event.preventDefault();
    document.getElementById("guest-options").style.display = "none";
});

// ตรวจสอบการคลิกนอกพื้นที่ guest-options
document.addEventListener("click", function (event) {
    var guestOptions = document.getElementById("guest-options");
    var guestLabel = document.getElementById("guest-label");

    // ถ้าคลิกไม่ได้เกิดใน guest-options หรือ guest-label ให้ปิด guest-options
    if (
        guestOptions.style.display === "block" &&
        !guestOptions.contains(event.target) &&
        !guestLabel.contains(event.target)
    ) {
        guestOptions.style.display = "none";
    }
});

function updateGuestCount(type, change) {
    var countElement = document.getElementById(type + "-count");
    var count = parseInt(countElement.value);
    count = Math.max(0, count + change);
    countElement.value = count;
    updateTotalGuests();
}

function updateTotalGuests() {
    var adultCount = parseInt(document.getElementById("adult-count").value);
    var childCount = parseInt(document.getElementById("child-count").value);
    var totalGuests = adultCount + childCount;
    document.getElementById("guest-count").innerHTML =
        '<p class="mb-0">' + totalGuests + "&nbsp;Guest(s)</p>";
    document.getElementById("guest-count-hidden").value = totalGuests; // อัปเดตค่าของ input hidden
}
