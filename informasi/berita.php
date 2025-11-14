<?php include_once "../data/koneksi.php"; 
include_once "../data/data_informasi.php";

$data_berita = GetAllBerita();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/berita.css">
    <link rel="icon" href="../assets/logo-sekolah.png" type="image/png/jpeg/jpg">
</head>

<body>
    <?php include "../includes/site-header.php"; ?>

    <header>
        <?php include "../includes/navbar.php"; ?>

        <section id="hero">
            <div class="hero-content">
                <h1 class="judul-hero">Update Terkini dari MTs DDI Tani Aman</h1>
                <h5>Informasi terbaru seputar kegiatan, prestasi, dan pengumuman resmi dari MTs DDI Tani Aman. Kami
                    berkomitmen memberikan update yang akurat dan bermanfaat bagi siswa, orang tua, dan masyarakat.</h5>
            </div>
        </section>
    </header>

    <section class="data-galeri">
        <h1 class="head">Berita</h1>
        <div class="data-galeri-con">
            <?php foreach ($data_berita as $berita) { ?>
                <div class="card">
                    <!-- FOTO -->
                    <?php if (file_exists("../assets/" . $berita["url_foto"])) { ?>
                        <img src="<?php echo "../assets/" . $berita["url_foto"]; ?>" alt="" class="img-galeri">
                    <?php } else { ?>
                        <div class="empty-img-galeri"></div>
                    <?php } ?>

                    <!-- DETAIL -->
                    <div class="detail">
                        <h1 class="judul"><?php echo $berita["judul"]; ?></h1>
                        <h3 class="desk"><?php echo $berita["konten"]; ?></h3>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <?php include "../includes/footer.php"; ?>

    <script src="../script/script.js"></script>
</body>

</html>