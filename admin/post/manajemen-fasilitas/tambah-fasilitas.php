<?php include_once "../../../data/data_fasilitas.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_fasilitas = htmlspecialchars($_POST['nama_fasilitas']);
    $deskripsi_fasilitas = htmlspecialchars($_POST['deskripsi_fasilitas']);
    $file_foto = $_FILES['foto_fasilitas'];

    InsertFasilitas($nama_fasilitas, $deskripsi_fasilitas, $file_foto);
}
header('Location: ../../manajemen-fasilitas.php');

?>