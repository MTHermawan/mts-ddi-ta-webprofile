<?php
if (!defined('IN_API')) {
    http_response_code(403);
    exit("Forbidden");
}

$current_dir = __DIR__;
$project_root = dirname(dirname($current_dir));

include_once $project_root . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'data_ekskul.php';
$nama_ekskul = $_GET['nama_ekskul'] ?? null;
$nama_pembimbing = $_GET['nama_pembimbing'] ?? null;
$jadwal_awal = $_GET['jadwal_awal'] ?? null;
$jadwal_akhir = $_GET['jadwal_akhir'] ?? null;

echo json_encode(GetEkskul(id: $id_ekskul, nama_ekskul: $nama_ekskul, nama_pembimbing: $nama_pembimbing, jadwal_awal: $jadwal_awal, jadwal_akhir: $jadwal_akhir));
?>