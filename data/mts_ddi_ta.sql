CREATE DATABASE mts_ddi_ta;
USE mts_ddi_ta;

-- Table Profile
CREATE TABLE profile (
    visi VARCHAR(2000),
    misi VARCHAR(2000),
    tujuan VARCHAR(2000),
    alamat VARCHAR(100),
    email_sekolah VARCHAR(50),
    url_google_maps VARCHAR(50),
    url_instagram VARCHAR(50),
    url_facebook VARCHAR(50),
    url_youtube VARCHAR(50),
    url_foto_struktur VARCHAR(50),
    jumlah_siswa INT,
    jumlah_guru INT,
    jumlah_lulusan INT
);

-- Table Admin
CREATE TABLE admin (
    email VARCHAR(100) PRIMARY KEY,
    password VARCHAR(25) NOT NULL,
    nama VARCHAR(50) NOT NULL,
    tanggal_register DATETIME
);

-- Table Foto_Galeri
CREATE TABLE foto_galeri (
    id_foto_galeri INT auto_increment PRIMARY KEY,
    judul_foto_galeri VARCHAR(30),
    deskripsi_foto_galeri VARCHAR(100),
    url_foto VARCHAR(50) NOT NULL,
    tanggal_posting DATE,
    email VARCHAR(255)
);

-- Table Ekskul
CREATE TABLE ekskul (
    id_ekskul INT auto_increment PRIMARY KEY,
    nama_ekskul VARCHAR(20) NOT NULL,
    nama_pembimbing VARCHAR(50) NOT NULL,
    jadwal VARCHAR(25),
    url_foto VARCHAR(50),
    tanggal_dibuat DATETIME
);

-- Table Fasilitas
CREATE TABLE fasilitas (
    id_fasilitas INT auto_increment PRIMARY KEY,
    nama_fasilitas VARCHAR(25) NOT NULL,
    url_foto VARCHAR(50),
    deskripsi_fasilitas VARCHAR(100),
    tanggal_dibuat DATETIME
);

-- Table Guru
CREATE TABLE guru (
    id_guru INT auto_increment PRIMARY KEY,
    nama_guru VARCHAR(50) NOT NULL,
    mapel VARCHAR(30),
    url_foto VARCHAR(50),
    gelar VARCHAR(20),
    tanggal_dibuat DATETIME
);

-- Table Informasi
CREATE TABLE informasi (
    id_informasi INT auto_increment PRIMARY KEY,
    judul VARCHAR(50) NOT NULL,
    konten VARCHAR(100) NOT NULL,
    jadwal_agenda DATE,
    tanggal_dibuat DATE,
    url_foto VARCHAR(50),
    email_admin VARCHAR(255),
    FOREIGN KEY (email_admin) REFERENCES admin(email)
);

-- Insert data ke tabel admin
INSERT INTO admin (email, password, nama, tanggal_register) VALUES
('admin@mtsddi.sch.id', 'admin123', 'Admin', NOW());

-- Insert data ke tabel guru
INSERT INTO guru (nama_guru, mapel, url_foto, gelar, tanggal_dibuat) VALUES
('Muhammad Rizki', 'Guru Matematika', '/images/guru3.jpg', 'S.Pd', NOW());

-- Insert data ke tabel ekskul
INSERT INTO ekskul (nama_ekskul, nama_pembimbing, jadwal, url_foto, tanggal_dibuat) VALUES
('Pramuka', 'Muhammad Rizki', '2024-11-08 15:00:00', '/images/ekskul1.jpg', NOW());

-- Insert data ke tabel fasilitas
INSERT INTO fasilitas (nama_fasilitas, url_foto, deskripsi_fasilitas, tanggal_dibuat) VALUES
('Perpustakaan', '/images/fasilitas3.jpg', 'Perpustakaan dengan koleksi 500+ buku', NOW());

-- Insert data ke tabel foto_galeri
INSERT INTO foto_galeri (judul_foto_galeri, deskripsi_foto_galeri, url_foto, tanggal_posting, email) VALUES
('Upacara Bendera', 'Upacara Bendera Hari Senin', '/images/galeri1.jpg', '2024-11-04', 'admin@mtsddi.sch.id');

-- Insert data ke tabel informasi
INSERT INTO informasi (judul, konten, jadwal_agenda, tanggal_dibuat, url_foto, email_admin) VALUES
('Pendaftaran Siswa Baru 2025/2026', 'Pendaftaran siswa baru dibuka mulai 1 Januari hingga 28 Februari 2025', '2025-01-01', '2024-11-01', '/images/info1.jpg', 'admin@mtsddi.sch.id'),
('Peringatan Maulid Nabi Muhammad SAW', 'Kegiatan peringatan Maulid Nabi di Aula Sekolah', NULL , '2024-11-04', '/images/info4.jpg', 'admin@mtsddi.sch.id');