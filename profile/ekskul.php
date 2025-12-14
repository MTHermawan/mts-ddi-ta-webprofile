<?php
if (!defined('IN_INDEX')) {
    http_response_code(403);
    exit;
}

$dataEkskul = GetEkskul();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ekstrakurikuler Sekolah</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/hero-sect.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/ekskul.css" />
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
      <img
        src="<?= BASE_URL ?>/assets/<?= SETTINGS['gambar_hero'] ?>"
        alt="Latar belakang pendidikan berkarakter"
        class="hero-bg"
      />
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <h1>Ekstrakurikuler</h1>
      </div>
    </section>

    <!-- CONTENT ekstrakurikuler -->
    <section class="ekstrakurikuler-section fade-in">
      <h1 class="judul-utama">Ekstrakurikuler MTs DDI Tani Aman</h1>
      <p class="sub-judul-ekstrakurikuler">
        Kumpulan ekstrakurikuler penunjang proses belajar di Mts Ddi Tani Aman.
      </p>

      <!-- Filter -->
      <div class="filter-ekstrakurikuler">
        <button class="filter-btn aktif">Semua Ekstrakurikuler</button>
        <!-- <button class="filter-btn">Terbaru</button> -->
      </div>

      <!-- List ekstrakurikuler -->
      <div class="ekstrakurikuler-list fade-in">
        <?php foreach ($dataEkskul as $ekskul): ?>
          <div class="ekstrakurikuler-wrapp fade-in">
            <div class="ekstrakurikuler-card fade-in">
              <div class="ekstrakurikuler-teks">
                <h2 class="ekstrakurikuler-judul"><a href="#"><?= $ekskul['nama_ekskul'] ?></a></h2>
  
                <div class="ekstrakurikuler-gambar">
                  <img 
                  src="<?= BASE_URL ?>/assets/<?= $ekskul['foto'][0]['url_foto'] ?>" 
                  onerror="this.src = imagePlaceholderUrl('<?= $ekskul['nama_ekskul'] ?>')"/>
                </div>
                <p class="ekstrakurikuler-deskripsi">
                  <i class="fa-solid fa-person"></i> Pembimbing: <?= $ekskul['nama_pembimbing'] ?>
                </p>
                <p class="ekstrakurikuler-deskripsi">
                  <i class="fa-solid fa-calendar"></i> Jadwal: <?= $ekskul['jadwal'] ?>
                </p>
              </div>
            </div>
          </div>  
        <?php endforeach; ?>
    </section>

    <!-- FOOTER -->
    <?php include_once dirname(__DIR__) . "/includes/footer.php" ?>

    <script src="<?= BASE_URL ?>/script/fade-in.js"></script>
    <script src="<?= BASE_URL ?>/script/dropdown.js"></script>
    <script src="<?= BASE_URL ?>/script/hamburger-menu.js"></script>
  </body>
</html>
