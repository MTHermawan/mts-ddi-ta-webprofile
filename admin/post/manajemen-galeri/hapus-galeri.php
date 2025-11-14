<?php include_once "../../../data/data_foto_galeri.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_foto_galeri = htmlspecialchars($_POST['id_foto_galeri']);

    DeleteFotoGaleri($id_foto_galeri);
}
header('Location: ../../manajemen-galeri.php');

?>