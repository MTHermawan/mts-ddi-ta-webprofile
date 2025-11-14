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
          <button class="add button" id="btn_tambah_guru" onclick="OpenPopup('popup-tambah');">
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

    <!-- POP UP TAMBAH GURU -->

    <section class="popup">
      <form id="popup-tambah" action="./post/manajemen-guru/tambah-guru.php" method="post" enctype="multipart/form-data">
        <div class="popup-overlay">
          <h1>Tambah Guru</h1>
          <div class="popup-input-group">
            <div class="popup-input">
              <label for="nama">Nama Lengkap</label>
              <input class="satu" type="text" name="nama_guru" id="nama_guru" />
            </div>
          </div>
          <div class="popup-input-group">
            <div class="popup-input">
              <label for="mapel">Mapel</label>
              <input class="dua" type="text" name="mapel" id="mapel" />
            </div>
            <div class="popup-input">
              <label for="gelar">Gelar</label>
              <input class="dua" type="text" name="gelar" id="gelar" />
            </div>
          </div>
          <div class="popup-input-group">
            <div class="popup-input-gambar">
              <label for="foto_guru">
                <img src="../assets/icon-tambah-gambar.svg" alt="" />Tambah
                Gambar
              </label>
              <input type="file" accept="image/*" name="foto_guru" id="foto_guru" />
            </div>
            <button type="submit" name="tambah" class="popup-button-tambah">Tambah</button>
            <button type="button" class="popup-button-kembali" onclick="ClosePopup('popup-tambah')">
              Kembali
            </button>
          </div>
        </div>
      </form>

      <form id="popup-hapus" action="./post/manajemen-guru/hapus-guru.php" method="post" enctype="multipart/form-data">
        <div class="popup-overlay">
          <h1 class="h1-hapus">Yakin Ingin Hapus?</h1>
          <input type="hidden" name="id_guru" id="id_popup_hapus" />
          <div class="btn-grup-hapus">
            <button type="submit" name="hapus" class="confirm-hapus">
              <img src="../assets/popup-centang.png" alt="centang" />Iya
            </button>
            <button class="cancel-hapus">
              <img src="../assets/popup-no.png" alt="tidak" onclick="ClosePopup('popup-hapus');" />Tidak
            </button>
          </div>
        </div>
      </form>
    </section>
  </div>

  <script src="./script/dashboard-admin.js"></script>
</body>

</html>