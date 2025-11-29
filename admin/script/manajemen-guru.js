// const { count } = require("console");

// VARIABEL GLOBAL
let currentMode = "add";
let currentEditId = null;
let currentDeleteId = null;

// Data guru hardcoded
let staffData = {
  // 1: {
  //   name: "Lindsey Curtis",
  //   subject: "Teknologi Informasi",
  //   degree: "S.Kom",
  //   photo:
  //     "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80",
  // },
  // 2: {
  //   name: "Kaiya George",
  //   subject: "Manajemen Proyek",
  //   degree: "M.M",
  //   photo:
  //     "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80",
  // },
  // 3: {
  //   name: "Zain Geldt",
  //   subject: "Bahasa Indonesia",
  //   degree: "S.S",
  //   photo:
  //     "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80",
  // },
  // 4: {
  //   name: "Abram Schleifer",
  //   subject: "Pemasaran Digital",
  //   degree: "M.M",
  //   photo:
  //     "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80",
  // },
  // 5: {
  //   name: "Carla George",
  //   subject: "Pemrograman Web",
  //   degree: "S.Kom",
  //   photo:
  //     "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80",
  // },
};

function GetStaffById(id_staff)
{
  return staffData.find(staff => staff.id === id_staff);
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
  const staff = staffData.find(staff => staff.id === id_staff);
  if (staff){
    document.getElementById("inputName").value = staff.nama_staff;
    document.getElementById("inputPosition").value = staff.jabatan;
    document.getElementById("inputSubject").value = staff.mapel;
    document.getElementById("inputDegree").value = staff.pendidikan;

    // Jika ada foto, tampilkan preview
    if (staff.photo) {
      document.getElementById("previewImage").src = staff.photo;
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
  currentDeleteId = id_staff;
  const staff = GetStaffById(id_staff);

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
  const nama = document.getElementById("inputName").value;
  const jabatan = document.getElementById("inputPosition").value;
  const mapel = document.getElementById("inputSubject").value;
  const pendidikan = document.getElementById("inputDegree").value;

  if (!nama.trim()) {
    alert("Nama harus diisi!");
    return;
  }

  if (currentMode === "add") {
    alert("Data guru berhasil ditambahkan!");
  } else {
    alert(`Data guru ${nama} berhasil diperbarui!`);
  }

  closePopup();
}

// Fungsi untuk konfirmasi delete
function confirmDelete() {
  if (currentDeleteId) {
    alert(`Data guru ${GetStaffById(currentDeleteId)['nama_staff']} berhasil dihapus!`);
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

function ReloadTableEventListener()
{
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

  const editButtons = document.querySelectorAll(".btn-edit");
  const deleteButtons = document.querySelectorAll(".btn-delete");

  // editButtons.forEach((button, index) => {
  //   button.addEventListener("click", function () {
  //     const id_guru = 1; // ID berdasarkan urutan (1-5)
  //     openEditPopup(id_guru);
  //   });
  // });

  // deleteButtons.forEach((button, index) => {
  //   button.addEventListener("click", function () {
  //     const id_staff = index + 1;
  //     const staff = staffData.find(staff => staff.id === id_staff);
  //     if (staff) {
  //       openDeletePopup(
  //         id_staff,
  //         staff.nama_staff,
  //         staff.jabatan,
  //         staff.mapel,
  //         staff.pendidikan
  //       );
  //     }
  //   });
  // });
  
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
}

// Inisialisasi event untuk gambar error di tabel
document.addEventListener("DOMContentLoaded", ReloadTableEventListener());

function ReloadDataTable()
{
  const emptyTable = document.getElementById('emptyData');
  const table = document.querySelector('.table-container');
  
  if (emptyTable == null || table == null) return;
  const tableBody = table.querySelector('tbody');
  
  if (staffData.length < 1)
    {
      emptyTable.style.display = 'flex';
    table.style.display = 'none';
  }
  else
  {
    emptyTable.style.display = 'none';
    table.style.display = 'flex';
    
    tableBody.innerHTML = '';
    staffData.forEach(staff => {
      const initials = staff['nama_staff'].split(' ').map(n => n[0]).join('').toUpperCase().slice(0, 2);
      const photoUrl = staff['url_foto'] ? `../assets/${staff['url_foto']}` : '';

      const newRow = document.createElement('tr');
      newRow.innerHTML =`<td>
      <div class="teacher-info">
      <div class="teacher-avatar">
      ${photoUrl ? `<img src="${photoUrl}" alt="${staff['nama_staff']}" onerror="this.style.display='none'">` : ''}
      <div class="teacher-avatar-initials" style="display: ${photoUrl ? 'none' : 'flex'}">${initials}</div>
            </div>
            <div class="teacher-details">
          <h3>${staff['nama_staff']}</h3>
            </div>
            </div>
            </td>
        <td><span class="position">${staff['jabatan']}</span></td>
        <td><span class="subject">${staff['mapel']}</span></td>
        <td><span class="degree">${staff['pendidikan']}</span></td>
        <td>
        <div class="action-buttons">
            <button class="btn btn-edit">Edit</button>
            <button class="btn btn-delete">Hapus</button>
          </div>
          </td>
      `;

      editButton = newRow.querySelector(".btn-edit");
      deleteButton = newRow.querySelector(".btn-delete");
      
      editButton.addEventListener("click", function () {
        openEditPopup(staff['id']);
      });
      deleteButton.addEventListener("click", function () {
        openDeletePopup(staff['id'])
      });

      tableBody.appendChild(newRow);
    }

    
  
  );
  }
  ReloadTableEventListener();
}

function ReloadDataStaff()
{
  const xml = new XMLHttpRequest();
  xml.open('GET', '../api/staff');
  xml.addEventListener('load', () => {
    if (xml.status === 200) {
      staffData = JSON.parse(xml.responseText);
      ReloadDataTable();
    }
    else {
      console.error("Bad request!");
    }
  });
  xml.send();
}

ReloadDataStaff();