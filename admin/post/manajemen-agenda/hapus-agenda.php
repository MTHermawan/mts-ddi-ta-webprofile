<?php include_once "../../../data/data_ekskul.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = htmlspecialchars($_POST['id']);

    DeleteAgenda($id);
}

?>