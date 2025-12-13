<?php include_once "../../../data/data_pengaturan.php";
include_once "../../includes/check-auth-func.php";

if (!CheckAuth()) {
  http_response_code(403);
  exit();
}

$response = [];

/* TEXT */
foreach ($_POST as $key => $value) {
  SetSetting($key, $value);
}

foreach ($_FILES as $key => $file) {
  if ($file['error'] === UPLOAD_ERR_OK) {
    SetSetting($key, $file);
  }
}

echo json_encode([
  'status' => 'success',
  'message' => 'Pengaturan berhasil disimpan'
]);
