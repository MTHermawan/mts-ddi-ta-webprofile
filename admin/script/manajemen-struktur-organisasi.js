const fileInputLogo = document.createElement("input");
fileInputLogo.type = "file";
fileInputLogo.accept = "image/*";
fileInputLogo.style.display = "none";
fileInputLogo.id = "imageInput";
fileInputLogo.multiple = true;

strukturOrganisasiData = [];

// JavaScript untuk menangani upload gambar
document.addEventListener("DOMContentLoaded", function () {
  const uploadButton = document.getElementById("uploadButton");
  const strukturOrganisasiContainer = document.getElementById(
    "strukturOrganisasiContainer"
  );
  const strukturOrganisasiPlaceholder = document.getElementById(
    "strukturOrganisasiPlaceholder"
  );
  const strukturOrganisasiImage = document.getElementById(
    "strukturOrganisasiImage"
  );

  // Membuat input file tersembunyi
  document.body.appendChild(fileInputLogo);

  // Event listener untuk tombol upload
  uploadButton.addEventListener("click", function () {
    fileInputLogo.click();
  });

  // Event listener untuk input file
  fileInputLogo.addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();

      reader.onload = function (e) {
        strukturOrganisasiImage.src = e.target.result;
        strukturOrganisasiImage.style.display = "block";
        strukturOrganisasiPlaceholder.style.display = "none";
        hapusButton.style.display = "block"; // Tampilkan tombol hapus
      };

      reader.readAsDataURL(file);
    }
  });

  // Event listener untuk tombol hapus
  hapusButton.addEventListener("click", function () {
    // Reset tampilan
    strukturOrganisasiImage.src = "";
    strukturOrganisasiImage.style.display = "none";
    strukturOrganisasiPlaceholder.style.display = "block";
    hapusButton.style.display = "none"; // Sembunyikan tombol hapus

    // Reset input file
    fileInputLogo.value = "";
  });

  simpanButton.addEventListener('click', () => {
    submitForm();
  });

  window.onload = () => {
    ReloadStrukturOrgnanisasiView();
  }
});

async function ReloadStrukturOrgnanisasiView() {
  if (typeof ReloadDataStrukturOrganisasi == 'function') {
    await ReloadDataStrukturOrganisasi();
  }

  if (strukturOrganisasiData) {
    if (typeof handleResumeInput == 'function') {
      url_foto_arr = Object.values(strukturOrganisasiData).map(foto => foto.url_foto).filter(url => url);
      handleResumeInput('imageInput', url_foto_arr);
    }
  }
}

async function submitForm() {
  const foto_struktur = fileInputLogo.files[0] ? fileInputLogo.files : null;

  const success = await PostSimpanStrukturOrganisasi(foto_struktur);
  success ? showSuccess( "Struktur organisasi berhasil ditambahkan") : showError("Struktur organisasi gagal ditambahkan");

  if (success) {
    // Refresh fasilitas cards
    ReloadStrukturOrgnanisasiView();
  }
}

