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
      type="image/png/jpeg/jpg"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
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
              placeholder="Cari nama guru"
            />
          </div>

          <div class="button-container">
            <button class="export button">
              <i class="fa-solid fa-file-export"></i> Export CSV
            </button>
            <button
              class="add button"
              id="btn_tambah_guru"
              onclick="OpenPopup('popup-tambah');"
            >
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

        </div>
      </div>

      <!-- POP UP TAMBAH GALERI -->

      <section class="popup">
        <form id="popup-tambah" action="./post/manajemen-galeri/tambah-galeri.php" method="post" enctype="multipart/form-data">
          <div class="popup-overlay">
            <h1>Tambah Galeri</h1>
            <div class="popup-input-group">
              <div class="popup-input">
                <label for="judul">Judul Galeri</label>
                <input class="satu" type="text" name="judul_galeri" id="judul" />
              </div>
            </div>
            <div class="popup-input-group">
              <div class="popup-input">
                <label for="desk">Deskripsi</label>
                <input class="dua" type="text" name="deskripsi_galeri" id="desk" />
              </div>
            </div>
            <div class="popup-input-group">
              <div class="popup-input-gambar">
                <label for="foto_galeri">
                  <img src="../assets/icon-tambah-gambar.svg" alt="" />Tambah
                  Gambar
                </label>
                <input
                  type="file"
                  accept="image/*"
                  name="foto_galeri"
                  id="foto_galeri"
                />
              </div>
              <button type="submit" class="popup-button-tambah">Tambah</button>
              <button
                type="button"
                class="popup-button-kembali"
                onclick="ClosePopup('popup-tambah')"
              >
                Kembali
              </button>
            </div>
          </div>
        </form>

        <form id="popup-hapus" action="./post/manajemen-galeri/hapus-galeri.php" method="post" enctype="multipart/form-data">
          <div class="popup-overlay">
            <h1 class="h1-hapus">Yakin Ingin Hapus?</h1>
            <input type="hidden" name="id_foto_galeri" id="id_popup_hapus" />
            <div class="btn-grup-hapus">
              <button type="submit" class="confirm-hapus">
                <img src="../assets/popup-centang.png" alt="centang" />Iya
              </button>
              <button class="cancel-hapus">
                <img
                  src="../assets/popup-no.png"
                  alt="tidak"
                  onclick="ClosePopup('popup-hapus');"
                />Tidak
              </button>
            </div>
          </div>
        </form>
      </section>
    </div>

    <script src="./script/dashboard-admin.js"></script>
  </body>
</html>
