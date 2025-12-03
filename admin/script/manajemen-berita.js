// VARIABEL GLOBAL
let currentPage = 1;
const recordsPerPage = 15;
let currentMode = "add";
let currentEditId = null;
let currentDeleteId = null;

// DATA BERITA
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
    pinned: true,
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
    pinned: false,
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
    pinned: false,
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
    pinned: false,
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
    pinned: false,
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
    pinned: false,
  },
];

// Generate data dummy tambahan
function generateDummyData(count) {
  const judulBerita = [
    "Workshop Kewirausahaan untuk Siswa Kelas XII",
    "Pentas Seni Akhir Tahun Sukses Digelar",
    "Kunjungan Industri ke PT. Teknologi Maju",
    "Sosialisasi Bahaya Narkoba di Kalangan Pelajar",
    "Pelatihan Kepemimpinan untuk Pengurus OSIS",
    "Kompetisi Debat Bahasa Inggris Tingkat Sekolah",
    "Peringatan Hari Pendidikan Nasional 2024",
    "Seminar Parenting untuk Orang Tua Siswa",
    "Pengenalan Kampus untuk Siswa Kelas XII",
    "Kegiatan Outbound di Gunung Pancar",
    "Lomba Cerdas Cermat 17 Agustus",
    "Pameran Karya Seni Rupa Siswa",
    "Pelatihan Jurnalistik Sekolah",
    "Kegiatan Donor Darah di Sekolah",
    "Seminar Kesehatan Mental Remaja",
    "Workshop Fotografi untuk Siswa",
    "Kompetisi Matematika Antar Kelas",
    "Kegiatan Pramuka Perkemahan Sabtu-Minggu",
    "Pelatihan Public Speaking",
    "Kunjungan Edukasi ke Museum Nasional",
  ];

  const penulisOptions = [
    "Admin Sekolah",
    "Guru Sains",
    "Kepala Perpustakaan",
    "OSIS Sekolah",
    "Tim IT Sekolah",
    "Pelatih Olahraga",
    "Wakil Kepala Sekolah",
    "Guru Bahasa",
    "Guru Matematika",
    "Guru Seni Budaya",
    "Guru IPS",
    "Guru Agama",
    "Pembina Pramuka",
    "Kepala Laboratorium",
    "Guru BK",
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
    "https://images.unsplash.com/photo-1532094349884-543bc11b234d",
    "https://images.unsplash.com/photo-1481627834876-b7833e8f5570",
    "https://images.unsplash.com/photo-1559027615-cd4628902d4a",
    "https://images.unsplash.com/photo-1575361204480-aadea25e6e68",
    "https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4",
    "https://images.unsplash.com/photo-1492684223066-81342ee5ff30",
    "https://images.unsplash.com/photo-1557804506-669a67965ba0",
    "https://images.unsplash.com/photo-1517486808906-6ca8b3f8f3be",
    "https://images.unsplash.com/photo-1523580494863-6f3031224c94",
    "https://images.unsplash.com/photo-1517048676732-d65bc937f952",
  ];

  for (let i = 7; i <= count; i++) {
    const randomJudul =
      judulBerita[Math.floor(Math.random() * judulBerita.length)];
    const randomPenulis =
      penulisOptions[Math.floor(Math.random() * penulisOptions.length)];
    const randomImage = imageUrls[Math.floor(Math.random() * imageUrls.length)];

    const randomHari = Math.floor(Math.random() * 28) + 1;
    const randomBulan = bulan[Math.floor(Math.random() * bulan.length)];
    const tanggal = `${randomHari} ${randomBulan} ${tahun}`;

    const deskripsi = `Berita tentang ${randomJudul.toLowerCase()}. Kegiatan ini diadakan untuk meningkatkan kualitas pendidikan dan pengembangan siswa di sekolah kita. Partisipasi siswa sangat antusias dan memberikan dampak positif bagi perkembangan mereka.`;

    beritaData.push({
      id_berita: i,
      judul_berita: randomJudul,
      deskripsi: deskripsi,
      tanggal: tanggal,
      penulis: randomPenulis,
      url_foto: `${randomImage}?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80&v=${i}`,
      pinned: false,
    });
  }
}

// Generate 30 data dummy
generateDummyData(30);

// Fungsi untuk mendapatkan berita berdasarkan ID
function GetBeritaById(id_berita) {
  return beritaData.find((berita) => berita.id_berita == id_berita);
}

// Fungsi untuk mengatur berita utama (pinned)
function setPinnedBerita(id_berita) {
  // Reset semua berita menjadi tidak pinned
  beritaData.forEach((berita) => {
    berita.pinned = false;
  });

  // Set berita yang dipilih sebagai pinned
  const berita = GetBeritaById(id_berita);
  if (berita) {
    berita.pinned = true;
    showNotification(`"${berita.judul_berita}" telah dijadikan berita utama!`);

    // Refresh tampilan
    displayBeritaCards(currentPage);
    updatePinnedSelect();
  }
}

// Fungsi untuk mendapatkan berita utama saat ini
function getPinnedBerita() {
  return beritaData.find((berita) => berita.pinned === true);
}

// Fungsi untuk update dropdown berita utama
function updatePinnedSelect() {
  const select = document.getElementById("pinnedBeritaSelect");
  if (!select) return;

  select.innerHTML = '<option value="">-- Pilih Berita --</option>';

  // Urutkan berita: yang pinned di atas
  const sortedBerita = [...beritaData].sort((a, b) => {
    if (a.pinned && !b.pinned) return -1;
    if (!a.pinned && b.pinned) return 1;
    return 0;
  });

  sortedBerita.forEach((berita) => {
    const option = document.createElement("option");
    option.value = berita.id_berita;
    option.textContent = berita.judul_berita;
    if (berita.pinned) {
      option.textContent += " ★ (Berita Utama)";
      option.selected = true;
    }
    select.appendChild(option);
  });
}

// Fungsi untuk set pinned dari dropdown
function setPinnedFromSelect() {
  const select = document.getElementById("pinnedBeritaSelect");
  if (!select || !select.value) {
    showNotification("Pilih berita terlebih dahulu!", "Peringatan", "warning");
    return;
  }

  const id_berita = parseInt(select.value);
  const berita = GetBeritaById(id_berita);

  if (
    berita &&
    confirm(
      `Apakah Anda yakin ingin menjadikan "${berita.judul_berita}" sebagai berita utama?`
    )
  ) {
    setPinnedBerita(id_berita);
  }
}

// Fungsi untuk menampilkan berita pada halaman tertentu
function displayBeritaCards(page = 1) {
  const beritaContainer = document.getElementById("beritaContainer");
  const emptyData = document.getElementById("emptyData");
  const paginationContainer = document.getElementById("paginationContainer");

  // Jika tidak ada data
  if (beritaData.length === 0) {
    emptyData.style.display = "flex";
    beritaContainer.style.display = "none";
    paginationContainer.style.display = "none";
    return;
  }

  emptyData.style.display = "none";
  beritaContainer.style.display = "grid";
  paginationContainer.style.display = "flex";

  // Kosongkan container
  beritaContainer.innerHTML = "";

  // Hitung indeks data untuk halaman ini
  const startIndex = (page - 1) * recordsPerPage;
  const endIndex = Math.min(startIndex + recordsPerPage, beritaData.length);

  // Ambil data untuk halaman ini
  const pageData = beritaData.slice(startIndex, endIndex);

  // Urutkan: pinned berita di awal
  const sortedPageData = [...pageData].sort((a, b) => {
    if (a.pinned && !b.pinned) return -1;
    if (!a.pinned && b.pinned) return 1;
    return 0;
  });

  // Tampilkan data
  sortedPageData.forEach((berita, index) => {
    const card = document.createElement("div");
    card.className = "berita-card";

    // Tambahkan class pinned jika berita ini adalah pinned
    if (berita.pinned) {
      card.classList.add("pinned");
    }

    card.innerHTML = `
          <div class="berita-image">
            <img src="${berita.url_foto}" alt="${berita.judul_berita}" 
                 onerror="this.onerror=null; this.src='https://via.placeholder.com/300x200?text=Gambar+Tidak+Tersedia'">
            <div class="berita-date">${berita.tanggal}</div>
            ${
              berita.pinned
                ? '<div class="pinned-badge"><i class="fas fa-thumbtack"></i> Berita Utama</div>'
                : ""
            }
          </div>
          <div class="berita-content">
            <h3 class="berita-title">${berita.judul_berita}</h3>
            <p class="berita-description">${berita.deskripsi}</p>
            <div class="berita-meta">
              <div class="berita-author">
                <i class="fas fa-user"></i>
                <span>${berita.penulis}</span>
              </div>
              <div class="berita-pinned-status">
                ${
                  berita.pinned
                    ? '<span class="pinned-status active"><i class="fas fa-star"></i> Berita Utama</span>'
                    : '<span class="pinned-status"><i class="far fa-star"></i> Biasa</span>'
                }
              </div>
            </div>
          </div>
          <div class="berita-actions">
            <button class="action-btn edit" data-id="${berita.id_berita}">
              <i class="fas fa-edit"></i> Edit
            </button>
            <button class="action-btn delete" data-id="${berita.id_berita}" ${
      berita.pinned ? "disabled" : ""
    }>
              <i class="fas fa-trash"></i> Hapus
            </button>
          </div>
        `;

    beritaContainer.appendChild(card);
  });

  // Update informasi pagination
  updatePaginationInfo(page);

  // Update tombol pagination
  updatePaginationControls(page);
}

// Fungsi untuk update informasi pagination
function updatePaginationInfo(page) {
  const startIndex = (page - 1) * recordsPerPage + 1;
  const endIndex = Math.min(page * recordsPerPage, beritaData.length);
  const totalData = beritaData.length;

  document.getElementById(
    "paginationInfo"
  ).textContent = `Menampilkan ${startIndex}-${endIndex} dari ${totalData} data`;
}

// Fungsi untuk update kontrol pagination
function updatePaginationControls(page) {
  const totalPages = Math.ceil(beritaData.length / recordsPerPage);
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
  displayBeritaCards(page);
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
    document.getElementById("dateInput").value = berita.tanggal;
    document.getElementById("creatorInput").value = berita.penulis;
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
  if (!berita) return;

  currentDeleteId = berita["id_berita"];

  // Isi data yang akan dihapus
  document.getElementById("dataName").textContent = berita["judul_berita"];
  document.getElementById("dataDate").textContent = berita["tanggal"];
  document.getElementById("dataCreator").textContent = berita["penulis"];
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
    showNotification(
      "Harap pilih file gambar yang valid (PNG, JPG, JPEG)",
      "Error",
      "error"
    );
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
  const tanggal = document.getElementById("dateInput").value;
  const penulis = document.getElementById("creatorInput").value;
  const foto_berita = document.getElementById("imageInput").files[0] ?? null;

  // Validasi
  if (!judul.trim()) {
    showNotification("Judul berita harus diisi!", "Peringatan", "warning");
    return;
  }

  if (!deskripsi.trim()) {
    showNotification("Deskripsi berita harus diisi!", "Peringatan", "warning");
    return;
  }

  if (!tanggal.trim()) {
    showNotification("Tanggal berita harus diisi!", "Peringatan", "warning");
    return;
  }

  if (!penulis.trim()) {
    showNotification("Penulis berita harus diisi!", "Peringatan", "warning");
    return;
  }

  let success = false;

  if (currentMode === "add") {
    // Untuk tambah berita baru
    const newId =
      beritaData.length > 0
        ? Math.max(...beritaData.map((b) => b.id_berita)) + 1
        : 1;
    const newBerita = {
      id_berita: newId,
      judul_berita: judul,
      deskripsi: deskripsi,
      tanggal: tanggal,
      penulis: penulis,
      url_foto: foto_berita
        ? URL.createObjectURL(foto_berita)
        : "https://via.placeholder.com/300x200?text=Tanpa+Gambar",
      pinned: false, // Selalu false untuk berita baru
    };

    beritaData.push(newBerita);
    success = true;

    showNotification(`Berita "${judul}" berhasil ditambahkan!`);
  } else {
    // Untuk edit berita
    const berita = GetBeritaById(currentEditId);
    if (berita) {
      berita.judul_berita = judul;
      berita.deskripsi = deskripsi;
      berita.tanggal = tanggal;
      berita.penulis = penulis;

      if (foto_berita) {
        berita.url_foto = URL.createObjectURL(foto_berita);
      }

      success = true;
      showNotification(`Berita "${judul}" berhasil diperbarui!`);
    }
  }

  if (success) {
    // Refresh berita cards
    displayBeritaCards(currentPage);
    updatePinnedSelect();
    closePopup();
  }
}

// Fungsi untuk konfirmasi delete
async function confirmDelete() {
  if (currentDeleteId) {
    const berita = GetBeritaById(currentDeleteId);
    if (!berita) {
      showNotification("Berita tidak ditemukan!", "Error", "error");
      return;
    }

    // Cek apakah berita yang akan dihapus adalah pinned
    if (berita.pinned) {
      showNotification(
        "Tidak dapat menghapus berita utama! Silakan ubah status berita utama terlebih dahulu.",
        "Peringatan",
        "warning"
      );
      closeDeletePopup();
      return;
    }

    // Hapus berita dari array
    const index = beritaData.findIndex((b) => b.id_berita === currentDeleteId);
    if (index !== -1) {
      beritaData.splice(index, 1);
      showNotification(`Berita "${berita.judul_berita}" berhasil dihapus!`);

      // Refresh berita cards
      displayBeritaCards(currentPage);
      updatePinnedSelect();
      closeDeletePopup();
    }
  }
}

// Fungsi untuk reset form
function resetForm() {
  document.getElementById("titleInput").value = "";
  document.getElementById("dateInput").value = "";
  document.getElementById("creatorInput").value = "";
  document.getElementById("descriptionInput").value = "";
  removeImage();
  currentMode = "add";
  currentEditId = null;
}

// Fungsi untuk menampilkan notifikasi dengan tipe
function showNotification(message, title = "Berhasil!", type = "success") {
  const notification = document.getElementById("global-notification");
  if (!notification) {
    console.log("Notification element not found");
    return;
  }

  const notificationTitle = notification.querySelector(".notification-title");
  const notificationMessage = notification.querySelector(
    ".notification-message"
  );
  const successIcon = notification.querySelector(".notification-icon.success");
  const errorIcon = notification.querySelector(".notification-icon.error");
  const warningIcon = notification.querySelector(".notification-icon.warning");

  if (notificationTitle && notificationMessage) {
    notificationTitle.textContent = title;
    notificationMessage.textContent = message;

    // Set tipe notifikasi
    notification.className = "notification-popup show " + type;

    // Tampilkan icon sesuai tipe
    if (successIcon)
      successIcon.style.display = type === "success" ? "block" : "none";
    if (errorIcon)
      errorIcon.style.display = type === "error" ? "block" : "none";
    if (warningIcon)
      warningIcon.style.display = type === "warning" ? "block" : "none";

    // Sembunyikan notifikasi setelah 3 detik
    setTimeout(() => {
      hideNotification();
    }, 3000);
  }
}

// Fungsi untuk menyembunyikan notifikasi
function hideNotification() {
  const notification = document.getElementById("global-notification");
  if (notification) {
    notification.classList.remove("show");
  }
}

// Inisialisasi event ketika DOM siap
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
      const totalPages = Math.ceil(beritaData.length / recordsPerPage);
      if (currentPage < totalPages) {
        changePage(currentPage + 1);
      }
    });
  }

  // Tampilkan berita halaman pertama
  displayBeritaCards(currentPage);
  updatePinnedSelect();

  // Event delegation untuk tombol edit dan delete di card berita
  document.addEventListener("click", function (e) {
    const editBtn = e.target.closest(".action-btn.edit");
    const deleteBtn = e.target.closest(".action-btn.delete");

    if (editBtn) {
      const id_berita = parseInt(editBtn.getAttribute("data-id"));
      openEditPopup(id_berita);
    }

    if (deleteBtn) {
      const id_berita = parseInt(deleteBtn.getAttribute("data-id"));
      const berita = GetBeritaById(id_berita);
      if (berita) {
        openDeletePopup(id_berita);
      }
    }
  });

  const imageUploadArea = document.getElementById("imageUploadArea");
  const imageInput = document.getElementById("imageInput");

  // Event untuk input file
  if (imageInput) {
    imageInput.addEventListener("change", function (e) {
      if (e.target.files.length > 0) {
        handleImageSelection(e.target.files[0]);
      }
    });
  }

  // Event untuk upload area
  let isUploadAreaProcessing = false;

  if (imageUploadArea) {
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
  }

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
  const popup = document.getElementById("popup");
  const deletePopup = document.getElementById("deletePopup");

  if (popup) {
    popup.addEventListener("click", function (e) {
      if (e.target === this) {
        closePopup();
      }
    });
  }

  if (deletePopup) {
    deletePopup.addEventListener("click", function (e) {
      if (e.target === this) {
        closeDeletePopup();
      }
    });
  }
});

async function PostTambahBerita(
  judul,
  deskripsi,
  tanggal,
  penulis,
  foto_berita
) {
  console.log("Menambah berita:", {
    judul,
    deskripsi,
    tanggal,
    penulis,
    foto_berita,
  });
  // Di sini Anda akan melakukan fetch ke API backend
  // Contoh: return fetch('/api/berita', { method: 'POST', body: ... })
  return true;
}

async function PostEditBerita(
  id,
  judul,
  deskripsi,
  tanggal,
  penulis,
  foto_berita
) {
  console.log("Mengedit berita:", {
    id,
    judul,
    deskripsi,
    tanggal,
    penulis,
    foto_berita,
  });
  // Di sini Anda akan melakukan fetch ke API backend
  return true;
}

async function DeleteBerita(id) {
  console.log("Menghapus berita dengan ID:", id);
  // Di sini Anda akan melakukan fetch ke API backend
  return true;
}
