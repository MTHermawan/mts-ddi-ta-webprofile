async function ReloadDataGaleri(keyword = null) {
  try {
    const url = keyword
      ? `../api/galeri?search=${encodeURIComponent(keyword)}`
      : '../api/galeri';

    const response = await fetch(url);
    if (!response.ok) throw new Error("Network error");

    galeriData = await response.json();
    for (let galeri of galeriData) {
      if (galeri['url_foto']) {
        galeri['url_foto'] = (await IsUrlFound("assets/" + galeri['url_foto'])) ? "../assets/" + galeri['url_foto'] : "";
      }
    }
    displayGaleriCards();

    return galeriData;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostTambahGaleri(judul, deskripsi, foto_galeri) {
  try {
    const method = 'POST';
    const url = './post/manajemen-galeri/tambah-galeri.php';

    const formData = new FormData();
    formData.append('judul_galeri', judul);
    formData.append('deskripsi_galeri', deskripsi);
    
    if (foto_galeri) formData.append('foto_galeri', foto_galeri);
    
    let process = await MakeXMLRequest(method, url, formData);
    SearchGaleriEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostEditGaleri(id_galeri, judul, deskripsi, foto_galeri) {
  try {
    const method = 'POST';
    const url = './post/manajemen-galeri/update-galeri.php';

    const formData = new FormData();
    formData.append('id_galeri', id_galeri);
    formData.append('judul_galeri', judul);
    formData.append('deskripsi_galeri', deskripsi);

    if (foto_galeri) formData.append('foto_galeri', foto_galeri);

    const process = await MakeXMLRequest(method, url, formData)
    SearchGaleriEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostDeleteGaleri(id_galeri) {
  try {
    const method = 'POST';
    const url = './post/manajemen-galeri/hapus-galeri.php';
    const formData = new FormData();
    formData.append('id_galeri', id_galeri);

    const process = await MakeXMLRequest(method, url, formData);
    SearchGaleriEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

const searchInput = document.querySelector('.search-input');
function SearchGaleriEvent(delay = 0) {
  const keyword = searchInput.value.trim();
  clearTimeout(this.searchTimeout);
  searchInput.searchTimeout = setTimeout(() => {
    ReloadDataGaleri(keyword);
  }, delay);
}

document.addEventListener("DOMContentLoaded", () => {
  searchInput.addEventListener('input', () => { SearchGaleriEvent(500); });
});