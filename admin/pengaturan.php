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
      <form class="form-container" id="pengaturan_umum" enctype="multipart/form-data">
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

            <input type="file" id="fileInputLogo" class="file-input" accept="image/*" name="logo_sekolah">

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

            <input type="file" id="fileInputHero" class="file-input" accept="image/*" name="gambar_hero">

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
                  <label class="settings-label" for="input_nama_sekolah">Nama Sekolah</label>
                  <input
                    class="input-text"
                    id="input_nama_sekolah"
                    name="nama_sekolah"
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
                  <label class="settings-label" for="input_motto">Motto Sekolah</label>
                  <input
                    class="input-text"
                    id="input_motto"
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
                  <label class="settings-label" for="input_judul_hero">Judul Visual Utama</label>
                  <input
                    class="input-text"
                    id="input_judul_hero"
                    name="judul_hero"
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
                  <label class="settings-label" for="input_deskripsi_hero">Deskripsi Visual Utama</label>
                  <input
                    class="input-text"
                    id="input_deskripsi_hero"
                    name="deskripsi_hero"
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
                  <label class="settings-label" for="input_subjudul_tentang">Sub Judul Tentang</label>
                  <input
                    class="input-text"
                    id="input_subjudul_tentang"
                    name="subjudul_tentang"
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
                  <label class="settings-label" for="input_deskripsi_tentang">Deskripsi Tentang</label>
                  <input
                    class="input-text"
                    id="input_deskripsi_tentang"
                    name="deskripsi_tentang"
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
                  <label class="settings-label" for="input_deskripsi_agenda">Deskripsi Agenda</label>
                  <input
                    class="input-text"
                    id="input_deskripsi_agenda"
                    name="deskripsi_agenda"
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
                  <label class="settings-label" for="input_deskripsi_berita">Deskripsi Berita</label>
                  <input
                    class="input-text"
                    id="input_deskripsi_berita"
                    name="deskripsi_berita"
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
                  <label class="settings-label" for="input_deskripsi_galeri">Deskripsi Galeri</label>
                  <input
                    class="input-text"
                    id="input_deskripsi_galeri"
                    name="deskripsi_galeri"
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
                  <label class="settings-label" for="input_deskripsi_tentang_kami">Deskripsi Tentang Kami</label>
                  <input
                    class="input-text"
                    id="input_deskripsi_tentang_kami"
                    name="deskripsi_tentang_kami"
                    type="text"
                    placeholder="Kami selalu terbuka untuk berdiskusi..." />
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="form-actions">
          <div></div>
          <button type="button" class="btn-save" onclick="SubmitPengaturan('pengaturan_umum')">
            <i class="fa-regular fa-floppy-disk"></i> Simpan</button>
        </div>
      </form>

      <form class="form-container" id="pengaturan_staf_murid" enctype="multipart/form-data">
        <h1 class="change-password-title">Staff dan Murid</h1>
        <div class="meta-row">
          <div class="meta-card">
            <div class="meta-form">
              <div class="meta-info">
                <div class="meta-details">
                  <label class="meta-label" for="input_jumlah_staff">Jumlah Staff</label>
                  <input
                    class="input-text"
                    id="input_jumlah_staff"
                    name="jumlah_staff"
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
                  <label class="meta-label" for="input_jumlah_murid">Jumlah Murid</label>
                  <input
                    class="input-text"
                    id="input_jumlah_murid"
                    name="jumlah_murid"
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
                  <label class="meta-label" for="input_judul_staf">Judul Staf</label>
                  <input
                    class="input-text"
                    id="input_judul_staf"
                    name="judul_staff"
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
                  <label class="meta-label" for="input_judul_murid">Judul Murid</label>
                  <input
                    class="input-text"
                    id="input_judul_murid"
                    name="judul_murid"
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
                  <label class="settings-label" for="input_deskripsi_staff">Deskripsi Staf</label>
                  <input
                    class="input-text"
                    id="input_deskripsi_staff"
                    name="deskripsi_staff"
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
                  <label class="settings-label" for="input_deskripsi_murid">Deskripsi Murid</label>
                  <input
                    class="input-text"
                    id="input_deskripsi_murid"
                    name="deskripsi_murid"
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

                <input type="file" id="realFileInputStaff" accept="image/*" name="stat_icon_staf" />
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

                <input type="file" id="realFileInputMurid" accept="image/*" name="stat_icon_murid"/>
              </div>
            </div>
          </div>

        </div>


        <div class="form-actions">
          <div></div>
          <button type="button" class="btn-save" onclick="SubmitPengaturan('pengaturan_staf_murid')">
            <i class="fa-regular fa-floppy-disk"></i> Simpan</button>
        </div>

      </form>

      <form class="form-container" id="pengaturan_nilai_dasar" enctype="multipart/form-data">
        <h1 class="change-password-title">Nilai Dasar</h1>
        <div class="meta-row">
          <div class="meta-card">
            <div class="meta-form">
              <div class="meta-info">
                <div class="meta-details">
                  <label class="meta-label" for="input_nilai_dasar_1">Judul Nilai Dasar 1</label>
                  <input
                    class="input-text"
                    id="input_nilai_dasar_1"
                    name="nilai_dasar_1"
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
                  <label class="meta-label" for="input_nilai_dasar_2">Judul Nilai Dasar 2</label>
                  <input
                    class="input-text"
                    id="input_nilai_dasar_2"
                    name="nilai_dasar_2"
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
                  <label class="meta-label" for="input_nilai_dasar_3">Judul Nilai Dasar 3</label>
                  <input
                    class="input-text"
                    id="input_nilai_dasar_3"
                    name="nilai_dasar_3"
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
                  <label class="meta-label" for="input_nilai_dasar_4">Judul Nilai Dasar 4</label>
                  <input
                    class="input-text"
                    id="input_nilai_dasar_4"
                    name="nilai_dasar_4"
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
                  <label class="settings-label" for="input_deskripsi_nilai_dasar_1">Deskripsi Nilai Dasar 1</label>
                  <input
                    class="input-text"
                    id="input_deskripsi_nilai_dasar_1"
                    name="deskripsi_nilai_dasar_1"
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
                  <label class="settings-label" for="input_deskripsi_nilai_dasar_2">Deskripsi Nilai Dasar 2</label>
                  <input
                    class="input-text"
                    id="input_deskripsi_nilai_dasar_2"
                    name="deskripsi_nilai_dasar_2"
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
                  <label class="settings-label" for="input_deskripsi_nilai_dasar_3">Deskripsi Nilai Dasar 3</label>
                  <input
                    class="input-text"
                    id="input_deskripsi_nilai_dasar_3"
                    name="deskripsi_nilai_dasar_3"
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
                  <label class="settings-label" for="input_deskripsi_nilai_dasar_4">Deskripsi Nilai Dasar 4</label>
                  <input
                    class="input-text"
                    id="input_deskripsi_nilai_dasar_4"
                    name="deskripsi_nilai_dasar_4"
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

                <input type="file" id="realFileInputND1" accept="image/*" name="icon_nilai_dasar_1"/>
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

                <input type="file" id="realFileInputND2" accept="image/*" name="icon_nilai_dasar_2" />
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

                <input type="file" id="realFileInputND3" accept="image/*" name="icon_nilai_dasar_3" />
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

                <input type="file" id="realFileInputND4" accept="image/*" name="icon_nilai_dasar_4" />
              </div>
            </div>
          </div>
        </div>


        <div class="form-actions">
          <div></div>
          <button type="button" class="btn-save" onclick="SubmitPengaturan('pengaturan_nilai_dasar')">
            <i class="fa-regular fa-floppy-disk"></i> Simpan</button>
        </div>

      </form>

      <form class="form-container" id="pengaturan_icon_visi_misi" enctype="multipart/form-data">
        <h1 class="change-password-title">Icon Visi-Misi</h1>

        <div class="settings-row">

          <div class="settings-card input-icon-card">
            <div class="settings-form settings-form-left">
              <div class="card">
                <div id="previewContainerND5" style="display: none;">
                  <p style="margin: 0 0 5px 0; font-size: 14px; color: rgb(29, 41, 57);">Preview:</p>
                  <img src="" id="imgPreviewND5" alt="Preview" />
                </div>

                <label class="form-label">Upload Icon Visi</label>

                <div class="custom-file-control">
                  <span class="action-btn" id="actionBtnND5"> Choose File </span>
                  <span class="file-name-display" id="fileNameTextND5">No file chosen</span>
                </div>

                <input type="file" id="realFileInputND5" accept="image/*" name="icon_visi"/>
              </div>
            </div>
          </div>

          <div class="settings-card input-icon-card">
            <div class="settings-form settings-form-right">
              <div class="card">
                <div id="previewContainerND6" style="display: none;">
                  <p style="margin: 0 0 5px 0; font-size: 14px; color: rgb(29, 41, 57);">Preview:</p>
                  <img src="" id="imgPreviewND6" alt="Preview" />
                </div>

                <label class="form-label">Upload Icon Misi</label>

                <div class="custom-file-control">
                  <span class="action-btn" id="actionBtnND6"> Choose File </span>
                  <span class="file-name-display" id="fileNameTextND6">No file chosen</span>
                </div>

                <input type="file" id="realFileInputND6" accept="image/*" name="icon_misi"/>
              </div>
            </div>
          </div>
        </div>

        <div class="settings-row">

          <div class="settings-card input-icon-card">
            <div class="settings-form settings-form-left">
              <div class="card">
                <div id="previewContainerND7" style="display: none;">
                  <p style="margin: 0 0 5px 0; font-size: 14px; color: rgb(29, 41, 57);">Preview:</p>
                  <img src="" id="imgPreviewND7" alt="Preview" />
                </div>

                <label class="form-label">Upload Icon Nilai Tujuan</label>

                <div class="custom-file-control">
                  <span class="action-btn" id="actionBtnND7"> Choose File </span>
                  <span class="file-name-display" id="fileNameTextND7">No file chosen</span>
                </div>

                <input type="file" id="realFileInputND7" accept="image/*" name="icon_tujuan"/>
              </div>
            </div>
          </div>

        </div>

        <div class="form-actions">
          <div></div>
          <button type="button" class="btn-save" onclick="SubmitPengaturan('pengaturan_icon_visi_misi')">
            <i class="fa-regular fa-floppy-disk"></i> Simpan</button>
        </div>

      </form>

      <form class="form-container" id="pengaturan_media_sosial" enctype="multipart/form-data">
        <h1 class="change-password-title">Media Sosial</h1>
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
                  <label class="social-label" for="input_url_instagram">Instagram</label>
                  <input
                    class="social-input"
                    id="input_url_instagram"
                    name="url_instagram"
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
                  <label class="social-label" for="input_url_facebook">Facebook</label>
                  <input
                    class="social-input"
                    id="input_url_facebook"
                    name="url_facebook"
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
                  <label class="social-label" for="input_url_youtube">Youtube</label>
                  <input
                    class="social-input"
                    id="input_url_youtube"
                    name="url_youtube"
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
                  <label class="social-label" for="input_email_sekolah">Email Sekolah</label>
                  <input
                    class="social-input"
                    id="input_email_sekolah"
                    name="email_sekolah"
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
                  <label class="social-label" for="input_nomor_telepon">Telepon</label>
                  <input
                    class="social-input"
                    id="input_nomor_telepon"
                    name="nomor_telepon"
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
                  <label class="social-label" for="input_alamat">Alamat</label>
                  <input
                    class="social-input"
                    id="input_alamat"
                    name="alamat"
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
                  <label class="social-label" for="input_url_maps">Tautan Google maps</label>
                  <input
                    class="social-input"
                    id="input_url_maps"
                    name="url_maps"
                    type="text"
                    required
                    placeholder="Masukkan Alamat Lengkap" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="form-actions social-media-actions">
          <div></div>
          <button type="button" class="btn-save" onclick="SubmitPengaturan('pengaturan_media_sosial')">
            <i class="fa-regular fa-floppy-disk"></i> Simpan</button>
        </div>
      </form>

      <form class="form-container" id="pengaturan_sandi" enctype="multipart/form-data">
        <h1 class="change-password-title">Ubah Kata Sandi</h1>
        <div class="settings-row">
          <div class="settings-card">
            <div class="settings-form settings-form-left">
              <div class="settings-info">
                <div class="settings-details">
                  <label class="settings-label" for="input_password_baru">Kata Sandi Baru</label>
                  <input
                    class="input-text"
                    id="input_password_baru"
                    name="password_baru"
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
                  <label class="settings-label" for="input_konfirmasi_password">Konfirmasi Kata Sandi Baru</label>
                  <input
                    class="input-text"
                    id="input_konfirmasi_password"
                    name="konfirmasi_password"
                    type="password"
                    placeholder="Masukkan Password Baru" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="form-actions">
          <div></div>
          <button type="button" class="btn-save" onclick="SubmitChangePassword()">
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
  <script src="./script/utility.js"></script>
  <script src="./script/pengaturan.js"></script>
  <script src="./script/input-icon.js"></script>
  <script src="./script/notification.js"></script>
  <script src="./script/hamburger-menu.js"></script>
</body>

</html>