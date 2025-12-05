<?php include_once "../../../data/data_sejarah.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul_sejarah = htmlspecialchars($_POST['judul_sejarah']);
    $tahun_sejarah = htmlspecialchars($_POST['tahun_sejarah']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);

    InsertSejarah($judul_sejarah, $tahun_sejarah, $deskripsi);
}
header('Location: ../../manajemen-sejarah.php');

?>