// Elemen DOM
const popup = document.getElementById("popup");
const imageUploadArea = document.getElementById("imageUploadArea");
const imageInput = document.getElementById("imageInput");
const imagePlaceholder = document.getElementById("imagePlaceholder");
const imagePreview = document.getElementById("imagePreview");
const previewImage = document.getElementById("previewImage");
const popUpTitle = document.getElementById("popupTitle");

// Tutup popup ketika klik di luar konten
popup.addEventListener("click", function (e) {
  if (e.target === popup) {
    closePopup();
  }
});

// Event untuk upload area
imageUploadArea.addEventListener("click", function (e) {
  // Cek apakah elemen yang diklik berada di dalam container tombol aksi (.image-preview-actions)
  // Jika ya, jangan jalankan perintah klik input file
  if (e.target.closest(".image-preview-actions")) {
    return;
  }
  imageInput.click();
});

imageUploadArea.addEventListener("dragover", function (e) {
  e.preventDefault();
  imageUploadArea.classList.add("dragover");
});

imageUploadArea.addEventListener("dragleave", function () {
  imageUploadArea.classList.remove("dragover");
});

imageUploadArea.addEventListener("drop", function (e) {
  e.preventDefault();
  imageUploadArea.classList.remove("dragover");

  const files = e.dataTransfer.files;
  if (files.length > 0) {
    handleImageSelection(files[0]);
  }
});

// Event untuk input file
imageInput.addEventListener("change", function (e) {
  if (e.target.files.length > 0) {
    handleImageSelection(e.target.files[0]);
  }
});

// Fungsi untuk menangani pemilihan gambar
function handleImageSelection(file) {
  if (file && file.type.startsWith("image/")) {
    const reader = new FileReader();

    reader.onload = function (e) {
      previewImage.src = e.target.result;
      imagePlaceholder.style.display = "none";
      imagePreview.style.display = "flex";
    };

    reader.readAsDataURL(file);
  } else {
    alert("Please select a valid image file (PNG, JPG, JPEG)");
  }
}

// Fungsi untuk menghapus gambar
function removeImage() {
  imageInput.value = "";
  imagePreview.style.display = "none";
  imagePlaceholder.style.display = "flex";
}
