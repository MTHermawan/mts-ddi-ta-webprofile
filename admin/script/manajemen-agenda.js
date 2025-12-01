// VARIABEL GLOBAL
let currentMode = "add";
let currentEditId = null;
let currentDeleteId = null;

// Data agenda hardcoded
let agendaData = [
  {
    id_agenda: 1,
    judul_agenda: "Rapat Orang Tua dan Guru Semester Genap",
    deskripsi: "Rapat evaluasi perkembangan siswa dan pembahasan program pembelajaran semester genap. Orang tua diharapkan hadir untuk membahas kemajuan putra-putrinya.",
    tanggal: "25 Mar 2024",
    waktu: "08.00 - 12.00 WIB",
    lokasi: "Aula Serbaguna",
    status: "upcoming",
    url_foto: "https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
  },
  {
    id_agenda: 2,
    judul_agenda: "Ujian Nasional Berbasis Komputer 2024",
    deskripsi: "Pelaksanaan Ujian Nasional untuk siswa kelas XII. Peserta diwajibkan hadir 30 menit sebelum jadwal ujian dan membawa kartu peserta serta alat tulis.",
    tanggal: "1-5 Apr 2024",
    waktu: "07.30 - 12.00 WIB",
    lokasi: "Lab Komputer",
    status: "upcoming",
    url_foto: "https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
  },
  {
    id_agenda: 3,
    judul_agenda: "Pentas Seni dan Budaya Tahun 2024",
    deskripsi: "Pagelaran seni dan budaya menampilkan bakat siswa dalam bidang musik, tari, teater, dan seni rupa. Terbuka untuk umum dengan tiket masuk gratis.",
    tanggal: "15 Apr 2024",
    waktu: "14.00 - 21.00 WIB",
    lokasi: "Lapangan Sekolah",
    status: "upcoming",
    url_foto: "https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
  },
  {
    id_agenda: 4,
    judul_agenda: "Study Tour ke Yogyakarta",
    deskripsi: "Kunjungan edukatif ke berbagai situs bersejarah dan budaya di Yogyakarta. Peserta akan mengunjungi Candi Borobudur, Keraton Yogyakarta, dan Malioboro.",
    tanggal: "20-22 Apr 2024",
    waktu: "3 Hari 2 Malam",
    lokasi: "Yogyakarta",
    status: "upcoming",
    url_foto: "https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
  },
  {
    id_agenda: 5,
    judul_agenda: "Seminar Karir dan Persiapan Kuliah",
    deskripsi: "Seminar untuk mempersiapkan siswa kelas XII dalam memilih jurusan kuliah dan karir masa depan. Menghadirkan pembicara dari berbagai universitas ternama.",
    tanggal: "28 Apr 2024",
    waktu: "09.00 - 15.00 WIB",
    lokasi: "Ruang Multimedia",
    status: "upcoming",
    url_foto: "https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
  },
  {
    id_agenda: 6,
    judul_agenda: "Class Meeting Akhir Tahun 2024",
    deskripsi: "Kompetisi olahraga dan seni antar kelas sebagai penutup tahun ajaran. Berbagai lomba akan diadakan termasuk futsal, basket, pidato, dan paduan suara.",
    tanggal: "5-7 Mei 2024",
    waktu: "08.00 - 16.00 WIB",
    lokasi: "Lapangan & Aula",
    status: "upcoming",
    url_foto: "https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
  }
];

function GetAgendaById(id_agenda) {
  for (let i = 0; i < agendaData.length; i++) {
    if (agendaData[i]['id_agenda'] == id_agenda) {
      return agendaData[i];
    }
  }
  return null;
}

// Fungsi buka popup untuk tambah data
function openPopup(mode = "Tambah Agenda") {
  currentMode = "add";
  document.getElementById("popupTitle").textContent = mode;
  resetForm();
  document.getElementById("popup").style.display = "flex";
  document.body.style.overflow = "hidden";
}

// Fungsi buka popup untuk edit data
function openEditPopup(id_agenda) {
  currentMode = "edit";
  currentEditId = id_agenda;
  document.getElementById("popupTitle").textContent = "Edit Agenda";

  // Isi form dengan data agenda yang akan diedit
  const agenda = GetAgendaById(currentEditId);
  if (agenda) {
    document.getElementById("titleInput").value = agenda.judul_agenda;
    document.getElementById("descriptionInput").value = agenda.deskripsi;

    // Jika ada foto, tampilkan preview
    if (agenda.url_foto) {
      document.getElementById("previewImage").src = agenda.url_foto;
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
function openDeletePopup(id_agenda) {
  const agenda = GetAgendaById(id_agenda);
  currentDeleteId = agenda['id_agenda'];

  if (!agenda) return;

  // Isi data yang akan dihapus
  document.getElementById("dataName").textContent = agenda['judul_agenda'];
  document.getElementById("dataDescription").textContent = agenda['deskripsi'];

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
async function submitForm() {
  const judul = document.getElementById("titleInput").value;
  const deskripsi = document.getElementById("descriptionInput").value;
  const foto_agenda = document.getElementById("imageInput").files[0] ?? null;

  if (!judul.trim()) {
    alert("Judul agenda harus diisi!");
    return;
  }

  if (!deskripsi.trim()) {
    alert("Deskripsi agenda harus diisi!");
    return;
  }

  if (currentMode === "add") {
    if (await PostTambahAgenda(judul, deskripsi, foto_agenda)) {
      alert("Agenda berhasil ditambahkan!");
    } else {
      alert("Agenda gagal ditambahkan!");
    }
  } else {
    if (await PostEditAgenda(currentEditId, judul, deskripsi, foto_agenda)) {
      alert(`Agenda "${judul}" berhasil diperbarui!`);
    } else {
      alert("Agenda gagal diperbarui!");
    }
  }

  closePopup();
}

// Fungsi untuk konfirmasi delete
async function confirmDelete() {
  if (currentDeleteId) {
    const agenda = GetAgendaById(currentDeleteId);
    if (!agenda) return;
     
    if (await DeleteAgenda(agenda['id_agenda'])) {
      alert(`Agenda "${agenda['judul_agenda']}" berhasil dihapus!`);
    } else {
      alert(`Agenda "${agenda['judul_agenda']}" gagal dihapus!`);
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
      const id_agenda = index + 1; // ID berdasarkan urutan (1-6)
      openEditPopup(id_agenda);
    });
  });

  deleteButtons.forEach((button, index) => {
    button.addEventListener("click", function () {
      const id_agenda = index + 1;
      const agenda = GetAgendaById(id_agenda);
      if (agenda) {
        openDeletePopup(id_agenda);
      } else {
        console.log("Agenda tidak ditemukan dengan ID:", id_agenda);
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