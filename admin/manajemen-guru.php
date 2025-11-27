<?php include_once "../data/koneksi.php";
include_once "../data/data_guru.php";
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
            <i class="fa-solid fa-file-export"></i> Export CSV
          </button>
          <button class="add button" id="btn_tambah_guru" onclick="openPopup()">
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
                <th>Mata Pelajaran</th>
                <th>Gelar</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="teacher-info">
                    <div class="teacher-avatar">LC</div>
                    <div class="teacher-details">
                      <h3>Lindsey Curtis</h3>
                    </div>
                  </div>
                </td>
                <td><span class="subject">Teknologi Informasi</span></td>
                <td><span class="degree">S.Kom</span></td>
                <td>
                  <div class="action-buttons">
                    <button class="btn btn-edit">Edit</button>
                    <button class="btn btn-delete">Hapus</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="teacher-info">
                    <div class="teacher-avatar">KG</div>
                    <div class="teacher-details">
                      <h3>Kaiya George</h3>
                    </div>
                  </div>
                </td>
                <td><span class="subject">Manajemen Proyek</span></td>
                <td><span class="degree">M.M</span></td>
                <td>
                  <div class="action-buttons">
                    <button class="btn btn-edit">Edit</button>
                    <button class="btn btn-delete">Hapus</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="teacher-info">
                    <div class="teacher-avatar">ZG</div>
                    <div class="teacher-details">
                      <h3>Zain Geldt</h3>
                    </div>
                  </div>
                </td>
                <td><span class="subject">Bahasa Indonesia</span></td>
                <td><span class="degree">S.S</span></td>
                <td>
                  <div class="action-buttons">
                    <button class="btn btn-edit">Edit</button>
                    <button class="btn btn-delete">Hapus</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="teacher-info">
                    <div class="teacher-avatar">AS</div>
                    <div class="teacher-details">
                      <h3>Abram Schleifer</h3>
                    </div>
                  </div>
                </td>
                <td><span class="subject">Pemasaran Digital</span></td>
                <td><span class="degree">M.M</span></td>
                <td>
                  <div class="action-buttons">
                    <button class="btn btn-edit">Edit</button>
                    <button class="btn btn-delete">Hapus</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="teacher-info">
                    <div class="teacher-avatar">CG</div>
                    <div class="teacher-details">
                      <h3>Carla George</h3>
                    </div>
                  </div>
                </td>
                <td><span class="subject">Pemrograman Web</span></td>
                <td><span class="degree">S.Kom</span></td>
                <td>
                  <div class="action-buttons">
                    <button class="btn btn-edit">Edit</button>
                    <button class="btn btn-delete">Hapus</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
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

        <div class="image-input-container">
          <label class="image-input-label">Foto Guru</label>
          <div class="image-upload-area" id="imageUploadArea">
            <input
              type="file"
              class="image-input"
              id="imageInput"
              accept="image/*" />

            <div class="image-placeholder" id="imagePlaceholder">
              <div class="image-placeholder-icon">
                <i class="fas fa-cloud-upload-alt"></i>
              </div>
              <div class="image-placeholder-text">
                <p><strong>Klik untuk upload</strong> atau drag & drop</p>
                <p>PNG, JPG, JPEG</p>
              </div>
            </div>

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

        <div class="text-input-group">
          <label for="titleInput" class="text-input-label">Nama</label>
          <input
            type="text"
            class="text-input"
            id="titleInput"
            placeholder="Masukkan nama guru" />
        </div>

        <div class="text-input-group">
          <label for="titleInput" class="text-input-label">Mata Pelajaran</label>
          <input
            type="text"
            class="text-input"
            id="titleInput"
            placeholder="Masukkan mata pelajaran yang diampu" />
        </div>

        <div class="text-input-group">
          <label for="titleInput" class="text-input-label">Gelar</label>
          <input
            type="text"
            class="text-input"
            id="titleInput"
            placeholder="Masukkan gelar guru" />
        </div>

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

  <script src="../admin/script/dashboard-admin.js"></script>
</body>

</html>