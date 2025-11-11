<?php
include_once 'koneksi.php';

// Referensi Model Data Foto Galeri
// - id_foto_galeri int (auto increment)
// - deskripsi_foto_galeri string
// - url_foto string
// - tanggal_posting string
// - email string

// Menambahkan data informasi baru (CREATE)
function InsertFotoGaleri($deskripsi_foto_galeri, $url_foto, $tanggal_posting, $email){
    // Ngambil koneksi dari variabel global
    global $koneksi;
    
    // Query, tanda "?" menandakan parameter yang akan di-bind
    $sql = "INSERT INTO foto_galeri (deskripsi_foto_galeri, url_foto, tanggal_posting, email) VALUES (?, ?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    
    // Data Binding, setiap karakter dalam parameter pertama merupakan tipe data dari masing-masing kolom (s = string, i = integer)
    $stmt->bind_param("ssss", $deskripsi_foto_galeri, $url_foto, $tanggal_posting, $email);
    return $stmt->execute(); 
}

// Mengambil semua data infromasi (READ)
function GetAllInformasi(){
    global $koneksi;

    $data = [];
    $sql = "SELECT * FROM foto_galeri";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

// Memperbarui data informasi berdasarkan ID (UPDATE)
function UpdateFotoGaleri($id_foto_galeri, $deskripsi_foto_galeri, $url_foto, $tanggal_posting, $email){
    global $koneksi;

    $sql = "UPDATE foto_galeri SET deskripsi_foto_galeri = ?, url_foto = ?, tanggal_posting = ?, email = ? WHERE id_foto_galeri = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssssi", $deskripsi_foto_galeri, $url_foto, $tanggal_posting, $email, $id_foto_galeri);
    return $stmt->execute();
}

// Menghapus kolom informasi berdasarkan ID (DELETE)
function DeleteFasilitas($id_foto_galeri){
    global $koneksi;

    $sql = "DELETE FROM foto_galeri WHERE id_foto_galeri = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_foto_galeri);
    return $stmt->execute();
}
?>