<?php include_once "../data/koneksi.php";
include_once "../data/data_ekstrakulikuler.php";
include_once "../includes/path.php";

$data_ekskul = GetAllEkstrakurikuler();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekstrakulikuler</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/ekskul.css">
    <link rel="icon" href="../assets/logo-sekolah.png" type="image/png/jpeg/jpg">
</head>

<body>
    <?php include "../includes/site-header.php"; ?>

    <header>
        <?php include "../includes/navbar.php"; ?>

        <section id="hero">
            <div class="hero-content">
                <h1 class="judul-hero">Ekstrakulikuler MTS DDI Tani Aman</h1>
                <h5>Beragam kegiatan ekstrakurikuler tersedia untuk melatih keterampilan, kepemimpinan, dan karakter
                    siswa — dari olahraga, seni, hingga keagamaan.</h5>
            </div>
        </section>
    </header>

    <section class="data-ekskul">
        <h1 class="head">Ekstrakulikuler</h1>
        <div class="data-ekskul-con">
            <?php foreach ($data_ekskul as $ekskul) { ?>
                <div class="card">
                    <!-- JUDUL / NAMA EKSKUL -->
                    <h2 class="nama"><?php echo $ekskul["nama"] ?></h2>

                    <!-- FOTO -->
                    <?php if (file_exists(ASSET_PATH . $ekskul["url_foto"])) { ?>
                        <img src="" alt="" class="img-ekskul">
                    <?php } else { ?>
                        <div class="empty-img-ekskul"></div>
                    <?php } ?>

                    <!-- DETAIL -->
                    <h3 class="pembimbing">Pembimbing: <?php echo $ekskul["nama_pembimbing"] ?> </h3>
                    <h3 class="jadwal">Jadwal: <?php echo $ekskul["jadwal"] ?> </h3>
                </div>
            <?php } ?>
        </div>
    </section>

    <?php include "../includes/footer.php"; ?>

    <script src="../script/user/script.js"></script>
</body>

</html>