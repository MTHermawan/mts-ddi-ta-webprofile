<?php
if (!defined('IN_INDEX')) {
    http_response_code(403);
    exit;
}

$data_berita_tunggal = [];
if (!filter_var($id_berita, FILTER_VALIDATE_INT)) {
  header('Location: ../');
}

$data_berita_tunggal = GetBerita($id_berita);
if (!$data_berita_tunggal) {
  header('Location: ./');
}

$dateString = FormatDateID($data_berita_tunggal[0]['tanggal_dibuat']);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Berita</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/hero-sect.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/adv.info.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/header.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/footer.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/dropdown.css" />
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
        <h1>Detail Berita</h1>
      </div>
    </section>

    <section class="breadcrumb fade-in">
      <a href="<?= BASE_URL ?>/index.html">Home</a> ›
      <a href="<?= BASE_URL ?>/informasi/berita.html">Berita</a> ›
      <span>Detail Berita</span>
    </section>

    <section class="news-detail-container fade-in">
      <!-- Sidebar -->
      <aside class="news-sidebar">
        <h3 class="new-title">
          <?= $data_berita_tunggal[0]['judul'] ?>
        </h3>
        <div class="featured-meta">
          <div class="featured-meta-date">
            <i class="fa-solid fa-calendar news-icon"></i>
            <span><?= $dateString ?></span>
          </div>
          <div class="featured-meta-publisher">
            <i class="fas fa-user"></i>
            <span><?= $data_berita_tunggal[0]['nama_admin'] ?></span>
          </div>
        </div>
      </aside>

      <!-- Konten Utama -->
      <article class="news-detail">
        <img
          src="<?= BASE_URL ?>/assets/<?= $data_berita_tunggal[0]['url_foto'] ?>"
          class="news-detail-img"
          alt="Gambar Berita"
          onerror="this.onerror = null; this.style.display = 'none';"
        />
        <!-- <img src="../assets/contoh3.jpg" class="news-detail-img" alt="Gambar  Berita" /> -->

        <h1 class="news-detail-title">
          <?= $data_berita_tunggal[0]['judul'] ?>
          <!-- Siswa MTs DDI Tani Aman Raih Juara 1 Lomba Tilawah Tingkat Kabupaten  -->
        </h1>

        <p class="news-description">
          <?= $data_berita_tunggal[0]['deskripsi'] ?>
          <!-- Alhamdulillah, atas izin Allah SWT, siswa kelas 8, Ananda Rizky Fauzan, berhasil meraih juara pertama dalam lomba tilawah Al-Qur’an tingkat kabupaten... Kegiatan lomba berlangsung di kantor Kemenag pada hari Selasa, dengan peserta dari berbagai sekolah dan madrasah... -->
        </p>

        <p></p>
      </article>
    </section>

    <!-- FOOTER -->
    <?php include_once dirname(__DIR__) . "/includes/footer.php" ?>

    <script src="<?= BASE_URL ?>/script/fade-in.js"></script>
    <script src="<?= BASE_URL ?>/script/dropdown.js"></script>
    <script src="<?= BASE_URL ?>/script/hamburger-menu.js"></script>
  </body>
</html>
