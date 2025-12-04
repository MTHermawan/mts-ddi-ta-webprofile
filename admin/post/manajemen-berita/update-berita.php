<?php include_once "../../../data/data_berita.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_berita = htmlspecialchars($_POST['id_berita'] ?? -1);
    $judul = htmlspecialchars($_POST['judul'] ?? "");
    $deskripsi = htmlspecialchars($_POST['deskripsi'] ?? "");
    $file_foto = $_FILES['foto_berita'] ?? null;

    UpdateBerita(id_berita: $id_berita, judul: $judul, deskripsi: $deskripsi, file_foto: $file_foto);
}
header('Location: ../../manajemen-berita.php');

?>