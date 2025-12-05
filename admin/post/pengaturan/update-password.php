<?php include_once "../../../data/data_admin.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password_baru']) && isset($_POST['konfirmasi_password'])) {
    $email = $_SESSION['email'];
    $password_baru = $_POST['password_baru'];
    $password_konfirmasi = $_POST['konfirmasi_password'];

    UpdatePassword($password_baru, $password_konfirmasi, $email);

}
header('Location: ../../pengaturan.php');

?>