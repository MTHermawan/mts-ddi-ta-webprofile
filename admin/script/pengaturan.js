const fileInput = document.getElementById("fileInput");
const previewImg = document.getElementById("previewImg");
const placeholder = document.getElementById("placeholder");
const imagePreviewBox = document.getElementById("imagePreview");

fileInput.addEventListener("change", function (event) {
  const file = event.target.files[0];

  if (file && file.type.startsWith("image/")) {
    const reader = new FileReader();

    reader.onload = function (e) {
      previewImg.src = e.target.result;

      // Tampilkan gambar, sembunyikan placeholder
      previewImg.style.display = "block";
      placeholder.style.display = "none";

      // Ubah border menjadi solid saat ada gambar agar lebih rapi
      imagePreviewBox.style.borderStyle = "solid";
      imagePreviewBox.style.borderColor = "#e9ecef";
    };

    reader.readAsDataURL(file);
  } else {
    // Reset jika file tidak valid
    previewImg.src = "";
    previewImg.style.display = "none";
    placeholder.style.display = "flex";
    imagePreviewBox.style.borderStyle = "dashed";
    imagePreviewBox.style.borderColor = "#ced4da";
  }
});
