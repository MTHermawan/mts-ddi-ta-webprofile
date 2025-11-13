<?php include_once "../data/koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru</title>
    <link rel="stylesheet" href="../style/user/style.css">
    <link rel="stylesheet" href="../style/guru.css">
    <link rel="icon" href="../assets/logo-sekolah.png" type="image/png/jpeg/jpg">
</head>
<body>
    <?php include "../includes/user/site-header.php"; ?>

    <header>
        <?php include "../includes/user/navbar.php"; ?>

        <section id="hero">
            <div class="hero-content">
                <h1 class="judul-hero">Pengajar MTS DDI Tani Aman </h1>
                <h5>Kami percaya, guru adalah teladan. Karena itu, kami memilih dan mengembangkan guru yang tidak hanya pintar, tapi juga bijak dan penuh kasih sayang.</h5> 
            </div>
        </section>
    </header>

    <section class="data-guru">
        <h1 class="head">Data Guru</h1>
            <div class="data-guru-con">
                <div class="card">
                    <h2 class="nama">nama</h2>
                    <h3 class="mapel">Matematika</h3>
                    <img src="" alt="" class="img-guru">
                    <h3 class="gelar">[Gelar]</h3>
                </div>
            </div>
    </section>

    <?php include "../includes/user/footer.php"; ?>

    <script src="../script/user/script.js"></script>
</body>
</html>