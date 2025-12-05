<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once __DIR__ . "/../../data/koneksi.php";
include_once __DIR__ . "/../../data/data_admin.php";
include_once __DIR__ . "/path.php";

// Check if logged in via session
if (!isset($_SESSION['email'])) {
    if (isset($_COOKIE['admin_remember'])) {
        $admin = ValidateRememberToken($_COOKIE['admin_remember']);
        if ($admin) {
            $_SESSION['email'] = $admin['email'];
        } else {
            $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
            header("Location: ./login-admin.php");
            exit();
        }
    } else {
        $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
        header("Location: ./login-admin.php");
        exit();
    }
}

// if (isset($_SESSION['login_success_message'])) {
//     echo `<script>
//             document.addEventListener("DOMContentLoaded", function () {
//                 if (typeof showSuccess === "function") {
//                     showSuccess('`.$_SESSION['login_success_message'].`');
//                 }
//             });
//         </script>`;
//     unset($_SESSION['login_success_message']);
// }
?>