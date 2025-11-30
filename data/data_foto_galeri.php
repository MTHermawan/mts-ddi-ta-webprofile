<?php include_once 'koneksi.php';
include_once 'utility.php';

// Referensi Model Data Foto Galeri
// - id_foto_galeri int (auto increment)
// - judul_foto_galeri string
// - deskripsi_foto_galeri string
// - url_foto string
// - tanggal_posting string
// - email string

$asset_subdir = "galeri/";

// Menambahkan baris data foto galeri baru (CREATE)
function InsertFotoGaleri($judul_foto_galeri, $deskripsi_foto_galeri, $file_foto)
{
    global $koneksi;
    global $asset_subdir;

    // Upload File
    $url_foto = TambahFile($file_foto, $asset_subdir)

    $sql = "INSERT INTO foto_galeri (judul_foto_galeri, deskripsi_foto_galeri, url_foto, email, tanggal_posting) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssss", $judul_foto_galeri, $deskripsi_foto_galeri, $url_foto, $_SESSION['email']);

    // Menarik file kembali jika gagal
    if (!($stmt->execute())) {
        HapusFile($asset_subdir . $file_foto['name']);
        return false;
    }

    return true;
}

// Mendapatkan data foto galeri (READ)
function GetFotoGaleriById($id_foto_galeri)
{
    global $koneksi;

    $data = null;
    $sql = "SELECT * FROM foto_galeri WHERE id_foto_galeri = ?";
    $stmt = $koneksi->prepare($sql);
    
    $stmt->bind_param("i", $id_foto_galeri);
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

function GetAllFotoGaleri($id_foto_galeri = null, $judul_foto_galeri = null, $deskripsi_foto_galeri = null)
{
    global $koneksi;

    $data = [];
    $sql = "SELECT * FROM foto_galeri";
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

// Mendapatkan data Foto Galeri (READ)
function GetFotoGaleri($id_foto_galeri = null, $judul_foto_galeri = null, $deskripsi_foto_galeri = null)
{
    global $koneksi;

    $data = [];
    $sql = "SELECT COUNT(*) as jumlah_data FROM foto_galeri;";
    $result = $koneksi->query($sql);

    $row = $result->fetch_assoc();
    $total_count = (int) $row['jumlah_data'];

    if ($total_count > 250) {
        $conditions = [];
        $params = [];
        $types = "";

        if ($id_foto_galeri !== null) {
            $conditions[] = "id_foto_galeri = ?";
            $params[] = $id_foto_galeri;
            $types .= "i";
        }
        if ($judul_foto_galeri !== null) {
            $conditions[] = "judul_foto_galeri LIKE ?";
            $params[] = "%$judul_foto_galeri%";
            $types .= "s";
        }
        if ($deskripsi_foto_galeri !== null) {
            $conditions[] = "deskripsi_foto_galeri LIKE ?";
            $params[] = "%$deskripsi_foto_galeri%";
            $types .= "s";
        }

        $where_clause = !empty($conditions) ? "WHERE " . implode(" AND ", $conditions) : "";
        $sql = "SELECT * FROM foto_galeri $where_clause ORDER BY tanggal_dibuat DESC";
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
    } else {
        $sql = "SELECT * FROM foto_galeri ORDER BY tanggal_dibuat DESC";
        $result = $koneksi->query($sql);

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $result->close();
        $koneksi->next_result();

        foreach ($data as $key => $foto_galeri) {
            if (($id_foto_galeri !== null && $foto_galeri['id_foto_galeri'] != $id_foto_galeri) ||
                ($judul_foto_galeri !== null && stripos($foto_galeri['judul_foto_galeri'], $judul_foto_galeri) === false) ||
                ($deskripsi_foto_galeri !== null && stripos($foto_galeri['deskripsi_foto_galeri'], $deskripsi_foto_galeri) === false)) {
                unset($data[$key]);
            }
        }
    }

    return $data;
}

function SearchFotoGaleri($keyword)
{
    $data = GetFotoGaleri(judul_foto_galeri: $keyword, deskripsi_foto_galeri: $keyword);
    return $data;
}

// Memperbarui data foto galeri berdasarkan ID (UPDATE)
function UpdateFotoGaleri($id_foto_galeri, $judul_foto_galeri, $deskripsi_foto_galeri, $file_foto)
{
    global $koneksi;
    global $asset_subdir;

    // Mengambil data lama
    if (!($old_data = GetFotoGaleriById($id_foto_galeri)))
        return false;

    // Upload Foto
    $url_foto_baru = TambahFile($file_foto, $asset_subdir)

    $sql = "UPDATE foto_galeri SET judul_foto_galeri = ?, deskripsi_foto_galeri = ?, url_foto = ? WHERE id_foto_galeri = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssi", $judul_foto_galeri, $deskripsi_foto_galeri, $url_foto_baru, $id_foto_galeri);

    // Menarik kembali foto baru jika gagal
    if (!($stmt->execute())) {
        HapusFile($asset_subdir . $file_foto['name']);
        return false;
    }

    // Menghapus foto lama
    HapusFile($old_data['url_foto']);
    return true;
}

// Menghapus baris data foto galeri berdasarkan ID (DELETE)
function DeleteFotoGaleri($id_foto_galeri)
{
    global $koneksi;

    if (!($data = GetFotoGaleriById($id_foto_galeri)))
        return false;

    $sql = "DELETE FROM foto_galeri WHERE id_foto_galeri = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_foto_galeri);

    if (!($stmt->execute()))
        return false;

    // Menghapus gambar jika record berhasil dihapus
    HapusFile($data['url_foto']);
    return true;
}

?>