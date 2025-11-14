<?php include_once 'koneksi.php';
include_once 'utility.php';

// Referensi Model Data Fasilitas
// - id_fasilitas int (auto increment)
// - nama_fasilitas string
// - url_foto string
// - deskripsi_fasilitas string
// - tanggal_dibuat string

$asset_dir = "fasilitas/";

// Menambahkan baris data fasilitas baru (CREATE)
function InsertFasilitas($nama_fasilitas, $deskripsi_fasilitas, $file_foto)
{
    global $koneksi;
    global $asset_subdir;

    // Upload File
    if (!($url_foto = TambahFile($file_foto, $asset_subdir)))
        return false;

    $sql = "INSERT INTO fasilitas (nama_fasilitas, url_foto, deskripsi_fasilitas, tanggal_dibuat) VALUES (?, ?, ?, NOW())";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sss", $nama_fasilitas, $url_foto, $deskripsi_fasilitas);
    
    // Menarik file kembali jika gagal
    if (!($stmt->execute())) {
        HapusFile($asset_subdir . $file_foto['name']);
        return false;
    }

    return true;
}

// Mendapatkan data fasilitas (READ)
function GetFasilitasById($id_fasilitas)
{
    global $koneksi;

    $data = null;
    $sql = "SELECT * FROM fasilitas WHERE id_fasilitas = ?";
    $stmt = $koneksi->prepare($sql);
    
    $stmt->bind_param("i", $id_fasilitas);
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

function GetAllFasilitas()
{
    global $koneksi;

    $data = [];
    $sql = "SELECT * FROM fasilitas";
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
function UpdateFasilitas($id_fasilitas, $nama_fasilitas, $deskripsi_fasilitas, $file_foto)
{
    global $koneksi;
    global $asset_subdir;

    // Mengambil data lama
    if (!($old_data = GetFasilitasById($id_fasilitas)))
        return false;

    // Upload Foto
    if (!($url_foto_baru = TambahFile($file_foto, $asset_subdir)))
        return false;

    $sql = "UPDATE fasilitas SET nama_fasilitas = ?, url_foto = ?, deskripsi_fasilitas = ?, tanggal_dibuat = ? WHERE id_fasilitas = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssi", $nama_fasilitas, $url_foto_baru, $deskripsi_fasilitas, $id_fasilitas);
    
    // Menarik kembali foto baru jika gagal
    if (!($stmt->execute())) {
        HapusFile($asset_subdir . $file_foto['name']);
        return false;
    }

    // Menghapus foto lama
    HapusFile($old_data['url_foto']);
    return true;
}

// Menghapus baris data fasilitas berdasarkan ID (DELETE)
function DeleteFasilitas($id_fasilitas)
{
    global $koneksi;

    if (!($data = GetFasilitasById($id_fasilitas)))
        return false;

    $sql = "DELETE FROM fasilitas WHERE id_fasilitas = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_fasilitas);
    
    if (!($stmt->execute()))
        return false;

    // Menghapus gambar jika record berhasil dihapus
    HapusFile($data['url_foto']);
    return true;
}