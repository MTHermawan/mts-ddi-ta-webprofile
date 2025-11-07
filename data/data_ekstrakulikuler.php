<?php
include_once 'koneksi.php';

// Referensi Model Data Ekstrakulikuler
// - id_ekstrakulikuler int (auto increment)
// - nama string
// - nama_pembimbing string
// - jadwal string
// - url_foto string
// - tanggal_dibuat string

// Menambahkan data informasi baru (CREATE)
function InsertEkstrakurikuler($nama, $nama_pembimbing, $jadwal, $url_foto, $tanggal_dibuat){
    // Ngambil koneksi dari variabel global
    global $koneksi;
    
    // Query, tanda "?" menandakan parameter yang akan di-bind
    $sql = "INSERT INTO ekstrakurikuler (nama, nama_pembimbing, jadwal, url_foto, tanggal_dibuat) VALUES (?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    
    // Data Binding, setiap karakter dalam parameter pertama merupakan tipe data dari masing-masing kolom (s = string, i = integer)
    $stmt->bind_param("sssss", $nama, $nama_pembimbing, $jadwal, $url_foto, $tanggal_dibuat);
    return $stmt->execute(); 
}

// Mengambil semua data infromasi (READ)
function GetAllInformasi(){
    global $koneksi;

    $data = [];
    $sql = "SELECT * FROM ekstrakurikuler";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

// Memperbarui data informasi berdasarkan ID (UPDATE)
function UpdateEktrakurikuler($id_ekstrakurikuler, $nama, $nama_pembimbing, $jadwal, $url_foto, $tanggal_dibuat){
    global $koneksi;

    $sql = "UPDATE ekstrakurikuler SET nama = ?, nama_pembimbing = ?, jadwal = ?, url_foto = ?, tanggal_dibuat = ? WHERE id_ekstrakurikuler = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssssi", $nama, $nama_pembimbing, $jadwal, $url_foto, $tanggal_dibuat, $id_ekstrakurikuler);
    return $stmt->execute();
}

// Menghapus kolom informasi berdasarkan ID (DELETE)
function DeleteEkstrakurikuler($id_ekstrakurikuler){
    global $koneksi;

    $sql = "DELETE FROM ekstrakurikuler WHERE id_ekstrakurikuler = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_ekstrakurikuler);
    return $stmt->execute();
}

?>