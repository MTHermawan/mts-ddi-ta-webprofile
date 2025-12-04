<?php session_start();
require_once "./includes/check-auth.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manajemen Galeri</title>
  <link rel="stylesheet" href="./style/dashboard.css" />
  <link rel="stylesheet" href="./style/manajemen-galeri.css" />
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

    <!-- Title Menu -->
    <h1 class="menu-title">Galeri</h1>

    <!-- Main Content -->
    <div class="main-content">
      <div class="main-content-header">
        <div class="search-container">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input
            type="text"
            class="search-input"
            placeholder="Cari judul galeri" />
        </div>

        <div class="button-container">
          <button class="export button">
            <i class="fa-solid fa-file-export"></i> Export CSV
          </button>
          <button
            class="add button"
            id="btn_tambah_galeri"
            onclick="openPopup()">
            <i class="fa-solid fa-plus"></i> Tambah Galeri
          </button>
        </div>
      </div>

      <div class="main-content-data">
        <!-- Tampilan Jika Data Kosong -->
        <div class="empty-data" id="emptyData">
          <div class="empty-data-placeholder" id="emptyDataPlaceholder">
            <img src="../assets/icon-empty-data.svg" alt="logo empty data" />
            <p>Belum ada data galeri yang ditambahkan</p>
            <p>Klik tombol "Tambah Galeri" untuk menambahkan</p>
          </div>
        </div>

        <!-- Data Galeri -->
        <div class="galeri-container" id="galeriContainer">
          <!-- Card 1: Kegiatan Belajar Mengajar -->
          <div class="galeri-card">
            <div class="galeri-image">
              <img
                src="https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                alt="Ekstrakurikuler" />
            </div>
            <div class="galeri-content">
              <h3 class="galeri-title">Kegiatan Belajar Mengajar di Kelas</h3>
              <p class="galeri-description">
                Momen seru siswa-siswi dalam proses pembelajaran interaktif
                dengan metode modern yang menyenangkan.
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
          </div>

          <!-- Card 2: Ekstrakurikuler -->
          <div class="galeri-card">
            <div class="galeri-image">
              <img
                src="https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                alt="Ekstrakurikuler" />
            </div>
            <div class="galeri-content">
              <h3 class="galeri-title">Kegiatan Ekstrakurikuler Pramuka</h3>
              <p class="galeri-description">
                Siswa-siswi mengikuti latihan kepramukaan untuk mengembangkan
                karakter dan keterampilan kepemimpinan.
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
          </div>

          <!-- Card 3: Laboratorium -->
          <div class="galeri-card">
            <div class="galeri-image">
              <img
                src="https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                alt="Ekstrakurikuler" />
            </div>
            <div class="galeri-content">
              <h3 class="galeri-title">Praktikum di Laboratorium Sains</h3>
              <p class="galeri-description">
                Siswa melakukan eksperimen sains dengan peralatan modern untuk
                memahami konsep ilmiah secara langsung.
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
          </div>

          <!-- Card 4: Perpustakaan -->
          <div class="galeri-card">
            <div class="galeri-image">
              <img
                src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                alt="Perpustakaan" />
            </div>
            <div class="galeri-content">
              <h3 class="galeri-title">Kegiatan Membaca di Perpustakaan</h3>
              <p class="galeri-description">
                Siswa menikmati waktu membaca di perpustakaan sekolah yang
                nyaman dengan koleksi buku terlengkap.
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
          </div>

          <!-- Card 5: Seni Budaya -->
          <div class="galeri-card">
            <div class="galeri-image">
              <img
                src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                alt="Seni Budaya" />
            </div>
            <div class="galeri-content">
              <h3 class="galeri-title">Pentas Seni dan Budaya</h3>
              <p class="galeri-description">
                Penampilan spektakuler siswa dalam pentas seni yang
                menampilkan bakat di bidang musik, tari, dan teater.
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
          </div>

          <!-- Card 6: Olahraga -->
          <div class="galeri-card">
            <div class="galeri-image">
              <img
                src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                alt="Olahraga" />
            </div>
            <div class="galeri-content">
              <h3 class="galeri-title">Kegiatan Olahraga Sekolah</h3>
              <p class="galeri-description">
                Siswa berpartisipasi dalam berbagai kegiatan olahraga untuk
                menjaga kebugaran dan mengembangkan sportivitas.
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
          </div>

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

  <!-- POP UP TAMBAH/EDIT GALERI -->
  <div class="popup-overlay-form" id="popup">
    <div class="popup-content-form">
      <div class="popup-header">
        <h2 class="popup-title" id="popupTitle">Tambah Galeri</h2>
        <button class="popup-close" onclick="closePopup()">
          <i class="fas fa-times"></i>
        </button>
      </div>

      <!-- Input Gambar -->
      <div class="image-input-container">
        <label class="image-input-label">Foto Galeri</label>
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

      <!-- Input Teks -->
      <div class="text-input-group">
        <label for="titleInput" class="text-input-label">Judul Galeri</label>
        <input
          type="text"
          class="text-input"
          id="titleInput"
          placeholder="Masukkan judul galeri" />
      </div>

      <div class="text-input-group">
        <label for="descriptionInput" class="text-input-label">Deskripsi Galeri</label>
        <textarea
          class="text-input"
          id="descriptionInput"
          placeholder="Masukkan deskripsi galeri"></textarea>
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
          <span class="data-label">Judul Galeri:</span>
          <span class="data-value" id="dataName">judul Galeri</span>
        </div>
        <div class="data-item description">
          <span class="data-label">Deskripsi Galeri:</span>
          <span class="data-value" id="dataDescription">Deskripsi Galeri</span>
        </div>
      </div>

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
  <div id="global-notification" class="notification-popup">
    <div class="notification-icon">
      <i class="fa-solid fa-check-circle"></i>
    </div>
    <div class="notification-content">
      <div class="notification-title">Berhasil!</div>
      <div class="notification-message">Pesan notifikasi</div>
    </div>
  </div>

  <script src="./script/dashboard-admin.js"></script>
  <script src="./script/utility.js"></script>
  <script src="./script/manajemen-galeri.js"></script>
  <script src="./script/manajemen-galeri-data.js"></script>
    <script src="./script/notification.js"></script>
</body>

</html>