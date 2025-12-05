<?php session_start();
include_once "../data/koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="../style/hero-sect.css">
    <link rel="stylesheet" href="../style/struktur-organisasi.css">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/dropdown.css" />
    <link rel="icon" href="../assets/logo-sekolah.png" type="image/png/jpeg/jpg">
</head>
<body>
    <!-- HEADER -->
    <?php include "../includes/header.php" ?>

    <section id="hero">
      <img
        src="../assets/school.jpg"
        alt="Latar belakang pendidikan berkarakter"
        class="hero-bg"
      />
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <h1>Pendidikan Berkarakter, Berbasis Al-Qur'an dan Teknologi</h1>
        <p class="hero-subtitle">
          Mengedepankan Nilai-Nilai Cerdas Beretika: Ceria, Empati, Rasional,
          Damai, Aktif, Sabar, Bersih, Elok, Tulus, Iman, Konsisten, dan Amanah.
        </p>
        <button class="btn-primary">Hubungi Kami</button>
      </div>
    </section>

    <!-- SECTION Struktur -->
    <section class="sejarah-section">
        <h1 class="judul-utama">Struktur Organisasi Sekolah</h1>
        <p class="sub-judul-struktur">
            Susunan organisasi sekolah yang jelas dan terstruktur, memastikan proses pendidikan berjalan efektif dan terkoordinasi.
        </p>
        <div class="struktur-list">
            <div class="struktur-card">
            <img src="../assets/data-profile/struktur-organisasi.jpg" alt="struktur-organisasi" class="img-organisasi">
            </div>

        </div>
    </section>

    <!-- FOOTER -->
    <?php include_once "../includes/footer.php" ?>

    <div class="footer-ornament"></div>

    <div class="footer-bottom">
        <p>© 2025 MTS DDI Tani Aman • All Rights Reserved</p>
    </div>
</footer>
    <script src="../script/fade-in.js"></script>
    <script src="script/nav-active.js"></script>
    <script src="../script/dropdown.js"></script>
    <script src="../script/hamburger-mennu.js"></script>

</body>
</html>