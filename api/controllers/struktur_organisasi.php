<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "api_utility.php";
if (!defined('IN_API')) {
    http_response_code(403);
    exit("Forbidden");
}

$current_dir = __DIR__;
$project_root = dirname(dirname($current_dir));

include_once $project_root . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'data_struktur_organisasi.php';
$data = GetStrukturOrganisasi();
$data = RemoveProperties($data, ["tanggal_dibuat"]);

echo json_encode($data);
?>