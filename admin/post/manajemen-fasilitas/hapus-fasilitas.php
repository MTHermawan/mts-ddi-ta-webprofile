<?php include_once "../../../data/data_fasilitas.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_fasilitas = htmlspecialchars($_POST['id_fasilitas'] ?? -1);

    DeleteFasilitas($id_fasilitas);
}
header('Location: ../../manajemen-fasilitas.php');

?>