<?php include_once "../../../data/data_struktur_organisasi.php";
include_once "../../includes/check-auth-func.php";
if (!CheckAuth()) {
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file_foto = [];
    if (isset($_FILES['foto_struktur'])) {
        $file_foto = $_FILES['foto_struktur'];
    }

    UpdateStrukturOrganisasi($file_foto);
}
header('Location: ../../manajemen-guru.php');

?>