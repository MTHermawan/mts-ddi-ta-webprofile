<?php include_once 'koneksi.php';
include_once 'utility.php';

// Referensi Model Data ekskul
// - id_ekskul int (auto increment)
// - nama_ekskul string
// - nama_pembimbing string
// - jadwal string
// - url_foto string
// - tanggal_dibuat string

$asset_subdir = "ekstrakurikuler/";

// Menambahkan baris data ekskul baru (CREATE)
function InsertEkskul($nama_ekskul, $nama_pembimbing, $jadwal, $file_foto)
{
    global $koneksi;
    global $asset_subdir;

    // Upload File
    if (!($url_foto = TambahFile($file_foto, $asset_subdir)))
        return false;

    $sql = "INSERT INTO ekskul (nama_ekskul, nama_pembimbing, jadwal, url_foto, tanggal_dibuat) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssss", $nama_ekskul, $nama_pembimbing, $jadwal, $url_foto);

    // Menarik file kembali jika gagal
    if (!($stmt->execute())) {
        HapusFile($asset_subdir . $file_foto['name']);
        return false;
    }

    return true;
}

// Mendapatkan data ekskul (READ)
function GetEkskulById($id_ekskul)
{
    global $koneksi;

    $data = null;
    $sql = "SELECT * FROM ekskul WHERE id_ekskul = ?";
    $stmt = $koneksi->prepare($sql);
    
    $stmt->bind_param("i", $id_ekskul);
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

function GetAllEkskul()
{
    global $koneksi;

    $data = [];
    $sql = "SELECT * FROM ekskul";
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

// Memperbarui data ekskul berdasarkan ID (UPDATE)
function UpdateEkskul($id_ekskul, $nama_ekskul, $nama_pembimbing, $jadwal, $file_foto)
{
    global $koneksi;
    global $asset_subdir;

    // Mengambil data lama
    if (!($old_data = GetEkskulById($id_ekskul)))
        return false;

    // Mengupload foto
    if (!($url_foto_baru = TambahFile($file_foto, $asset_subdir)))
        return false;

    $sql = "UPDATE ekskul SET nama_ekskul = ?, nama_pembimbing = ?, jadwal = ?, url_foto = ? WHERE id_ekskul = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssssi", $nama_ekskul, $nama_pembimbing, $jadwal, $url_foto_baru, $id_ekskul);

    // Menarik kembali foto baru jika gagal
    if (!($stmt->execute())) {
        HapusFile($asset_subdir . $file_foto['name']);
        return false;
    }

    // Menghapus foto lama
    HapusFile($old_data['url_foto']);
    return true;
}

// Menghapus baris data ekskul berdasarkan ID (DELETE)
function DeleteEkskul($id_ekskul)
{
    global $koneksi;

    if (!($data = GetEkskulById($id_ekskul)))
        return false;

    $sql = "DELETE FROM ekskul WHERE id_ekskul = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_ekskul);
    if (!($stmt->execute()))
        return false;

    // Menghapus gambar jika record berhasil dihapus
    HapusFile($data['url_foto']);
    return true;
}
?>