<?php include_once "../../../data/data_fasilitas.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_fasilitas = htmlspecialchars($_POST['nama_fasilitas']);
    $deskripsi_fasilitas = htmlspecialchars($_POST['nama_pembimbing']);
    $file_foto = $_FILES['foto_fasilitas'];

    InsertFasilitas($nama_fasilitas, $deskripsi_fasilitas, $file_foto);
}
header('Location: ../../manajemen-galeri.php');

?>