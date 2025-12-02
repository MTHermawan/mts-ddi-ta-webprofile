async function ReloadDataTable() {
  const emptyData = document.getElementById('emptyData');
  const dataContainer = document.getElementById('ekskulContainer');

  if (!emptyData || !dataContainer) return;

  if (ekskulData.length === 0) {
    emptyData.style.display = 'flex';
    dataContainer.style.display = 'none';
    return;
  }

  emptyData.style.display = 'none';
  dataContainer.style.display = 'flex';

  const processedData = await Promise.all(
    ekskulData.map(async ekskul => {
      let photoUrl = null;

      if (ekskul['foto'].length > 0) {
        const check = await IsUrlFound("assets/" + ekskul['foto'][0]['url_foto']);
        if (check) {
          photoUrl = ekskul['foto'][0]['url_foto'];
        }
      }

      return { ...ekskul, photoUrl };
    })
  );

  dataContainer.innerHTML = '';
  processedData.forEach(data => {
    const newCard = document.createElement('tr');
    newCard.classList.add("ekskul-card");

    newCard.innerHTML = `
      <div class="ekskul-image">
        ${data['photoUrl'] ? `<img src="../assets/${data['photoUrl']}" alt="${data['nama_fasilitas']}" onerror="this.style.display='none'">` : ''}
      </div>
      <div class="ekskul-content">
        <h3 class="ekskul-title">${data['nama_ekskul']}</h3>
        <div class="ekskul-info">
          <div class="ekskul-info-item">
            <i class="fas fa-user-tie"></i>
            <span class="ekskul-info-label">Pembimbing:</span>
            <span class="ekskul-info-value">${data['nama_pembimbing']}</span>
          </div>
          <div class="ekskul-info-item">
            <i class="fas fa-calendar-alt"></i>
            <span class="ekskul-info-label">Jadwal:</span>
            <span class="ekskul-info-value">${data['jadwal']}</span>
          </div>
        </div>
      </div>
      <div class="ekskul-actions">
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
      openEditPopup(data.id_staff);
    });

    deleteButton.addEventListener("click", () => {
      openDeletePopup(data.id_staff);
    });

    dataContainer.appendChild(newCard);
  });
}

async function ReloadDataEkskul(keyword = null) {
  try {
    const url = keyword
      ? `../api/ekskul?search=${encodeURIComponent(keyword)}`
      : '../api/ekskul';

    const response = await fetch(url);
    if (!response.ok) throw new Error("Network error");

    ekskulData = await response.json();
    ReloadDataTable();

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
    
    if (foto_ekskul) formData.append('foto_ekskul', foto_ekskul);
    
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
    const url = './post/manajemen-ekskul/update-staff.php';

    const formData = new FormData();
    formData.append('id_ekskul', id_ekskul);
    formData.append('nama_ekskul', nama_ekskul);
    formData.append('nama_pembimbing', nama_pembimbing);
    formData.append('jadwal', jadwal);
    
    if (foto_ekskul) formData.append('foto_ekskul', foto_ekskul);

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
  clearTimeout(this.searchTimeout);
  searchInput.searchTimeout = setTimeout(() => {
    ReloadDataStaff(keyword);
  }, delay);
}
searchInput.addEventListener('input', () => { SearchEkskulEvent(500); });

document.addEventListener("DOMContentLoaded", ReloadDataEkskul());