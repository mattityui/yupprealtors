const deleteButtons = document.querySelectorAll(".delete-image-btn");

deleteButtons.forEach((button) => {
    button.addEventListener("click", () => {
        const imageId = button.dataset.imageId;
        const form = document.createElement("form");
        form.method = "POST";
        form.action = `/admin/delete-image/${imageId}`;
        form.style.display = "none";
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");
        const csrfInput = document.createElement("input");
        csrfInput.name = "_token";
        csrfInput.value = csrfToken;
        form.appendChild(csrfInput);
        document.body.appendChild(form);
        form.submit();
    });
});
$(document).ready(function () {
    // Initialize the big image carousel

    $(".big-image-carousel").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: ".sub-image-carousel", // Corrected the selector here
    });

    // Initialize the sub-image carousel
    $(".sub-image-carousel").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: ".big-image-carousel",
        centerMode: true,
        focusOnSelect: true,
    });
});

function redirectToScheduleTour() {
    const propertyId = "{{ $propertyDetails->id }}";
    const redirectUrl =
        "{{ route('schedule.tour', ['id' => ':propertyId']) }}".replace(
            ":propertyId",
            propertyId
        );
    window.location.href = redirectUrl;
}
const tourDateInput = document.getElementById("tour_date");

// Get today's date
const today = new Date();

// Calculate the date for 3 days from now
const threeDaysFromNow = new Date(today);

// Convert the dates to proper date format for the date input
const minDate = today.toISOString().split("T")[0];

// Set the minimum and maximum date for the input
tourDateInput.setAttribute("min", minDate);
tourDateInput.setAttribute("max", "");

document
    .getElementById("deleteForm")
    .addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the default form submission
        if (confirm("Are you sure you want to delete this property?")) {
            this.submit(); // Submit the form if the user confirms
        }
    });
