// VARIABEL GLOBAL PAGINATION
let currentPage = 1;
const recordsPerPage = 15;

// Data galeri hardcoded
let galeriData = [
  {
    id_galeri: 1,
    judul_galeri: "Kegiatan Belajar Mengajar di Kelas",
    deskripsi_galeri:
      "Momen seru siswa-siswi dalam proses pembelajaran interaktif dengan metode modern yang menyenangkan.",
    url_foto:
      "https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_galeri: 2,
    judul_galeri: "Kegiatan Ekstrakurikuler Pramuka",
    deskripsi_galeri:
      "Siswa-siswi mengikuti latihan kepramukaan untuk mengembangkan karakter dan keterampilan kepemimpinan.",
    url_foto:
      "https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_galeri: 3,
    judul_galeri: "Praktikum di Laboratorium Sains",
    deskripsi_galeri:
      "Siswa melakukan eksperimen sains dengan peralatan modern untuk memahami konsep ilmiah secara langsung.",
    url_foto:
      "https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_galeri: 4,
    judul_galeri: "Kegiatan Membaca di Perpustakaan",
    deskripsi_galeri:
      "Siswa menikmati waktu membaca di perpustakaan sekolah yang nyaman dengan koleksi buku terlengkap.",
    url_foto:
      "https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_galeri: 5,
    judul_galeri: "Pentas Seni dan Budaya",
    deskripsi_galeri:
      "Penampilan spektakuler siswa dalam pentas seni yang menampilkan bakat di bidang musik, tari, dan teater.",
    url_foto:
      "https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
  {
    id_galeri: 6,
    judul_galeri: "Kegiatan Olahraga Sekolah",
    deskripsi_galeri:
      "Siswa berpartisipasi dalam berbagai kegiatan olahraga untuk menjaga kebugaran dan mengembangkan sportivitas.",
    url_foto:
      "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
  },
];

// Generate data dummy tambahan untuk demo pagination
function generateDummyData(count) {
  const titles = [
    "Upacara Bendera Mingguan",
    "Lomba Kebersihan Kelas",
    "Peringatan Hari Kemerdekaan",
    "Workshop Teknologi Digital",
    "Kunjungan Industri",
    "Bakti Sosial ke Panti Asuhan",
    "Seminar Karir",
    "Pameran Karya Siswa",
    "Festival Literasi",
    "Kompetisi Robotik",
  ];

  const descriptions = [
    "Kegiatan rutin untuk menanamkan nilai-nilai patriotisme dan kedisiplinan.",
    "Program untuk meningkatkan kesadaran akan pentingnya lingkungan bersih dan sehat.",
    "Berbagai lomba dan kegiatan untuk memperingati hari kemerdekaan Indonesia.",
    "Pelatihan untuk meningkatkan kemampuan siswa dalam teknologi digital.",
    "Kunjungan ke berbagai industri untuk memberikan wawasan dunia kerja.",
    "Aksi sosial sebagai bentuk kepedulian terhadap sesama.",
    "Acara untuk memberikan gambaran tentang berbagai pilihan karir di masa depan.",
    "Pameran untuk menunjukkan kreativitas dan bakat siswa dalam berbagai bidang.",
    "Kegiatan untuk meningkatkan minat baca dan menulis siswa.",
    "Kompetisi untuk mengasah kemampuan dalam bidang sains dan teknologi.",
  ];

  const imageUrls = [
    "https://images.unsplash.com/photo-1575361204480-aadea25e6e68",
    "https://images.unsplash.com/photo-1481627834876-b7833e8f5570",
    "https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4",
    "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b",
    "https://images.unsplash.com/photo-1557804506-669a67965ba0",
    "https://images.unsplash.com/photo-1517486808906-6ca8b3f8f3be",
    "https://images.unsplash.com/photo-1523580494863-6f3031224c94",
    "https://images.unsplash.com/photo-1517048676732-d65bc937f952",
    "https://images.unsplash.com/photo-1503676260728-1c00da094a0b",
    "https://images.unsplash.com/photo-1516321318423-f06f85e504b3",
  ];

  for (let i = 7; i <= count; i++) {
    const randomTitle = titles[Math.floor(Math.random() * titles.length)];
    const randomDesc =
      descriptions[Math.floor(Math.random() * descriptions.length)];
    const randomImage = imageUrls[Math.floor(Math.random() * imageUrls.length)];

    galeriData.push({
      id_galeri: i,
      judul_galeri: randomTitle,
      deskripsi_galeri: randomDesc,
      url_foto: `${randomImage}?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80&v=${i}`,
    });
  }
}

function GetGaleriById(id_galeri) {
  for (let i = 0; i < galeriData.length; i++) {
    if (galeriData[i]["id_galeri"] == id_galeri) {
      return galeriData[i];
    }
  }
  return null;
}

// Fungsi untuk menampilkan galeri pada halaman tertentu
function displayGaleriCards(page = 1) {
  const galeriContainer = document.getElementById("galeriContainer");
  const emptyData = document.getElementById("emptyData");
  const paginationContainer = document.getElementById("paginationContainer");

  // Jika tidak ada data
  if (galeriData.length === 0) {
    emptyData.style.display = "flex";
    galeriContainer.style.display = "none";
    paginationContainer.style.display = "none";
    return;
  }

  emptyData.style.display = "none";
  galeriContainer.style.display = "grid";
  paginationContainer.style.display = "flex";

  // Kosongkan container
  galeriContainer.innerHTML = "";

  // Hitung indeks data untuk halaman ini
  const startIndex = (page - 1) * recordsPerPage;
  const endIndex = Math.min(startIndex + recordsPerPage, galeriData.length);
  const pageData = galeriData.slice(startIndex, endIndex);

  // Tampilkan data
  pageData.forEach((galeri, index) => {
    const card = document.createElement("div");
    card.className = "galeri-card";
    const globalIndex = startIndex + index;

    placeHolderUrl = imagePlaceholderUrl(galeri.judul_galeri);

    card.innerHTML = `
      <div class="galeri-image">
        <img src="${galeri.url_foto}" alt="${galeri.judul_galeri}" 
             onerror="this.onerror=null; this.src='${placeHolderUrl}'">
      </div>
      <div class="galeri-content">
        <h3 class="galeri-title">${galeri.judul_galeri}</h3>
        <p class="galeri-description">${galeri.deskripsi_galeri}</p>
      </div>
      <div class="galeri-actions">
        <button class="action-btn edit" data-id="${galeri.id_galeri}">
          <i class="fas fa-edit"></i> Edit
        </button>
        <button class="action-btn delete" data-id="${galeri.id_galeri}">
          <i class="fas fa-trash"></i> Hapus
        </button>
      </div>
    `;

    galeriContainer.appendChild(card);
  });

  // Update informasi pagination
  updatePaginationInfo(page);

  // Update tombol pagination
  updatePaginationControls(page);
}

// Fungsi untuk update informasi pagination
function updatePaginationInfo(page) {
  const startIndex = (page - 1) * recordsPerPage + 1;
  const endIndex = Math.min(page * recordsPerPage, galeriData.length);
  const totalData = galeriData.length;

  document.getElementById(
    "paginationInfo"
  ).textContent = `Menampilkan ${startIndex}-${endIndex} dari ${totalData} data`;
}

// Fungsi untuk update kontrol pagination
function updatePaginationControls(page) {
  const totalPages = Math.ceil(galeriData.length / recordsPerPage);
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
  displayGaleriCards(page);
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
    document.getElementById("descriptionInput").value = galeri.deskripsi_galeri;

    // Jika ada foto, tampilkan preview
    if (galeri.url_foto) {
      document.getElementById("previewImage").src = galeri.url_foto;
      document.getElementById("imagePlaceholder").style.display = "none";
      document.getElementById("imagePreview").style.display = "flex";

      handleResumeInput('imageInput', galeri.url_foto);
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
  if (!galeri) return;

  currentDeleteId = galeri["id_galeri"];

  // Isi data yang akan dihapus
  document.getElementById("dataName").textContent = galeri["judul_galeri"];
  document.getElementById("dataDescription").textContent = galeri["deskripsi_galeri"];

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

  let success = false;

  if (currentMode === "add") {
    success = await PostTambahGaleri(judul, deskripsi, foto_galeri);
    alert(
      success ? "Galeri berhasil ditambahkan!" : "Galeri gagal ditambahkan!"
    );
  } else {
    success = await PostEditGaleri(
      currentEditId,
      judul,
      deskripsi,
      foto_galeri
    );
    alert(
      success
        ? `Galeri "${judul}" berhasil diperbarui!`
        : "Galeri gagal diperbarui!"
    );
  }

  if (success) {
    // Refresh galeri cards
    // displayGaleriCards(currentPage);
    closePopup();
  }
}

// Fungsi untuk konfirmasi delete
async function confirmDelete() {
  if (currentDeleteId) {
    const galeri = GetGaleriById(currentDeleteId);
    if (!galeri) {
      alert("Foto galeri tidak ditemukan!");
      return;
    }

    const success = await PostDeleteGaleri(galeri["id_galeri"]);
    alert(
      success
        ? `Galeri "${galeri["judul_galeri"]}" berhasil dihapus!`
        : `Galeri "${galeri["judul_galeri"]}" gagal dihapus!`
    );

    if (success) {
      // Refresh galeri cards
      // displayGaleriCards(currentPage);
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
  document.getElementById("prevPage").addEventListener("click", function () {
    if (currentPage > 1) {
      changePage(currentPage - 1);
    }
  });

  document.getElementById("nextPage").addEventListener("click", function () {
    const totalPages = Math.ceil(galeriData.length / recordsPerPage);
    if (currentPage < totalPages) {
      changePage(currentPage + 1);
    }
  });

  // Event delegation untuk tombol edit dan delete di card galeri
  document.addEventListener("click", function (e) {
    const editBtn = e.target.closest(".action-btn.edit");
    const deleteBtn = e.target.closest(".action-btn.delete");

    if (editBtn) {
      const id_galeri = parseInt(editBtn.getAttribute("data-id"));
      openEditPopup(id_galeri);
    }

    if (deleteBtn) {
      const id_galeri = parseInt(deleteBtn.getAttribute("data-id"));
      const galeri = GetGaleriById(id_galeri);
      if (galeri) {
        openDeletePopup(id_galeri);
      }
    }
  });

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

    window.onload = () => {
    if (typeof ReloadDataGaleri == "function") {
      // Reload data jika modul database ditemukan
      ReloadDataGaleri();
    }
    else {
      // Generate 30 data dummy untuk demo pagination
      generateDummyData(30);
      displayFacilitiesCards(currentPage);
    }
  }
});

// // Fungsi API placeholder (sesuaikan dengan backend Anda)
// async function PostTambahGaleri(judul, deskripsi, foto_galeri) {
//   // Implementasi API call untuk menambah galeri
//   console.log("Menambah galeri:", { judul, deskripsi, foto_galeri });
//   // Return true jika berhasil, false jika gagal
//   return true;
// }

// async function PostEditGaleri(id, judul, deskripsi, foto_galeri) {
//   // Implementasi API call untuk mengedit galeri
//   console.log("Mengedit galeri:", { id, judul, deskripsi, foto_galeri });
//   // Return true jika berhasil, false jika gagal
//   return true;
// }

// async function DeleteGaleri(id) {
//   // Implementasi API call untuk menghapus galeri
//   console.log("Menghapus galeri dengan ID:", id);
//   // Return true jika berhasil, false jika gagal
//   return true;
// }
