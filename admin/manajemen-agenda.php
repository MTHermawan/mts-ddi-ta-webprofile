<?php session_start();
require_once "./includes/check-auth.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manajemen Agenda</title>
  <link rel="stylesheet" href="./style/dashboard.css" />
  <link rel="stylesheet" href="./style/manajemen-agenda.css" />
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
    <h1 class="menu-title">Agenda</h1>

    <!-- Main Content -->
    <div class="main-content">
      <div class="main-content-header">
        <div class="search-container">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input
            type="text"
            class="search-input"
            placeholder="Cari judul agenda" />
        </div>

        <div class="button-container">
          <button class="export button">
            <i class="fa-solid fa-file-export"></i> Ekspor CSV
          </button>
          <button
            class="add button"
            id="btn_tambah_guru"
            onclick="openPopup('Tambah Agenda')">
            <i class="fa-solid fa-plus"></i> Tambah Agenda
          </button>
        </div>
      </div>

      <div class="main-content-data">
        <!-- Tampilan Jika Data Kosong -->
        <div class="empty-data" id="emptyData">
          <div class="empty-data-placeholder" id="emptyDataPlaceholder">
            <img src="../assets/icon-empty-data.svg" alt="logo empty data" />
            <p>Belum ada data agenda yang ditambahkan</p>
            <p>Klik tombol "Tambah Agenda" untuk menambahkan</p>
          </div>
          <img
            class="struktur-organisasi-image"
            id="strukturOrganisasiImage"
            style="display: none"
            alt="Struktur Organisasi" />
        </div>

        <!-- Data Agenda -->
        <div class="agenda-container" id="agendaContainer">

          <!-- Card 1: Rapat Orang Tua -->
          <div class="agenda-card">
            <div class="agenda-image">
              <img
                src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                alt="Rapat Orang Tua" />
              <div class="agenda-date">25 Mar 2024</div>
            </div>
            <div class="agenda-content">
              <div class="agenda-information">
                <h3 class="agenda-title">
                  Rapat Orang Tua dan Guru Semester Genap
                </h3>
                <p class="agenda-description">
                  Rapat evaluasi perkembangan siswa dan pembahasan program
                  pembelajaran semester genap. Orang tua diharapkan hadir untuk
                  membahas kemajuan putra-putrinya.
                </p>
              </div>
              <div class="agenda-meta">
                <div class="agenda-time">
                  <i class="fas fa-clock"></i>
                  <span>08.00 - 12.00 WIB</span>
                </div>
                <div class="agenda-location">
                  <i class="fas fa-map-marker-alt"></i>
                  <span>Aula Serbaguna</span>
                </div>
              </div>
            </div>
            <div class="agenda-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 2: Ujian Nasional -->
          <div class="agenda-card">
            <div class="agenda-image">
              <img
                src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                alt="Ujian Nasional" />
              <div class="agenda-date">1-5 Apr 2024</div>
            </div>
            <div class="agenda-content">
              <div class="agenda-information">
                <h3 class="agenda-title">
                  Ujian Nasional Berbasis Komputer 2024
                </h3>
                <p class="agenda-description">
                  Pelaksanaan Ujian Nasional untuk siswa kelas XII. Peserta
                  diwajibkan hadir 30 menit sebelum jadwal ujian dan membawa
                  kartu peserta serta alat tulis.
                </p>
              </div>
              <div class="agenda-meta">
                <div class="agenda-time">
                  <i class="fas fa-clock"></i>
                  <span>07.30 - 12.00 WIB</span>
                </div>
                <div class="agenda-location">
                  <i class="fas fa-map-marker-alt"></i>
                  <span>Lab Komputer</span>
                </div>
              </div>
            </div>
            <div class="agenda-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 3: Pentas Seni -->
          <div class="agenda-card">
            <div class="agenda-image">
              <img
                src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                alt="Pentas Seni" />
              <div class="agenda-date">15 Apr 2024</div>
            </div>
            <div class="agenda-content">
              <div class="agenda-information">
                <h3 class="agenda-title">Pentas Seni dan Budaya Tahun 2024</h3>
                <p class="agenda-description">
                  Pagelaran seni dan budaya menampilkan bakat siswa dalam bidang
                  musik, tari, teater, dan seni rupa. Terbuka untuk umum dengan
                  tiket masuk gratis.
                </p>
              </div>
              <div class="agenda-meta">
                <div class="agenda-time">
                  <i class="fas fa-clock"></i>
                  <span>14.00 - 21.00 WIB</span>
                </div>
                <div class="agenda-location">
                  <i class="fas fa-map-marker-alt"></i>
                  <span>Lapangan Sekolah</span>
                </div>
              </div>
            </div>
            <div class="agenda-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 4: Study Tour -->
          <div class="agenda-card">
            <div class="agenda-image">
              <img
                src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                alt="Ujian Nasional" />
              <div class="agenda-date">20-22 Apr 2024</div>
            </div>
            <div class="agenda-content">
              <div class="agenda-information">
                <h3 class="agenda-title">Study Tour ke Yogyakarta</h3>
                <p class="agenda-description">
                  Kunjungan edukatif ke berbagai situs bersejarah dan budaya di
                  Yogyakarta. Peserta akan mengunjungi Candi Borobudur, Keraton
                  Yogyakarta, dan Malioboro.
                </p>
              </div>
              <div class="agenda-meta">
                <div class="agenda-time">
                  <i class="fas fa-clock"></i>
                  <span>3 Hari 2 Malam</span>
                </div>
                <div class="agenda-location">
                  <i class="fas fa-map-marker-alt"></i>
                  <span>Yogyakarta</span>
                </div>
              </div>
            </div>
            <div class="agenda-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 5: Seminar Karir -->
          <div class="agenda-card">
            <div class="agenda-image">
              <img
                src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                alt="Seminar Karir" />
              <div class="agenda-date">28 Apr 2024</div>
            </div>
            <div class="agenda-content">
              <div class="agenda-information">
                <h3 class="agenda-title">Study Tour ke Yogyakarta</h3>
                <p class="agenda-description">
                  Kunjungan edukatif ke berbagai situs bersejarah dan budaya di
                  Yogyakarta. Peserta akan mengunjungi Candi Borobudur, Keraton
                  Yogyakarta, dan Malioboro.
                </p>
              </div>
              <div class="agenda-meta">
                <div class="agenda-time">
                  <i class="fas fa-clock"></i>
                  <span>09.00 - 15.00 WIB</span>
                </div>
                <div class="agenda-location">
                  <i class="fas fa-map-marker-alt"></i>
                  <span>Ruang Multimedia</span>
                </div>
              </div>
            </div>
            <div class="agenda-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 6: Class Meeting -->
          <div class="agenda-card">
            <div class="agenda-image">
              <img
                src="https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                alt="Class Meeting" />
              <div class="agenda-date">5-7 Mei 2024</div>
            </div>
            <div class="agenda-content">
              <div class="agenda-information">
                <h3 class="agenda-title">Class Meeting Akhir Tahun 2024</h3>
                <p class="agenda-description">
                  Kompetisi olahraga dan seni antar kelas sebagai penutup tahun
                  ajaran. Berbagai lomba akan diadakan termasuk futsal, basket,
                  pidato, dan paduan suara.
                </p>
              </div>
              <div class="agenda-meta">
                <div class="agenda-time">
                  <i class="fas fa-clock"></i>
                  <span>08.00 - 16.00 WIB</span>
                </div>
                <div class="agenda-location">
                  <i class="fas fa-map-marker-alt"></i>
                  <span>Lapangan & Aula</span>
                </div>
              </div>
            </div>
            <div class="agenda-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

        </div>

        <!-- PAGINATION -->
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

    <!-- POP UP TAMBAH AGENDA -->
    <div class="popup-overlay-form" id="popup">
      <div class="popup-content-form">
        <div class="popup-header">
          <h2 class="popup-title" id="popupTitle">Tambah Agenda</h2>
          <button class="popup-close" onclick="closePopup()">
            <i class="fas fa-times"></i>
          </button>
        </div>

        <div class="input-container">
          <!-- Input Gambar -->
          <div class="image-input-container">
            <label class="image-input-label">Foto Agenda</label>
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
              <label for="titleInput" class="text-input-label">Judul Agenda</label>
              <input
                type="text"
                class="text-input"
                id="titleInput"
                placeholder="Masukkan judul agenda" />
            </div>

            <div class="text-input-group">
              <label for="dateInput" class="text-input-label">Tanggal Agenda</label>
              <input
                type="text"
                class="text-input"
                id="dateInput"
                placeholder="Masukkan tanggal agenda" />
            </div>

            <div class="text-input-group">
              <label for="placeInput" class="text-input-label">Tempat dilaksanakan Agenda</label>
              <input
                type="text"
                class="text-input"
                id="placeInput"
                placeholder="Masukkan tempat dilaksanakan agenda" />
            </div>

            <div class="text-input-group">
              <label for="timeInput" class="text-input-label">Waktu dilaksanakan Agenda</label>
              <input
                type="text"
                class="text-input"
                id="timeInput"
                placeholder="Masukkan waktu agenda berlangsung" />
            </div>
          </div>

        </div>

        <div class="text-input-group">
          <label for="descriptionInput" class="text-input-label">Deskripsi Agenda</label>
          <textarea
            class="text-input"
            id="descriptionInput"
            placeholder="Masukkan deskripsi agenda"></textarea>
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
            <span class="data-label">Judul Agenda:</span>
            <span class="data-value" id="dataName">judul Agenda</span>
          </div>
          <div class="data-item">
            <span class="data-label">Tanggal Agenda:</span>
            <span class="data-value" id="dataDate">Tanggal Agenda</span>
          </div>
          <div class="data-item">
            <span class="data-label">Tempat dilaksanakan Agenda:</span>
            <span class="data-value" id="dataPlace">Tempat dilaksanakan Agenda</span>
          </div>
          <div class="data-item">
            <span class="data-label">Waktu dilaksanakan Agenda:</span>
            <span class="data-value" id="dataTime">Waktu dilaksanakan Agenda</span>
          </div>
          <div class="data-item description">
            <span class="data-label">Deskripsi Agenda:</span>
            <span class="data-value" id="dataDescription">Deskripsi Agenda</span>
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
  <script src="./script/manajemen-agenda.js"></script>
  <script src="./script/manajemen-agenda-data.js"></script>
  <script src="./script/notification.js"></script>
  <script src="./script/hamburger-menu.js"></script>
</body>

</html>