<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="./assets/logo-sekolah.png" type="image/png/jpeg/jpg">
</head>
<body>
    <?php include "includes/site-header.php"; ?>

    <header>
        <?php include "includes/navbar.php"; ?>

        <section id="hero">
            <div class="hero-content">
                <h1>Pendidikan Berkarakter, Berbasis Al-Qur’an dan Teknologi</h1>
                <h5>Mengedepankan Nilai-Nilai Cerdas Beretika: Ceria, Empati, Rasional, Damai, Aktif, Sabar, Bersih, Elok, Tulus, Iman, Konsisten, dan Amanah.</h5>
                <button class="btn-green">Hubungi kami</button>
            </div>
        </section>
    </header>

    <main>
        <!-- <section id="hero">
            <div class="hero-content">
                <h1>Pendidikan Berkarakter, Berbasis Al-Qur'an dan Teknologi</h1>
                <p>Mengedepankan Nilai-Nilai Cerdas Beretika: Ceria, Empati, Rasional, Damai, Aktif, Sabar, Bersih, Elok, Tulus, Iman, Konsisten, dan Amanah.</p>
                <button class="btn-green">Hubungi kami</button>
            </div>
        </section> -->

        <section id="about">
            <div class="about-container">
                <img src="assets/gambar-sekolah2.png" alt="Gambar Sekolah" class="about-img">
                <div class="about-text">
                    <h1>Profil Sekolah</h1>
                    <h3>MTS DDI Tani Aman</h3>
                    <p>Puji dan syukur mari kita panjatkan kehadirat Allah SWT. Yang senantiasa dengan sifat kasih dan sayangnya banyak memberikan nikmat ...</p>
                </div>
            </div>

            <div class="about-stats">
                <div class="stat-box">
                    <img src="assets/icon-student.png" alt="Siswa">
                    <h2>Siswa</h2>
                    <h3 id="value_jumlah_siswa">720+</h3>
                </div>
                <div class="stat-box">
                    <img src="assets/icon-teacher.png" alt="Guru">
                    <h2>Guru</h2>
                    <h3 id="value_jumlah_guru">64+</h3>
                </div>
                <div class="stat-box">
                    <img src="assets/icon-graduate.png" alt="Lulusan">
                    <h2>Lulusan</h2>
                    <h3 id="value_jumlah_lulusan">3500+</h3>
                </div>
            </div>
        </section>

        <section id="informasi">
            <h1>Informasi</h1>

            <div class="info-headline">
                <div class="headline-card">
                    <div class="headline-image"></div>
                    <div>
                        <h5>judul</h5>
                        <button class="btn-dark">Selengkapnya...</button>
                    </div>
                </div>
                <div class="headline-card">
                    <div class="headline-image"></div>
                    <div>
                        <h5>judul</h5>                            
                        <button class="btn-dark">Selengkapnya...</button>
                        </div>
                    </div>
            </div>

            <div class="info-cards">
                <div class="info-card">
                    <div class="info-img"></div>
                    <div class="info-card-detail">
                        <h5>judul</h5>
                        <p>deskripsi disini</p>
                        <button class="btn-dark">Selengkapnya...</button>
                    </div>
                </div>
                <div class="info-card">
                    <div class="info-img"></div>
                    <div class="info-card-detail">
                        <h5>judul</h5>
                        <p>deskripsi disini</p>
                        <button class="btn-dark">Selengkapnya...</button>
                    </div>
                </div>
                <div class="info-card">
                    <div class="info-img"></div>
                    <div class="info-card-detail">
                        <h5>judul</h5>
                        <p>deskripsi disini</p>
                        <button class="btn-dark">Selengkapnya...</button>
                    </div>
                </div>
            </div>
            
            <div class="info-button">
                <a href="./informasi/berita.html"><button class="btn-green">Lihat Berita</button></a>
                <a href="./informasi/agenda.html"><button class="btn-green">Lihat Agenda</button></a>
            </div>
        </section>
        
        <section id="gallery">
            <h1>Galeri</h1>
            <div class="gallery-container">
                <button class="arrow-btn left"><</button>
                <div class="gallery-track">
                    <img src="assets/gambar-gallery1.jpeg" alt="Foto 1">
                    <img src="assets/gambar-gallery2.jpeg" alt="Foto 2">
                    <img src="assets/gambar-gallery3.jpeg" alt="Foto 3">
                    <img src="assets/gambar-gallery4.jpeg" alt="Foto 4">
                    <img src="assets/gambar-gallery5.jpeg" alt="Foto 5">
                </div>
                <button class="arrow-btn right">></button>
            </div>
            <div class="gallery-button">
                <a href="./informasi/galeri.html"><button class="btn-green" > Lebih Lanjut</button></a>
                
            </div>
        </section>
        <section id="kontak">
            <h1>Kontak Kami</h1>
            <div class="kontak-container">
                <div class="kontak-info">
                    <div class="info-item">
                        <div class="icon-box">
                            <img src="assets/icon-telepon.png" alt="Telepon">
                        </div>
                        <div>
                            <h4>No. Telepon</h4>
                            <p>0</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="icon-box">
                            <img src="assets/icon-email.png" alt="Email">
                        </div>
                        <div>
                            <h4>Email</h4>
                            <p>www@</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="icon-box">
                            <img src="assets/icon-alamat.png" alt="Alamat">
                        </div>
                        <div>
                            <h4>Lokasi</h4>
                            <p>Jl. Soekarno Hatta, Tani Aman, Kec. Loa Janan Ilir, Kota Samarinda, Kalimantan Timur 75251</p>
                        </div>
                    </div>
                </div>
                <div class="kontak-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6104228699833!2d117.09752919999998!3d-0.584908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df6813f36fcb987%3A0x2a58352fcfdf7056!2sMTs%20DDI%20Tani%20Aman!5e0!3m2!1sid!2sid!4v1762111103905!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
    </main>
    <?php include "includes/footer.php"; ?>

    <script src="./script/script.js"></script>
</body>
</html>