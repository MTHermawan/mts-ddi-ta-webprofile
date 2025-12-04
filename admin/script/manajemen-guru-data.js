async function ReloadDataStaff(keyword = null) {
  try {
    const url = keyword
      ? `../api/staff?search=${encodeURIComponent(keyword)}`
      : '../api/staff';

    const response = await fetch(url);
    if (!response.ok) throw new Error("Network error");

    staffData = await response.json();
    for (let staff of staffData) {
      if (staff['url_foto']) {
        staff['url_foto'] = (await IsUrlFound("assets/" + staff['url_foto'])) ? "../assets/" + staff['url_foto'] : "";
      }
    }
    displayTableData();

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
    const url = './post/manajemen-staff/update-staff.php';

    const formData = new FormData();
    formData.append('id_staff', id_staff);
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

async function PostDeleteStaff(id_staff) {
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
  if (searchInput.searchTimeout) {
    clearTimeout(searchInput.searchTimeout);
  }

  searchInput.searchTimeout = setTimeout(() => {
    ReloadDataStaff(keyword);
  }, delay);
}

document.addEventListener("DOMContentLoaded", () => {
  searchInput.addEventListener('input', () => { SearchStaffEvent(500); });
});