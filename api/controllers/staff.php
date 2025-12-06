<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "api_utility.php";
if (!defined('IN_API')) {
    http_response_code(403);
    exit;
}

$current_dir = __DIR__;
$project_root = dirname(dirname($current_dir));

include_once $project_root . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'data_staff.php';
$nama_staff = $_GET['nama'] ?? null;
$jabatan = $_GET['jabatan'] ?? null;
$mapel = $_GET['mapel'] ?? null;
$pendidikan = $_GET['pendidikan'] ?? null;

$search = $_GET['search'] ?? null;
$data = GetStaff(id: $id_staff, nama: $nama_staff, jabatan: $jabatan, mapel: $mapel, pendidikan: $pendidikan, search: $search);
$data = RemoveProperties($data, ["tanggal_dibuat"]);

echo json_encode($data);
?>