<?php
include_once 'koneksi.php';

// Referensi Model Informasi
// - id_informasi int (auto increment),
// - judul string
// - konten string
// - jadwal_agenda string
// - tanggal_dibuat string
// - url_foto string
// - email_admin string

// -- Fungsi CRUD Informasi --
// Menambahkan data informasi baru (CREATE)
function InsertInformasi($judul, $konten, $jadwal_agenda, $url_foto, $email_admin){
    // Ngambil koneksi dari variabel global
    global $koneksi;
    
    // Query, tanda "?" menandakan parameter yang akan di-bind
    $sql = "INSERT INTO informasi (judul, konten, jadwal_agenda, tanggal_dibuat, url_foto, email_admin) VALUES (?, ?, ?, NOW(), ?, ?)";
    $stmt = $koneksi->prepare($sql);
    
    // Data Binding, setiap karakter dalam parameter pertama merupakan tipe data dari masing-masing kolom (s = string, i = integer)
    $stmt->bind_param("sssss", $judul, $konten, $jadwal_agenda, $url_foto, $email_admin);
    return $stmt->execute(); 
}

// Mengambil semua data infromasi (READ)
function GetAllInformasi(){
    global $koneksi;

    $data = [];
    $sql = "SELECT * FROM informasi";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

// Memperbarui data informasi berdasarkan ID (UPDATE)
function UpdateInformasi($id, $judul, $konten, $jadwal_agenda, $url_foto){
    global $koneksi;

    $sql = "UPDATE informasi SET judul = ?, konten = ?, jadwal_agenda = ?, url_foto = ? WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssssi", $judul, $konten, $jadwal_agenda, $url_foto, $id);
    return $stmt->execute();
}

// Menghapus kolom informasi berdasarkan ID (DELETE)
function DeleteInformasi($id){
    global $koneksi;

    $sql = "DELETE FROM informasi WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
// -- End Fungsi CRUD Informasi --

// -- Fungsi Utilitas Data Informasi --
// Mengambil data informasi berdasarkan ID
function GetInformasiById($id){
    global $koneksi;
    
    $data = null;
    $sql = "SELECT * FROM informasi WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    }

    return $data;
}

// Mengambil semua data berita
function GetAllBerita(){
    global $koneksi;

    $data = [];
    $sql = "SELECT * FROM informasi WHERE jadwal_agenda IS NULL ORDER BY tanggal_dibuat DESC";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

// Mengambil semua data agenda
function GetAllAgenda(){
    global $koneksi;

    $data = [];
    $sql = "SELECT * FROM informasi WHERE jadwal_agenda NOT NULL ORDER BY tanggal_dibuat DESC";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}
// -- End Fungsi Utilitas Data Informasi --
?>