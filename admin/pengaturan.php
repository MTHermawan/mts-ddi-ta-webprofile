<?php session_start();
require_once "./includes/check-auth.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Halaman Utama</title>
  <link rel="stylesheet" href="./style/dashboard.css" />
  <link rel="stylesheet" href="./style/pengaturan.css" />
  <link rel="stylesheet" href="./style/upload-image.css" />
  <link rel="icon" href="../assets/logo-sekolah.png" type="image/png/jpeg/jpg">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
  <!-- Sidebar -->
  <?php include "./includes/sidebar.php"; ?>

  <!-- Main -->
  <div class="main">
    <!-- Header Navbar -->
    <?php include "./includes/header.php" ?>

    <!-- Title Menu -->
    <h1 class="menu-title">Pengaturan</h1>

    <!-- Main Content -->
    <div class="main-content">

      <!-- main content media social -->
      <form action="" class="form-container">
        <h1 class="change-password-title">Umum</h1>
        <div class="upload-container">

          <div class="upload-card card-left">
            <label class="file-label" for="fileInputLogo">Logo Sekolah</label>

            <div id="imagePreviewLogo" class="image-preview-container">
              <div class="placeholder-content" id="placeholderLogo">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M16 16h-3v5h-2v-5h-3l4-4 4 4zm3.479-5.908c-.212-3.951-3.473-7.092-7.479-7.092s-7.267 3.141-7.479 7.092c-2.57.463-4.521 2.706-4.521 5.408 0 3.037 2.463 5.5 5.5 5.5h13c3.037 0 5.5-2.463 5.5-5.5 0-2.702-1.951-4.945-4.521-5.408z" />
                </svg>
                <span>Preview Logo</span>
              </div>
              <img src="" alt="Preview Gambar" id="previewImgLogo">
            </div>

            <input type="file" id="fileInputLogo" class="file-input" accept="image/*">

            <div class="button-group">
              <label for="fileInputLogo" class="custom-file-upload">
                <i class="fa-solid fa-upload"></i> Upload
              </label>

              <button type="button" id="removeBtnLogo" class="remove-file-btn" style="display: none;">
                <i class="fa-solid fa-trash"></i> Hapus
              </button>
            </div>
          </div>

          <div class="upload-card card-right">
            <label class="file-label" for="fileInputHero">Gambar Visual Utama</label>

            <div id="imagePreviewHero" class="image-preview-container">
              <div class="placeholder-content" id="placeholderHero">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M16 16h-3v5h-2v-5h-3l4-4 4 4zm3.479-5.908c-.212-3.951-3.473-7.092-7.479-7.092s-7.267 3.141-7.479 7.092c-2.57.463-4.521 2.706-4.521 5.408 0 3.037 2.463 5.5 5.5 5.5h13c3.037 0 5.5-2.463 5.5-5.5 0-2.702-1.951-4.945-4.521-5.408z" />
                </svg>
                <span>Preview Visual Utama</span>
              </div>
              <img src="" alt="Preview Gambar" id="previewImgHero">
            </div>

            <input type="file" id="fileInputHero" class="file-input" accept="image/*">

            <div class="button-group">
              <label for="fileInputHero" class="custom-file-upload">
                <i class="fa-solid fa-upload"></i> Upload
              </label>

              <button type="button" id="removeBtnHero" class="remove-file-btn" style="display: none;">
                <i class="fa-solid fa-trash"></i> Hapus
              </button>
            </div>
          </div>

        </div>

        <div class="settings-row">
          <div class="settings-card">
            <div class="settings-form settings-form-left">
              <div class="settings-info">
                <div class="settings-details">
                  <label class="settings-label" for="name">Nama Sekolah</label>
                  <input
                    class="input-text"
                    id="name"
                    name="name"
                    type="text"
                    placeholder="Masukkan Nama Sekolah" />
                </div>
              </div>
            </div>
          </div>

          <div class="settings-card">
            <div class="settings-form settings-form-right">
              <div class="settings-info">
                <div class="settings-details">
                  <label class="settings-label" for="motto">Motto Sekolah</label>
                  <input
                    class="input-text"
                    id="motto"
                    name="motto"
                    type="text"
                    placeholder="Berkarkter & Unggul" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="settings-row">
          <div class="settings-card">
            <div class="settings-form settings-form-left">
              <div class="settings-info">
                <div class="settings-details">
                  <label class="settings-label" for="hero-section">Judul Visual Utama</label>
                  <input
                    class="input-text"
                    id="hero-section"
                    name="hero-section"
                    type="text"
                    placeholder="Pendidikan Berkarakter" />
                </div>
              </div>
            </div>
          </div>

          <div class="settings-card">
            <div class="settings-form settings-form-right">
              <div class="settings-info">
                <div class="settings-details">
                  <label class="settings-label" for="sub-hero-section">Deskripsi Visual Utama</label>
                  <input
                    class="input-text"
                    id="sub-hero-section"
                    name="sub-hero-section"
                    type="text"
                    placeholder="Mengedepankan Nilai-Nilai Cerdas Beretika" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="settings-row">

          <div class="settings-card">
            <div class="settings-form settings-form-left">
              <div class="settings-info">
                <div class="settings-details">
                  <label class="settings-label" for="sub-title-about">Sub Judul Tentang</label>
                  <input
                    class="input-text"
                    id="sub-title-about"
                    name="sub-title-about"
                    type="text"
                    placeholder="Masukkan Nama Sekolah" />
                </div>
              </div>
            </div>
          </div>

          <div class="settings-card">
            <div class="settings-form settings-form-right">
              <div class="settings-info">
                <div class="settings-details">
                  <label class="settings-label" for="description-about">Deskripsi Tentang</label>
                  <input
                    class="input-text"
                    id="description-about"
                    name="description-about"
                    type="text"
                    placeholder="Menjadi lembaga pendidikan Islam..." />
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="settings-row">
          <div class="settings-card">
            <div class="settings-form settings-form-left">
              <div class="settings-info">
                <div class="settings-details">
                  <label class="settings-label" for="description-agenda">Deskripsi Agenda</label>
                  <input
                    class="input-text"
                    id="description-agenda"
                    name="description-agenda"
                    type="text"
                    placeholder="Ikuti berbagai kegiatan seru..." />
                </div>
              </div>
            </div>
          </div>

          <div class="settings-card">
            <div class="settings-form settings-form-right">
              <div class="settings-info">
                <div class="settings-details">
                  <label class="settings-label" for="description-berita">Deskripsi Berita</label>
                  <input
                    class="input-text"
                    id="description-berita"
                    name="description-berita"
                    type="text"
                    placeholder="Simak update terkini dari Madrasah..." />
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="settings-row">

          <div class="settings-card">
            <div class="settings-form settings-form-left">
              <div class="settings-info">
                <div class="settings-details">
                  <label class="settings-label" for="description-galeri">Deskripsi Galeri</label>
                  <input
                    class="input-text"
                    id="description-galeri"
                    name="description-galeri"
                    type="text"
                    placeholder="Simak momen-momen..." />
                </div>
              </div>
            </div>
          </div>

          <div class="settings-card">
            <div class="settings-form settings-form-right">
              <div class="settings-info">
                <div class="settings-details">
                  <label class="settings-label" for="description-tentang-kami">Deskripsi Tentang Kami</label>
                  <input
                    class="input-text"
                    id="description-tentang-kami"
                    name="description-tentang-kami"
                    type="text"
                    placeholder="Kami selalu terbuka untuk berdiskusi..." />
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="form-actions">
          <div></div>
          <button class="btn-save">
            <i class="fa-regular fa-floppy-disk"></i> Simpan</button>
        </div>
      </form>

      <form action="" class="form-container">
        <h1 class="change-password-title">Staff dan Murid</h1>
        <div class="meta-row">
          <div class="meta-card">
            <div class="meta-form">
              <div class="meta-info">
                <div class="meta-details">
                  <label class="meta-label" for="jumlah-staff">Jumlah Staff</label>
                  <input
                    class="input-text"
                    id="jumlah-staff"
                    name="jumlah-staff"
                    type="text"
                    placeholder="60+" />
                </div>
              </div>
            </div>
          </div>

          <div class="meta-card">
            <div class="meta-form">
              <div class="meta-info">
                <div class="meta-details">
                  <label class="meta-label" for="jumlah-murid">Jumlah Murid</label>
                  <input
                    class="input-text"
                    id="jumlah-murid"
                    name="jumlah-murid"
                    type="text"
                    placeholder="220+" />
                </div>
              </div>
            </div>
          </div>

          <div class="meta-card">
            <div class="meta-form">
              <div class="meta-info">
                <div class="meta-details">
                  <label class="meta-label" for="judul-staff">Judul Staff</label>
                  <input
                    class="input-text"
                    id="judul-staff"
                    name="judul-staff"
                    type="text"
                    placeholder="Beragam latar belakang ilmu..." />
                </div>
              </div>
            </div>
          </div>

          <div class="meta-card">
            <div class="meta-form">
              <div class="meta-info">
                <div class="meta-details">
                  <label class="meta-label" for="judul-murid">Judul Murid</label>
                  <input
                    class="input-text"
                    id="judul-murid"
                    name="judul-murid"
                    type="text"
                    placeholder="Komunitas pelajar yang beragam..." />
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="settings-row">
          <div class="settings-card">
            <div class="settings-form settings-form-left">
              <div class="settings-info">
                <div class="settings-details">
                  <label class="settings-label" for="description-staff">Deskripsi Staff</label>
                  <input
                    class="input-text"
                    id="description-staff"
                    name="description-staff"
                    type="text"
                    placeholder="Beragam latar belakang ilmu..." />
                </div>
              </div>
            </div>
          </div>

          <div class="settings-card">
            <div class="settings-form settings-form-right">
              <div class="settings-info">
                <div class="settings-details">
                  <label class="settings-label" for="description-murid">Deskripsi Murid</label>
                  <input
                    class="input-text"
                    id="description-murid"
                    name="description-murid"
                    type="text"
                    placeholder="Komunitas pelajar yang beragam..." />
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="settings-row">
          <div class="settings-card input-icon-card">
            <div class="settings-form settings-form-left">
              <div class="card">
                <div id="previewContainerStaff" style="display: none;">
                  <p style="margin: 0 0 5px 0; font-size: 14px; color: rgb(29, 41, 57);">Preview:</p>
                  <img src="" id="imgPreviewStaff" alt="Preview" />
                </div>

                <label class="form-label">Upload Icon Staff</label>

                <div class="custom-file-control">
                  <span class="action-btn" id="actionBtnStaff"> Choose File </span>

                  <span class="file-name-display" id="fileNameTextStaff">
                    No file chosen
                  </span>
                </div>

                <input type="file" id="realFileInputStaff" accept="image/*" />
              </div>
            </div>
          </div>

          <div class="settings-card input-icon-card">
            <div class="settings-form settings-form-right">
              <div class="card">
                <div id="previewContainerMurid" style="display: none;">
                  <p style="margin: 0 0 5px 0; font-size: 14px; color: rgb(29, 41, 57);">Preview:</p>
                  <img src="" id="imgPreviewMurid" alt="Preview" />
                </div>

                <label class="form-label">Upload Icon Murid</label>

                <div class="custom-file-control">
                  <span class="action-btn" id="actionBtnMurid"> Choose File </span>

                  <span class="file-name-display" id="fileNameTextMurid">
                    No file chosen
                  </span>
                </div>

                <input type="file" id="realFileInputMurid" accept="image/*" />
              </div>
            </div>
          </div>

        </div>


        <div class="form-actions">
          <div></div>
          <button class="btn-save">
            <i class="fa-regular fa-floppy-disk"></i> Simpan</button>
        </div>

      </form>

      <form action="" class="form-container">
        <h1 class="change-password-title">Nilai Dasar</h1>
        <div class="meta-row">
          <div class="meta-card">
            <div class="meta-form">
              <div class="meta-info">
                <div class="meta-details">
                  <label class="meta-label" for="core-value-1">Judul Nilai Dasar 1</label>
                  <input
                    class="input-text"
                    id="core-value-1"
                    name="core-value-1"
                    type="text"
                    placeholder="60+" />
                </div>
              </div>
            </div>
          </div>

          <div class="meta-card">
            <div class="meta-form">
              <div class="meta-info">
                <div class="meta-details">
                  <label class="meta-label" for="core-value-2">Judul Nilai Dasar 2</label>
                  <input
                    class="input-text"
                    id="core-value-2"
                    name="core-value-2"
                    type="text"
                    placeholder="220+" />
                </div>
              </div>
            </div>
          </div>

          <div class="meta-card">
            <div class="meta-form">
              <div class="meta-info">
                <div class="meta-details">
                  <label class="meta-label" for="core-value-3">Judul Nilai Dasar 3</label>
                  <input
                    class="input-text"
                    id="core-value-3"
                    name="core-value-3"
                    type="text"
                    placeholder="Beragam latar belakang ilmu..." />
                </div>
              </div>
            </div>
          </div>

          <div class="meta-card">
            <div class="meta-form">
              <div class="meta-info">
                <div class="meta-details">
                  <label class="meta-label" for="core-value-4">Judul Nilai Dasar 4</label>
                  <input
                    class="input-text"
                    id="core-value-4"
                    name="core-value-4"
                    type="text"
                    placeholder="Komunitas pelajar yang beragam..." />
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="settings-row">
          <div class="settings-card">
            <div class="settings-form settings-form-left">
              <div class="settings-info">
                <div class="settings-details">
                  <label class="settings-label" for="description-core-value-1">Deskripsi Nilai Dasar 1</label>
                  <input
                    class="input-text"
                    id="description-core-value-1"
                    name="description-core-value-1"
                    type="text"
                    placeholder="Beragam latar belakang ilmu..." />
                </div>
              </div>
            </div>
          </div>

          <div class="settings-card">
            <div class="settings-form settings-form-right">
              <div class="settings-info">
                <div class="settings-details">
                  <label class="settings-label" for="description-core-value-2">Deskripsi Nilai Dasar 2</label>
                  <input
                    class="input-text"
                    id="description-core-value-2"
                    name="description-core-value-2"
                    type="text"
                    placeholder="Komunitas pelajar yang beragam..." />
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="settings-row">
          <div class="settings-card">
            <div class="settings-form settings-form-left">
              <div class="settings-info">
                <div class="settings-details">
                  <label class="settings-label" for="description-core-value-3">Deskripsi Nilai Dasar 3</label>
                  <input
                    class="input-text"
                    id="description-core-value-3"
                    name="description-core-value-3"
                    type="text"
                    placeholder="Beragam latar belakang ilmu..." />
                </div>
              </div>
            </div>
          </div>

          <div class="settings-card">
            <div class="settings-form settings-form-right">
              <div class="settings-info">
                <div class="settings-details">
                  <label class="settings-label" for="description-core-value-4">Deskripsi Nilai Dasar 4</label>
                  <input
                    class="input-text"
                    id="description-core-value-4"
                    name="description-core-value-4"
                    type="text"
                    placeholder="Komunitas pelajar yang beragam..." />
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="settings-row">
          <div class="settings-card input-icon-card">
            <div class="settings-form settings-form-left">
              <div class="card">
                <div id="previewContainerND1" style="display: none;">
                  <p style="margin: 0 0 5px 0; font-size: 14px; color: rgb(29, 41, 57);">Preview:</p>
                  <img src="" id="imgPreviewND1" alt="Preview" />
                </div>

                <label class="form-label">Upload Icon Nilai Dasar-1</label>

                <div class="custom-file-control">
                  <span class="action-btn" id="actionBtnND1"> Choose File </span>
                  <span class="file-name-display" id="fileNameTextND1">No file chosen</span>
                </div>

                <input type="file" id="realFileInputND1" accept="image/*" />
              </div>
            </div>
          </div>

          <div class="settings-card input-icon-card">
            <div class="settings-form settings-form-right">
              <div class="card">
                <div id="previewContainerND2" style="display: none;">
                  <p style="margin: 0 0 5px 0; font-size: 14px; color: rgb(29, 41, 57);">Preview:</p>
                  <img src="" id="imgPreviewND2" alt="Preview" />
                </div>

                <label class="form-label">Upload Icon Nilai Dasar-2</label>

                <div class="custom-file-control">
                  <span class="action-btn" id="actionBtnND2"> Choose File </span>
                  <span class="file-name-display" id="fileNameTextND2">No file chosen</span>
                </div>

                <input type="file" id="realFileInputND2" accept="image/*" />
              </div>
            </div>
          </div>
        </div>

        <div class="settings-row">
          <div class="settings-card input-icon-card">
            <div class="settings-form settings-form-left">
              <div class="card">
                <div id="previewContainerND3" style="display: none;">
                  <p style="margin: 0 0 5px 0; font-size: 14px; color: rgb(29, 41, 57);">Preview:</p>
                  <img src="" id="imgPreviewND3" alt="Preview" />
                </div>

                <label class="form-label">Upload Icon Nilai Dasar-3</label>

                <div class="custom-file-control">
                  <span class="action-btn" id="actionBtnND3"> Choose File </span>
                  <span class="file-name-display" id="fileNameTextND3">No file chosen</span>
                </div>

                <input type="file" id="realFileInputND3" accept="image/*" />
              </div>
            </div>
          </div>

          <div class="settings-card input-icon-card">
            <div class="settings-form settings-form-right">
              <div class="card">
                <div id="previewContainerND4" style="display: none;">
                  <p style="margin: 0 0 5px 0; font-size: 14px; color: rgb(29, 41, 57);">Preview:</p>
                  <img src="" id="imgPreviewND4" alt="Preview" />
                </div>

                <label class="form-label">Upload Icon Nilai Dasar-4</label>

                <div class="custom-file-control">
                  <span class="action-btn" id="actionBtnND4"> Choose File </span>
                  <span class="file-name-display" id="fileNameTextND4">No file chosen</span>
                </div>

                <input type="file" id="realFileInputND4" accept="image/*" />
              </div>
            </div>
          </div>
        </div>


        <div class="form-actions">
          <div></div>
          <button class="btn-save">
            <i class="fa-regular fa-floppy-disk"></i> Simpan</button>
        </div>

      </form>

      <form action="" class="form-container">
        <h1 class="change-password-title">Social Media</h1>
        <div class="social-row">
          <div class="social-card">
            <div class="social-form social-form-left">
              <div class="social-icon">
                <img
                  src="../assets/icon-instagram.svg"
                  alt="instagram Icon" />
              </div>
              <div class="social-info">
                <div class="social-details">
                  <label class="social-label" for="instagram">Instagram</label>
                  <input
                    id="instagram"
                    name="instagram"
                    type="text"
                    required
                    placeholder="https://instagram.com/....." />
                </div>
              </div>
            </div>
          </div>

          <div class="social-card">
            <div class="social-form social-form-right">
              <div class="social-icon">
                <img src="../assets/icon-facebook.svg" alt="facebook Icon" />
              </div>
              <div class="social-info">
                <div class="social-details">
                  <label class="social-label" for="facebook">Facebook</label>
                  <input
                    id="facebook"
                    name="facebook"
                    type="text"
                    required
                    placeholder="https://facebook.com/....." />
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="social-row">
          <div class="social-card">
            <div class="social-form social-form-left">
              <div class="social-icon">
                <img src="../assets/icon-youtube.svg" alt="youtube Icon" />
              </div>
              <div class="social-info">
                <div class="social-details">
                  <label class="social-label" for="youtube">Youtube</label>
                  <input
                    id="youtube"
                    name="youtube"
                    type="text"
                    required
                    placeholder="https://youtube.com/....." />
                </div>
              </div>
            </div>
          </div>

          <div class="social-card social-card-right">
            <div class="social-form social-form-right">
              <div class="social-icon">
                <img src="../assets/icon-email.svg" alt="email Icon" />
              </div>
              <div class="social-info">
                <div class="social-details">
                  <label class="social-label" for="email">Email</label>
                  <input
                    id="email"
                    name="email"
                    type="text"
                    required
                    placeholder="email@example.com" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="social-row">
          <div class="social-card">
            <div class="social-form social-form-left">
              <div class="social-icon">
                <img
                  src="../assets/icon-phone.svg"
                  alt="instagram Icon" />
              </div>
              <div class="social-info">
                <div class="social-details">
                  <label class="social-label" for="phone">Telepon</label>
                  <input
                    id="phone"
                    name="phone"
                    type="text"
                    required
                    placeholder="08123456789" />
                </div>
              </div>
            </div>
          </div>

          <div class="social-card social-card-full">
            <div class="social-form">
              <div class="social-icon">
                <img
                  src="../assets/icon-location.svg"
                  alt="Extracurricular Icon" />
              </div>
              <div class="social-info">
                <div class="social-details">
                  <label class="social-label" for="location">Alamat</label>
                  <input
                    id="location"
                    name="location"
                    type="text"
                    required
                    placeholder="Masukkan Alamat Lengkap" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="social-row">
          <div class="social-card social-card-full">
            <div class="social-form">
              <div class="social-icon">
                <img
                  src="../assets/icon-link.svg"
                  alt="Extracurricular Icon" />
              </div>
              <div class="social-info">
                <div class="social-details">
                  <label class="social-label" for="maps">Tautan Google maps</label>
                  <input
                    id="maps"
                    name="maps"
                    type="text"
                    value="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6104228699833!2d117.09752919999998!3d-0.584908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df6813f36fcb987%3A0x2a58352fcfdf7056!2sMTs%20DDI%20Tani%20Aman!5e0!3m2!1sid!2sid!4v1762111103905!5m2!1sid!2sid"
                    required
                    placeholder="Masukkan Alamat Lengkap" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="form-actions social-media-actions">
          <div></div>
          <button class="btn-save">
            <i class="fa-regular fa-floppy-disk"></i> Simpan</button>
        </div>
      </form>

      <form action="" class="form-container">
        <h1 class="change-password-title">Ubah Kata Sandi</h1>
        <div class="settings-row">
          <div class="settings-card">
            <div class="settings-form settings-form-left">
              <div class="settings-info">
                <div class="settings-details">
                  <label class="settings-label" for="new-password">Kata Sandi Baru</label>
                  <input
                    class="input-text"
                    id="new-password"
                    name="new-password"
                    type="password"
                    placeholder="Masukkan Password Baru" />
                </div>
              </div>
            </div>
          </div>

          <div class="settings-card">
            <div class="settings-form settings-form-right">
              <div class="settings-info">
                <div class="settings-details">
                  <label class="settings-label" for="retype-new-password">Konfirmasi Kata Sandi Baru</label>
                  <input
                    class="input-text"
                    id="retype-new-password"
                    name="retype-new-password"
                    type="password"
                    placeholder="Masukkan Password Baru" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="form-actions">
          <div></div>
          <button class="btn-save">
            <i class="fa-regular fa-floppy-disk"></i> Simpan</button>
        </div>
      </form>

    </div>
  </div>

  <!-- Notifikasi Popup Global -->
  <div id="global-notification" class="notification-popup">
    <div class="notification-icon">
      <i class="fa-solid fa-check-circle"></i>
    </div>
    <div class="notification-content">
      <div class="notification-title">Berhasil!</div>
      <div class="notification-message">Pesan notifikasi</div>
    </div>
  </div>
  <script src="./script/pengaturan.js"></script>
  <script src="./script/input-icon.js"></script>
  <script src="./script/notification.js"></script>
</body>

</html>