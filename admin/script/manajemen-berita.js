// VARIABEL GLOBAL PAGINATION
let currentPage = 1;
const recordsPerPage = 15;

// Data berita hardcoded
let beritaData = [
  {
    id_berita: 1,
    judul_berita: "Penerimaan Siswa Baru Tahun Ajaran 2024/2025 Telah Dibuka",
    deskripsi: "Pendaftaran siswa baru untuk tahun ajaran 2024/2025 telah dibuka. Kuota terbatas hanya untuk 200 siswa. Segera daftarkan putra-putri Anda untuk mendapatkan pendidikan terbaik.",
    tanggal: "15 Mar 2024",
    penulis: "Admin Sekolah",
    url_foto: "https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_berita: 2,
    judul_berita: "Siswa SMA Kita Juara Olimpiade Sains Nasional 2024",
    deskripsi: "Bangga! Tim olimpiade sains SMA Kita berhasil meraih medali emas dalam Olimpiade Sains Nasional 2024. Prestasi ini membuktikan kualitas pendidikan sains di sekolah kita.",
    tanggal: "10 Mar 2024",
    penulis: "Guru Sains",
    url_foto: "https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_berita: 3,
    judul_berita: "Perpustakaan Sekolah Selesai Direnovasi, Kini Lebih Nyaman",
    deskripsi: "Setelah proses renovasi selama 2 bulan, perpustakaan sekolah kini telah dibuka kembali dengan fasilitas yang lebih lengkap dan suasana yang lebih nyaman untuk membaca.",
    tanggal: "5 Mar 2024",
    penulis: "Kepala Perpustakaan",
    url_foto: "https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_berita: 4,
    judul_berita: "Kegiatan Bakti Sosial Siswa di Panti Asuhan Kasih Bunda",
    deskripsi: "Siswa-siswi SMA Kita mengadakan kegiatan bakti sosial di Panti Asuhan Kasih Bunda. Kegiatan ini bertujuan untuk menumbuhkan rasa empati dan kepedulian sosial.",
    tanggal: "28 Feb 2024",
    penulis: "OSIS Sekolah",
    url_foto: "https://images.unsplash.com/photo-1559027615-cd4628902d4a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_berita: 5,
    judul_berita: "Workshop Teknologi: Mempersiapkan Siswa untuk Era Digital",
    deskripsi: "Sekolah mengadakan workshop teknologi selama 3 hari untuk mempersiapkan siswa menghadapi tantangan era digital. Workshop mencakup pemrograman, desain grafis, dan digital marketing.",
    tanggal: "22 Feb 2024",
    penulis: "Tim IT Sekolah",
    url_foto: "https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_berita: 6,
    judul_berita: "Tim Futsal SMA Kita Juara Turnamen Antar Sekolah Se-Kota",
    deskripsi: "Tim futsal SMA Kita berhasil menjadi juara dalam turnamen futsal antar sekolah se-kota. Kemenangan ini diraih setelah pertandingan final yang sangat menegangkan.",
    tanggal: "18 Feb 2024",
    penulis: "Pelatih Olahraga",
    url_foto: "https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  }
];

// Generate data dummy tambahan untuk demo pagination
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
    "Kunjungan Edukasi ke Museum Nasional"
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
    "Guru BK"
  ];
  
  const bulan = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
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
    "https://images.unsplash.com/photo-1517048676732-d65bc937f952"
  ];
  
  for (let i = 7; i <= count; i++) {
    const randomJudul = judulBerita[Math.floor(Math.random() * judulBerita.length)];
    const randomPenulis = penulisOptions[Math.floor(Math.random() * penulisOptions.length)];
    const randomImage = imageUrls[Math.floor(Math.random() * imageUrls.length)];
    
    // Generate tanggal acak
    const randomHari = Math.floor(Math.random() * 28) + 1;
    const randomBulan = bulan[Math.floor(Math.random() * bulan.length)];
    const tanggal = `${randomHari} ${randomBulan} ${tahun}`;
    
    // Generate deskripsi acak
    const deskripsi = `Berita tentang ${randomJudul.toLowerCase()}. Kegiatan ini diadakan untuk meningkatkan kualitas pendidikan dan pengembangan siswa di sekolah kita. Partisipasi siswa sangat antusias dan memberikan dampak positif bagi perkembangan mereka.`;
    
    beritaData.push({
      id_berita: i,
      judul_berita: randomJudul,
      deskripsi: deskripsi,
      tanggal: tanggal,
      penulis: randomPenulis,
      url_foto: `${randomImage}?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80&v=${i}`
    });
  }
}

// Generate 30 data dummy untuk demo pagination
generateDummyData(30);

function GetBeritaById(id_berita) {
  for (let i = 0; i < beritaData.length; i++) {
    if (beritaData[i]["id_berita"] == id_berita) {
      return beritaData[i];
    }
  }
  return null;
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
  beritaContainer.innerHTML = '';
  
  // Hitung indeks data untuk halaman ini
  const startIndex = (page - 1) * recordsPerPage;
  const endIndex = Math.min(startIndex + recordsPerPage, beritaData.length);
  const pageData = beritaData.slice(startIndex, endIndex);
  
  // Tampilkan data
  pageData.forEach((berita, index) => {
    const card = document.createElement('div');
    card.className = 'berita-card';
    const globalIndex = startIndex + index;
    
    card.innerHTML = `
      <div class="berita-image">
        <img src="${berita.url_foto}" alt="${berita.judul_berita}" 
             onerror="this.onerror=null; this.src='https://via.placeholder.com/300x200?text=Gambar+Tidak+Tersedia'">
        <div class="berita-date">${berita.tanggal}</div>
      </div>
      <div class="berita-content">
        <h3 class="berita-title">${berita.judul_berita}</h3>
        <p class="berita-description">${berita.deskripsi}</p>
        <div class="berita-meta">
          <div class="berita-author">
            <i class="fas fa-user"></i>
            <span>${berita.penulis}</span>
          </div>
        </div>
      </div>
      <div class="berita-actions">
        <button class="action-btn edit" data-id="${berita.id_berita}">
          <i class="fas fa-edit"></i> Edit
        </button>
        <button class="action-btn delete" data-id="${berita.id_berita}">
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
  
  document.getElementById("paginationInfo").textContent = 
    `Menampilkan ${startIndex}-${endIndex} dari ${totalData} data`;
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
  pageNumbers.innerHTML = '';
  
  // Tampilkan maksimal 5 nomor halaman
  let startPage = Math.max(1, page - 2);
  let endPage = Math.min(totalPages, startPage + 4);
  
  // Adjust jika kurang dari 5 halaman
  if (endPage - startPage < 4) {
    startPage = Math.max(1, endPage - 4);
  }
  
  // Tombol halaman pertama
  if (startPage > 1) {
    const firstPage = document.createElement('span');
    firstPage.className = 'page-number';
    firstPage.textContent = '1';
    firstPage.onclick = () => changePage(1);
    pageNumbers.appendChild(firstPage);
    
    if (startPage > 2) {
      const ellipsis = document.createElement('span');
      ellipsis.className = 'page-number';
      ellipsis.textContent = '...';
      ellipsis.style.cursor = 'default';
      ellipsis.style.pointerEvents = 'none';
      pageNumbers.appendChild(ellipsis);
    }
  }
  
  // Nomor halaman
  for (let i = startPage; i <= endPage; i++) {
    const pageNumber = document.createElement('span');
    pageNumber.className = `page-number ${i === page ? 'active' : ''}`;
    pageNumber.textContent = i;
    pageNumber.onclick = () => changePage(i);
    pageNumbers.appendChild(pageNumber);
  }
  
  // Tombol halaman terakhir
  if (endPage < totalPages) {
    if (endPage < totalPages - 1) {
      const ellipsis = document.createElement('span');
      ellipsis.className = 'page-number';
      ellipsis.textContent = '...';
      ellipsis.style.cursor = 'default';
      ellipsis.style.pointerEvents = 'none';
      pageNumbers.appendChild(ellipsis);
    }
    
    const lastPage = document.createElement('span');
    lastPage.className = 'page-number';
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
  const tanggal = document.getElementById("dateInput").value;
  const penulis = document.getElementById("creatorInput").value;
  const foto_berita = document.getElementById("imageInput").files[0] ?? null;

  if (!judul.trim()) {
    alert("Judul berita harus diisi!");
    return;
  }

  if (!deskripsi.trim()) {
    alert("Deskripsi berita harus diisi!");
    return;
  }

  if (!tanggal.trim()) {
    alert("Tanggal berita harus diisi!");
    return;
  }

  if (!penulis.trim()) {
    alert("Penulis berita harus diisi!");
    return;
  }

  let success = false;
  
  if (currentMode === "add") {
    success = await PostTambahBerita(judul, deskripsi, tanggal, penulis, foto_berita);
    alert(success ? "Berita berhasil ditambahkan!" : "Berita gagal ditambahkan!");
  } else {
    success = await PostEditBerita(currentEditId, judul, deskripsi, tanggal, penulis, foto_berita);
    alert(success ? `Berita "${judul}" berhasil diperbarui!` : "Berita gagal diperbarui!");
  }

  if (success) {
    // Refresh berita cards
    displayBeritaCards(currentPage);
    closePopup();
  }
}

// Fungsi untuk konfirmasi delete
async function confirmDelete() {
  if (currentDeleteId) {
    const berita = GetBeritaById(currentDeleteId);
    if (!berita) {
      alert('Berita tidak ditemukan!');
      return;
    }
     
    const success = await DeleteBerita(berita['id_berita']);
    alert(success ? `Berita "${berita['judul_berita']}" berhasil dihapus!` : `Berita "${berita['judul_berita']}" gagal dihapus!`);
    
    if (success) {
      // Refresh berita cards
      displayBeritaCards(currentPage);
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

// Inisialisasi event ketika DOM siap
document.addEventListener("DOMContentLoaded", function () {
  // Event listener untuk pagination
  document.getElementById('prevPage').addEventListener('click', function() {
    if (currentPage > 1) {
      changePage(currentPage - 1);
    }
  });
  
  document.getElementById('nextPage').addEventListener('click', function() {
    const totalPages = Math.ceil(beritaData.length / recordsPerPage);
    if (currentPage < totalPages) {
      changePage(currentPage + 1);
    }
  });
  
  // Tampilkan berita halaman pertama
  displayBeritaCards(currentPage);

  // Event delegation untuk tombol edit dan delete di card berita
  document.addEventListener('click', function(e) {
    const editBtn = e.target.closest('.action-btn.edit');
    const deleteBtn = e.target.closest('.action-btn.delete');
    
    if (editBtn) {
      const id_berita = parseInt(editBtn.getAttribute('data-id'));
      openEditPopup(id_berita);
    }
    
    if (deleteBtn) {
      const id_berita = parseInt(deleteBtn.getAttribute('data-id'));
      const berita = GetBeritaById(id_berita);
      if (berita) {
        openDeletePopup(id_berita);
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

// Fungsi API placeholder
async function PostTambahBerita(judul, deskripsi, tanggal, penulis, foto_berita) {
  console.log("Menambah berita:", { judul, deskripsi, tanggal, penulis, foto_berita });
  return true;
}

async function PostEditBerita(id, judul, deskripsi, tanggal, penulis, foto_berita) {
  console.log("Mengedit berita:", { id, judul, deskripsi, tanggal, penulis, foto_berita });
  return true;
}

async function DeleteBerita(id) {
  console.log("Menghapus berita dengan ID:", id);
  return true;
}