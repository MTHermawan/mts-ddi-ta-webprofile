<?php include_once "../../../data/data_fasilitas.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_fasilitas = htmlspecialchars($_POST['id_fasilitas'] ?? -1);
    $nama_fasilitas = htmlspecialchars($_POST['nama_fasilitas'] ?? "");
    $deskripsi_fasilitas = htmlspecialchars($_POST['deskripsi_fasilitas'] ?? "");
    $file_foto = [];

    if (isset($_FILES['foto_fasilitas']))
        $file_foto = $_FILES['foto_fasilitas'];

    UpdateFasilitas($id_fasilitas, $nama_fasilitas, $deskripsi_fasilitas, $file_foto);
}
header('Location: ../../manajemen-fasilitas.php');

?>