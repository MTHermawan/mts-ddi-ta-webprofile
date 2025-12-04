<?php include_once 'koneksi.php';
include_once 'utility.php';

$asset_subdir = "fasilitas/";

// Menambahkan baris data fasilitas baru (CREATE)
function InsertFasilitas($nama_fasilitas, $deskripsi_fasilitas, $file_fotos)
{
    global $koneksi;
    global $asset_subdir;

    $uploaded_files = [];
    $posisi = 1;

    $success = false;
    try {
        $koneksi->begin_transaction();

        // Insert fasilitas terlebih dahulu
        $sql = "INSERT INTO fasilitas (nama_fasilitas, deskripsi_fasilitas, tanggal_dibuat) VALUES (?, ?, NOW())";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("ss", $nama_fasilitas, $deskripsi_fasilitas);
        $stmt->execute();

        $id_fasilitas = $koneksi->insert_id;

        // Reorganize files array if needed
        if (isset($file_fotos['name']) && is_array($file_fotos['name'])) {
            $file_fotos = ReorganizeFilesArray($file_fotos);
        }

        foreach ($file_fotos as $file_foto) {
            if (!isset($file_foto['tmp_name']) || $file_foto['error'] !== UPLOAD_ERR_OK) {
                continue;
            }

            // Upload File
            if (!($url_foto = TambahFile($file_foto, $asset_subdir))) {
                throw new Exception("Gagal mengunggah foto!");
            }
            $uploaded_files[] = $url_foto;

            // Insert foto ke database dengan posisi
            $sql_foto = "INSERT INTO foto_fasilitas (id_fasilitas, url_foto, posisi) VALUES (?, ?, ?)";
            $stmt_foto = $koneksi->prepare($sql_foto);
            $stmt_foto->bind_param("isi", $id_fasilitas, $url_foto, $posisi);
            $stmt_foto->execute();

            $stmt_foto->close();
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

// Mendapatkan data fasilitas (READ)
function GetFasilitas($id = null, $nama_fasilitas = null, $deskripsi_fasilitas = null, $search = null)
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
        if ($nama_fasilitas !== null) {
            $conditions[] = "nama_fasilitas LIKE ?";
            $params[] = "%$nama_fasilitas%";
            $types .= "s";
        }
        if ($deskripsi_fasilitas !== null) {
            $conditions[] = "deskripsi_fasilitas LIKE ?";
            $params[] = "%$deskripsi_fasilitas%";
            $types .= "s";
        }
        if ($search !== null) {
            $conditions[] = "(nama_fasilitas LIKE ? OR deskripsi_fasilitas LIEK ?)";
            $params[] = "%$nama_fasilitas%";
            $params[] = "%$deskripsi_fasilitas%";
            $types .= "ss";
        }

        $where_clause = !empty($conditions) ? "WHERE " . implode(" AND ", $conditions) : "";
        $sql = "SELECT * FROM fasilitas $where_clause ORDER BY tanggal_dibuat DESC";
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

        $sql_foto = "SELECT * FROM foto_fasilitas WHERE id_fasilitas = ? ORDER BY posisi ASC";
        $stmt_foto = $koneksi->prepare($sql_foto);
        foreach ($data as &$fasilitas) {
            $stmt_foto->bind_param("i", $fasilitas['id_fasilitas']);
            $stmt_foto->execute();
            $result_foto = $stmt_foto->get_result();
            $fasilitas['foto'] = [];
            while ($foto_row = $result_foto->fetch_assoc()) {
                $fasilitas['foto'][] = $foto_row;
            }
        }
        $stmt_foto->close();
        $koneksi->next_result();
    } catch (Exception $e) {
        SendServerError($e);
    }

    return $data;
}

// Memperbarui data informasi berdasarkan ID (UPDATE)
function UpdateFasilitas($id_fasilitas, $nama_fasilitas, $deskripsi_fasilitas, $file_fotos = null)
{
    global $koneksi;
    global $asset_subdir;

    $uploaded_files = [];
    $posisi = 1;

    $success = false;
    try {
        $koneksi->begin_transaction();

        if (!($old_data = GetFasilitas(id: $id_fasilitas)[0]))
            throw new Exception("Data staff tidak ditemukan!");

        // Insert fasilitas terlebih dahulu
        $sql = "UPDATE fasilitas SET nama_fasilitas = ?, deskripsi_fasilitas = ? WHERE id_fasilitas = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sss", $nama_fasilitas, $deskripsi_fasilitas, $id_fasilitas);
        $stmt->execute();

        // Reorganize files array if needed
        if (isset($file_fotos['name']) && is_array($file_fotos['name'])) {
            $file_fotos = ReorganizeFilesArray($file_fotos);
        }

        foreach ($file_fotos as $file_foto) {
            if (!isset($file_foto['tmp_name']) || $file_foto['error'] !== UPLOAD_ERR_OK) {
                continue;
            }

            // Upload File
            $isFotoExist = false;
            foreach ($old_data['foto'] as $old_foto) {
                if ($file_foto['name'] == basename($old_foto['url_foto'])) {
                    $isFotoExist = true;
                    if ($old_foto['posisi'] == $posisi) {
                        break;
                    }

                    UpdatePosisiFoto($old_foto['id_foto_fasilitas'], $posisi);
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
            $sql_foto = "INSERT INTO foto_fasilitas (id_fasilitas, url_foto, posisi) VALUES (?, ?, ?)";
            $stmt_foto = $koneksi->prepare($sql_foto);
            $stmt_foto->bind_param("isi", $id_fasilitas, $url_foto, $posisi);
            $stmt_foto->execute();

            // Menghapus foto lama
            HapusFile($old_data['url_foto']);

            $stmt_foto->close();
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

// Update posisi foto (untuk reorder/sorting)
function UpdatePosisiFoto($id_foto, $posisi)
{
    global $koneksi;

    $success = false;
    try {
        $sql_get = "SELECT * FROM foto_fasilitas WHERE id_foto_fasilitas = ?";
        $stmt_get = $koneksi->prepare($sql_get);
        $stmt_get->bind_param("i", $id_foto);
        $stmt_get->execute();
        $result_get = $stmt_get->get_result();

        if ($result_get->num_rows === 0) {
            return false;
        }

        $row = $result_get->fetch_assoc();
        $old_posisi = $row['posisi'];
        $id_fasilitas = $row['id_fasilitas'];
        $stmt_get->close();

        $sql = "UPDATE foto_fasilitas SET posisi = ? WHERE id_foto_fasilitas = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("ii", $posisi, $id_foto);
        $stmt->execute();
        $stmt->close();

        $sql_decrease = "UPDATE foto_fasilitas SET posisi = posisi - 1 WHERE id_fasilitas = ? AND posisi > ? AND posisi <= ?";
        $stmt_decrease = $koneksi->prepare($sql_decrease);
        $max_posisi = max($old_posisi, $posisi);
        $min_posisi = min($old_posisi, $posisi);
        $stmt_decrease->bind_param("iii", $id_fasilitas, $min_posisi, $max_posisi);
        $stmt_decrease->execute();
        $stmt_decrease->close();

        $success = true;
    } catch (Exception $e) {
        throw $e;
    }

    return $success;
}

// Menghapus baris data fasilitas berdasarkan ID (DELETE)
function DeleteFasilitas($id_fasilitas)
{
    global $koneksi;

    // Get all photos for this fasilitas
    $sql_get_photos = "SELECT url_foto FROM foto_fasilitas WHERE id_fasilitas = ?";
    $stmt_get = $koneksi->prepare($sql_get_photos);
    $stmt_get->bind_param("i", $id_fasilitas);
    $stmt_get->execute();
    $result = $stmt_get->get_result();

    $photos = [];
    while ($row = $result->fetch_assoc()) {
        $photos[] = $row['url_foto'];
    }
    $stmt_get->close();

    // Delete fasilitas
    $sql = "DELETE FROM fasilitas WHERE id_fasilitas = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_fasilitas);

    if (!$stmt->execute()) {
        return false;
    }

    $stmt->close();

    // Delete all associated photos from filesystem
    foreach ($photos as $photo_url) {
        HapusFile($photo_url);
    }

    return true;
}

// Menghapus foto spesifik berdasarkan ID foto
function DeleteFoto($id_foto)
{
    global $koneksi;

    // Get photo URL
    $sql_get = "SELECT url_foto, id_fasilitas FROM foto_fasilitas WHERE id_foto = ?";
    $stmt_get = $koneksi->prepare($sql_get);
    $stmt_get->bind_param("i", $id_foto);
    $stmt_get->execute();
    $result = $stmt_get->get_result();

    if ($result->num_rows === 0) {
        return false;
    }

    $row = $result->fetch_assoc();
    $url_foto = $row['url_foto'];
    $id_fasilitas = $row['id_fasilitas'];
    $stmt_get->close();

    // Delete photo record
    $sql = "DELETE FROM foto_fasilitas WHERE id_foto = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_foto);

    if (!$stmt->execute()) {
        return false;
    }

    $stmt->close();

    // Delete photo file from filesystem
    HapusFile($url_foto);

    // Reorder remaining photos (re-assign posisi sequentially)
    $sql_reorder = "SELECT id_foto FROM foto_fasilitas WHERE id_fasilitas = ? ORDER BY posisi ASC";
    $stmt_reorder = $koneksi->prepare($sql_reorder);
    $stmt_reorder->bind_param("i", $id_fasilitas);
    $stmt_reorder->execute();
    $result_reorder = $stmt_reorder->get_result();

    $new_posisi = 1;
    while ($row_reorder = $result_reorder->fetch_assoc()) {
        $sql_update = "UPDATE foto_fasilitas SET posisi = ? WHERE id_foto = ?";
        $stmt_update = $koneksi->prepare($sql_update);
        $stmt_update->bind_param("ii", $new_posisi, $row_reorder['id_foto']);
        $stmt_update->execute();
        $stmt_update->close();
        $new_posisi++;
    }

    $stmt_reorder->close();

    return true;
}
?>