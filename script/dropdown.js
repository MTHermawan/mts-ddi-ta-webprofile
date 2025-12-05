// Dropdown functionality for mobile
document.addEventListener("DOMContentLoaded", function () {
  const dropdowns = document.querySelectorAll(".dropdown");

  // Untuk desktop - hover
  dropdowns.forEach((dropdown) => {
    // Hover untuk desktop
    dropdown.addEventListener("mouseenter", function () {
      if (window.innerWidth > 768) {
        this.querySelector(".dropdown-menu").style.display = "block";
      }
    });

    dropdown.addEventListener("mouseleave", function () {
      if (window.innerWidth > 768) {
        this.querySelector(".dropdown-menu").style.display = "none";
      }
    });

    // Click untuk mobile
    const toggle = dropdown.querySelector(".dropdown-toggle");
    const menu = dropdown.querySelector(".dropdown-menu");

    toggle.addEventListener("click", function (e) {
      if (window.innerWidth <= 768) {
        e.preventDefault();
        e.stopPropagation();

        // Close other dropdowns
        dropdowns.forEach((other) => {
          if (other !== dropdown) {
            other.querySelector(".dropdown-menu").style.display = "none";
          }
        });

        // Toggle current dropdown
        if (menu.style.display === "block") {
          menu.style.display = "none";
        } else {
          menu.style.display = "block";
        }
      }
    });
  });

  // Close dropdowns when clicking outside
  document.addEventListener("click", function (e) {
    if (window.innerWidth <= 768) {
      if (!e.target.closest(".dropdown")) {
        dropdowns.forEach((dropdown) => {
          dropdown.querySelector(".dropdown-menu").style.display = "none";
        });
      }
    }
  });
});
