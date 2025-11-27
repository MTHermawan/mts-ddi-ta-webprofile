<?php session_start();
require_once "./includes/check-auth.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manajemen Struktur Organisasi</title>
  <link rel="stylesheet" href="./style/dashboard.css" />
  <link rel="stylesheet" href="./style/manajemen-struktur-organisasi.css" />
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

    <!-- Title Menu -->
    <h1 class="menu-title">Struktur Organisasi Sekolah</h1>

    <!-- Main Content -->
    <div class="main-content">

      <div class="container">
        <form action="" class="form">
          <div class="container-card">
            <div class="card-detail">
              <div class="card-header">
                <div class="card-logo">
                  <img
                    src="../assets/icon-structure-organization.svg"
                    alt="struktur organisasi Icon" />
                </div>
                <label class="card-label" for="visi">Struktur Organisasi</label>
              </div>
              <div class="card-img">
                <div class="card-img-detail">
                  <div class="struktur-organisasi-container" id="strukturOrganisasiContainer">
                    <div class="struktur-organisasi-placeholder" id="strukturOrganisasiPlaceholder">
                      <i class="fa-solid fa-image"></i>
                      <p>Belum ada gambar struktur organisasi yang diunggah</p>
                      <p><strong>Klik tombol "Upload Gambar"</strong> untuk menambahkan</p>
                    </div>
                    <img class="struktur-organisasi-image" id="strukturOrganisasiImage" style="display: none;" alt="Struktur Organisasi">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="button-container">
            <div class="button-group">
              <button type="button" class="button-hapus" id="hapusButton">
                <i class="fa-solid fa-trash"></i> Hapus Gambar
              </button>
            </div>
            <div class="button-group">
              <button type="button" class="button-upload" id="uploadButton">
                <i class="fa-solid fa-upload"></i> Upload Gambar
              </button>
              <button type="submit" class="button-simpan">
                <i class="fa-regular fa-floppy-disk"></i> Simpan
              </button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>

  <script src="./script/dashboard-admin.js"></script>
  <script src="./script/manajemen-struktur-organisasi.js"></script>
</body>

</html>