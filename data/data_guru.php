<?php
include_once 'koneksi.php';

// Referensi Model Data Guru
// - id_guru int (auto increment)
// - nama string
// - jabatan string
// - url_foto string
// - gelar string
// - tanggal_dibuat string

// Menambahkan data informasi baru (CREATE)
function InsertGuru($nama, $jabatan, $gelar, $url_foto){
    // Ngambil koneksi dari variabel global
    global $koneksi;
    
    // Query, tanda "?" menandakan parameter yang akan di-bind
    $sql = "INSERT INTO guru (nama, jabatan, gelar, url_foto, tanggal_dibuat) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $koneksi->prepare($sql);
    
    // Data Binding, setiap karakter dalam parameter pertama merupakan tipe data dari masing-masing kolom (s = string, i = integer)
    $stmt->bind_param("ssss", $nama, $jabatan, $url_foto, $gelar);
    return $stmt->execute(); 
}

// Mengambil semua data infromasi (READ)
function GetAllGuru(){
    global $koneksi;

    $data = [];
    $sql = "SELECT * FROM guru";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

// Memperbarui data informasi berdasarkan ID (UPDATE)
function UpdateGuru($id_guru, $nama, $jabatan, $gelar, $url_foto){
    global $koneksi;

    $sql = "UPDATE guru SET nama = ?, jabatan = ?, gelar = ?, url_foto = ?, WHERE id_guru = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssssi", $nama, $jabatan, $gelar, $url_foto, $id_guru);
    return $stmt->execute();
}

// Menghapus kolom informasi berdasarkan ID (DELETE)
function DeleteGuru($id_guru){
    global $koneksi;

    $sql = "DELETE FROM guru WHERE id_guru = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_guru);
    return $stmt->execute();
}
?>