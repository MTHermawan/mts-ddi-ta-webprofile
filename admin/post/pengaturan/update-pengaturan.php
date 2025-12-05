<?php include_once "../../../data/data_pengaturan.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['key']) && isset($_POST['value'])) {
    $key = $_POST['key'];
    $value = $_POST['value'];

    SetValue($key, $value);
}
header('Location: ../../pengaturan.php');

?>