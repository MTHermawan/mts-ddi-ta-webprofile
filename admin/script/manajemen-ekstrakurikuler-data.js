async function ReloadDataEkskul(keyword = null) {
  try {
    const url = keyword
      ? `../api/ekskul?search=${encodeURIComponent(keyword)}`
      : '../api/ekskul';

    const response = await fetch(url);
    if (!response.ok) throw new Error("Network error");

    ekskulData = await response.json();
    for (let ekskul of ekskulData) {
      for (let foto of ekskul.foto) {
        foto['url_foto'] = (await IsUrlFound("assets/" + foto['url_foto'])) ? "../assets/" + foto['url_foto'] : "";
      }
    }
    displayEkskulCards(currentPage);

    return ekskulData;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}


async function PostTambahEkskul(nama_ekskul, nama_pembimbing, jadwal, foto_ekskul) {
  try {
    const method = 'POST';
    const url = './post/manajemen-ekskul/tambah-ekskul.php';

    const formData = new FormData();
    formData.append('nama_ekskul', nama_ekskul);
    formData.append('nama_pembimbing', nama_pembimbing);
    formData.append('jadwal', jadwal);
    
    if (foto_ekskul) {
      for (const foto of foto_ekskul) {
        if (foto) formData.append('foto_ekskul[]', foto);
      }
    }
    
    let process = await MakeXMLRequest(method, url, formData);
    SearchEkskulEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostEditEkskul(id_ekskul, nama_ekskul, nama_pembimbing, jadwal, foto_ekskul) {
  try {
    const method = 'POST';
    const url = './post/manajemen-ekskul/update-ekskul.php';

    const formData = new FormData();
    formData.append('id_ekskul', id_ekskul);
    formData.append('nama_ekskul', nama_ekskul);
    formData.append('nama_pembimbing', nama_pembimbing);
    formData.append('jadwal', jadwal);
    
    if (foto_ekskul) {
      for (const foto of foto_ekskul) {
        if (foto) formData.append('foto_ekskul[]', foto);
      }
    }

    const process = await MakeXMLRequest(method, url, formData)
    SearchEkskulEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostDeleteEkskul(id_ekskul) {
  try {
    const method = 'POST';
    const url = './post/manajemen-ekskul/hapus-ekskul.php';
    const formData = new FormData();
    formData.append('id_ekskul', id_ekskul);

    const process = await MakeXMLRequest(method, url, formData);
    SearchEkskulEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

const searchInput = document.querySelector('.search-input');
function SearchEkskulEvent(delay = 0) {
  const keyword = searchInput.value.trim();
  if (searchInput.searchTimeout) {
    clearTimeout(searchInput.searchTimeout);
  }

  searchInput.searchTimeout = setTimeout(() => {
    ReloadDataEkskul(keyword);
  }, delay);
}

document.addEventListener("DOMContentLoaded", () => {
  searchInput.addEventListener('input', () => { SearchEkskulEvent(500); });
});