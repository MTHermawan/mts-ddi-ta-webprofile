async function ReloadDataSejarah(keyword = null) {
  try {
    const url = keyword
      ? `../api/sejarah?search=${encodeURIComponent(keyword)}`
      : '../api/sejarah';

    const response = await fetch(url);
    if (!response.ok) throw new Error("Network error");

    sejarahData = await response.json();
    refreshSejarahDisplay();

    return sejarahData;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostTambahSejarah(judul_sejarah, tahun_sejarah, deskripsi) {
  try {
    const method = 'POST';
    const url = './post/manajemen-sejarah/tambah-sejarah.php';

    const formData = new FormData();
    formData.append('judul_sejarah', judul_sejarah);
    formData.append('tahun_sejarah', tahun_sejarah);
    formData.append('deskripsi', deskripsi);

    let process = await MakeXMLRequest(method, url, formData);
    ReloadDataSejarah();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostEditSejarah(id_sejarah, judul_sejarah, tahun_sejarah, deskripsi) {
  try {
    const method = 'POST';
    const url = './post/manajemen-sejarah/update-sejarah.php';

    const formData = new FormData();
    formData.append('id_sejarah', id_sejarah);
    formData.append('judul_sejarah', judul_sejarah);
    formData.append('tahun_sejarah', tahun_sejarah);
    formData.append('deskripsi', deskripsi);

    const process = await MakeXMLRequest(method, url, formData)
    ReloadDataSejarah();

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
    ReloadDataSejarah();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}