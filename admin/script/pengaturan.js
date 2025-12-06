const fileInputLogo = document.getElementById("fileInputLogo");
const previewImgLogo = document.getElementById("previewImgLogo");
const placeholderLogo = document.getElementById("placeholderLogo");
const imagePreviewBoxLogo = document.getElementById("imagePreviewLogo");

const fileInputHero = document.getElementById("fileInputHero");
const previewImgHero = document.getElementById("previewImgHero");
const placeholderHero = document.getElementById("placeholderHero");
const imagePreviewBoxHero = document.getElementById("imagePreviewHero");


fileInputLogo.addEventListener("change", function (event) {
  const file = event.target.files[0];

  if (file && file.type.startsWith("image/")) {
    const reader = new FileReader();

    reader.onload = function (e) {
      previewImgLogo.src = e.target.result;

      // Tampilkan gambar, sembunyikan placeholder
      previewImgLogo.style.display = "block";
      placeholderLogo.style.display = "none";

      // Ubah border menjadi solid saat ada gambar agar lebih rapi
      imagePreviewBoxLogo.style.borderStyle = "solid";
      imagePreviewBoxLogo.style.borderColor = "#e9ecef";
    };

    reader.readAsDataURL(file);
  } else {
    // Reset jika file tidak valid
    previewImgLogo.src = "";
    previewImgLogo.style.display = "none";
    placeholderLogo.style.display = "flex";
    imagePreviewBoxLogo.style.borderStyle = "dashed";
    imagePreviewBoxLogo.style.borderColor = "#ced4da";
  }
});

fileInputHero.addEventListener("change", function (event) {
  const file = event.target.files[0];

  if (file && file.type.startsWith("image/")) {
    const reader = new FileReader();

    reader.onload = function (e) {
      previewImgHero.src = e.target.result;

      // Tampilkan gambar, sembunyikan placeholder
      previewImgHero.style.display = "block";
      placeholderHero.style.display = "none";

      // Ubah border menjadi solid saat ada gambar agar lebih rapi
      imagePreviewBoxHero.style.borderStyle = "solid";
      imagePreviewBoxHero.style.borderColor = "#e9ecef";
    };

    reader.readAsDataURL(file);
  } else {
    // Reset jika file tidak valid
    previewImgHero.src = "";
    previewImgHero.style.display = "none";
    placeholderHero.style.display = "flex";
    imagePreviewBoxHero.style.borderStyle = "dashed";
    imagePreviewBoxHero.style.borderColor = "#ced4da";
  }
});
