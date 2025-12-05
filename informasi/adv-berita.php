<?php session_start();
include_once "../data/koneksi.php";

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
    <link rel="stylesheet" href="../style/hero-sect.css" />
    <link rel="stylesheet" href="../style/adv.info.css" />
    <link rel="stylesheet" href="../style/header.css" />
    <link rel="stylesheet" href="../style/dropdown.css" />
    <link
      rel="icon"
      href="../assets/logo-sekolah.png"
      type="image/png/jpeg/jpg"
    />
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
        <a href="../index.html#contact"><button class="btn-primary">Hubungi Kami</button></a>
      </div>
    </section>

    <section class="breadcrumb fade-in">
      <a href="../index.html">Home</a> ›
      <a href="../informasi/berita.html">Berita</a> ›
      <span>Detail Berita</span>
    </section>

    <section class="news-detail-container fade-in">
      <!-- Sidebar -->
      <aside class="news-sidebar">
        <h3 class="new-title">
          Siswa MTs DDI Tani Aman Raih Juara 1 Lomba Tilawah Tingkat Kabupaten
        </h3>
        <div class="featured-meta">
          <div class="featured-meta-date">
            <i class="fa-solid fa-calendar news-icon"></i>
            <span>20 November 2025</span>
          </div>
          <div class="featured-meta-publisher">
            <i class="fas fa-user"></i>
            <span>Admin Sekolah</span>
          </div>
        </div>
      </aside>

      <!-- Konten Utama -->
      <article class="news-detail">
        <img
          src="../assets/contoh3.jpg"
          class="news-detail-img"
          alt="Gambar Berita"
        />

        <h1 class="news-detail-title">
          Siswa MTs DDI Tani Aman Raih Juara 1 Lomba Tilawah Tingkat Kabupaten
        </h1>

        <p class="news-description">
          Alhamdulillah, atas izin Allah SWT, siswa kelas 8, Ananda Rizky Fauzan, berhasil meraih juara pertama dalam lomba tilawah Al-Qur’an tingkat kabupaten... Kegiatan lomba berlangsung di kantor Kemenag pada hari Selasa, dengan peserta dari berbagai sekolah dan madrasah...
        </p>

        <p></p>
      </article>
    </section>

    <!-- FOOTER -->
    <?php include_once "../includes/footer.php" ?>

    <script src="../script/fade-in.js"></script>
    <script src="script/nav-active.js"></script>
    <script src="../script/dropdown.js"></script>
    <script src="../script/hamburger-mennu.js"></script>
  </body>
</html>
