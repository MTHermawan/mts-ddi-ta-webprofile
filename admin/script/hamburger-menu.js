document.addEventListener("DOMContentLoaded", function () {
  const hamburgerBtn = document.getElementById("hamburgerBtn");
  const sidebar = document.getElementById("sidebar");
  const overlay = document.getElementById("overlay");
  const closeBtn = document.getElementById("sidebarCloseBtn");

  // DEBUGGING: Cek apakah elemen terbaca
  if (!closeBtn) {
    console.error(
      "❌ ERROR: Elemen dengan id='sidebarCloseBtn' TIDAK DITEMUKAN di HTML. Cek file sidebar Anda."
    );
  } else {
    console.log("✅ SUKSES: Tombol Close ditemukan.");
  }

  function toggleSidebar() {
    sidebar.classList.toggle("active");
    overlay.classList.toggle("active");
  }

  function closeSidebar() {
    sidebar.classList.remove("active");
    overlay.classList.remove("active");
  }

  // Event Listeners
  if (hamburgerBtn) hamburgerBtn.addEventListener("click", toggleSidebar);
  if (overlay) overlay.addEventListener("click", closeSidebar);

  // Event Listener khusus Tombol Close
  if (closeBtn) {
    closeBtn.addEventListener("click", function () {
      console.log("Tombol close diklik!"); // Debugging klik
      closeSidebar();
    });
  }
});
