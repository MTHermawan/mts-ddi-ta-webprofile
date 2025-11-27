<?php include_once "../../../data/data_staff.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_staff = htmlspecialchars($_POST['nama_staff']);
    $jabatan = htmlspecialchars($_POST['jabatan']);
    $mapel = htmlspecialchars($_POST['mapel']);
    $pendidikan = htmlspecialchars($_POST['pendidikan']);
    $file_foto = $_FILES['foto_staff'];

    InsertStaff($nama_staff, $jabatan, $mapel, $pendidikan, $file_foto);
}
header('Location: ../../manajemen-guru.php');

?>