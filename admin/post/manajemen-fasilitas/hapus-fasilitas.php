<?php include_once "../../../data/data_fasilitas.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_fasilitas = htmlspecialchars($_POST['id_fasilitas']);

    DeleteFasilitas($id_guru);
}
header('Location: ../../manajemen-fasilitas.php');

?>