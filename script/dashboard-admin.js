document.querySelectorAll(".menu-item").forEach((item) => {
  item.addEventListener("click", function (e) {
    e.preventDefault();

    // Hapus class active dari semua menu items
    document.querySelectorAll(".menu-item").forEach((i) => {
      i.classList.remove("active");
    });

    // Tambahkan class active ke menu item yang diklik
    this.classList.add("active");
  });
});
