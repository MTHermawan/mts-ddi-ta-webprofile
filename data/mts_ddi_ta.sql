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
INSERT INTO staff (nama_staff, jabatan, mapel, url_foto, tanggal_dibuat) VALUES
('Hj. ST. Fatimah Amin, S.Pd.', "Kepala Madrasah", 'IPS Terpadu', '', NOW());

-- Insert data ke tabel ekskul
INSERT INTO ekskul (nama_ekskul, nama_pembimbing, jadwal, tanggal_dibuat) VALUES
('Pramuka', 'Muhammad Rizki', 'Sabtu, 15.00', NOW());

INSERT INTO foto_ekskul (id_ekskul, url_foto, posisi) VALUES
(1, 'ekstrakurikuler/ekskul1.jpg', 1);

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
(
  'Rapat Orang Tua dan Guru Semester Genap', 
  'Rapat evaluasi perkembangan siswa dan pembahasan program pembelajaran semester genap. Orang tua diharapkan hadir untuk membahas kemajuan putra-putrinya.', 
  'informasi/info1.jpg', 
  'admin@mtsddi.sch.id'
),
(
  'Penerimaan Siswa Baru Tahun Ajaran 2024/2025 Telah Dibuka', 
  'Pendaftaran siswa baru untuk tahun ajaran 2024/2025 telah dibuka. Kuota terbatas hanya untuk 200 siswa. Segera daftarkan putra-putri Anda untuk mendapatkan pendidikan terbaik.',
  'informasi/info4.jpg', 
  'admin@mtsddi.sch.id'
),
(
  'Pesantren Kilat Ramadhan 1446 H',
  'Kegiatan pembinaan iman dan takwa bagi seluruh siswa MTs DDI Tani Aman selama bulan suci Ramadhan.',
  'informasi/agenda-ramadhan.jpg',
  'admin@mtsddi.sch.id'
),
(
  'Ujian Akhir Semester Genap',
  'Pelaksanaan Ujian Akhir Semester Genap Tahun Pelajaran 2024/2025 bagi seluruh siswa.',
  'informasi/agenda-uas.jpg',
  'admin@mtsddi.sch.id'
),
(
  'Class Meeting & Pentas Seni',
  'Kegiatan class meeting dan pentas seni sebagai penutup tahun ajaran dan ajang kreativitas siswa.',
  'informasi/agenda-classmeeting.jpg',
  'admin@mtsddi.sch.id'
),
(
  'Rapat Evaluasi Guru dan Staff',
  'Rapat evaluasi kinerja guru dan staff MTs DDI Tani Aman.',
  'informasi/agenda-rapat-guru.jpg',
  'admin@mtsddi.sch.id'
),
(
  'Peringatan Maulid Nabi Muhammad SAW',
  'Kegiatan peringatan Maulid Nabi Muhammad SAW dengan ceramah dan penampilan siswa.',
  'informasi/agenda-maulid.jpg',
  'admin@mtsddi.sch.id'
),
(
  'Kegiatan Bakti Sosial',
  'Bakti sosial siswa MTs DDI Tani Aman kepada masyarakat sekitar sekolah.',
  'informasi/agenda-baksos.jpg',
  'admin@mtsddi.sch.id'
),
(
  'MTs DDI Tani Aman Juara Lomba Tahfidz Tingkat Kecamatan',
  'Salah satu siswa MTs DDI Tani Aman berhasil meraih juara lomba tahfidz Al-Qur’an tingkat kecamatan.',
  'informasi/berita-tahfidz.jpg',
  'admin@mtsddi.sch.id'
),
(
  'Kegiatan Pesantren Kilat Ramadhan Berjalan Khidmat',
  'Pesantren kilat Ramadhan diikuti seluruh siswa dengan penuh semangat dan kekhusyukan.',
  'informasi/berita-ramadhan.jpg',
  'admin@mtsddi.sch.id'
),
(
  'Pentas Seni Tutup Tahun Ajaran 2024/2025',
  'Pentas seni siswa menjadi penutup rangkaian kegiatan pembelajaran tahun ajaran 2024/2025.',
  'images/berita-pentas-seni.jpg',
  'admin@mtsddi.sch.id'
);

INSERT INTO agenda (id_informasi, tanggal_agenda, waktu_agenda, lokasi_agenda) VALUES
(1, '01 Jun 26', '10:00 - 14:00', 'Aula Serbaguna'),
(3, '12 – 16 Mar 25', '08:00 - 16:00', 'Lingkungan Sekolah'),
(4, '20 Mei 25', '07:30 - 12:00', 'Ruang Kelas'),
(5, '25 Jun 25', '08:00 - 14:00', 'Lapangan Sekolah'),
(6, '10 Apr 25', '09:00 - 11:30', 'Ruang Guru'),
(7, '28 Sep 25', '08:00 - 12:00', 'Aula Serbaguna'),
(8, '05 Okt 25', '08:00 - 13:00', 'Lingkungan Sekitar Sekolah');

INSERT INTO berita (id_informasi, pinned) VALUES
(2, 1),
(9, 0),
(10, 0),
(11, 0);

INSERT INTO sejarah (judul_sejarah, tahun_sejarah, deskripsi) VALUES
('Berdirinya MTs DDI Tani Aman', '1984', 'Madrasah Tsanawiyah Darud Da’wah Wal Irsyad (MTs DDI) Tani Aman Samarinda resmi berdiri di bawah naungan Yayasan DDI Tani Aman. Pada awal berdiri, madrasah ini dipimpin oleh Bapak H. Jamaluddin, A.Md. sebagai kepala madrasah, dengan jumlah siswa sekitar 21 siswa.'),
('Regenerasi Kepemimpinan', '2013', 'Setelah 29 tahun memimpin, Bapak H. Jamaluddin menyerahkan tongkat estafet kepemimpinan kepada Bapak H. Suwardi, A.Md. Di bawah kepemimpinannya, madrasah terus berkembang hingga tahun 2019.'),
('Akreditasi "A" Nasional', '2021', 'MTs DDI Tani Aman meraih akreditasi "A" dari Badan Akreditasi Nasional (BAN-SM) dengan SK Nomor: 999/BAN-SM/SK/2021. Saat ini dipimpin oleh Ibu ST. Fatimah Amin, S.Pd., dengan total 23 tenaga pendidik dan kependidikan.'),
('Prestasi & Pertumbuhan', '2024', 'Madrasah kini memiliki 236 siswa aktif dan telah meluluskan lebih dari 3.000 alumni. Pada tahun ajaran ini, angkatan ke-39 lulus dengan 100% kelulusan. Fasilitas fisik, prestasi akademik-nonakademik, dan jaringan alumni terus berkembang pesat.');

INSERT INTO pengaturan (`id_setting`, `setting_key`, `setting_value`, `tanggal_diperbarui`) VALUES
(1, 'nama_sekolah', 'MTs DDI Tani Aman', '2025-12-14 12:52:22'),
(2, 'motto', 'Madrasah berkarakter & unggul', '2025-12-14 12:52:22'),
(3, 'judul_hero', 'Pendidikan Berkarakter, Berbasis Al-Qur\'an dan Teknologi', '2025-12-14 12:52:22'),
(4, 'deskripsi_hero', 'Mengedepankan Nilai-Nilai Cerdas Beretika: Ceria, Empati, Rasional, Damai, Aktif, Sabar, Bersih, Elok, Tulus, Iman, Konsisten, dan Amanah.', '2025-12-14 12:52:22'),
(5, 'subjudul_tentang', 'Madrasah Berkarakter dan Unggul', '2025-12-14 12:52:22'),
(6, 'deskripsi_tentang', 'Menjadi lembaga pendidikan Islam yang unggul dalam akademik, berakhlak mulia, dan mampu menghasilkan generasi Qur\'ani yang siap menghadapi tantangan zaman', '2025-12-14 12:52:22'),
(7, 'deskripsi_agenda', 'Ikuti berbagai kegiatan seru dan bermanfaat yang kami siapkan untuk memperkuat iman, ilmu, dan akhlak siswa-siswi kami. Semua acara dirancang dengan nuansa Qur\'ani dan penuh makna', '2025-12-14 12:52:22'),
(8, 'deskripsi_berita', 'Simak update terkini dari Madrasah DDI Tani Aman mulai dari kegiatan belajar mengajar, prestasi siswa, hingga agenda penting.', '2025-12-14 12:52:22'),
(9, 'deskripsi_galeri', 'Simak momen-momen penuh makna dari kehidupan sehari-hari di Madrasah DDI Tani Aman — mulai dari belajar mengajar, lomba-lomba, hingga kegiatan sosial yang menumbuhkan rasa peduli dan kebersamaan.', '2025-12-14 12:52:22'),
(10, 'deskripsi_tentang_kami', 'Kami selalu terbuka untuk berdiskusi dengan Anda baik tentang pendaftaran, kegiatan sekolah, maupun kolaborasi. Silakan hubungi kami melalui salah satu saluran di bawah ini, atau datang langsung ke kantor kami.', '2025-12-14 12:52:22'),
(11, 'logo_sekolah', 'pengaturan/693e4f3552d92.png', '2025-12-14 13:46:29'),
(12, 'gambar_hero', 'pengaturan/693e4f3553c30.jpeg', '2025-12-14 13:46:29'),
(13, 'jumlah_staff', '60+', '2025-12-14 12:52:27'),
(14, 'jumlah_murid', '250+', '2025-12-14 12:52:27'),
(15, 'judul_staff', 'Guru dan Staff aktif', '2025-12-14 12:52:27'),
(16, 'judul_murid', 'Siswa dan Siswi aktif', '2025-12-14 12:52:27'),
(17, 'deskripsi_staf', 'Beragam latar belakang ilmu, satu misi: mendidik generasi unggul', '2025-12-14 12:52:27'),
(18, 'deskripsi_murid', 'Komunitas pelajar yang beragam dari berbagai daerah dan latar belakang.', '2025-12-14 13:13:01'),
(19, 'stat_icon_staf', 'pengaturan/693e4c1848701.svg', '2025-12-14 13:33:12'),
(20, 'stat_icon_murid', 'pengaturan/693e4c1848f0f.svg', '2025-12-14 13:33:12'),
(21, 'nilai_dasar_1', 'Prestasi Sekolah', '2025-12-14 12:52:29'),
(22, 'nilai_dasar_2', 'Fasilitas Modern', '2025-12-14 12:52:29'),
(23, 'nilai_dasar_3', 'Tenaga Pendidik Profesional', '2025-12-14 12:52:29'),
(24, 'nilai_dasar_4', 'Program Unggulan', '2025-12-14 12:52:29'),
(25, 'deskripsi_nilai_dasar_1', 'Berbagai penghargaan akademik dan non-akademik tingkat regional & nasional.', '2025-12-14 12:52:29'),
(26, 'deskripsi_nilai_dasar_2', 'Ruang belajar nyaman, laboratorium, perpustakaan, dan area olahraga.', '2025-12-14 12:52:29'),
(27, 'deskripsi_nilai_dasar_3', 'Guru berpengalaman dan kompeten dalam bidangnya masing-masing.', '2025-12-14 12:52:29'),
(28, 'deskripsi_nilai_dasar_4', 'Tahfidz, karakter, pembinaan akademik, serta pengembangan minat & bakat.', '2025-12-14 12:52:29'),
(29, 'icon_nilai_dasar_1', 'pengaturan/693e4aba89160.svg', '2025-12-14 13:27:22'),
(30, 'icon_nilai_dasar_2', 'pengaturan/693e4aba89aa0.svg', '2025-12-14 13:27:22'),
(31, 'icon_nilai_dasar_3', 'pengaturan/693e4aba8a734.svg', '2025-12-14 13:27:22'),
(32, 'icon_nilai_dasar_4', 'pengaturan/693e4aba8ae68.svg', '2025-12-14 13:27:22'),
(33, 'url_instagram', 'https://www.instagram.com/_mtsddi.taniaman_/', '2025-12-14 13:49:03'),
(34, 'url_facebook', 'https://www.facebook.com/p/MTs-MA-DDI-Tani-Aman-100064592416173/', '2025-12-14 13:49:03'),
(35, 'url_youtube', 'https://www.youtube.com/channel/UCKmg4jvEu7yh2wGGXJ8uPmA', '2025-12-14 13:49:03'),
(36, 'email_sekolah', 'info@mtsdditania.com', '2025-12-14 13:13:33'),
(37, 'nomor_telepon', '0898-9988-8899', '2025-12-14 13:13:33'),
(38, 'alamat', 'Jl. Soekarno Hatta, Tani Aman, Kec. Loa Janan Ilir, Kota Samarinda, Kalimantan Timur', '2025-12-14 13:13:33'),
(39, 'url_maps', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6104228699833!2d117.09752919999998!3d-0.584908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df6813f36fcb987%3A0x2a58352fcfdf7056!2sMTs%20DDI%20Tani%20Aman!5e0!3m2!1sid!2sid!4v1762111103905!5m2!1sid!2sid', '2025-12-14 12:52:44'),
(40, 'icon_visi', 'pengaturan/693e4deb132bc.svg', '2025-12-14 13:40:59'),
(41, 'icon_misi', 'pengaturan/693e4deb14794.svg', '2025-12-14 13:40:59'),
(42, 'icon_tujuan', 'pengaturan/693e4deb14f1f.svg', '2025-12-14 13:40:59'),
(50, 'deskripsi_staff', 'Beragam latar belakang ilmu, satu misi: mendidik generasi unggul.', '2025-12-14 13:13:01');
