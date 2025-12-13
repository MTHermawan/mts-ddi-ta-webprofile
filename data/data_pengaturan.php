<?php include_once 'koneksi.php';
include_once 'utility.php';

$asset_subdir = "pengaturan/";

// Menambahkan baris data fasilitas baru (CREATE)
function SetSetting($key, $value) {
  global $koneksi, $asset_subdir;

  $foto_baru = "";
  
  try {
      $old_value = GetSetting($key);
      
      if (is_array($value) && isset($value['tmp_name'])) {
        $value = TambahFile($value, $asset_subdir);
        $foto_baru = $value;
      }
    
      $stmt = $koneksi->prepare("
        INSERT INTO pengaturan (setting_key, setting_value)
        VALUES (?, ?)
        ON DUPLICATE KEY UPDATE setting_value = VALUES(setting_value)
      ");
      $stmt->bind_param("ss", $key, $value);
      $stmt->execute();

      if ($foto_baru && $old_value)
      {
        HapusFile($old_value);
      }
  } catch (Exception $e) {
      HapusFile($foto_baru);
      SendServerError($e);
  }

}



// Menambahkan baris data fasilitas baru (CREATE)
function GetSetting($key)
{
    global $koneksi;

    $sql = "SELECT setting_value FROM pengaturan WHERE setting_key = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("s", $key);
    $stmt->execute();
    $result = $stmt->get_result();

    $value = null;
    if ($row = $result->fetch_assoc()) {
        $value = $row['setting_value'];
    }

    $stmt->close();
    return $value;
}

// Menambahkan baris data fasilitas baru (CREATE)
function GetAllSettings()
{
    global $koneksi;

    $sql = "SELECT setting_key, setting_value FROM pengaturan";
    $stmt = $koneksi->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    $value = null;
    while ($row = $result->fetch_assoc()) {
        $value[$row['setting_key']] = $row['setting_value'];
    }

    $stmt->close();
    return $value;
}

?>