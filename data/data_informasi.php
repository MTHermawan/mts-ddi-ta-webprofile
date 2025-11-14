<?php include_once 'koneksi.php';
include_once 'utility.php';

// Referensi Model Informasi
// - id_informasi int (auto increment),
// - judul string
// - konten string
// - jadwal_agenda string
// - tanggal_dibuat string
// - url_foto string
// - email_admin string

$asset_subdir = "informasi/";

// Menambahkan data informasi baru (CREATE)
function InsertInformasi($judul, $konten, $file_foto, $jadwal_agenda = null)
{
    global $koneksi;
    global $asset_subdir;

    // Upload File
    if (!($url_foto = TambahFile($file_foto, $asset_subdir)))
        return false;

    $sql = "INSERT INTO informasi (judul, konten, jadwal_agenda, url_foto, email_admin, tanggal_dibuat) VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssss", $judul, $konten, $jadwal_agenda, $url_foto, $_SESSION['email']);

    // Menarik file kembali jika gagal
    if (!($stmt->execute())) {
        HapusFile($asset_subdir . $file_foto['name']);
        return false;
    }

    return true;
}

// Mengambil semua data infromasi (READ)
function GetInformasiById($id)
{
    global $koneksi;

    $data = null;
    $sql = "SELECT * FROM informasi WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id);
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

function GetAllInformasi()
{
    global $koneksi;

    $data = [];
    $sql = "SELECT * FROM informasi";
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

function GetAllBerita()
{
    global $koneksi;

    $data = [];
    $sql = "SELECT * FROM informasi WHERE jadwal_agenda IS NULL ORDER BY tanggal_dibuat DESC";
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

function GetAllAgenda()
{
    global $koneksi;

    $data = [];
    $sql = "SELECT * FROM informasi WHERE jadwal_agenda IS NOT NULL ORDER BY tanggal_dibuat DESC";
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
function UpdateAgenda($id, $judul, $konten, $file_foto, $jadwal_agenda)
{
    global $koneksi;
    global $asset_subdir;

    // Mengambil data lama
    if (!($old_data = GetInformasiById($id)))
        return false;

    // Mengupload foto
    if (!($url_foto_baru = TambahFile($file_foto, $asset_subdir)))
        return false;

    $sql = "UPDATE informasi SET judul = ?, konten = ?, jadwal_agenda = ?, url_foto = ? WHERE id = ? AND jadwal_agenda IS NOT NULL";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssssi", $judul, $konten, $jadwal_agenda, $url_foto_baru, $id);

    // Menarik kembali foto baru jika gagal
    if (!($stmt->execute())) {
        HapusFile($asset_subdir . $file_foto['name']);
        return false;
    }

    // Menghapus foto lama
    HapusFile($old_data['url_foto']);
    return true;
}

function UpdateBerita($id, $judul, $konten, $file_foto)
{
    global $koneksi;
    global $asset_subdir;

    // Mengambil data lama
    if (!($old_data = GetInformasiById($id)))
        return false;

    // Mengupload foto
    if (!($url_foto_baru = TambahFile($file_foto, $asset_subdir)))
        return false;

    $sql = "UPDATE informasi SET judul = ?, konten = ?, url_foto = ? WHERE id = ? AND jadwal_agenda IS NULL";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssi", $judul, $konten, $url_foto_baru, $id);

    // Menarik kembali foto baru jika gagal
    if (!($stmt->execute())) {
        HapusFile($asset_subdir . $file_foto['name']);
        return false;
    }

    // Menghapus foto lama
    HapusFile($old_data['url_foto']);
    return true;
}

// Menghapus kolom informasi berdasarkan ID (DELETE)
function DeleteAgenda($id)
{
    global $koneksi;

    if (!($data = GetInformasiById($id)))
        return false;

    $sql = "DELETE FROM informasi WHERE id = ? AND jadwal_agenda IS NOT NULL";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id);

    if (!($stmt->execute()))
        return false;

    // Menghapus gambar jika record berhasil dihapus
    HapusFile($data["url_foto"]);
    return true;
}

function DeleteBerita($id)
{
    global $koneksi;

    if (!($data = GetInformasiById($id)))
        return false;

    $sql = "DELETE FROM informasi WHERE id = ? AND jadwal_agenda IS NULL";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id);

    if (!($stmt->execute()))
        return false;

    // Menghapus gambar jika record berhasil dihapus
    HapusFile($data["url_foto"]);
    return true;
}

?>