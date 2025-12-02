DROP DATABASE IF EXISTS mts_ddi_ta;

CREATE DATABASE mts_ddi_ta;
USE mts_ddi_ta;

-- Table Admin
CREATE TABLE admin (
    email VARCHAR(100) PRIMARY KEY,
    password VARCHAR(25) NOT NULL,
    nama VARCHAR(50) NOT NULL,
    tanggal_register DATETIME
);

-- Tabel token login admin
CREATE TABLE admin_remember_tokens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    token VARCHAR(64) NOT NULL UNIQUE,
    expires_at DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (email) REFERENCES admin(email) ON DELETE CASCADE,
    INDEX idx_token (token),
    INDEX idx_admin_id (email),
    INDEX idx_expires_at (expires_at)
);



-- Table Profile
CREATE TABLE profil (
    visi VARCHAR(2000),
    misi VARCHAR(2000),
    tujuan VARCHAR(2000),
    alamat VARCHAR(100),
);

-- Table Profile
CREATE TABLE profil_stat (
    id_profil_stat,
    jumlah_siswa INT,
    jumlah_guru INT,
    jumlah_lulusan INT
);

-- Table Foto_Galeri
CREATE TABLE foto_galeri (
    id_foto_galeri INT auto_increment PRIMARY KEY,
    judul_foto_galeri VARCHAR(50),
    deskripsi_foto_galeri VARCHAR(255),
    url_foto VARCHAR(50) NOT NULL,
    tanggal_posting DATE,
    email VARCHAR(255)
);

-- Table Ekskul
CREATE TABLE ekskul (
    id_ekskul INT auto_increment PRIMARY KEY,
    nama_ekskul VARCHAR(30) NOT NULL,
    nama_pembimbing VARCHAR(50) NOT NULL,
    jadwal VARCHAR(30),
    tanggal_dibuat DATETIME
);

CREATE TABLE foto_ekskul (
    id_foto_ekskul INT auto_increment PRIMARY KEY,
    id_ekskul INT,
    url_foto VARCHAR(50) NOT NULL,
    posisi INT,
    FOREIGN KEY (id_ekskul) REFERENCES ekskul(id_ekskul) ON DELETE CASCADE
);

-- Table Fasilitas
CREATE TABLE fasilitas (
    id_fasilitas INT auto_increment PRIMARY KEY,
    nama_fasilitas VARCHAR(30) NOT NULL,
    deskripsi_fasilitas VARCHAR(255),
    tanggal_dibuat DATETIME
);

CREATE TABLE foto_fasilitas (
    id_foto_fasilitas INT auto_increment PRIMARY KEY,
    id_fasilitas INT,
    url_foto VARCHAR(50) NOT NULL,
    posisi INT,
    FOREIGN KEY (id_fasilitas) REFERENCES fasilitas(id_fasilitas) ON DELETE CASCADE
);
-- Note:
-- Foto fasilitas memiliki tabel terpisah

-- Table Staff
CREATE TABLE staff (
    id_staff INT auto_increment PRIMARY KEY,
    nama_staff VARCHAR(100) NOT NULL,
    jabatan VARCHAR(50),
    mapel VARCHAR(50),
    url_foto VARCHAR(50),
    pendidikan VARCHAR(50),
    tanggal_dibuat DATETIME
);

-- Table Informasi
CREATE TABLE informasi (
    id_informasi INT auto_increment PRIMARY KEY,
    judul VARCHAR(50) NOT NULL,
    konten VARCHAR(5000) NOT NULL,
    jadwal_agenda DATE,
    tanggal_dibuat DATE,
    url_foto VARCHAR(50),
    email_admin VARCHAR(255),
    FOREIGN KEY (email_admin) REFERENCES admin(email)
);

-- Table Sejarah
CREATE TABLE sejarah (
    id_sejarah INT auto_increment PRIMARY KEY,
    judul_sejarah VARCHAR(50) NOT NULL,
    deskripsi_sejarah VARCHAR(500) NOT NULL,
    tanggal_dibuat DATETIME
);

-- Table Sosial Media
CREATE TABLE sosial_media (
    id_sosmed INT AUTO_INCREMENT PRIMARY KEY,
    nama_sosmed VARCHAR(30) NOT NULL,
    url_sosmed TEXT,
    url_icon VARCHAR(50)
);

-- Table Settings
CREATE TABLE settings (
    id_setting INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(100) NOT NULL UNIQUE,
    setting_value TEXT,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert data ke tabel admin
INSERT INTO admin (email, password, nama, tanggal_register) VALUES
('admin@mtsddi.sch.id', 'admin123', 'Admin', NOW());

-- Insert data ke tabel guru
INSERT INTO staff (nama_staff, jabatan, mapel, url_foto, pendidikan, tanggal_dibuat) VALUES
('Hj. ST. Fatimah Amin, S.Pd.', "Kepala Madrasah", 'IPS Terpadu', '', 'S.Pd', NOW());

-- Insert data ke tabel ekskul
INSERT INTO ekskul (nama_ekskul, nama_pembimbing, jadwal, tanggal_dibuat) VALUES
('Pramuka', 'Muhammad Rizki', '2024-11-08 15:00:00', NOW());

INSERT INTO foto_ekskul (id_ekskul, url_foto, posisi) VALUES
(1, '/images/ekskul1.jpg', 1);

-- Insert data ke tabel fasilitas
INSERT INTO fasilitas (nama_fasilitas, deskripsi_fasilitas, tanggal_dibuat) VALUES
('Perpustakaan', 'Perpustakaan dengan koleksi 500+ buku', NOW());

INSERT INTO foto_fasilitas (id_fasilitas, url_foto, posisi) VALUES
(1, '/images/fasilitas3.jpg', 1);

-- Insert data ke tabel foto_galeri
INSERT INTO foto_galeri (judul_foto_galeri, deskripsi_foto_galeri, url_foto, tanggal_posting, email) VALUES
('Upacara Bendera', 'Upacara Bendera Hari Senin', '/images/galeri1.jpg', '2024-11-04', 'admin@mtsddi.sch.id');

-- Insert data ke tabel informasi
INSERT INTO informasi (judul, konten, jadwal_agenda, tanggal_dibuat, url_foto, email_admin) VALUES
('Pendaftaran Siswa Baru 2025/2026', 'Pendaftaran siswa baru dibuka mulai 1 Januari hingga 28 Februari 2025', '2025-01-01', '2024-11-01', '/images/info1.jpg', 'admin@mtsddi.sch.id'),
('Peringatan Maulid Nabi Muhammad SAW', 'Kegiatan peringatan Maulid Nabi di Aula Sekolah', NULL , '2024-11-04', '/images/info4.jpg', 'admin@mtsddi.sch.id');