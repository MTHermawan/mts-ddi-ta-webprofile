DROP DATABASE IF EXISTS mts_ddi_ta;

CREATE DATABASE mts_ddi_ta;
USE mts_ddi_ta;

-- Table Admin
CREATE TABLE admin (
    email VARCHAR(100) PRIMARY KEY,
    password VARCHAR(25) NOT NULL,
    nama VARCHAR(50) NOT NULL UNIQUE,
    tanggal_register DATETIME DEFAULT (CURRENT_TIMESTAMP())
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

-- Table Galeri
CREATE TABLE galeri (
    id_galeri INT auto_increment PRIMARY KEY,
    judul_galeri VARCHAR(50),
    deskripsi_galeri VARCHAR(255),
    url_foto VARCHAR(50) NOT NULL,
    email_admin VARCHAR(255) NOT NULL,
    tanggal_posting DATETIME DEFAULT (CURRENT_TIMESTAMP())
);

-- Table Ekskul
CREATE TABLE ekskul (
    id_ekskul INT auto_increment PRIMARY KEY,
    nama_ekskul VARCHAR(30) NOT NULL,
    nama_pembimbing VARCHAR(50) NOT NULL,
    jadwal VARCHAR(30),
    tanggal_dibuat DATETIME DEFAULT (CURRENT_TIMESTAMP())
);

CREATE TABLE foto_ekskul (
    id_foto_ekskul INT auto_increment PRIMARY KEY,
    id_ekskul INT NOT NULL,
    url_foto VARCHAR(50) NOT NULL,
    posisi INT,
    FOREIGN KEY (id_ekskul) REFERENCES ekskul(id_ekskul) ON DELETE CASCADE
);

-- Table Fasilitas
CREATE TABLE fasilitas (
    id_fasilitas INT auto_increment PRIMARY KEY,
    nama_fasilitas VARCHAR(30) NOT NULL,
    deskripsi_fasilitas VARCHAR(255),
    tanggal_dibuat DATETIME DEFAULT (CURRENT_TIMESTAMP())
);

CREATE TABLE foto_fasilitas (
    id_foto_fasilitas INT AUTO_INCREMENT PRIMARY KEY,
    id_fasilitas INT NOT NULL,
    url_foto VARCHAR(50) NOT NULL,
    posisi INT,
    FOREIGN KEY (id_fasilitas) REFERENCES fasilitas(id_fasilitas) ON DELETE CASCADE
);

-- Table Staff
CREATE TABLE staff (
    id_staff INT AUTO_INCREMENT PRIMARY KEY,
    nama_staff VARCHAR(100) NOT NULL,
    jabatan VARCHAR(50),
    mapel VARCHAR(50),
    url_foto VARCHAR(50),
    pendidikan VARCHAR(50),
    tanggal_dibuat DATETIME DEFAULT (CURRENT_TIMESTAMP())
);

-- Table Informasi
CREATE TABLE informasi (
    id_informasi INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(100) NOT NULL,
    deskripsi TEXT NOT NULL,
    tanggal_dibuat DATETIME DEFAULT(CURRENT_TIMESTAMP()),
    url_foto VARCHAR(50),
    email_admin VARCHAR(255) NOT NULL,
    FOREIGN KEY (email_admin) REFERENCES admin(email)
);

-- Table Berita
CREATE TABLE berita (
    id_berita INT AUTO_INCREMENT PRIMARY KEY,
    id_informasi INT NOT NULL,
    pinned TINYINT(1) DEFAULT 0,
    FOREIGN KEY (id_informasi) REFERENCES informasi(id_informasi) ON DELETE CASCADE
);

CREATE TABLE agenda (
    id_agenda INT AUTO_INCREMENT PRIMARY KEY,
    id_informasi INT NOT NULL,
    tanggal_agenda VARCHAR(30) NOT NULL,
    waktu_agenda VARCHAR(30) NOT NULL,
    lokasi_agenda VARCHAR(100) NOT NULL,
    FOREIGN KEY (id_informasi) REFERENCES informasi(id_informasi) ON DELETE CASCADE
);

-- Table Sejarah
CREATE TABLE sejarah (
    id_sejarah INT auto_increment PRIMARY KEY,
    judul_sejarah VARCHAR(50) NOT NULL,
    tahun_sejarah VARCHAR(4) NOT NULL,
    deskripsi VARCHAR(1000) NOT NULL,
    tanggal_dibuat DATETIME DEFAULT (CURRENT_TIMESTAMP())
);

-- Table Settingan Profile
CREATE TABLE pengaturan (
    id_setting INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(100) NOT NULL UNIQUE,
    setting_value TEXT,
    tanggal_diperbarui DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE struktur_organisasi (
    id_struktur_organisasi INT AUTO_INCREMENT PRIMARY KEY,
    url_foto VARCHAR(50) NOT NULL,
    posisi INT NOT NULL,
    tanggal_dibuat DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Insert data ke tabel admin
INSERT INTO admin (email, password, nama, tanggal_register) VALUES
('admin@mtsddi.sch.id', 'admin123', 'Admin', NOW());

-- Insert data ke tabel guru
INSERT INTO staff (nama_staff, jabatan, mapel, url_foto, pendidikan, tanggal_dibuat) VALUES
('Hj. ST. Fatimah Amin, S.Pd.', "Kepala Madrasah", 'IPS Terpadu', '', 'S.Pd', NOW());

-- Insert data ke tabel ekskul
INSERT INTO ekskul (nama_ekskul, nama_pembimbing, jadwal, tanggal_dibuat) VALUES
('Pramuka', 'Muhammad Rizki', 'Sabtu, 15.00', NOW());

INSERT INTO foto_ekskul (id_ekskul, url_foto, posisi) VALUES
(1, '/images/ekskul1.jpg', 1);

-- Insert data ke tabel fasilitas
INSERT INTO fasilitas (nama_fasilitas, deskripsi_fasilitas, tanggal_dibuat) VALUES
('Perpustakaan', 'Perpustakaan dengan koleksi 500+ buku', NOW());

INSERT INTO foto_fasilitas (id_fasilitas, url_foto, posisi) VALUES
(1, '/images/fasilitas3.jpg', 1);

-- Insert data ke tabel galeri
INSERT INTO galeri (judul_galeri, deskripsi_galeri, url_foto, tanggal_posting, email_admin) VALUES
('Upacara Bendera', 'Upacara Bendera Hari Senin', '/images/galeri1.jpg', '2024-11-04', 'admin@mtsddi.sch.id');

-- Insert data ke tabel informasi
INSERT INTO informasi (judul, deskripsi, url_foto, email_admin) VALUES
('Rapat Orang Tua dan Guru Semester Genap', 'Rapat evaluasi perkembangan siswa dan pembahasan program pembelajaran semester genap. Orang tua diharapkan hadir untuk membahas kemajuan putra-putrinya.', '/images/info1.jpg', 'admin@mtsddi.sch.id'),
('Penerimaan Siswa Baru Tahun Ajaran 2024/2025 Telah Dibuka', 'Pendaftaran siswa baru untuk tahun ajaran 2024/2025 telah dibuka. Kuota terbatas hanya untuk 200 siswa. Segera daftarkan putra-putri Anda untuk mendapatkan pendidikan terbaik.', '/images/info4.jpg', 'admin@mtsddi.sch.id');

INSERT INTO agenda (id_informasi, tanggal_agenda, waktu_agenda, lokasi_agenda) VALUES
(1, '01 Jun 26', '12-11-01', 'Aula Serbaguna');

INSERT INTO berita (id_informasi, pinned) VALUES (2, 1);

INSERT INTO sejarah (judul_sejarah, tahun_sejarah, deskripsi) VALUES
('Berdirinya MTs DDI Tani Aman', '1984', 'Madrasah Tsanawiyah Darud Da’wah Wal Irsyad (MTs DDI) Tani Aman Samarinda resmi berdiri di bawah naungan Yayasan DDI Tani Aman. Pada awal berdiri, madrasah ini dipimpin oleh Bapak H. Jamaluddin, A.Md. sebagai kepala madrasah, dengan jumlah siswa sekitar 21 siswa.'),
('Regenerasi Kepemimpinan', '2013', 'Setelah 29 tahun memimpin, Bapak H. Jamaluddin menyerahkan tongkat estafet kepemimpinan kepada Bapak H. Suwardi, A.Md. Di bawah kepemimpinannya, madrasah terus berkembang hingga tahun 2019.'),
('Akreditasi "A" Nasional', '2021', 'MTs DDI Tani Aman meraih akreditasi "A" dari Badan Akreditasi Nasional (BAN-SM) dengan SK Nomor: 999/BAN-SM/SK/2021. Saat ini dipimpin oleh Ibu ST. Fatimah Amin, S.Pd., dengan total 23 tenaga pendidik dan kependidikan.'),
('Prestasi & Pertumbuhan', '2024', 'Madrasah kini memiliki 236 siswa aktif dan telah meluluskan lebih dari 3.000 alumni. Pada tahun ajaran ini, angkatan ke-39 lulus dengan 100% kelulusan. Fasilitas fisik, prestasi akademik-nonakademik, dan jaringan alumni terus berkembang pesat.')

