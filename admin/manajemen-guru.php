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
  <title>Manajemen Guru</title>
  <link rel="stylesheet" href="./style/dashboard.css" />
  <link rel="stylesheet" href="./style/manajemen-guru.css" />
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

    <!-- Title Menu -->
    <h1 class="menu-title">Staff Pengajar</h1>

    <!-- Main Content -->
    <div class="main-content">
      <div class="main-content-header">
        <div class="search-container">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" class="search-input" placeholder="Cari nama guru" />
        </div>

        <div class="button-container">
          <button class="export button">
            <i class="fa-solid fa-file-export"></i> Ekspor CSV
          </button>
          <button class="add button" id="btn_tambah_guru" onclick="openPopup('Tambah Guru')">
            <i class="fa-solid fa-plus"></i> Tambah Guru
          </button>
        </div>
      </div>

      <div class="main-content-data">
        <!-- Tampilan Jika Data Kosong -->
        <div class="empty-data" id="emptyData">
          <div class="empty-data-placeholder" id="emptyDataPlaceholder">
            <img src="../assets/icon-empty-data.svg" alt="logo empty data" />
            <p>Belum ada data guru yang ditambahkan</p>
            <p>Klik tombol "Tambah Guru" untuk menambahkan</p>
          </div>
        </div>

        <!-- Data Guru -->
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Mata Pelajaran</th>
                <th>Pendidikan</th>
                <th>Aksi</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="teacher-info">
                    <div class="teacher-avatar">
                      <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80" alt="Kaiya George">
                      <div class="teacher-avatar-initials">LC</div>
                    </div>
                    <div class="teacher-details">
                      <h3>Lindsey Curtis</h3>
                    </div>
                  </div>
                </td>
                <td><span class="position">Guru</span></td>
                <td><span class="subject">Teknologi Informasi</span></td>
                <td><span class="degree">S.Kom</span></td>
                <td>
                  <div class="action-buttons">
                    <button class="btn btn-edit"><i class="fa-regular fa-pen-to-square"></i> Edit</button>
                    <button class="btn btn-delete"><i class="fas fa-trash"></i> Hapus</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="teacher-info">
                    <div class="teacher-avatar">
                      <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80" alt="Kaiya George">
                      <div class="teacher-avatar-initials">KG</div>
                    </div>
                    <div class="teacher-details">
                      <h3>Kaiya George</h3>
                    </div>
                  </div>
                </td>
                <td><span class="position">Guru</span></td>
                <td><span class="subject">Manajemen Proyek</span></td>
                <td><span class="degree">M.M</span></td>
                <td>
                  <div class="action-buttons">
                    <button class="btn btn-edit"><i class="fa-regular fa-pen-to-square"></i> Edit</button>
                    <button class="btn btn-delete"><i class="fas fa-trash"></i> Hapus</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="teacher-info">
                    <div class="teacher-avatar">
                      <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80" alt="Kaiya George">
                      <div class="teacher-avatar-initials">ZG</div>
                    </div>
                    <div class="teacher-details">
                      <h3>Zain Geldt</h3>
                    </div>
                  </div>
                </td>
                <td><span class="position">Guru</span></td>
                <td><span class="subject">Bahasa Indonesia</span></td>
                <td><span class="degree">S.S</span></td>
                <td>
                  <div class="action-buttons">
                    <button class="btn btn-edit"><i class="fa-regular fa-pen-to-square"></i> Edit</button>
                    <button class="btn btn-delete"><i class="fas fa-trash"></i> Hapus</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="teacher-info">
                    <div class="teacher-avatar">
                      <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80" alt="Abram Schleifer">
                      <div class="teacher-avatar-initials">AS</div>
                    </div>
                    <div class="teacher-details">
                      <h3>Abram Schleifer</h3>
                    </div>
                  </div>
                </td>
                <td><span class="position">Guru</span></td>
                <td><span class="subject">Pemasaran Digital</span></td>
                <td><span class="degree">M.M</span></td>
                <td>
                  <div class="action-buttons">
                    <button class="btn btn-edit"><i class="fa-regular fa-pen-to-square"></i> Edit</button>
                    <button class="btn btn-delete"><i class="fas fa-trash"></i> Hapus</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="teacher-info">
                    <div class="teacher-avatar">
                      <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80" alt="Carla George">
                      <div class="teacher-avatar-initials">CG</div>
                    </div>
                    <div class="teacher-details">
                      <h3>Carla George</h3>
                    </div>
                  </div>
                </td>
                <td><span class="position">Guru</span></td>
                <td><span class="subject">Pemrograman Web</span></td>
                <td><span class="degree">S.Kom</span></td>
                <td>
                  <div class="action-buttons">
                    <button class="btn btn-edit"><i class="fa-regular fa-pen-to-square"></i> Edit</button>
                    <button class="btn btn-delete"><i class="fas fa-trash"></i> Hapus</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>

          <!-- Pagination -->
          <div class="pagination-container" id="paginationContainer">
            <div class="pagination-info" id="paginationInfo">
              Menampilkan 1-5 dari 5 data
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
    </div>


  </div>

  </div>

  <!-- POP UP TAMBAH/EDIT -->
  <div class="popup-overlay-form" id="popup">
    <div class="popup-content-form">
      <div class="popup-header">
        <h2 class="popup-title" id="popupTitle">Tambah Guru</h2>
        <button class="popup-close" onclick="closePopup()">
          <i class="fas fa-times"></i>
        </button>
      </div>

      <div class="input-container">

        <!-- Input Gambar -->
        <div class="image-input-container">
          <label class="image-input-label">Foto Guru</label>
          <div class="image-upload-area" id="imageUploadArea">
            <input
              type="file"
              class="image-input"
              id="imageInput"
              accept="image/*"
              name="foto_staff" />

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
        <div class="text-input-container">
          <div class="text-input-group">
            <label for="titleInput" class="text-input-label">Nama</label>
            <input
              type="text"
              class="text-input"
              id="inputName"
              placeholder="Masukkan nama guru"
              name="nama_staff" />
          </div>

          <div class="text-input-group">
            <label for="titleInput" class="text-input-label">Jabatan</label>
            <input
              type="text"
              class="text-input"
              id="inputPosition"
              name="jabatan"
              placeholder="Masukkan mata pelajaran yang diampu" />
          </div>

          <div class="text-input-group">
            <label for="titleInput" class="text-input-label">Mata Pelajaran</label>
            <input
              type="text"
              class="text-input"
              id="inputSubject"
              name="mapel"
              placeholder="Masukkan mata pelajaran yang diampu" />
          </div>

          <div class="text-input-group">
            <label for="titleInput" class="text-input-label">Pendidikan</label>
            <input
              type="text"
              class="text-input"
              id="inputDegree"
              name="pendidikan"
              placeholder="Masukkan gelar guru" />
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
          <span class="data-label">Nama:</span>
          <span class="data-value" id="dataName">Lindsey Curtis</span>
        </div>
        <div class="data-item">
          <span class="data-label">Jabatan:</span>
          <span class="data-value" id="dataPosition">Guru</span>
        </div>
        <div class="data-item">
          <span class="data-label">Mata Pelajaran:</span>
          <span class="data-value" id="dataSubject">Teknologi Informasi</span>
        </div>
        <div class="data-item">
          <span class="data-label">Pendidikan:</span>
          <span class="data-value" id="dataDegree">S.Kom</span>
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
  <script src="./script/manajemen-guru.js"></script>
  <script src="./script/manajemen-guru-data.js"></script>
  <script src="./script/notification.js"></script>
</body>

</html>