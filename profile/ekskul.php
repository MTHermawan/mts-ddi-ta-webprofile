<?php session_start();
include_once "../data/koneksi.php";

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
    <link rel="stylesheet" href="../style/hero-sect.css" />
    <link rel="stylesheet" href="../style/ekskul.css" />
    <link rel="stylesheet" href="../style/header.css" />
    <link rel="stylesheet" href="../style/dropdown.css" />
    <link rel="icon" href="../assets/logo-sekolah.png" type="image/png/jpeg/jpg" />
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
        <a href="../index.html#contact"
          ><button class="btn-primary">Hubungi Kami</button></a
        >
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
        <!-- CARD 1 -->
        <div class="ekstrakurikuler-wrapp fade-in">
          <div class="ekstrakurikuler-card fade-in">
            <div class="ekstrakurikuler-teks">
              <h2 class="ekstrakurikuler-judul"><a href="#">Pramuka</a></h2>

              <div class="ekstrakurikuler-gambar">
                <img src="../assets/contoh3.jpg" alt="gambar" />
              </div>
              <p class="ekstrakurikuler-deskripsi">
                <i class="fa-solid fa-person"></i> Pembimbing:
              </p>
              <p class="ekstrakurikuler-deskripsi">
                <i class="fa-solid fa-calendar"></i> Jadwal:
              </p>
            </div>
          </div>
        </div>

        <!-- CARD 1 -->
        <div class="ekstrakurikuler-wrapp fade-in">
          <div class="ekstrakurikuler-card fade-in">
            <div class="ekstrakurikuler-teks">
              <h2 class="ekstrakurikuler-judul"><a href="#">Pramuka</a></h2>

              <div class="ekstrakurikuler-gambar">
                <img src="../assets/contoh3.jpg" alt="gambar" />
              </div>
              <p class="ekstrakurikuler-deskripsi">
                <i class="fa-solid fa-person"></i> Pembimbing:
              </p>
              <p class="ekstrakurikuler-deskripsi">
                <i class="fa-solid fa-calendar"></i> Jadwal:
              </p>
            </div>
          </div>
        </div>

        <!-- CARD 1 -->
        <div class="ekstrakurikuler-wrapp fade-in">
          <div class="ekstrakurikuler-card fade-in">
            <div class="ekstrakurikuler-teks">
              <h2 class="ekstrakurikuler-judul"><a href="#">Pramuka</a></h2>

              <div class="ekstrakurikuler-gambar">
                <img src="../assets/contoh3.jpg" alt="gambar" />
              </div>
              <p class="ekstrakurikuler-deskripsi">
                <i class="fa-solid fa-person"></i> Pembimbing:
              </p>
              <p class="ekstrakurikuler-deskripsi">
                <i class="fa-solid fa-calendar"></i> Jadwal:
              </p>
            </div>
          </div>
        </div>

        <!-- CARD 1 -->
        <div class="ekstrakurikuler-wrapp fade-in">
          <div class="ekstrakurikuler-card fade-in">
            <div class="ekstrakurikuler-teks">
              <h2 class="ekstrakurikuler-judul"><a href="#">Pramuka</a></h2>

              <div class="ekstrakurikuler-gambar">
                <img src="../assets/contoh3.jpg" alt="gambar" />
              </div>
              <p class="ekstrakurikuler-deskripsi">
                <i class="fa-solid fa-person"></i> Pembimbing:
              </p>
              <p class="ekstrakurikuler-deskripsi">
                <i class="fa-solid fa-calendar"></i> Jadwal:
              </p>
            </div>
          </div>
        </div>

        <!-- CARD 1 -->
        <div class="ekstrakurikuler-wrapp fade-in">
          <div class="ekstrakurikuler-card fade-in">
            <div class="ekstrakurikuler-teks">
              <h2 class="ekstrakurikuler-judul"><a href="#">Pramuka</a></h2>

              <div class="ekstrakurikuler-gambar">
                <img src="../assets/contoh3.jpg" alt="gambar" />
              </div>
              <p class="ekstrakurikuler-deskripsi">
                <i class="fa-solid fa-person"></i> Pembimbing:
              </p>
              <p class="ekstrakurikuler-deskripsi">
                <i class="fa-solid fa-calendar"></i> Jadwal:
              </p>
            </div>
          </div>
        </div>

        <!-- CARD 1 -->
        <div class="ekstrakurikuler-wrapp fade-in">
          <div class="ekstrakurikuler-card fade-in">
            <div class="ekstrakurikuler-teks">
              <h2 class="ekstrakurikuler-judul"><a href="#">Pramuka</a></h2>

              <div class="ekstrakurikuler-gambar">
                <img src="../assets/contoh3.jpg" alt="gambar" />
              </div>
              <p class="ekstrakurikuler-deskripsi">
                <i class="fa-solid fa-person"></i> Pembimbing:
              </p>
              <p class="ekstrakurikuler-deskripsi">
                <i class="fa-solid fa-calendar"></i> Jadwal:
              </p>
            </div>
          </div>
        </div>

        <!-- CARD 1 -->
        <div class="ekstrakurikuler-wrapp fade-in">
          <div class="ekstrakurikuler-card fade-in">
            <div class="ekstrakurikuler-teks">
              <h2 class="ekstrakurikuler-judul"><a href="#">Pramuka</a></h2>

              <div class="ekstrakurikuler-gambar">
                <img src="../assets/contoh3.jpg" alt="gambar" />
              </div>
              <p class="ekstrakurikuler-deskripsi">
                <i class="fa-solid fa-person"></i> Pembimbing:
              </p>
              <p class="ekstrakurikuler-deskripsi">
                <i class="fa-solid fa-calendar"></i> Jadwal:
              </p>
            </div>
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
