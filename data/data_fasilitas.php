<?php include_once 'koneksi.php';
include_once 'utility.php';

$asset_subdir = "fasilitas/";

// Menambahkan baris data fasilitas baru (CREATE)
function InsertFasilitas($nama_fasilitas, $deskripsi_fasilitas, $file_fotos)
{
    global $koneksi;
    global $asset_subdir;

    // Reorganize files array if needed
    if (isset($file_fotos['name']) && is_array($file_fotos['name'])) {
        $file_fotos = ReorganizeFilesArray($file_fotos);
    }

    // Validasi input file_fotos harus array
    if (!is_array($file_fotos) || empty($file_fotos)) {
        return false;
    }

    // Insert fasilitas terlebih dahulu
    $sql = "INSERT INTO fasilitas (nama_fasilitas, deskripsi_fasilitas, tanggal_dibuat) VALUES (?, ?, NOW())";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ss", $nama_fasilitas, $deskripsi_fasilitas);
    
    if (!$stmt->execute()) {
        return false;
    }

    $id_fasilitas = $koneksi->insert_id;
    $uploaded_files = [];
    $posisi = 1;

    // Loop untuk setiap file foto
    foreach ($file_fotos as $file_foto) {
        // Skip jika file tidak ada atau error
        if (!isset($file_foto['tmp_name']) || $file_foto['error'] !== UPLOAD_ERR_OK) {
            continue;
        }

        // Upload File
        if (!($url_foto = TambahFile($file_foto, $asset_subdir))) {
            // foreach ($uploaded_files as $uploaded_url) {
            //     HapusFile($uploaded_url);
            // }
            
            // Delete fasilitas yang baru dibuat
            $sql_delete = "DELETE FROM fasilitas WHERE id_fasilitas = ?";
            $stmt_delete = $koneksi->prepare($sql_delete);
            $stmt_delete->bind_param("i", $id_fasilitas);
            $stmt_delete->execute();
            return false;
        }

        // Insert foto ke database dengan posisi
        $sql_foto = "INSERT INTO foto_fasilitas (id_fasilitas, url_foto, posisi) VALUES (?, ?, ?)";
        $stmt_foto = $koneksi->prepare($sql_foto);
        $stmt_foto->bind_param("isi", $id_fasilitas, $url_foto, $posisi);
        
        if (!$stmt_foto->execute()) {
            // Jika insert gagal, hapus file yang baru diupload
            HapusFile($url_foto);
            
            // Rollback semua file sebelumnya
            foreach ($uploaded_files as $uploaded_url) {
                HapusFile($uploaded_url);
            }
            
            // Delete fasilitas yang baru dibuat
            $sql_delete = "DELETE FROM fasilitas WHERE id_fasilitas = ?";
            $stmt_delete = $koneksi->prepare($sql_delete);
            $stmt_delete->bind_param("i", $id_fasilitas);
            $stmt_delete->execute();
            
            return false;
        }

        // Tambahkan ke list file yang berhasil diupload
        $uploaded_files[] = $url_foto;
        $stmt_foto->close();
        $posisi++;
    }

    // Hapus data fasilitas jika tidak ada foto yang berhasil diupload
    if (empty($uploaded_files)) {
        $sql_delete = "DELETE FROM fasilitas WHERE id_fasilitas = ?";
        $stmt_delete = $koneksi->prepare($sql_delete);
        $stmt_delete->bind_param("i", $id_fasilitas);
        $stmt_delete->execute();
        return false;
    }

    return true;
}

// Mendapatkan data fasilitas (READ)
function GetFasilitas($id_fasilitas = null, $nama_fasilitas = null)
{
    global $koneksi;

    $data = [];
    $sql = "SELECT COUNT(*) as jumlah_data FROM fasilitas;";
    $result = $koneksi->query($sql);

    $row = $result->fetch_assoc();
    $total_count = (int) $row['jumlah_data'];

    if ($total_count > 250) {
        $conditions = [];
        $params = [];
        $types = "";

        if ($id_fasilitas !== null) {
            $conditions[] = "id_fasilitas = ?";
            $params[] = $id_fasilitas;
            $types .= "i";
        }
        if ($nama_fasilitas !== null) {
            $conditions[] = "nama_fasilitas LIKE ?";
            $params[] = "%$nama_fasilitas%";
            $types .= "s";
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
    } else {
        $sql = "SELECT * FROM fasilitas f ORDER BY f.tanggal_dibuat DESC";
        $result = $koneksi->query($sql);

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $result->close();
        $koneksi->next_result();

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

        foreach ($data as $key => $fasilitas) {
            if (($id_fasilitas !== null && $fasilitas['id_fasilitas'] != $id_fasilitas) ||
                ($nama_fasilitas !== null && stripos($fasilitas['nama_fasilitas'], $nama_fasilitas) === false)) {
                unset($data[$key]);
            }
        }
    }

    return $data;
}

function SearchFasilitas($keyword)
{
    $data = GetFasilitas(nama_fasilitas: $keyword);
    return $data;
}

// Memperbarui data informasi berdasarkan ID (UPDATE)
function UpdateFasilitas($id_fasilitas, $nama_fasilitas, $deskripsi_fasilitas, $file_fotos = null)
{
    global $koneksi;
    global $asset_subdir;

    // Reorganize files array if needed
    if (!empty($file_fotos) && isset($file_fotos['name']) && is_array($file_fotos['name'])) {
        $file_fotos = ReorganizeFilesArray($file_fotos);
    }

    // Mengambil data lama
    if (!GetFasilitas(id_fasilitas: $id_fasilitas)) {
        return false;
    }

    // Update fasilitas info
    $sql = "UPDATE fasilitas SET nama_fasilitas = ?, deskripsi_fasilitas = ? WHERE id_fasilitas = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssi", $nama_fasilitas, $deskripsi_fasilitas, $id_fasilitas);
    
    if (!$stmt->execute()) {
        return false;
    }

    // Jika ada file foto baru, update foto
    if (!empty($file_fotos) && is_array($file_fotos)) {
        $sql_old_photos = "SELECT id_foto, url_foto FROM foto_fasilitas WHERE id_fasilitas = ? ORDER BY posisi ASC";
        $stmt_old = $koneksi->prepare($sql_old_photos);
        $stmt_old->bind_param("i", $id_fasilitas);
        $stmt_old->execute();
        $result_old = $stmt_old->get_result();

        $old_photos = [];
        while ($row = $result_old->fetch_assoc()) {
            $old_photos[] = $row;
            HapusFile($row['url_foto']);
        }
        $stmt_old->close();

        // Delete all old photo records
        $sql_delete_old = "DELETE FROM foto_fasilitas WHERE id_fasilitas = ?";
        $stmt_delete = $koneksi->prepare($sql_delete_old);
        $stmt_delete->bind_param("i", $id_fasilitas);
        $stmt_delete->execute();
        $stmt_delete->close();

        // Upload new files dan insert dengan posisi baru
        $uploaded_files = [];
        $posisi = 1;

        foreach ($file_fotos as $file_foto) {
            // Skip jika file tidak ada atau error
            if (!isset($file_foto['tmp_name']) || $file_foto['error'] !== UPLOAD_ERR_OK) {
                continue;
            }

            // Upload File
            if (!($url_foto_baru = TambahFile($file_foto, $asset_subdir))) {
                // Rollback jika gagal
                // foreach ($uploaded_files as $uploaded_url) {
                //     HapusFile($uploaded_url);
                // }
            }

            // Insert foto ke database dengan posisi
            $sql_foto = "INSERT INTO foto_fasilitas (id_fasilitas, url_foto, posisi) VALUES (?, ?, ?)";
            $stmt_foto = $koneksi->prepare($sql_foto);
            $stmt_foto->bind_param("isi", $id_fasilitas, $url_foto_baru, $posisi);
            
            if (!$stmt_foto->execute()) {
                HapusFile($url_foto_baru);
                foreach ($uploaded_files as $uploaded_url) {
                    HapusFile($uploaded_url);
                }
                return false;
            }

            $uploaded_files[] = $url_foto_baru;
            $stmt_foto->close();
            $posisi++;
        }
    }

    return true;
}

// Update posisi foto (untuk reorder/sorting)
function UpdateFotoPosition($id_foto, $posisi)
{
    global $koneksi;

    $sql_get = "SELECT posisi, id_fasilitas FROM foto_fasilitas WHERE id_foto = ?";
    $stmt_get = $koneksi->prepare($sql_get);
    $stmt_get->bind_param("i", $id_foto);
    $stmt_get->execute();
    $result_get = $stmt_get->get_result();

    if ($result_get->num_rows === 0) {
        return false;
    }

    $row = $result_get->fetch_assoc();
    $current_posisi = $row['posisi'];
    $id_fasilitas = $row['id_fasilitas'];
    $stmt_get->close();

    $sql = "UPDATE foto_fasilitas SET posisi = ? WHERE id_foto = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ii", $posisi, $id_foto);

    if (!$stmt->execute()) {
        return false;
    }

    $stmt->close();

    $sql_decrease = "UPDATE foto_fasilitas SET posisi = posisi - 1 WHERE id_fasilitas = ? AND posisi > ? AND posisi <= ?";
    $stmt_decrease = $koneksi->prepare($sql_decrease);
    $max_posisi = max($current_posisi, $posisi);
    $min_posisi = min($current_posisi, $posisi);
    $stmt_decrease->bind_param("iii", $id_fasilitas, $min_posisi, $max_posisi);
    $stmt_decrease->execute();
    $stmt_decrease->close();

    return true;
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