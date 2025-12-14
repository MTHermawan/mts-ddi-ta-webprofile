<?php
if (!defined('IN_INDEX')) {
    http_response_code(403);
    exit;
}

$dataAgenda = GetAgenda();
$dataBerita = GetBerita();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/style.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/header.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/dropdown.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/style/footer.css" />
    <link rel="icon" href="<?= BASE_URL ?>/assets/<?= SETTINGS['logo_sekolah'] ?>" type="image/png/jpeg/jpg" />
    <title>Mts Ddi Tani Aman</title>
    <script src="<?= BASE_URL ?>/script/utility.js"></script>
  </head>
  <body>
    <!-- HEADER -->
    <?php include_once __DIR__ . "/includes/header.php" ?>

    <section id="hero">
      <img
        src="<?= BASE_URL ?>/assets/<?= SETTINGS['gambar_hero'] ?>"
        alt="Latar belakang pendidikan berkarakter"
        class="hero-bg"
      />
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <h1><?= SETTINGS['judul_hero'] ?></h1>
        <p class="hero-subtitle"><?= SETTINGS['deskripsi_hero'] ?>
        </p>
        <button class="btn-primary">Hubungi Kami</button>
      </div>
    </section>

    <section id="about">
      <div class="about-section">
        <h1 class="about-subtitle">Tentang Mts Ddi Tani Aman</h1>
        <h1 class="about-title"><?= SETTINGS['subjudul_tentang'] ?></h1>
        <p class="about-intro">
          <?= SETTINGS['deskripsi_tentang'] ?>
        </p>

        <!-- Mission & Vision Cards -->
        
        <div class="mission-vision-grid">
          <div class="card">
            <div class="card-icon">
              <img
                src="./assets/icon-visi-misi-white.svg"
                alt="Logo Visi Misi"
              />
            </div>
            <h3>Misi Kami</h3>
            <p>
              Kami hadir untuk menumbuhkan generasi yang dekat dengan Al-Qur'an:
              memahaminya, menghafalnya, mengamalkannya, dan menjadikannya
              pedoman dalam setiap langkah k  ehidupan.
            </p>
          </div>
          <div class="card">
            <div class="card-icon">
              <img
                src="./assets/icon-visi-misi-white.svg"
                alt="Logo Visi Misi"
              />
            </div>
            <h3>Visi Kami</h3>
            <p>
              Kami hadir untuk menumbuhkan generasi yang dekat dengan Al-Qur'an:
              memahaminya, menghafalnya, mengamalkannya, dan menjadikannya
              pedoman dalam setiap langkah kehidupan.
            </p>
          </div>
        </div>
        <div class="about-grid">
          <div class="feature-card-large">
            <div class="feature-content">
              <div class="feature-icon">
                <img
                  src="./assets/icon-visi-misi-white.svg"
                  alt="Logo Visi Misi"
                />
              </div>
              <h2>Tujuan</h2>
              <p>
                Kami hadir untuk menumbuhkan generasi yang dekat dengan
                Al-Qur'an: memahaminya, menghafalnya, mengamalkannya, dan
                menjadikannya pedoman dalam setiap langkah kehidupan.
              </p>
              <p>
                - Menyelenggarakan proses pembelajaran yang berkualitas.<br />
                - Membentuk karakter siswa yang berakhlakul karimah.<br />
                - Mengembangkan potensi akademik, seni, olahraga, dan
                keterampilan digital siswa secara seimbang.<br />
                - Menjalin kerja sama yang harmonis dengan orang tua,
                masyarakat, dan stakeholders pendidikan.<br />
              </p>
            </div>
            <div class="feature-image">
              <img
                src="assets/gambarabout.jpeg"
                alt="Ilustrasi sekolah modern"
              />
            </div>
          </div>

          <div class="stats-grid">
            <div class="stat-card stat-card-1">
              <div class="stat-header">
                <div class="stat-icon">
                  <img src="./assets/icon-staff-white.svg" alt="Icon Staff" />
                </div>
                <div class="stat-number"><?= SETTINGS['jumlah_staff'] ?></div>
              </div>

              <div>
                <div class="stat-title"><?= SETTINGS['judul_staff'] ?></div>
                <div class="stat-desc"><?= SETTINGS['deskripsi_staff'] ?></div>
              </div>
            </div>
            <div class="stat-card stat-card-2">
              <div class="stat-header">
                <div class="stat-icon">
                  <img
                    src="./assets/icon-students-white.svg"
                    alt="Icon Student"
                  />
                </div>
                <div class="stat-number"><?= SETTINGS['jumlah_murid'] ?></div>
              </div>
              <div>
                <div class="stat-title"><?= SETTINGS['judul_murid'] ?></div>
                <div class="stat-desc"><?= SETTINGS['deskripsi_murid'] ?></div>
              </div>
            </div>
          </div>
        </div>

        <h1 class="about-core">Nilai Dasar Kami</h1>
        <div class="highlight-grid">
          <div class="highlight-card">
            <div class="highlight-icon">
              <img
                src="./assets/icon-prestasi-green.svg"
                alt="icon-prestasi"
              />
            </div>
            <div class="highlight-content">
              <div class="highlight-title"><?= SETTINGS['nilai_dasar_1'] ?></div>
              <div class="highlight-desc"><?= SETTINGS['deskripsi_nilai_dasar_1'] ?></div>
            </div>
          </div>

          <div class="highlight-card">
            <div class="highlight-icon">
              <img
                src="./assets/icon-building-green.svg"
                alt="icon-Building"
              />
            </div>
            <div class="highlight-content">
              <div class="highlight-title"><?= SETTINGS['nilai_dasar_2'] ?></div>
              <div class="highlight-desc"><?= SETTINGS['deskripsi_nilai_dasar_2'] ?></div>
            </div>
          </div>

          <div class="highlight-card">
            <div class="highlight-icon">
              <img
                src="./assets/icon-ND3.svg"
                alt="icon-ND3"
              />
            </div>
            <div class="highlight-content">
              <div class="highlight-title"><?= SETTINGS['nilai_dasar_3'] ?></div>
              <div class="highlight-desc"><?= SETTINGS['deskripsi_nilai_dasar_3'] ?></div>
            </div>
          </div>

          <div class="highlight-card">
            <div class="highlight-icon">
              <img
                src="./assets/icon-ND4.svg"
                alt="icon-ND4"
              />
            </div>
            <div class="highlight-content">
              <div class="highlight-title"><?= SETTINGS['nilai_dasar_4'] ?></div>
              <div class="highlight-desc"><?= SETTINGS['deskripsi_nilai_dasar_4'] ?></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="event">
      <div class="event-section">
        <h1 class="event-title">Agenda Mendatang</h1>
        <p class="event-intro"><?= SETTINGS['deskripsi_agenda'] ?></p>

        <div class="events-grid">
          <div class="event-card">
            <div class="event-image-container">
              <img
                src="assets/gambarabout.jpeg"
                alt="Event 1"
                class="event-img"
              />
              <div class="image-overlay"></div>
            </div>
            <div class="event-content">
              <div class="event-title">
                <h3 class="event-name">
                  Penerimaan Siswa Baru Tahun Ajaran 2024/2025 Telah Dibuka
                  Penerimaan Siswa Baru Tahun Ajaran 2024/2025 Telah
                  DibukaPenerimaan Siswa Baru Tahun Ajaran 2024/2025 Telah
                  Dibuka
                </h3>
              </div>
              <p class="event-date">
                <i class="fa-solid fa-calendar event-icon"></i>20 November 2025
              </p>
              <p class="event-time">
                <i class="fa-solid fa-clock event-icon"></i>10:00 - 12:00
              </p>
              <p class="event-location">
                <i class="fa-solid fa-location-dot event-icon"></i>Auditorium
              </p>
              <a href="<?= BASE_URL ?>/informasi/agenda/1" class="btn-event"
                >Lihat Selengkapnya <i class="fa-solid fa-arrow-right"></i
              ></a>
            </div>
          </div>
          <div class="event-card">
            <div class="event-image-container">
              <img
                src="assets/gambarabout.jpeg"
                alt="Event 1"
                class="event-img"
              />
              <div class="image-overlay"></div>
            </div>
            <div class="event-content">
              <div class="event-title">
                <h3 class="event-name">
                  Penerimaan Siswa Baru Tahun Ajaran 2024/2025 Telah Dibuka
                </h3>
              </div>
              <p class="event-date">
                <i class="fa-solid fa-calendar event-icon"></i>20 November 2025
              </p>
              <p class="event-time">
                <i class="fa-solid fa-clock event-icon"></i>10:00 - 12:00
              </p>
              <p class="event-location">
                <i class="fa-solid fa-location-dot event-icon"></i>Auditorium
              </p>
              <a href="<?= BASE_URL ?>/informasi/agenda/1" class="btn-event"
                >Lihat Selengkapnya <i class="fa-solid fa-arrow-right"></i
              ></a>
            </div>
          </div>
          <div class="event-card">
            <div class="event-image-container">
              <img
                src="assets/gambarabout.jpeg"
                alt="Event 1"
                class="event-img"
              />
              <div class="image-overlay"></div>
            </div>
            <div class="event-content">
              <div class="event-title">
                <h3 class="event-name">
                  Penerimaan Siswa Baru Tahun Ajaran 2024/2025 Telah Dibuka
                </h3>
              </div>
              <p class="event-date">
                <i class="fa-solid fa-calendar event-icon"></i>20 November 2025
              </p>
              <p class="event-time">
                <i class="fa-solid fa-clock event-icon"></i>10:00 - 12:00
              </p>
              <p class="event-location">
                <i class="fa-solid fa-location-dot event-icon"></i>Auditorium
              </p>
              <a href="<?= BASE_URL ?>/informasi/agenda/1" class="btn-event"
                >Lihat Selengkapnya <i class="fa-solid fa-arrow-right"></i
              ></a>
            </div>
          </div>
          <div class="event-card">
            <div class="event-image-container">
              <img
                src="assets/gambarabout.jpeg"
                alt="Event 1"
                class="event-img"
              />
              <div class="image-overlay"></div>
            </div>
            <div class="event-content">
              <div class="event-title">
                <h3 class="event-name">
                  Penerimaan Siswa Baru Tahun Ajaran 2024/2025 Telah Dibuka
                </h3>
              </div>
              <p class="event-date">
                <i class="fa-solid fa-calendar event-icon"></i>20 November 2025
              </p>
              <p class="event-time">
                <i class="fa-solid fa-clock event-icon"></i>10:00 - 12:00
              </p>
              <p class="event-location">
                <i class="fa-solid fa-location-dot event-icon"></i>Auditorium
              </p>
              <a href="<?= BASE_URL ?>/informasi/agenda/1" class="btn-event"
                >Lihat Selengkapnya <i class="fa-solid fa-arrow-right"></i
              ></a>
            </div>
          </div>
          <div class="event-card">
            <div class="event-image-container">
              <img
                src="assets/gambarabout.jpeg"
                alt="Event 1"
                class="event-img"
              />
              <div class="image-overlay"></div>
            </div>
            <div class="event-content">
              <div class="event-title">
                <h3 class="event-name">
                  Penerimaan Siswa Baru Tahun Ajaran 2024/2025 Telah Dibuka
                </h3>
              </div>
              <p class="event-date">
                <i class="fa-solid fa-calendar event-icon"></i>20 November 2025
              </p>
              <p class="event-time">
                <i class="fa-solid fa-clock event-icon"></i>10:00 - 12:00
              </p>
              <p class="event-location">
                <i class="fa-solid fa-location-dot event-icon"></i>Auditorium
              </p>
              <a href="<?= BASE_URL ?>/informasi/agenda/1" class="btn-event"
                >Lihat Selengkapnya <i class="fa-solid fa-arrow-right"></i
              ></a>
            </div>
          </div>
          <div class="event-card">
            <div class="event-image-container">
              <img
                src="assets/gambarabout.jpeg"
                alt="Event 1"
                class="event-img"
              />
              <div class="image-overlay"></div>
            </div>
            <div class="event-content">
              <div class="event-title">
                <h3 class="event-name">
                  Penerimaan Siswa Baru Tahun Ajaran 2024/2025 Telah Dibuka
                </h3>
              </div>
              <p class="event-date">
                <i class="fa-solid fa-calendar event-icon"></i>20 November 2025
              </p>
              <p class="event-time">
                <i class="fa-solid fa-clock event-icon"></i>10:00 - 12:00
              </p>
              <p class="event-location">
                <i class="fa-solid fa-location-dot event-icon"></i>Auditorium
              </p>
              <a href="<?= BASE_URL ?>/informasi/agenda/1" class="btn-event"
                >Lihat Selengkapnya <i class="fa-solid fa-arrow-right"></i
              ></a>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-container">
        <a href="<?= BASE_URL ?>/informasi/agenda" class="btn-secondary">
          Lihat Lebih Banyak
        </a>
      </div>
    </section>

    <section id="news">
      <div class="news-section">
        <h1 class="section-title">Berita Terbaru</h1>
        <p class="section-intro"><?= SETTINGS['deskripsi_berita'] ?></p>

        <div class="featured-news">
          <div class="featured-content">
            <div class="featured-image">
              <img
                src="assets/gambarabout.jpeg"
                alt="Ilustrasi sekolah modern"
              />
            </div>
            <div class="featured-details">
              <div class="news-tag">Berita Utama</div>
              <h2 class="featured-title">
                Siswa MTs DDI Tani Aman Raih Juara 1 Lomba Tilawah Tingkat
                Kabupaten
              </h2>
              <p class="featured-desc">
                Alhamdulillah, atas izin Allah SWT, siswa kelas 8, Ananda
                Rizky Fauzan, berhasil meraih juara pertama dalam lomba
                tilawah Al-Qur'an tingkat kabupaten. Prestasi ini menjadi
                bukti bahwa pembelajaran Qur'ani di sekolah kami berjalan
                dengan baik dan penuh semangat.
              </p>

              <div class="featured-meta">
                <div class="featured-meta-date">
                  <i class="fa-solid fa-calendar news-icon"></i>
                  <span>20 November 2025</span>
                </div>
                <div class="featured-meta-publisher">
                  <i class="fas fa-user"></i>
                  <span>Admin Sekolah</span>
                </div>
              </div>
              <div class="featured-btn">
                <a href="<?= BASE_URL ?>/informasi/berita/1"
                  ><button class="btn-news">
                    Lihat Selengkapnya
                    <i class="fa-solid fa-arrow-right"></i></button
                ></a>
              </div>
            </div>
          </div>
        </div>
        <div class="news-grid">

          <div class="news-item">
            <div class="news-image-container">
              <img
                src="assets/gambarabout.jpeg"
                alt="Event 1"
                class="news-img"
              />
              <div class="image-overlay"></div>
            </div>
            <div class="news-content">
              <div class="news-title">
                <h3 class="news-name">
                  Penerimaan Siswa Baru Tahun Ajaran 2024/2025 Telah Dibuka
                </h3>
              </div>
              <p class="news-date">
                <i class="fa-solid fa-calendar news-icon"></i>20 November 2025
              </p>
              <p class="news-publisher">
                <i class="fas fa-user news-icon"></i>Admin Sekolah
              </p>
              <a href="<?= BASE_URL ?>/informasi/berita/1" class="btn-event"
                >Lihat Selengkapnya <i class="fa-solid fa-arrow-right"></i
              ></a>
            </div>
          </div>

          <div class="news-item">
            <div class="news-image-container">
              <img
                src="assets/gambarabout.jpeg"
                alt="Event 1"
                class="news-img"
              />
              <div class="image-overlay"></div>
            </div>
            <div class="news-content">
              <div class="news-title">
                <h3 class="news-name">
                  Penerimaan Siswa Baru Tahun Ajaran 2024/2025 Telah Dibuka
                </h3>
              </div>
              <p class="news-date">
                <i class="fa-solid fa-calendar news-icon"></i>20 November 2025
              </p>
              <p class="news-publisher">
                <i class="fas fa-user news-icon"></i>Admin Sekolah
              </p>
              <a href="<?= BASE_URL ?>/informasi/berita/1" class="btn-event"
                >Lihat Selengkapnya <i class="fa-solid fa-arrow-right"></i
              ></a>
            </div>
          </div>

          <div class="news-item">
            <div class="news-image-container">
              <img
                src="assets/gambarabout.jpeg"
                alt="Event 1"
                class="news-img"
              />
              <div class="image-overlay"></div>
            </div>
            <div class="news-content">
              <div class="news-title">
                <h3 class="news-name">
                  Penerimaan Siswa Baru Tahun Ajaran 2024/2025 Telah Dibuka
                </h3>
              </div>
              <p class="news-date">
                <i class="fa-solid fa-calendar news-icon"></i>20 November 2025
              </p>
              <p class="news-publisher">
                <i class="fas fa-user news-icon"></i>Admin Sekolah
              </p>
              <a href="<?= BASE_URL ?>/informasi/berita/1" class="btn-event"
                >Lihat Selengkapnya <i class="fa-solid fa-arrow-right"></i
              ></a>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-container">
        <a href="<?= BASE_URL ?>/informasi/berita" class="btn-secondary">
          Lihat Lebih Banyak
        </a>
      </div>
    </section>

    <section id="gallery" class="gallery-section">
      <h1 class="section-title">Galeri Kegiatan</h1>
      <p class="section-intro"><?= SETTINGS['deskripsi_galeri'] ?></p>

      <div class="gallery-grid">
        <div class="gallery-item gallery-item-tall">
          <img src="assets/gambar-gallery1.jpeg" alt="Galeri 1" />
        </div>
        <div class="gallery-item">
          <img src="assets/gambar-gallery2.jpeg" alt="Galeri 2" />
        </div>
        <div class="gallery-item gallery-item-wide">
          <img src="assets/gambar-gallery3.jpeg" alt="Galeri 3" />
        </div>
        <div class="gallery-item">
          <img src="assets/gambar-gallery4.jpeg" alt="Galeri 4" />
        </div>
        <div class="gallery-item gallery-item-tall">
          <img src="assets/gambar-gallery5.jpeg" alt="Galeri 5" />
        </div>
        <div class="gallery-item">
          <img src="assets/gambar-gallery1.jpeg" alt="Galeri 6" />
        </div>
      </div>
      <div class="btn-container">
        <a href="<?= BASE_URL ?>/informasi/galeri" class="btn-secondary">
          Lihat Lebih Banyak
        </a>
      </div>
    </section>

    <section id="contact">
      <div class="contact-section">
        <h1 class="section-title">Hubungi Kami</h1>
        <p class="section-intro"><?= SETTINGS['deskripsi_tentang_kami'] ?></p>

        <div class="contact-grid">
          <div class="contact-card">
            <div class="contact-item">
              <div class="contact-icon">
                <i class="fa-solid fa-phone"></i>
              </div>
              <h2 class="contact-title">Telepon</h2>
              <p class="contact-detail"><?= SETTINGS['nomor_telepon'] ?></p>
            </div>
          </div>
          <div class="contact-card">
            <div class="contact-item">
              <div class="contact-icon">
                <i class="fa-solid fa-message"></i>
              </div>
              <h2 class="contact-title">Email</h2>
              <p class="contact-detail"><?= SETTINGS['email_sekolah'] ?></p>
            </div>
          </div>
          <div class="contact-card">
            <div class="contact-item">
              <div class="contact-icon">
                <i class="fa-solid fa-map"></i>
              </div>
              <h2 class="contact-title">Alamat</h2>
              <p class="contact-detail"><?= SETTINGS['alamat'] ?></p>
            </div>
          </div>
        </div>

        <div class="map-container">
          <iframe
            src="<?= SETTINGS['url_maps'] ?>"
            width="600"
            height="450"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <?php include_once __DIR__ . "/includes/footer.php"; ?>

    <script src="<?= BASE_URL ?>/script/nav-active.js"></script>
    <script src="<?= BASE_URL ?>/script/script.js"></script>
    <script src="<?= BASE_URL ?>/script/dropdown.js"></script>
    <script src="<?= BASE_URL ?>/script/hamburger-menu.js"></script>
  </body>
</html>
