<?php include_once 'koneksi.php';
include_once 'utility.php';

// Referensi Model Data Profil
// - visi string
// - misi string
// - url_foto_struktur string
// - jumlah_siswa int
// - jumlah_guru int
// - jumlah_lulusan int


// Note:
// - Data profil hanya memiliki satu baris data
// - Data hanya dapat diperbarui (UPDATE), tidak dapat ditambah (INSERT) atau dihapus (DELETE)
// - Jika belum ada baris untuk bisa di-UPDATE, maka gunakan query adalah INSERT

function UpdateProfile($visi, $misi, $tujuan, $alamat, $email_sekolah, $url_google_maps, $url_instagram, $url_facebook, $url_youtube, $url_foto_struktur, $jumlah_siswa, $jumlah_guru, $jumlah_lulusan)
{
    global $koneksi;

    // Mengambil data lama
    if (!($old_data = GetProfile()))
        return false;

    if (count($old_data) == 0) {
        // Data belum ada, lakukan INSERT
        $sql = "INSERT INTO profile (visi, misi, tujuan, alamat, email_sekolah, url_google_maps, url_instagram, url_facebook, url_youtube, url_foto_struktur, jumlah_siswa, jumlah_guru, jumlah_lulusan) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
    }
    else {
        $sql = "UPDATE profile SET visi=?, misi=?, tujuan=?, alamat=?, email_sekolah=?, url_google_maps=?, url_instagram=?, url_facebook=?, url_youtube=?, url_foto_struktur=?, jumlah_siswa=?, jumlah_guru=?, jumlah_lulusan=?";
    }
    
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssssssssssss", $visi, $misi, $tujuan, $alamat, $email_sekolah, $url_google_maps, $url_instagram, $url_facebook, $url_youtube, $url_foto_struktur, $jumlah_siswa, $jumlah_guru, $jumlah_lulusan);
    $result = $stmt->execute();
    $stmt->close();

    return $result;
}

function GetProfile()
{
    global $koneksi;

    $data = [];
    $sql = "SELECT * FROM profile";
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

function SetValue($key, $value)
{
    global $koneksi;
    
    try {
        $sql = "SELECT COUNT(*) FROM profile_settings WHERE settings_key = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param('s', $key);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

    } catch (Exception $e) {
        SendServerError($e);
        
    }
}

function UpdateVisiMisi($visi, $misi, $tujuan)
{
    global $koneksi;
    
    try {
        $sql = "INSERT ";
    } catch (Exception $e) {
        SendServerError($e);
        
    }
}

?>