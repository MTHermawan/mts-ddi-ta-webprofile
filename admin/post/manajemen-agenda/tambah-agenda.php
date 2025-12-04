<?php include_once "../../../data/data_agenda.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = htmlspecialchars($_POST['judul']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $tanggal = htmlspecialchars($_POST['tanggal']);
    $waktu = htmlspecialchars($_POST['waktu']);
    $lokasi = htmlspecialchars($_POST['lokasi']);
    $file_foto = $_FILES['foto_agenda'];
    $email = $_SESSION['email'];

    InsertAgenda($judul, $deskripsi, $tanggal, $waktu, $lokasi, $file_foto, $email);
}
header('Location: ../../manajemen-agenda.php');

?>