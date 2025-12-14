<?php require_once __DIR__ . "/path.php"; ?>

<footer class="footer">
    <div class="footer-container">
        <!-- Brand Sekolah -->
        <div class="footer-brand-full">
            <div class="brand-left">
                <img src="<?php echo BASE_URL; ?>/assets/<?= SETTINGS['logo_sekolah'] ?>" alt="Logo Sekolah" />
            </div>

            <div class="brand-right">
                <h2 class="footer-title">MTS DDI Tani Aman</h2>
                <p class="footer-desc">
                    Di bawah naungan
                    <strong><a href="https://kemenag.go.id/">Kementerian Agama Republik Indonesia</a></strong>, membina
                    generasi berakhlak mulia, cerdas, dan berwawasan
                    Islami.
                </p>

                <!-- <div class="footer-kemenag">
                    <img src="assets/kemenag.png" alt="Logo Kemenag">
                    <span>Terwujudnya masyarakat yang cerdas dan maslahat menuju Indonesia Emas 2045</span>
                </div> -->

                <div class="footer-social">
                    <?php if (isset(SETTINGS['url_facebook']) && SETTINGS['url_facebook'] != "") { ?>
                    <a href="<?= SETTINGS['url_facebook'] ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <?php } ?>
                    
                    <?php if (isset(SETTINGS['url_instagram']) && SETTINGS['url_instagram'] != "") { ?>
                    <a href="<?= SETTINGS['url_instagram'] ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                    <?php } ?>
                    
                    <?php if (isset(SETTINGS['url_youtube']) && SETTINGS['url_youtube'] != "") { ?>
                        <a href="<?= SETTINGS['url_youtube'] ?>" target="_blank"><i class="fab fa-youtube"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Menu -->
        <div class="footer-column">
            <h3>Menu</h3>
            <ul>
                <?php if ($current === '/') { ?>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#event">Agenda</a></li>
                    <li><a href="#news">Berita</a></li>
                    <li><a href="#gallery">Galeri</a></li>
                    <li><a href="#contact">Kontak</a></li>
                <?php } else { ?>
                    <li><a href="<?= BASE_URL; ?>/">Home</a></li>
                    <li><a href="<?= BASE_URL; ?>/informasi/agenda">Agenda</a></li>
                    <li><a href="<?= BASE_URL; ?>/informasi/berita">Berita</a></li>
                    <li><a href="<?= BASE_URL; ?>/informasi/galeri">Galeri</a></li>
                    <li><a href="<?= BASE_URL; ?>/#contact">Kontak</a></li>
                <?php } ?>
            </ul>
        </div>

        <!-- Kontak -->
        <div class="footer-column">
            <h3>Kontak</h3>
            <p>
                <i class="fa-solid fa-location-dot info-foot"></i><?= SETTINGS['alamat'] ?>
            </p>
            <p><i class="fa-solid fa-phone info-foot"></i><?= SETTINGS['nomor_telepon'] ?></p>
            <p>
                <i class="fa-solid fa-envelope info-foot"></i><?= SETTINGS['email_sekolah'] ?>
            </p>
        </div>
    </div>

    <div class="footer-ornament"></div>

    <div class="footer-bottom">
        <p>© 2025 MTS DDI Tani Aman • All Rights Reserved</p>
    </div>
</footer>