<?php include_once 'koneksi.php';
include_once 'utility.php';

// $asset_subdir = "sejarah/";

// Menambahkan baris data sejarah baru (CREATE)
function InsertSejarah($judul_sejarah, $tahun_sejarah, $deskripsi)
{
    global $koneksi;

    $success = false;
    try {
        $sql = "INSERT INTO sejarah (judul_sejarah, tahun_sejarah, deskripsi) VALUES (?, ?, ?)";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sss", $judul_sejarah, $tahun_sejarah, $deskripsi);
        $stmt->execute();

        $success = true;
    } catch (Exception $e) {
        SendServerError($e);
    }
    return $success;
}

function GetSejarah($id_sejarah = null, $judul_sejarah = null, $tahun_sejarah = null, $deskripsi = null, $search = null)
{
    global $koneksi;
    $data = [];

    try {
        $conditions = [];
        $params = [];
        $types = "";

        if ($id_sejarah !== null) {
            $conditions[] = "id_sejarah = ?";
            $params[] = $id_sejarah;
            $types .= "i";
        }
        if ($judul_sejarah !== null) {
            $conditions[] = "judul_sejarah LIKE ?";
            $params[] = "%$judul_sejarah%";
            $types .= "s";
        }
        if ($tahun_sejarah !== null) {
            $conditions[] = "tahun_sejarah LIKE ?";
            $params[] = "%$tahun_sejarah%";
            $types .= "s";
        }
        if ($deskripsi !== null) {
            $conditions[] = "deskripsi LIKE ?";
            $params[] = "%$deskripsi%";
            $types .= "s";
        }

        if ($search !== null) {
            $conditions[] = "(judul_sejarah LIKE ? OR tahun_sejarah LIKE ? OR deskripsi_sejarah LIKE ?)";
            $params[] = "%$search%";
            $params[] = "%$search%";
            $params[] = "%$search%";
            $types .= "sss";
        }

        $where_clause = !empty($conditions)
            ? "WHERE " . implode(" AND ", $conditions)
            : "";

        $sql = "SELECT * FROM sejarah $where_clause";
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
function UpdateSejarah($id_sejarah, $judul_sejarah, $tahun_sejarah, $deskripsi)
{
    global $koneksi;

    $success = false;
    try {
        $sql = "UPDATE sejarah SET judul_sejarah = ?, tahun_sejarah = ?, deskripsi = ? WHERE id_sejarah = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sssi", $judul_sejarah, $tahun_sejarah, $deskripsi, $id_sejarah);
        $stmt->execute();

        $success = true;
    } catch (Exception $e) {
        SendServerError($e);

    }
    return $success;
}

// Menghapus baris data sejarah berdasarkan ID (DELETE)
function DeleteSejarah($id_sejarah)
{
    global $koneksi;

    $success = false;
    try {
        if (!($data = GetSejarah(id_sejarah: $id_sejarah)[0]))
            throw new Exception("Data sejarah tidak ditemukan!");

        $sql = "DELETE FROM sejarah WHERE id_sejarah = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $data['id_sejarah']);
        $stmt->execute();

        $success = true;
    } catch (Exception $e) {
        SendServerError($e);
    }
    return $success;
}
?>