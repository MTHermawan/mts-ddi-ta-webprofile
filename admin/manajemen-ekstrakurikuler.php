<?php session_start();
require_once "./includes/check-auth.php";
?>

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

    <!-- Title Menu -->
    <h1 class="menu-title">Ekstrakurikuler</h1>

    <!-- Main Content -->
    <div class="main-content">
      <div class="main-content-header">
        <div class="search-container">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input
            type="text"
            class="search-input"
            placeholder="Cari nama ekstrakurikuler" />
        </div>

        <div class="button-container">
          <button class="export button">
            <i class="fa-solid fa-file-export"></i> Export CSV
          </button>
          <button
            class="add button"
            id="btn_tambah_guru"
            onclick="openPopup('Tambah Ekstrakurikuler')">
            <i class="fa-solid fa-plus"></i> Tambah Ekstrakurikuler
          </button>
        </div>
      </div>

      <div class="main-content-data">
        <!-- Tampilan Jika Data Kosong -->
        <div class="empty-data" id="emptyData">
          <div class="empty-data-placeholder" id="emptyDataPlaceholder">
            <img src="../assets/icon-empty-data.svg" alt="logo empty data" />
            <p>Belum ada data ekstrakurikuler yang ditambahkan</p>
            <p>Klik tombol "Tambah Ekstrakurikuler" untuk menambahkan</p>
          </div>
          <img
            class="struktur-organisasi-image"
            id="strukturOrganisasiImage"
            style="display: none"
            alt="Struktur Organisasi" />
        </div>

        <!-- Data ekskul -->
        <div class="ekskul-container" id="ekskulContainer">

          <!-- Card 1: Pramuka -->
          <div class="ekskul-card">
            <div class="ekskul-image">
              <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Pramuka">
            </div>
            <div class="ekskul-content">
              <h3 class="ekskul-title">Pramuka</h3>
              <div class="ekskul-info">
                <div class="ekskul-info-item">
                  <i class="fas fa-user-tie"></i>
                  <span class="ekskul-info-label">Pembimbing:</span>
                  <span class="ekskul-info-value">Budi Santoso, S.Pd.</span>
                </div>
                <div class="ekskul-info-item">
                  <i class="fas fa-calendar-alt"></i>
                  <span class="ekskul-info-label">Jadwal:</span>
                  <span class="ekskul-info-value">Sabtu, 08.00 - 11.00 WIB</span>
                </div>
              </div>
            </div>
            <div class="ekskul-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 2: Futsal -->
          <div class="ekskul-card">
            <div class="ekskul-image">
              <img src="https://images.unsplash.com/photo-1575361204480-aadea25e6e68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Futsal">
            </div>
            <div class="ekskul-content">
              <h3 class="ekskul-title">Futsal</h3>
              <div class="ekskul-info">
                <div class="ekskul-info-item">
                  <i class="fas fa-user-tie"></i>
                  <span class="ekskul-info-label">Pembimbing:</span>
                  <span class="ekskul-info-value">Ahmad Rizki, M.Pd.</span>
                </div>
                <div class="ekskul-info-item">
                  <i class="fas fa-calendar-alt"></i>
                  <span class="ekskul-info-label">Jadwal:</span>
                  <span class="ekskul-info-value">Selasa & Kamis, 15.00 - 17.00 WIB</span>
                </div>
              </div>
            </div>
            <div class="ekskul-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 3: Paduan Suara -->
          <div class="ekskul-card">
            <div class="ekskul-image">
              <img src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Paduan Suara">
            </div>
            <div class="ekskul-content">
              <h3 class="ekskul-title">Paduan Suara</h3>
              <div class="ekskul-info">
                <div class="ekskul-info-item">
                  <i class="fas fa-user-tie"></i>
                  <span class="ekskul-info-label">Pembimbing:</span>
                  <span class="ekskul-info-value">Diana Sari, S.Sn.</span>
                </div>
                <div class="ekskul-info-item">
                  <i class="fas fa-calendar-alt"></i>
                  <span class="ekskul-info-label">Jadwal:</span>
                  <span class="ekskul-info-value">Rabu, 14.00 - 16.00 WIB</span>
                </div>
              </div>
            </div>
            <div class="ekskul-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 4: Robotika -->
          <div class="ekskul-card">
            <div class="ekskul-image">
              <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Teater">
            </div>
            <div class="ekskul-content">
              <h3 class="ekskul-title">Robotika</h3>
              <div class="ekskul-info">
                <div class="ekskul-info-item">
                  <i class="fas fa-user-tie"></i>
                  <span class="ekskul-info-label">Pembimbing:</span>
                  <span class="ekskul-info-value">Rizki Pratama, S.Kom.</span>
                </div>
                <div class="ekskul-info-item">
                  <i class="fas fa-calendar-alt"></i>
                  <span class="ekskul-info-label">Jadwal:</span>
                  <span class="ekskul-info-value">Jumat, 13.00 - 15.30 WIB</span>
                </div>
              </div>
            </div>
            <div class="ekskul-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 5: Teater -->
          <div class="ekskul-card">
            <div class="ekskul-image">
              <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Teater">
            </div>
            <div class="ekskul-content">
              <h3 class="ekskul-title">Teater</h3>
              <div class="ekskul-info">
                <div class="ekskul-info-item">
                  <i class="fas fa-user-tie"></i>
                  <span class="ekskul-info-label">Pembimbing:</span>
                  <span class="ekskul-info-value">Sari Dewi, S.S.</span>
                </div>
                <div class="ekskul-info-item">
                  <i class="fas fa-calendar-alt"></i>
                  <span class="ekskul-info-label">Jadwal:</span>
                  <span class="ekskul-info-value">Senin, 14.30 - 16.30 WIB</span>
                </div>
              </div>
            </div>
            <div class="ekskul-actions">
              <button class="action-btn edit">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="action-btn delete">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <!-- Card 6: KIR -->
          <div class="ekskul-card">
            <div class="ekskul-image">
              <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="KIR">
            </div>
            <div class="ekskul-content">
              <h3 class="ekskul-title">KIR (Karya Ilmiah Remaja)</h3>
              <div class="ekskul-info">
                <div class="ekskul-info-item">
                  <i class="fas fa-user-tie"></i>
                  <span class="ekskul-info-label">Pembimbing:</span>
                  <span class="ekskul-info-value">Dr. Maya Sari, M.Si.</span>
                </div>
                <div class="ekskul-info-item">
                  <i class="fas fa-calendar-alt"></i>
                  <span class="ekskul-info-label">Jadwal:</span>
                  <span class="ekskul-info-value">Kamis, 15.00 - 17.00 WIB</span>
                </div>
              </div>
            </div>
            <div class="ekskul-actions">
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

  <!-- POP UP TAMBAH EKSKUL -->
  <div class="popup-overlay-form" id="popup">
    <div class="popup-content-form">
      <div class="popup-header">
        <h2 class="popup-title" id="popupTitle">Tambah Ekstrakurikuler</h2>
        <button class="popup-close" onclick="closePopup()">
          <i class="fas fa-times"></i>
        </button>
      </div>

      <!-- Input Gambar -->
      <div class="image-input-container">
        <label class="image-input-label">Foto Ekstrakurikuler</label>
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
        <label for="titleInput" class="text-input-label">Nama Ekstrakurikuler</label>
        <input
          type="text"
          class="text-input"
          id="titleInput"
          placeholder="Masukkan nama ekstrakurikuler" />
      </div>

      <div class="text-input-group">
        <label for="pembimbingInput" class="text-input-label">Nama Pembimbing</label>
        <input
          type="text"
          class="text-input"
          id="pembimbingInput"
          placeholder="Masukkan nama pembimbing" />
      </div>

      <div class="text-input-group">
        <label for="jadwalInput" class="text-input-label">Jadwal</label>
        <input
          type="text"
          class="text-input"
          id="jadwalInput"
          placeholder="Masukkan jadwal kegiatan" />
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
          <span class="data-label">Nama Ekstrakurikuler:</span>
          <span class="data-value" id="dataName">Futsal</span>
        </div>
        <div class="data-item">
          <span class="data-label">Nama Pembimbing:</span>
          <span class="data-value" id="dataPosition">Guru</span>
        </div>
        <div class="data-item">
          <span class="data-label">Jadwal:</span>
          <span class="data-value" id="dataSubject">Selasa & Kamis, 15.00 - 17.00 WIB</span>
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
  <script src="./script/utility.js"></script>
  <script src="./script/manajemen-ekstrakurikuler.js"></script>
  <!-- <script src="./script/manajemen-ekstrakurikuler-data.js"></script> -->
</body>

</html>