<?php include_once "../../../data/data_galeri.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_galeri = htmlspecialchars($_POST['id_galeri']);

    DeleteFotoGaleri($id_galeri);
}
header('Location: ../../manajemen-galeri.php');

?>