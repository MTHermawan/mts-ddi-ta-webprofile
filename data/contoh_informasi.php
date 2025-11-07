<?php
include 'koneksi.php';
include 'data_informasi.php';

$data = GetAllInformasi(); // Mengambil semua data informasi

// Menampilkan semua data informasi
for ($i = 0; $i < count($data); $i++) {
    echo "<h1>Judul: " . $data[$i]['judul'] . "</h1>\n";
    echo "<p>Konten: " . $data[$i]['konten'] . "</p>\n";
    echo "<hr/>\n";
}

// Menambahkan data informasi baru (agenda)
$dataBaru = [
    'judul' => 'Informasi Baru',
    'konten' => 'Ini adalah konten informasi baru.',
    'jadwal_agenda' => '2024-11-07',
    'gambar' => 'gambar_baru.jpg',
    'email_admin' => 'admin@mtsddi.sch.id'
];
InsertInformasi($koneksi, $dataBaru['judul'], $dataBaru['konten'], $dataBaru['jadwal_agenda'], $dataBaru['gambar']);

// Memperbarui data informasi berdasarkan ID
$updateData = [
    'id' => 1, // ID yang ingin diperbarui
    'judul' => 'Informasi Diperbarui',
    'konten' => 'Konten informasi telah diperbarui.',
    'jadwal_agenda' => '2024-12-01',
    'gambar' => 'gambar_diperbarui.jpg'
];
UpdateInformasi($koneksi, $updateId, $updateData['judul'], $updateData['konten'], $updateData['jadwal_agenda'], $updateData['gambar']);

// Menghapus data informasi berdasarkan ID
$deleteId = 2; // ID yang ingin dihapus
DeleteInformasi($koneksi, $deleteId);

?>