// VARIABEL GLOBAL
let currentMode = "add";
let currentEditId = null;
let currentDeleteId = null;

// Data ekskul hardcoded
let ekskulData = [
  {
    id_ekskul: 1,
    nama_ekskul: "Pramuka",
    pembimbing: "Budi Santoso, S.Pd.",
    jadwal: "Sabtu, 08.00 - 11.00 WIB",
    url_foto:
      "https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_ekskul: 2,
    nama_ekskul: "Futsal",
    pembimbing: "Ahmad Rizki, M.Pd.",
    jadwal: "Selasa & Kamis, 15.00 - 17.00 WIB",
    url_foto:
      "https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_ekskul: 3,
    nama_ekskul: "Paduan Suara",
    pembimbing: "Diana Sari, S.Sn.",
    jadwal: "Rabu, 14.00 - 16.00 WIB",
    url_foto:
      "https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_ekskul: 4,
    nama_ekskul: "Robotika",
    pembimbing: "Rizki Pratama, S.Kom.",
    jadwal: "Jumat, 13.00 - 15.30 WIB",
    url_foto:
      "https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_ekskul: 5,
    nama_ekskul: "Teater",
    pembimbing: "Sari Dewi, S.S.",
    jadwal: "Senin, 14.30 - 16.30 WIB",
    url_foto:
      "https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_ekskul: 6,
    nama_ekskul: "KIR (Karya Ilmiah Remaja)",
    pembimbing: "Dr. Maya Sari, M.Si.",
    jadwal: "Kamis, 15.00 - 17.00 WIB",
    url_foto:
      "https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
];

function GetEkskulById(id_ekskul) {
  for (let i = 0; i < ekskulData.length; i++) {
    if (ekskulData[i]["id_ekskul"] == id_ekskul) {
      return ekskulData[i];
    }
  }
  return null;
}

// Fungsi buka popup untuk tambah data
function openPopup(mode = "Tambah Ekstrakurikuler") {
  currentMode = "add";
  document.getElementById("popupTitle").textContent = mode;
  resetForm();
  document.getElementById("popup").style.display = "flex";
  document.body.style.overflow = "hidden";
}

// Fungsi buka popup untuk edit data
function openEditPopup(id_ekskul) {
  currentMode = "edit";
  currentEditId = id_ekskul;
  document.getElementById("popupTitle").textContent = "Edit Ekstrakurikuler";

  // Isi form dengan data ekskul yang akan diedit
  const ekskul = GetEkskulById(currentEditId);
  if (ekskul) {
    document.getElementById("titleInput").value = ekskul.nama_ekskul;
    document.getElementById("pembimbingInput").value = ekskul.pembimbing;
    document.getElementById("jadwalInput").value = ekskul.jadwal;

    // Jika ada foto, tampilkan preview
    if (ekskul.url_foto) {
      document.getElementById("previewImage").src = ekskul.url_foto;
      document.getElementById("imagePlaceholder").style.display = "none";
      document.getElementById("imagePreview").style.display = "flex";
    } else {
      document.getElementById("imagePlaceholder").style.display = "flex";
      document.getElementById("imagePreview").style.display = "none";
    }
  }

  document.getElementById("popup").style.display = "flex";
  document.body.style.overflow = "hidden";
}

// Fungsi buka popup konfirmasi delete
function openDeletePopup(id_ekskul) {
  const ekskul = GetEkskulById(id_ekskul);
  currentDeleteId = ekskul["id_ekskul"];

  if (!ekskul) return;

  // Isi data yang akan dihapus
  document.getElementById("dataName").textContent = ekskul["nama_ekskul"];
  document.getElementById("dataPosition").textContent = ekskul["pembimbing"];
  document.getElementById("dataSubject").textContent = ekskul["jadwal"];

  // Menampilkan popup delete
  document.getElementById("deletePopup").style.display = "flex";
  document.body.style.overflow = "hidden";
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
  const nama = document.getElementById("titleInput").value;
  const pembimbing = document.getElementById("pembimbingInput").value;
  const jadwal = document.getElementById("jadwalInput").value;

  if (!nama.trim()) {
    alert("Nama ekstrakurikuler harus diisi!");
    return;
  }

  if (!pembimbing.trim()) {
    alert("Nama pembimbing harus diisi!");
    return;
  }

  if (!jadwal.trim()) {
    alert("Jadwal harus diisi!");
    return;
  }

  if (currentMode === "add") {
    alert("Ekstrakurikuler berhasil ditambahkan!");
  } else {
    alert(`Ekstrakurikuler "${nama}" berhasil diperbarui!`);
  }

  closePopup();
}

// Fungsi untuk konfirmasi delete
function confirmDelete() {
  if (currentDeleteId) {
    const ekskul = GetEkskulById(currentDeleteId);
    if (ekskul) {
      alert(`Ekstrakurikuler "${ekskul.nama_ekskul}" berhasil dihapus!`);
      // Di sini Anda bisa menambahkan logika untuk menghapus dari array atau database
      // ekskulData = ekskulData.filter(e => e.id_ekskul !== currentDeleteId);
    }
    closeDeletePopup();
  }
}

// Fungsi untuk reset form
function resetForm() {
  document.getElementById("titleInput").value = "";
  document.getElementById("pembimbingInput").value = "";
  document.getElementById("jadwalInput").value = "";
  removeImage();
  currentMode = "add";
  currentEditId = null;
}

// Inisialisasi event ketika DOM siap
document.addEventListener("DOMContentLoaded", function () {
  const imageUploadArea = document.getElementById("imageUploadArea");
  const imageInput = document.getElementById("imageInput");

  // Event untuk input file - HANYA SATU event listener
  imageInput.addEventListener("change", function (e) {
    if (e.target.files.length > 0) {
      handleImageSelection(e.target.files[0]);
    }
  });

  // Event untuk upload area - DIKENDALIKAN dengan flag
  let isUploadAreaProcessing = false;
  
  imageUploadArea.addEventListener("click", function (e) {
    // Cek apakah elemen yang diklik berada di dalam container tombol aksi (.image-preview-actions)
    // Jika ya, jangan jalankan perintah klik input file
    if (e.target.closest(".image-preview-actions")) {
      return;
    }
    
    // Cegah multiple clicks
    if (isUploadAreaProcessing) return;
    isUploadAreaProcessing = true;
    
    triggerImageInput();
    
    // Reset flag setelah delay
    setTimeout(() => {
      isUploadAreaProcessing = false;
    }, 100);
  });

  // Event untuk drag and drop
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

  // Tambahkan event listener untuk tombol edit dan hapus di card
  const editButtons = document.querySelectorAll(".action-btn.edit");
  const deleteButtons = document.querySelectorAll(".action-btn.delete");

  editButtons.forEach((button, index) => {
    button.addEventListener("click", function () {
      const id_ekskul = index + 1; // ID berdasarkan urutan (1-6)
      openEditPopup(id_ekskul);
    });
  });

  deleteButtons.forEach((button, index) => {
    button.addEventListener("click", function () {
      const id_ekskul = index + 1;
      const ekskul = GetEkskulById(id_ekskul);
      if (ekskul) {
        openDeletePopup(id_ekskul);
      } else {
        console.log("Ekstrakurikuler tidak ditemukan dengan ID:", id_ekskul);
      }
    });
  });

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

  // Tutup popup ketika klik di luar konten
  document.getElementById("popup").addEventListener("click", function (e) {
    if (e.target === this) {
      closePopup();
    }
  });

  document.getElementById("deletePopup").addEventListener("click", function (e) {
    if (e.target === this) {
      closeDeletePopup();
    }
  });

  
});