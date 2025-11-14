<?php include_once "../data/koneksi.php";
include_once "../data/data_informasi.php";

$data_agenda = GetAllAgenda();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/agenda.css">
    <link rel="icon" href="../assets/logo-sekolah.png" type="image/png/jpeg/jpg">
</head>

<body>
    <?php include "../includes/site-header.php"; ?>

    <header>
        <?php include "../includes/navbar.php"; ?>

        <section id="hero">
            <div class="hero-content">
                <h1 class="judul-hero">Jadwal Kegiatan MTS DDI Tani Aman </h1>
                <h5>Daftar kegiatan dan jadwal penting yang akan dilaksanakan di MTs DDI Tani Aman, seperti ujian,
                    rapat, peringatan hari besar, serta kegiatan ekstrakurikuler. Informasi ini diperbarui secara
                    berkala agar semua pihak dapat mempersiapkan diri dengan baik..</h5>
            </div>
        </section>
    </header>

    <section class="data-galeri">
        <h1 class="head">Agenda</h1>
        <div class="data-galeri-con">
            <?php foreach ($data_agenda as $agenda) { ?>
                <div class="card">
                    <!-- FOTO -->
                    <?php if (file_exists("../assets/" . $agenda["url_foto"])) { ?>
                        <img src="<?php echo "../assets/" . $agenda["url_foto"]; ?>" alt="" class="img-galeri">
                    <?php } ?>

                    <!-- DETAIL -->
                    <div class="detail">
                        <h1 class="judul"><?php echo $agenda["judul"]; ?></h1>
                        <h3 class="desk"><?php echo $agenda["konten"]; ?></h3>
                        <h3 class="jadwal">Jadwal: <?php echo $agenda["jadwal_agenda"]; ?></h3>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <?php include "../includes/footer.php"; ?>

    <script src="../script/script.js"></script>
</body>

</html>