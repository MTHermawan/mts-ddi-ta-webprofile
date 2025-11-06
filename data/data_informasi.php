<?php
include_once 'koneksi.php';

// -- Fungsi CRUD Informasi --
// Menambahkan data informasi baru (CREATE)
function InsertInformasi($judul, $konten, $jadwal_agenda, $url_foto, $email_admin){
    global $koneksi;
    
    $sql = "INSERT INTO informasi (judul, konten, jadwal_agenda, tanggal_dibuat, url_foto, email_admin) VALUES (?, ?, ?, NOW(), ?, ?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssss", $judul, $konten, $jadwal_agenda, $url_foto, $email_admin);
    return $stmt->execute(); 
}

// Mengambil semua data infromasi (READ)
function GetAllDataInformasi(){
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

// Perbarui data informasi berdasarkan ID (UPDATE)
function UpdateInformasi($koneksi, $id, $judul, $konten, $jadwal_agenda, $url_foto){
    $sql = "UPDATE informasi SET judul = ?, konten = ?, jadwal_agenda = ?, url_foto = ? WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssssi", $judul, $konten, $jadwal_agenda, $url_foto, $id);
    return $stmt->execute();
}

// Hapus kolom informasi berdasarkan ID (DELETE)
function DeleteInformasi($koneksi, $id){
    $sql = "DELETE FROM informasi WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

// -- Fungsi Utilitas Data Informasi --
// Mengambil data informasi berdasarkan ID
function GetDataInformasiById($id){
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
    $sql = "SELECT * FROM informasi WHERE jadwal_agenda IS NULL ORDER BY tanggal_dibuat DESC";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}
?>