<?php include_once "../../../data/data_pengaturan.php";

header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");

echo json_encode(GetAllSettings());
?>