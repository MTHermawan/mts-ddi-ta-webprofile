<?php include_once "../data/koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri</title>
    <link rel="stylesheet" href="../style/user/style.css">
    <link rel="stylesheet" href="../style/galeri.css">
    <link rel="icon" href="../assets/logo-sekolah.png" type="image/png/jpeg/jpg">
</head>
<body>
    <?php include "../includes/user/site-header.php"; ?>

    <header>
        <?php include "../includes/user/navbar.php"; ?>

        <section id="hero">
            <div class="hero-content">
                <h1 class="judul-hero">Galeri Kegiatan MTs DDI Tani Aman</h1>
                <h5>Lihat momen-momen berkesan dari kegiatan belajar mengajar, acara sekolah, ekstrakurikuler, dan prestasi siswa di MTs DDI Tani Aman. Galeri ini menampilkan aktivitas nyata yang terjadi setiap hari di lingkungan sekolah kami.</h5> 
            </div>
        </section>
    </header>

    <section class="data-galeri">
        <h1 class="head">Ekstrakulikuler</h1>
            <div class="data-galeri-con">
                <div class="card">
                    <img src="" alt="" class="img-galeri">
                    <h1 class="judul">Judul: </h1>
                    <h3 class="desk">Deskripsi: </h3>
                </div>
            </div>
    </section>

    <?php include "../includes/user/footer.php"; ?>

    <script src="../script/user/script.js"></script>
</body>
</html>