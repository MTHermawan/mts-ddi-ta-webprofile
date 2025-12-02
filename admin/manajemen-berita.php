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
            <i class="fa-solid fa-file-export"></i> Export CSV
          </button>
          <button
            class="add button"
            id="btn_tambah_guru"
            onclick="openPopup('Tambah Berita')">
            <i class="fa-solid fa-plus"></i> Tambah Berita
          </button>
        </div>
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
          <!-- Card 1: Penerimaan Siswa Baru -->
          <div class="berita-card">
            <div class="berita-image">
              <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Olimpiade Sains">
              <div class="berita-date">15 Mar 2024</div>
            </div>
            <div class="berita-content">
              <h3 class="berita-title">Penerimaan Siswa Baru Tahun Ajaran 2024/2025 Telah Dibuka</h3>
              <p class="berita-description">Pendaftaran siswa baru untuk tahun ajaran 2024/2025 telah dibuka. Kuota terbatas hanya untuk 200 siswa. Segera daftarkan putra-putri Anda untuk mendapatkan pendidikan terbaik.</p>
              <div class="berita-meta">
                <div class="berita-author">
                  <i class="fas fa-user"></i>
                  <span>Admin Sekolah</span>
                </div>
              </div>
            </div>
            <div class="berita-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 2: Olimpiade Sains -->
          <div class="berita-card">
            <div class="berita-image">
              <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Olimpiade Sains">
              <div class="berita-date">10 Mar 2024</div>
            </div>
            <div class="berita-content">
              <h3 class="berita-title">Siswa SMA Kita Juara Olimpiade Sains Nasional 2024</h3>
              <p class="berita-description">Bangga! Tim olimpiade sains SMA Kita berhasil meraih medali emas dalam Olimpiade Sains Nasional 2024. Prestasi ini membuktikan kualitas pendidikan sains di sekolah kita.</p>
              <div class="berita-meta">
                <div class="berita-author">
                  <i class="fas fa-user"></i>
                  <span>Guru Sains</span>
                </div>
              </div>
            </div>
            <div class="berita-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 3: Renovasi Perpustakaan -->
          <div class="berita-card">
            <div class="berita-image">
              <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Renovasi Perpustakaan">
              <div class="berita-date">5 Mar 2024</div>
            </div>
            <div class="berita-content">
              <h3 class="berita-title">Perpustakaan Sekolah Selesai Direnovasi, Kini Lebih Nyaman</h3>
              <p class="berita-description">Setelah proses renovasi selama 2 bulan, perpustakaan sekolah kini telah dibuka kembali dengan fasilitas yang lebih lengkap dan suasana yang lebih nyaman untuk membaca.</p>
              <div class="berita-meta">
                <div class="berita-author">
                  <i class="fas fa-user"></i>
                  <span>Kepala Perpustakaan</span>
                </div>
              </div>
            </div>
            <div class="berita-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 4: Kegiatan Bakti Sosial -->
          <div class="berita-card">
            <div class="berita-image">
              <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Bakti Sosial">
              <div class="berita-date">28 Feb 2024</div>
            </div>
            <div class="berita-content">
              <h3 class="berita-title">Kegiatan Bakti Sosial Siswa di Panti Asuhan Kasih Bunda</h3>
              <p class="berita-description">Siswa-siswi SMA Kita mengadakan kegiatan bakti sosial di Panti Asuhan Kasih Bunda. Kegiatan ini bertujuan untuk menumbuhkan rasa empati dan kepedulian sosial.</p>
              <div class="berita-meta">
                <div class="berita-author">
                  <i class="fas fa-user"></i>
                  <span>OSIS Sekolah</span>
                </div>
              </div>
            </div>
            <div class="berita-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 5: Workshop Teknologi -->
          <div class="berita-card">
            <div class="berita-image">
              <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Olimpiade Sains">
              <div class="berita-date">22 Feb 2024</div>
            </div>
            <div class="berita-content">
              <h3 class="berita-title">Workshop Teknologi: Mempersiapkan Siswa untuk Era Digital</h3>
              <p class="berita-description">Sekolah mengadakan workshop teknologi selama 3 hari untuk mempersiapkan siswa menghadapi tantangan era digital. Workshop mencakup pemrograman, desain grafis, dan digital marketing.</p>
              <div class="berita-meta">
                <div class="berita-author">
                  <i class="fas fa-user"></i>
                  <span>Tim IT Sekolah</span>
                </div>
              </div>
            </div>
            <div class="berita-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 6: Prestasi Olahraga -->
          <div class="berita-card">
            <div class="berita-image">
              <img src="https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Prestasi Olahraga">
              <div class="berita-date">18 Feb 2024</div>
            </div>
            <div class="berita-content">
              <h3 class="berita-title">Tim Futsal SMA Kita Juara Turnamen Antar Sekolah Se-Kota</h3>
              <p class="berita-description">Tim futsal SMA Kita berhasil menjadi juara dalam turnamen futsal antar sekolah se-kota. Kemenangan ini diraih setelah pertandingan final yang sangat menegangkan.</p>
              <div class="berita-meta">
                <div class="berita-author">
                  <i class="fas fa-user"></i>
                  <span>Pelatih Olahraga</span>
                </div>
              </div>
            </div>
            <div class="berita-actions">
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
              placeholder="Masukkan judul berita" />
          </div>

          <div class="text-input-group">
            <label for="descriptionInput" class="text-input-label">Deskripsi Berita</label>
            <textarea
              class="text-input"
              id="descriptionInput"
              placeholder="Masukkan deskripsi berita"></textarea>
          </div>
        </div>

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

  <script src="./script/dashboard-admin.js"></script>
  <script src="./script/manajemen-berita.js"></script>
</body>

</html>