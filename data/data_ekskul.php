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
function InsertEkskul($nama_ekskul, $nama_pembimbing, $jadwal, $file_fotos)
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

    // Insert ekskul terlebih dahulu
    $sql = "INSERT INTO ekskul (nama_ekskul, nama_pembimbing, jadwal, tanggal_dibuat) VALUES (?, ?, ?, NOW())";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sss", $nama_ekskul, $nama_pembimbing, $jadwal);

    if (!$stmt->execute()) {
        return false;
    }

    $id_ekskul = $koneksi->insert_id;
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
            // Rollback jika gagal
            // foreach ($uploaded_files as $uploaded_url) {
            //     HapusFile($uploaded_url);
            // }

            // Delete ekskul yang baru dibuat
            $sql_delete = "DELETE FROM ekskul WHERE id_ekskul = ?";
            $stmt_delete = $koneksi->prepare($sql_delete);
            $stmt_delete->bind_param("i", $id_ekskul);
            $stmt_delete->execute();
            return false;
        }

        // Insert foto ke database dengan posisi
        $sql_foto = "INSERT INTO foto_ekskul (id_ekskul, url_foto, posisi) VALUES (?, ?, ?)";
        $stmt_foto = $koneksi->prepare($sql_foto);
        $stmt_foto->bind_param("isi", $id_ekskul, $url_foto, $posisi);

        if (!$stmt_foto->execute()) {
            // Jika insert gagal, hapus file yang baru diupload
            HapusFile($url_foto);

            // Rollback semua file sebelumnya
            foreach ($uploaded_files as $uploaded_url) {
                HapusFile($uploaded_url);
            }

            // Delete ekskul yang baru dibuat
            $sql_delete = "DELETE FROM ekskul WHERE id_ekskul = ?";
            $stmt_delete = $koneksi->prepare($sql_delete);
            $stmt_delete->bind_param("i", $id_ekskul);
            $stmt_delete->execute();

            return false;
        }

        // Tambahkan ke list file yang berhasil diupload
        $uploaded_files[] = $url_foto;
        $stmt_foto->close();
        $posisi++;
    }

    $stmt->close();

    // Hapus data ekskul jika tidak ada foto yang berhasil diupload
    if (empty($uploaded_files)) {
        $sql_delete = "DELETE FROM ekskul WHERE id_ekskul = ?";
        $stmt_delete = $koneksi->prepare($sql_delete);
        $stmt_delete->bind_param("i", $id_ekskul);
        $stmt_delete->execute();
        return false;
    }

    return true;
}

function GetEkskul($id = null, $nama_ekskul = null, $nama_pembimbing = null, $jadwal_awal = null, $jadwal_akhir = null)
{
    global $koneksi;

    $data = [];
    $sql = "SELECT COUNT(*) as jumlah_data FROM ekskul;";
    $result = $koneksi->query($sql);

    $row = $result->fetch_assoc();
    $total_count = (int) $row['jumlah_data'];

    if ($total_count > 250) {
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
        if ($jadwal_awal !== null && $jadwal_akhir !== null) {
            $conditions[] = "jadwal BETWEEN ? AND ?";
            $params[] = $jadwal_awal;
            $params[] = $jadwal_akhir;
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
    } else {
        $sql = "SELECT * FROM ekskul e ORDER BY e.tanggal_dibuat DESC";
        $result = $koneksi->query($sql);

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $result->close();
        $koneksi->next_result();

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

        foreach ($data as $key => $ekskul) {
            if (($id !== null && $ekskul['id_ekskul'] != $id) ||
                ($nama_ekskul !== null && stripos($ekskul['nama_ekskul'], $nama_ekskul) === false) ||
                ($nama_pembimbing !== null && stripos($ekskul['nama_pembimbing'], $nama_pembimbing) === false) ||
                ($jadwal_awal !== null && $jadwal_akhir !== null && ($ekskul['jadwal'] < $jadwal_awal || $ekskul['jadwal'] > $jadwal_akhir))) {
                unset($data[$key]);
            }
        }
    }

    return $data;
}

function SearchEkskul($keyword)
{
    $data = GetEkskul(nama_ekskul: $keyword, nama_pembimbing: $keyword);
    return $data;
}

// Memperbarui data ekskul berdasarkan ID (UPDATE)
function UpdateEkskul($id_ekskul, $nama_ekskul, $nama_pembimbing, $jadwal, $file_fotos = null)
{
    global $koneksi;
    global $asset_subdir;

    // Reorganize files array if needed
    if (!empty($file_fotos) && isset($file_fotos['name']) && is_array($file_fotos['name'])) {
        $file_fotos = ReorganizeFilesArray($file_fotos);
    }

    // Mengambil data lama
    if (!GetEkskul(id: $id_ekskul)) {
        return false;
    }

    // Update ekskul info
    $sql = "UPDATE ekskul SET nama_ekskul = ?, nama_pembimbing = ?, jadwal = ? WHERE id_ekskul = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssi", $nama_ekskul, $nama_pembimbing, $jadwal, $id_ekskul);

    if (!$stmt->execute()) {
        return false;
    }

    $stmt->close();

    // Jika ada file foto baru, update foto
    if (!empty($file_fotos) && is_array($file_fotos)) {
        // Get all old photos for this ekskul
        $sql_old_photos = "SELECT id_foto_ekskul, url_foto FROM foto_ekskul WHERE id_ekskul = ? ORDER BY posisi ASC";
        $stmt_old = $koneksi->prepare($sql_old_photos);
        $stmt_old->bind_param("i", $id_ekskul);
        $stmt_old->execute();
        $result_old = $stmt_old->get_result();

        while ($row = $result_old->fetch_assoc()) {
            HapusFile($row['url_foto']);
        }
        $stmt_old->close();

        // Delete all old photo records
        $sql_delete_old = "DELETE FROM foto_ekskul WHERE id_ekskul = ?";
        $stmt_delete = $koneksi->prepare($sql_delete_old);
        $stmt_delete->bind_param("i", $id_ekskul);
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
                // // Rollback jika gagal
                // foreach ($uploaded_files as $uploaded_url) {
                //     HapusFile($uploaded_url);
                // }
            }

            // Insert foto ke database dengan posisi
            $sql_foto = "INSERT INTO foto_ekskul (id_ekskul, url_foto, posisi) VALUES (?, ?, ?)";
            $stmt_foto = $koneksi->prepare($sql_foto);
            $stmt_foto->bind_param("isi", $id_ekskul, $url_foto_baru, $posisi);

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
function UpdateFotoPosition($id_foto_ekskul, $posisi)
{
    global $koneksi;

    $sql = "UPDATE foto_ekskul SET posisi = ? WHERE id_foto_ekskul = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ii", $posisi, $id_foto_ekskul);

    if (!$stmt->execute()) {
        return false;
    }

    $stmt->close();
    return true;
}

// Menghapus baris data ekskul berdasarkan ID (DELETE)
function DeleteEkskul($id_ekskul)
{
    global $koneksi;

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
?>