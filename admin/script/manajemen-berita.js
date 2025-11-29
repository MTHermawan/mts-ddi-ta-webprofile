// VARIABEL GLOBAL
let currentMode = "add";
let currentEditId = null;
let currentDeleteId = null;

// Data berita hardcoded
let beritaData = [
  {
    id_berita: 1,
    judul_berita: "Penerimaan Siswa Baru Tahun Ajaran 2024/2025 Telah Dibuka",
    deskripsi:
      "Pendaftaran siswa baru untuk tahun ajaran 2024/2025 telah dibuka. Kuota terbatas hanya untuk 200 siswa. Segera daftarkan putra-putri Anda untuk mendapatkan pendidikan terbaik.",
    tanggal: "15 Mar 2024",
    penulis: "Admin Sekolah",
    url_foto:
      "https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_berita: 2,
    judul_berita: "Siswa SMA Kita Juara Olimpiade Sains Nasional 2024",
    deskripsi:
      "Bangga! Tim olimpiade sains SMA Kita berhasil meraih medali emas dalam Olimpiade Sains Nasional 2024. Prestasi ini membuktikan kualitas pendidikan sains di sekolah kita.",
    tanggal: "10 Mar 2024",
    penulis: "Guru Sains",
    url_foto:
      "https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_berita: 3,
    judul_berita: "Perpustakaan Sekolah Selesai Direnovasi, Kini Lebih Nyaman",
    deskripsi:
      "Setelah proses renovasi selama 2 bulan, perpustakaan sekolah kini telah dibuka kembali dengan fasilitas yang lebih lengkap dan suasana yang lebih nyaman untuk membaca.",
    tanggal: "5 Mar 2024",
    penulis: "Kepala Perpustakaan",
    url_foto:
      "https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_berita: 4,
    judul_berita: "Kegiatan Bakti Sosial Siswa di Panti Asuhan Kasih Bunda",
    deskripsi:
      "Siswa-siswi SMA Kita mengadakan kegiatan bakti sosial di Panti Asuhan Kasih Bunda. Kegiatan ini bertujuan untuk menumbuhkan rasa empati dan kepedulian sosial.",
    tanggal: "28 Feb 2024",
    penulis: "OSIS Sekolah",
    url_foto:
      "https://images.unsplash.com/photo-1559027615-cd4628902d4a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_berita: 5,
    judul_berita: "Workshop Teknologi: Mempersiapkan Siswa untuk Era Digital",
    deskripsi:
      "Sekolah mengadakan workshop teknologi selama 3 hari untuk mempersiapkan siswa menghadapi tantangan era digital. Workshop mencakup pemrograman, desain grafis, dan digital marketing.",
    tanggal: "22 Feb 2024",
    penulis: "Tim IT Sekolah",
    url_foto:
      "https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_berita: 6,
    judul_berita: "Tim Futsal SMA Kita Juara Turnamen Antar Sekolah Se-Kota",
    deskripsi:
      "Tim futsal SMA Kita berhasil menjadi juara dalam turnamen futsal antar sekolah se-kota. Kemenangan ini diraih setelah pertandingan final yang sangat menegangkan.",
    tanggal: "18 Feb 2024",
    penulis: "Pelatih Olahraga",
    url_foto:
      "https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
];

function GetBeritaById(id_berita) {
  for (let i = 0; i < beritaData.length; i++) {
    if (beritaData[i]["id_berita"] == id_berita) {
      return beritaData[i];
    }
  }
  return null;
}

// Fungsi buka popup untuk tambah data
function openPopup(mode = "Tambah Berita") {
  currentMode = "add";
  document.getElementById("popupTitle").textContent = mode;
  resetForm();
  document.getElementById("popup").style.display = "flex";
  document.body.style.overflow = "hidden";
}

// Fungsi buka popup untuk edit data
function openEditPopup(id_berita) {
  currentMode = "edit";
  currentEditId = id_berita;
  document.getElementById("popupTitle").textContent = "Edit Berita";

  // Isi form dengan data berita yang akan diedit
  const berita = GetBeritaById(currentEditId);
  if (berita) {
    document.getElementById("titleInput").value = berita.judul_berita;
    document.getElementById("descriptionInput").value = berita.deskripsi;

    // Jika ada foto, tampilkan preview
    if (berita.url_foto) {
      document.getElementById("previewImage").src = berita.url_foto;
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
function openDeletePopup(id_berita) {
  const berita = GetBeritaById(id_berita);
  currentDeleteId = berita["id_berita"];

  if (!berita) return;

  // Isi data yang akan dihapus
  document.getElementById("dataName").textContent = berita["judul_berita"];
  document.getElementById("dataDescription").textContent = berita["deskripsi"];

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
  const judul = document.getElementById("titleInput").value;
  const deskripsi = document.getElementById("descriptionInput").value;

  if (!judul.trim()) {
    alert("Judul berita harus diisi!");
    return;
  }

  if (!deskripsi.trim()) {
    alert("Deskripsi berita harus diisi!");
    return;
  }

  if (currentMode === "add") {
    alert("Berita berhasil ditambahkan!");
  } else {
    alert(`Berita "${judul}" berhasil diperbarui!`);
  }

  closePopup();
}

// Fungsi untuk konfirmasi delete
function confirmDelete() {
  if (currentDeleteId) {
    const berita = GetBeritaById(currentDeleteId);
    if (berita) {
      alert(`Berita "${berita.judul_berita}" berhasil dihapus!`);
      // Di sini Anda bisa menambahkan logika untuk menghapus dari array atau database
      // beritaData = beritaData.filter(b => b.id_berita !== currentDeleteId);
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
      const id_berita = index + 1; // ID berdasarkan urutan (1-6)
      openEditPopup(id_berita);
    });
  });

  deleteButtons.forEach((button, index) => {
    button.addEventListener("click", function () {
      const id_berita = index + 1;
      const berita = GetBeritaById(id_berita);
      if (berita) {
        openDeletePopup(id_berita);
      } else {
        console.log("Berita tidak ditemukan dengan ID:", id_berita);
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

  document
    .getElementById("deletePopup")
    .addEventListener("click", function (e) {
      if (e.target === this) {
        closeDeletePopup();
      }
    });
});
