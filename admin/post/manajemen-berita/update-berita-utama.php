<?php include_once "../../../data/data_berita.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth())
{
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_berita = htmlspecialchars($_POST['id_berita']);

    UpdateBeritaUtama($id_berita);
}
header('Location: ../../manajemen-berita.php');

?>