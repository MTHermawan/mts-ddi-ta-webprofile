<?php
if (!defined('IN_INDEX')) {
    http_response_code(403);
    exit;
}

// Data berbentuk array
$dataStrukturOrganisasi = GetStrukturOrganisasi();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/hero-sect.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/struktur-organisasi.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/header.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/dropdown.css" />
    <link rel="icon" href="<?= BASE_URL ?>/assets/logo-sekolah.png" type="image/png/jpeg/jpg">
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
        <h1>Struktur Organisasi</h1>
    </section>

    <!-- SECTION Struktur -->
    <section class="sejarah-section">
        <h1 class="judul-utama">Struktur Organisasi Sekolah</h1>
        <p class="sub-judul-struktur">
            Susunan organisasi sekolah yang jelas dan terstruktur, memastikan proses pendidikan berjalan efektif dan terkoordinasi.
        </p>
        <div class="struktur-list">
            <div class="struktur-card">
            <img src="<?= BASE_URL ?>/assets/<?= $dataStrukturOrganisasi[0]['url_foto'] ?>" alt="struktur-organisasi" class="img-organisasi">
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include_once dirname(__DIR__) . "/includes/footer.php" ?>

    <script src="<?= BASE_URL ?>/script/fade-in.js"></script>
    <script src="<?= BASE_URL ?>/script/nav-active.js"></script>
    <script src="<?= BASE_URL ?>/script/dropdown.js"></script>
    <script src="<?= BASE_URL ?>/script/hamburger-menu.js"></script>

</body>
</html>