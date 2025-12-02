// VARIABEL GLOBAL
let currentMode = "add";
let currentEditId = null;
let currentDeleteId = null;

// Data sejarah hardcoded
let sejarahData = [
  {
    id_sejarah: 1,
    tahun_sejarah: "1985",
    deskripsi: "Sekolah ini didirikan dengan nama SMP Negeri 1 Jakarta oleh Bapak Dr. Soetomo sebagai bentuk komitmen untuk memberikan pendidikan berkualitas bagi generasi muda. Awalnya sekolah hanya memiliki 3 ruang kelas dengan 50 siswa."
  },
  {
    id_sejarah: 2,
    tahun_sejarah: "1995",
    deskripsi: "Dibangunnya perpustakaan sekolah dan laboratorium sains pertama. Jumlah siswa meningkat menjadi 200 orang. Sekolah mulai mengembangkan kurikulum yang lebih komprehensif dan memperkenalkan program ekstrakurikuler."
  },
  {
    id_sejarah: 3,
    tahun_sejarah: "2005",
    deskripsi: "Sekolah meraih akreditasi A dari Badan Akreditasi Nasional. Laboratorium komputer pertama dibangun dengan 20 unit komputer. Program bahasa Inggris intensif diperkenalkan untuk meningkatkan kompetensi global siswa."
  },
  {
    id_sejarah: 4,
    tahun_sejarah: "2015",
    deskripsi: "Renovasi besar-besaran dilakukan pada seluruh bangunan sekolah. Smart classroom diperkenalkan dengan teknologi pembelajaran terbaru. Sekolah mulai menerapkan sistem manajemen berbasis digital untuk meningkatkan efisiensi administrasi."
  },
  {
    id_sejarah: 5,
    tahun_sejarah: "2020",
    deskripsi: "Sekolah meraih penghargaan 'Sekolah Adiwiyata Nasional' dan memenangkan kompetisi sains internasional pertama. Kerjasama dengan sekolah-sekolah di luar negeri dimulai untuk program pertukaran pelajar dan guru."
  },
  {
    id_sejarah: 6,
    tahun_sejarah: "2023",
    deskripsi: "Peluncuran program 'Sekolah Digital 4.0' dengan integrasi teknologi AI dalam pembelajaran. Pembangunan gedung olahraga bertaraf internasional dan pusat kreativitas siswa. Sekolah menetapkan target menjadi sekolah berstandar internasional pada tahun 2025."
  }
];

function GetSejarahById(id_sejarah) {
  for (let i = 0; i < sejarahData.length; i++) {
    if (sejarahData[i]['id_sejarah'] == id_sejarah) {
      return sejarahData[i];
    }
  }
  return null;
}

// Fungsi buka popup untuk tambah data
function openPopup(mode = "Tambah Sejarah") {
  currentMode = "add";
  document.getElementById("popupTitle").textContent = mode;
  resetForm();
  document.getElementById("popup").style.display = "flex";
  document.body.style.overflow = "hidden";
}

// Fungsi buka popup untuk edit data
function openEditPopup(id_sejarah) {
  currentMode = "edit";
  currentEditId = id_sejarah;
  document.getElementById("popupTitle").textContent = "Edit Sejarah";

  // Isi form dengan data sejarah yang akan diedit
  const sejarah = GetSejarahById(currentEditId);
  if (sejarah) {
    document.getElementById("titleInput").value = sejarah.tahun_sejarah;
    document.getElementById("descriptionInput").value = sejarah.deskripsi;
  }

  document.getElementById("popup").style.display = "flex";
  document.body.style.overflow = "hidden";
}

// Fungsi buka popup konfirmasi delete
function openDeletePopup(id_sejarah) {
  const sejarah = GetSejarahById(id_sejarah);
  if (!sejarah) return;
  
  currentDeleteId = sejarah['id_sejarah'];

  // Isi data yang akan dihapus
  document.getElementById("dataName").textContent = sejarah['tahun_sejarah'];
  document.getElementById("dataDescription").textContent = sejarah['deskripsi'];

  // Menampilkan popup delete
  document.getElementById("deletePopup").style.display = "flex";
  document.body.style.overflow = "hidden";
}

// Fungsi untuk edit sejarah
function editSejarah(id) {
  openEditPopup(id);
}

// Fungsi untuk menghapus sejarah
function deleteSejarah(id) {
  const sejarah = GetSejarahById(id);
  if (sejarah) {
    currentDeleteId = id;
    document.getElementById("dataName").textContent = sejarah.tahun_sejarah;
    document.getElementById("dataDescription").textContent = sejarah.deskripsi;
    document.getElementById("deletePopup").style.display = "flex";
    document.body.style.overflow = "hidden";
  }
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

// Fungsi untuk submit form
async function submitForm() {
  const tahun = document.getElementById("titleInput").value;
  const deskripsi = document.getElementById("descriptionInput").value;

  if (!tahun.trim()) {
    alert("Tahun sejarah harus diisi!");
    return;
  }

  if (!deskripsi.trim()) {
    alert("Deskripsi sejarah harus diisi!");
    return;
  }

  if (currentMode === "add") {
    if (await PostTambahSejarah(tahun, deskripsi)) {
      alert("Sejarah berhasil ditambahkan!");
    } else {
      alert("Sejarah gagal ditambahkan!");
    }
  } else {
    if (await PostEditSejarah(currentEditId, tahun, deskripsi)) {
      alert(`Sejarah tahun ${tahun} berhasil diperbarui!`);
    } else {
      alert("Sejarah gagal diperbarui!");
    }
  }

  closePopup();
}

// Fungsi untuk konfirmasi delete
async function confirmDelete() {
  if (currentDeleteId) {
    const sejarah = GetSejarahById(currentDeleteId);
    if (!sejarah) {
      alert('Sejarah tidak ditemukan!');
      return;
    }
     
    if (await DeleteSejarah(sejarah['id_sejarah'])) {
      alert(`Sejarah tahun ${sejarah['tahun_sejarah']} berhasil dihapus!`);
    } else {
      alert(`Sejarah tahun ${sejarah['tahun_sejarah']} gagal dihapus!`);
    }
    closeDeletePopup();
  }
}

// Fungsi untuk reset form
function resetForm() {
  document.getElementById("titleInput").value = "";
  document.getElementById("descriptionInput").value = "";
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
  // Tambahkan event listener untuk tombol edit dan hapus di card
  const editButtons = document.querySelectorAll(".action-btn.edit");
  const deleteButtons = document.querySelectorAll(".action-btn.delete");

  editButtons.forEach((button, index) => {
    button.addEventListener("click", function () {
      const id_sejarah = index + 1; // ID berdasarkan urutan (1-6)
      editSejarah(id_sejarah);
    });
  });

  deleteButtons.forEach((button, index) => {
    button.addEventListener("click", function () {
      const id_sejarah = index + 1;
      const sejarah = GetSejarahById(id_sejarah);
      if (sejarah) {
        deleteSejarah(id_sejarah);
      } else {
        console.log("Sejarah tidak ditemukan dengan ID:", id_sejarah);
      }
    });
  });
});

// Fungsi API placeholder (sesuaikan dengan backend Anda)
async function PostTambahSejarah(tahun, deskripsi) {
  // Implementasi API call untuk menambah sejarah
  console.log("Menambah sejarah:", { tahun, deskripsi });
  // Return true jika berhasil, false jika gagal
  return true;
}

async function PostEditSejarah(id, tahun, deskripsi) {
  // Implementasi API call untuk mengedit sejarah
  console.log("Mengedit sejarah:", { id, tahun, deskripsi });
  // Return true jika berhasil, false jika gagal
  return true;
}

async function DeleteSejarah(id) {
  // Implementasi API call untuk menghapus sejarah
  console.log("Menghapus sejarah dengan ID:", id);
  // Return true jika berhasil, false jika gagal
  return true;
}