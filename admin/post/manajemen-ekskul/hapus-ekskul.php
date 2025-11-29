<?php include_once "../../../data/data_ekskul.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_ekskul = htmlspecialchars($_POST['id_ekskul']);

    DeleteEkskul($id_guru);
}
header('Location: ../../manajemen-ekskul.php');

?>