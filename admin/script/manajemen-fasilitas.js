// Variabel global
let currentMode = "add";
let currentEditId = null;
let currentDeleteId = null;
let currentDeleteData = null;

// Fungsi untuk reset form
function resetForm() {
  document.getElementById("inputFacility").value = "";
  document.getElementById("inputDescription").value = "";
  removeImage();
  currentMode = "add";
  currentEditId = null;
}

// Fungsi buka popup untuk tambah data
function openPopup(mode = "Tambah Fasilitas") {
  currentMode = "add";
  document.getElementById("popupTitle").textContent = mode;
  resetForm();
  document.getElementById("popup").style.display = "flex";
}

// Fungsi buka popup untuk edit data
function openEditPopup(teacherId) {
  currentMode = "edit";
  currentEditId = teacherId;
  document.getElementById("popupTitle").textContent = "Edit Guru";

  // Isi form dengan data guru yang akan diedit
  const teacher = teachersData[teacherId];
  if (teacher) {
    document.getElementById("inputName").value = teacher.name;
    document.getElementById("inputSubject").value = teacher.subject;
    document.getElementById("inputDegree").value = teacher.degree;

    // Jika ada foto, tampilkan preview
    if (teacher.photo) {
      document.getElementById("previewImage").src = teacher.photo;
      document.getElementById("imagePlaceholder").style.display = "none";
      document.getElementById("imagePreview").style.display = "flex";
    } else {
      document.getElementById("imagePlaceholder").style.display = "flex";
      document.getElementById("imagePreview").style.display = "none";
    }
  }

  document.getElementById("popup").style.display = "flex";
}

// Fungsi buka popup konfirmasi delete
function openDeletePopup(teacherId, name, subject, degree) {
  currentDeleteId = teacherId;
  currentDeleteData = { name, subject, degree };

  // Isi data yang akan dihapus
  document.getElementById("dataName").textContent = name;
  document.getElementById("dataSubject").textContent = subject;
  document.getElementById("dataDegree").textContent = degree;

  document.getElementById("deletePopup").style.display = "flex";
}

// Fungsi tutup popup form
function closePopup() {
  document.getElementById("popup").style.display = "none";
  document.body.style.overflow = "auto";
  resetForm();
}

// Fungsi tutup popup delete
function closeDeletePopup() {
  document.getElementById("deletePopup").style.display = "none";
  document.body.style.overflow = "auto";
  currentDeleteId = null;
  currentDeleteData = null;
}

// Fungsi untuk trigger input file
function triggerImageInput() {
  document.getElementById("imageInput").click();
}

// Fungsi untuk menangani pemilihan gambar
function handleImageSelection(file) {
  if (file && file.type.startsWith("image/")) {
    const reader = new FileReader();

    reader.onload = function (e) {
      document.getElementById("previewImage").src = e.target.result;
      document.getElementById("imagePlaceholder").style.display = "none";
      document.getElementById("imagePreview").style.display = "flex";
    };

    reader.readAsDataURL(file);
  } else {
    alert("Harap pilih file gambar yang valid (PNG, JPG, JPEG)");
  }
}

// Fungsi untuk menghapus gambar
function removeImage() {
  document.getElementById("imageInput").value = "";
  document.getElementById("imagePreview").style.display = "none";
  document.getElementById("imagePlaceholder").style.display = "flex";
}

// Fungsi untuk submit form
function submitForm() {
  const nama = document.getElementById("inputName").value;
  const mapel = document.getElementById("inputSubject").value;
  const gelar = document.getElementById("inputDegree").value;

  if (!nama.trim()) {
    alert("Nama harus diisi!");
    return;
  }

  if (currentMode === "add") {
    alert("Data guru berhasil ditambahkan!");
  } else {
    alert(`Data guru ${nama} berhasil diperbarui!`);
  }

  closePopup();
}

// Fungsi untuk konfirmasi delete
function confirmDelete() {
  if (currentDeleteId && currentDeleteData) {
    alert(`Data guru ${currentDeleteData.name} berhasil dihapus!`);
    closeDeletePopup();
  }
}

// Tutup popup ketika klik di luar konten
document.getElementById("popup").addEventListener("click", function (e) {
  if (e.target === this) {
    closePopup();
  }
});

// document.getElementById("deletePopup").addEventListener("click", function (e) {
//   if (e.target === this) {
//     closeDeletePopup();
//   }
// });

// Inisialisasi event untuk gambar error di tabel
document.addEventListener("DOMContentLoaded", function () {

  // Element DOM upload gambar
  const imageUploadArea = document.getElementById("imageUploadArea");
  const imageInput = document.getElementById("imageInput");

  // Event delegation untuk tombol ganti dan hapus gambar di preview
  const changeBtn = document.querySelector(".preview-action-btn.change");
  const removeBtn = document.querySelector(".preview-action-btn.remove");

  if (changeBtn) {
    changeBtn.addEventListener("click", function (e) {
      e.stopPropagation();
      triggerImageInput();
    });
  }

  if (removeBtn) {
    removeBtn.addEventListener("click", function (e) {
      e.stopPropagation();
      removeImage();
    });
  }

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
});
