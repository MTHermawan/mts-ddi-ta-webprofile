<?php include_once "../../../data/data_informasi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = htmlspecialchars($_POST['id']);

    DeleteAgenda($id);
}
header('Location: ../../manajemen-agenda.php');


?>