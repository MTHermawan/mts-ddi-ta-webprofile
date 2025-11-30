function ReloadTableEventListener() {
  const avatarImages = document.querySelectorAll(".teacher-avatar img");

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
  const emptyData = document.getElementById('emptyData');
  const dataContainer = document.getElementById('facilitiesContainer');

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
    newCard.classList.add('facility-card');

    newCard.innerHTML = `
       <div class="facility-image">
              ${data['photoUrl'] ? `<img src="../assets/${data['photoUrl']}" alt="${data['nama_fasilitas']}" onerror="this.style.display='none'">` : ''}
            </div>
            <div class="facility-content">
              <h3 class="facility-title">${data['nama_fasilitas']}</h3>
              <p class="facility-description">${data['deskripsi_fasilitas']}</p>
            </div>
            <div class="facility-actions">
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
      openEditPopup(data.id_fasilitas);
    });

    deleteButton.addEventListener("click", () => {
      openDeletePopup(data.id_fasilitas);
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

async function PostEditFasilitas(id_galeri, judul_galeri, deskripsi, foto_galeri) {
  try {
    const method = 'POST';
    const url = './post/manajemen-fasilitas/update-fasilitas.php';

    const formData = new FormData();
    formData.append('id_galeri', id_galeri);
    formData.append('nama_galeri', judul_galeri);
    formData.append('deskripsi', deskripsi);

    if (foto_galeri) formData.append('foto_galeri', foto_galeri);

    const process = await MakeXMLRequest(method, url, formData)
    SearchGaleriEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function DeleteFasilitas(id_galeri) {
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