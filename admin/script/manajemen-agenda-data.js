async function ReloadDataAgenda(keyword = null) {
  try {
    const url = keyword
      ? `../api/agenda?search=${encodeURIComponent(keyword)}`
      : '../api/agenda';

    const response = await fetch(url);
    if (!response.ok) throw new Error("Network error");

    agendaData = await response.json();
    for (let agenda of agendaData) {
      if (agenda['tanggal_dibuat']) {
        const date = new Date(agenda['tanggal_dibuat']);
        // agenda['tanggal'] = `${date.getDate()} ${GetMonthID(date.getMonth(), 3)} ${date.getFullYear()}`;
        agenda['url_foto'] = (await IsUrlFound("assets/" + agenda['url_foto'])) ? "../assets/" + agenda['url_foto'] : "";
      }
      if (agenda['url_foto']) {
        agenda['url_foto'] = (await IsUrlFound("assets/" + agenda['url_foto'])) ? "../assets/" + agenda['url_foto'] : "";
      }
    }
    displayAgendaCards(currentPage);

    return agendaData;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostTambahAgenda(judul, deskripsi, tanggal, waktu, lokasi, foto_agenda) {
  try {
    const method = 'POST';
    const url = './post/manajemen-agenda/tambah-agenda.php';

    const formData = new FormData();
    formData.append('judul', judul);
    formData.append('deskripsi', deskripsi);
    formData.append('tanggal', tanggal);
    formData.append('waktu', waktu);
    formData.append('lokasi', lokasi);

    if (foto_agenda) formData.append('foto_agenda', foto_agenda);

    let process = await MakeXMLRequest(method, url, formData);
    SearchAgendaEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostEditAgenda(id_agenda, judul, deskripsi, tanggal, waktu, lokasi, foto_agenda) {
  try {
    const method = 'POST';
    const url = './post/manajemen-agenda/update-agenda.php';

    const formData = new FormData();
    formData.append('id_agenda', id_agenda);
    formData.append('judul', judul);
    formData.append('deskripsi', deskripsi);
    formData.append('tanggal', tanggal);
    formData.append('waktu', waktu);
    formData.append('lokasi', lokasi);

    if (foto_agenda) formData.append('foto_agenda', foto_agenda);

    const process = await MakeXMLRequest(method, url, formData)
    SearchAgendaEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostDeleteAgenda(id_agenda) {
  try {
    const method = 'POST';
    const url = './post/manajemen-agenda/hapus-agenda.php';
    const formData = new FormData();
    formData.append('id_agenda', id_agenda);

    const process = await MakeXMLRequest(method, url, formData);
    SearchAgendaEvent();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

const searchInput = document.querySelector('.search-input');
function SearchAgendaEvent(delay = 0) {
  const keyword = searchInput.value.trim();
  if (searchInput.searchTimeout) {
    clearTimeout(searchInput.searchTimeout);
  }

  searchInput.searchTimeout = setTimeout(() => {
    ReloadDataAgenda(keyword);
  }, delay);
}

document.addEventListener("DOMContentLoaded", () => {
  searchInput.addEventListener('input', () => { SearchAgendaEvent(500); });
});