<?php include_once "../../../data/data_guru.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_guru = htmlspecialchars($_POST['id_guru']);

    DeleteGuru($id_guru);
}

?>