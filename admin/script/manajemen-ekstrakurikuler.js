// VARIABEL GLOBAL PAGINATION
let currentPage = 1;
const recordsPerPage = 15;

// Data ekskul hardcoded
let ekskulData = [
  {
    id_ekskul: 1,
    nama_ekskul: "Pramuka",
    nama_pembimbing: "Budi Santoso, S.Pd.",
    jadwal: "Sabtu, 08.00 - 11.00 WIB",
    foto: [
      {
        id_foto_ekskul: 1,
        id_ekskul: 1,
        url_foto:
          "https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
        posisi: 1,
      },
    ],
  },
  {
    id_ekskul: 2,
    nama_ekskul: "Futsal",
    nama_pembimbing: "Ahmad Rizki, M.Pd.",
    jadwal: "Selasa & Kamis, 15.00 - 17.00 WIB",
    foto: [
      {
        id_foto_ekskul: 2,
        id_ekskul: 2,
        url_foto:
          "https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
        posisi: 1,
      },
    ],
  },
  {
    id_ekskul: 3,
    nama_ekskul: "Paduan Suara",
    nama_pembimbing: "Diana Sari, S.Sn.",
    jadwal: "Rabu, 14.00 - 16.00 WIB",
    foto: [
      {
        id_foto_ekskul: 3,
        id_ekskul: 3,
        url_foto:
          "https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
        posisi: 1,
      },
    ],
  },
  {
    id_ekskul: 4,
    nama_ekskul: "Robotika",
    nama_pembimbing: "Rizki Pratama, S.Kom.",
    jadwal: "Jumat, 13.00 - 15.30 WIB",
    foto: [
      {
        id_foto_ekskul: 4,
        id_ekskul: 4,
        url_foto:
          "https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
        posisi: 1,
      },
    ],
  },
  {
    id_ekskul: 5,
    nama_ekskul: "Teater",
    nama_pembimbing: "Sari Dewi, S.S.",
    jadwal: "Senin, 14.30 - 16.30 WIB",
    foto: [
      {
        id_foto_ekskul: 5,
        id_ekskul: 5,
        url_foto:
          "https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
        posisi: 1,
      },
    ],
  },
  {
    id_ekskul: 6,
    nama_ekskul: "KIR (Karya Ilmiah Remaja)",
    nama_pembimbing: "Dr. Maya Sari, M.Si.",
    jadwal: "Kamis, 15.00 - 17.00 WIB",
    foto: [
      {
        id_foto_ekskul: 6,
        id_ekskul: 6,
        url_foto:
          "https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80",
        posisi: 1,
      },
    ],
  },
];

// Generate data dummy tambahan untuk demo pagination
function generateDummyData(count) {
  const ekskulNames = [
    "Basket",
    "Voli",
    "Badminton",
    "Renang",
    "Karate",
    "Taekwondo",
    "Pencak Silat",
    "Marching Band",
    "Band Sekolah",
    "Tari Tradisional",
    "Tari Modern",
    "Melukis",
    "Fotografi",
    "Videografi",
    "Jurnalistik",
    "Debat Bahasa Inggris",
    "Bahasa Jepang",
    "Bahasa Korea",
    "Komputer & IT",
    "Matematika Club",
  ];

  const pembimbingNames = [
    "Agus Wijaya, S.Pd.",
    "Rina Kartika, M.Pd.",
    "Eko Prasetyo, S.Pd.",
    "Dewi Lestari, S.Pd.",
    "Hendra Gunawan, S.Pd.",
    "Maya Indah, M.Pd.",
    "Fajar Rahman, S.Pd.",
    "Lina Wati, S.Pd.",
    "Andi Saputra, S.Kom.",
    "Rizki Amelia, S.Sn.",
    "Bambang Susanto, S.Pd.",
    "Citra Dewi, M.Pd.",
    "Dodi Kurniawan, S.Pd.",
    "Elsa Putri, S.Pd.",
    "Farhan Akbar, S.Pd.",
  ];

  const jadwalOptions = [
    "Senin, 15.00 - 17.00 WIB",
    "Selasa, 14.00 - 16.00 WIB",
    "Rabu, 15.30 - 17.30 WIB",
    "Kamis, 14.30 - 16.30 WIB",
    "Jumat, 13.00 - 15.00 WIB",
    "Sabtu, 08.00 - 11.00 WIB",
    "Senin & Rabu, 16.00 - 17.30 WIB",
    "Selasa & Kamis, 15.00 - 16.30 WIB",
    "Rabu & Jumat, 14.00 - 16.00 WIB",
  ];

  const imageUrls = [
    "https://images.unsplash.com/photo-1542601906990-b4d3fb778b09",
    "https://images.unsplash.com/photo-1575361204480-aadea25e6e68",
    "https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4",
    "https://images.unsplash.com/photo-1492684223066-81342ee5ff30",
    "https://images.unsplash.com/photo-1532094349884-543bc11b234d",
    "https://images.unsplash.com/photo-1557804506-669a67965ba0",
    "https://images.unsplash.com/photo-1517486808906-6ca8b3f8f3be",
    "https://images.unsplash.com/photo-1523580494863-6f3031224c94",
    "https://images.unsplash.com/photo-1517048676732-d65bc937f952",
    "https://images.unsplash.com/photo-1503676260728-1c00da094a0b",
  ];

  for (let i = 7; i <= count; i++) {
    const randomName =
      ekskulNames[Math.floor(Math.random() * ekskulNames.length)];
    const randomPembimbing =
      pembimbingNames[Math.floor(Math.random() * pembimbingNames.length)];
    const randomJadwal =
      jadwalOptions[Math.floor(Math.random() * jadwalOptions.length)];
    const randomImage = imageUrls[Math.floor(Math.random() * imageUrls.length)];

    ekskulData.push({
      id_ekskul: i,
      nama_ekskul: randomName,
      nama_pembimbing: randomPembimbing,
      jadwal: randomJadwal,
      foto: [
        {
          id_foto_ekskul: i,
          id_ekskul: i,
          url_foto: `${randomImage}?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80&v=${i}`,
          posisi: 1,
        },
      ],
    });
  }
}

// Generate 30 data dummy untuk demo pagination
generateDummyData(30);

function GetEkskulById(id_ekskul) {
  for (let i = 0; i < ekskulData.length; i++) {
    if (ekskulData[i]["id_ekskul"] == id_ekskul) {
      return ekskulData[i];
    }
  }
  return null;
}

// Fungsi untuk menampilkan ekskul pada halaman tertentu
function displayEkskulCards(page = 1) {
  const ekskulContainer = document.getElementById("ekskulContainer");
  const emptyData = document.getElementById("emptyData");
  const paginationContainer = document.getElementById("paginationContainer");

  // Jika tidak ada data
  if (ekskulData.length === 0) {
    emptyData.style.display = "flex";
    ekskulContainer.style.display = "none";
    paginationContainer.style.display = "none";
    return;
  }

  emptyData.style.display = "none";
  ekskulContainer.style.display = "grid";
  paginationContainer.style.display = "flex";

  // Kosongkan container
  ekskulContainer.innerHTML = "";

  // Hitung indeks data untuk halaman ini
  const startIndex = (page - 1) * recordsPerPage;
  const endIndex = Math.min(startIndex + recordsPerPage, ekskulData.length);
  const pageData = ekskulData.slice(startIndex, endIndex);

  // Tampilkan data
  pageData.forEach((ekskul, index) => {
    const card = document.createElement("div");
    card.className = "ekskul-card";
    const globalIndex = startIndex + index;

    const fotoUrl =
      ekskul.foto && ekskul.foto.length > 0
        ? ekskul.foto[0].url_foto
        : "https://via.placeholder.com/300x200?text=Gambar+Tidak+Tersedia";

    card.innerHTML = `
      <div class="ekskul-image">
        <img src="${fotoUrl}" alt="${ekskul.nama_ekskul}" 
             onerror="this.onerror=null; this.src='https://via.placeholder.com/300x200?text=Gambar+Tidak+Tersedia'">
      </div>
      <div class="ekskul-content">
        <h3 class="ekskul-title">${ekskul.nama_ekskul}</h3>
        <div class="ekskul-info">
          <div class="ekskul-info-item">
            <i class="fas fa-user-tie"></i>
            <span class="ekskul-info-label">Pembimbing:</span>
            <span class="ekskul-info-value">${ekskul.nama_pembimbing}</span>
          </div>
          <div class="ekskul-info-item">
            <i class="fas fa-calendar-alt"></i>
            <span class="ekskul-info-label">Jadwal:</span>
            <span class="ekskul-info-value">${ekskul.jadwal}</span>
          </div>
        </div>
      </div>
      <div class="ekskul-actions">
        <button class="action-btn edit" data-id="${ekskul.id_ekskul}">
          <i class="fas fa-edit"></i> Edit
        </button>
        <button class="action-btn delete" data-id="${ekskul.id_ekskul}">
          <i class="fas fa-trash"></i> Hapus
        </button>
      </div>
    `;

    ekskulContainer.appendChild(card);
  });

  // Update informasi pagination
  updatePaginationInfo(page);

  // Update tombol pagination
  updatePaginationControls(page);
}

// Fungsi untuk update informasi pagination
function updatePaginationInfo(page) {
  const startIndex = (page - 1) * recordsPerPage + 1;
  const endIndex = Math.min(page * recordsPerPage, ekskulData.length);
  const totalData = ekskulData.length;

  document.getElementById(
    "paginationInfo"
  ).textContent = `Menampilkan ${startIndex}-${endIndex} dari ${totalData} data`;
}

// Fungsi untuk update kontrol pagination
function updatePaginationControls(page) {
  const totalPages = Math.ceil(ekskulData.length / recordsPerPage);
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
  displayEkskulCards(page);
}

// Fungsi buka popup untuk tambah data
function openPopup(mode = "Tambah Ekstrakurikuler") {
  currentMode = "add";
  document.getElementById("popupTitle").textContent = mode;
  resetForm();
  document.getElementById("popup").style.display = "flex";
  document.body.style.overflow = "hidden";
}

// Fungsi buka popup untuk edit data
function openEditPopup(id_ekskul) {
  currentMode = "edit";
  currentEditId = id_ekskul;
  document.getElementById("popupTitle").textContent = "Edit Ekstrakurikuler";

  // Isi form dengan data ekskul yang akan diedit
  const ekskul = GetEkskulById(currentEditId);
  if (ekskul) {
    document.getElementById("titleInput").value = ekskul.nama_ekskul;
    document.getElementById("pembimbingInput").value = ekskul.nama_pembimbing;
    document.getElementById("jadwalInput").value = ekskul.jadwal;

    // Jika ada foto, tampilkan preview
    if (ekskul.foto && ekskul.foto.length > 0 && ekskul.foto[0].url_foto) {
      document.getElementById("previewImage").src = ekskul.foto[0].url_foto;
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
function openDeletePopup(id_ekskul) {
  const ekskul = GetEkskulById(id_ekskul);
  if (!ekskul) return;

  currentDeleteId = ekskul["id_ekskul"];

  // Isi data yang akan dihapus
  document.getElementById("dataName").textContent = ekskul["nama_ekskul"];
  document.getElementById("dataPosition").textContent =
    ekskul["nama_pembimbing"];
  document.getElementById("dataSubject").textContent = ekskul["jadwal"];

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
  const nama = document.getElementById("titleInput").value;
  const pembimbing = document.getElementById("pembimbingInput").value;
  const jadwal = document.getElementById("jadwalInput").value;
  const foto_ekskul = document.getElementById("imageInput").files[0] ?? null;

  if (!nama.trim()) {
    alert("Nama ekstrakurikuler harus diisi!");
    return;
  }

  if (!pembimbing.trim()) {
    alert("Nama pembimbing harus diisi!");
    return;
  }

  if (!jadwal.trim()) {
    alert("Jadwal harus diisi!");
    return;
  }

  let success = false;

  if (currentMode === "add") {
    success = await PostTambahEkskul(nama, pembimbing, jadwal, foto_ekskul);
    alert(
      success
        ? "Data ekstrakurikuler berhasil ditambahkan"
        : "Data ekstrakurikuler gagal ditambahkan"
    );
  } else {
    success = await PostEditEkskul(
      currentEditId,
      nama,
      pembimbing,
      jadwal,
      foto_ekskul
    );
    alert(
      success
        ? `Data ekstrakurikuler ${nama} berhasil diperbarui!`
        : "Data ekstrakurikuler gagal diperbarui"
    );
  }

  if (success) {
    // Refresh ekskul cards
    displayEkskulCards(currentPage);
    closePopup();
  }
}

// Fungsi untuk konfirmasi delete
async function confirmDelete() {
  if (currentDeleteId) {
    const ekskul = GetEkskulById(currentDeleteId);
    if (!ekskul) {
      alert("Ekstrakurikuler tidak ditemukan!");
      return;
    }

    const success = await DeleteEkskul(ekskul["id_ekskul"]);
    alert(
      success
        ? `Data ekstrakurikuler ${ekskul["nama_ekskul"]} berhasil dihapus!`
        : `Data ekstrakurikuler ${ekskul["nama_ekskul"]} gagal dihapus!`
    );

    if (success) {
      // Refresh ekskul cards
      displayEkskulCards(currentPage);
      closeDeletePopup();
    }
  }
}

// Fungsi untuk reset form
function resetForm() {
  document.getElementById("titleInput").value = "";
  document.getElementById("pembimbingInput").value = "";
  document.getElementById("jadwalInput").value = "";
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
    const totalPages = Math.ceil(ekskulData.length / recordsPerPage);
    if (currentPage < totalPages) {
      changePage(currentPage + 1);
    }
  });

  // Tampilkan ekskul halaman pertama
  displayEkskulCards(currentPage);

  // Event delegation untuk tombol edit dan delete di card ekskul
  document.addEventListener("click", function (e) {
    const editBtn = e.target.closest(".action-btn.edit");
    const deleteBtn = e.target.closest(".action-btn.delete");

    if (editBtn) {
      const id_ekskul = parseInt(editBtn.getAttribute("data-id"));
      openEditPopup(id_ekskul);
    }

    if (deleteBtn) {
      const id_ekskul = parseInt(deleteBtn.getAttribute("data-id"));
      const ekskul = GetEkskulById(id_ekskul);
      if (ekskul) {
        openDeletePopup(id_ekskul);
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

  document
    .getElementById("deletePopup")
    .addEventListener("click", function (e) {
      if (e.target === this) {
        closeDeletePopup();
      }
    });
});

// Fungsi API placeholder
async function PostTambahEkskul(nama, pembimbing, jadwal, foto_ekskul) {
  console.log("Menambah ekskul:", { nama, pembimbing, jadwal, foto_ekskul });
  return true;
}

async function PostEditEkskul(id, nama, pembimbing, jadwal, foto_ekskul) {
  console.log("Mengedit ekskul:", {
    id,
    nama,
    pembimbing,
    jadwal,
    foto_ekskul,
  });
  return true;
}

async function DeleteEkskul(id) {
  console.log("Menghapus ekskul dengan ID:", id);
  return true;
}
