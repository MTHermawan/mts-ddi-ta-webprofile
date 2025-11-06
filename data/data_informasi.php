<?php

function GetAllDataInformasi($koneksi){
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

function GetDataInformasiById($koneksi, $id){
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

function InsertInformasi($koneksi, $judul, $konten, $jadwal_agenda, $url_foto, $email_admin){
    $sql = "INSERT INTO informasi (judul, konten, jadwal_agenda, tanggal_dibuat, url_foto, email_admin) VALUES (?, ?, ?, NOW(), ?, ?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssss", $judul, $konten, $jadwal_agenda, $url_foto, $email_admin);
    return $stmt->execute(); 
}

function UpdateInformasi($koneksi, $id, $judul, $konten, $jadwal_agenda, $url_foto){
    $sql = "UPDATE informasi SET judul = ?, konten = ?, jadwal_agenda = ?, url_foto = ? WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssssi", $judul, $konten, $jadwal_agenda, $url_foto, $id);
    return $stmt->execute();
}

function DeleteInformasi($koneksi, $id){
    $sql = "DELETE FROM informasi WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
    
?>