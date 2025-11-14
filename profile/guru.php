<?php include_once "../data/koneksi.php";
include_once "../data/data_guru.php";

$data_guru = GetAllGuru();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/guru.css">
    <link rel="icon" href="../assets/logo-sekolah.png" type="image/png/jpeg/jpg">
</head>

<body>
    <?php include "../includes/site-header.php"; ?>

    <header>
        <?php include "../includes/navbar.php"; ?>

        <section id="hero">
            <div class="hero-content">
                <h1 class="judul-hero">Pengajar MTS DDI Tani Aman </h1>
                <h5>Kami percaya, guru adalah teladan. Karena itu, kami memilih dan mengembangkan guru yang tidak hanya
                    pintar, tapi juga bijak dan penuh kasih sayang.</h5>
            </div>
        </section>
    </header>

    <section class="data-guru">
        <h1 class="head">Data Guru</h1>
        <div class="data-guru-con">
            <?php foreach ($data_guru as $guru) { ?>
                <div class="card">
                    <!-- NAMA dan MAPEL/JABATAN -->
                    <h2 class="nama"><?php echo $guru["nama"]; ?></h2>
                    <h3 class="mapel"><?php echo $guru["jabatan"]; ?></h3>

                    <!-- FOTO -->
                     
                    <?php if (file_exists("../assets/" . $guru['url_foto'])) { ?>
                        <img src="<?php echo "../assets/" . $guru['url_foto']; ?>" alt="" class="img-guru">
                    <?php } else { ?>
                        <div class="empty-img-guru"></div>
                    <?php } ?>

                    <!-- GELAR -->
                    <h3 class="gelar"><?php echo $guru["gelar"]; ?></h3>
                </div>
            <?php } ?>
            <div class="card">
                <h2 class="nama">nama</h2>
                <h3 class="mapel">Matematika</h3>
                <img src="" alt="" class="img-guru">
                <h3 class="gelar">[Gelar]</h3>
            </div>
        </div>
    </section>

    <?php include "../includes/footer.php"; ?>

    <script src="../script/script.js"></script>
</body>

</html>