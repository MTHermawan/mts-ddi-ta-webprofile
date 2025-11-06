CREATE DATABASE mts_ddi_ta;
USE mts_ddi_ta;

-- Table Profile
CREATE TABLE profile (
    visi VARCHAR(2000),
    misi VARCHAR(2000),
    url_foto_struktur VARCHAR(50),
    jumlah_siswa INT,
    jumlah_guru INT,
    jumlah_lulusan INT
);

-- Table Admin
CREATE TABLE admin (
    email VARCHAR(255) PRIMARY KEY,
    password VARCHAR(25) NOT NULL,
    nama VARCHAR(50) NOT NULL
);

-- Table Foto_Galeri
CREATE TABLE foto_galeri (
    id_foto_galeri INT auto_increment PRIMARY KEY,
    deskripsi_foto_galeri VARCHAR(100),
    url_foto VARCHAR(50) NOT NULL,
    tanggal_posting DATE,
    email VARCHAR(255)
);

-- Table Ekstrakurikuler
CREATE TABLE ekstrakurikuler (
    id_ekstrakurikuler INT auto_increment PRIMARY KEY,
    nama VARCHAR(20) NOT NULL,
    nama_pembimbing VARCHAR(50) NOT NULL,
    jadwal VARCHAR(25),
    url_foto VARCHAR(50)
);

-- Table Fasilitas
CREATE TABLE fasilitas (
    id_fasilitas INT auto_increment PRIMARY KEY,
    nama_fasilitas VARCHAR(25) NOT NULL,
    url_foto VARCHAR(50),
    deskripsi_fasilitas VARCHAR(100)
);

-- Table Guru
CREATE TABLE guru (
    id_guru INT auto_increment PRIMARY KEY,
    nama VARCHAR(50) NOT NULL,
    jabatan VARCHAR(25),
    url_foto VARCHAR(50),
    gelar VARCHAR(20)
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
INSERT INTO admin (email, password, nama) VALUES
('admin@mtsddi.sch.id', 'admin123', 'Admin');

-- Insert data ke tabel guru
INSERT INTO guru (nama, jabatan, url_foto, gelar) VALUES
('Muhammad Rizki', 'Guru Matematika', '/images/guru3.jpg', 'S.Pd');

-- Insert data ke tabel ekstrakurikuler
INSERT INTO ekstrakurikuler (nama, nama_pembimbing, jadwal, url_foto) VALUES
('Pramuka', 'Muhammad Rizki', '2024-11-08 15:00:00', '/images/ekskul1.jpg');

-- Insert data ke tabel fasilitas
INSERT INTO fasilitas (nama_fasilitas, url_foto, deskripsi_fasilitas) VALUES
('Perpustakaan', '/images/fasilitas3.jpg', 'Perpustakaan dengan koleksi 500+ buku');

-- Insert data ke tabel foto_galeri
INSERT INTO foto_galeri (deskripsi_foto_galeri, url_foto, tanggal_posting, email) VALUES
('Upacara Bendera Hari Senin', '/images/galeri1.jpg', '2024-11-04', 'admin@mtsddi.sch.id');

-- Insert data ke tabel informasi
INSERT INTO informasi (judul, konten, jadwal_agenda, tanggal_dibuat, url_foto, email_admin) VALUES
('Pendaftaran Siswa Baru 2025/2026', 'Pendaftaran siswa baru dibuka mulai 1 Januari hingga 28 Februari 2025', '2025-01-01', '2024-11-01', '/images/info1.jpg', 'admin@mtsddi.sch.id'),
('Peringatan Maulid Nabi Muhammad SAW', 'Kegiatan peringatan Maulid Nabi di Aula Sekolah', NULL , '2024-11-04', '/images/info4.jpg', 'admin@mtsddi.sch.id');

