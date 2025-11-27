<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manajemen Ekskul</title>
  <link rel="stylesheet" href="./style/dashboard.css" />
  <link rel="stylesheet" href="./style/manajemen-ekskul.css" />
  <link rel="icon" href="../assets/logo-sekolah.png" type="image/png/jpeg/jpg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body id="ekskul">
  <!-- Sidebar -->
  <?php include "./includes/sidebar.php"; ?>

  <!-- Main -->
  <div class="main">
    <!-- Header Navbar -->
    <header>
      <nav>
        <div class="profile-admin">
          <div class="profile-avatar"><i class="fa-regular fa-user"></i></div>
          <div class="profile-info">
            <div class="profile-name">Admin Dashboard</div>
            <div class="profile-role">Administrator</div>
          </div>
        </div>
        <div class="exit-logo">
          <i class="fa-solid fa-arrow-right-from-bracket"></i>
        </div>
      </nav>
    </header>

    <!-- MAIN CONTENT -->
    <!-- Title Menu -->
    <h1 class="menu-title">Ekstrakulikuler</h1>

    <!-- Main Content -->
    <div class="main-content">
      <div class="main-content-header">
        <div class="search-container">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input
            type="text"
            class="search-input"
            placeholder="Cari nama guru" />
        </div>

        <div class="button-container">
          <button class="export button">
            <i class="fa-solid fa-file-export"></i> Export CSV
          </button>
          <button
            class="add button"
            id="btn_tambah_guru"
            onclick="openPopup()">
            <i class="fa-solid fa-plus"></i> Tambah Ekstrakulikuler
          </button>
        </div>
      </div>

      <div class="main-content-data">
        <!-- Tampilan Jika Data Kosong -->
        <div class="empty-data" id="emptyData">
          <div class="empty-data-placeholder" id="emptyDataPlaceholder">
            <img src="../assets/icon-empty-data.svg" alt="logo empty data" />
            <p>Belum ada data ekstrakulikuler yang ditambahkan</p>
            <p>Klik tombol "Tambah Ekstrakulikuler" untuk menambahkan</p>
          </div>
          <img
            class="struktur-organisasi-image"
            id="strukturOrganisasiImage"
            style="display: none"
            alt="Struktur Organisasi" />
        </div>

        <!-- Data ekskul -->

      </div>
    </div>

    <!-- POP UP TAMBAH EKSKUL -->
    <div class="popup-overlay-form" id="popup">
      <div class="popup-content-form">
        <div class="popup-header">
          <h2 class="popup-title" id="popupTitle">Tambah Ekstrakulikuler</h2>
          <button class="popup-close" onclick="closePopup()">
            <i class="fas fa-times"></i>
          </button>
        </div>

        <!-- Input Gambar -->
        <div class="image-input-container">
          <label class="image-input-label">Foto Ekstrakulikuler</label>
          <div class="image-upload-area" id="imageUploadArea">
            <input
              type="file"
              class="image-input"
              id="imageInput"
              accept="image/*" />

            <!-- Placeholder (default state) -->
            <div class="image-placeholder" id="imagePlaceholder">
              <div class="image-placeholder-icon">
                <i class="fas fa-cloud-upload-alt"></i>
              </div>
              <div class="image-placeholder-text">
                <p><strong>Klik untuk upload</strong> atau drag & drop</p>
                <p>PNG, JPG, JPEG (Max. 5MB)</p>
              </div>
            </div>

            <!-- Preview gambar -->
            <div class="image-preview" id="imagePreview">
              <img id="previewImage" src="" alt="Preview" />
              <div class="image-preview-actions">
                <button
                  type="button"
                  class="preview-action-btn change"
                  onclick="triggerImageInput()">
                  <i class="fas fa-sync-alt"></i> Ganti
                </button>
                <button
                  type="button"
                  class="preview-action-btn remove"
                  onclick="removeImage()">
                  <i class="fas fa-trash"></i> Hapus
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Input Teks -->
        <div class="text-input-group">
          <label for="titleInput" class="text-input-label">Nama Ekstrakulikuler</label>
          <input
            type="text"
            class="text-input"
            id="titleInput"
            placeholder="Masukkan judul konten" />
        </div>

        <div class="text-input-group">
          <label for="titleInput" class="text-input-label">Nama Pembimbing</label>
          <input
            type="text"
            class="text-input"
            id="titleInput"
            placeholder="Masukkan judul konten" />
        </div>

        <div class="text-input-group">
          <label for="titleInput" class="text-input-label">Jadwal</label>
          <input
            type="text"
            class="text-input"
            id="titleInput"
            placeholder="Masukkan judul konten" />
        </div>

        <!-- Tombol Aksi -->
        <div class="popup-actions-form">
          <button
            type="button"
            class="popup-btn-form cancel"
            onclick="closePopup()">
            <i class="fas fa-times"></i> Batal
          </button>
          <button
            type="button"
            class="popup-btn-form submit"
            onclick="submitForm()">
            <i class="fa-regular fa-floppy-disk"></i> Simpan
          </button>
        </div>
      </div>
    </div>


  </div>

  <script src="./script/dashboard-admin.js"></script>
</body>

</html>