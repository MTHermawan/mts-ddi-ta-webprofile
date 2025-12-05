async function ReloadDataBerita(keyword = null) {
  try {
    const url = keyword
      ? `../api/berita?search=${encodeURIComponent(keyword)}`
      : '../api/berita';

    const response = await fetch(url);
    if (!response.ok) throw new Error("Network error");

    beritaData = await response.json();
    for (let berita of beritaData) {
      if (berita['tanggal_dibuat']) {
        const date = new Date(berita['tanggal_dibuat']);
        berita['tanggal'] = `${date.getDate()} ${GetMonthID(date.getMonth(), 3)} ${date.getFullYear()}`;
        berita['url_foto'] = (await IsUrlFound("assets/" + berita['url_foto'])) ? "../assets/" + berita['url_foto'] : "";
      }
      if (berita['url_foto']) {
        berita['url_foto'] = (await IsUrlFound("assets/" + berita['url_foto'])) ? "../assets/" + berita['url_foto'] : "";
      }
    }
    displayBeritaCards(currentPage);
    updatePinnedSelect();

    return beritaData;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostTambahBerita(judul, deskripsi, foto_berita) {
  try {
    const method = 'POST';
    const url = './post/manajemen-berita/tambah-berita.php';

    const formData = new FormData();
    formData.append('judul', judul);
    formData.append('deskripsi', deskripsi);

    if (foto_berita) formData.append('foto_berita', foto_berita);

    let process = await MakeXMLRequest(method, url, formData);
    SearchBeritaEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostEditBerita(id_berita, judul, deskripsi, foto_berita) {
  try {
    const method = 'POST';
    const url = './post/manajemen-berita/update-berita.php';

    const formData = new FormData();
    formData.append('id_berita', id_berita);
    formData.append('judul', judul);
    formData.append('deskripsi', deskripsi);

    if (foto_berita) formData.append('foto_berita', foto_berita);

    const process = await MakeXMLRequest(method, url, formData)
    SearchBeritaEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostDeleteBerita(id_berita) {
  try {
    const method = 'POST';
    const url = './post/manajemen-berita/hapus-berita.php';
    const formData = new FormData();
    formData.append('id_berita', id_berita);

    const process = await MakeXMLRequest(method, url, formData);
    SearchBeritaEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostBeritaUtama(id_berita) {
  try {
    const method = 'POST';
    const url = './post/manajemen-berita/update-berita-utama.php';
    const formData = new FormData();
    formData.append('id_berita', id_berita);

    const process = await MakeXMLRequest(method, url, formData);
    SearchBeritaEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

const searchInput = document.querySelector('.search-input');
function SearchBeritaEvent(delay = 0) {
  const keyword = searchInput.value.trim();
  if (searchInput.searchTimeout) {
    clearTimeout(searchInput.searchTimeout);
  }

  searchInput.searchTimeout = setTimeout(() => {
    ReloadDataBerita(keyword);
  }, delay);
}

document.addEventListener("DOMContentLoaded", () => {
  searchInput.addEventListener('input', () => { SearchBeritaEvent(500); });
});