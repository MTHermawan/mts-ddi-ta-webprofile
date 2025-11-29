function ReloadTableEventListener() {
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

function ReloadDataTable() {
  const emptyTable = document.getElementById('emptyData');
  const table = document.querySelector('.table-container');

  if (emptyTable == null || table == null) return;
  const tableBody = table.querySelector('tbody');

  if (staffData.length < 1) {
    emptyTable.style.display = 'flex';
    table.style.display = 'none';
  }
  else {
    emptyTable.style.display = 'none';
    table.style.display = 'flex';

    tableBody.innerHTML = '';
    staffData.forEach(staff => {
      const initials = staff['nama_staff'].split(' ').map(n => n[0]).join('').toUpperCase().slice(0, 2);
      const photoUrl = staff['url_foto'] ? `../assets/${staff['url_foto']}` : '';

      const newRow = document.createElement('tr');
      newRow.innerHTML = `<td>
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
        openEditPopup(staff['id_staff']);
      });
      deleteButton.addEventListener("click", function () {
        openDeletePopup(staff['id_staff']);
      });

      tableBody.appendChild(newRow);
    }
    );
  }
  ReloadTableEventListener();
}

function ReloadDataStaff(keyword = null) {
  const xml = new XMLHttpRequest();
  let url = '../api/staff';
  if (keyword) {
    url += `?search=${encodeURIComponent(keyword)}`;
  }
  xml.open('GET', url);
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

async function DeleteStaff(id_staff) {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      let xml = new XMLHttpRequest();
      xml.open('POST', './post/manajemen-staff/hapus-staff.php');
      xml.setRequestHeader('Content-Type', 'multipart/form-data');
      xml.addEventListener('load', () => {
        if (xhr.status >= 200 && xhr.status < 300) {
          resolve(xhr.responseXML);
        } else {
          reject({
            status: xhr.status,
            statusText: xhr.statusText
          });
        }
      });
      xhr.onerror = function () {
        reject({
          status: xhr.status,
          statusText: xhr.statusText
        });
      };
      const formData = new FormData();
      formData.append('id_staff', id_staff);
      xml.send(formData);
    }, 5000);
  });

}

const searchInput = document.querySelector('.search-input');
searchInput.addEventListener('input', function () {
  const keyword = this.value.trim();
  clearTimeout(this.searchTimeout);
  this.searchTimeout = setTimeout(() => {
    ReloadDataStaff(keyword);
    highlightMatches(keyword);
  }, 500);
});

// Inisialisasi event untuk gambar error di tabel
document.addEventListener("DOMContentLoaded", ReloadDataStaff());