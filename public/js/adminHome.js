$(document).ready(function () {
    // Hide all property forms initially
    $("#house_and_lot_form").hide();
    $("#condominium_form").hide();
    $("#lot_only_form").hide();

    // Show the selected property form based on the dropdown value
    $("#property_type").change(function () {
        var selectedType = $(this).val();

        // Hide all property forms
        $("#house_and_lot_form").hide();
        $("#condominium_form").hide();
        $("#lot_only_form").hide();

        // Show the selected property form
        if (selectedType === "house_and_lot") {
            $("#house_and_lot_form").show();
        } else if (selectedType === "condominium") {
            $("#condominium_form").show();
        } else if (selectedType === "lot_only") {
            $("#lot_only_form").show();
        }
    });
});

const allSideMenu = document.querySelectorAll("#sidebar .side-menu.top li a");
const shrink_btn = document.querySelector(".shrink-btn");
const sidebar_links = document.querySelectorAll(".sidebar-links a");
const shortcuts = document.querySelector(".sidebar-links h4");
const tooltip_elements = document.querySelectorAll(".tooltip-element");
const menuLinks = document.querySelectorAll(".menu-link");
const sections = document.querySelectorAll(".section");

allSideMenu.forEach((item) => {
    const li = item.parentElement;

    item.addEventListener("click", function () {
        allSideMenu.forEach((i) => {
            i.parentElement.classList.remove("active");
        });
        li.classList.add("active");
    });
});

shrink_btn.addEventListener("click", () => {
    document.body.classList.toggle("shrink");
    setTimeout(moveActiveTab, 400);

    shrink_btn.classList.add("hovered");

    setTimeout(() => {
        shrink_btn.classList.remove("hovered");
    }, 500);
});

function changeLink() {
    sidebar_links.forEach((sideLink) => sideLink.classList.remove("active"));
    this.classList.add("active");

    activeIndex = this.dataset.active;
}

sidebar_links.forEach((link) => link.addEventListener("click", changeLink));

function showTooltip() {
    let tooltip = this.parentNode.lastElementChild;
    let spans = tooltip.children;
    let tooltipIndex = this.dataset.tooltip;

    tooltip.style.top = `${
        (100 / (spans.length * 2)) * (tooltipIndex * 2 + 1)
    }%`;
}

tooltip_elements.forEach((elem) => {
    elem.addEventListener("mouseover", showTooltip);
});

// Activate the first section by default
sections[0].classList.add("active");

// Add click event listener to each menu link
menuLinks.forEach((menuLink) => {
    menuLink.addEventListener("click", (e) => {
        e.preventDefault();

        // Get the section associated with the clicked link
        const sectionId = menuLink.dataset.section;
        const section = document.getElementById(sectionId);

        // Toggle the active class for menu links
        menuLinks.forEach((link) => {
            link.classList.remove("active");
        });
        menuLink.classList.add("active");

        // Toggle the active class for sections
        sections.forEach((sec) => {
            sec.classList.remove("active");
            sec.style.display = "none";
        });
        section.classList.add("active");
        section.style.display = "flex";
    });
});

// Hide sections that are not active
function hideInactiveSections() {
    sections.forEach((sec) => {
        if (!sec.classList.contains("active")) {
            sec.style.display = "none";
        } else {
            sec.style.display = "flex";
        }
    });
}

// Call the function to hide inactive sections initially
hideInactiveSections();
