<?php include_once 'koneksi.php';
include_once 'utility.php';

$asset_subdir = "struktur_organisasi/";

// Menambahkan baris data fasilitas baru (CREATE)
function InsertStrukturOrganisasi($file_foto_arr)
{
    global $koneksi, $asset_subdir;

    $uploaded_files = [];
    $posisi = 1;

    $success = false;
    try {
        // Reorganize files array if needed
        if (isset($file_foto_arr['name']) && is_array($file_foto_arr['name'])) {
            $file_foto_arr = ReorganizeFilesArray($file_foto_arr);
        }

        foreach ($file_foto_arr as $file_foto) {
            if (!isset($file_foto['tmp_name']) || $file_foto['error'] !== UPLOAD_ERR_OK) {
                continue;
            }

            // Upload File
            if (!($url_foto = TambahFile($file_foto, $asset_subdir))) {
                throw new Exception("Gagal mengunggah foto!");
            }
            $uploaded_files[] = $url_foto;

            // Insert foto ke database dengan posisi
            $sql_foto = "INSERT INTO struktur_organisasi (id_struktur_organisasi, url_foto, posisi) VALUES (?, ?, ?)";
            $stmt_foto = $koneksi->prepare($sql_foto);
            $stmt_foto->bind_param("isi", $id_struktur_organisasi, $url_foto, $posisi);
            $stmt_foto->execute();

            $stmt_foto->close();
            $posisi++;
        }

        $success = true;
    } catch (Exception $e) {
        foreach ($uploaded_files as $uploaded_file) {
            HapusFile($uploaded_file);
        }
        SendServerError($e);
    }
    return $success;
}

// Mendapatkan data fasilitas (READ)
function GetStrukturOrganisasi($id = null)
{
    global $koneksi;

    $data = [];

    try {
        $conditions = [];
        $params = [];
        $types = "";

        if ($id !== null) {
            $conditions[] = "id_fasilitas = ?";
            $params[] = $id;
            $types .= "i";
        }

        $where_clause = !empty($conditions) ? "WHERE " . implode(" AND ", $conditions) : "";
        $sql = "SELECT * FROM struktur_organisasi $where_clause ORDER BY posisi DESC";
        $stmt = $koneksi->prepare($sql);

        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $stmt->close();
    } catch (Exception $e) {
        SendServerError($e);
    }

    return $data;
}

// Memperbarui data informasi berdasarkan ID (UPDATE)
function UpdateStrukturOrganisasi($file_foto_arr = [])
{
    global $koneksi, $asset_subdir;

    $uploaded_files = [];
    $posisi = 1;

    $success = false;
    try {
        $old_data = GetStrukturOrganisasi();
        
        if (isset($file_foto_arr['name']) && is_array($file_foto_arr['name'])) {
            $file_foto_arr = ReorganizeFilesArray($file_foto_arr);
        }

        foreach ($file_foto_arr as $file_foto) {
            if (!isset($file_foto['tmp_name']) || $file_foto['error'] !== UPLOAD_ERR_OK) {
                continue;
            }

            // Upload File
            $isFotoExist = false;
            foreach ($old_data as $old_foto) {
                if ($file_foto['name'] == basename($old_foto['url_foto'])) {
                    $uploaded_files[] = $old_foto['url_foto'];
                    if ($old_foto['posisi'] == $posisi) {
                        $isFotoExist = true;
                        break;
                    }

                    $sql = "UPDATE struktur_organisasi SET posisi = ? WHERE id_struktur_organisasi = ?";
                    $stmt = $koneksi->prepare($sql);
                    $stmt->bind_param("ii", $posisi, $id_foto);
                    $stmt->execute();
                    $stmt->close();

                    $sql_decrease = "UPDATE struktur_organisasi SET posisi = posisi - 1 WHERE id_struktur_organisasi = ? AND posisi > ? AND posisi <= ?";
                    $stmt_decrease = $koneksi->prepare($sql_decrease);
                    $max_posisi = max($old_foto['posisi'], $posisi);
                    $min_posisi = min($old_foto['posisi'], $posisi);
                    $stmt_decrease->bind_param("iii", $id_fasilitas, $min_posisi, $max_posisi);
                    $stmt_decrease->execute();
                    $stmt_decrease->close();
                }
            }
            if ($isFotoExist) {
                $posisi++;
                continue;
            }

            // Proses jika foto bukan dari foto lama
            if (!($url_foto = TambahFile($file_foto, $asset_subdir))) {
                throw new Exception("Gagal mengunggah foto!");
            }
            $uploaded_files[] = $url_foto;

            // Insert foto ke database dengan posisi
            $sql_foto = "INSERT INTO struktur_organisasi (id_struktur_organisasi, url_foto, posisi) VALUES (?, ?, ?)";
            $stmt_foto = $koneksi->prepare($sql_foto);
            $stmt_foto->bind_param("isi", $id_struktur_organisasi, $url_foto, $posisi);
            $stmt_foto->execute();

            $stmt_foto->close();
            $posisi++;
        }

        foreach ($old_data as $foto) {
            $skip = false;
            foreach ($uploaded_files as $upload_url) {
                if ($foto['url_foto'] == $upload_url) {
                    $skip = true;
                }
            }
            if ($skip) {
                continue;
            }

            // Menghapus foto lama
            $sql_del_foto = "DELETE FROM struktur_organisasi WHERE id_struktur_organisasi = ?";
            $stmt_del_foto = $koneksi->prepare($sql_del_foto);
            $stmt_del_foto->bind_param("i", $foto['id_struktur_organisasi']);
            $stmt_del_foto->execute();

            HapusFile($foto['url_foto']);
        }

        $success = true;
    } catch (Exception $e) {
        foreach ($uploaded_files as $uploaded_file) {
            HapusFile($uploaded_file);
        }
        SendServerError($e);
    }
    return $success;
}

?>