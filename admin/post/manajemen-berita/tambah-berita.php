<?php include_once "../../../data/data_berita.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $file_foto = $_FILES['foto_berita'];
    $email = $_SESSION['email'];

    InsertBerita($judul, $deskripsi, $file_foto, $email);
}
header('Location: ../../manajemen-berita.php');

?>