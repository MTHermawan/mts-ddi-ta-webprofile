<?php session_start();
require_once "./includes/check-auth.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manajemen Fasilitas</title>
  <link rel="stylesheet" href="./style/dashboard.css" />
  <link rel="stylesheet" href="./style/manajemen-fasilitas.css" />
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
    <h1 class="menu-title">Fasilitas</h1>

    <!-- Main Content -->
    <div class="main-content">
      <div class="main-content-header">
        <div class="search-container">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input
            type="text"
            class="search-input"
            placeholder="Cari nama fasilitas" />
        </div>

        <div class="button-container">
          <button class="export button">
            <i class="fa-solid fa-file-export"></i> Export CSV
          </button>
          <button
            class="add button"
            id="btn_tambah_guru"
            onclick="openPopup('Tambah Fasilitas')">
            <i class="fa-solid fa-plus"></i> Tambah Fasilitas
          </button>
        </div>
      </div>

      <div class="main-content-data">
        <!-- Tampilan Jika Data Kosong -->
        <div class="empty-data" id="emptyData">
          <div class="empty-data-placeholder" id="emptyDataPlaceholder">
            <img src="../assets/icon-empty-data.svg" alt="logo empty data" />
            <p>Belum ada data fasilitas yang ditambahkan</p>
            <p>Klik tombol "Tambah Fasilitas" untuk menambahkan</p>
          </div>
        </div>

        <!-- Data Fasilitas -->
        <div class="facilities-container" id="facilitiesContainer">

          <!-- Card 1: Perpustakaan -->
          <div class="facility-card">
            <div class="facility-image">
              <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Perpustakaan">
            </div>
            <div class="facility-content">
              <h3 class="facility-title">Perpustakaan Sekolah</h3>
              <p class="facility-description">Perpustakaan sekolah dengan koleksi lebih dari 10.000 buku dari berbagai genre dan kategori. Dilengkapi dengan ruang baca yang nyaman dan area komputer untuk penelitian.</p>
            </div>
            <div class="facility-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 2: Laboratorium Komputer -->
          <div class="facility-card">
            <div class="facility-image">
              <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Laboratorium Komputer">
            </div>
            <div class="facility-content">
              <h3 class="facility-title">Laboratorium Komputer</h3>
              <p class="facility-description">Laboratorium komputer modern dengan 40 unit komputer terbaru, jaringan internet cepat, dan perangkat lunak pendidikan terkini untuk mendukung proses belajar mengajar.</p>
            </div>
            <div class="facility-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 3: Lapangan Olahraga -->
          <div class="facility-card">
            <div class="facility-image">
              <img src="https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Lapangan Olahraga">
            </div>
            <div class="facility-content">
              <h3 class="facility-title">Lapangan Olahraga</h3>
              <p class="facility-description">Lapangan olahraga multifungsi dengan ukuran standar untuk sepak bola, basket, voli, dan atletik. Dilengkapi dengan tribun penonton dan pencahayaan untuk kegiatan malam.</p>
            </div>
            <div class="facility-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 4: Laboratorium Sains -->
          <div class="facility-card">
            <div class="facility-image">
              <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Laboratorium Sains">
            </div>
            <div class="facility-content">
              <h3 class="facility-title">Laboratorium Sains</h3>
              <p class="facility-description">Laboratorium sains lengkap untuk praktikum fisika, kimia, dan biologi. Dilengkapi dengan peralatan modern, bahan praktikum, dan sistem keamanan yang memadai.</p>
            </div>
            <div class="facility-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 5: Aula Serbaguna -->
          <div class="facility-card">
            <div class="facility-image">
              <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Aula Serbaguna">
            </div>
            <div class="facility-content">
              <h3 class="facility-title">Aula Serbaguna</h3>
              <p class="facility-description">Aula serbaguna dengan kapasitas 500 orang, dilengkapi sistem audio visual modern, panggung permanen, dan AC untuk berbagai acara sekolah seperti upacara, seminar, dan pertunjukan.</p>
            </div>
            <div class="facility-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 6: Kantin Sekolah -->
          <div class="facility-card">
            <div class="facility-image">
              <img src="https://images.unsplash.com/photo-1554679665-f5537f187268?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Kantin Sekolah">
            </div>
            <div class="facility-content">
              <h3 class="facility-title">Kantin Sekolah</h3>
              <p class="facility-description">Kantin sekolah yang bersih dan sehat dengan berbagai pilihan makanan dan minuman. Dilengkapi dengan area makan yang nyaman dan sistem pembayaran digital.</p>
            </div>
            <div class="facility-actions">
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

  <!-- POP UP TAMBAH/EDIT FASILITAS -->
  <div class="popup-overlay-form" id="popup">
    <div class="popup-content-form">
      <div class="popup-header">
        <h2 class="popup-title" id="popupTitle">Tambah Fasilitas</h2>
        <button class="popup-close" onclick="closePopup()">
          <i class="fas fa-times"></i>
        </button>
      </div>

      <!-- Input Gambar -->
      <div class="image-input-container">
        <label class="image-input-label">Foto Fasilitas</label>
        <div class="image-upload-area" id="imageUploadArea">
          <input
            type="file"
            class="image-input"
            id="imageInput"
            accept="image/*" 
            multiple/>

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
        <label for="titleInput" class="text-input-label" id="inputFacility">Nama Fasilitas</label>
        <input
          type="text"
          class="text-input"
          id="titleInput"
          placeholder="Masukkan nama fasilitas" />
      </div>

      <div class="text-input-group">
        <label for="descriptionInput" class="text-input-label" id="inputDescription">Deskripsi</label>
        <textarea
          class="text-input"
          id="descriptionInput"
          placeholder="Masukkan deskripsi fasilitas"></textarea>
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
          <span class="data-label">Nama:</span>
          <span class="data-value" id="dataName">Nama Fasilitas</span>
        </div>
        <div class="data-item description">
          <span class="data-label">Deskripsi:</span>
          <span class="data-value" id="dataDescription">Deskripsi Fasilitas</span>
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
  <div id="global-notification" class="notification-popup">
    <div class="notification-icon">
      <i class="fa-solid fa-check-circle"></i>
    </div>
    <div class="notification-content">
      <div class="notification-title">Berhasil!</div>
      <div class="notification-message">Pesan notifikasi</div>
    </div>
  </div>
  <script src="./script/utility.js"></script>
  <script src="./script/manajemen-fasilitas.js"></script>
  <script src="./script/manajemen-fasilitas-data.js"></script>
  <script src="./script/notification.js"></script>
</body>

</html>