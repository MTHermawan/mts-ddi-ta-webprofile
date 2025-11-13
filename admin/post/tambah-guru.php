<?php include_once "../../data/koneksi.php";
include_once "../../data/data_guru.php";
include_once "../../data/utility.php";
include_once "../includes/path.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_guru = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $gelar = $_POST['gelar'];
    $file_foto = $_FILES['foto_guru'];

    $upload_dir_fs = ASSET_DIR . "guru/";

    if ($target_path = GenerateImagePath($file_foto['name'], $upload_dir_fs)) {
        if (move_uploaded_file($file_foto['tmp_name'], $target_path)) {
            $filename = basename($target_path);
            $public_url = ASSET_PATH . "guru/" . $filename;

            echo "<script>alert('Gambar berhasil di-upload!');</script>";
            // InsertGuru($nama_guru, $jabatan, $gelar, $public_url);
        } else {
            echo "<script>alert('Gagal memindahkan file.');</script>";
        }
    } else {
        echo "<script>alert('Gagal membuat path target.');</script>";
    }
}
echo "<script>window.location.href='../manajemen-guru.php';</script>";

?>