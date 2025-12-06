<?php session_start();
require_once "./includes/check-auth.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manajemen Berita</title>
  <link rel="stylesheet" href="./style/dashboard.css" />
  <link rel="stylesheet" href="./style/manajemen-berita.css" />
  <link
    rel="icon"
    href="../assets/logo-sekolah.png"
    type="image/png/jpeg/jpg" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
  <!-- Sidebar -->
  <?php include "./includes/sidebar.php"; ?>

  <!-- Main -->
  <div class="main">
    <!-- Header Navbar -->
    <?php include "./includes/header.php" ?>

    <!-- MAIN CONTENT -->
    <!-- Title Menu -->
    <h1 class="menu-title">Berita</h1>

    <!-- Main Content -->
    <div class="main-content">
      <div class="main-content-header">
        <div class="search-container">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input
            type="text"
            class="search-input"
            placeholder="Cari judul berita" />
        </div>

        <div class="button-container">
          <button class="export button">
            <i class="fa-solid fa-file-export"></i> Ekspor CSV
          </button>
          <button
            class="add button"
            id="btn_tambah_guru"
            onclick="openPopup('Tambah Berita')">
            <i class="fa-solid fa-plus"></i> Tambah Berita
          </button>
        </div>
      </div>

      <!-- Quick Pinned Selector -->
      <div class="quick-pinned-selector">
        <label for="pinnedBeritaSelect">Pilih Berita Utama:</label>
        <select id="pinnedBeritaSelect" class="form-select">
          <option value="">-- Pilih Berita --</option>
          <!-- Opsi akan diisi oleh JavaScript -->
        </select>
        <button onclick="setPinnedFromSelect()" class="button">
          <i class="fas fa-thumbtack"></i> Set sebagai Utama
        </button>
      </div>

      <div class="main-content-data">
        <!-- Tampilan Jika Data Kosong -->
        <div class="empty-data" id="emptyData">
          <div class="empty-data-placeholder" id="emptyDataPlaceholder">
            <img src="../assets/icon-empty-data.svg" alt="logo empty data" />
            <p>Belum ada data berita yang ditambahkan</p>
            <p>Klik tombol "Tambah Berita" untuk menambahkan</p>
          </div>
          <img
            class="struktur-organisasi-image"
            id="strukturOrganisasiImage"
            style="display: none"
            alt="Struktur Organisasi" />
        </div>

        <!-- Data Berita -->
        <div class="berita-container" id="beritaContainer">
          <!-- Card akan diisi oleh JavaScript -->
        </div>

      </div>

      <!-- Pagination -->
      <div class="pagination-container" id="paginationContainer">
        <div class="pagination-info" id="paginationInfo">
          Menampilkan 1-6 dari 6 data
        </div>
        <div class="pagination-controls">
          <button class="pagination-btn prev" id="prevPage" disabled>
            <i class="fas fa-chevron-left"></i>
          </button>
          <div class="page-numbers" id="pageNumbers">
            <span class="page-number active">1</span>
          </div>
          <button class="pagination-btn next" id="nextPage" disabled>
            <i class="fas fa-chevron-right"></i>
          </button>
        </div>
      </div>

    </div>

  </div>

  <!-- POP UP TAMBAH/EDIT BERITA -->
  <div class="popup-overlay-form" id="popup">
    <div class="popup-content-form">
      <div class="popup-header">
        <h2 class="popup-title" id="popupTitle">Tambah Berita</h2>
        <button class="popup-close" onclick="closePopup()">
          <i class="fas fa-times"></i>
        </button>
      </div>

      <div class="input-container">
        <!-- Input Gambar -->
        <div class="image-input-container">
          <label class="image-input-label">Foto Berita</label>
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
                <p>PNG, JPG, JPEG.</p>
              </div>
            </div>

            <!-- Preview gambar -->
            <div class="image-preview" id="imagePreview">
              <img id="previewImage" src="" alt="Preview" />
              <div class="image-preview-actions">
                <button
                  type="button"
                  class="preview-action-btn change">
                  <i class="fas fa-sync-alt"></i> Ganti
                </button>
                <button
                  type="button"
                  class="preview-action-btn remove">
                  <i class="fas fa-trash"></i> Hapus
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="text-input-container">
          <!-- Input Teks -->
          <div class="text-input-group">
            <label for="titleInput" class="text-input-label">Judul Berita</label>
            <input
              type="text"
              class="text-input"
              id="titleInput"
              placeholder="Masukkan judul berita" />
          </div>

          <div class="text-input-group">
            <label for="dateInput" class="text-input-label">Tanggal Diterbitkan</label>
            <input
              type="text"
              class="text-input"
              id="dateInput"
              placeholder="Masukkan tanggal diterbitkan" />
          </div>

          <div class="text-input-group">
            <label for="creatorInput" class="text-input-label">Pembuat Berita</label>
            <input
              type="text"
              class="text-input"
              id="creatorInput"
              placeholder="Masukkan pembuat berita" />
          </div>

        </div>

      </div>

      <div class="text-input-group">
        <label for="descriptionInput" class="text-input-label">Deskripsi Berita</label>
        <textarea
          class="text-input"
          id="descriptionInput"
          placeholder="Masukkan deskripsi berita"></textarea>
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

  <!-- POP UP KONFIRMASI DELETE -->
  <div class="popup-overlay-delete" id="deletePopup">
    <div class="popup-content-delete">
      <div class="popup-icon">
        <i class="fas fa-exclamation-triangle"></i>
      </div>

      <h2 class="popup-title">Hapus Data?</h2>

      <p class="popup-message">
        Data yang dihapus tidak dapat dikembalikan. Pastikan data yang akan
        dihapus sudah benar.
      </p>

      <!-- Informasi Data yang Akan Dihapus -->
      <div class="popup-data-info">
        <div class="data-item">
          <span class="data-label">Judul Berita:</span>
          <span class="data-value" id="dataName">judul Berita</span>
        </div>
        <div class="data-item">
          <span class="data-label">Tanggal Diterbitkan:</span>
          <span class="data-value" id="dataDate">tanggal Berita</span>
        </div>
        <div class="data-item">
          <span class="data-label">Pembuat Berita:</span>
          <span class="data-value" id="dataCreator">pembuat Berita</span>
        </div>
        <div class="data-item description">
          <span class="data-label">Deskripsi Berita:</span>
          <span class="data-value" id="dataDescription">Deskripsi Berita</span>
        </div>
      </div>

      <!-- Tombol Aksi -->
      <div class="popup-actions-delete">
        <button
          type="button"
          class="popup-btn-delete cancel"
          onclick="closeDeletePopup()">
          <i class="fas fa-times"></i> Batal
        </button>
        <button
          type="button"
          class="popup-btn-delete delete"
          onclick="confirmDelete()">
          <i class="fas fa-trash"></i> Hapus
        </button>
      </div>
    </div>
  </div>

  </div>
  <!-- Notifikasi Popup Global -->
  <!-- <div id="global-notification" class="notification-popup">
    <div class="notification-icon">
      <i class="fa-solid fa-check-circle"></i>
    </div>
    <div class="notification-content">
      <div class="notification-title">Berhasil!</div>
      <div class="notification-message">Pesan notifikasi</div>
    </div>
  </div> -->
  <script src="./script/dashboard-admin.js"></script>
  <script src="./script/utility.js"></script>
  <script src="./script/manajemen-berita.js"></script>
  <script src="./script/manajemen-berita-data.js"></script>
  <script src="./script/notification.js"></script>
</body>

</html>