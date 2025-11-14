<?php include_once "../../../data/data_guru.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_guru = htmlspecialchars($_POST['id_guru']);
    $nama_guru = htmlspecialchars($_POST['nama_guru']);
    $mapel = htmlspecialchars($_POST['mapel']);
    $gelar = htmlspecialchars($_POST['gelar']);
    $file_foto = $_FILES['foto_guru'];

    UpdateGuru($id_guru, $nama_guru, $mapel, $gelar, $file_foto);
}
header('Location: ../../manajemen-guru.php');

?>