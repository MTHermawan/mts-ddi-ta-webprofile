<?php include_once 'koneksi.php';
include_once 'utility.php';

$asset_subdir = "galeri/";

// Menambahkan baris data foto galeri baru (CREATE)
function InsertGaleri($judul_galeri, $deskripsi_galeri, $file_foto)
{
    global $koneksi, $asset_subdir;

    $success = false;
    try {
        // Upload File
        $url_foto = TambahFile($file_foto, $asset_subdir);

        $sql = "INSERT INTO galeri (judul_galeri, deskripsi_galeri, url_foto, email, tanggal_posting) VALUES (?, ?, ?, ?, NOW())";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("ssss", $judul_galeri, $deskripsi_galeri, $url_foto, $_SESSION['email']);
        $stmt->execute();

        $success = true;
    } catch (Exception $e) {
        // Menarik kembali file
        HapusFile($asset_subdir . $file_foto['name']);
        SendServerError($e);
    }
    return $success;
}

// Mendapatkan data galeri (READ)
function GetGaleri($id_galeri, $judul_galeri = null, $deskripsi_galeri = null, $search = null)
{
    global $koneksi;
    $data = [];

    try {
        $conditions = [];
        $params = [];
        $types = "";

        if ($id_galeri !== null) {
            $conditions[] = "id_galeri = ?";
            $params[] = $id_galeri;
            $types .= "i";
        }
        if ($judul_galeri !== null) {
            $conditions[] = "judul_galeri LIKE ?";
            $params[] = "%$judul_galeri%";
            $types .= "s";
        }
        if ($deskripsi_galeri !== null) {
            $conditions[] = "deskripsi_galeri LIKE ?";
            $params[] = "%$deskripsi_galeri%";
            $types .= "s";
        }
        if ($search !== null) {
            $conditions[] = "(judul_galeri LIKE ? OR deskripsi_galeri LIKE ?)";
            $params[] = "%$search%";
            $params[] = "%$search%";
            $types .= "ss";
        }

        $where_clause = !empty($conditions) ? "WHERE " . implode(" AND ", $conditions) : "";
        $sql = "SELECT * FROM galeri $where_clause ORDER BY tanggal_posting DESC";
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
        $koneksi->next_result();
    } catch (Exception $e) {
        SendServerError($e);
    }
    return $data;
}

// Memperbarui data foto galeri berdasarkan ID (UPDATE)
function UpdateFotoGaleri($id_galeri, $judul_galeri, $deskripsi_galeri, $file_foto)
{
    global $koneksi, $asset_subdir;

    $success = false;
    try {
        // Mengambil data lama
        if (!($old_data = GetGaleri($id_galeri)))
            throw new Exception("Data foto galeri tidak ditemukan!");

        // Upload Foto
        $url_foto_baru = TambahFile($file_foto, $asset_subdir);

        $sql = "UPDATE galeri SET judul_galeri = ?, deskripsi_galeri = ?, url_foto = ? WHERE id_galeri = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sssi", $judul_galeri, $deskripsi_galeri, $url_foto_baru, $id_galeri);
        $stmt->execute();

        // Menghapus foto lama
        HapusFile($old_data['url_foto']);
        $success = true;
    } catch (Exception $e) {
        SendServerError($e);

        // Menarik kembali foto baru jika gagal
        HapusFile($asset_subdir . $file_foto['name']);
    }
    return $success;
}

// Menghapus baris data foto galeri berdasarkan ID (DELETE)
function DeleteFotoGaleri($id_galeri)
{
    global $koneksi;

    $success = false;
    try {
        if (!($data = GetGaleri(id_galeri: $id_galeri)))
            throw new Exception("Data galeri tidak ditemukan");

        $sql = "DELETE FROM galeri WHERE id_galeri = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $id_galeri);

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