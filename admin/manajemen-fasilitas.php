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

        </div>
      </div>

      <!-- POP UP TAMBAH FASILITAS -->
      <section class="popup">
        <form id="popup-tambah" action="" method="post">
          <div class="popup-overlay">
            <h1>Tambah Fasilitas</h1>
            <div class="popup-input-group">
              <div class="popup-input">
                <label for="nama">Nama Fasilitas</label>
                <input class="satu" type="text" name="nama" id="nama" />
              </div>
            </div>
            <div class="popup-input-group">
              <div class="popup-input">
                <label for="desk">Deskripsi</label>
                <input class="dua" type="text" name="desk" id="desk" />
              </div>
            </div>
            <div class="popup-input-group">
              <div class="popup-input-gambar">
                <label for="foto_guru">
                  <img src="../assets/icon-tambah-gambar.svg" alt="" />Tambah
                  Gambar
                </label>
                <input
                  type="file"
                  accept="image/*"
                  name="foto_guru"
                  id="foto_guru"
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

        <form id="popup-hapus">
          <div class="popup-overlay">
            <h1 class="h1-hapus">Yakin Ingin Hapus?</h1>
            <div class="btn-grup-hapus">
              <input type="hidden" name="id" />
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
