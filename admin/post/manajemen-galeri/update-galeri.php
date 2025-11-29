<?php include_once "../../../data/data_foto_galeri.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_foto_galeri = htmlspecialchars($_POST['id_foto_galeri']);
    $judul_galeri = htmlspecialchars($_POST['judul_galeri']);
    $deskripsi_galeri = htmlspecialchars($_POST['deskripsi_galeri']);
    $file_foto = $_FILES['foto_galeri'];

    UpdateFotoGaleri($id_foto_galeri, $judul_galeri, $deskripsi_galeri, $file_foto);
}
header('Location: ../../manajemen-galeri.php');

?>