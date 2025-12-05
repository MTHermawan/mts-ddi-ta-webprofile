<?php include_once "../../../data/data_agenda.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_agenda = htmlspecialchars($_POST['id_agenda']);
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $lokasi = $_POST['lokasi'];
    $file_foto = $_FILES['foto_agenda'];

    UpdateAgenda($id_agenda, $judul, $deskripsi, $tanggal, $waktu, $lokasi, $file_foto);
}
header('Location: ../../manajemen-agenda.php');

?>