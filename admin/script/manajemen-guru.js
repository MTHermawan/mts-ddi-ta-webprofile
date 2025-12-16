// VARIABEL GLOBAL
let currentMode = "add";
let currentEditId = null;
let currentDeleteId = null;

// Data guru hardcoded
let staffData = [
  {
    id_staff: 1,
    nama_staff: "Lindsey Curtis",
    jabatan: "Guru",
    mapel: "Teknologi Informasi",
    // pendidikan: "S.Kom",
    url_foto:
      "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80",
  },
  {
    id_staff: 2,
    nama_staff: "Kaiya George",
    jabatan: "Guru",
    mapel: "Manajemen Proyek",
    // pendidikan: "M.M",
    url_foto:
      "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80",
  },
  {
    id_staff: 3,
    nama_staff: "Zain Geldt",
    jabatan: "Guru",
    mapel: "Bahasa Indonesia",
    // pendidikan: "S.S",
    url_foto:
      "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80",
  },
  {
    id_staff: 4,
    nama_staff: "Abram Schleifer",
    jabatan: "Guru",
    mapel: "Pemasaran Digital",
    // pendidikan: "M.M",
    url_foto:
      "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80",
  },
  {
    id_staff: 5,
    nama_staff: "Carla George",
    jabatan: "Guru",
    mapel: "Pemrograman Web",
    // pendidikan: "S.Kom",
    url_foto:
      "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80",
  },
];

function GetStaffById(id_staff) {
  for (let i = 0; i < staffData.length; i++) {
    if (staffData[i]["id_staff"] == id_staff) {
      return staffData[i];
    }
  }
  return null;
}

// Fungsi buka popup untuk tambah data
function openPopup(mode = "Tambah Staff") {
  currentMode = "add";
  document.getElementById("popupTitle").textContent = mode;
  resetForm();
  document.getElementById("popup").style.display = "flex";
}

// Fungsi buka popup untuk edit data
function openEditPopup(id_staff) {
  currentMode = "edit";
  currentEditId = id_staff;
  document.getElementById("popupTitle").textContent = "Edit Staff";

  // Isi form dengan data guru yang akan diedit
  const staff = GetStaffById(currentEditId);
  if (staff) {
    document.getElementById("inputName").value = staff.nama_staff;
    document.getElementById("inputPosition").value = staff.jabatan;
    document.getElementById("inputSubject").value = staff.mapel;
    // document.getElementById("inputDegree").value = staff.pendidikan;

    // Jika ada foto, tampilkan preview
    if (staff.url_foto) {
      document.getElementById("previewImage").src = staff.url_foto;
      document.getElementById("imagePlaceholder").style.display = "`no`ne";
      document.getElementById("imagePreview").style.display = "flex";

      handleResumeInput('imageInput', staff.url_foto);
    } else {
      document.getElementById("imagePlaceholder").style.display = "flex";
      document.getElementById("imagePreview").style.display = "none";
    }
  }

  document.getElementById("popup").style.display = "flex";
}

// Fungsi buka popup konfirmasi delete```
function openDeletePopup(id_staff) {
  const staff = GetStaffById(id_staff);
  currentDeleteId = staff["id_staff"];

  if (!staff) return;

  // Isi data yang akan dihapus
  document.getElementById("dataName").textContent = staff["nama_staff"];
  document.getElementById("dataPosition").textContent = staff["jabatan"];
  document.getElementById("dataSubject").textContent = staff["mapel"];
  // document.getElementById("dataDegree").textContent = staff["pendidikan"];

  // Menampilkan popup delete
  document.getElementById("deletePopup").style.display = "flex";
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
  currentDeleteData = null;
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
    showNotification("Harap pilih file gambar yang valid (PNG, JPG, JPEG)", "warning");
  }
}

// Fungsi untuk menghapus gambar
function removeImage() {
  document.getElementById("imageInput").value = "";
  document.getElementById("imagePreview").style.display = "none";
  document.getElementById("imagePlaceholder").style.display = "flex";
}

// Fungsi untuk reset form
function resetForm() {
  document.getElementById("inputName").value = "";
  document.getElementById("inputPosition").value = "";
  document.getElementById("inputSubject").value = "";
  // document.getElementById("inputDegree").value = "";
  removeImage();
  currentMode = "add";
  currentEditId = null;
}

// Tambahkan event listener untuk tombol edit dan hapus di tabel

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

// Inisialisasi event untuk gambar error di tabel
document.addEventListener("DOMContentLoaded", function () {
  const avatarImages = document.querySelectorAll(".teacher-avatar img");
  const imageUploadArea = document.getElementById("imageUploadArea");
  const imageInput = document.getElementById("imageInput");

  avatarImages.forEach((img) => {
    img.addEventListener("error", function () {
      this.style.display = "none";
      const initials = this.nextElementSibling;
      if (initials && initials.classList.contains("teacher-avatar-initials")) {
        initials.style.display = "block";
      }
    });

    img.addEventListener("load", function () {
      const initials = this.nextElementSibling;
      if (initials && initials.classList.contains("teacher-avatar-initials")) {
        initials.style.display = "none";
      }
    });
  });

  // Tambahkan event listener untuk tombol edit dan hapus di tabel
  const editButtons = document.querySelectorAll(".btn-edit");
  const deleteButtons = document.querySelectorAll(".btn-delete");

  editButtons.forEach((button, index) => {
    button.addEventListener("click", function () {
      const id_staff = index + 1; // ID berdasarkan urutan (1-5)
      openEditPopup(id_staff);
    });
  });

  deleteButtons.forEach((button, index) => {
    button.addEventListener("click", function () {
      const id_staff = index + 1;
      const staff = GetStaffById(id_staff);
      if (staff) {
        openDeletePopup(id_staff);
      } else {
        console.log(id_staff);
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

  // Event untuk upload area
  imageUploadArea.addEventListener("click", function (e) {
    // Cek apakah elemen yang diklik berada di dalam container tombol aksi (.image-preview-actions)
    // Jika ya, jangan jalankan perintah klik input file
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

  // Event untuk input file
  imageInput.addEventListener("change", function (e) {
    if (e.target.files.length > 0) {
      handleImageSelection(e.target.files[0]);
    }
  });
});

// VARIABEL GLOBAL PAGINATION
let currentPage = 1;
const recordsPerPage = 15;


// Generate data dummy tambahan untuk demo pagination
function generateDummyData(count) {
  const names = [
    "Budi Santoso",
    "Sari Dewi",
    "Agus Wijaya",
    "Rina Kartika",
    "Eko Prasetyo",
    "Dewi Lestari",
    "Hendra Gunawan",
    "Maya Indah",
    "Fajar Rahman",
    "Lina Wati",
  ];
  const subjects = [
    "Matematika",
    "Bahasa Inggris",
    "IPA",
    "IPS",
    "Seni Budaya",
    "PJOK",
    "Agama",
    "Sejarah",
    "Geografi",
    "Ekonomi",
  ];
  // const degrees = ["S.Pd", "M.Pd", "S.S", "M.Si", "S.T", "M.T"];

  for (let i = 6; i <= count; i++) {
    const randomName = names[Math.floor(Math.random() * names.length)];
    const randomSubject = subjects[Math.floor(Math.random() * subjects.length)];
    // const randomDegree = degrees[Math.floor(Math.random() * degrees.length)];

    staffData.push({
      id_staff: i,
      nama_staff: randomName,
      jabatan: "Guru",
      mapel: randomSubject,
      // pendidikan: randomDegree,
      url_foto: `https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80&v=${i}`,
    });
  }
}

// Fungsi untuk menampilkan data pada halaman tertentu
function displayTableData(page = 1) {
  const tbody = document.querySelector("tbody");
  const emptyData = document.getElementById("emptyData");
  const tableContainer = document.querySelector(".table-container");
  const paginationContainer = document.getElementById("paginationContainer");

  // Jika tidak ada data
  if (staffData.length === 0) {
    emptyData.style.display = "flex";
    tableContainer.style.display = "none";
    paginationContainer.style.display = "none";
    return;
  }

  emptyData.style.display = "none";
  tableContainer.style.display = "block";
  paginationContainer.style.display = "flex";

  // Kosongkan tabel
  tbody.innerHTML = "";

  // Hitung indeks data untuk halaman ini
  const startIndex = (page - 1) * recordsPerPage;
  const endIndex = Math.min(startIndex + recordsPerPage, staffData.length);
  const pageData = staffData.slice(startIndex, endIndex);

  // Tampilkan data
  pageData.forEach((staff, index) => {
    const row = document.createElement("tr");
    const globalIndex = startIndex + index;

    row.innerHTML = `
      <td>
        <div class="teacher-info">
          <div class="teacher-avatar">
            <img src="${staff.url_foto}" alt="${
      staff.nama_staff
    }" onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
            <div class="teacher-avatar-initials">${getInitials(
              staff.nama_staff
            )}</div>
          </div>
          <div class="teacher-details">
            <h3>${staff.nama_staff}</h3>
          </div>
        </div>
      </td>
      <td><span class="position">${staff.jabatan ? staff.jabatan : "-"}</span></td>
      <td><span class="subject">${staff.mapel ? staff.jabatan : "-"}</span></td>
      <td>
        <div class="action-buttons">
          <button class="btn btn-edit" data-id="${staff.id_staff}">
            <i class="fa-regular fa-pen-to-square"></i> Edit
          </button>
          <button class="btn btn-delete" data-id="${staff.id_staff}">
            <i class="fas fa-trash"></i> Hapus
          </button>
        </div>
      </td>
    `;

    tbody.appendChild(row);
  });

  // Update informasi pagination
  updatePaginationInfo(page);

  // Update tombol pagination
  updatePaginationControls(page);
}

// Fungsi untuk mendapatkan inisial nama
function getInitials(name) {
  return name
    .split(" ")
    .map((word) => word[0])
    .join("")
    .toUpperCase()
    .substring(0, 2);
}

// Fungsi untuk update informasi pagination
function updatePaginationInfo(page) {
  const startIndex = (page - 1) * recordsPerPage + 1;
  const endIndex = Math.min(page * recordsPerPage, staffData.length);
  const totalData = staffData.length;

  document.getElementById(
    "paginationInfo"
  ).textContent = `Menampilkan ${startIndex}-${endIndex} dari ${totalData} data`;
}

// Fungsi untuk update kontrol pagination
function updatePaginationControls(page) {
  const totalPages = Math.ceil(staffData.length / recordsPerPage);
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
  displayTableData(page);
}

// Event listener untuk pagination
document.addEventListener("DOMContentLoaded", function () {
  // Event untuk tombol prev
  document.getElementById("prevPage").addEventListener("click", function () {
    if (currentPage > 1) {
      changePage(currentPage - 1);
    }
  });

  // Event untuk tombol next
  document.getElementById("nextPage").addEventListener("click", function () {
    const totalPages = Math.ceil(staffData.length / recordsPerPage);
    if (currentPage < totalPages) {
      changePage(currentPage + 1);
    }
  });

  // Event delegation untuk tombol edit dan delete di tabel
  document
    .querySelector(".table-container")
    .addEventListener("click", function (e) {
      const editBtn = e.target.closest(".btn-edit");
      const deleteBtn = e.target.closest(".btn-delete");

      if (editBtn) {
        const id_staff = parseInt(editBtn.getAttribute("data-id"));
        openEditPopup(id_staff);
      }

      if (deleteBtn) {
        const id_staff = parseInt(deleteBtn.getAttribute("data-id"));
        const staff = GetStaffById(id_staff);
        if (staff) {
          openDeletePopup(id_staff);
        }
      }
    });

    window.onload = () => {
      if (typeof ReloadDataStaff == "function") {
        ReloadDataStaff();
      }
      else {
        // Generate 30 data dummy untuk demo pagination
        generateDummyData(30);
        displayTableData(currentPage);
      }
    }
});

// Modifikasi fungsi submitForm untuk refresh tabel setelah CRUD
async function submitForm() {
  const nama = document.getElementById("inputName").value;
  const jabatan = document.getElementById("inputPosition").value;
  const mapel = document.getElementById("inputSubject").value;
  // const pendidikan = document.getElementById("inputDegree").value;
  const foto_staff = document.getElementById("imageInput").files[0] ?? null;

  if (!nama.trim()) {
    showWarning(`Nama harus diisi!`);
    return;
  }
  
  let success = false;
  if (currentMode === "add") {
    success = await PostTambahStaff(
      nama,
      jabatan,
      mapel,
      // pendidikan,
      foto_staff
    );
      
    success ? showSuccess("Data staff berhasil ditambahkan!") : showError("Data staff gagal ditambahkan!");
  } else {
    success = await PostEditStaff(
      currentEditId,
      nama,
      jabatan,
      mapel,
      // pendidikan,
      foto_staff
    );
    success ? showSuccess(`Data staff "${nama}" berhasil diperbarui!`) : showError(`Data staff "${nama}" gagal diperbarui!`);
  }

  if (success) {
    // Refresh data dari server (dalam demo ini, kita refresh dari array lokal)
    // Di aplikasi nyata, Anda akan fetch data terbaru dari server
    // displayTableData(currentPage);
    closePopup();
  }
}

// Modifikasi fungsi confirmDelete untuk refresh tabel
async function confirmDelete() {
  if (currentDeleteId) {
    const staff = GetStaffById(currentDeleteId);
    if (!staff) {
      showWarning("Staff tidak ditemukan!");
      return;
    }

    const success = await PostDeleteStaff(staff["id_staff"]);
    console.log(success);
    success ? showSuccess(`Data staff "${staff["nama_staff"]}" berhasil dihapus!`) : showError(`Data guru "${staff["nama_staff"]}" gagal dihapus!`);

    if (success) {
      // Refresh tabel
      // displayTableData(currentPage);
      closeDeletePopup();
    }
  }
}

function ExportCSV() {
  if (!staffData || !staffData.length) {
    alert("Data staff kosong!");
    return;
  }

  const excelData = staffData.map((staff, index) => ({
  "No": index + 1,
  "Nama Staff": staff.nama_staff,
  "Jabatan": staff.jabatan,
  "Mapel": staff.mapel,
  // "Pendidikan": staff.pendidikan,
  "Foto": staff.url_foto
    ? `=HYPERLINK("${location.origin}/assets/${staff.url_foto}", "Lihat Foto")`
    : ""
}));


  const worksheet = XLSX.utils.json_to_sheet(excelData);
  const workbook = XLSX.utils.book_new();

  XLSX.utils.book_append_sheet(workbook, worksheet, "Data Staff");

  XLSX.writeFile(workbook, "data-staff-mts-ddi-tani-aman.xlsx");
}


