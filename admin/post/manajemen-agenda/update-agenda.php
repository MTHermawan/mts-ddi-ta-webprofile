<?php include_once "../../../data/data_informasi.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = htmlspecialchars($_POST['id']);
    $judul = htmlspecialchars($_POST['judul']);
    $konten = htmlspecialchars($_POST['konten']);
    $jadwal_agenda = htmlspecialchars($_POST['jadwal_agenda']);
    $file_foto = $_FILES['foto_informasi'];

    UpdateAgenda($id, $judul, $konten, $file_foto, $jadwal_agenda);
}
header('Location: ../../manajemen-agenda.php');

?>