<?php include_once "../data/koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasilitas</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/fasilitas.css">
    <link rel="icon" href="../assets/logo-sekolah.png" type="image/png/jpeg/jpg">
</head>
<body>
    <?php include "../includes/site-header.php"; ?>

    <header>
        <?php include "../includes/navbar.php"; ?>

        <section id="hero">
            <div class="hero-content">
                <h1 class="judul-hero">Fasilitas MTS DDI Tani Aman</h1>
                <h5>Belajar bukan hanya di kelas — tapi di seluruh sudut sekolah yang dirancang untuk membangkitkan semangat dan kreativitas siswa.</h5> 
            </div>
        </section>
    </header>

    <section class="fasilitas">
        <h1 class="head">Fasilitas</h1>
            <div class="fasilitas-con">
                <div class="fasilitas-card">
                    <h2 class="nama-fasilitas">Masjid</h2>
                    <h3 class="deskripsi-fasilitas">Lorem ipsum sit amet</h3>
                    <img src="" alt="" class="img-fasilitas">
                </div>
                <div class="fasilitas-card">
                    <h2 class="nama-fasilitas">Ruang Kelas</h2>
                    <h3 class="deskripsi-fasilitas">Lorem ipsum sit amet</h3>
                    <img src="../assets/gambar-gallery1.jpeg" alt="masjid" class="img-fasilitas">
                </div>
                <div class="fasilitas-card">
                    <h2 class="nama-fasilitas">Perpustakaan</h2>
                    <h3 class="deskripsi-fasilitas">Lorem ipsum sit amet</h3>
                    <img src="" alt="" class="img-fasilitas">
                </div>
            </div>
    </section>

    <?php include "../includes/footer.php"; ?>

    <script src="../script/script.js"></script>
</body>
</html>