<?php include_once "../data/koneksi.php";
include_once "../data/data_galeri.php";

$data_galeri = GetGaleri();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/galeri.css">
    <link rel="icon" href="../assets/logo-sekolah.png" type="image/png/jpeg/jpg">
</head>

<body>
    <?php include "../includes/site-header.php"; ?>

    <header>
        <?php include "../includes/navbar.php"; ?>

        <section id="hero">
            <div class="hero-content">
                <h1 class="judul-hero">Galeri Kegiatan MTs DDI Tani Aman</h1>
                <h5>Lihat momen-momen berkesan dari kegiatan belajar mengajar, acara sekolah, ekstrakurikuler, dan
                    prestasi siswa di MTs DDI Tani Aman. Galeri ini menampilkan aktivitas nyata yang terjadi setiap hari
                    di lingkungan sekolah kami.</h5>
            </div>
        </section>
    </header>

    <section class="data-galeri">
        <h1 class="head">Galeri</h1>
        <div class="data-galeri-con">
            <?php foreach ($data_galeri as $galeri) { ?>
                <div class="card">
                    <!-- FOTO -->
                    <?php if (file_exists("../assets/" . $galeri["url_foto"])) { ?>
                        <img src="<?php echo "../assets/" . $galeri["url_foto"]; ?>" alt="" class="img-galeri">
                    <?php } else { ?>
                        <div class="empty-img-galeri"></div>
                    <?php } ?>
                    
                    <h1 class="judul"><?php echo $galeri["judul_galeri"]; ?></h1>
                    <h3 class="desk"><?php echo $galeri["deskripsi_galeri"]; ?></h3>
                </div>
            <?php } ?>
            <div class="card">
                <img src="" alt="" class="img-galeri">
                <h1 class="judul">Judul: </h1>
                <h3 class="desk">Deskripsi: </h3>
            </div>
        </div>
    </section>

    <?php include "../includes/footer.php"; ?>

    <script src="../script/script.js"></script>
</body>

</html>