<?php
include_once 'koneksi.php';

// Referensi Model Data ekstrakurikuler
// - id_ekstrakurikuler int (auto increment)
// - nama string
// - nama_pembimbing string
// - jadwal string
// - url_foto string
// - tanggal_dibuat string

$asset_subdir = "ekstrakurikuler/";

// Menambahkan baris data ekstrakurikuler baru (CREATE)
function InsertEkstrakurikuler($nama, $nama_pembimbing, $jadwal, $file_foto)
{
    global $koneksi;
    global $asset_subdir;

    // Upload File
    if (!($url_foto = TambahFile($file_foto, $asset_subdir)))
        return false;

    $sql = "INSERT INTO ekstrakurikuler (nama, nama_pembimbing, jadwal, url_foto, tanggal_dibuat) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssss", $nama, $nama_pembimbing, $jadwal, $url_foto);

    // Menarik file kembali jika gagal
    if (!($stmt->execute())) {
        HapusFile($asset_subdir . $file_foto['name']);
        return false;
    }

    return true;
}

// Mendapatkan data ekstrakurikuler (READ)
function GetEkstrakurikulerById($id_ekstrakurikuler)
{
    global $koneksi;

    $data = null;
    $sql = "SELECT * FROM ekstrakurikuler WHERE id_ekstrakurikuler = ?";
    $stmt = $koneksi->prepare($sql);
    
    $stmt->bind_param("i", $id_ekstrakurikuler);
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

function GetAllEkstrakurikuler()
{
    global $koneksi;

    $data = [];
    $sql = "SELECT * FROM ekstrakurikuler";
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

// Memperbarui data ekstrakurikuler berdasarkan ID (UPDATE)
function UpdateEkstrakurikuler($id_ekstrakurikuler, $nama, $nama_pembimbing, $jadwal, $file_foto)
{
    global $koneksi;
    global $asset_subdir;

    // Mengambil data lama
    if (!($old_data = GetEkstrakurikulerById($id_ekstrakurikuler)))
        return false;

    // Mengupload foto
    if (!($url_foto_baru = TambahFile($file_foto, $asset_subdir)))
        return false;

    $sql = "UPDATE ekstrakurikuler SET nama = ?, nama_pembimbing = ?, jadwal = ?, url_foto = ? WHERE id_ekstrakurikuler = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssssi", $nama, $nama_pembimbing, $jadwal, $url_foto_baru, $id_ekstrakurikuler);

    // Menarik kembali foto baru jika gagal
    if (!($stmt->execute())) {
        HapusFile($asset_subdir . $file_foto['name']);
        return false;
    }

    // Menghapus foto lama
    HapusFile($old_data['url_foto']);
    return true;
}

// Menghapus baris data ekstrakurikuler berdasarkan ID (DELETE)
function DeleteEkstrakurikuler($id_ekstrakurikuler)
{
    global $koneksi;

    if (!($data = GetEkstrakurikulerById($id_ekstrakurikuler)))
        return false;

    $sql = "DELETE FROM ekstrakurikuler WHERE id_ekstrakurikuler = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_ekstrakurikuler);
    if (!($stmt->execute()))
        return false;

    // Menghapus gambar jika record berhasil dihapus
    HapusFile($data['url_foto']);
    return true;
}
?>