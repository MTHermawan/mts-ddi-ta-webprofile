<?php include_once "../../../data/data_ekskul.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_ekskul = htmlspecialchars($_POST['id_ekskul']);

    DeleteEkskul($id_guru);
}

?>