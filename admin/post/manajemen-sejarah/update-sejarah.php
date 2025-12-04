<?php include_once "../../../data/data_sejarah.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_sejarah = htmlspecialchars($_POST['id_staff']);
    $judul = htmlspecialchars($_POST['judul']);
    $tahun = htmlspecialchars($_POST['jabatan']);
    $deskripsi = htmlspecialchars($_POST['mapel']);

    UpdateSejarah($id_staff, $nama, $tahun, $deskripsi);
}
header('Location: ../../manajemen-guru.php');

?>