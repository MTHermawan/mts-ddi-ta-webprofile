<?php
include_once 'koneksi.php';

// Referensi Model Data Guru
// - id_fasilitas int (auto increment)
// - nama_fasilitas string
// - url_foto string
// - deskripsi_fasilitas string
// - tanggal_dibuat string

// Menambahkan data informasi baru (CREATE)
function InsertFasilitas($nama_fasilitas, $url_foto, $deskripsi_fasilitas, $tanggal_dibuat){
    // Ngambil koneksi dari variabel global
    global $koneksi;
    
    // Query, tanda "?" menandakan parameter yang akan di-bind
    $sql = "INSERT INTO fasilitas (nama_fasilitas, url_foto, deskripsi_fasilitas, tanggal_dibuat) VALUES (?, ?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    
    // Data Binding, setiap karakter dalam parameter pertama merupakan tipe data dari masing-masing kolom (s = string, i = integer)
    $stmt->bind_param("ssss", $nama_fasilitas, $url_foto, $deskripsi_fasilitas, $tanggal_dibuat);
    return $stmt->execute(); 
}

// Mengambil semua data infromasi (READ)
function GetAllFasilitas(){
    global $koneksi;

    $data = [];
    $sql = "SELECT * FROM fasilitas";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

// Memperbarui data informasi berdasarkan ID (UPDATE)
function UpdateFasilitas($id_fasilitas, $nama_fasilitas, $url_foto, $deskripsi_fasilitas, $tanggal_dibuat){
    global $koneksi;

    $sql = "UPDATE fasilitas SET nama_fasilitas = ?, url_foto = ?, deskripsi_fasilitas = ?, tanggal_dibuat = ? WHERE id_fasilitas = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssssi", $nama_fasilitas, $url_foto, $deskripsi_fasilitas, $tanggal_dibuat, $id_fasilitas);
    return $stmt->execute();
}

// Menghapus kolom informasi berdasarkan ID (DELETE)
function DeleteFasilitas($id_fasilitas){
    global $koneksi;

    $sql = "DELETE FROM fasilitas WHERE id_fasilitas = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_fasilitas);
    return $stmt->execute();
}
?>