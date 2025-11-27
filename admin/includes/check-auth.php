<?php if (session_status() == PHP_SESSION_NONE) { session_start(); }
include_once __DIR__ . "/../../data/koneksi.php";
include_once __DIR__ . "/../../data/data_admin.php";

// Check if logged in via session
if (!isset($_SESSION['admin_email'])) {
    // Check if remember token exists
    if (isset($_COOKIE['admin_remember'])) {
        $admin = ValidateRememberToken($_COOKIE['admin_remember']);
        if ($admin) {
            $_SESSION['email'] = $admin['email'];
        } else {
            // Invalid token, redirect to login
            header("Location: ./login-admin.php");
            exit();
        }
    } else {
        // Not logged in, redirect to login
        header("Location: ./login-admin.php");
        exit();
    }
}
?>