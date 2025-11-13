<?php
include_once 'koneksi.php';

// Referensi Model Data Admin
// - email string
// - nama string
// - password string
// - tanggal_register string

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

function GetAllAdmin(){
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

function UpdateAdmin($email, $nama, $password){
    global $koneksi;

    $sql = "UPDATE informasi SET nama = ?, password = ? WHERE email = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssss", $nama, $password, $email);
    return $stmt->execute();
}

// function DeleteAdmin($email){
//     global $koneksi;

//     $sql = "UPDATE informasi SET judul = ?, konten = ?, jadwal_agenda = ?, url_foto = ? WHERE id = em";
//     $stmt = $koneksi->prepare($sql);
//     $stmt->bind_param("ssssi", $judul, $konten, $jadwal_agenda, $url_foto, $id);
//     return $stmt->execute();
// }

function GetAdminByEmail($email)
{
    global $koneksi;
    
    // Query, tanda "?" menandakan parameter yang akan di-bind
    $sql = "SELECT * FROM admin WHERE email = ?";
    $stmt = $koneksi->prepare($sql);
    
    // Data Binding, setiap karakter dalam parameter pertama merupakan tipe data dari masing-masing kolom (s = string, i = integer)
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}

function GetAdminByUsername($username)
{
    global $koneksi;
    
    // Query, tanda "?" menandakan parameter yang akan di-bind
    $sql = "SELECT * FROM admin WHERE nama = ?";
    $stmt = $koneksi->prepare($sql);
    
    // Data Binding, setiap karakter dalam parameter pertama merupakan tipe data dari masing-masing kolom (s = string, i = integer)
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}

function ValidasiLogin($input_email, $input_password)
{
    global $koneksi;

    $sql = "SELECT * FROM admin WHERE email = ? AND password = ?";
    $stmt = $koneksi->prepare($sql);

    $stmt->bind_param("ss", $input_email, $input_password);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        return $data["email"] === $input_email && $data["password"] === $input_password;
    }
    return false;
}
?>