<?php session_start();
include_once "../data/koneksi.php";

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
    <link rel="stylesheet" href="../style/hero-sect.css" />
    <link rel="stylesheet" href="../style/berita.css" />
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
        <!-- CARD 1 -->
        <div class="berita-card fade-in">
          <div class="berita-gambar">
            <img src="../assets/contoh3.jpg" alt="gambar" />
          </div>

          <div class="berita-teks">
            <h2 class="berita-judul">Upacara Hari Guru Nasional 2025</h2>

            <p class="berita-deskripsi">
              MTs DDI Tani Aman melaksanakan upacara Hari Guru Nasional dengan
              penuh khidmat dan antusiasme para siswa...
            </p>

            <div class="news-meta">
              <div class="news-meta-date">
                <i class="fa-solid fa-calendar news-icon"></i>
                <span>20 November 2025</span>
              </div>
              <div class="news-meta-publisher">
                <i class="fas fa-user"></i>
                <span>Admin Sekolah</span>
              </div>
            </div>

            <a class="btn-baca" href="#">Selengkapnya →</a>
          </div>
        </div>

        <!-- CARD 2 -->
        <div class="berita-card fade-in">
          <div class="berita-gambar">
            <img src="../assets/contoh3.jpg" alt="gambar" />
          </div>

          <div class="berita-teks">
            <h2 class="berita-judul">Upacara Hari Guru Nasional 2025</h2>

            <p class="berita-deskripsi">
              MTs DDI Tani Aman melaksanakan upacara Hari Guru Nasional dengan
              penuh khidmat dan antusiasme para siswa...
            </p>

            <div class="news-meta">
              <div class="news-meta-date">
                <i class="fa-solid fa-calendar news-icon"></i>
                <span>20 November 2025</span>
              </div>
              <div class="news-meta-publisher">
                <i class="fas fa-user"></i>
                <span>Admin Sekolah</span>
              </div>
            </div>

            <a class="btn-baca" href="#">Selengkapnya →</a>
          </div>
        </div>

        <!-- CARD 3 -->
        <div class="berita-card fade-in">
          <div class="berita-gambar">
            <img src="../assets/contoh3.jpg" alt="gambar" />
          </div>

          <div class="berita-teks">
            <h2 class="berita-judul">Upacara Hari Guru Nasional 2025</h2>

            <p class="berita-deskripsi">
              MTs DDI Tani Aman melaksanakan upacara Hari Guru Nasional dengan
              penuh khidmat dan antusiasme para siswa...
            </p>

            <div class="news-meta">
              <div class="news-meta-date">
                <i class="fa-solid fa-calendar news-icon"></i>
                <span>20 November 2025</span>
              </div>
              <div class="news-meta-publisher">
                <i class="fas fa-user"></i>
                <span>Admin Sekolah</span>
              </div>
            </div>

            <a class="btn-baca" href="#">Selengkapnya →</a>
          </div>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <?php include_once "../includes/footer.php" ?>

    <script src="../script/fade-in.js"></script>
    <script src="script/nav-active.js"></script>
    <script src="../script/dropdown.js"></script>
    <script src="../script/hamburger-mennu.js"></script>
  </body>
</html>
