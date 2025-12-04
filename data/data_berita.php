<?php include_once 'koneksi.php';
include_once 'utility.php';

$asset_subdir = "informasi/";

// Menambahkan data informasi baru (CREATE)
function InsertBerita($judul, $deskripsi, $file_foto, $email_admin)
{
    global $koneksi, $asset_subdir;

    $success = false;
    try {
        $koneksi->begin_transaction();
        // Upload File
        $url_foto = TambahFile($file_foto, $asset_subdir);

        $sql = "INSERT INTO informasi (judul, deskripsi, url_foto, email_admin) VALUES (?, ?, ?, ?)";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("ssss", $judul, $deskripsi, $url_foto, $email_admin);
        $stmt->execute();
        $stmt->close(); 
        
        $id_informasi = $koneksi->insert_id;
        
        $sql = "INSERT INTO berita (id_informasi, pinned) VALUES (?, 0)";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $id_informasi);
        $stmt->execute();
        $stmt->close(); 

        $koneksi->commit(); 
        $success = true;
    } catch (Exception $e) {
        $koneksi->rollback(); 

        // Menarik kembali file 
        HapusFile($asset_subdir . $file_foto['name']);
        SendServerError($e);
    }
    return $success;
}

function GetBerita($id_berita = null, $judul = null, $deskripsi = null, $nama_admin = null, $search = null)
{
    global $koneksi;
    $data = [];

    try {
        $conditions = [];
        $params = [];
        $types = "";

        if ($id_berita !== null) {
            $conditions[] = "id_berita = ?";
            $params[] = $id_berita;
            $types .= "i";
        }
        if ($judul !== null) {
            $conditions[] = "judul LIKE ?";
            $params[] = "%$judul%";
            $types .= "s";
        }
        if ($deskripsi !== null) {
            $conditions[] = "deskripsi LIKE ?";
            $params[] = "%$deskripsi%";
            $types .= "s";
        }
        if ($nama_admin !== null) {
            $conditions[] = "a.nama LIKE ?";
            $params[] = "%$nama_admin%";
            $types .= "s";
        }

        if ($search !== null) {
            $conditions[] = "(judul LIKE ? OR deskripsi LIKE ? OR a.nama LIKE ?)";
            $params[] = "%$search%";
            $params[] = "%$search%";
            $params[] = "%$search%";
            $types .= "sss";
        }

        $where_clause = !empty($conditions)
            ? "WHERE " . implode(" AND ", $conditions)
            : "";

        $sql = "SELECT id_berita, judul, deskripsi, tanggal_dibuat, url_foto, a.nama as nama_admin, pinned FROM berita as b 
                LEFT JOIN informasi as i ON i.id_informasi = b.id_informasi 
                LEFT JOIN admin as a ON i.email_admin = a.email $where_clause";
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

function UpdateBerita($id_berita, $judul, $deskripsi, $file_foto)
{
    global $koneksi, $asset_subdir;

    $success = false;
    try {
        if (!($old_data = GetBerita($id_berita)[0]))
            throw new Exception("Data berita tidak ditemukan!");

        // Mengupload foto
        $url_foto = $old_data['url_foto'];
        $isDeleteOld = false;
        if (basename($url_foto) != $file_foto['name']) {
            $url_foto = TambahFile($file_foto, $asset_subdir);
            $isDeleteOld = true;
        }

        $sql = "UPDATE informasi SET judul = ?, deskripsi = ?, url_foto = ?
                WHERE id_informasi IN(SELECT id_informasi FROM berita WHERE id_berita = ?)";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sssi", $judul, $deskripsi, $url_foto, $id_berita);
        $stmt->execute();

        // Menghapus foto lama
        if ($isDeleteOld) {
            HapusFile($old_data['url_foto']);
        }

        $success = true;
    } catch (Exception $e) {
        // Menarik kembali file 
        HapusFile($asset_subdir . $file_foto['name']);
        SendServerError($e);

    }
    return $success;
}

function DeleteBerita($id_berita)
{
    global $koneksi;

    $success = false;
    try {
        if (!($data = GetBerita($id_berita)[0]))
            throw new Exception("Data berita tidak ditemukan!");

        $sql = "DELETE FROM informasi WHERE id_informasi IN(SELECT id_informasi FROM berita WHERE id_berita = ?)";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $data['id_berita']);
        $stmt->execute();

        // Menghapus gambar jika record berhasil dihapus
        HapusFile($data['url_foto']);
        $success = true;
    } catch (Exception $e) {
        SendServerError($e);
    }
    return $success;
}

function UpdateBeritaUtama($id_berita)
{
    global $koneksi;

    $success = false;
    try {
        $koneksi->begin_transaction();
        if (!($newBeritaUtama = GetBerita($id_berita)[0]))
            throw new Exception("Data berita tidak ditemukan!");

        $sql = "UPDATE berita SET pinned = 0 WHERE NOT id_berita = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $newBeritaUtama['id_berita']);
        $stmt->execute();

        $sql = "UPDATE berita SET pinned = 1 WHERE id_berita = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $newBeritaUtama['id_berita']);
        $stmt->execute();

        $koneksi->commit();
        $success = true;
    } catch (Exception $e) {
        $koneksi->rollback();
        SendServerError($e);

    }
    return $success;
}

?>