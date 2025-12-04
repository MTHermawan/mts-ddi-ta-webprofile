<?php include_once "../../../data/data_agenda.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_agenda = htmlspecialchars($_POST['id_agenda']);

    DeleteAgenda($id_agenda);
}
header('Location: ../../manajemen-agenda.php');


?>