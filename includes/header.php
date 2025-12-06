<?php require_once __DIR__ . "/path.php"; ?>

<header>
    <nav class="navbar">
        <div class="nav-brand">
            <div class="brand-logo">
                <img src="<?php echo ASSET_PATH; ?>/logo-sekolah.png" alt="logo" />
            </div>
            <div class="brand-info">
                <h1>Mts Ddi Tani Aman</h1>
                <p>Madrasah berkarakter & unggul</p>
            </div>
        </div>

        <div class="nav-menu">
            <a href="<?php echo DOCUMENT_ROOT; ?>" class="active">Home</a>

            <!-- Dropdown untuk Profil -->
            <div class="dropdown">
                <a href="#about" class="dropdown-toggle">
                    Profil <i class="fas fa-chevron-down"></i>
                </a>
                <div class="dropdown-menu">
                    <a href="<?php echo DOCUMENT_ROOT; ?>profile/sejarah">Sejarah</a>
                    <a href="<?php echo DOCUMENT_ROOT; ?>profile/struktur-organisasi">Struktur Organisasi</a>
                    <a href="<?php echo DOCUMENT_ROOT; ?>profile/guru">Guru</a>
                    <a href="<?php echo DOCUMENT_ROOT; ?>profile/fasilitas">Fasilitas Sekolah</a>
                    <a href="<?php echo DOCUMENT_ROOT; ?>profile/ekskul">Ekstrakurikuler Sekolah</a>
                </div>
            </div>

            <?php if (CURRENT_PAGE == 'index.html') { ?>
                <a href="#event">Agenda</a>
                <a href="#news">Berita</a>
                <a href="#gallery">Galeri</a>
                <a href="#contact">Kontak</a>
            <?php } else { ?>
                <a href="<?php echo DOCUMENT_ROOT; ?>#event">Agenda</a>
                <a href="<?php echo DOCUMENT_ROOT; ?>#news">Berita</a>
                <a href="<?php echo DOCUMENT_ROOT; ?>#gallery">Galeri</a>
                <a href="<?php echo DOCUMENT_ROOT; ?>#contact">Kontak</a>
            <?php } ?>
        </div>

        <div class="hamburger" id="hamburger">
            <i class="fas fa-bars"></i>
        </div>
    </nav>
</header>

<script src="<?php echo DOCUMENT_ROOT; ?>script/navbar.js"></script>