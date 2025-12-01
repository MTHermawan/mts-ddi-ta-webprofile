async function ReloadDataTable() {
  const emptyData = document.getElementById('emptyData');
  const dataContainer = document.getElementById('galeriContainer');

  if (!emptyData || !dataContainer) return;

  if (galeriData.length === 0) {
    emptyData.style.display = 'flex';
    dataContainer.style.display = 'none';
    return;
  }

  emptyData.style.display = 'none';
  dataContainer.style.display = 'flex';

  const processedData = await Promise.all(
    galeriData.map(async galeri => {
      let photoUrl = null;

      if (galeri['url_foto']) {
        const check = await IsUrlFound("assets/" + galeri['url_foto']);
        if (check) {
          photoUrl = galeri['url_foto'];
        }
      }

      return { ...galeri, photoUrl };
    })
  );

  dataContainer.innerHTML = '';
  processedData.forEach(data => {
    const newCard = document.createElement('div');
    newCard.classList.add('galeri-card');

    newCard.innerHTML = `
        <div class="galeri-image">
              ${data['photoUrl'] ? `<img src="../assets/${data['photoUrl']}" alt="${data['nama_fasilitas']}" onerror="this.style.display='none'">` : ''}
            </div>
            <div class="galeri-content">
              <h3 class="galeri-title">${data['nama_fasilitas']}</h3>
              <p class="galeri-description">
                ${data['deskripsi_fasilitas']}
              </p>
            </div>
            <div class="galeri-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
    `;
       

    const editButton = newCard.querySelector(".edit");
    const deleteButton = newCard.querySelector(".delete");

    editButton.addEventListener("click", () => {
      openEditPopup(data.id_galeri);
    });

    deleteButton.addEventListener("click", () => {
      openDeletePopup(data.id_galeri);
    });

    dataContainer.appendChild(newCard);
  });

  // ReloadTableEventListener();
}

async function ReloadDataGaleri(keyword = null) {
  try {
    const url = keyword
      ? `../api/gaelri?search=${encodeURIComponent(keyword)}`
      : '../api/galeri';

    const response = await fetch(url);
    if (!response.ok) throw new Error("Network error");

    galeriData = await response.json();
    ReloadDataTable();

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
    formData.append('judul_foto_galeri', judul);
    formData.append('deskripsi_foto_galeri', deskripsi);
    
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
    const url = './post/manajemen-galeri/update-gakeri.php';

    const formData = new FormData();
    formData.append('id_galeri', id_galeri);
    formData.append('judul_foto_galeri', judul);
    formData.append('deskripsi_foto_galeri', deskripsi);

    if (foto_galeri) formData.append('foto_galeri', foto_galeri);

    const process = await MakeXMLRequest(method, url, formData)
    SearchGaleriEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostDeleteFasilitas(id_galeri) {
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
searchInput.addEventListener('input', () => { SearchGaleriEvent(500); });

document.addEventListener("DOMContentLoaded", ReloadDataGaleri());