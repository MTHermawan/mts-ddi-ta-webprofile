<?php
if (!defined('IN_INDEX')) {
    http_response_code(403);
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi Misi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/hero-sect.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/visi-misi.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/header.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/dropdown.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/footer.css" />
    <link rel="icon" href="<?= BASE_URL ?>/assets/<?= SETTINGS['logo_sekolah'] ?>" type="image/png/jpeg/jpg" />
    <script src="<?= BASE_URL ?>/script/utility.js"></script>
</head>
<body>

    <!-- HEADER -->
   <?php include_once dirname(__DIR__) . "/includes/header.php" ?>

    <!-- HERO -->
    <section id="hero">
      <img
        src="<?= BASE_URL ?>/assets/gambar-landing.jpeg"
        alt="Latar belakang pendidikan berkarakter"
        class="hero-bg"
      />
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <h1>Visi Misi</h1>
      </div>
    </section>


    <!-- SECTION VISI MISI -->
    <section class="visi-misi-section  fade-in">
        <h1 class="judul-utama">Visi</h1>
        <div class="visi-misi-list">
            <div class="visi-card">
                <p class="visi">“BERTAQWA, UNGGUL DAN BERKARAKTER.”</p>
            </div>
        </div>
    </section>

    <section class="visi-misi-section  fade-in">
        <h1 class="judul-utama">Misi</h1>
        <div class="visi-misi-list">
            <div class="misi-card">
                <ul>
                    <li>Menciptakan Madrasah sebagai sarana untuk mengoptimalkan pengkajian keimanan dan ketaqwaan terhadap Allah SWT.</li>
                    <li>Membiasakan berperilaku Islami sesuai adab dengan meneladani Rasulullah SAW.</li>
                    <li>Merancang pembelajaran yang menarik dan menyenangkan.</li>
                    <li>Meningkatkan manajemen satuan Pendidikan yang adaptif, unggul dan berkarakter.</li>
                    <li>Menjamin hak belajar setiap anak dalam proses pembelajaran yang menjunjung tinggi nilai kebersamaan.</li>
                    <li>Mewujudkan prestasi peserta didik sesuai dengan potensi yang dimiliki baik secara akademik maupun non akademik.</li>
                    <li>Mewujudkan peserta didik yang berperilaku ramah dan berkarakter baik.</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="visi-misi-section  fade-in">
        <h1 class="judul-utama">Tujuan</h1>
        <div class="visi-misi-list">
            <div class="misi-card">
                <ul>
                    <li>Membiasakan kegiatan ibadah secara rutin.</li>
                    <li>Menciptakan pembelajaran yang mengedepankan ciri khas madrasah yang islami dan bernuansa kebhinekaan yang harmonis.</li>
                    <li>Membentuk peserta didik yang memiliki kemampuan daya saing yang unggul, berkarakter dan taat beribadah.</li>
                    <li>Menghasilkan lulusan yang mampu bersaing dan unggul dalam kehidupan nyata.</li>
                    <li>Mempunyai kecakapaan hidup yang unggul dan mampu beradaptasi dengan perkembangan zaman.</li>
                    <li>Menjadikan madrasah sebagai tempat untuk mengembangkan proses pengembangkan intelektual emosional, sosial, keterampilan dan tumbuh kembang peserta didik sesuai tingkat kemampuan dan kondisi masing-masing peserta didik yang mengedepankan nilai kebersamaan.</li>
                </ul>
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
