<?php
if (!defined('IN_API')) {
    http_response_code(403);
    exit;
}

$current_dir = __DIR__;
$project_root = dirname(dirname($current_dir));

include_once $project_root . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'data_galeri.php';
$judul_galeri = $_GET['judul'] ?? null;
$deskripsi_galeri = $_GET['deskripsi'] ?? null;
$search = $_GET['search'] ?? null;

echo json_encode(value: GetGaleri(id_galeri: $id_galeri, judul_galeri: $judul_galeri, deskripsi_galeri: $deskripsi_galeri, search: $search));
?>