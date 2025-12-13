<?php
if (!defined('IN_INDEX')) {
    http_response_code(403);
    exit;
}

$dataFasilitas = GetFasilitas();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fasilitas Sekolah</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/hero-sect.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/fasilitas.css" />
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
        src="<?= BASE_URL ?>/assets/gambar-landing.jpeg"
        alt="Latar belakang pendidikan berkarakter"
        class="hero-bg"
      />
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <h1>Fasilitas</h1>
      </div>
    </section>

    <!-- CONTENT fasilitas -->
    <section class="fasilitas-section fade-in">
      <h1 class="judul-utama">Fasilitas MTs DDI Tani Aman</h1>
      <p class="sub-judul-fasilitas">
        Kumpulan fasilitas penunjang proses belajar di Mts Ddi Tani Aman.
      </p>

      <!-- Filter -->
      <div class="filter-fasilitas">
        <button class="filter-btn aktif">Semua Fasilitas</button>
        <!-- <button class="filter-btn">Terbaru</button> -->
      </div>

      <!-- List fasilitas -->
      <div class="fasilitas-list fade-in">
        <div class="fasilitas-wrapp fade-in">
          <?php foreach ($dataFasilitas as $fasilitas): ?>
            <div class="fasilitas-card fade-in">
              <div class="fasilitas-teks">
                <h2 class="fasilitas-judul"><a href="#"><?= $fasilitas['nama_fasilitas'] ?></a></h2>
  
                <p class="fasilitas-deskripsi"><?= $fasilitas['deskripsi_fasilitas'] ?></p>
              </div>
              <div class="fasilitas-gambar">
                <img 
                  src="<?= BASE_URL ?>/assets/<?= $fasilitas['foto'][0]['url_foto'] ?>" 
                  onerror="this.src = imagePlaceholderUrl('<?= $fasilitas['nama_fasilitas'] ?>')"/>
              </div>
            </div>  
          <?php endforeach; ?>

          <!-- CARD 2 -->
          <div class="fasilitas-card fade-in">
            <div class="fasilitas-teks">
              <h2 class="fasilitas-judul"><a href="#">Masjid</a></h2>

              <p class="fasilitas-deskripsi">Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="fasilitas-gambar">
              <img src="<?= BASE_URL ?>/assets/contoh3.jpg" alt="gambar" />
            </div>
          </div>

          <!-- CARD 3 -->
          <div class="fasilitas-card fade-in">
            <div class="fasilitas-teks">
              <h2 class="fasilitas-judul"><a href="#">Masjid</a></h2>

              <p class="fasilitas-deskripsi">Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="fasilitas-gambar">
              <img src="<?= BASE_URL ?>/assets/contoh3.jpg" alt="gambar" />
            </div>
          </div>

          <!-- CARD 4 -->
          <div class="fasilitas-card fade-in">
            <div class="fasilitas-teks">
              <h2 class="fasilitas-judul"><a href="#">Masjid</a></h2>

              <p class="fasilitas-deskripsi">Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="fasilitas-gambar">
              <img src="<?= BASE_URL ?>/assets/contoh3.jpg" alt="gambar" />
            </div>
          </div>

          <!-- CARD 5 -->
          <div class="fasilitas-card fade-in">
            <div class="fasilitas-teks">
              <h2 class="fasilitas-judul"><a href="#">Masjid</a></h2>

              <p class="fasilitas-deskripsi">Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="fasilitas-gambar">
              <img src="<?= BASE_URL ?>/assets/contoh3.jpg" alt="gambar" />
            </div>
          </div>

          <div class="fasilitas-card fade-in">
            <div class="fasilitas-teks">
              <h2 class="fasilitas-judul"><a href="#">Masjid</a></h2>

              <p class="fasilitas-deskripsi">Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="fasilitas-gambar">
              <img src="<?= BASE_URL ?>/assets/contoh3.jpg" alt="gambar" />
            </div>
          </div>
          <div class="fasilitas-card fade-in">
            <div class="fasilitas-teks">
              <h2 class="fasilitas-judul"><a href="#">Masjid</a></h2>

              <p class="fasilitas-deskripsi">Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="fasilitas-gambar">
              <img src="<?= BASE_URL ?>/assets/contoh3.jpg" alt="gambar" />
            </div>
          </div>
          <div class="fasilitas-card fade-in">
            <div class="fasilitas-teks">
              <h2 class="fasilitas-judul"><a href="#">Masjid</a></h2>

              <p class="fasilitas-deskripsi">Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="fasilitas-gambar">
              <img src="<?= BASE_URL ?>/assets/contoh3.jpg" alt="gambar" />
            </div>
          </div>
          <div class="fasilitas-card fade-in">
            <div class="fasilitas-teks">
              <h2 class="fasilitas-judul"><a href="#">Masjid</a></h2>

              <p class="fasilitas-deskripsi">Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="fasilitas-gambar">
              <img src="<?= BASE_URL ?>/assets/contoh3.jpg" alt="gambar" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <?php include_once dirname(__DIR__) . "/includes/footer.php" ?>

    <script src="<?= BASE_URL ?>/script/fade-in.js"></script>
    <script src="<?= BASE_URL ?>/script/dropdown.js"></script>
    <script src="<?= BASE_URL ?>/script/hamburger-menu.js"></script>
  </body>
</html>
