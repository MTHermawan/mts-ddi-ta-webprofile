<?php
session_start();
include_once "../data/data_admin.php";

LogoutAdmin();

header("Location: ./login-admin.php");
exit();
?>