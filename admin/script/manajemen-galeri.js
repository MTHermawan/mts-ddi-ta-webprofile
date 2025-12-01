// VARIABEL GLOBAL
let currentMode = "add";
let currentEditId = null;
let currentDeleteId = null;

// Data galeri hardcoded
let galeriData = [
  {
    id_galeri: 1,
    judul_galeri: "Kegiatan Belajar Mengajar di Kelas",
    deskripsi: "Momen seru siswa-siswi dalam proses pembelajaran interaktif dengan metode modern yang menyenangkan.",
    url_foto: "https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
  },
  {
    id_galeri: 2,
    judul_galeri: "Kegiatan Ekstrakurikuler Pramuka",
    deskripsi: "Siswa-siswi mengikuti latihan kepramukaan untuk mengembangkan karakter dan keterampilan kepemimpinan.",
    url_foto: "https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
  },
  {
    id_galeri: 3,
    judul_galeri: "Praktikum di Laboratorium Sains",
    deskripsi: "Siswa melakukan eksperimen sains dengan peralatan modern untuk memahami konsep ilmiah secara langsung.",
    url_foto: "https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
  },
  {
    id_galeri: 4,
    judul_galeri: "Kegiatan Membaca di Perpustakaan",
    deskripsi: "Siswa menikmati waktu membaca di perpustakaan sekolah yang nyaman dengan koleksi buku terlengkap.",
    url_foto: "https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
  },
  {
    id_galeri: 5,
    judul_galeri: "Pentas Seni dan Budaya",
    deskripsi: "Penampilan spektakuler siswa dalam pentas seni yang menampilkan bakat di bidang musik, tari, dan teater.",
    url_foto: "https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
  },
  {
    id_galeri: 6,
    judul_galeri: "Kegiatan Olahraga Sekolah",
    deskripsi: "Siswa berpartisipasi dalam berbagai kegiatan olahraga untuk menjaga kebugaran dan mengembangkan sportivitas.",
    url_foto: "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
  }
];

function GetGaleriById(id_galeri) {
  for (let i = 0; i < galeriData.length; i++) {
    if (galeriData[i]['id_galeri'] == id_galeri) {
      return galeriData[i];
    }
  }
  return null;
}

// Fungsi buka popup untuk tambah data
function openPopup(mode = "Tambah Galeri") {
  currentMode = "add";
  document.getElementById("popupTitle").textContent = mode;
  resetForm();
  document.getElementById("popup").style.display = "flex";
  document.body.style.overflow = "hidden";
}

// Fungsi buka popup untuk edit data
function openEditPopup(id_galeri) {
  currentMode = "edit";
  currentEditId = id_galeri;
  document.getElementById("popupTitle").textContent = "Edit Galeri";

  // Isi form dengan data galeri yang akan diedit
  const galeri = GetGaleriById(currentEditId);
  if (galeri) {
    document.getElementById("titleInput").value = galeri.judul_galeri;
    document.getElementById("descriptionInput").value = galeri.deskripsi;

    // Jika ada foto, tampilkan preview
    if (galeri.url_foto) {
      document.getElementById("previewImage").src = galeri.url_foto;
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
function openDeletePopup(id_galeri) {
  const galeri = GetGaleriById(id_galeri);
  currentDeleteId = galeri['id_galeri'];

  if (!galeri) return;

  // Isi data yang akan dihapus
  document.getElementById("dataName").textContent = galeri['judul_galeri'];
  document.getElementById("dataDescription").textContent = galeri['deskripsi'];

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

// Event untuk input file
document.getElementById("imageInput").addEventListener("change", function (e) {
  if (e.target.files.length > 0) {
    handleImageSelection(e.target.files[0]);
  }
});

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
async function submitForm() {
  const judul = document.getElementById("titleInput").value;
  const deskripsi = document.getElementById("descriptionInput").value;
  const foto_galeri = document.getElementById("imageInput").files[0] ?? null;

  if (!judul.trim()) {
    alert("Judul galeri harus diisi!");
    return;
  }

  if (!deskripsi.trim()) {
    alert("Deskripsi galeri harus diisi!");
    return;
  }

  if (currentMode === "add") {
    if (await PostTambahGaleri(judul, deskripsi, foto_galeri)) {
      alert("Galeri berhasil ditambahkan!");
    } else {
      alert("Galeri gagal ditambahkan!");
    }
  } else {
    if (await PostEditGaleri(currentEditId, judul, deskripsi, foto_galeri)) {
      alert(`Galeri "${judul}" berhasil diperbarui!`);
    } else {
      alert("Galeri gagal diperbarui!");
    }
  }

  closePopup();
}

// Fungsi untuk konfirmasi delete
async function confirmDelete() {
  if (currentDeleteId) {
    const galeri = GetGaleriById(currentDeleteId);
    if (!galeri) alert('Foto galeri tidak ditemukan!');
     
    if (await DeleteGaleri(galeri['id_galeri'])) {
      alert(`Galeri "${galeri['judul_galeri']}" berhasil dihapus!`);
    } else {
      alert(`Galeri "${galeri['judul_galeri']}" gagal dihapus!`);
    }
    closeDeletePopup();
  }
}

// Fungsi untuk reset form
function resetForm() {
  document.getElementById("titleInput").value = "";
  document.getElementById("descriptionInput").value = "";
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
      const id_galeri = index + 1; // ID berdasarkan urutan (1-6)
      openEditPopup(id_galeri);
    });
  });

  deleteButtons.forEach((button, index) => {
    button.addEventListener("click", function () {
      const id_galeri = index + 1;
      const galeri = GetGaleriById(id_galeri);
      if (galeri) {
        openDeletePopup(id_galeri);
      } else {
        console.log("Galeri tidak ditemukan dengan ID:", id_galeri);
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