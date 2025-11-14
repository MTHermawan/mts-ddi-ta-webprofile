<?php include_once 'koneksi.php';
include_once 'utility.php';

// Referensi Model Data Guru
// - id_guru int (auto increment)
// - nama string
// - jabatan string
// - url_foto string
// - gelar string
// - tanggal_dibuat string

$asset_subdir = "guru/";

// Menambahkan baris data guru baru (CREATE)
function InsertGuru($nama, $jabatan, $gelar, $file_foto)
{
    global $koneksi;
    global $asset_subdir;

    // Upload File
    if (!($url_foto = TambahFile($file_foto, $asset_subdir)))
        return false;

    $sql = "INSERT INTO guru (nama, jabatan, gelar, url_foto, tanggal_dibuat) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssss", $nama, $jabatan, $gelar, $url_foto);

    // Menarik file kembali jika gagal
    if (!($stmt->execute())) {
        HapusFile($asset_subdir . $file_foto['name']);
        return false;
    }

    return true;
}

// Mendapatkan data guru (READ)
function GetGuruById($id_guru)
{
    global $koneksi;

    $data = null;
    $sql = "SELECT * FROM guru WHERE id_guru = ?";
    $stmt = $koneksi->prepare($sql);
    
    $stmt->bind_param("i", $id_guru);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        while ($result->fetch_assoc()) {
        }

        $result->close();
        $koneksi->next_result();
    }

    return $data;
}

function GetAllGuru()
{
    global $koneksi;

    $data = [];
    $sql = "SELECT * FROM guru";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        
        $result->close();
        $koneksi->next_result();
    }

    return $data;
}

// Memperbarui data informasi berdasarkan ID (UPDATE)
function UpdateGuru($id_guru, $nama, $jabatan, $gelar, $file_foto)
{
    global $koneksi;
    global $asset_subdir;

    // Mengambil data lama
    if (!($old_data = GetGuruById($id_guru)))
        return false;

    // Mengupload foto
    if (!($url_foto_baru = TambahFile($file_foto, $asset_subdir)))
        return false;

    $sql = "UPDATE guru SET nama = ?, jabatan = ?, gelar = ?, url_foto = ?, WHERE id_guru = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssDssi", $nama, $jabatan, $gelar, $url_foto_baru, $id_guru);

    // Menarik kembali foto baru jika gagal
    if (!($stmt->execute())) {
        HapusFile($asset_subdir . $file_foto['name']);
        return false;
    }

    // Menghapus foto lama
    HapusFile($old_data['url_foto']);
    return true;
}

// Menghapus baris data guru berdasarkan ID (DELETE)
function DeleteGuru($id_guru)
{
    global $koneksi;

    if (!($data = GetGuruById($id_guru)))
        return false;

    $sql = "DELETE FROM guru WHERE id_guru = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_guru);

    if (!($stmt->execute()))
        return false;

    // Menghapus gambar jika record berhasil dihapus
    HapusFile($data["url_foto"]);
    return true;
}
?>