<?php include_once 'koneksi.php';
include_once 'utility.php';

// Referensi Model Informasi
// - id_informasi int (auto increment),
// - judul string
// - deskripsi string
// - jadwal_agenda string
// - tanggal_dibuat string
// - url_foto string
// - email_admin string

$asset_subdir = "informasi/";

// Menambahkan data informasi baru (CREATE)
function InsertInformasi($judul, $konten, $file_foto, $jadwal_agenda = null)
{
    global $koneksi, $asset_subdir;

    // Upload File
    $url_foto = TambahFile($file_foto, $asset_subdir);

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

function GetInformasi($id_informasi = null, $judul = null, $konten = null, $jadwal_agenda_awal = null, $jadwal_agenda_akhir = null)
{
    global $koneksi;

    $data = [];
    $sql = "SELECT COUNT(*) as jumlah_data FROM informasi;";
    $result = $koneksi->query($sql);

    $row = $result->fetch_assoc();
    $total_count = (int) $row['jumlah_data'];

    if ($total_count > 250) {
        $conditions = [];
        $params = [];
        $types = "";

        if ($id_informasi !== null) {
            $conditions[] = "id = ?";
            $params[] = $id_informasi;
            $types .= "i";
        }
        if ($judul !== null) {
            $conditions[] = "judul LIKE ?";
            $params[] = "%$judul%";
            $types .= "s";
        }
        if ($konten !== null) {
            $conditions[] = "konten LIKE ?";
            $params[] = "%$konten%";
            $types .= "s";
        }
        if ($jadwal_agenda_awal !== null && $jadwal_agenda_akhir !== null) {
            $conditions[] = "jadwal BETWEEN ? AND ?";
            $params[] = $jadwal_agenda_awal;
            $params[] = $jadwal_agenda_akhir;
            $types .= "ss";
        }

        $where_clause = !empty($conditions) ? "WHERE " . implode(" AND ", $conditions) : "";
        $sql = "SELECT * FROM informasi $where_clause ORDER BY tanggal_dibuat DESC";
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
        $sql = "SELECT * FROM informasi ORDER BY tanggal_dibuat DESC";
        $result = $koneksi->query($sql);

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $result->close();
        $koneksi->next_result();

        foreach ($data as $key => $informasi) {
            if (($id_informasi !== null && $informasi['id_informasi'] != $id_informasi) ||
                ($judul !== null && stripos($informasi['judul'], $judul) === false) ||
                ($konten !== null && stripos($informasi['konten'], $konten) === false) ||
                ($jadwal_agenda_awal !== null && $jadwal_agenda_akhir !== null &&
                 (strtotime($informasi['jadwal_agenda']) < strtotime($jadwal_agenda_awal) ||
                  strtotime($informasi['jadwal_agenda']) > strtotime($jadwal_agenda_akhir)))) {
                unset($data[$key]);
            }
        }
    }

    return $data;
}

function GetBerita($id = null, $judul = null, $konten = null)
{
    $data = GetInformasi(id_informasi: $id, judul: $judul, konten: $konten);
    return array_filter($data, function ($item) {
        return is_null($item['jadwal_agenda']);
    });
}

function GetAgenda($id = null, $judul = null, $konten = null, $jadwal_agenda_awal = null, $jadwal_agenda_akhir = null)
{
    $data = GetInformasi(id_informasi: $id, judul: $judul, konten: $konten, jadwal_agenda_awal: $jadwal_agenda_awal, jadwal_agenda_akhir: $jadwal_agenda_akhir);
    return array_filter($data, function ($item) {
        return !is_null($item['jadwal_agenda']);
    });
}

function UpdateBerita($id, $judul, $konten, $file_foto)
{
    global $koneksi, $asset_subdir;

    // Mengambil data lama
    if (!($old_data = GetBerita($id)))
        return false;

    // Mengupload foto
    $url_foto_baru = TambahFile($file_foto, $asset_subdir);

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

function UpdateAgenda($id, $judul, $konten, $jadwal_agenda, $file_foto)
{
    global $koneksi, $asset_subdir;

    // Mengambil data lama
    if (!($old_data = GetAgenda($id)))
        return false;

    // Mengupload foto
    $url_foto_baru = TambahFile($file_foto, $asset_subdir);

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

// Menghapus kolom informasi berdasarkan ID (DELETE)
function DeleteAgenda($id)
{
    global $koneksi;

    if (!($data = GetAgenda($id)))
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

    if (!($data = GetBerita($id)))
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