<?php include_once "../data/koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/struktur-organisasi.css">
    <link rel="icon" href="../assets/logo-sekolah.png" type="image/png/jpeg/jpg">
</head>
<body>
    <?php include "../includes/site-header.php"; ?>

    <header>
        <?php include "../includes/navbar.php"; ?>

        <section id="hero">
            <div class="hero-content">
                <h1 class="judul-hero">Susunan Struktur Organisasi MTS DDI Tani Aman</h1>
                <h5>Susunan organisasi sekolah yang jelas dan terstruktur, memastikan proses pendidikan berjalan efektif dan terkoordinasi.</h5> 
            </div>
        </section>
    </header>

    <section class="data-organisasi">
        <h1 class="head">Struktur Organisasi</h1>
            <div class="data-organisasi-con">
                <div class="card">
                    <img src="../assets/data-profile/struktur-organisasi.jpg" alt="struktur-organisasi" class="img-organisasi">
                </div>
            </div>
    </section>

    <?php include "../includes/footer.php"; ?>

    <script src="../script/user/script.js"></script>
</body>
</html>