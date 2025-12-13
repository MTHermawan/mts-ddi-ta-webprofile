<?php include_once "../../../data/data_admin.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth()) {
    http_response_code(403);
    exit();
}

$status = 'error';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password_baru']) && isset($_POST['konfirmasi_password'])) {
    $email = $_SESSION['email'];
    $password_baru = $_POST['password_baru'];
    $password_konfirmasi = $_POST['konfirmasi_password'];

    if (strlen($password_baru) < 6) {
        $message = "Password harus lebih dari 6 karakter!";
    }
    else if (strcmp($password_baru, $password_konfirmasi) != 0) {
        $message = "Konfirmasi password tidak cocok!";
    } else if (UpdatePassword($password_baru, $password_konfirmasi, $email)) {
        $status = "success";
        $message = "Berhasil memperbarui password!";
    } else {
        $message = "Gagal memperbarui password!";
    }

}

echo json_encode([
    'status' => $status,
    'message' => $message
]);


?>