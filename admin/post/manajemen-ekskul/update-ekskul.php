<?php include_once "../../../data/data_ekskul.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_ekskul = htmlspecialchars($_POST['id_ekskul'] ?? -1);
    $nama_ekskul = $_POST['nama_ekskul'] ?? "";
    $nama_pembimbing = $_POST['nama_pembimbing'] ?? "";
    $jadwal = $_POST['jadwal'] ?? "";
    $file_foto = $_FILES['foto_ekskul'] ?? [];

    UpdateEkskul($id_ekskul, $nama_ekskul, $nama_pembimbing, $jadwal, $file_foto);
}
header('Location: ../../manajemen-ekstrakurikuler.php');

?>