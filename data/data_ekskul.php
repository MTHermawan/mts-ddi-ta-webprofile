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
// - id_foto int (auto increment)
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

// Mendapatkan data ekskul (READ)
function GetEkskulById($id_ekskul)
{
    global $koneksi;

    $sql = "SELECT * FROM ekskul e 
            LEFT JOIN foto_ekskul foto ON e.id_ekskul = foto.id_ekskul 
            WHERE e.id_ekskul = ? 
            ORDER BY foto.posisi ASC";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_ekskul);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = null;
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    }

    $result->close();
    $stmt->close();

    return $data;
}

function GetAllEkskul()
{
    global $koneksi;

    $data = [];
    $sql = "SELECT * FROM ekskul e 
            LEFT JOIN foto_ekskul foto ON e.id_ekskul = foto.id_ekskul 
            ORDER BY e.tanggal_dibuat DESC, foto.posisi ASC";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $result->close();

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
    if (!GetEkskulById($id_ekskul)) {
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
        $sql_old_photos = "SELECT id_foto, url_foto FROM foto_ekskul WHERE id_ekskul = ? ORDER BY posisi ASC";
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
                // Rollback jika gagal
                foreach ($uploaded_files as $uploaded_url) {
                    HapusFile($uploaded_url);
                }
                return false;
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
function UpdateFotoPosition($id_foto, $posisi)
{
    global $koneksi;

    $sql = "UPDATE foto_ekskul SET posisi = ? WHERE id_foto = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ii", $posisi, $id_foto);
    
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

// Menghapus foto spesifik berdasarkan ID foto
function DeleteFoto($id_foto)
{
    global $koneksi;

    // Get photo URL
    $sql_get = "SELECT url_foto, id_ekskul FROM foto_ekskul WHERE id_foto = ?";
    $stmt_get = $koneksi->prepare($sql_get);
    $stmt_get->bind_param("i", $id_foto);
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
    $sql = "DELETE FROM foto_ekskul WHERE id_foto = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_foto);
    
    if (!$stmt->execute()) {
        return false;
    }

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
        $sql_update = "UPDATE foto_ekskul SET posisi = ? WHERE id_foto = ?";
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