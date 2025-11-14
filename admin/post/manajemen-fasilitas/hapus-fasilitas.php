<?php include_once "../../../data/data_fasilitas.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_fasilitas = htmlspecialchars($_POST['id_fasilitas']);

    DeleteFasilitas($id_guru);
}

?>