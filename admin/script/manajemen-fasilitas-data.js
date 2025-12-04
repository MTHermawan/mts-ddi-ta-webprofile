async function ReloadDataFasilitas(keyword = null) {
  try {
    const url = keyword
      ? `../api/fasilitas?search=${encodeURIComponent(keyword)}`
      : '../api/fasilitas';

    const response = await fetch(url);

    fasilitasData = await response.json();
    for (let fasilitas of fasilitasData) {
      for (let foto of fasilitas.foto) {
        foto['url_foto'] = (await IsUrlFound("assets/" + foto['url_foto'])) ? "../assets/" + foto['url_foto'] : "";
      }
    }
    console.log(fasilitasData);
    displayFacilitiesCards(); 

    return fasilitasData;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}


async function PostTambahFasilitas(nama, deskripsi, foto_fasilitas) {
  try {
    const method = 'POST';
    const url = './post/manajemen-fasilitas/tambah-fasilitas.php';

    const formData = new FormData();
    formData.append('nama_fasilitas', nama);
    formData.append('deskripsi_fasilitas', deskripsi);

    for (const foto of foto_fasilitas)
    {
      if (foto) formData.append('foto_fasilitas[]', foto);
    }

    let process = await MakeXMLRequest(method, url, formData);
    SearchFasilitasEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostEditFasilitas(id_fasilitas, nama_fasilitas, deskripsi, file_foto) {
  try {
    const method = 'POST';
    const url = './post/manajemen-fasilitas/update-fasilitas.php';

    const formData = new FormData();
    formData.append('id_fasilitas', id_fasilitas);
    formData.append('nama_fasilitas', nama_fasilitas);
    formData.append('deskripsi_fasilitas', deskripsi);

    if (file_foto) formData.append('foto_fasilitas[]', file_foto);

    const process = await MakeXMLRequest(method, url, formData)
    SearchFasilitasEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostDeleteFasilitas(id_fasilitas) {
  try {
    const method = 'POST';
    const url = './post/manajemen-fasilitas/hapus-fasilitas.php';
    const formData = new FormData();
    formData.append('id_fasilitas', id_fasilitas);

    const process = await MakeXMLRequest(method, url, formData);
    SearchFasilitasEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

const searchInput = document.querySelector('.search-input');
function SearchFasilitasEvent(delay = 0) {
  const keyword = searchInput.value.trim();
  clearTimeout(this.searchTimeout);
  searchInput.searchTimeout = setTimeout(() => {
    ReloadDataFasilitas(keyword);
  }, delay);
}

document.addEventListener("DOMContentLoaded", () => {
  // ReloadDataFasilitas();
  // searchInput.addEventListener('input', () => { SearcFasilitasEvent(500); });
});