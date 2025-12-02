<?php require_once __DIR__ . "/path.php";
// echo "DOCUMENT_ROOT: " . $_SERVER['DOCUMENT_ROOT'];
// echo "<br><br>";
// echo "HTTP_HOST: " . $_SERVER['HTTP_HOST'];
// echo "<br><br>";
// echo "PHP_SELF: " . $_SERVER['PHP_SELF'];
// echo "<br><br>";
// echo "REQUEST_URI: " . $_SERVER['REQUEST_URI'];
// echo "<br><br>";
// echo "SCRIPT_NAME: " . $_SERVER['SCRIPT_NAME'];
// echo "<br><br>";

?>

<div class="sidebar">
    <div class="sidebar-header">
        <img src="<?php echo ASSET_PATH; ?>logo-sekolah.png" alt="Logo Sekolah" class="sidebar-logo" />
        <h1>MTs DDI TA</h1>
    </div>

    <!-- menu -->
    <!-- nanti dibuat dropdown dengan teks manajemen sebagai parent -->
    <ul class="menu">
        <p class="menu-letter">MENU</p>
        <!-- <li>
          <a href="#" class="menu-item active">
            <i class="fa-regular fa-address-card"></i>
            <span class="menu-text">Profile Sekolah</span>
          </a>
        </li> -->
        <li>
            <a href="<?php echo ADMIN_PATH; ?>halaman-utama.php" class="menu-item <?php if (CURRENT_PAGE == "halaman-utama.php") echo "active"; ?>">
                <i class="fa-solid fa-house"></i>
                <span class="menu-text">Halaman Utama</span>
            </a>
        </li>
        <li>
            <a href="<?php echo ADMIN_PATH; ?>manajemen-visi-misi.php" class="menu-item <?php if (CURRENT_PAGE == "manajemen-visi-misi.php") echo "active"; ?>">
                <i class="fa-regular fa-address-card"></i>
                <span class="menu-text">Visi Misi</span>
            </a>
        </li>
        <li>
            <a href="<?php echo ADMIN_PATH; ?>manajemen-sejarah.php" class="menu-item <?php if (CURRENT_PAGE == "manajemen-sejarah.php") echo "active"; ?>">
                <i class="fa-solid fa-timeline"></i>
                <span class="menu-text">Sejarah</span>
            </a>
        </li>
        <li>
            <a href="<?php echo ADMIN_PATH; ?>manajemen-guru.php" class="menu-item <?php if (CURRENT_PAGE == "manajemen-guru.php") echo "active"; ?>">
                <i class="fa-regular fa-user"></i>
                <span class="menu-text">Staff Pengajar</span>
            </a>
        </li>
        <li>
            <a href="<?php echo ADMIN_PATH; ?>manajemen-fasilitas.php" class="menu-item <?php if (CURRENT_PAGE == "manajemen-fasilitas.php") echo "active"; ?>">
                <i class="fa-regular fa-building"></i>
                <span class="menu-text">Fasilitas Sekolah</span>
            </a>
        </li>
        <li>
            <a href="<?php echo ADMIN_PATH; ?>manajemen-ekstrakurikuler.php" class="menu-item <?php if (CURRENT_PAGE == "manajemen-ekstrakurikuler.php") echo "active"; ?>">
                <i class="fa-solid fa-medal"></i>
                <span class="menu-text">Ekstrakurikuler</span>
            </a>
        </li>
        <li>
            <a href="<?php echo ADMIN_PATH; ?>manajemen-struktur-organisasi.php" class="menu-item <?php if (CURRENT_PAGE == "manajemen-struktur-organisasi.php") echo "active"; ?>">
                <i class="fa-solid fa-sitemap"></i>
                <span class="menu-text">Struktur Organisasi </span>
            </a>
        </li>
        <li>
            <a href="<?php echo ADMIN_PATH; ?>manajemen-berita.php" class="menu-item <?php if (CURRENT_PAGE == "manajemen-berita.php") echo "active"; ?>">
                <i class="fa-regular fa-newspaper"></i>
                <span class="menu-text">Berita</span>
            </a>
        </li>
        <li>
            <a href="<?php echo ADMIN_PATH; ?>manajemen-agenda.php" class="menu-item <?php if (CURRENT_PAGE == "manajemen-agenda.php") echo "active"; ?>">
                <i class="fas fa-file"></i>
                <span class="menu-text">Agenda</span>
            </a>
        </li>
        <li>
            <a href="<?php echo ADMIN_PATH; ?>manajemen-galeri.php" class="menu-item <?php if (CURRENT_PAGE == "manajemen-galeri.php") echo "active"; ?>">
                <i class="fa-solid fa-image"></i>
                <span class="menu-text">Galeri</span>
            </a>
        </li>

        <div class="divider"></div>
    </ul>
</div>