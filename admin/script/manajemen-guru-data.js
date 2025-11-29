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
}

async function ReloadDataTable() {
  const emptyTable = document.getElementById('emptyData');
  const table = document.querySelector('.table-container');

  if (!emptyTable || !table) return;

  const tableBody = table.querySelector('tbody');
  if (staffData.length === 0) {
    emptyTable.style.display = 'flex';
    table.style.display = 'none';
    return;
  }

  emptyTable.style.display = 'none';
  table.style.display = 'flex';

  const processedStaff = await Promise.all(
    staffData.map(async staff => {
      const initials = staff['nama_staff'].split(" ").map(n => n[0]).join("").toUpperCase().slice(0, 2);
      let photoUrl = null;

      if (staff['url_foto']) {
        const check = await IsUrlFound("assets/" + staff['url_foto']);
        if (check) {
          photoUrl = staff['url_foto'];
        }
      }

      return { ...staff, initials, photoUrl };
    })
  );

  tableBody.innerHTML = '';
  processedStaff.forEach(staff => {
    const newRow = document.createElement('tr');

    newRow.innerHTML = `
      <td>
        <div class="teacher-info">
          <div class="teacher-avatar">
            ${staff['photoUrl'] ? `<img src="../assets/${staff['photoUrl']}" alt="${staff['nama_staff']}" onerror="this.style.display='none'">` : ''}
            <div class="teacher-avatar-initials" style="display: ${staff.photoUrl ? 'none' : 'flex'}">
              ${staff.initials}
            </div>
          </div>
          <div class="teacher-details">
            <h3>${staff.nama_staff}</h3>
          </div>
        </div>
      </td>

      <td><span class="position">${staff.jabatan}</span></td>
      <td><span class="subject">${staff.mapel}</span></td>
      <td><span class="degree">${staff.pendidikan}</span></td>

      <td>
        <div class="action-buttons">
          <button class="btn btn-edit">Edit</button>
          <button class="btn btn-delete">Hapus</button>
        </div>
      </td>
    `;

    const editButton = newRow.querySelector(".btn-edit");
    const deleteButton = newRow.querySelector(".btn-delete");

    editButton.addEventListener("click", () => {
      openEditPopup(staff.id_staff);
    });

    deleteButton.addEventListener("click", () => {
      openDeletePopup(staff.id_staff);
    });

    tableBody.appendChild(newRow);
  });

  ReloadTableEventListener();
}


// function ReloadDataStaff(keyword = null) {
//   const xml = new XMLHttpRequest();
//   let url = '../api/staff';
//   if (keyword) {
//     url += `?search=${encodeURIComponent(keyword)}`;
//   }
//   xml.open('GET', url);
//   xml.addEventListener('load', () => {
//     if (xml.status === 200) {
//       staffData = JSON.parse(xml.responseText);
//       ReloadDataTable();
//     }
//     else {
//       console.error("Bad request!");
//     }
//   });
//   xml.send();
// }

async function ReloadDataStaff(keyword = null) {
  try {
    const method = 'GET';

    const url = keyword
      ? `../api/staff?search=${encodeURIComponent(keyword)}`
      : '../api/staff';

    const response = await fetch(url);
    if (!response.ok) throw new Error("Network error");

    staffData = await response.json();
    console.log(staffData);
    ReloadDataTable();

    return staffData;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}


async function PostTambahStaff(nama, jabatan, mapel, pendidikan, foto_staff) {
  try {
    const method = 'POST';
    const url = './post/manajemen-staff/tambah-staff.php';
    const formData = new FormData();
    formData.append('nama_staff', nama);
    formData.append('jabatan', jabatan);
    formData.append('mapel', mapel);
    formData.append('pendidikan', pendidikan);
    if (foto_staff) formData.append('foto_staff', foto_staff);

    
    let process = await MakeXMLRequest(method, url, formData);
    SearchStaffEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostEditStaff(id_staff, nama, jabatan, mapel, pendidikan, foto_staff) {
  try {
    const method = 'POST';
    const url = './post/manajemen-staff/tambah-staff.php';
    const formData = new FormData();
    formData.append('id', id_staff);
    formData.append('nama_staff', nama);
    formData.append('jabatan', jabatan);
    formData.append('mapel', mapel);
    formData.append('pendidikan', pendidikan);
    if (foto_staff) formData.append('foto_staff', foto_staff);

    const process = await MakeXMLRequest(method, url, formData)
    SearchStaffEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function DeleteStaff(id_staff) {
  try {
    const method = 'POST';
    const url = './post/manajemen-staff/hapus-staff.php';
    const formData = new FormData();
    formData.append('id_staff', id_staff);

    const process = await MakeXMLRequest(method, url, formData);
    SearchStaffEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

const searchInput = document.querySelector('.search-input');
function SearchStaffEvent(delay = 0) {
  const keyword = searchInput.value.trim();
  clearTimeout(this.searchTimeout);
  searchInput.searchTimeout = setTimeout(() => {
    ReloadDataStaff(keyword);
  }, delay);
}
searchInput.addEventListener('input', () => { SearchStaffEvent(500); });


document.addEventListener("DOMContentLoaded", ReloadDataStaff());