<?php include_once "../../../data/data_guru.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_guru = htmlspecialchars($_POST['id_guru']);
    $nama_guru = htmlspecialchars($_POST['nama']);
    $jabatan = htmlspecialchars($_POST['jabatan']);
    $gelar = htmlspecialchars($_POST['gelar']);
    $file_foto = $_FILES['foto_guru'];

    UpdateGuru($id_guru, $nama_guru, $jabatan, $gelar, $file_foto);
}

?>