<?php include_once "../../../data/data_staff.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_staff = htmlspecialchars($_POST['id_sejarah']);

    DeleteSejarah($id_staff);
}

?>