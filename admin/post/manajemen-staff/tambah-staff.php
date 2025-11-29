<?php include_once "../../../data/data_staff.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_staff = htmlspecialchars($_POST['nama_staff']);
    $jabatan = htmlspecialchars($_POST['jabatan']);
    $mapel = htmlspecialchars($_POST['mapel']);
    $pendidikan = htmlspecialchars($_POST['pendidikan']);

    if (isset($_FILES['foto_staff']))
        $file_foto = $_FILES['foto_staff'];

    InsertStaff($nama_staff, $jabatan, $mapel, $pendidikan, $file_foto);
}
header('Location: ../../manajemen-guru.php');

?>