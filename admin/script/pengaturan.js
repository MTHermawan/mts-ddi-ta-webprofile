// --- FUNGSI UNTUK LOGO SEKOLAH ---
const fileInputLogo = document.getElementById("fileInputLogo");
const previewImgLogo = document.getElementById("previewImgLogo");
const placeholderLogo = document.getElementById("placeholderLogo");
const imagePreviewBoxLogo = document.getElementById("imagePreviewLogo");
const removeBtnLogo = document.getElementById("removeBtnLogo");

fileInputLogo.addEventListener("change", function (event) {
  const file = event.target.files[0];
  if (file && file.type.startsWith("image/")) {
    const reader = new FileReader();
    reader.onload = function (e) {
      previewImgLogo.src = e.target.result;
      previewImgLogo.style.display = "block";
      removeBtnLogo.style.display = "inline-flex"; // Gunakan inline-flex agar icon rapi
      placeholderLogo.style.display = "none";
      imagePreviewBoxLogo.style.borderStyle = "solid";
      imagePreviewBoxLogo.style.borderColor = "#e9ecef";
    };
    reader.readAsDataURL(file);
  }
});

removeBtnLogo.addEventListener("click", function () {
  fileInputLogo.value = "";
  previewImgLogo.src = "";
  previewImgLogo.style.display = "none";
  removeBtnLogo.style.display = "none";
  placeholderLogo.style.display = "flex";
  imagePreviewBoxLogo.style.borderStyle = "dashed";
  imagePreviewBoxLogo.style.borderColor = "#ced4da";
});

// --- FUNGSI UNTUK VISUAL UTAMA (HERO) ---
const fileInputHero = document.getElementById("fileInputHero");
const previewImgHero = document.getElementById("previewImgHero");
const placeholderHero = document.getElementById("placeholderHero");
const imagePreviewBoxHero = document.getElementById("imagePreviewHero");
const removeBtnHero = document.getElementById("removeBtnHero");

fileInputHero.addEventListener("change", function (event) {
  const file = event.target.files[0];
  if (file && file.type.startsWith("image/")) {
    const reader = new FileReader();
    reader.onload = function (e) {
      previewImgHero.src = e.target.result;
      previewImgHero.style.display = "block";
      removeBtnHero.style.display = "inline-flex"; // Gunakan inline-flex
      placeholderHero.style.display = "none";
      imagePreviewBoxHero.style.borderStyle = "solid";
      imagePreviewBoxHero.style.borderColor = "#e9ecef";
    };
    reader.readAsDataURL(file);
  }
});

removeBtnHero.addEventListener("click", function () {
  fileInputHero.value = "";
  previewImgHero.src = "";
  previewImgHero.style.display = "none";
  removeBtnHero.style.display = "none";
  placeholderHero.style.display = "flex";
  imagePreviewBoxHero.style.borderStyle = "dashed";
  imagePreviewBoxHero.style.borderColor = "#ced4da";
});
