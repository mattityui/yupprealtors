$(document).ready(function () {
    $(".show-more-btn").on("click", function () {
        const limit = parseInt($("#limitValue").val());
        const cardCount = parseInt($("#cardCountValue").val());

        // Toggle the classes for each card based on the limit
        $("a.property-card").each(function (index) {
            if (index >= limit) {
                // Cards with index 5 and above will change from show-card to hidden-card
                $(this).toggleClass("show-card hidden-card");
            }
        });

        // Update the "Show More" button text
        $(this).text(function (i, text) {
            return text === "Show More" ? "Show Less" : "Show More";
        });

        // Trigger the carousel's layout recalculation
        $(".slick-carousel").slick("setPosition");
    });
});

$(document).ready(function () {
    $(".show-more-condo").on("click", function () {
        const limit = parseInt($("#limitValuecondo").val());
        const cardCount = parseInt($("#cardCountValuecondo").val());

        // Toggle the classes for each card based on the limit
        $("a.property-card-condo").each(function (index) {
            if (index >= limit) {
                // Cards with index 5 and above will change from show-card to hidden-card
                $(this).toggleClass("show-card-condo hidden-card-condo");
            }
        });

        // Update the "Show More" button text
        $(this).text(function (i, text) {
            return text === "Show More" ? "Show Less" : "Show More";
        });

        // Trigger the carousel's layout recalculation
        $(".slick-carousel").slick("setPosition");
    });
});

$(document).ready(function () {
    $(".show-more-lot").on("click", function () {
        const limit = parseInt($("#limitValuelot").val());
        const cardCount = parseInt($("#cardCountValuelot").val());

        // Toggle the classes for each card based on the limit
        $("a.property-card-lot").each(function (index) {
            if (index >= limit) {
                // Cards with index 5 and above will change from show-card to hidden-card
                $(this).toggleClass("show-card-lot hidden-card-lot");
            }
        });

        // Update the "Show More" button text
        $(this).text(function (i, text) {
            return text === "Show More" ? "Show Less" : "Show More";
        });

        // Trigger the carousel's layout recalculation
        $(".slick-carousel").slick("setPosition");
    });
});

$(document).ready(function () {
    // Initialize Slick carousel
    $(".slick-carousel").slick({
        // Add any Slick options you want to customize the carousel
        prevArrow: '<button type="button" class="slick-prev">Previous</button>',
        nextArrow: '<button type="button" class="slick-next">Next</button>',
    });
});
$(document).ready(function () {
    $(".heart").click(function () {
        if ($(".heart").hasClass("liked")) {
            $(".heart").html(
                '<i class="fa fa-heart-o" aria-hidden="true"></i>'
            );
            $(".heart").removeClass("liked");
        } else {
            $(".heart").html('<i class="fa fa-heart" aria-hidden="true"></i>');
            $(".heart").addClass("liked");
        }
    });
});
$(document).ready(function () {
    // Function to load property details and images into the modal
    function loadPropertyDetails(propertyId) {
        // Make an AJAX request to get the property details and images
        $.ajax({
            url: "/get-property-details", // Replace with the actual route to fetch property details
            method: "GET",
            data: { propertyId: propertyId },
            success: function (response) {
                // Update the modal body with the fetched property details and images
                $(".modal-body").html(response);
            },
            error: function (xhr) {
                console.error(xhr);
            },
        });
    }

    // Handle card click event to load property details into the modal
    $(".card").on("click", function () {
        const propertyId = $(this).data("property-id");
        loadPropertyDetails(propertyId);
    });

    // Clear modal content when it's hidden
    $("#propertyModal").on("hidden.bs.modal", function () {
        $(".modal-body").empty();
    });
});
$(document).ready(function () {
    $("#showScheduleFormBtn").click(function () {
        $(".schedule-form-wrapper").fadeIn();
    });

    // Optional: If you want to hide the form when clicking outside of it
    $(document).mouseup(function (e) {
        var container = $(".schedule-form-wrapper");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.fadeOut();
        }
    });
});
