<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Halaman Utama</title>
</head>
<body>
    
    <header>
        <nav class="navbar">
            <div class="logo-container">
            <div class="logo"><img src="style/logo-sekolah.png" alt="logo"></div> 
            <!-- ganti aja logonya nanti -->
            <div class="logo-text">
                <h1>Mts Ddi Tani Aman</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo, ratione.</p>
            </div>
            </div>

            <div class="nav-menu">
            <a href="#" class="active">Home</a>
            <a href="#">About</a>
            <a href="#">Events</a>
            <a href="#">News</a>
            <a href="#">Galeri</a>
            <a href="#">Contact</a>
            </div>
        </nav>
    </header>

    <section id="hero">
        <!-- Gambar sebagai background -->
        <img src="style/contoh1.jpg" alt="Latar belakang pendidikan berkarakter" class="hero-bg-img">

        <!-- Overlay gelap untuk kontras teks -->
        <div class="hero-overlay"></div>

        <!-- Konten utama -->
        <div class="hero-content">
            <h1>Pendidikan Berkarakter, Berbasis Al-Qur’an dan Teknologi</h1>
            <p class="hero-subtitle">
            Mengedepankan Nilai-Nilai Cerdas Beretika: Ceria, Empati, Rasional, Damai, Aktif, Sabar, Bersih, Elok, Tulus, Iman, Konsisten, dan Amanah.
            </p>
            <button class="btn-green">Hubungi Kami</button>
        </div>
    </section>

    <section id="about">
    <div class="about-container">
        <h1 class="about-teks">Tentang Kami</h1>
        <p class="intro-text">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto repellendus omnis illum ratione quod laboriosam.
        </p>

        <!-- Wrapper untuk 3 kotak -->
        <div class="about-cards">
        <div class="kotak-besar">
            <div class="kotak-teks">
            <div class="icon-kotak"><i class="fa-regular fa-note-sticky"></i></div>
            <h2>Misi Kami</h2>
            <p>To revolutionize education by fostering critical thinking, creativity, and innovation. We prepare students not just for careers, but for lives of purpose and impact.</p>
            <ul class="mission-list">
                <li>Student-Centered Learning</li>
                <li>Global Perspective</li>
                <li>Innovation Hub</li>
            </ul>
            </div>
            <div class="kotak-gambar">
            <img src="style/contoh1.jpg" alt="Ilustrasi sekolah modern">
            </div>
        </div>

        <!-- Wrapper untuk 2 Kotak Kecil (Kanan) -->
        <div class="kotak-kecil-wrapper">
            <div class="kotak-kecil kotak-1">
            <div class="small-icon"><i class="fa-solid fa-chalkboard-user"></i></div>
            <div>
                <div class="small-number">60+</div>
                <div class="small-title">Advanced Programs</div>
                <div class="small-desc">From STEM to Arts, Business to Humanities</div>
            </div>
            </div>
            <div class="kotak-kecil kotak-2">
            <div class="small-icon"><i class="fa-solid fa-people-group"></i></div>
            <div>
                <div class="small-number">50+</div>
                <div class="small-title">Countries Represented</div>
                <div class="small-desc">A truly diverse global community</div>
            </div>
            </div>
        </div>
        </div>
        <!-- Ganti 3 wrapper terpisah dengan SATU wrapper -->
        <div class="kotak-bawah-container">
        <div class="kotak-bawah kotak-3">
            <div class="small-icon"><i class="fa-solid fa-star"></i></div>
            <div class="small-content">
            <div class="small-title-bawah">Awards & Honors</div>
            <div class="small-desc-bawah">Recognizing excellence in academics and beyond</div>
            </div>
        </div>

        <div class="kotak-bawah kotak-3">
            <div class="small-icon"><i class="fa-solid fa-address-book"></i></div>
            <div class="small-content">
            <div class="small-title-bawah">Global Impact</div>
            <div class="small-desc-bawah">Shaping leaders worldwide since 2005</div>
            </div>
        </div>

        <div class="kotak-bawah kotak-3">
            <div class="small-icon"><i class="fa-solid fa-school-flag"></i></div>
            <div class="small-content">
            <div class="small-title-bawah">Alumni Success</div>
            <div class="small-desc-bawah">98% graduate employed or in higher education</div>
            </div>
        </div>
        <div class="kotak-bawah kotak-3">
            <div class="small-icon"><i class="fa-solid fa-school-flag"></i></div>
            <div class="small-content">
            <div class="small-title-bawah">Alumni Success</div>
            <div class="small-desc-bawah">98% graduate employed or in higher education</div>
            </div>
        </div>
        </div>
    </div>
    </section>

    <section id="event">
    <div class="event-container">
            <h1 class="about-teks">Acara Mendatang</h1>
            <p class="intro-text">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto repellendus omnis illum ratione quod laboriosam.
            </p>

        <!-- Wrapper untuk kartu event -->
        <div class="event-wrapper">

            <div class="event-card">
            <div class="event-image-wrapper">
                <img src="style/contoh4.jpg" alt="Event 1" class="event-image">
                <!-- Overlay gelap di bagian bawah (opsional) -->
                <div class="image-overlay"></div>
            </div>
            <h3 class="event-title">New Quantum Computing Lab Inaugurated</h3>
            <p class="event-date"> <i class="fa-solid fa-calendar icon-event"></i>November 20, 2025</p>
            <p class="event-time"><i class="fa-solid fa-clock icon-event"></i>10:00 AM - 12:00 PM</p>
            <button class="btn-event">View Details -></button>
            </div>
            <div class="event-card">
            <div class="event-image-wrapper">
                <img src="style/contoh4.jpg" alt="Event 1" class="event-image">
                <!-- Overlay gelap di bagian bawah (opsional) -->
                <div class="image-overlay"></div>
            </div>
            <h3 class="event-title">New Quantum Computing Lab Inaugurated</h3>
            <p class="event-date"> <i class="fa-solid fa-calendar icon-event"></i>November 20, 2025</p>
            <p class="event-time"><i class="fa-solid fa-clock icon-event"></i>10:00 AM - 12:00 PM</p>
            <button class="btn-event">View Details -></button>
            </div>
            <div class="event-card">
                <div class="event-image-wrapper">
                    <img src="style/contoh4.jpg" alt="Event 1" class="event-image">
                    <!-- Overlay gelap di bagian bawah (opsional) -->
                    <div class="image-overlay"></div>
                </div>
                <h3 class="event-title">New Quantum Computing Lab Inaugurated</h3>
                <p class="event-date"> <i class="fa-solid fa-calendar icon-event"></i>November 20, 2025</p>
                <p class="event-time"><i class="fa-solid fa-clock icon-event"></i>10:00 AM - 12:00 PM</p>
                <button class="btn-event">View Details -></button>
            </div>
            <div class="event-card">
                <div class="event-image-wrapper">
                    <img src="style/contoh4.jpg" alt="Event 1" class="event-image">
                    <!-- Overlay gelap di bagian bawah (opsional) -->
                    <div class="image-overlay"></div>
                </div>
                <h3 class="event-title">New Quantum Computing Lab Inaugurated</h3>
                <p class="event-date"> <i class="fa-solid fa-calendar icon-event"></i>November 20, 2025</p>
                <p class="event-time"><i class="fa-solid fa-clock icon-event"></i>10:00 AM - 12:00 PM</p>
                <button class="btn-event">View Details -></button>
            </div>
            <div class="event-card">
                <div class="event-image-wrapper">
                    <img src="style/contoh4.jpg" alt="Event 1" class="event-image">
                    <!-- Overlay gelap di bagian bawah (opsional) -->
                    <div class="image-overlay"></div>
                </div>
                <h3 class="event-title">New Quantum Computing Lab Inaugurated</h3>
                <p class="event-date"> <i class="fa-solid fa-calendar icon-event"></i>November 20, 2025</p>
                <p class="event-time"><i class="fa-solid fa-clock icon-event"></i>10:00 AM - 12:00 PM</p>
                <button class="btn-event">View Details -></button>
            </div>
            <div class="event-card">
            <div class="event-image-wrapper">
                <img src="style/contoh4.jpg" alt="Event 1" class="event-image">
                <!-- Overlay gelap di bagian bawah (opsional) -->
                <div class="image-overlay"></div>
            </div>
            <h3 class="event-title">New Quantum Computing Lab Inaugurated</h3>
            <p class="event-date"> <i class="fa-solid fa-calendar icon-event"></i>November 20, 2025</p>
            <p class="event-time"><i class="fa-solid fa-clock icon-event"></i>10:00 AM - 12:00 PM</p>
            <button class="btn-event">View Details -></button>
            </div>
        </div>
        
        
        <!-- Tambahkan event lainnya di sini -->
        
    </div>
    </section>

    <section id="news">
    <div class="news-container">
        <h1 class="about-teks">Berita Terbaru</h1>
        <p class="intro-text">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto repellendus omnis illum ratione quod laboriosam.
        </p>
        <!-- Wrapper untuk kartu berita -->

        <div class="news-wrapper">
            <div class="card-news">
                <div class="big-news">
                    <div class="news-image">
                        <img src="style/contoh3.jpg" alt="Ilustrasi sekolah modern">
                    </div>
                    <div class="kotak-news">
                        <div class="icon-news">Berita Utama</div>
                        <h2 class="news-teks">Lorem ipsum dolor sit amet.</h2>
                        <p class="news-desk">To revolutionize education by fostering critical thinking, creativity, and innovation. We prepare students not just for careers, but for lives of purpose and impact.</p>
                        <p class="news-date"> <i class="fa-solid fa-calendar icon-news-i"></i>November 20, 2025</p>
                        <button class="read-more-news">View Details -></button>
                    </div>
                </div>
            </div>
            <div class="news-card">
                    <div class="news-image-wrapper">
                        <img src="style/contoh4.jpg" alt="Event 1" class="news-image">
                        <div class="image-overlay"></div>
                    </div>
                    <h3 class="news-title">New Quantum Computing Lab Inaugurated</h3>
                    <p class="news-desk-p">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perferendis, odio.</p>
                    <button class="btn-news">View Details -></button>
                </div>
                <div class="news-card">
                    <div class="news-image-wrapper">
                        <img src="style/contoh4.jpg" alt="Event 1" class="news-image">
                        <div class="image-overlay"></div>
                    </div>
                    <h3 class="news-title">New Quantum Computing Lab Inaugurated</h3>
                    <p class="news-desk-p">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perferendis, odio.</p>
                    <button class="btn-news">View Details -></button>
                </div>
                <div class="news-card">
                    <div class="news-image-wrapper">
                        <img src="style/contoh4.jpg" alt="Event 1" class="news-image">
                        <div class="image-overlay"></div>
                    </div>
                    <h3 class="news-title">New Quantum Computing Lab Inaugurated</h3>
                    <p class="news-desk-p">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perferendis, odio.</p>
                    <button class="btn-news">View Details -></button>
            </div>
        </div>
    </section>

    <section id="contact">
    <div class="contact-container">
        <h1 class="about-teks">Hubungi Kami</h1>
        <p class="intro-text">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto repellendus omnis illum ratione quod laboriosam.
        </p>

        <div class="contact-wrapper">
            <div class="card-contact">
                    <div class="big-contact">
                        <div class="kotak-contact">
                            <div class="icon-contact"><i class="fa-solid fa-phone"></i></div>
                            <h2 class="contact-teks">Lorem</h2>
                            <p class="detail-contact">0897998889898</p>
                        </div>
                    </div>
            </div>
            <div class="card-contact">
                    <div class="big-contact">
                        <div class="kotak-contact">
                            <div class="icon-contact"><i class="fa-solid fa-message"></i></div>
                            <h2 class="contact-teks">Email</h2>
                            <p class="detail-contact">0897998889898</p>
                        </div>
                    </div>
            </div>
            <div class="card-contact">
                    <div class="big-contact">
                        <div class="kotak-contact">
                            <div class="icon-contact"><i class="fa-solid fa-map"></i></div>
                            <h2 class="contact-teks">Alamat</h2>
                            <p class="detail-contact">0897998889898</p>
                        </div>
                    </div>
            </div>
        </div>
        <div class="kontak-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6104228699833!2d117.09752919999998!3d-0.584908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df6813f36fcb987%3A0x2a58352fcfdf7056!2sMTs%20DDI%20Tani%20Aman!5e0!3m2!1sid!2sid!4v1762111103905!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    </section>
    
    <script src="script/script.js"></script>
    <script src="script/navbar.js"></script>

    <footer class="footer">
    <div class="footer-container">

        <!-- Kiri -->
        <div class="footer-brand">
            <div class="footer-logo">
                <img src="style/logo-sekolah.png" alt="footer logo">
            </div>
            <h2 class="footer-title">MTS DDI Tani Aman</h2>
            <p class="footer-desc">
                Membangun generasi berkarakter, unggul dalam iman, ilmu, dan teknologi.
            </p>

            <div class="footer-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="footer-column">
            <h3>Menu</h3>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Profil</a></li>
                <li><a href="#">Galeri</a></li>
                <li><a href="#">Berita</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
        </div>

        <!-- Resources -->
        <div class="footer-column">
            <h3>Ikuti Kami</h3>
            <ul>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Youtube</a></li>
            </ul>
        </div>

        <!-- Contact -->
        <div class="footer-column">
            <h3>Kontak</h3>
            <p><i class="fa-solid fa-location-dot"></i> Jl. Tani Aman, Samboja</p>
            <p><i class="fa-solid fa-phone"></i> 0898-9988-8899</p>
            <p><i class="fa-solid fa-envelope"></i> info@mtsdditania.com</p>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© 2025 MTS DDI Tani Aman • All Rights Reserved</p>
    </div>
</footer>

</body>
</html>