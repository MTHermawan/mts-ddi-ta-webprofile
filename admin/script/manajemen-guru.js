// JavaScript untuk menangani foto yang gagal dimuat
document.addEventListener("DOMContentLoaded", function () {
  const avatarImages = document.querySelectorAll(".teacher-avatar img");

  avatarImages.forEach((img) => {
    img.addEventListener("error", function () {
      // Jika gambar gagal dimuat, sembunyikan elemen img
      this.style.display = "none";
      // Tampilkan inisial sebagai fallback
      const initials = this.nextElementSibling;
      if (initials && initials.classList.contains("teacher-avatar-initials")) {
        initials.style.display = "block";
      }
    });

    // Jika gambar berhasil dimuat, sembunyikan inisial
    img.addEventListener("load", function () {
      const initials = this.nextElementSibling;
      if (initials && initials.classList.contains("teacher-avatar-initials")) {
        initials.style.display = "none";
      }
    });
  });
});
