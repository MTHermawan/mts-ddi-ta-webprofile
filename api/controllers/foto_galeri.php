<?php
if (!defined('IN_API')) {
    http_response_code(403);
    exit("Forbidden");
}

$current_dir = __DIR__;
$project_root = dirname(dirname($current_dir));

include_once $project_root . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'data_foto_galeri.php';
$judul_foto_galeri = $_GET['judul'] ?? null;
$deskripsi_foto_galeri = $_GET['deskripsi'] ?? null;

echo json_encode(GetFotoGaleri(id_foto_galeri: $id_foto_galeri, judul_foto_galeri: $judul_foto_galeri, deskripsi_foto_galeri: $deskripsi_foto_galeri));
?>