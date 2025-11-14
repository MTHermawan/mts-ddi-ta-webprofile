<?php require_once __DIR__."/path.php"; ?>

<nav>
    <div class="nav-logo">
        <img src="<?php echo DOCUMENT_ROOT; ?>assets/logo-sekolah.png" alt="Logo Sekolah">
        <h1>MTS DDI Tani Aman</h1>
    </div>
    <ul id="nav-menu">
        <li><a id="navbar-beranda" href="<?php echo DOCUMENT_ROOT; ?>" class="nav-menu-btn">Beranda</a></li>
        <li>
            <a id="navbar-profil" href="#" class="nav-menu-btn">Profil</a>
            <ul id="navbar-profil-dropdown" class="dropdown">
                <li><a href="<?php echo DOCUMENT_ROOT; ?>profile/sejarah.php">Sejarah Singkat</a></li>
                <li><a href="<?php echo DOCUMENT_ROOT; ?>profile/visi-misi.php">Visi Misi</a></li>
                <li><a href="<?php echo DOCUMENT_ROOT; ?>profile/guru.php">Data Guru</a></li>
                <li><a href="<?php echo DOCUMENT_ROOT; ?>profile/fasilitas.php">Fasilitas</a></li>
                <li><a href="<?php echo DOCUMENT_ROOT; ?>profile/ekskul.php">Ekstrakurikuler</a></li>
                <li><a href="<?php echo DOCUMENT_ROOT; ?>profile/organisasi.php">Organisasi</a></li>
            </ul>
        </li>
        <li><a id="navbar-galeri" href="<?php echo DOCUMENT_ROOT; ?>informasi/galeri.php" class="nav-menu-btn">Galeri</a></li>
        <li>
            <a id="navbar-informasi" href="#" class="nav-menu-btn">Informasi</a>
            <ul id="navbar-informasi-dropdown" class="dropdown">
                <li><a href="<?php echo DOCUMENT_ROOT; ?>informasi/agenda.php">Agenda</a></li>
                <li><a href="<?php echo DOCUMENT_ROOT; ?>informasi/berita.php">Berita</a></li>
            </ul>
        </li>
        <li><a id="navbar-kontak" href="#kontak" class="nav-menu-btn">Kontak</a></li>
    </ul>
</nav>

<script src="<?php echo DOCUMENT_ROOT; ?>script/navbar.js"></script>