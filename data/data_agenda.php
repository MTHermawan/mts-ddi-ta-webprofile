<?php include_once 'koneksi.php';
include_once 'utility.php';

$asset_subdir = "informasi/";

// Menambahkan data informasi baru (CREATE)
function InsertAgenda($judul, $deskripsi, $tanggal, $waktu, $lokasi, $file_foto, $email_admin)
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
        
        $sql = "INSERT INTO agenda (id_informasi, tanggal_agenda, waktu_agenda, lokasi_agenda) VALUES (?, ?, ?, ?)";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("isss", $id_informasi, $tanggal, $waktu, $lokasi);
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

function GetAgenda($id_agenda = null, $judul = null, $deskripsi = null, $tanggal = null, $waktu = null, $lokasi = null, $nama_admin = null, $search = null)
{
    global $koneksi;
    $data = [];

    try {
        $conditions = [];
        $params = [];
        $types = "";

        if ($id_agenda !== null) {
            $conditions[] = "id_agenda = ?";
            $params[] = $id_agenda;
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
        if ($tanggal !== null) {
            $conditions[] = "tanggal_agenda LIKE ?";
            $params[] = "%$tanggal%";
            $types .= "s";
        }
        if ($waktu !== null) {
            $conditions[] = "waktu_agenda LIKE ?";
            $params[] = "%$waktu%";
            $types .= "s";
        }
        if ($lokasi !== null) {
            $conditions[] = "lokasi_agenda LIKE ?";
            $params[] = "%$lokasi%";
            $types .= "s";
        }
        if ($nama_admin !== null) {
            $conditions[] = "ad.nama LIKE ?";
            $params[] = "%$nama_admin%";
            $types .= "s";
        }

        if ($search !== null) {
            $conditions[] = "(judul LIKE ? OR deskripsi LIKE ? OR tanggal_agenda LIKE ? OR waktu_agenda LIKE ? OR lokasi_agenda LIKE ? OR ad.nama LIKE ?)";
            $params[] = "%$search%";
            $params[] = "%$search%";
            $params[] = "%$search%";
            $params[] = "%$search%";
            $params[] = "%$search%";
            $params[] = "%$search%";
            $types .= "ssssss";
        }

        $where_clause = !empty($conditions)
            ? "WHERE " . implode(" AND ", $conditions)
            : "";

        $sql = "SELECT 
                    id_agenda, judul, deskripsi, 
                    tanggal_agenda as tanggal, 
                    waktu_agenda as waktu, 
                    lokasi_agenda as lokasi, 
                    tanggal_dibuat, url_foto, 
                    ad.nama as nama_admin 
                FROM agenda as ag
                LEFT JOIN informasi as i ON i.id_informasi = ag.id_informasi 
                LEFT JOIN admin as ad ON i.email_admin = ad.email $where_clause";
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

function UpdateAgenda($id_agenda, $judul, $deskripsi, $tanggal, $waktu, $lokasi, $file_foto)
{
    global $koneksi, $asset_subdir;

    $success = false;
    try {
        if (!($old_data = GetAgenda($id_agenda)[0]))
            throw new Exception("Data agenda tidak ditemukan!");

        $koneksi->begin_transaction();

        // Mengupload foto
        $url_foto = $old_data['url_foto'];
        $isDeleteOld = false;
        if (basename($url_foto) != $file_foto['name']) {
            $url_foto = TambahFile($file_foto, $asset_subdir);
            $isDeleteOld = true;
        }

        $sql = "UPDATE informasi SET judul = ?, deskripsi = ?, url_foto = ?
                WHERE id_informasi IN(SELECT id_informasi FROM agenda WHERE id_agenda = ?)";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sssi", $judul, $deskripsi, $url_foto, $id_agenda);
        $stmt->execute();
        
        $sql = "UPDATE agenda SET tanggal_agenda = ?, waktu_agenda = ?, lokasi_agenda = ? WHERE id_agenda = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sssi", $tanggal, $waktu, $lokasi, $id_agenda);
        $stmt->execute();
        $stmt->close();

        // Menghapus foto lama
        if ($isDeleteOld) {
            HapusFile($old_data['url_foto']);
        }

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

function DeleteAgenda($id_agenda)
{
    global $koneksi;

    $success = false;
    try {
        if (!($data = GetAgenda($id_agenda)[0]))
            throw new Exception("Data agenda tidak ditemukan!");

        $sql = "DELETE FROM informasi WHERE id_informasi IN(SELECT id_informasi FROM agenda WHERE id_agenda = ?)";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $data['id_agenda']);
        $stmt->execute();

        // Menghapus gambar jika record berhasil dihapus
        HapusFile($data['url_foto']);
        $success = true;
    } catch (Exception $e) {
        SendServerError($e);
    }
    return $success;
}

?>