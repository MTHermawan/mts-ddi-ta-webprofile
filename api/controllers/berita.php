<?php
if (!defined('IN_API')) {
    http_response_code(403);
    exit("Forbidden");
}

$current_dir = __DIR__;
$project_root = dirname(dirname($current_dir));

include_once $project_root . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'data_informasi.php';
$judul = $_GET['nama'] ?? null;
$konten = $_GET['jabatan'] ?? null;

echo json_encode(GetBerita(id: $id_berita, judul: $judul, konten: $konten));
?>