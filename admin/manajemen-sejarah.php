<?php session_start();
require_once "./includes/check-auth.php";
include_once "../data/koneksi.php";
include_once "../data/data_staff.php";
include_once "../data/utility.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sejarah</title>
  <link rel="stylesheet" href="./style/dashboard.css" />
  <link rel="stylesheet" href="./style/manajemen-sejarah.css" />
  <link rel="icon" href="../assets/logo-sekolah.png" type="image/png/jpeg/jpg" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
  <!-- Sidebar -->
  <?php include "./includes/sidebar.php"; ?>

  <!-- Main -->
  <div class="main">
    <!-- Header Navbar -->
    <?php include "./includes/header.php" ?>

    <!-- Main Content -->
    <div class="main-content">
      <div class="main-content-header">
        <!-- Title Menu -->
        <h1 class="menu-title">Sejarah</h1>

        <div class="button-container">
          <button class="add button" id="btn_tambah_sejarah" onclick="openPopup('Tambah Sejarah')">
            <i class="fa-solid fa-plus"></i> Tambah Sejarah
          </button>
        </div>
      </div>

      <div class="main-content-data">
        <!-- Tampilan Jika Data Kosong -->
        <div class="empty-data" id="emptyData">
          <div class="empty-data-placeholder" id="emptyDataPlaceholder">
            <img src="../assets/icon-empty-data.svg" alt="logo empty data" />
            <p>Belum ada data sejarah yang ditambahkan</p>
            <p>Klik tombol "Tambah Sejarah" untuk menambahkan</p>
          </div>
        </div>

        <!-- Data Sejarah -->
        <div class="sejarah-container" id="sejarahContainer">

          <!-- Card 1: Pendirian Sekolah -->
          <div class="sejarah-card">
            <div class="sejarah-year">1985</div>
            <div class="sejarah-content">
              <h2 class="sejarah-title">Pendirian Sekolah</h2>
              <p class="sejarah-description">
                Sekolah ini didirikan dengan nama SMP Negeri 1 Jakarta oleh
                Bapak Dr. Soetomo sebagai bentuk komitmen untuk memberikan
                pendidikan berkualitas bagi generasi muda. Awalnya sekolah
                hanya memiliki 3 ruang kelas dengan 50 siswa.
              </p>
            </div>
            <div class="sejarah-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 2: Pengembangan Fasilitas -->
          <div class="sejarah-card">
            <div class="sejarah-year">1995</div>
            <div class="sejarah-content">
              <h2 class="sejarah-title">Pendirian Sekolah</h2>
              <p class="sejarah-description">
                Dibangunnya perpustakaan sekolah dan laboratorium sains
                pertama. Jumlah siswa meningkat menjadi 200 orang. Sekolah
                mulai mengembangkan kurikulum yang lebih komprehensif dan
                memperkenalkan program ekstrakurikuler.
              </p>
            </div>
            <div class="sejarah-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 3: Akreditasi -->
          <div class="sejarah-card">
            <div class="sejarah-year">2005</div>
            <div class="sejarah-content">
              <h2 class="sejarah-title">Pendirian Sekolah</h2>
              <p class="sejarah-description">
                Sekolah meraih akreditasi A dari Badan Akreditasi Nasional.
                Laboratorium komputer pertama dibangun dengan 20 unit
                komputer. Program bahasa Inggris intensif diperkenalkan untuk
                meningkatkan kompetensi global siswa.
              </p>
            </div>
            <div class="sejarah-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 4: Modernisasi -->
          <div class="sejarah-card">
            <div class="sejarah-year">2015</div>
            <div class="sejarah-content">
              <h2 class="sejarah-title">Pendirian Sekolah</h2>
              <p class="sejarah-description">
                Renovasi besar-besaran dilakukan pada seluruh bangunan
                sekolah. Smart classroom diperkenalkan dengan teknologi
                pembelajaran terbaru. Sekolah mulai menerapkan sistem
                manajemen berbasis digital untuk meningkatkan efisiensi
                administrasi.
              </p>
            </div>
            <div class="sejarah-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 5: Prestasi Internasional -->
          <div class="sejarah-card">
            <div class="sejarah-year">2020</div>
            <div class="sejarah-content">
              <h2 class="sejarah-title">Pendirian Sekolah</h2>
              <p class="sejarah-description">
                Sekolah meraih penghargaan "Sekolah Adiwiyata Nasional" dan
                memenangkan kompetisi sains internasional pertama. Kerjasama
                dengan sekolah-sekolah di luar negeri dimulai untuk program
                pertukaran pelajar dan guru.
              </p>
            </div>
            <div class="sejarah-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 6: Visi Masa Depan -->
          <div class="sejarah-card">
            <div class="sejarah-year">2023</div>
            <div class="sejarah-content">
              <h2 class="sejarah-title">Pendirian Sekolah</h2>
              <p class="sejarah-description">
                Peluncuran program "Sekolah Digital 4.0" dengan integrasi
                teknologi AI dalam pembelajaran. Pembangunan gedung olahraga
                bertaraf internasional dan pusat kreativitas siswa. Sekolah
                menetapkan target menjadi sekolah berstandar internasional
                pada tahun 2025.
              </p>
            </div>
            <div class="sejarah-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>
        </div>

        <!-- Pagination -->
        <div class="pagination-container" id="paginationContainer">
          <div class="pagination-info" id="paginationInfo">
            Menampilkan 0-0 dari 0 data
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

    <!-- POP UP TAMBAH/EDIT SEJARAH-->
    <div class="popup-overlay-form" id="popup">
      <div class="popup-content-form">
        <div class="popup-header">
          <h2 class="popup-title" id="popupTitle">Tambah Sejarah</h2>
          <button class="popup-close" onclick="closePopup()">
            <i class="fas fa-times"></i>
          </button>
        </div>

        <!-- Input Teks -->
        <div class="text-input-group">
          <label for="titleInput" class="text-input-label">Judul Sejarah</label>
          <input
            type="text"
            class="text-input"
            id="titleInput"
            placeholder="Masukkan judul sejarah" />
        </div>

        <div class="text-input-group">
          <label for="yearInput" class="text-input-label">Tahun Sejarah</label>
          <input
            type="text"
            class="text-input"
            id="yearInput"
            placeholder="Masukkan tahun sejarah" />
        </div>

        <div class="text-input-group">
          <label for="descriptionInput" class="text-input-label">Deskripsi Sejarah</label>
          <textarea
            class="text-input"
            id="descriptionInput"
            placeholder="Masukkan deskripsi sejarah"></textarea>
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
          <div class="data-item year">
            <span class="data-label">Judul Sejarah:</span>
            <span class="data-value" id="dataName">Judul Sejarah</span>
          </div>
          <div class="data-item year">
            <span class="data-label">Tahun Sejarah:</span>
            <span class="data-value" id="dataYear">Tahun Sejarah</span>
          </div>
          <div class="data-item description">
            <span class="data-label">Deskripsi Sejarah:</span>
            <span class="data-value" id="dataDescription">Deskripsi Sejarah</span>
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

  <script src="./script/utility.js"></script>
  <script src="./script/manajemen-sejarah.js"></script>
  <script src="./script/manajemen-sejarah-data.js"></script>
  <script src="./script/notification.js"></script>
    <script src="./script/hamburger-menu.js"></script>
</body>

</html>