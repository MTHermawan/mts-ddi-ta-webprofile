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
      <a href="../informasi/agenda.php">Agenda</a> ›
      <span>Detail Agenda</span>
    </section>

    <section class="news-detail-container fade-in">
      <!-- Sidebar -->
      <aside class="news-sidebar">
        <h3 class="new-title">
          Pelaksanaan Ujian Akhir Semester Gasal Tahun Pelajaran 2025/2026
        </h3>
        <div class="featured-meta">
          <p class="event-date">
            <i class="fa-solid fa-calendar event-icon"></i>20 November 2025
          </p>
          <p class="event-time">
            <i class="fa-solid fa-clock event-icon"></i>10:00 - 12:00
          </p>
          <p class="event-location">
            <i class="fa-solid fa-location-dot event-icon"></i>Auditorium
          </p>
        </div>
      </aside>

      <!-- Konten Utama -->
      <article class="news-detail">
        <img
          src="../assets/contoh2.jpg"
          class="news-detail-img"
          alt="Gambar Agenda"
        />
        <h1 class="news-detail-title">
          Pelaksanaan Ujian Akhir Semester Gasal Tahun Pelajaran 2025/2026
        </h1>
        <p class="news-description">MTs DDI Tani Aman akan melaksanakan Ujian Akhir Semester Gasal untuk seluruh tingkatan mulai tanggal 10 hingga 15 Desember 2025. Seluruh
          siswa diharapkan mempersiapkan diri dengan baik dan menjaga kesehata menjelang pelaksanaan ujian. 
          Ujian akan dilaksanakan di ruang kelas masing-masing sesuai jadwal yang telah dibagikan oleh wali kelas. Siswa diwajibkan hadir tepat waktu dan membawa perlengkapan belajar secara lengkap.
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
