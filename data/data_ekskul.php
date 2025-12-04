<?php include_once 'koneksi.php';
include_once 'utility.php';

$asset_subdir = "ekstrakurikuler/";

// Menambahkan baris data ekskul baru (CREATE)
function InsertEkskul($nama_ekskul, $nama_pembimbing, $jadwal, $file_foto_arr)
{
    global $koneksi, $asset_subdir;
    
    $uploaded_files = [];
    $posisi = 1;
    
    $success = false;
    try {
        $koneksi->begin_transaction();

        // Menambahkan data utama
        $sql = "INSERT INTO ekskul (nama_ekskul, nama_pembimbing, jadwal, tanggal_dibuat) VALUES (?, ?, ?, NOW())";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sss", $nama_ekskul, $nama_pembimbing, $jadwal);
        $stmt->execute();

        $id_ekskul = $koneksi->insert_id;

        // Reorganize files array if needed
        if (isset($file_foto_arr['name']) && is_array($file_foto_arr['name'])) {
            $file_foto_arr = ReorganizeFilesArray($file_foto_arr);
        }
        
        // Loop untuk setiap file foto
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
            $sql = "INSERT INTO foto_ekskul (id_ekskul, url_foto, posisi) VALUES (?, ?, ?)";
            $stmt = $koneksi->prepare($sql);
            $stmt->bind_param("isi", $id_ekskul, $url_foto, $posisi);
            $stmt->execute();

            $stmt->close();
            $posisi++;
        }

        $koneksi->commit();
        $success = true;
    } catch (Exception $e) {
        $koneksi->rollback();
        foreach ($uploaded_files as $uploaded_file) {
            HapusFile($uploaded_file);
        }
        SendServerError($e);
    }

    return $success;
}

function GetEkskul($id = null, $nama_ekskul = null, $nama_pembimbing = null, $search = null)
{
    global $koneksi;

    try {
        $data = [];

        $conditions = [];
        $params = [];
        $types = "";

        if ($id !== null) {
            $conditions[] = "id_ekskul = ?";
            $params[] = $id;
            $types .= "i";
        }
        if ($nama_ekskul !== null) {
            $conditions[] = "nama_ekskul LIKE ?";
            $params[] = "%$nama_ekskul%";
            $types .= "s";
        }
        if ($nama_pembimbing !== null) {
            $conditions[] = "nama_pembimbing LIKE ?";
            $params[] = "%$nama_pembimbing%";
            $types .= "s";
        }
        if ($search !== null) {
            $conditions[] = "(nama_ekskul LIKE ? OR nama_pembimbing LIKE ?)";
            $params[] = "%$search%";
            $params[] = "%$search%";
            $types .= "ss";
        }

        $where_clause = !empty($conditions) ? "WHERE " . implode(" AND ", $conditions) : "";
        $sql = "SELECT * FROM ekskul $where_clause ORDER BY tanggal_dibuat DESC";
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

        $sql_foto = "SELECT * FROM foto_ekskul WHERE id_ekskul = ?";
        $stmt_foto = $koneksi->prepare($sql_foto);

        foreach ($data as &$ekskul) {
            $stmt_foto->bind_param("i", $ekskul['id_ekskul']);
            $stmt_foto->execute();
            $result_foto = $stmt_foto->get_result();
            $ekskul['foto'] = [];
            while ($foto_row = $result_foto->fetch_assoc()) {
                $ekskul['foto'][] = $foto_row;
            }
        }
        $stmt_foto->close();
        $koneksi->next_result();
    }
    catch (Exception $e) {
        SendServerError($e);
    }
    return $data;
}

// Memperbarui data ekskul berdasarkan ID (UPDATE)
function UpdateEkskul($id_ekskul, $nama_ekskul, $nama_pembimbing, $jadwal, $file_foto_arr = null)
{
    global $koneksi, $asset_subdir;

    $uploaded_files = [];
    $posisi = 1;

    $success = false;
    try {
        $koneksi->begin_transaction();
        
        if (!($old_data = GetEkskul(id: $id_ekskul)[0]))
            throw new Exception("Data staff tidak ditemukan!");

        // Update data utama
        $sql = "UPDATE ekskul SET nama_ekskul = ?, nama_pembimbing = ?, jadwal = ? WHERE id_ekskul = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sssi", $nama_ekskul, $nama_pembimbing, $jadwal, $id_ekskul);
        $stmt->execute();

        // Reorganize jika array file
        if (isset($file_foto_arr['name']) && is_array($file_foto_arr['name'])) {
            $file_foto_arr = ReorganizeFilesArray($file_foto_arr);
        }

        
        foreach ($file_foto_arr as $file_foto) {
            if (!isset($file_foto['tmp_name']) || $file_foto['error'] !== UPLOAD_ERR_OK) {
                continue;
            }
            
            // Upload File
            $isFotoExist = false;
            foreach ($old_data['foto'] as $old_foto) {
                if ($file_foto['name'] == basename($old_foto['url_foto'])) {
                    $uploaded_files[] = $old_foto['url_foto'];
                    if ($old_foto['posisi'] == $posisi) {
                        $isFotoExist = true;
                        break;
                    }
                    
                    UpdateFotoEkskul($old_foto['id_foto_ekskul'], $posisi);
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
            $sql_foto = "INSERT INTO foto_ekskul (id_ekskul, url_foto, posisi) VALUES (?, ?, ?)";
            $stmt_foto = $koneksi->prepare($sql_foto);
            $stmt_foto->bind_param("isi", $id_ekskul, $url_foto, $posisi);
            $stmt_foto->execute();

            $stmt_foto->close();
            $posisi++;
        }

        foreach ($old_data['foto'] as $foto) {
            if (in_array($foto, $uploaded_files)) {
                continue;
            }
            
            // Menghapus foto lama
            $sql_del_foto = "DELETE FROM foto_ekskul WHERE id_foto_ekskul = ?";
            $stmt_del_foto = $koneksi->prepare($sql_del_foto);
            $stmt_del_foto->bind_param("i", $foto['id_foto_ekskul']);
            $stmt_del_foto->execute();
            
            HapusFile($foto['url_foto']);
        }

        $koneksi->commit();
        $success = true;
    } catch (Exception $e) {
        $koneksi->rollback();
        foreach ($uploaded_files as $uploaded_file) {
            HapusFile($uploaded_file);
        }
        SendServerError($e);
    }

    return $success;
}

// Menghapus baris data ekskul berdasarkan ID (DELETE)
function DeleteEkskul($id_ekskul)
{
    global $koneksi;

    $success = false;
    try {
        // Get all photos for this ekskul
        $sql_get_photos = "SELECT url_foto FROM foto_ekskul WHERE id_ekskul = ?";
        $stmt_get = $koneksi->prepare($sql_get_photos);
        $stmt_get->bind_param("i", $id_ekskul);
        $stmt_get->execute();
        $result = $stmt_get->get_result();
    
        $photos = [];
        while ($row = $result->fetch_assoc()) {
            $photos[] = $row['url_foto'];
        }
        $stmt_get->close();
    
        // Delete ekskul
        $sql = "DELETE FROM ekskul WHERE id_ekskul = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $id_ekskul);
        $stmt->execute();
    
        $stmt->close();
    
        // Delete all associated photos from filesystem
        foreach ($photos as $photo_url) {
            HapusFile($photo_url);
        }
    
        $success = true;
    } catch (Exception $e) {
        SendServerError($e);
    }
    return $success;
}

// Update posisi foto (untuk reorder/sorting)
function UpdateFotoEkskul($id_foto, $posisi)
{
    global $koneksi;

    $success = false;
    try {
        $sql_get = "SELECT * FROM foto_ekskul WHERE id_foto_ekskul = ?";
        $stmt_get = $koneksi->prepare($sql_get);
        $stmt_get->bind_param("i", $id_foto);
        $stmt_get->execute();
        $result_get = $stmt_get->get_result();

        if ($result_get->num_rows === 0) {
            return false;
        }

        $row = $result_get->fetch_assoc();
        $old_posisi = $row['posisi'];
        $id_ekskul = $row['id_ekskul'];
        $stmt_get->close();

        $sql = "UPDATE foto_ekskul SET posisi = ? WHERE id_foto_ekskul = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("ii", $posisi, $id_foto);
        $stmt->execute();
        $stmt->close();

        $sql_decrease = "UPDATE foto_ekskul SET posisi = posisi - 1 WHERE id_ekskul = ? AND posisi > ? AND posisi <= ?";
        $stmt_decrease = $koneksi->prepare($sql_decrease);
        $max_posisi = max($old_posisi, $posisi);
        $min_posisi = min($old_posisi, $posisi);
        $stmt_decrease->bind_param("iii", $id_ekskul, $min_posisi, $max_posisi);
        $stmt_decrease->execute();
        $stmt_decrease->close();

        $success = true;
    } catch (Exception $e) {
        throw $e;
    }

    return $success;
}

// Menghapus foto spesifik berdasarkan ID foto
function DeleteFotoEkskul($id_foto_ekskul)
{
    global $koneksi;

    $success = false;
    try {
        // Get photo URL
        $sql_get = "SELECT id_ekskul, id_foto_ekskul FROM foto_ekskul WHERE id_foto_ekskul = ?";
        $stmt_get = $koneksi->prepare($sql_get);
        $stmt_get->bind_param("i", $id_foto_ekskul);
        $stmt_get->execute();
        $result = $stmt_get->get_result();
    
        if ($result->num_rows === 0) {
            return false;
        }
    
        $row = $result->fetch_assoc();
        $url_foto = $row['url_foto'];
        $id_ekskul = $row['id_ekskul'];
        $stmt_get->close();
    
        // Delete photo record
        $sql = "DELETE FROM foto_ekskul WHERE id_foto_ekskul = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $id_foto_ekskul);
        $stmt->execute();
    
        $stmt->close();
    
        // Delete photo file from filesystem
        HapusFile($url_foto);
    
        // Reorder remaining photos (re-assign posisi sequentially)
        $sql_reorder = "SELECT id_foto FROM foto_ekskul WHERE id_ekskul = ? ORDER BY posisi ASC";
        $stmt_reorder = $koneksi->prepare($sql_reorder);
        $stmt_reorder->bind_param("i", $id_ekskul);
        $stmt_reorder->execute();
        $result_reorder = $stmt_reorder->get_result();
    
        $new_posisi = 1;
        while ($row_reorder = $result_reorder->fetch_assoc()) {
            $sql_update = "UPDATE foto_ekskul SET posisi = ? WHERE id_foto_ekskul = ?";
            $stmt_update = $koneksi->prepare($sql_update);
            $stmt_update->bind_param("ii", $new_posisi, $row_reorder['id_foto']);
            $stmt_update->execute();
            $stmt_update->close();
            $new_posisi++;
        }
    
        $stmt_reorder->close();
        $success = true;
    } catch (Exception $e) {
        SendServerError($e);
    }
    return $success;
}
?>