// const { count } = require("console");

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
    pendidikan: "S.Kom",
    url_foto: 
      "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80",
  },
  {
    id_staff: 2,
    nama_staff: "Kaiya George",
    jabatan: "Guru",
    mapel: "Manajemen Proyek",
    pendidikan: "M.M",
    url_foto: 
      "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80",
  },
  {
    id_staff: 3,
    nama_staff: "Zain Geldt",
    jabatan: "Guru",
    mapel: "Bahasa Indonesia",
    pendidikan: "S.S",
    url_foto: 
      "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80",
  },
  {
    id_staff: 4,
    nama_staff: "Abram Schleifer",
    jabatan: "Guru",
    mapel: "Pemasaran Digital",
    pendidikan: "M.M",
    url_foto: 
      "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80",
  },
  {
    id_staff: 5,
    nama_staff: "Carla George",
    jabatan: "Guru",
    mapel: "Pemrograman Web",
    pendidikan: "S.Kom",
    url_foto: 
      "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80",
  }
]

function GetStaffById(id_staff) {
  for (let i = 0; i < staffData.length; i++) {
    if (staffData[i]['id_staff'] == id_staff)
    {
      return staffData[i];
    }
  }
  return null;
}

// Fungsi buka popup untuk tambah data
function openPopup(mode = "Tambah Guru") {
  currentMode = "add";
  document.getElementById("popupTitle").textContent = mode;
  resetForm();
  document.getElementById("popup").style.display = "flex";
}

// Fungsi buka popup untuk edit data
function openEditPopup(id_staff) {
  currentMode = "edit";
  currentEditId = id_staff;
  document.getElementById("popupTitle").textContent = "Edit Guru";

  // Isi form dengan data guru yang akan diedit
  const staff = GetStaffById(currentEditId);
  if (staff) {
    document.getElementById("inputName").value = staff.nama_staff;
    document.getElementById("inputPosition").value = staff.jabatan;
    document.getElementById("inputSubject").value = staff.mapel;
    document.getElementById("inputDegree").value = staff.pendidikan;

    // Jika ada foto, tampilkan preview
    if (staff.url_foto) {
      document.getElementById("previewImage").src = "../assets/" + staff.url_foto;
      document.getElementById("imagePlaceholder").style.display = "none";
      document.getElementById("imagePreview").style.display = "flex";
    } else {
      document.getElementById("imagePlaceholder").style.display = "flex";
      document.getElementById("imagePreview").style.display = "none";
    }
  }

  document.getElementById("popup").style.display = "flex";
}

// Fungsi buka popup konfirmasi delete
function openDeletePopup(id_staff) {
  const staff = GetStaffById(id_staff);
  currentDeleteId = staff['id_staff'];

  if (!staff) return;

  // Isi data yang akan dihapus
  document.getElementById("dataName").textContent = staff['nama_staff'];
  document.getElementById("dataPosition").textContent = staff['jabatan'];
  document.getElementById("dataSubject").textContent = staff['mapel'];
  document.getElementById("dataDegree").textContent = staff['pendidikan'];

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
function submitForm() {
  // Mengumpulkan data form
  const nama = document.getElementById("inputName").value;
  const jabatan = document.getElementById("inputPosition").value;
  const mapel = document.getElementById("inputSubject").value;
  const pendidikan = document.getElementById("inputDegree").value;
  const foto_staff = document.getElementById("imageInput").files[0] ?? null;

  if (!nama.trim()) {
    alert("Nama harus diisi!");
    return;
  }

  if (currentMode === "add") {
    // Submit form tambah
    PostTambahStaff(nama, jabatan, mapel, pendidikan, foto_staff)
    ? alert("Data staff berhasil ditambahkan")
    : alert("Data staff gagal ditambahkan");
  } else {
    // Submit form edit
    PostEditStaff(currentEditId, nama, jabatan, mapel, pendidikan, foto_staff)
    ? alert(`Data guru ${nama} berhasil diperbarui!`)
    : alert("Data staff gagal diperbarui");
  }

  closePopup();
}

// Fungsi untuk konfirmasi delete
function confirmDelete() {
  if (currentDeleteId) {
    const staff = GetStaffById(currentDeleteId);
    if (!staff) return;
     
    if (DeleteStaff(staff['id_staff']))
    {
      alert(`Data guru ${staff['nama_staff']} berhasil dihapus!`);
    }
    else
    {
      alert(`Data guru ${staff['nama_staff']} gagal dihapus!`);
    }
    closeDeletePopup();
  }
}

// Fungsi untuk reset form
function resetForm() {
  document.getElementById("inputName").value = "";
  document.getElementById("inputPosition").value = "";
  document.getElementById("inputSubject").value = "";
  document.getElementById("inputDegree").value = "";
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
        openDeletePopup(
          id_staff
        );
      }
      else
      {
        console.log(id_staff)
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
