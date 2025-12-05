async function ReloadDataStrukturOrganisasi(keyword = null) {
  try {
    const url = '../api/struktur_organisasi';

    const response = await fetch(url);
    if (!response.ok) throw new Error("Network error");

    strukturOrganisasiData = await response.json();
    if (strukturOrganisasiData)
    {
      for (let foto of strukturOrganisasiData) {
        foto['url_foto'] = (await IsUrlFound("assets/" + foto['url_foto'])) ? "../assets/" + foto['url_foto'] : "";
      }
    }

    return strukturOrganisasiData;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}

async function PostSimpanStrukturOrganisasi(foto_struktur) {
  try {
    const method = 'POST';
    const url = './post/struktur-organisasi/update-struktur.php';
    
    const formData = new FormData();
    if (foto_struktur) {
      for (const foto of foto_struktur) {
        if (foto) formData.append('foto_struktur[]', foto);
      }
    }

    const process = await MakeXMLRequest(method, url, formData)
    ReloadDataStrukturOrganisasi();

    return process;
  } catch (error) {
    console.error("Could not fetch XML with XHR:", error);
  }
  return false;
}