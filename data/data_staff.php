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

    try {
        // Upload File
        $url_foto = TambahFile($file_foto, $asset_subdir);
        
        $sql = "INSERT INTO staff (nama_staff, jabatan, mapel, pendidikan, url_foto, tanggal_dibuat) VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sssss", $nama_staff, $jabatan, $mapel, $pendidikan, $url_foto);
        $stmt->execute();

        return true;
    } catch (Exception $e) {
        SendServerError($e);
        HapusFile($asset_subdir . $file_foto['name']);
        return false;
    }
}

function GetStaff($id = null, $nama = null, $jabatan = null, $mapel = null, $pendidikan = null, $search = null)
{
    global $koneksi;

    try {
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
    
        foreach ($data as $key => $value) {
            if (
                ($id !== null && $value['id_staff'] != $id) ||
                ($nama !== null && stripos($value['nama_staff'], $nama) === false) ||
                ($jabatan !== null && stripos($value['jabatan'], $jabatan) === false) ||
                ($mapel !== null && stripos($value['mapel'], $mapel) === false) ||
                ($pendidikan !== null && stripos($value['pendidikan'], $pendidikan) === false) ||
                ($search !== null &&
                    stripos($value['nama_staff'], $search) === false &&
                    stripos($value['jabatan'], $search) === false &&
                    stripos($value['mapel'], $search) === false &&
                    stripos($value['pendidikan'], $search) === false)
            ) {
                unset($data[$key]);
            }
        }
    
        return $data;
    } catch (Exception $e) {
        SendServerError($e);
        return [];
    }
}

// Memperbarui data informasi berdasarkan ID (UPDATE)
function UpdateStaff($id_staff, $nama_staff, $jabatan, $mapel, $pendidikan, $file_foto)
{
    global $koneksi;
    global $asset_subdir;

    try {
        $old_data = GetStaff(id: $id_staff);
    
        // Mengupload foto
        $url_foto_baru = TambahFile($file_foto, $asset_subdir);
    
        $sql = "UPDATE staff SET nama_staff = ?, jabatan = ?, mapel = ?, pendidikan = ?, url_foto = ? WHERE id_staff = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sssssi", $nama_staff, $jabatan, $mapel, $pendidikan, $url_foto_baru, $id_staff);
        $stmt->execute();
        
        // Menghapus foto lama
        HapusFile($old_data['url_foto']);
        return true;
    } catch (Exception $e) {
        SendServerError($e);
        HapusFile($asset_subdir . $file_foto['name']);
        return false;
    }
}

// Menghapus baris data staff berdasarkan ID (DELETE)
function DeleteStaff($id_staff)
{
    global $koneksi;

    try {
        if (!($data = GetStaff(id: $id_staff)))
            throw new Exception("Data staff tidak ditemukan!");
    
        $sql = "DELETE FROM staff WHERE id_staff = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("i", $id_staff);
        $stmt->execute();
    
        // Menghapus gambar jika record berhasil dihapus
        HapusFile($data["url_foto"]);
        return true;
    } catch (Exception $e) {
        SendServerError($e);
    }
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