<?php
if (!defined('IN_INDEX')) {
    http_response_code(403);
    exit;
}

$dataStaf = GetStaff();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Guru dan Staf Sekolah</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/hero-sect.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/guru.css" />
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
        <h1>Guru dan </h1>
      </div>
    </section>

    <!-- CONTENT staf -->
    <section class="staf-section fade-in">
      <h1 class="judul-utama">Guru dan Staf MTs DDI Tani Aman</h1>
      <p class="sub-judul-staf">
        Kumpulan staf penunjang proses belajar di Mts Ddi Tani Aman.
      </p>

      <!-- Filter -->
      <div class="filter-staf">
        <button class="filter-btn aktif">Semua Guru dan Staf</button>
        <!-- <button class="filter-btn">Terbaru</button> -->
      </div>

      <!-- List staf -->
      <div class="staf-list fade-in">
        <?php foreach ($dataStaf as $staf): ?>
          <div class="staf-wrapp fade-in">
            <div class="staf-card fade-in">
              <div class="staf-teks">
  
                <div class="staf-gambar">
                  <img src="<?= BASE_URL ?>/assets/<?= $staf['url_foto'] ?>"
                  alt=<?= $staf['nama_staff'] ?>
                  onerror="this.src=imagePlaceholderUrl('<?= GetStaffInitials($staf['nama_staff']) ?>')" />
                </div>
  
                <p class="staf-deskripsi staf-name">
                  <i class="fa-solid fa-id-card"></i><?= $staf['nama_staff'] ?>
                </p>
  
                <?php if ($staf['mapel']) { ?>
                <p class="staf-deskripsi">
                  <i class="fa-solid fa-book"></i><?= $staf['mapel'] ?>
                </p>
                <?php } ?>
  
                <p class="staf-deskripsi">
                  <i class="fa-solid fa-suitcase"></i><?= $staf['jabatan'] ?>
                </p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

        <!-- CARD 2 -->
        <!-- <div class="staf-wrapp fade-in">
          <div class="staf-card fade-in">
            <div class="staf-teks">

              <div class="staf-gambar">
                <img src="<?php /* echo  BASE_URL */ ?>/assets/contoh3.jpg" alt="Dimas Pratama" />
              </div>

              <p class="staf-deskripsi staf-name">
                <i class="fa-solid fa-id-card"></i>Dimas Firjatullah Islamay Dimas Firjatullah Islamay
              </p>

              <p class="staf-deskripsi">
                <i class="fa-solid fa-book"></i>Matematika & IPA
              </p>

              <p class="staf-deskripsi">
                <i class="fa-solid fa-suitcase"></i>Guru
              </p>
            </div>
          </div>
        </div> -->
    </section>

    <!-- FOOTER -->
    <?php include_once dirname(__DIR__) . "/includes/footer.php" ?>
    
    <script src="<?= BASE_URL ?>/script/fade-in.js"></script>
    <script src="<?= BASE_URL ?>/script/dropdown.js"></script>
    <script src="<?= BASE_URL ?>/script/hamburger-menu.js"></script>
  </body>
</html>
