<?php include_once 'koneksi.php';
include_once 'utility.php';

$asset_subdir = "pengaturan/";

// Menambahkan baris data fasilitas baru (CREATE)
function SetSetting($key, $value)
{
    global $koneksi;

    $success = false;
    try {
        $sql_check = "SELECT setting_value FROM pengaturan WHERE setting_key = ?";
        $stmt_check = $koneksi->prepare($sql_check);
        $stmt_check->bind_param("s", $key);
        $stmt_check->execute();
        $result = $stmt_check->get_result();


        $stmt_check->close();

        $success = true;
    } catch (Exception $e) {
        SendServerError($e);
    }

    return $success;
}

// Menambahkan baris data fasilitas baru (CREATE)
function GetSetting($key)
{
    global $koneksi;

    $value = null;
    try {
        $sql_check = "SELECT setting_value FROM pengaturan WHERE setting_key = ?";
        $stmt_check = $koneksi->prepare($sql_check);
        $stmt_check->bind_param("s", $key);
        $stmt_check->execute();
        $result = $stmt_check->get_result();

        if ($row = $result->fetch_assoc()) {
            $value = $row['setting_value'];
        }
        $stmt_check->close();
    } catch (Exception $e) {
        SendServerError($e);
    }

    return $value;
}

?>