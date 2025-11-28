<?php
if (!defined('IN_API')) {
    http_response_code(403);
    exit("Forbidden");
}

$current_dir = __DIR__;
$project_root = dirname(dirname($current_dir));

include_once $project_root . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'data_fasilitas.php';
$nama_fasilitas = $_GET['nama_fasilitas'] ?? null;

echo json_encode(GetFasilitas(id_fasilitas: $id_fasilitas, nama_fasilitas: $nama_fasilitas));
?>