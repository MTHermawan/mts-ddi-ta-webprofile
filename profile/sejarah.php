<?php
if (!defined('IN_INDEX')) {
    http_response_code(403);
    exit;
}

$dataSejarah = GetSejarah();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sejarah Sekolah</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/hero-sect.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/sejarahh.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/header.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/dropdown.css" />
    <link rel="icon" href="<?= BASE_URL ?>/assets/logo-sekolah.png" type="image/png/jpeg/jpg" />

  </head>
  <body>
    <!-- HEADER -->
    <?php include_once dirname(__DIR__) . "/includes/header.php" ?>

    <section id="hero">
      <img
        src="<?= BASE_URL ?>/assets/school.jpg"
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
        <a href="<?= BASE_URL ?>/index.html#contact"
          ><button class="btn-primary">Hubungi Kami</button></a
        >
      </div>
    </section>

    <!-- SECTION SEJARAH -->
    <section class="sejarah-section">
      <div class="container">
        <h1 class="judul-utama">Sejarah Singkat</h1>
        <p class="sub-judul-sejarah">
          Dari Mimpi Kecil Menuju Generasi Qur’ani
        </p>
        
        <div class="timeline-alternate">
          <?php for ($i=0; $i < count($dataSejarah); $i++) { ?>
            <div class="timeline-item <?php echo ($i % 2 == 0) ? "left" : "right"; ?> fade-in">
            <div class="timeline-year"><?php echo $dataSejarah[$i]['tahun_sejarah']; ?></div>
            <div class="timeline-content">
              <h3><?php echo $dataSejarah[$i]['judul_sejarah']; ?></h3>
              <p>
                <?php echo $dataSejarah[$i]['deskripsi']; ?>.
              </p>
            </div>
          </div>
          <?php } ?>
          <!-- 1984 - Kiri -->
          <div class="timeline-item left fade-in">
            <div class="timeline-year">1984</div>
            <div class="timeline-content">
              <h3>Berdirinya MTs DDI Tani Aman</h3>
              <p>
                Madrasah Tsanawiyah Darud Da’wah Wal Irsyad (MTs DDI) Tani Aman
                Samarinda resmi berdiri di bawah naungan Yayasan DDI Tani Aman.
                Pada awal berdiri, madrasah ini dipimpin oleh Bapak H.
                Jamaluddin, A.Md. sebagai kepala madrasah, dengan jumlah siswa
                sekitar <strong>21 siswa</strong>.
              </p>
            </div>
          </div>

          <!-- 2013 - Kanan -->
          <div class="timeline-item right fade-in">
            <div class="timeline-year">2013</div>
            <div class="timeline-content">
              <h3>Regenerasi Kepemimpinan</h3>
              <p>
                Setelah 29 tahun memimpin, Bapak H. Jamaluddin menyerahkan
                tongkat estafet kepemimpinan kepada Bapak H. Suwardi, A.Md. Di
                bawah kepemimpinannya, madrasah terus berkembang hingga tahun
                2019.
              </p>
            </div>
          </div>

          <!-- 2021 - Kiri -->
          <div class="timeline-item left fade-in">
            <div class="timeline-year">2021</div>
            <div class="timeline-content">
              <h3>Akreditasi "A" Nasional</h3>
              <p>
                MTs DDI Tani Aman meraih akreditasi "A" dari Badan Akreditasi
                Nasional (BAN-SM) dengan SK Nomor: 999/BAN-SM/SK/2021. Saat ini
                dipimpin oleh Ibu ST. Fatimah Amin, S.Pd., dengan total 23
                tenaga pendidik dan kependidikan.
              </p>
            </div>
          </div>

          <!-- 2024/2025 - Kanan -->
          <div class="timeline-item right fade-in">
            <div class="timeline-year">2024</div>
            <div class="timeline-content">
              <h3>Prestasi & Pertumbuhan</h3>
              <p>
                Madrasah kini memiliki 236 siswa aktif dan telah meluluskan
                lebih dari 3.000 alumni. Pada tahun ajaran ini, angkatan ke-39
                lulus dengan 100% kelulusan. Fasilitas fisik, prestasi
                akademik-nonakademik, dan jaringan alumni terus berkembang
                pesat.
              </p>
            </div>
          </div>
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
