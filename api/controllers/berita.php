<?php
if (!defined('IN_API')) {
    http_response_code(403);
    exit("Forbidden");
}

$current_dir = __DIR__;
$project_root = dirname(dirname($current_dir));

include_once $project_root . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'data_berita.php';
include_once $project_root . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'data_admin.php';
$judul = $_GET['judul'] ?? null;
$deskripsi = $_GET['deskripsi'] ?? null;
$nama_admin = $_GET['nama_admin'] ?? null;
$search = $_GET['search'] ?? null;

echo json_encode(GetBerita($id_berita, $judul, $deskripsi, $nama_admin, $search));
?>