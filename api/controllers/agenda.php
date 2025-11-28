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
$jadwal_agenda_awal = $_GET['jadwal_agenda_awal'] ?? null;
$jadwal_agenda_akhir = $_GET['jadwal_agenda_akhir'] ?? null;

echo json_encode(GetAgenda(id: $id_agenda, judul: $judul, konten: $konten, jadwal_agenda_awal: $jadwal_agenda_awal, jadwal_agenda_akhir: $jadwal_agenda_akhir));
?>