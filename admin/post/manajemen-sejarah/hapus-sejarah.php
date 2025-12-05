<?php include_once "../../../data/data_sejarah.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_sejarah = htmlspecialchars($_POST['id_sejarah']);

    DeleteSejarah($id_sejarah);
}
// header('Location: ../../manajemen-sejarah.php');

?>