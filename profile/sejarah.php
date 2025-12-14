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
        <h1>Sejarah</h1>
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
          <?php for ($i=0; $i < count($dataSejarah); $i++): ?>
            <div class="timeline-item <?php echo ($i % 2 == 0) ? "left" : "right"; ?> fade-in">
            <div class="timeline-year"><?php echo $dataSejarah[$i]['tahun_sejarah']; ?></div>
            <div class="timeline-content">
              <h3><?php echo $dataSejarah[$i]['judul_sejarah']; ?></h3>
              <p>
                <?php echo $dataSejarah[$i]['deskripsi']; ?>.
              </p>
            </div>
          </div>
          <?php endfor; ?>
          </div>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <?php include_once dirname(__DIR__) . "/includes/footer.php" ?>

    <script src="<?= BASE_URL ?>/script/fade-in.js"></script>
    <script src="<?= BASE_URL ?>/script/dropdown.js"></script>
    <script src="<?= BASE_URL ?>/script/hamburger-menu.js"></script>
  </body>
</html>
