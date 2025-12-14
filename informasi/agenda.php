<?php
if (!defined('IN_INDEX')) {
    http_response_code(403);
    exit;
}

$dataAgenda = GetAgenda();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agenda Sekolah</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/hero-sect.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/agenda.css" />
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
        <h1>Agenda</h1>
      </div>
    </section>

    <!-- CONTENT agenda -->
    <section class="agenda-section fade-in">
      <h1 class="judul-utama">Agenda MTs DDI Tani Aman</h1>
      <p class="sub-judul-agenda">
        Kumpulan informasi dan agenda terbaru seputar kegiatan sekolah.
      </p>

      <!-- Filter -->
      <div class="filter-agenda">
        <button class="filter-btn aktif">Semua Agenda</button>
      </div>

      <!-- List agenda -->
      <div class="agenda-list fade-in">
        <?php foreach ($dataAgenda as $agenda): ?>
          <div class="agenda-card fade-in">
          <div class="agenda-gambar">
            <img
            src="<?= BASE_URL ?>/assets/<?= $agenda['url_foto'] ?>"
            alt=<?= $agenda['judul'] ?>
            onerror="this.src=imagePlaceholderUrl('<?= $agenda['judul'] ?>')" />
          </div>

          <div class="agenda-teks">
            <h2 class="agenda-judul"><?= $agenda['judul'] ?></h2>

            <p class="agenda-deskripsi">
              <?= $agenda['deskripsi'] ?>
            </p>

            <p class="agenda-date">
              <i class="fa-solid fa-calendar agenda-icon"></i><?= $agenda['tanggal']; ?>
            </p>
            <p class="agenda-time">
              <i class="fa-solid fa-clock agenda-icon"></i><?= $agenda['waktu']; ?>
            </p>
            <p class="agenda-location">
              <i class="fa-solid fa-location-dot agenda-icon"></i><?= $agenda['lokasi']; ?>
            </p>

            <a class="btn-baca" href="<?= BASE_URL ?>/informasi/agenda/<?= $agenda['id_agenda']; ?>/">Selengkapnya →</a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- FOOTER -->
    <?php include_once dirname(__DIR__) . "/includes/footer.php"; ?>

    <script src="<?= BASE_URL ?>/script/fade-in.js"></script>
    <script src="<?= BASE_URL ?>/script/dropdown.js"></script>
    <script src="<?= BASE_URL ?>/script/hamburger-menu.js"></script>
  </body>
</html>