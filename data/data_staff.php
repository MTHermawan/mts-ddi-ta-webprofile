<?php include_once 'koneksi.php';
include_once 'utility.php';

// Referensi Model Data Staff
// - id_staff int (auto increment)
// - nama_staff string
// - jabatan string
// - mapel string
// - url_foto string
// - pendidikan string
// - tanggal_dibuat string

$asset_subdir = "staff/";

// Menambahkan baris data staff baru (CREATE)
function InsertStaff($nama_staff, $jabatan, $mapel, $pendidikan, $file_foto)
{
    global $koneksi;
    global $asset_subdir;

    $success = false;
    try {
        // Upload File
        $url_foto = TambahFile($file_foto, $asset_subdir);

        $sql = "INSERT INTO staff (nama_staff, jabatan, mapel, pendidikan, url_foto, tanggal_dibuat) VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sssss", $nama_staff, $jabatan, $mapel, $pendidikan, $url_foto);
        $stmt->execute();

        $success = true;
    } catch (Exception $e) {
        SendServerError($e);

        // Menarik kembali file 
        HapusFile($asset_subdir . $file_foto['name']);
    }
    return $success;
}

function GetStaff($id = null, $nama = null, $jabatan = null, $mapel = null, $pendidikan = null, $search = null)
{
    global $koneksi;

    $data = [];

    try {
        $conditions = [];
        $params = [];
        $types = "";

        if ($id !== null) {
            $conditions[] = "id_staff = ?";
            $params[] = $id;
            $types .= "i";
        }
        if ($nama !== null) {
            $conditions[] = "nama_staff LIKE ?";
            $params[] = "%$nama%";
            $types .= "s";
        }
        if ($jabatan !== null) {
            $conditions[] = "jabatan LIKE ?";
            $params[] = "%$jabatan%";
            $types .= "s";
        }
        if ($mapel !== null) {
            $conditions[] = "mapel LIKE ?";
            $params[] = "%$mapel%";
            $types .= "s";
        }
        if ($pendidikan !== null) {
            $conditions[] = "pendidikan LIKE ?";
            $params[] = "%$pendidikan%";
            $types .= "s";
        }

        if ($search !== null) {
            $conditions[] = "(nama_staff LIKE ? OR jabatan LIKE ? OR mapel LIKE ? OR pendidikan LIKE ?)";
            $params[] = "%$search%";
            $params[] = "%$search%";
            $params[] = "%$search%";
            $params[] = "%$search%";
            $types .= "ssss";
        }

        $where_clause = !empty($conditions)
            ? "WHERE " . implode(" AND ", $conditions)
            : "";

        $sql = "SELECT * FROM staff $where_clause";
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
function UpdateStaff($id_staff, $nama_staff, $jabatan, $mapel, $pendidikan, $file_foto)
{
    global $koneksi;
    global $asset_subdir;

    $success = false;
    try {
        if (!($old_data = GetStaff(id: $id_staff)[0]))
            throw new Exception("Data staff tidak ditemukan!");

        // Mengupload foto
        $url_foto = $old_data['url_foto'];
        $isDeleteOld = false;
        if (basename($url_foto) != $file_foto['name']) {
            $url_foto = TambahFile($file_foto, $asset_subdir);
            $isDeleteOld = true;
        }

        $sql = "UPDATE staff SET nama_staff = ?, jabatan = ?, mapel = ?, pendidikan = ?, url_foto = ? WHERE id_staff = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sssssi", $nama_staff, $jabatan, $mapel, $pendidikan, $url_foto, $id_staff);
        $stmt->execute();

        // Menghapus foto lama
        if ($isDeleteOld) {
            HapusFile($old_data['url_foto']);
        }

        $success = true;
    } catch (Exception $e) {
        SendServerError($e);

        // Menarik kembali file 
        HapusFile($asset_subdir . $file_foto['name']);
    }
    return $success;
}

// Menghapus baris data staff berdasarkan ID (DELETE)
function DeleteStaff($id_staff)
{
    global $koneksi;

    $success = false;
    try {
        if (!($data = GetStaff(id: $id_staff)[0]))
            throw new Exception("Data staff tidak ditemukan!");

        $sql = "DELETE FROM staff WHERE id_staff = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $data['id_staff']);
        $stmt->execute();
        echo var_dump($data);

        // Menghapus gambar jika record berhasil dihapus
        HapusFile($data['url_foto']);
        $success = true;
    } catch (Exception $e) {
        SendServerError($e);
    }
    return $success;
}

function GetInitialName($nama_staff)
{
    $words = explode(" ", trim($nama_staff));
    $initials = "";

    foreach ($words as $word) {
        if (!empty($word)) {
            $initials .= strtoupper($word[0]);
        }
    }

    return $initials;
}
?>