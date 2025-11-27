// JavaScript untuk menangani upload gambar
document.addEventListener("DOMContentLoaded", function () {
  const uploadButton = document.getElementById("uploadButton");
  const strukturOrganisasiContainer = document.getElementById(
    "strukturOrganisasiContainer"
  );
  const strukturOrganisasiPlaceholder = document.getElementById(
    "strukturOrganisasiPlaceholder"
  );
  const strukturOrganisasiImage = document.getElementById(
    "strukturOrganisasiImage"
  );

  // Membuat input file tersembunyi
  const fileInput = document.createElement("input");
  fileInput.type = "file";
  fileInput.accept = "image/*";
  fileInput.style.display = "none";
  document.body.appendChild(fileInput);

  // Event listener untuk tombol upload
  uploadButton.addEventListener("click", function () {
    fileInput.click();
  });

  // Event listener untuk input file
  fileInput.addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();

      reader.onload = function (e) {
        strukturOrganisasiImage.src = e.target.result;
        strukturOrganisasiImage.style.display = "block";
        strukturOrganisasiPlaceholder.style.display = "none";
        hapusButton.style.display = "block"; // Tampilkan tombol hapus
      };

      reader.readAsDataURL(file);
    }
  });

  // Event listener untuk tombol hapus
  hapusButton.addEventListener("click", function () {
    // Reset tampilan
    strukturOrganisasiImage.src = "";
    strukturOrganisasiImage.style.display = "none";
    strukturOrganisasiPlaceholder.style.display = "block";
    hapusButton.style.display = "none"; // Sembunyikan tombol hapus

    // Reset input file
    fileInput.value = "";
  });
});
