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

  if (facilitiesData.length === 0) {
    emptyData.style.display = 'flex';
    dataContainer.style.display = 'none';
    return;
  }

  emptyData.style.display = 'none';
  dataContainer.style.display = 'flex';

  const processedData = await Promise.all(
    facilitiesData.map(async fasilitas => {
      let photoUrl = null;

      if (fasilitas['url_foto']) {
        const check = await IsUrlFound("assets/" + fasilitas['url_foto']);
        if (check) {
          photoUrl = fasilitas['url_foto'];
        }
      }

      return { ...fasilitas, photoUrl };
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

async function ReloadDataFasilitas(keyword = null) {
  try {
    const url = keyword
      ? `../api/fasilitas?search=${encodeURIComponent(keyword)}`
      : '../api/fasilitas';

    const response = await fetch(url);
    if (!response.ok) throw new Error("Network error");

    facilitiesData = await response.json();
    ReloadDataTable();

    return facilitiesData;
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
    
    if (foto_fasilitas) formData.append('foto_fasilitas', foto_fasilitas);
    
    let process = await MakeXMLRequest(method, url, formData);
    SearchFasilitasEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostEditFasilitas(id_fasilitas, nama_fasilitas, deskripsi_fasilitas, file_foto) {
  try {
    const method = 'POST';
    const url = './post/manajemen-fasilitas/update-fasilitas.php';

    const formData = new FormData();
    formData.append('id_fasilitas', id_fasilitas);
    formData.append('nama_faslitas', nama_fasilitas);
    formData.append('deskripsi_fasilitas', deskripsi_fasilitas);

    if (file_foto) formData.append('foto_fasilitas', file_foto);

    const process = await MakeXMLRequest(method, url, formData)
    SearchFasilitasEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function DeleteFasilitas(id_fasilitas) {
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
searchInput.addEventListener('input', () => { SearchFasilitasEvent(500); });

document.addEventListener("DOMContentLoaded", ReloadDataFasilitas());