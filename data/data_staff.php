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

    // Upload File
    if (!($url_foto = TambahFile($file_foto, $asset_subdir)))
        return false;

    $sql = "INSERT INTO staff (nama_staff, jabatan, mapel, pendidikan, url_foto, tanggal_dibuat) VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssss", $nama_staff, $jabatan, $mapel, $pendidikan, $url_foto);

    // Menarik file kembali jika gagal
    if (!($stmt->execute())) {
        echo "Error: " . $stmt->error;
        HapusFile($asset_subdir . $file_foto['name']);
        return false;
    }
    echo "New record created successfully";

    return true;
}

// Mendapatkan data staff (READ)
function GetStaffById($id_staff)
{
    global $koneksi;

    $data = null;
    $sql = "SELECT * FROM staff WHERE id_staff = ?";
    $stmt = $koneksi->prepare($sql);
    
    $stmt->bind_param("i", $id_staff);
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

function GetAllStaff()
{
    global $koneksi;

    $data = [];
    $sql = "SELECT * FROM staff";
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
function UpdateStaff($id_staff, $nama_staff, $jabatan, $mapel, $pendidikan, $file_foto)
{
    global $koneksi;
    global $asset_subdir;

    // Mengambil data lama
    if (!($old_data = GetStaffById($id_staff)))
        return false;

    // Mengupload foto
    if (!($url_foto_baru = TambahFile($file_foto, $asset_subdir)))
        return false;

    $sql = "UPDATE staff SET nama_staff = ?, jabatan = ?, mapel = ?, pendidikan = ?, url_foto = ?, WHERE id_staff = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssssi", $nama_staff, $jabatan, $mapel, $pendidikan, $url_foto_baru, $id_staff);

    // Menarik kembali foto baru jika gagal
    if (!($stmt->execute())) {
        HapusFile($asset_subdir . $file_foto['name']);
        return false;
    }

    // Menghapus foto lama
    HapusFile($old_data['url_foto']);
    return true;
}

// Menghapus baris data staff berdasarkan ID (DELETE)
function DeleteStaff($id_staff)
{
    global $koneksi;

    if (!($data = GetStaffById($id_staff)))
        return false;

    $sql = "DELETE FROM staff WHERE id_staff = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_staff);

    if (!($stmt->execute()))
        return false;

    // Menghapus gambar jika record berhasil dihapus
    HapusFile($data["url_foto"]);
    return true;
}

function GetInitialName($nama_staff) {
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