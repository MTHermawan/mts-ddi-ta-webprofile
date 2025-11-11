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
function InsertGuru($nama, $jabatan, $url_foto, $gelar, $tanggal_dibuat){
    // Ngambil koneksi dari variabel global
    global $koneksi;
    
    // Query, tanda "?" menandakan parameter yang akan di-bind
    $sql = "INSERT INTO guru (nama, jabatan, url_foto, gelar, tanggal_dibuat) VALUES (?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    
    // Data Binding, setiap karakter dalam parameter pertama merupakan tipe data dari masing-masing kolom (s = string, i = integer)
    $stmt->bind_param("sssss", $nama, $jabatan, $url_foto, $gelar, $tanggal_dibuat);
    return $stmt->execute(); 
}

// Mengambil semua data infromasi (READ)
function GetAllInformasi(){
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
function UpdateGuru($id_guru, $nama, $jabatan, $url_foto, $gelar, $tanggal_dibuat){
    global $koneksi;

    $sql = "UPDATE guru SET nama = ?, jabatan = ?, url_foto = ?, gelar = ?, tanggal_dibuat = ? WHERE id_guru = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssssi", $nama, $jabatan, $url_foto, $gelar, $tanggal_dibuat, $id_guru);
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