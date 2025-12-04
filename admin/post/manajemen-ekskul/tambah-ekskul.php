<?php include_once "../../../data/data_ekskul.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_ekskul = htmlspecialchars($_POST['nama_ekskul'] ?? "");
    $nama_pembimbing = htmlspecialchars($_POST['nama_pembimbing'] ?? "");
    $jadwal = htmlspecialchars($_POST['jadwal'] ?? "");
    $file_foto = $_FILES['foto_ekskul'] ?? [];

    InsertEkskul($nama_ekskul, $nama_pembimbing, $jadwal, $file_foto);
}
header('Location: ../../manajemen-ekstrakurikuler.php');

?>