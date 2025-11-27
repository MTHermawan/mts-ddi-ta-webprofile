<?php session_start();
require_once "./includes/check-auth.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Halaman Utama</title>
  <link rel="stylesheet" href="./style/dashboard.css" />
  <link rel="stylesheet" href="./style/halaman-utama.css" />
  <link rel="icon" href="../assets/logo-sekolah.png" type="image/png/jpeg/jpg">
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
    <h1 class="menu-title">Halaman Utama</h1>

    <!-- Main Content -->
    <div class="main-content">

      <!-- main content stats -->
      <div class="stats-container">
        <div class="stat-card">
          <div class="stat-content">
            <div class="stat-icon">
              <img src="../assets/icon-students.svg" alt="Student Icon" />
            </div>
            <div class="stat-info">
              <div class="divider-vertical"></div>
              <div class="stat-details">
                <h2 class="stat-title">Siswa</h2>
                <p class="stat-value">220</p>
              </div>
            </div>
            <div class="stat-actions">
              <div></div>
              <button class="btn-edit"><i class="fa-regular fa-pen-to-square"></i> Edit</button>
            </div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-content">
            <div class="stat-icon">
              <img src="../assets/icon-teachers.svg" alt="teacher Icon" />
            </div>
            <div class="stat-info">
              <div class="divider-vertical"></div>
              <div class="stat-details">
                <h2 class="stat-title">Guru</h2>
                <p class="stat-value">20</p>
              </div>
            </div>
            <div class="stat-actions">
              <div></div>
              <button class="btn-edit"><i class="fa-regular fa-pen-to-square"></i> Edit</button>
            </div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-content">
            <div class="stat-icon">
              <img src="../assets/icon-graduates.svg" alt="graduate Icon" />
            </div>
            <div class="stat-info">
              <div class="divider-vertical"></div>
              <div class="stat-details">
                <h2 class="stat-title">Lulusan</h2>
                <p class="stat-value">1,110</p>
              </div>
            </div>
            <div class="stat-actions">
              <div></div>
              <button class="btn-edit"><i class="fa-regular fa-pen-to-square"></i> Edit</button>
            </div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-content">
            <div class="stat-icon">
              <img
                src="../assets/icon-extracurricular.svg"
                alt="Extracurricular Icon" />
            </div>
            <div class="stat-info">
              <div class="divider-vertical"></div>
              <div class="stat-details">
                <h2 class="stat-title">Ekstrakulikuler</h2>
                <p class="stat-value">8</p>
              </div>
            </div>
            <div class="stat-actions">
              <div></div>
              <button class="btn-edit"><i class="fa-regular fa-pen-to-square"></i> Edit</button>
            </div>
          </div>
        </div>
      </div>

      <!-- main content media social -->
      <form action="" class="social-container">
        <div class="social-row">
          <div class="social-card">
            <div class="social-form social-form-left">
              <div class="social-icon">
                <img
                  src="../assets/icon-instagram.svg"
                  alt="instagram Icon" />
              </div>
              <div class="social-info">
                <div class="social-details">
                  <label class="social-label" for="instagram">Instagram</label>
                  <input
                    id="instagram"
                    name="instagram"
                    type="text"
                    required
                    placeholder="https://instagram.com/....." />
                </div>
              </div>
            </div>
          </div>

          <div class="social-card">
            <div class="social-form social-form-right">
              <div class="social-icon">
                <img src="../assets/icon-facebook.svg" alt="facebook Icon" />
              </div>
              <div class="social-info">
                <div class="social-details">
                  <label class="social-label" for="facebook">Facebook</label>
                  <input
                    id="facebook"
                    name="facebook"
                    type="text"
                    required
                    placeholder="https://facebook.com/....." />
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="social-row">
          <div class="social-card">
            <div class="social-form social-form-left">
              <div class="social-icon">
                <img src="../assets/icon-youtube.svg" alt="youtube Icon" />
              </div>
              <div class="social-info">
                <div class="social-details">
                  <label class="social-label" for="youtube">Youtube</label>
                  <input
                    id="youtube"
                    name="youtube"
                    type="text"
                    required
                    placeholder="https://youtube.com/....." />
                </div>
              </div>
            </div>
          </div>

          <div class="social-card social-card-right">
            <div class="social-form social-form-right">
              <div class="social-icon">
                <img src="../assets/icon-email.svg" alt="email Icon" />
              </div>
              <div class="social-info">
                <div class="social-details">
                  <label class="social-label" for="email">Email</label>
                  <input
                    id="email"
                    name="email"
                    type="text"
                    required
                    placeholder="email@example.com" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="social-row social-row-full">
          <div class="social-card social-card-full">
            <div class="social-form">
              <div class="social-icon">
                <img
                  src="../assets/icon-location.svg"
                  alt="Extracurricular Icon" />
              </div>
              <div class="social-info">
                <div class="social-details">
                  <label class="social-label" for="location">Alamat</label>
                  <input
                    id="location"
                    name="location"
                    type="text"
                    required
                    placeholder="Masukkan Alamat Lengkap" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="social-row">
          <div class="social-card social-card-full">
            <div class="social-form">
              <div class="social-icon">
                <img
                  src="../assets/icon-link.svg"
                  alt="Extracurricular Icon" />
              </div>
              <div class="social-info">
                <div class="social-details">
                  <label class="social-label" for="maps">Tautan Google maps</label>
                  <input
                    id="maps"
                    name="maps"
                    type="text"
                    value="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6104228699833!2d117.09752919999998!3d-0.584908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df6813f36fcb987%3A0x2a58352fcfdf7056!2sMTs%20DDI%20Tani%20Aman!5e0!3m2!1sid!2sid!4v1762111103905!5m2!1sid!2sid"
                    required
                    placeholder="Masukkan Alamat Lengkap" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="form-actions">
          <div></div>
          <button class="btn-save">
            <i class="fa-regular fa-floppy-disk"></i> Simpan</button>
        </div>
      </form>

      <!-- main content location -->
      <form action="" class="location-container"></form>
    </div>
  </div>
  <script src="./script/dashboard-admin.js"></script>
</body>

</html>