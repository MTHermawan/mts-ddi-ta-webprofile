const hamburger = document.getElementById("hamburger");
const navMenu = document.querySelector(".nav-menu");

// Toggle hamburger
hamburger.addEventListener("click", () => {
  navMenu.classList.toggle("active");
});

// Dropdown toggle (khusus mobile)
document.querySelectorAll(".dropdown-toggle").forEach(toggle => {
  toggle.addEventListener("click", (e) => {
    // Jangan tutup hamburger menu
    if (window.innerWidth <= 992) {
      e.preventDefault(); // Cegah link "#" pindah halaman

      const parent = toggle.parentElement;

      // Tutup dropdown lain jika ada
      document.querySelectorAll(".dropdown").forEach(d => {
        if (d !== parent) d.classList.remove("open");
      });

      // Toggle dropdown yang ini
      parent.classList.toggle("open");
    }
  });
});

// Tutup hamburger jika klik link biasa
document.querySelectorAll(".nav-menu > a").forEach(link => {
  link.addEventListener("click", () => {
    navMenu.classList.remove("active");
  });
});
