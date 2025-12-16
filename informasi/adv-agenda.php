<?php
if (!defined('IN_INDEX')) {
  http_response_code(403);
  exit;
}

$data_agenda_tunggal = [];
if (!filter_var($id_agenda, FILTER_VALIDATE_INT)) {
  header('Location: ./');
}

$data_agenda_tunggal = GetAgenda($id_agenda);
if (!$data_agenda_tunggal) {
  header('Location: ./');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Berita</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
  <link rel="stylesheet" href="<?= BASE_URL ?>/style/hero-sect.css" />
  <link rel="stylesheet" href="<?= BASE_URL ?>/style/adv.info.css" />
  <link rel="stylesheet" href="<?= BASE_URL ?>/style/header.css" />
  <link rel="stylesheet" href="<?= BASE_URL ?>/style/footer.css" />
  <link rel="stylesheet" href="<?= BASE_URL ?>/style/dropdown.css" />
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
      class="hero-bg" />
    <div class="hero-overlay"></div>
    <div class="hero-content">
      <h1>Detail Agenda</h1>
    </div>
  </section>

  <section class="breadcrumb fade-in">
    <a href="<?= BASE_URL ?>/index">Home</a> ›
    <a href="<?= BASE_URL ?>/informasi/agenda">Agenda</a> ›
    <span>Detail Agenda</span>
  </section>

  <section class="news-detail-container fade-in">


    <!-- Konten Utama -->
    <article class="news-detail">
      <img
        src="<?= BASE_URL ?>/assets/contoh2.jpg"
        class="news-detail-img"
        alt="Gambar Agenda"
        onerror="this.style.display = 'none';" />
      <!-- Sidebar -->
      <aside class="news-sidebar">
        <div class="featured-meta">
          <p class="event-date">
            <i class="fa-solid fa-calendar event-icon"></i><?= $data_agenda_tunggal[0]['tanggal'] ?>
            <!-- <i class="fa-solid fa-calendar event-icon"></i>20 November 2025 -->
          </p>
          <p class="event-time">
            <i class="fa-solid fa-clock event-icon"></i><?= $data_agenda_tunggal[0]['waktu'] ?>
            <!-- <i class="fa-solid fa-clock event-icon"></i>10:00 - 12:00 -->
          </p>
          <p class="event-location">
            <i class="fa-solid fa-location-dot event-icon"></i>Auditorium
          </p>
        </div>
      </aside>
      <h1 class="news-detail-title">
        <?= $data_agenda_tunggal[0]['judul'] ?>
      </h1>
      <p class="news-description"><?= $data_agenda_tunggal[0]['deskripsi'] ?>
        <!-- MTs DDI Tani Aman akan melaksanakan Ujian Akhir Semester Gasal untuk seluruh tingkatan mulai tanggal 10 hingga 15 Desember 2025. Seluruh
          siswa diharapkan mempersiapkan diri dengan baik dan menjaga kesehata menjelang pelaksanaan ujian. 
          Ujian akan dilaksanakan di ruang kelas masing-masing sesuai jadwal yang telah dibagikan oleh wali kelas. Siswa diwajibkan hadir tepat waktu dan membawa perlengkapan belajar secara lengkap. -->
      </p>

      <p></p>
    </article>
  </section>

  <!-- FOOTER -->
  <?php include_once dirname(__DIR__) . "/includes/footer.php" ?>

  <script src="<?= BASE_URL ?>/script/fade-in.js"></script>
  <script src="<?= BASE_URL ?>/script/dropdown.js"></script>
  <script src="<?= BASE_URL ?>/script/hamburger-menu.js"></script>
</body>

</html>