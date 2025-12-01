// VARIABEL GLOBAL
let currentMode = "add";
let currentEditId = null;
let currentDeleteId = null;

// Data fasilitas hardcoded
let galeriData = [
  {
    id_galeri: 1,
    nama_fasilitas: "Perpustakaan Sekolah",
    deskripsi_fasilitas: "Perpustakaan sekolah dengan koleksi lebih dari 10.000 buku dari berbagai genre dan kategori. Dilengkapi dengan ruang baca yang nyaman dan area komputer untuk penelitian.",
    url_foto: "https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
  },
  {
    id_fasilitas: 2,
    nama_fasilitas: "Laboratorium Komputer",
    deskripsi_fasilitas: "Laboratorium komputer modern dengan 40 unit komputer terbaru, jaringan internet cepat, dan perangkat lunak pendidikan terkini untuk mendukung proses belajar mengajar.",
    url_foto: "https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
  },
  {
    id_fasilitas: 3,
    nama_fasilitas: "Lapangan Olahraga",
    deskripsi_fasilitas: "Lapangan olahraga multifungsi dengan ukuran standar untuk sepak bola, basket, voli, dan atletik. Dilengkapi dengan tribun penonton dan pencahayaan untuk kegiatan malam.",
    url_foto: "https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
  },
  {
    id_fasilitas: 4,
    nama_fasilitas: "Laboratorium Sains",
    deskripsi_fasilitas: "Laboratorium sains lengkap untuk praktikum fisika, kimia, dan biologi. Dilengkapi dengan peralatan modern, bahan praktikum, dan sistem keamanan yang memadai.",
    url_foto: "https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
  },
  {
    id_galeri: 5,
    nama_fasilitas: "Aula Serbaguna",
    deskrdeskripsi_fasilitasipsi: "Aula serbaguna dengan kapasitas 500 orang, dilengkapi sistem audio visual modern, panggung permanen, dan AC untuk berbagai acara sekolah seperti upacara, seminar, dan pertunjukan.",
    url_foto: "https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
  },
  {
    id_fasilitas: 6,
    nama_fasilitas: "Kantin Sekolah",
    deskripsi_fasilitas: "Kantin sekolah yang bersih dan sehat dengan berbagai pilihan makanan dan minuman. Dilengkapi dengan area makan yang nyaman dan sistem pembayaran digital.",
    url_foto: "https://images.unsplash.com/photo-1554679665-f5537f187268?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
  }
];

function GetFacilityById(id_fasilitas) {
  for (let i = 0; i < galeriData.length; i++) {
    if (galeriData[i]['id_galeri'] == id_fasilitas) {
      return galeriData[i];
    }
  }
  return null;
}

// Fungsi buka popup untuk tambah data
function openPopup(mode = "Tambah Fasilitas") {
  currentMode = "add";
  document.getElementById("popupTitle").textContent = mode;
  resetForm();
  document.getElementById("popup").style.display = "flex";
  document.body.style.overflow = "hidden";
}

// Fungsi buka popup untuk edit data
function openEditPopup(id_fasilitas) {
  currentMode = "edit";
  currentEditId = id_fasilitas;
  document.getElementById("popupTitle").textContent = "Edit Fasilitas";

  // Isi form dengan data fasilitas yang akan diedit
  const facility = GetFacilityById(currentEditId);
  if (facility) {
    document.getElementById("titleInput").value = facility.nama_fasilitas;
    document.getElementById("descriptionInput").value = facility.deskripsi_fasilitas;

    // Jika ada foto, tampilkan preview
    if (facility.url_foto) {
      document.getElementById("previewImage").src = facility.url_foto;
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
function openDeletePopup(id_fasilitas) {
  const facility = GetFacilityById(id_fasilitas);
  currentDeleteId = facility['id_fasilitas'];

  if (!facility) return;

  // Isi data yang akan dihapus
  document.getElementById("dataName").textContent = facility['nama_fasilitas'];
  document.getElementById("dataDescription").textContent = facility['deskripsi_fasilitas'];

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
  const nama = document.getElementById("titleInput").value;
  const deskripsi = document.getElementById("descriptionInput").value;
  const foto_fasilitas = document.getElementById("imageInput").files[0] ?? null;

  if (!nama.trim()) {
    alert("Nama fasilitas harus diisi!");
    return;
  }

  if (!deskripsi.trim()) {
    alert("Deskripsi fasilitas harus diisi!");
    return;
  }

  if (currentMode === "add") {
    // Submit form tambah
    await PostTambahGaleri(nama, deskripsi, foto_fasilitas)
    ? alert("Data fasilitas berhasil ditambahkan")
    : alert("Data fasilitas gagal ditambahkan");
  } else {
    // Submit form edit
    await PostEditGaleri(currentEditId, nama, deskripsi, foto_fasilitas)
    ? alert(`Data fasilitas ${nama} berhasil diperbarui!`)
    : alert("Data fasilitas gagal diperbarui");
  }

  closePopup();
}

// Fungsi untuk konfirmasi delete
async function confirmDelete() {
  if (currentDeleteId) {
    const facility = GetFacilityById(currentDeleteId);
    if (!facility) alert('Fasilitas tidak ditemukan!');

    if (await DeleteGaleri(facility['id_fasilitas']))
    {
      alert(`Data fasilitas ${facility['nama_fasilitas']} berhasil dihapus!`);
    }
    else
    {
      alert(`Data fasilitas ${facility['nama_fasilitas']} gagal dihapus!`);
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

// Inisialisasi event ketika DOM siap
document.addEventListener("DOMContentLoaded", function () {
  const imageUploadArea = document.getElementById("imageUploadArea");
  const imageInput = document.getElementById("imageInput");

  // Tambahkan event listener untuk tombol edit dan hapus di card
  const editButtons = document.querySelectorAll(".action-btn.edit");
  const deleteButtons = document.querySelectorAll(".action-btn.delete");

  editButtons.forEach((button, index) => {
    button.addEventListener("click", function () {
      const id_fasilitas = index + 1; // ID berdasarkan urutan (1-6)
      openEditPopup(id_fasilitas);
    });
  });

  deleteButtons.forEach((button, index) => {
    button.addEventListener("click", function () {
      const id_fasilitas = index + 1;
      const facility = GetFacilityById(id_fasilitas);
      if (facility) {
        openDeletePopup(id_fasilitas);
      } else {
        console.log("Fasilitas tidak ditemukan dengan ID:", id_fasilitas);
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