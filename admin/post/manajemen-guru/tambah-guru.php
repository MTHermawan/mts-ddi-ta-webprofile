<?php include_once "../../../data/data_guru.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_guru = htmlspecialchars($_POST['nama_guru']);
    $mapel = htmlspecialchars($_POST['mapel']);
    $gelar = htmlspecialchars($_POST['gelar']);
    $file_foto = $_FILES['foto_guru'];

    InsertGuru($nama_guru, $mapel, $gelar, $file_foto);
}
header('Location: ../../manajemen-guru.php');

?>