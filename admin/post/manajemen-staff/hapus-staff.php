<?php include_once "../../../data/data_staff.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_staff = htmlspecialchars($_POST['id_staff']);

    DeleteStaff($id_staff);
}
header('Location: ../../manajemen-guru.php');

?>