<?php include_once "../../../data/data_sejarah.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_sejarah = htmlspecialchars($_POST['id_sejarah']);
    $judul_sejarah = $_POST['judul_sejarah'] ?? "";
    $tahun_sejarah = $_POST['tahun_sejarah'] ?? "";
    $deskripsi = $_POST['deskripsi'] ?? "";

    UpdateSejarah($id_sejarah, $judul_sejarah, $tahun_sejarah, $deskripsi);
}
header('Location: ../../manajemen-sejarah.php');

?>