<?php session_start();
require_once "./includes/check-auth.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manajemen Visi Misi</title>
  <link rel="stylesheet" href="./style/dashboard.css" />
  <link rel="stylesheet" href="./style/manajemen-visi-misi.css" />
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
    <h1 class="menu-title">Visi Misi</h1>

    <!-- Main Content -->
    <div class="main-content">
      <!-- main content row 21-->
      <div class="container">
        <!-- main content row 24 -->
        <form action="" class="vision-form">

          <div class="vision-mision-container">
            <div class="form-card">
              <div class="form-card-content">
                <div class="form-card-header">
                  <div class="form-icon">
                    <img
                      src="../assets/icon-visi.svg"
                      alt="visi-misi Icon" />
                  </div>
                  <label class="form-label" for="visi">Visi Sekolah</label>
                </div>
                <div class="form-input-container">
                  <div class="form-input-wrapper">
                    <textarea
                      class="form-textarea"
                      name="visi"
                      id="visi"
                      placeholder="Visi MTs Tani Aman"></textarea>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-card">
              <div class="form-card-content">
                <div class="form-card-header">
                  <div class="form-icon">
                    <img
                      src="../assets/icon-visi.svg"
                      alt="visi-misi Icon" />
                  </div>
                  <label class="form-label" for="misi">Misi Sekolah</label>
                </div>
                <div class="form-input-container">
                  <div class="form-input-wrapper">
                    <textarea
                      class="form-textarea"
                      name="misi"
                      id="misi"
                      placeholder="Misi MTs Tani Aman"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="form-card">
            <div class="form-card-content">
              <div class="form-card-header">
                <div class="form-icon">
                  <img
                    src="../assets/icon-visi.svg"
                    alt="visi-misi Icon" />
                </div>
                <label class="form-label" for="tujuan">Tujuan Sekolah</label>
              </div>
              <div class="form-input-container">
                <div class="form-input-wrapper">
                  <textarea
                    class="form-textarea"
                    name="tujuan"
                    id="tujuan"
                    placeholder="Tujuan MTs Tani Aman"></textarea>
                </div>
              </div>
            </div>
          </div>

          <div class="form-actions">
            <div></div>
            <button class="btn-save">
              <i class="fa-regular fa-floppy-disk"></i> Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="./script/dashboard-admin.js"></script>
</body>

</html>