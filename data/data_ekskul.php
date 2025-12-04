<?php include_once 'koneksi.php';
include_once 'utility.php';

// Referensi Model Data ekskul
// - id_ekskul int (auto increment)
// - nama_ekskul string
// - nama_pembimbing string
// - jadwal string
// - tanggal_dibuat string
//
// Referensi Model Data foto_ekskul
// - id_foto_ekskul int (auto increment)
// - id_ekskul int (foreign key)
// - url_foto string
// - posisi int

$asset_subdir = "ekstrakurikuler/";

// Menambahkan baris data ekskul baru (CREATE)
function InsertEkskul($nama_ekskul, $nama_pembimbing, $jadwal, $array_file_foto)
{
    global $koneksi;
    global $asset_subdir;

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
        if (isset($array_file_foto['name']) && is_array($array_file_foto['name'])) {
            $array_file_foto = ReorganizeFilesArray($array_file_foto);
        }

        $posisi = 1;
        
        
        // Loop untuk setiap file foto
        foreach ($array_file_foto as $file_foto) {
            throw new Exception("Error Processing Request", 1);
            // Skip jika file tidak ada atau error
            if (!isset($file_foto['tmp_name']) || $file_foto['error'] !== UPLOAD_ERR_OK) {
                continue;
            }

            // Upload File
            $url_foto = TambahFile($file_foto, $asset_subdir);

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

        $where_clause = !empty($conditions) ? "WHERE " . implode(" AND ", $conditions) : "";

        // --- Query utama ekskul
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

        // --- Query foto untuk setiap ekskul
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
    }
    catch (Exception $e) {
        throw $e;
    }
    return $data;
}

// Memperbarui data ekskul berdasarkan ID (UPDATE)
function UpdateEkskul($id_ekskul, $nama_ekskul, $nama_pembimbing, $jadwal, $array_file_foto = null)
{
    global $koneksi, $asset_subdir;

    $success = false;

    try {
        // Ambil data lama
        $old_data = GetEkskul(id: $id_ekskul);
        if (!$old_data)
            throw new Exception("Data ekskul tidak ditemukan!");

        // Ambil semua foto lama
        $sql = "SELECT * FROM foto_ekskul WHERE id_ekskul = ? ORDER BY posisi ASC";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $id_ekskul);
        $stmt->execute();
        $old_foto_result = $stmt->get_result();
        $old_fotos = $old_foto_result->fetch_all(MYSQLI_ASSOC);

        $koneksi->begin_transaction();

        // Update data utama
        $sql = "UPDATE ekskul SET nama_ekskul = ?, nama_pembimbing = ?, jadwal = ? WHERE id_ekskul = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sssi", $nama_ekskul, $nama_pembimbing, $jadwal, $id_ekskul);
        $stmt->execute();

        // Reorganize jika array file
        if (isset($array_file_foto['name']) && is_array($array_file_foto['name'])) {
            $array_file_foto = ReorganizeFilesArray($array_file_foto);
        }

        $posisi = 1;
        $used_old_ids = [];

        foreach ($array_file_foto as $file_foto) {

            // --- Skip jika file kosong / error
            if (!isset($file_foto['tmp_name']) || $file_foto['error'] !== UPLOAD_ERR_OK) {
                continue;
            }

            $file_hash_new = hash_file("sha256", $file_foto['tmp_name']);
            $same_found = false;

            foreach ($old_fotos as $old) {
                $old_path = GetAssetPath($old['url_foto']);

                if (!file_exists($old_path))
                    continue;

                $file_hash_old = hash_file("sha256", $old_path);

                if ($file_hash_new === $file_hash_old) {
                    if (UpdatePosisiFoto($old['id_foto_ekskul'], $posisi)) {
                        $used_old_ids[] = $old['id_foto_ekskul'];
                        $same_found = true;
                        break;
                    } else {
                        throw new Exception("Gagal memperbarui data ekskul saat memperbarui posisi!");
                    }
                }
            }

            if (!$same_found) {
                $url_foto = TambahFile($file_foto, $asset_subdir);

                $sql = "INSERT INTO foto_ekskul (id_ekskul, url_foto, posisi) VALUES (?, ?, ?)";
                $stmt = $koneksi->prepare($sql);
                $stmt->bind_param("isi", $id_ekskul, $url_foto, $posisi);
                $stmt->execute();
            }

            $posisi++;
        }

        foreach ($old_fotos as $old) {
            if (!in_array($old['id_foto_ekskul'], $used_old_ids)) {
                // Hapus file fisik
                $old_path = GetAssetPath($old['url_foto']);
                if (file_exists($old_path))
                    unlink($old_path);

                // Hapus di database
                DeleteFotoEkskul($old['id_foto_ekskul']);
            }
        }

        $koneksi->commit();
        $success = true;

    } catch (Exception $e) {
        $koneksi->rollback();
        SendServerError($e);
    }

    return $success;
}


// Update posisi foto (untuk reorder/sorting)
function UpdatePosisiFoto($id_foto_ekskul, $posisi)
{
    global $koneksi;

    $success = false;
    try {
        $sql = "UPDATE foto_ekskul SET posisi = ? WHERE id_foto_ekskul = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("ii", $posisi, $id_foto_ekskul);
        $stmt->execute();

        $stmt->close();
        $success = true;
    } catch (Exception $e) {
        throw $e;
    }
    return $success;
}

// Fungsi hanya menghapus foto
function DeleteFotoEkskul($id_foto_ekskul)
{
    global $koneksi;

    $success = false;
    try {
        $sql = "DELETE FROM foto_ekskul WHERE id_foto_ekskul = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $id_foto_ekskul);
        $stmt->execute();

        $stmt->close();
        $success = true;
    } catch (Exception $e) {
        throw $e;
    }
    return $success;
}

// Fungsi hanya menghapus foto
function DeleteAllFotoEkskul($id_ekskul)
{
    global $koneksi;

    $success = false;
    try {
        $sql = "DELETE foto_ekskul WHERE id_ekskul = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $id_ekskul);
        $stmt->execute();

        $stmt->close();
        $success = true;
    } catch (Exception $e) {
        throw $e;
    }
    return $success;
}

// Menghapus baris data ekskul berdasarkan ID (DELETE)
function DeleteEkskul($id_ekskul)
{
    global $koneksi;

    $success = false;
    try {
        $koneksi->begin_transaction();

        if (!($data = GetEkskul(id: $id_ekskul)))
            throw new Exception("Data ekskul tidak ditemukan");

        if (!(DeleteAllFotoEkskul($data['id_ekskul']))) {
            throw new Exception("Gagal menghapus foto ekskul");
        }

        // Menghapus data utama
        $sql = "DELETE FROM ekskul WHERE id_ekskul = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $data['id_ekskul']);
        $stmt->execute();
        $stmt->close();

        // Menghapus semua file foto
        foreach ($data['foto'] as $foto) {
            HapusFile($foto['url_foto']);
        }

        $koneksi->commit();
        $success = true;
    } catch (Exception $e) {
        $koneksi->rollback();
        SendServerError($e);
    }

    return $success;
}
?>