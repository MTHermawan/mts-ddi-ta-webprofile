<?php
if (!defined('IN_INDEX')) {
    http_response_code(403);
    exit;
}

$dataBerita = GetBerita();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Berita Sekolah</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/hero-sect.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/berita.css" />
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
        <h1>Berita</h1>
      </div>
    </section>

    <!-- CONTENT BERITA -->
    <section class="berita-section fade-in">
      <h1 class="judul-utama">Berita MTs DDI Tani Aman</h1>
      <p class="sub-judul-berita">
        Kumpulan informasi dan berita terbaru seputar kegiatan sekolah.
      </p>

      <!-- Filter -->
      <div class="filter-berita">
        <button class="filter-btn aktif">Semua Berita</button>
      </div>

      <!-- List berita -->
      <div class="berita-list fade-in">
        <?php foreach ($dataBerita as $berita): ?>
        <div class="berita-card fade-in">
          <div class="berita-gambar">
            <img
            src="<?= BASE_URL ?>/assets/<?= $berita['url_foto'] ?>"
            alt=<?= $berita['judul'] ?>
            onerror="this.src=imagePlaceholderUrl('<?= $berita['judul'] ?>')" />
          </div>

          <div class="berita-teks">
            <h2 class="berita-judul"><?= $berita['judul'] ?></h2>
            <!-- <h2 class="berita-judul">Upacara Hari Guru Nasional 2025</h2> -->

            <p class="berita-deskripsi">
              <?= $berita['deskripsi'] ?>
            </p>

            <div class="news-meta">
              <div class="news-meta-date">
                <i class="fa-solid fa-calendar news-icon"></i>
                <span><?= FormatDateID($berita['tanggal_dibuat']) ?></span>
              </div>
              <div class="news-meta-publisher">
                <i class="fas fa-user"></i>
                <span><?= $berita['nama_admin'] ?></span>
              </div>
            </div>

            <a class="btn-baca" href="<?= BASE_URL ?>/informasi/berita/<?= $berita['id_berita'] ?>">Selengkapnya →</a>
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
