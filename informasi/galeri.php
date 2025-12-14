<?php
if (!defined('IN_INDEX')) {
  http_response_code(403);
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Galeri Sekolah</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
  <link rel="stylesheet" href="<?= BASE_URL ?>/style/hero-sect.css" />
  <link rel="stylesheet" href="<?= BASE_URL ?>/style/galeri.css" />
  <link rel="stylesheet" href="<?= BASE_URL ?>/style/header.css" />
  <link rel="stylesheet" href="<?= BASE_URL ?>/style/dropdown.css" />
  <link rel="stylesheet" href="<?= BASE_URL ?>/style/footer.css" />
    <link rel="icon" href="<?= BASE_URL ?>/assets/<?= SETTINGS['logo_sekolah'] ?>" type="image/png/jpeg/jpg" />
  <script src="<?= BASE_URL ?>/script/utility.js"></script>
</head>

<body>
  <!-- HEADER -->
  <?php include_once dirname(__DIR__) . "/includes/header.php" ?>

  <section id="hero">
    <img src="<?= BASE_URL ?>/assets/<?= SETTINGS['gambar_hero'] ?>" alt="Latar belakang pendidikan berkarakter" class="hero-bg" />
    <div class="hero-overlay"></div>
    <div class="hero-content">
      <h1>Galeri</h1>
    </div>
  </section>

  <!-- GALERI SECTION -->
  <section class="galeri-section">
    <h1 class="judul-utama">Galeri MTs DDI Tani Aman</h1>
    <p class="sub-judul-agenda">
      Kumpulan foto-foto terbaru seputar kegiatan sekolah.
    </p>

    <!-- Filter -->
    <div class="filter-agenda">
      <button class="filter-btn aktif">Semua Foto</button>
    </div>


    <div class="gallery-grid">

      <div class="gallery-card" data-title="Upacara Bendera" data-desc="Kegiatan rutin setiap hari Senin.">
        <img src="../assets/gambarabout.jpeg" alt="Upacara">
      </div>

      <div class="gallery-card" data-title="Lomba Sains" data-desc="Peserta mengikuti lomba tingkat Kabupaten.">
        <img src="../assets/gambarabout.jpeg" alt="Lomba">
      </div>

      <div class="gallery-card" data-title="Ekstrakurikuler Pramuka" data-desc="Kegiatan latihan pramuka mingguan.">
        <img src="../assets/gambarabout.jpeg" alt="Pramuka">
      </div>

      <div class="gallery-card" data-title="Belajar di Kelas" data-desc="Pembelajaran aktif dan interaktif.">
        <img src="../assets/gambarabout.jpeg" alt="Kelas">
      </div>

    </div>
  </section>

  <!-- POPUP SLIDER GALLERY -->
  <div class="popup" id="popup">

    <div class="popup-content">

      <!-- Tombol Close -->
      <span class="popup-close" id="closeBtn">&times;</span>

      <!-- Tombol Kiri -->
      <span class="popup-arrow inside left" id="prevBtn">&#10094;</span>

      <!-- Gambar -->
      <img id="popupImg" src="" alt="Gambar">

      <!-- Tombol Kanan -->
      <span class="popup-arrow inside right" id="nextBtn">&#10095;</span>

      <h2 class="popup-title" id="popupTitle"></h2>
      <p class="popup-desc" id="popupDesc"></p>
    </div>

  </div>

  <!-- FOOTER -->
  <?php include_once dirname(__DIR__) . "/includes/footer.php" ?>

  <script src="<?= BASE_URL ?>/script/fade-in.js"></script>
  <script src="<?= BASE_URL ?>/script/dropdown.js"></script>
  <script src="<?= BASE_URL ?>/script/hamburger-menu.js"></script>
  <script src="<?= BASE_URL ?>/script/galeri.js"></script>
</body>

</html>