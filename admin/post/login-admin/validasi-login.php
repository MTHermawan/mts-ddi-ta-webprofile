<?php include_once "../../../data/data_admin.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $input_email = htmlspecialchars($_POST['email']);
    $input_password = htmlspecialchars($_POST['password']);

    if ($data = ValidasiLogin($input_email, $input_password)) {
        $_SESSION['email'] = $data['email'];
        header("Location: ../../halaman-utama.php");
    }
    else
    {
        header("Location: ../../login-admin.php");
    }
}

?>