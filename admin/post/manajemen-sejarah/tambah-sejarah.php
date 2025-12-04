<?php include_once "../../../data/data_sejarah.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = htmlspecialchars($_POST['nama_staff']);
    $tahun = htmlspecialchars($_POST['jabatan']);
    $deskripsi = htmlspecialchars($_POST['mapel']);

    InsertSejarah($judul, $tahun, $deskripsi);
}
header('Location: ../../manajemen-guru.php');

?>