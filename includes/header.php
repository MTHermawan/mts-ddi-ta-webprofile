<?php $current = CURRENT_ROUTE;

function isActivePrefix($prefix) {
    return strpos(CURRENT_ROUTE, $prefix, 0) === 0 ? 'active' : '';
}

function isActiveExact($route) {
  return $route === CURRENT_ROUTE ? 'active' : '';
}

?>

<header>
    <nav class="navbar">
        <div class="nav-brand">
            <div class="brand-logo">
                <img src="<?php echo BASE_URL; ?>/assets/<?= SETTINGS['logo_sekolah'] ?>" alt="logo" />
            </div>
            <div class="brand-info">
                <h1><?= isset(SETTINGS['nama_sekolah']) ? SETTINGS['nama_sekolah'] : "Mts Ddi Tani Aman" ?></h1>
                <p><?= isset(SETTINGS['motto']) ? SETTINGS['motto'] : "Madrasah berkarakter & unggul" ?></p>
            </div>
        </div>

        <div class="nav-menu">
            <?php if ($current === '/') { ?>
                <a href="#hero">Home</a>
            <?php } else { ?>
                <a href="<?= BASE_URL; ?>/">Home</a>
            <?php } ?> 

            <!-- Dropdown untuk Profil -->
            <div class="dropdown">
                <a href="#about" class="dropdown-toggle <?= isActivePrefix('/profile') ?>">
                    Profil <i class="fas fa-chevron-down"></i>
                </a>
                <div class="dropdown-menu">
                    <a href="<?= BASE_URL; ?>/profile/sejarah">Sejarah</a>
                    <a href="<?= BASE_URL; ?>/profile/visi-misi">Visi Misi</a>
                    <a href="<?= BASE_URL; ?>/profile/struktur-organisasi">Struktur Organisasi</a>
                    <a href="<?= BASE_URL; ?>/profile/guru">Guru dan Staf</a>
                    <a href="<?= BASE_URL; ?>/profile/fasilitas">Fasilitas Sekolah</a>
                    <a href="<?= BASE_URL; ?>/profile/ekskul">Ekstrakurikuler Sekolah</a>
                </div>
            </div>

            <?php if ($current === '/') { ?>
                <a href="#event">Agenda</a>
                <a href="#news">Berita</a>
                <a href="#gallery">Galeri</a>
                <a href="#contact">Kontak</a>
            <?php } else { ?>
                <a href="<?= BASE_URL; ?>/informasi/agenda" class="<?= isActiveExact('/informasi/agenda') ?>">Agenda</a>
                <a href="<?= BASE_URL; ?>/informasi/berita" class="<?= isActiveExact('/informasi/berita') ?>">Berita</a>
                <a href="<?= BASE_URL; ?>/informasi/galeri" class="<?= isActiveExact('/informasi/galeri') ?>">Galeri</a>
                <a href="<?= BASE_URL; ?>/#contact">Kontak</a>
            <?php } ?>
        </div>

        <div class="hamburger" id="hamburger">
            <i class="fas fa-bars"></i>
        </div>
    </nav>
</header>