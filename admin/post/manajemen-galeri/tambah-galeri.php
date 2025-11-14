<?php include_once "../../../data/data_foto_galeri.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul_galeri = htmlspecialchars($_POST['judul_galeri']);
    $deskripsi_galeri = htmlspecialchars($_POST['deskripsi_galeri']);
    $file_foto = $_FILES['foto_galeri'];

    InsertFotoGaleri($judul_galeri, $deskripsi_galeri, $file_foto);
}
header('Location: ../../manajemen-galeri.php');

?>