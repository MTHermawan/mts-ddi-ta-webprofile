<?php require_once __DIR__ . "/path.php";
?>

<div class="overlay" id="overlay"></div>

<div class="sidebar" id="sidebar">
  <div class="sidebar-header">
    <div style="display: flex; align-items: center; gap: 16px;">
      <img src="../assets/logo-sekolah.png" alt="Logo" class="sidebar-logo" />
      <h1>MTs DDI TA</h1>
    </div>

    <div class="sidebar-close" id="sidebarCloseBtn">
      <i class="fa-solid fa-xmark"></i>
    </div>
  </div>

  <ul class="menu">
    <p class="menu-letter">MENU</p>
    <li>
      <a href="manajemen-visi-misi.php" class="menu-item <?php if (CURRENT_PAGE == "manajemen-visi-misi.php") echo "active"; ?>">
        <i class="fa-regular fa-address-card"></i>
        <span class="menu-text">Visi Misi</span>
      </a>
    </li>
    <li>
      <a href="manajemen-sejarah.php" class="menu-item <?php if (CURRENT_PAGE == "manajemen-sejarah.php") echo "active"; ?>">
        <i class="fa-solid fa-timeline"></i>
        <span class="menu-text">Sejarah</span>
      </a>
    </li>
    <li>
      <a href="manajemen-guru.php" class="menu-item <?php if (CURRENT_PAGE == "manajemen-guru.php") echo "active"; ?>">
        <i class="fa-regular fa-user"></i>
        <span class="menu-text">Staff</span>
      </a>
    </li>
    <li>
      <a href="manajemen-fasilitas.php" class="menu-item <?php if (CURRENT_PAGE == "manajemen-fasilitas.php") echo "active"; ?>">
        <i class="fa-regular fa-building"></i>
        <span class="menu-text">Fasilitas Sekolah</span>
      </a>
    </li>
    <li>
      <a href="manajemen-ekstrakurikuler.php" class="menu-item <?php if (CURRENT_PAGE == "manajemen-ekstrakurikuler.php") echo "active"; ?>">
        <i class="fa-solid fa-medal"></i>
        <span class="menu-text">Ekstrakurikuler</span>
      </a>
    </li>
    <li>
      <a href="manajemen-struktur-organisasi.php" class="menu-item <?php if (CURRENT_PAGE == "manajemen-struktur-organisasi.php") echo "active"; ?>">
        <i class="fa-solid fa-sitemap"></i>
        <span class="menu-text">Struktur Organisasi </span>
      </a>
    </li>
    <li>
      <a href="manajemen-berita.php" class="menu-item <?php if (CURRENT_PAGE == "manajemen-berita.php") echo "active"; ?>">
        <i class="fa-regular fa-newspaper"></i>
        <span class="menu-text">Berita</span>
      </a>
    </li>
    <li>
      <a href="manajemen-agenda.php" class="menu-item <?php if (CURRENT_PAGE == "manajemen-agenda.php") echo "active"; ?>">
        <i class="fas fa-file"></i>
        <span class="menu-text">Agenda</span>
      </a>
    </li>
    <li>
      <a href="manajemen-galeri.php" class="menu-item <?php if (CURRENT_PAGE == "manajemen-galeri.php") echo "active"; ?>">
        <i class="fa-solid fa-image"></i>
        <span class="menu-text">Galeri</span>
      </a>
    </li>
    <li>
      <a href="pengaturan.php" class="menu-item <?php if (CURRENT_PAGE == "pengaturan.php") echo "active"; ?>">
        <i class="fa-solid fa-gear"></i>
        <span class="menu-text">Pengaturan</span>
      </a>
    </li>
    <div class="divider"></div>
  </ul>
</div>