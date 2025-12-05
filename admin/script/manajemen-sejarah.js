// VARIABEL GLOBAL
let currentMode = "add";
let currentEditId = null;
let currentDeleteId = null;
let currentPage = 1;
const recordsPerPage = 6;
let sejarahData = [];

// Data sejarah contoh (akan diganti dengan data dari API)
let contohSejarahData = [
  {
    id_sejarah: 1,
    judul_sejarah: "Pendirian Sekolah",
    tahun_sejarah: "1985",
    deskripsi:
      "Sekolah ini didirikan dengan nama SMP Negeri 1 Jakarta oleh Bapak Dr. Soetomo sebagai bentuk komitmen untuk memberikan pendidikan berkualitas bagi generasi muda. Awalnya sekolah hanya memiliki 3 ruang kelas dengan 50 siswa.",
  },
  {
    id_sejarah: 2,
    judul_sejarah: "Pengembangan Fasilitas",
    tahun_sejarah: "1995",
    deskripsi:
      "Dibangunnya perpustakaan sekolah dan laboratorium sains pertama. Jumlah siswa meningkat menjadi 200 orang. Sekolah mulai mengembangkan kurikulum yang lebih komprehensif dan memperkenalkan program ekstrakurikuler.",
  },
  {
    id_sejarah: 3,
    judul_sejarah: "Akreditasi A",
    tahun_sejarah: "2005",
    deskripsi:
      "Sekolah meraih akreditasi A dari Badan Akreditasi Nasional. Laboratorium komputer pertama dibangun dengan 20 unit komputer. Program bahasa Inggris intensif diperkenalkan untuk meningkatkan kompetensi global siswa.",
  },
  {
    id_sejarah: 4,
    judul_sejarah: "Modernisasi",
    tahun_sejarah: "2015",
    deskripsi:
      "Renovasi besar-besaran dilakukan pada seluruh bangunan sekolah. Smart classroom diperkenalkan dengan teknologi pembelajaran terbaru. Sekolah mulai menerapkan sistem manajemen berbasis digital untuk meningkatkan efisiensi administrasi.",
  },
  {
    id_sejarah: 5,
    judul_sejarah: "Prestasi Internasional",
    tahun_sejarah: "2020",
    deskripsi:
      "Sekolah meraih penghargaan 'Sekolah Adiwiyata Nasional' dan memenangkan kompetisi sains internasional pertama. Kerjasama dengan sekolah-sekolah di luar negeri dimulai untuk program pertukaran pelajar dan guru.",
  },
  {
    id_sejarah: 6,
    judul_sejarah: "Visi Masa Depan",
    tahun_sejarah: "2023",
    deskripsi:
      "Peluncuran program 'Sekolah Digital 4.0' dengan integrasi teknologi AI dalam pembelajaran. Pembangunan gedung olahraga bertaraf internasional dan pusat kreativitas siswa. Sekolah menetapkan target menjadi sekolah berstandar internasional pada tahun 2025.",
  },
  {
    id_sejarah: 7,
    judul_sejarah: "Ekspansi Bangunan",
    tahun_sejarah: "1986",
    deskripsi:
      "Pembangunan gedung baru untuk menampung pertumbuhan jumlah siswa yang signifikan. Penambahan 5 ruang kelas baru dan ruang guru yang lebih luas.",
  },
  {
    id_sejarah: 8,
    judul_sejarah: "Peresmian Laboratorium",
    tahun_sejarah: "1990",
    deskripsi:
      "Peresmian laboratorium bahasa pertama dengan peralatan audio-visual modern untuk mendukung pembelajaran bahasa asing.",
  },
  {
    id_sejarah: 9,
    judul_sejarah: "Program Pertukaran",
    tahun_sejarah: "2000",
    deskripsi:
      "Dimulainya program pertukaran pelajar dengan sekolah-sekolah di Singapura dan Malaysia untuk memperluas wawasan internasional siswa.",
  },
  {
    id_sejarah: 10,
    judul_sejarah: "Digitalisasi Sekolah",
    tahun_sejarah: "2010",
    deskripsi:
      "Implementasi sistem pembelajaran digital dan pengenalan tablet sebagai alat bantu belajar di kelas-kelas tertentu.",
  },
  {
    id_sejarah: 11,
    judul_sejarah: "Green Campus",
    tahun_sejarah: "2018",
    deskripsi:
      "Peluncuran program Green Campus dengan penanaman 100 pohon, pembuatan taman vertical garden, dan sistem pengolahan sampah organik.",
  },
  {
    id_sejarah: 12,
    judul_sejarah: "AI Integration",
    tahun_sejarah: "2022",
    deskripsi:
      "Integrasi teknologi Artificial Intelligence dalam sistem pembelajaran adaptif yang menyesuaikan materi dengan kemampuan individual siswa.",
  },
];

// Fungsi untuk mendapatkan sejarah berdasarkan ID
function GetSejarahById(id_sejarah) {
  return (
    sejarahData.find((sejarah) => sejarah.id_sejarah == id_sejarah) || null
  );
}

// Fungsi untuk menampilkan sejarah pada halaman tertentu
function displaySejarahCards(page = 1) {
  const sejarahContainer = document.getElementById("sejarahContainer");
  const emptyData = document.getElementById("emptyData");
  const paginationContainer = document.getElementById("paginationContainer");

  // Jika tidak ada data
  if (sejarahData.length === 0) {
    emptyData.style.display = "flex";
    sejarahContainer.style.display = "none";
    if (paginationContainer) {
      paginationContainer.style.display = "none";
    }
    return;
  }

  emptyData.style.display = "none";
  sejarahContainer.style.display = "flex";
  sejarahContainer.style.flexDirection = "column";
  sejarahContainer.style.gap = "20px";

  if (paginationContainer) {
    paginationContainer.style.display = "flex";
  }

  // Kosongkan container
  sejarahContainer.innerHTML = "";

  // Hitung indeks data untuk halaman ini
  const startIndex = (page - 1) * recordsPerPage;
  const endIndex = Math.min(startIndex + recordsPerPage, sejarahData.length);
  const pageData = sejarahData.slice(startIndex, endIndex);

  // Tampilkan data
  pageData.forEach((sejarah, index) => {
    const card = document.createElement("div");
    card.className = "sejarah-card";
    card.setAttribute("data-id", sejarah.id_sejarah);

    card.innerHTML = `
      <div class="sejarah-year">${sejarah.tahun_sejarah}</div>
      <div class="sejarah-content">
        <h2 class="sejarah-title">${sejarah.judul_sejarah}</h2>
        <p class="sejarah-description">${sejarah.deskripsi}</p>
      </div>
      <div class="sejarah-actions">
        <button class="action-btn edit" data-id="${sejarah.id_sejarah}">
          <i class="fas fa-edit"></i> Edit
        </button>
        <button class="action-btn delete" data-id="${sejarah.id_sejarah}">
          <i class="fas fa-trash"></i> Hapus
        </button>
      </div>
    `;

    sejarahContainer.appendChild(card);
  });

  // Update informasi pagination
  updatePaginationInfo(page);

  // Update tombol pagination
  updatePaginationControls(page);
}

// Fungsi untuk update informasi pagination
function updatePaginationInfo(page) {
  const paginationInfo = document.getElementById("paginationInfo");
  if (!paginationInfo) return;

  const startIndex = (page - 1) * recordsPerPage + 1;
  const endIndex = Math.min(page * recordsPerPage, sejarahData.length);
  const totalData = sejarahData.length;

  paginationInfo.textContent = `Menampilkan ${startIndex}-${endIndex} dari ${totalData} data`;
}

// Fungsi untuk update kontrol pagination
function updatePaginationControls(page) {
  const totalPages = Math.ceil(sejarahData.length / recordsPerPage);
  const prevBtn = document.getElementById("prevPage");
  const nextBtn = document.getElementById("nextPage");
  const pageNumbers = document.getElementById("pageNumbers");

  if (!prevBtn || !nextBtn || !pageNumbers) return;

  // Update tombol prev/next
  prevBtn.disabled = page === 1;
  nextBtn.disabled = page === totalPages || totalPages === 0;

  // Update nomor halaman
  pageNumbers.innerHTML = "";

  // Tampilkan maksimal 5 nomor halaman
  let startPage = Math.max(1, page - 2);
  let endPage = Math.min(totalPages, startPage + 4);

  // Adjust jika kurang dari 5 halaman
  if (endPage - startPage < 4) {
    startPage = Math.max(1, endPage - 4);
  }

  // Tombol halaman pertama
  if (startPage > 1) {
    const firstPage = document.createElement("span");
    firstPage.className = "page-number";
    firstPage.textContent = "1";
    firstPage.onclick = () => changePage(1);
    pageNumbers.appendChild(firstPage);

    if (startPage > 2) {
      const ellipsis = document.createElement("span");
      ellipsis.className = "page-number";
      ellipsis.textContent = "...";
      ellipsis.style.cursor = "default";
      ellipsis.style.pointerEvents = "none";
      pageNumbers.appendChild(ellipsis);
    }
  }

  // Nomor halaman
  for (let i = startPage; i <= endPage; i++) {
    const pageNumber = document.createElement("span");
    pageNumber.className = `page-number ${i === page ? "active" : ""}`;
    pageNumber.textContent = i;
    pageNumber.onclick = () => changePage(i);
    pageNumbers.appendChild(pageNumber);
  }

  // Tombol halaman terakhir
  if (endPage < totalPages) {
    if (endPage < totalPages - 1) {
      const ellipsis = document.createElement("span");
      ellipsis.className = "page-number";
      ellipsis.textContent = "...";
      ellipsis.style.cursor = "default";
      ellipsis.style.pointerEvents = "none";
      pageNumbers.appendChild(ellipsis);
    }

    const lastPage = document.createElement("span");
    lastPage.className = "page-number";
    lastPage.textContent = totalPages;
    lastPage.onclick = () => changePage(totalPages);
    pageNumbers.appendChild(lastPage);
  }
}

// Fungsi untuk ganti halaman
function changePage(page) {
  currentPage = page;
  displaySejarahCards(page);
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
    document.getElementById("titleInput").value = sejarah.judul_sejarah;
    document.getElementById("yearInput").value = sejarah.tahun_sejarah;
    document.getElementById("descriptionInput").value = sejarah.deskripsi;
  }

  document.getElementById("popup").style.display = "flex";
  document.body.style.overflow = "hidden";
}

// Fungsi buka popup konfirmasi delete
function openDeletePopup(id_sejarah) {
  const sejarah = GetSejarahById(id_sejarah);
  if (!sejarah) return;

  currentDeleteId = sejarah["id_sejarah"];

  // Isi data yang akan dihapus
  document.getElementById("dataName").textContent = sejarah["judul_sejarah"];
  document.getElementById("dataYear").textContent = sejarah["tahun_sejarah"];
  document.getElementById("dataDescription").textContent = sejarah["deskripsi"];

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

// Fungsi untuk submit form
async function submitForm() {
  const judul = document.getElementById("titleInput").value.trim();
  const tahun = document.getElementById("yearInput").value.trim();
  const deskripsi = document.getElementById("descriptionInput").value.trim();

  // Validasi
  if (!judul) {
    showNotification("Peringatan", "Judul sejarah harus diisi!", "warning");
    return;
  }

  if (!tahun) {
    showNotification("Peringatan", "Tahun sejarah harus diisi!", "warning");
    return;
  }

  if (!deskripsi) {
    showNotification("Peringatan", "Deskripsi sejarah harus diisi!", "warning");
    return;
  }

  // Validasi tahun (harus angka 4 digit)
  if (!/^\d{4}$/.test(tahun)) {
    showNotification(
      "Peringatan",
      "Tahun harus berupa 4 digit angka (contoh: 2023)",
      "warning"
    );
    return;
  }

  let success = false;

  if (currentMode === "add") {
    // Simulasi API call untuk tambah data
    const newId =
      sejarahData.length > 0
        ? Math.max(...sejarahData.map((s) => s.id_sejarah)) + 1
        : 1;
    const newSejarah = {
      id_sejarah: newId,
      judul_sejarah: judul,
      tahun_sejarah: tahun,
      deskripsi: deskripsi,
    };

    if (typeof PostTambahSejarah === "function") {
      success = await PostTambahSejarah(judul, tahun, deskripsi);
    } else {
      // Simulasi offline
      sejarahData.push(newSejarah);
      success = true;
    }

    if (success) {
      showNotification("Berhasil", "Sejarah berhasil ditambahkan!", "success");

      // Refresh data jika menggunakan API
      if (typeof ReloadDataSejarah === "function") {
        await ReloadDataSejarah();
      }
    } else {
      showNotification("Gagal", "Sejarah gagal ditambahkan!", "error");
    }
  } else {
    // Edit data
    const sejarahIndex = sejarahData.findIndex(
      (s) => s.id_sejarah == currentEditId
    );

    if (typeof PostEditSejarah === "function") {
      success = await PostEditSejarah(currentEditId, judul, tahun, deskripsi);
    } else {
      // Simulasi offline
      if (sejarahIndex !== -1) {
        sejarahData[sejarahIndex] = {
          ...sejarahData[sejarahIndex],
          judul_sejarah: judul,
          tahun_sejarah: tahun,
          deskripsi: deskripsi,
        };
        success = true;
      }
    }

    if (success) {
      showNotification(
        "Berhasil",
        `Sejarah tahun ${tahun} berhasil diperbarui!`,
        "success"
      );

      // Refresh data jika menggunakan API
      if (typeof ReloadDataSejarah === "function") {
        await ReloadDataSejarah();
      }
    } else {
      showNotification("Gagal", "Sejarah gagal diperbarui!", "error");
    }
  }

  if (success) {
    closePopup();
    // Refresh tampilan
    displaySejarahCards(currentPage);
    sortSejarahByYear();
  }
}

// Fungsi untuk konfirmasi delete
async function confirmDelete() {
  if (currentDeleteId) {
    const sejarah = GetSejarahById(currentDeleteId);
    if (!sejarah) {
      showNotification("Error", "Sejarah tidak ditemukan!", "error");
      return;
    }

    let success = false;

    if (typeof PostDeleteSejarah === "function") {
      success = await PostDeleteSejarah(sejarah["id_sejarah"]);
    } else {
      // Simulasi offline
      const index = sejarahData.findIndex(
        (s) => s.id_sejarah == currentDeleteId
      );
      if (index !== -1) {
        sejarahData.splice(index, 1);
        success = true;
      }
    }

    if (success) {
      showNotification(
        "Berhasil",
        `Sejarah tahun ${sejarah["tahun_sejarah"]} berhasil dihapus!`,
        "success"
      );

      // Refresh data jika menggunakan API
      if (typeof ReloadDataSejarah === "function") {
        await ReloadDataSejarah();
      }

      closeDeletePopup();

      // Refresh tampilan
      displaySejarahCards(currentPage);
    } else {
      showNotification(
        "Gagal",
        `Sejarah tahun ${sejarah["tahun_sejarah"]} gagal dihapus!`,
        "error"
      );
    }
  }
}

// Fungsi untuk reset form
function resetForm() {
  document.getElementById("titleInput").value = "";
  document.getElementById("yearInput").value = "";
  document.getElementById("descriptionInput").value = "";
  currentMode = "add";
  currentEditId = null;
}

// Fungsi untuk sorting sejarah berdasarkan tahun (terbaru ke terlama)
function sortSejarahByYear() {
  sejarahData.sort(
    (a, b) => parseInt(b.tahun_sejarah) - parseInt(a.tahun_sejarah)
  );
}

// Fungsi untuk mencari sejarah
function searchSejarah() {
  const searchInput = document.getElementById("searchInput");
  const keyword = searchInput.value.toLowerCase().trim();

  if (!keyword) {
    // Reset ke semua data
    if (typeof ReloadDataSejarah === "function") {
      ReloadDataSejarah();
    } else {
      displaySejarahCards(1);
    }
    return;
  }

  const filteredData = sejarahData.filter((sejarah) => {
    return (
      sejarah.judul_sejarah.toLowerCase().includes(keyword) ||
      sejarah.tahun_sejarah.includes(keyword) ||
      sejarah.deskripsi.toLowerCase().includes(keyword)
    );
  });

  // Simpan data asli
  const originalData = [...sejarahData];

  // Tampilkan hasil pencarian
  sejarahData = filteredData;
  currentPage = 1;
  displaySejarahCards(1);

  // Kembalikan data asli
  sejarahData = originalData;
}

// Fungsi untuk handle search dengan debounce
let searchTimeout;
function handleSearch(event) {
  clearTimeout(searchTimeout);
  searchTimeout = setTimeout(() => {
    searchSejarah();
  }, 300);
}

// Fungsi untuk refresh tampilan sejarah
function refreshSejarahDisplay() {
  sortSejarahByYear();
  displaySejarahCards(currentPage);
}

// Event delegation untuk tombol edit dan delete
function handleCardActions(e) {
  const editBtn = e.target.closest(".action-btn.edit");
  const deleteBtn = e.target.closest(".action-btn.delete");

  if (editBtn) {
    const id_sejarah = parseInt(editBtn.getAttribute("data-id"));
    openEditPopup(id_sejarah);
  }

  if (deleteBtn) {
    const id_sejarah = parseInt(deleteBtn.getAttribute("data-id"));
    const sejarah = GetSejarahById(id_sejarah);
    if (sejarah) {
      openDeletePopup(id_sejarah);
    }
  }
}

// Inisialisasi ketika DOM siap
document.addEventListener("DOMContentLoaded", function () {
  // Event listener untuk pagination
  const prevBtn = document.getElementById("prevPage");
  const nextBtn = document.getElementById("nextPage");

  if (prevBtn) {
    prevBtn.addEventListener("click", function () {
      if (currentPage > 1) {
        changePage(currentPage - 1);
      }
    });
  }

  if (nextBtn) {
    nextBtn.addEventListener("click", function () {
      const totalPages = Math.ceil(sejarahData.length / recordsPerPage);
      if (currentPage < totalPages) {
        changePage(currentPage + 1);
      }
    });
  }

  // Event delegation untuk tombol edit dan delete
  document.addEventListener("click", handleCardActions);

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

  // Event listener untuk input pencarian
  const searchInput = document.getElementById("searchInput");
  if (searchInput) {
    searchInput.addEventListener("input", handleSearch);
  }

  // Inisialisasi tampilan
  initializeSejarahView();
});

// Fungsi untuk inisialisasi tampilan
function initializeSejarahView() {
  // Cek apakah ada fungsi untuk load data dari API
  if (typeof ReloadDataSejarah === "function") {
    // Load data dari API
    ReloadDataSejarah();
  } else {
    // Gunakan data contoh
    sejarahData = [...contohSejarahData];
    sortSejarahByYear();
    displaySejarahCards(currentPage);
  }
}

// Fungsi untuk menampilkan notifikasi
function showNotification(title, message, type = "success") {
  const notification = document.getElementById("global-notification");
  const notificationTitle = notification.querySelector(".notification-title");
  const notificationMessage = notification.querySelector(
    ".notification-message"
  );
  const notificationIcon = notification.querySelector(".notification-icon i");

  // Set warna berdasarkan type
  let color = "#048600"; // success (default)
  let icon = "fa-check-circle";

  if (type === "warning") {
    color = "#f59e0b";
    icon = "fa-exclamation-triangle";
  } else if (type === "error") {
    color = "#dc2626";
    icon = "fa-times-circle";
  } else if (type === "info") {
    color = "#3b82f6";
    icon = "fa-info-circle";
  }

  // Set konten
  notificationTitle.textContent = title;
  notificationMessage.textContent = message;
  notificationIcon.className = `fa-solid ${icon}`;
  notification.style.borderLeftColor = color;
  notificationIcon.style.color = color;

  // Tampilkan notifikasi
  notification.style.display = "flex";

  // Auto hide setelah 5 detik
  setTimeout(() => {
    notification.style.display = "none";
  }, 5000);
}

// Fungsi untuk export data (jika diperlukan)
function exportToCSV() {
  if (sejarahData.length === 0) {
    showNotification("Info", "Tidak ada data untuk diexport", "info");
    return;
  }

  // Buat header CSV
  let csv = "ID,Judul,Tahun,Deskripsi\n";

  // Tambahkan data
  sejarahData.forEach((sejarah) => {
    const escapedDeskripsi = sejarah.deskripsi.replace(/"/g, '""');
    csv += `${sejarah.id_sejarah},"${sejarah.judul_sejarah}","${sejarah.tahun_sejarah}","${escapedDeskripsi}"\n`;
  });

  // Buat blob dan download
  const blob = new Blob([csv], { type: "text/csv;charset=utf-8;" });
  const link = document.createElement("a");
  const url = URL.createObjectURL(blob);

  link.setAttribute("href", url);
  link.setAttribute(
    "download",
    `sejarah_sekolah_${new Date().toISOString().split("T")[0]}.csv`
  );
  link.style.visibility = "hidden";

  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);

  showNotification("Berhasil", "Data berhasil diexport ke CSV", "success");
}

// Jika ada tombol export, tambahkan event listener
document.addEventListener("DOMContentLoaded", function () {
  const exportBtn = document.querySelector(".export.button");
  if (exportBtn) {
    exportBtn.addEventListener("click", exportToCSV);
  }
});

// // Fungsi API placeholder (sesuaikan dengan backend Anda)
// async function PostTambahSejarah(tahun, deskripsi) {
//   // Implementasi API call untuk menambah sejarah
//   console.log("Menambah sejarah:", { tahun, deskripsi });
//   // Return true jika berhasil, false jika gagal
//   return true;
// }

// async function PostEditSejarah(id, tahun, deskripsi) {
//   // Implementasi API call untuk mengedit sejarah
//   console.log("Mengedit sejarah:", { id, tahun, deskripsi });
//   // Return true jika berhasil, false jika gagal
//   return true;
// }

// async function DeleteSejarah(id) {
//   // Implementasi API call untuk menghapus sejarah
//   console.log("Menghapus sejarah dengan ID:", id);
//   // Return true jika berhasil, false jika gagal
//   return true;
// }
