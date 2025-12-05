// VARIABEL GLOBAL PAGINATION
let currentPage = 1;
const recordsPerPage = 15;

// Data fasilitas hardcoded
let fasilitasData = [
  {
    id_fasilitas: 1,
    nama_fasilitas: "Perpustakaan Sekolah",
    deskripsi_fasilitas: "Perpustakaan sekolah dengan koleksi lebih dari 10.000 buku dari berbagai genre dan kategori. Dilengkapi dengan ruang baca yang nyaman dan area komputer untuk penelitian.",
    foto: [
      {
        id_foto_fasilitas: 1,
        id_fasilitas: 1,
        url_foto: "https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
        posisi: 1
      }
    ]
  },
  {
    id_fasilitas: 2,
    nama_fasilitas: "Laboratorium Komputer",
    deskripsi_fasilitas: "Laboratorium komputer modern dengan 40 unit komputer terbaru, jaringan internet cepat, dan perangkat lunak pendidikan terkini untuk mendukung proses belajar mengajar.",
    foto: [
      {
        id_foto_fasilitas: 2,
        id_fasilitas: 2,
        url_foto: "https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
        posisi: 1
      }
    ]
  },
  {
    id_fasilitas: 3,
    nama_fasilitas: "Lapangan Olahraga",
    deskripsi_fasilitas: "Lapangan olahraga multifungsi dengan ukuran standar untuk sepak bola, basket, voli, dan atletik. Dilengkapi dengan tribun penonton dan pencahayaan untuk kegiatan malam.",
    foto: [
      {
        id_foto_fasilitas: 3,
        id_fasilitas: 3,
        url_foto: "https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
        posisi: 1
      }
    ]
  },
  {
    id_fasilitas: 4,
    nama_fasilitas: "Laboratorium Sains",
    deskripsi_fasilitas: "Laboratorium sains lengkap untuk praktikum fisika, kimia, dan biologi. Dilengkapi dengan peralatan modern, bahan praktikum, dan sistem keamanan yang memadai.",
    foto: [
      {
        id_foto_fasilitas: 4,
        id_fasilitas: 4,
        url_foto: "https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
        posisi: 1
      }
    ]
  },
  {
    id_fasilitas: 5,
    nama_fasilitas: "Aula Serbaguna",
    deskripsi_fasilitas: "Aula serbaguna dengan kapasitas 500 orang, dilengkapi sistem audio visual modern, panggung permanen, dan AC untuk berbagai acara sekolah seperti upacara, seminar, dan pertunjukan.",
    foto: [
      {
        id_foto_fasilitas: 5,
        id_fasilitas: 1,
        url_foto: "https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
        posisi: 1
      }
    ]
  },
  {
    id_fasilitas: 6,
    nama_fasilitas: "Kantin Sekolah",
    deskripsi_fasilitas: "Kantin sekolah yang bersih dan sehat dengan berbagai pilihan makanan dan minuman. Dilengkapi dengan area makan yang nyaman dan sistem pembayaran digital.",
    foto: [
      {
        id_foto_fasilitas: 1,
        id_fasilitas: 1,
        url_foto: "https://images.unsplash.com/photo-1554679665-f5537f187268?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
        posisi: 1
      }
    ]
  }
];

// Generate data dummy tambahan untuk demo pagination
function generateDummyData(count) {
  const fasilitasNames = [
    "Laboratorium Bahasa",
    "Studio Musik",
    "Taman Baca",
    "Kolam Renang",
    "Wall Climbing",
    "Green House",
    "Studio Seni Rupa",
    "Ruang Multimedia",
    "Lab Robotik",
    "Musholla Sekolah",
    "Ruang BK",
    "Klinik Kesehatan",
    "Parkir Guru",
    "Parkir Siswa",
    "Gudang Sekolah"
  ];

  const descriptions = [
    "Laboratorium bahasa modern untuk pembelajaran bahasa asing dengan teknologi terbaru.",
    "Studio musik dilengkapi dengan berbagai alat musik untuk mengembangkan bakat seni siswa.",
    "Taman baca outdoor yang nyaman untuk kegiatan membaca di alam terbuka.",
    "Kolam renang standar untuk kegiatan olahraga air dan ekstrakurikuler renang.",
    "Fasilitas wall climbing untuk mengembangkan keberanian dan ketangkasan fisik siswa.",
    "Green house untuk praktikum biologi dan pengembangan tanaman edukatif.",
    "Studio seni rupa dengan peralatan lengkap untuk mengekspresikan kreativitas siswa.",
    "Ruang multimedia dengan peralatan audio visual canggih untuk presentasi dan pembelajaran.",
    "Laboratorium robotik untuk pembelajaran programming dan teknologi robot.",
    "Tempat ibadah yang nyaman dan representatif untuk seluruh warga sekolah.",
    "Ruang bimbingan konseling untuk konsultasi akademik dan pribadi siswa.",
    "Klinik kesehatan sekolah dengan tenaga medis dan peralatan P3K lengkap.",
    "Area parkir khusus untuk guru dan staff sekolah yang aman dan terawat.",
    "Area parkir luas untuk kendaraan siswa dengan sistem pengaturan yang rapi.",
    "Gudang penyimpanan untuk peralatan sekolah dan inventaris lainnya."
  ];

  const imageUrls = [
    "https://images.unsplash.com/photo-1481627834876-b7833e8f5570",
    "https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4",
    "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b",
    "https://images.unsplash.com/photo-1557804506-669a67965ba0",
    "https://images.unsplash.com/photo-1523580494863-6f3031224c94",
    "https://images.unsplash.com/photo-1517048676732-d65bc937f952",
    "https://images.unsplash.com/photo-1503676260728-1c00da094a0b",
    "https://images.unsplash.com/photo-1516321318423-f06f85e504b3",
    "https://images.unsplash.com/photo-1558618666-fcd25c85cd64",
    "https://images.unsplash.com/photo-1497366754035-f200968a6e72",
    "https://images.unsplash.com/photo-1549399542-7e3f8b79c341",
    "https://images.unsplash.com/photo-1560518883-ce09059eeffa",
    "https://images.unsplash.com/photo-1560518883-ce09059eeffa"
  ];

  for (let i = 7; i <= count; i++) {
    const randomName = fasilitasNames[Math.floor(Math.random() * fasilitasNames.length)];
    const randomDesc = descriptions[Math.floor(Math.random() * descriptions.length)];
    const randomImage = imageUrls[Math.floor(Math.random() * imageUrls.length)];

    fasilitasData.push({
      id_fasilitas: i,
      nama_fasilitas: randomName,
      deskripsi_fasilitas: randomDesc,
      foto: [
        {
          id_foto_fasilitas: i,
          id_fasilitas: 1,
          url_foto: `${randomImage}?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80&v=${i}`,
          posisi: 1
        }
      ]
    });
  }
}

function GetFacilityById(id_fasilitas) {
  for (let i = 0; i < fasilitasData.length; i++) {
    if (fasilitasData[i]['id_fasilitas'] == id_fasilitas) {
      return fasilitasData[i];
    }
  }
  return null;
}

// Fungsi untuk menampilkan fasilitas pada halaman tertentu
function displayFacilitiesCards(page = 1) {
  const facilitiesContainer = document.getElementById("facilitiesContainer");
  const emptyData = document.getElementById("emptyData");
  const paginationContainer = document.getElementById("paginationContainer");

  // Jika tidak ada data
  if (fasilitasData.length === 0) {
    emptyData.style.display = "flex";
    facilitiesContainer.style.display = "none";
    paginationContainer.style.display = "none";
    return;
  }

  emptyData.style.display = "none";
  facilitiesContainer.style.display = "grid";
  paginationContainer.style.display = "flex";

  // Kosongkan container
  facilitiesContainer.innerHTML = '';

  // Hitung indeks data untuk halaman ini
  const startIndex = (page - 1) * recordsPerPage;
  const endIndex = Math.min(startIndex + recordsPerPage, fasilitasData.length);
  const pageData = fasilitasData.slice(startIndex, endIndex);

  // Tampilkan data
  pageData.forEach((fasilitas, index) => {
    const card = document.createElement('div');
    card.className = 'facility-card';
    const globalIndex = startIndex + index;

    const urlFoto = fasilitas.foto.length > 0 ? fasilitas.foto[0].url_foto : "";

    imageText = wrapText(fasilitas.nama_fasilitas);

    card.innerHTML = `
      <div class="facility-image">
        <img src="${urlFoto}" alt="${fasilitas.nama_fasilitas}" 
             onerror="src=''; this.src='https://placehold.co/800?text=${imageText}&font=roboto';">
      </div>
      <div class="facility-content">
        <h3 class="facility-title">${fasilitas.nama_fasilitas}</h3>
        <p class="facility-description">${fasilitas.deskripsi_fasilitas}</p>
      </div>
      <div class="facility-actions">
        <button class="action-btn edit" data-id="${fasilitas.id_fasilitas}">
          <i class="fas fa-edit"></i> Edit
        </button>
        <button class="action-btn delete" data-id="${fasilitas.id_fasilitas}">
          <i class="fas fa-trash"></i> Hapus
        </button>
      </div>
    `;

    facilitiesContainer.appendChild(card);
  });

  // Update informasi pagination
  updatePaginationInfo(page);

  // Update tombol pagination
  updatePaginationControls(page);
}

// Fungsi untuk update informasi pagination
function updatePaginationInfo(page) {
  const startIndex = (page - 1) * recordsPerPage + 1;
  const endIndex = Math.min(page * recordsPerPage, fasilitasData.length);
  const totalData = fasilitasData.length;

  document.getElementById("paginationInfo").textContent =
    `Menampilkan ${startIndex}-${endIndex} dari ${totalData} data`;
}

// Fungsi untuk update kontrol pagination
function updatePaginationControls(page) {
  const totalPages = Math.ceil(fasilitasData.length / recordsPerPage);
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
  displayFacilitiesCards(page);
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
    url_foto_arr = Object.values(facility.foto).map(foto => foto.url_foto).filter(url => url);

    // Jika ada foto, tampilkan preview
    if (url_foto_arr.length > 0) {

      document.getElementById("previewImage").src = url_foto_arr[0];
      document.getElementById("imagePlaceholder").style.display = "none";
      document.getElementById("imagePreview").style.display = "flex";
      
      handleResumeInput(url_foto_arr);
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
  if (!facility) return;

  currentDeleteId = facility['id_fasilitas'];

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

  const foto_fasilitas = document.getElementById("imageInput").files[0] ? document.getElementById("imageInput").files : null;

  if (!nama.trim()) {
    alert("Nama fasilitas harus diisi!");
    return;
  }

  if (!deskripsi.trim()) {
    alert("Deskripsi fasilitas harus diisi!");
    return;
  }

  let success = false;

  if (currentMode === "add") {
    success = await PostTambahFasilitas(nama, deskripsi, foto_fasilitas);
    alert(success ? "Data fasilitas berhasil ditambahkan" : "Data fasilitas gagal ditambahkan");
  } else {
    success = await PostEditFasilitas(currentEditId, nama, deskripsi, foto_fasilitas);
    alert(success ? `Data fasilitas ${nama} berhasil diperbarui!` : "Data fasilitas gagal diperbarui");
  }

  if (success) {
    // Refresh fasilitas cards
    // displayFacilitiesCards(currentPage);
    closePopup();
  }
}

// Fungsi untuk konfirmasi delete
async function confirmDelete() {
  if (currentDeleteId) {
    const facility = GetFacilityById(currentDeleteId);
    if (!facility) {
      alert('Fasilitas tidak ditemukan!');
      return;
    }

    const success = await PostDeleteFasilitas(facility['id_fasilitas']);
    alert(success ? `Data fasilitas ${facility['nama_fasilitas']} berhasil dihapus!` : `Data fasilitas ${facility['nama_fasilitas']} gagal dihapus!`);

    if (success) {
      // Refresh fasilitas cards
      // displayFacilitiesCards(currentPage);
      closeDeletePopup();
    }
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
  // Event listener untuk pagination
  document.getElementById('prevPage').addEventListener('click', function () {
    if (currentPage > 1) {
      changePage(currentPage - 1);
    }
  });

  document.getElementById('nextPage').addEventListener('click', function () {
    const totalPages = Math.ceil(fasilitasData.length / recordsPerPage);
    if (currentPage < totalPages) {
      changePage(currentPage + 1);
    }
  });

  // Event delegation untuk tombol edit dan delete di card fasilitas
  document.addEventListener('click', function (e) {
    const editBtn = e.target.closest('.action-btn.edit');
    const deleteBtn = e.target.closest('.action-btn.delete');

    if (editBtn) {
      const id_fasilitas = parseInt(editBtn.getAttribute('data-id'));
      openEditPopup(id_fasilitas);
    }

    if (deleteBtn) {
      const id_fasilitas = parseInt(deleteBtn.getAttribute('data-id'));
      const facility = GetFacilityById(id_fasilitas);
      if (facility) {
        openDeletePopup(id_fasilitas);
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
  imageUploadArea.addEventListener("click", function (e) {
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
  
  window.onload = () => {
    if (typeof ReloadDataFasilitas == "function") {
      // Reload data jika modul database ditemukan
      ReloadDataFasilitas();
    }
    else {
      // Generate 30 data dummy untuk demo pagination
      generateDummyData(30);
      displayFacilitiesCards(currentPage);
    }
  }
});


// Fungsi API placeholder
// async function PostTambahFasilitas(nama, deskripsi, foto_fasilitas) {
//   console.log("Menambah fasilitas:", { nama, deskripsi, foto_fasilitas });
//   return true;
// }

// async function PostEditFasilitas(id, nama, deskripsi, foto_fasilitas) {
//   console.log("Mengedit fasilitas:", { id, nama, deskripsi, foto_fasilitas });
//   return true;
// }

// async function DeleteFasilitas(id) {
//   console.log("Menghapus fasilitas dengan ID:", id);
//   return true;
// }