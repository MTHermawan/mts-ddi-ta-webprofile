<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once __DIR__ . "/../../data/koneksi.php";
include_once __DIR__ . "/../../data/data_admin.php";
include_once __DIR__ . "/path.php";

function CheckAuth()
{
    if (isset($_SESSION['admin_email'])) {
        return true;
    }
    
    return isset($_COOKIE['admin_remember']) && ValidateRememberToken($_COOKIE['admin_remember']);
}
?>