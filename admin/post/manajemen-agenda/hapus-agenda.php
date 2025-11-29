<?php include_once "../../../data/data_informasi.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = htmlspecialchars($_POST['id']);

    DeleteAgenda($id);
}
header('Location: ../../manajemen-agenda.php');


?>