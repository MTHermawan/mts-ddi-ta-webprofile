// VARIABEL GLOBAL PAGINATION
let currentPage = 1;
const recordsPerPage = 15;

// Data agenda hardcoded
let agendaData = [
  {
    id_agenda: 1,
    judul: "Rapat Orang Tua dan Guru Semester Genap",
    deskripsi:
      "Rapat evaluasi perkembangan siswa dan pembahasan program pembelajaran semester genap. Orang tua diharapkan hadir untuk membahas kemajuan putra-putrinya.",
    tanggal: "25 Mar 2024",
    waktu: "08.00 - 12.00 WIB",
    lokasi: "Aula Serbaguna",
    url_foto:
      "https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_agenda: 2,
    judul: "Ujian Nasional Berbasis Komputer 2024",
    deskripsi:
      "Pelaksanaan Ujian Nasional untuk siswa kelas XII. Peserta diwajibkan hadir 30 menit sebelum jadwal ujian dan membawa kartu peserta serta alat tulis.",
    tanggal: "1-5 Apr 2024",
    waktu: "07.30 - 12.00 WIB",
    lokasi: "Lab Komputer",
    url_foto:
      "https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_agenda: 3,
    judul: "Pentas Seni dan Budaya Tahun 2024",
    deskripsi:
      "Pagelaran seni dan budaya menampilkan bakat siswa dalam bidang musik, tari, teater, dan seni rupa. Terbuka untuk umum dengan tiket masuk gratis.",
    tanggal: "15 Apr 2024",
    waktu: "14.00 - 21.00 WIB",
    lokasi: "Lapangan Sekolah",
    url_foto:
      "https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_agenda: 4,
    judul: "Study Tour ke Yogyakarta",
    deskripsi:
      "Kunjungan edukatif ke berbagai situs bersejarah dan budaya di Yogyakarta. Peserta akan mengunjungi Candi Borobudur, Keraton Yogyakarta, dan Malioboro.",
    tanggal: "20-22 Apr 2024",
    waktu: "3 Hari 2 Malam",
    lokasi: "Yogyakarta",
    url_foto:
      "https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_agenda: 5,
    judul: "Seminar Karir dan Persiapan Kuliah",
    deskripsi:
      "Seminar untuk mempersiapkan siswa kelas XII dalam memilih jurusan kuliah dan karir masa depan. Menghadirkan pembicara dari berbagai universitas ternama.",
    tanggal: "28 Apr 2024",
    waktu: "09.00 - 15.00 WIB",
    lokasi: "Ruang Multimedia",
    url_foto:
      "https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_agenda: 6,
    judul: "Class Meeting Akhir Tahun 2024",
    deskripsi:
      "Kompetisi olahraga dan seni antar kelas sebagai penutup tahun ajaran. Berbagai lomba akan diadakan termasuk futsal, basket, pidato, dan paduan suara.",
    tanggal: "5-7 Mei 2024",
    waktu: "08.00 - 16.00 WIB",
    lokasi: "Lapangan & Aula",
    url_foto:
      "https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
];

// Generate data dummy tambahan untuk demo pagination
function generateDummyData(count) {
  const judulAgenda = [
    "Workshop Literasi Digital untuk Guru",
    "Peringatan Hari Kartini 2024",
    "Lomba Mewarnai Tingkat SD",
    "Pelatihan Pembuatan Media Pembelajaran",
    "Kegiatan Donor Darah Rutin",
    "Seminar Anti Bullying di Sekolah",
    "Kunjungan Industri ke Pabrik Tekstil",
    "Pelatihan P3K untuk Siswa",
    "Kegiatan Gotong Royong Lingkungan Sekolah",
    "Workshop Menulis Kreatif",
    "Kompetisi Robotik Antar Sekolah",
    "Pelatihan Kepemimpinan OSIS",
    "Kegiatan Bakti Sosial ke Panti Jompo",
    "Seminar Pendidikan Karakter",
    "Lomba Desain Poster Lingkungan",
    "Pelatihan Public Speaking",
    "Kegiatan Outbound di Gunung Bunder",
    "Workshop Fotografi Jurnalistik",
    "Seminar Kesehatan Reproduksi Remaja",
    "Kegiatan Menanam Pohon Sekolah",
  ];

  const lokasiOptions = [
    "Aula Serbaguna",
    "Lab Komputer",
    "Lapangan Sekolah",
    "Ruang Multimedia",
    "Perpustakaan",
    "Laboratorium IPA",
    "Ruang OSIS",
    "Musholla Sekolah",
    "Taman Sekolah",
    "Green House",
    "Studio Musik",
    "Ruang Seni",
    "Kantin Sekolah",
    "Ruang Guru",
    "Gedung Olahraga",
  ];

  const waktuOptions = [
    "08.00 - 12.00 WIB",
    "07.30 - 12.00 WIB",
    "14.00 - 21.00 WIB",
    "09.00 - 15.00 WIB",
    "08.00 - 16.00 WIB",
    "13.00 - 17.00 WIB",
    "10.00 - 14.00 WIB",
    "15.00 - 18.00 WIB",
    "07.00 - 10.00 WIB",
    "16.00 - 19.00 WIB",
  ];

  const bulan = [
    "Jan",
    "Feb",
    "Mar",
    "Apr",
    "Mei",
    "Jun",
    "Jul",
    "Agu",
    "Sep",
    "Okt",
    "Nov",
    "Des",
  ];
  const tahun = 2024;

  const imageUrls = [
    "https://images.unsplash.com/photo-1540575467063-178a50c2df87",
    "https://images.unsplash.com/photo-1434030216411-0b793f4b4173",
    "https://images.unsplash.com/photo-1492684223066-81342ee5ff30",
    "https://images.unsplash.com/photo-1542744173-8e7e53415bb0",
    "https://images.unsplash.com/photo-1575361204480-aadea25e6e68",
    "https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4",
    "https://images.unsplash.com/photo-1559027615-cd4628902d4a",
    "https://images.unsplash.com/photo-1532094349884-543bc11b234d",
    "https://images.unsplash.com/photo-1481627834876-b7833e8f5570",
    "https://images.unsplash.com/photo-1557804506-669a67965ba0",
  ];

  for (let i = 7; i <= count; i++) {
    const randomJudul =
      judulAgenda[Math.floor(Math.random() * judulAgenda.length)];
    const randomLokasi =
      lokasiOptions[Math.floor(Math.random() * lokasiOptions.length)];
    const randomWaktu =
      waktuOptions[Math.floor(Math.random() * waktuOptions.length)];
    const randomImage = imageUrls[Math.floor(Math.random() * imageUrls.length)];

    // Generate tanggal acak
    const randomHari = Math.floor(Math.random() * 28) + 1;
    const randomHari2 = randomHari + Math.floor(Math.random() * 3) + 1;
    const randomBulan = bulan[Math.floor(Math.random() * bulan.length)];
    const tanggal =
      randomHari === randomHari2
        ? `${randomHari} ${randomBulan} ${tahun}`
        : `${randomHari}-${randomHari2} ${randomBulan} ${tahun}`;

    // Generate deskripsi acak
    const deskripsi = `Agenda ${randomJudul.toLowerCase()}. Kegiatan ini bertujuan untuk meningkatkan kualitas pendidikan dan pengalaman belajar siswa. Partisipasi aktif dari seluruh warga sekolah sangat diharapkan untuk kesuksesan acara ini.`;

    agendaData.push({
      id_agenda: i,
      judul: randomJudul,
      deskripsi: deskripsi,
      tanggal: tanggal,
      waktu: randomWaktu,
      lokasi: randomLokasi,
      url_foto: `${randomImage}?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80&v=${i}`,
    });
  }
}

// Generate 30 data dummy untuk demo pagination
generateDummyData(30);

function GetAgendaById(id_agenda) {
  for (let i = 0; i < agendaData.length; i++) {
    if (agendaData[i]["id_agenda"] == id_agenda) {
      return agendaData[i];
    }
  }
  return null;
}

// Fungsi untuk menampilkan agenda pada halaman tertentu
function displayAgendaCards(page = 1) {
  const agendaContainer = document.getElementById("agendaContainer");
  const emptyData = document.getElementById("emptyData");
  const paginationContainer = document.getElementById("paginationContainer");

  // Jika tidak ada data
  if (agendaData.length === 0) {
    emptyData.style.display = "flex";
    agendaContainer.style.display = "none";
    paginationContainer.style.display = "none";
    return;
  }

  emptyData.style.display = "none";
  agendaContainer.style.display = "grid";
  paginationContainer.style.display = "flex";

  // Kosongkan container
  agendaContainer.innerHTML = "";

  // Hitung indeks data untuk halaman ini
  const startIndex = (page - 1) * recordsPerPage;
  const endIndex = Math.min(startIndex + recordsPerPage, agendaData.length);
  const pageData = agendaData.slice(startIndex, endIndex);

  // Tampilkan data
  pageData.forEach((agenda, index) => {
    const card = document.createElement("div");
    card.className = "agenda-card";
    const globalIndex = startIndex + index;

    placeHolderUrl = imagePlaceholderUrl(agenda.judul);

    card.innerHTML = `
      <div class="agenda-image">
        <img src="${agenda.url_foto}" alt="${agenda.judul}" 
             onerror="this.onerror=null; this.src='${placeHolderUrl}'">
        <div class="agenda-date">${agenda.tanggal}</div>
      </div>
      <div class="agenda-content">
        <div class="agenda-information">
          <h3 class="agenda-title">${agenda.judul}</h3>
          <p class="agenda-description">${agenda.deskripsi}</p>
        </div>
        <div class="agenda-meta">
          <div class="agenda-time">
            <i class="fas fa-clock"></i>
            <span>${agenda.waktu}</span>
          </div>
          <div class="agenda-location">
            <i class="fas fa-map-marker-alt"></i>
            <span>${agenda.lokasi}</span>
          </div>
        </div>
      </div>
      <div class="agenda-actions">
        <button class="action-btn edit" data-id="${agenda.id_agenda}">
          <i class="fas fa-edit"></i> Edit
        </button>
        <button class="action-btn delete" data-id="${agenda.id_agenda}">
          <i class="fas fa-trash"></i> Hapus
        </button>
      </div>
    `;

    agendaContainer.appendChild(card);
  });

  // Update informasi pagination
  updatePaginationInfo(page);

  // Update tombol pagination
  updatePaginationControls(page);
}

// Fungsi untuk update informasi pagination
function updatePaginationInfo(page) {
  const startIndex = (page - 1) * recordsPerPage + 1;
  const endIndex = Math.min(page * recordsPerPage, agendaData.length);
  const totalData = agendaData.length;

  document.getElementById(
    "paginationInfo"
  ).textContent = `Menampilkan ${startIndex}-${endIndex} dari ${totalData} data`;
}

// Fungsi untuk update kontrol pagination
function updatePaginationControls(page) {
  const totalPages = Math.ceil(agendaData.length / recordsPerPage);
  const prevBtn = document.getElementById("prevPage");
  const nextBtn = document.getElementById("nextPage");
  const pageNumbers = document.getElementById("pageNumbers");

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
  displayAgendaCards(page);
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
    document.getElementById("dateInput").value = agenda.tanggal;
    document.getElementById("timeInput").value = agenda.waktu;
    document.getElementById("placeInput").value = agenda.lokasi;
    document.getElementById("titleInput").value = agenda.judul;
    document.getElementById("descriptionInput").value = agenda.deskripsi;

    // Jika ada foto, tampilkan preview
    if (agenda.url_foto) {
      document.getElementById("previewImage").src = agenda.url_foto;
      document.getElementById("imagePlaceholder").style.display = "none";
      document.getElementById("imagePreview").style.display = "flex";

      handleResumeInput('imageInput', agenda.url_foto);
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
  if (!agenda) return;

  currentDeleteId = agenda["id_agenda"];

  // Isi data yang akan dihapus
  document.getElementById("dataDate").textContent = agenda["tanggal"];
  document.getElementById("dataPlace").textContent = agenda["lokasi"];
  document.getElementById("dataTime").textContent = agenda["waktu"];
  document.getElementById("dataName").textContent = agenda["judul"];
  document.getElementById("dataDescription").textContent = agenda["deskripsi"];

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
    showWarning("Harap pilih file gambar yang valid (PNG, JPG, JPEG)");
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
  const tanggal = document.getElementById("dateInput").value;
  const waktu = document.getElementById("timeInput").value;
  const lokasi = document.getElementById("placeInput").value;
  const judul = document.getElementById("titleInput").value;
  const deskripsi = document.getElementById("descriptionInput").value;
  const foto_agenda = document.getElementById("imageInput").files[0] ?? null;

  if (!judul.trim()) {
    showWarning("Judul agenda harus diisi!");
    return;
  }

  if (!deskripsi.trim()) {
    showWarning("Deskripsi agenda harus diisi!");
    return;
  }

  if (!tanggal.trim()) {
    showWarning("Tanggal agenda harus diisi!");
    return;
  }

  if (!waktu.trim()) {
    showWarning("Waktu agenda harus diisi!");
    return;
  }

  if (!lokasi.trim()) {
    showWarning("Lokasi agenda harus diisi!");
    return;
  }

  let success = false;

  if (currentMode === "add") {
    success = await PostTambahAgenda(
      judul,
      deskripsi,
      tanggal,
      waktu,
      lokasi,
      foto_agenda
    );
    success ? showSuccess("Agenda berhasil ditambahkan!") : showError("Agenda gagal ditambahkan!");
  } else {
    success = await PostEditAgenda(
      currentEditId,
      judul,
      deskripsi,
      tanggal,
      waktu,
      lokasi,
      foto_agenda
    );
    success ? showSuccess(`Agenda "${judul}" berhasil diperbarui!`) : showError("Agenda gagal diperbarui!");
  }

  if (success) {
    // Refresh agenda cards
    // displayAgendaCards(currentPage);
    closePopup();
  }
}

// Fungsi untuk konfirmasi delete
async function confirmDelete() {
  if (currentDeleteId) {
    const agenda = GetAgendaById(currentDeleteId);
    if (!agenda) {
      showWarning("Agenda tidak ditemukan!");
      return;
    }

    const success = await PostDeleteAgenda(agenda["id_agenda"]);
    success ? showSuccess(`Agenda "${agenda["judul"]}" berhasil dihapus!`) : showError(`Agenda "${agenda["judul"]}" gagal dihapus!`);

    if (success) {
      // Refresh agenda cards
      // displayAgendaCards(currentPage);
      closeDeletePopup();
    }
  }
}

// Fungsi untuk reset form
function resetForm() {
  document.getElementById("dateInput").value = "";
  document.getElementById("timeInput").value = "";
  document.getElementById("placeInput").value = "";
  document.getElementById("titleInput").value = "";
  document.getElementById("descriptionInput").value = "";
  removeImage();
  currentMode = "add";
  currentEditId = null;
}

// Inisialisasi event ketika DOM siap
document.addEventListener("DOMContentLoaded", function () {
  // Event listener untuk pagination
  document.getElementById("prevPage").addEventListener("click", function () {
    if (currentPage > 1) {
      changePage(currentPage - 1);
    }
  });

  document.getElementById("nextPage").addEventListener("click", function () {
    const totalPages = Math.ceil(agendaData.length / recordsPerPage);
    if (currentPage < totalPages) {
      changePage(currentPage + 1);
    }
  });

  // Tampilkan agenda halaman pertama
  // displayAgendaCards(currentPage);

  // Event delegation untuk tombol edit dan delete di card agenda
  document.addEventListener("click", function (e) {
    const editBtn = e.target.closest(".action-btn.edit");
    const deleteBtn = e.target.closest(".action-btn.delete");

    if (editBtn) {
      const id_agenda = parseInt(editBtn.getAttribute("data-id"));
      openEditPopup(id_agenda);
    }

    if (deleteBtn) {
      const id_agenda = parseInt(deleteBtn.getAttribute("data-id"));
      const agenda = GetAgendaById(id_agenda);
      if (agenda) {
        openDeletePopup(id_agenda);
      }
    }
  });

  const imageUploadArea = document.getElementById("imageUploadArea");
  const imageInput = document.getElementById("imageInput");

  // Event untuk input file
  imageInput.addEventListener("change", function (e) {
    if (e.target.files.length > 0) {
      handleImageSelection(e.target.files[0]);
    }
  });

  // Event untuk upload area
  let isUploadAreaProcessing = false;

  imageUploadArea.addEventListener("click", function (e) {
    if (e.target.closest(".image-preview-actions")) {
      return;
    }

    if (isUploadAreaProcessing) return;
    isUploadAreaProcessing = true;

    triggerImageInput();

    setTimeout(() => {
      isUploadAreaProcessing = false;
    }, 100);
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

  // Tutup popup ketika klik di luar deskripsi
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
    
    window.onload = () => {
    if (typeof ReloadDataAgenda == "function") {
      ReloadDataAgenda();
    }
    else {
      // Generate 30 data dummy untuk demo pagination
      generateDummyData(30);
      displayAgendaCards(currentPage);
    }
  }
});

// // Fungsi API placeholder
// async function PostTambahAgenda(
//   judul,
//   deskripsi,
//   tanggal,
//   waktu,
//   lokasi,
//   foto_agenda
// ) {
//   console.log("Menambah agenda:", {
//     judul,
//     deskripsi,
//     tanggal,
//     waktu,
//     lokasi,
//     foto_agenda,
//   });
//   return true;
// }

// async function PostEditAgenda(
//   id,
//   judul,
//   deskripsi,
//   tanggal,
//   waktu,
//   lokasi,
//   foto_agenda
// ) {
//   console.log("Mengedit agenda:", {
//     id,
//     judul,
//     deskripsi,
//     tanggal,
//     waktu,
//     lokasi,
//     foto_agenda,
//   });
//   return true;
// }

// async function DeleteAgenda(id) {
//   console.log("Menghapus agenda dengan ID:", id);
//   return true;
// }
