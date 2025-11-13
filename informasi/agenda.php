<?php include_once "../data/koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="../style/user/style.css">
    <link rel="stylesheet" href="../style/agenda.css">
    <link rel="icon" href="../assets/logo-sekolah.png" type="image/png/jpeg/jpg">
</head>
<body>
    <?php include "../includes/user/site-header.php"; ?>

    <header>
        <?php include "../includes/user/navbar.php"; ?>

        <section id="hero">
            <div class="hero-content">
                <h1 class="judul-hero">Jadwal Kegiatan MTS DDI Tani Aman </h1>
                <h5>Daftar kegiatan dan jadwal penting yang akan dilaksanakan di MTs DDI Tani Aman, seperti ujian, rapat, peringatan hari besar, serta kegiatan ekstrakurikuler. Informasi ini diperbarui secara berkala agar semua pihak dapat mempersiapkan diri dengan baik..</h5> 
            </div>
        </section>
    </header>

    <section class="data-galeri">
        <h1 class="head">Agenda</h1>
            <div class="data-galeri-con">
                <div class="card">
                    <img src="" alt="" class="img-galeri">
                    <div class="detail">                
                        <h1 class="judul">Judul: </h1>
                        <h3 class="desk">Deskripsi: </h3>
                        <h3 class="jadwal">Jadwal: </h3>
                    </div>
                </div>
            </div>
    </section>

    <?php include "../includes/user/footer.php"; ?>

    <script src="../script/user/script.js"></script>
</body>
</html>