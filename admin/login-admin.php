<?php
session_start();
include_once "../data/koneksi.php";
include_once "../data/data_admin.php";

$data = GetAllAdmin();
$error_message = ''; // Add this variable to store error message

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit_login'])) {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    $akun = GetAdminByUsername($input_username);
    if ($akun && $akun['password'] == $input_password) {
        $_SESSION['email'] = $akun['email'];
        header("Location: ./dashboard.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style/login-admin.css">
</head>

<body>
    <section class="login-sec">
        <div class="img">
            <img src="../assets/admin.png" alt="admin">
        </div>
        <div class="container">
            <h2>Login</h2>

            <form method="POST" action="">
                <div class="input">
                    <label for="input_username">Username</label>
                    <input class="isi" type="text" name="username" id="input_username"
                        value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>">

                    <label for="input_password">Password</label>
                    <input class="isi" type="password" name="password" id="input_password">
                </div>
                <button name="submit_login" type="submit">Login</button>
            </form>
        </div>
    </section>

    <script src="../script/script.js"></script>
</body>

</html>