async function ReloadDataSejarah(keyword = null) {
  try {
    const url = keyword
      ? `../api/sejarah?search=${encodeURIComponent(keyword)}`
      : '../api/sejarah';

    const response = await fetch(url);
    if (!response.ok) throw new Error("Network error");

    sejarahData = await response.json();
    displayTableData();

    return sejarahData;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostTambahSejarah(judul, tahun, deskripsi) {
  try {
    const method = 'POST';
    const url = './post/manajemen-sdejarah/tambah-sejarah.php';

    const formData = new FormData();
    formData.append('judul', judul);
    formData.append('tahun', tahun);
    formData.append('deskripsi', deskripsi);

    let process = await MakeXMLRequest(method, url, formData);
    SearchSejarahEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostEditSejarah(id_sejarah, judul, tahun, deskripsi) {
  try {
    const method = 'POST';
    const url = './post/manajemen-sejarah/update-sejarah.php';

    const formData = new FormData();
    formData.append('id_sejarah', id_sejarah);
    formData.append('judul', judul);
    formData.append('tahun', tahun);
    formData.append('deskripsi', deskripsi);

    const process = await MakeXMLRequest(method, url, formData)
    SearchSejarahEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostDeleteSejarah(id_sejarah) {
  try {
    const method = 'POST';
    const url = './post/manajemen-sejarah/hapus-sejarah.php';
    const formData = new FormData();
    formData.append('id_sejarah', id_sejarah);

    const process = await MakeXMLRequest(method, url, formData);
    SearchSejarahEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

const searchInput = document.querySelector('.search-input');
function SearchSejarahEvent(delay = 0) {
  const keyword = searchInput.value.trim();
  if (searchInput.searchTimeout) {
    clearTimeout(searchInput.searchTimeout);
  }

  searchInput.searchTimeout = setTimeout(() => {
    ReloadDataSejarah(keyword);
  }, delay);
}

document.addEventListener("DOMContentLoaded", () => {
  searchInput.addEventListener('input', () => { SearchSejarahEvent(500); });
});