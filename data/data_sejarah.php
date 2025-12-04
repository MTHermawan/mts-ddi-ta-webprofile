<?php include_once 'koneksi.php';
include_once 'utility.php';

// $asset_subdir = "sejarah/";

// Menambahkan baris data sejarah baru (CREATE)
function InsertSejarah($judul, $tahun, $deskripsi)
{
    global $koneksi;

    $success = false;
    try {
        $sql = "INSERT INTO sejarah (judul, tahun, deskripsi) VALUES (?, ?, ?)";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sss", $judul, $tahun, $deskripsi);
        $stmt->execute();

        $success = true;
    } catch (Exception $e) {
        SendServerError($e);
    }
    return $success;
}

function GetSejarah($id = null, $judul = null, $tahun = null, $deskripsi = null, $search = null)
{
    global $koneksi;
    $data = [];

    try {
        $conditions = [];
        $params = [];
        $types = "";

        if ($id !== null) {
            $conditions[] = "id_sejarah = ?";
            $params[] = $id;
            $types .= "i";
        }
        if ($judul !== null) {
            $conditions[] = "judul LIKE ?";
            $params[] = "%$judul%";
            $types .= "s";
        }
        if ($tahun !== null) {
            $conditions[] = "tahun LIKE ?";
            $params[] = "%$tahun%";
            $types .= "s";
        }
        if ($deskripsi !== null) {
            $conditions[] = "deskripsi LIKE ?";
            $params[] = "%$deskripsi%";
            $types .= "s";
        }

        if ($search !== null) {
            $conditions[] = "(judul LIKE ? OR tahun LIKE ? OR deskripsi LIKE ?)";
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
function UpdateSejarah($id_sejarah, $judul, $tahun, $deskripsi)
{
    global $koneksi;

    $success = false;
    try {
        $sql = "UPDATE sejarah SET judul = ?, tahun = ?, deskripsi = ? WHERE id_sejarah = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sssi", $judul, $tahun, $deskripsi, $id_sejarah);
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
        if (!($data = GetSejarah(id: $id_sejarah)[0]))
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