<?php
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$script_path = $_SERVER['SCRIPT_NAME'];

$path_parts = array_filter(explode('/', $script_path));
$project_folder = isset($path_parts[1]) ? $path_parts[1] : '';
$base_url = $protocol . $host . '/' . $project_folder . '/';
?>

<nav>
    <div class="nav-logo">
        <img src="<?php echo $base_url; ?>assets/logo-sekolah.png" alt="Logo Sekolah">
        <h1>MTS DDI Tani Aman</h1>
    </div>
    <ul id="nav-menu">
        <li><a id="navbar-beranda" href="<?php echo $base_url; ?>" class="nav-menu-btn">Beranda</a></li>
        <li>
            <a id="navbar-profil" href="#" class="nav-menu-btn">Profil</a>
            <ul id="navbar-profil-dropdown" class="dropdown">
                <li><a href="<?php echo $base_url; ?>profile/sejarah.php">Sejarah Singkat</a></li>
                <li><a href="<?php echo $base_url; ?>profile/visi-misi.php">Visi Misi</a></li>
                <li><a href="<?php echo $base_url; ?>profile/guru.php">Data Guru</a></li>
                <li><a href="<?php echo $base_url; ?>profile/fasilitas.php">Fasilitas</a></li>
                <li><a href="<?php echo $base_url; ?>profile/ekskul.php">Ekstrakulikuler</a></li>
                <li><a href="<?php echo $base_url; ?>profile/organisasi.php">Organisasi</a></li>
            </ul>
        </li>
        <li><a id="navbar-galeri" href="#gallery" class="nav-menu-btn">Galeri</a></li>
        <li>
            <a id="navbar-informasi" href="#" class="nav-menu-btn">Informasi</a>
            <ul id="navbar-informasi-dropdown" class="dropdown">
                <li><a href="<?php echo $base_url; ?>informasi/agenda.php">Agenda</a></li>
                <li><a href="<?php echo $base_url; ?>informasi/berita.php">Berita</a></li>
            </ul>
        </li>
        <li><a id="navbar-kontak" href="#kontak" class="nav-menu-btn">Kontak</a></li>
    </ul>
</nav>