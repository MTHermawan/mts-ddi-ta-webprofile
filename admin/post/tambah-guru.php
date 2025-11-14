<?php include_once "../../data/koneksi.php";
include_once "../../data/data_guru.php";
include_once "../../data/utility.php";
include_once "../includes/path.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_guru = htmlspecialchars($_POST['nama']);
    $jabatan = htmlspecialchars($_POST['jabatan']);
    $gelar = htmlspecialchars($_POST['gelar']);
    $file_foto = $_FILES['foto_guru'];

    InsertGuru($nama_guru, $jabatan, $gelar, $file_foto);

}
// echo "<script>window.location.href='../manajemen-guru.php';</script>";

?>