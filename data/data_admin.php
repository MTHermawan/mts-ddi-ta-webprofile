<?php
include_once 'koneksi.php';

// Referensi Model Data Admin
// - email string
// - nama string
// - password string

function InsertAdmin($email, $nama, $password){
    // Ngambil koneksi dari variabel global
    global $koneksi;
    
    // Query, tanda "?" menandakan parameter yang akan di-bind
    $sql = "INSERT INTO admin (email, nama, password) VALUES (?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    
    // Data Binding, setiap karakter dalam parameter pertama merupakan tipe data dari masing-masing kolom (s = string, i = integer)
    $stmt->bind_param("sss", $email, $nama, $password);
    return $stmt->execute(); 
}

function GetAllInformasi(){
    global $koneksi;

    $data = [];
    $sql = "SELECT * FROM admin";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

?>