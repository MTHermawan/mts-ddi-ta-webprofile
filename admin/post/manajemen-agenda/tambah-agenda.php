<?php include_once "../../../data/data_informasi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = htmlspecialchars($_POST['judul']);
    $konten = htmlspecialchars($_POST['konten']);
    $jadwal_agenda = htmlspecialchars($_POST['jadwal_agenda']);
    $file_foto = $_FILES['foto_informasi'];

    InsertInformasi($judul, $konten, $file_foto, $jadwal_agenda);
}

?>