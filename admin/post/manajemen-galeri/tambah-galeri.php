<?php include_once "../../../data/data_galeri.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul_galeri = htmlspecialchars($_POST['judul_galeri']);
    $deskripsi_galeri = htmlspecialchars($_POST['deskripsi_galeri']);
    $file_foto = $_FILES['foto_galeri'];

    InsertGaleri($judul_galeri, $deskripsi_galeri, $file_foto);
}
header('Location: ../../manajemen-galeri.php');

?>