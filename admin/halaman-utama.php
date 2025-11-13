<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="./style/dashboard.css" />
    <link rel="stylesheet" href="./style/halaman-utama.css" />
    <link rel="icon" href="../assets/logo-sekolah.png" type="image/png/jpeg/jpg">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
  </head>
  <body>
    <!-- Sidebar -->
    <?php include "./includes/sidebar.php"; ?>

    <!-- Main -->
    <div class="main">
      <!-- Header Navbar -->
      <?php include "./includes/header.php" ?>

      <!-- Title Menu -->
      <h1 class="menu-title">Halaman Utama</h1>

      <!-- Main Content -->
      <div class="main-content">
        <!-- main content row 1 -->
        <div class="row1">
          <div class="card-row1">
            <div class="card-detail-row1">
              <div class="card-logo-row1">
                <img src="../assets/icon-student.png" alt="Student Icon" />
              </div>
              <div class="card-info-row1">
                <div class="vertical-divider"></div>
                <div class="card-info-row1-detail">
                  <h2 class="card-title-row1">Siswa</h2>
                  <p class="card-amount-row1">220</p>
                </div>
              </div>
              <div class="btn-container-row1">
                <div></div>
                <button class="button-card-row1"><i class="fa-regular fa-pen-to-square"></i> Edit</button>
              </div>
            </div>
          </div>
          <div class="card-row1">
            <div class="card-detail-row1">
              <div class="card-logo-row1">
                <img src="../assets/icon-teacher.png" alt="teacher Icon" />
              </div>
              <div class="card-info-row1">
                <div class="vertical-divider"></div>
                <div class="card-info-row1-detail">
                  <h2 class="card-title-row1">Guru</h2>
                  <p class="card-amount-row1">20</p>
                </div>
              </div>
              <div class="btn-container-row1">
                <div></div>
                <button class="button-card-row1"><i class="fa-regular fa-pen-to-square"></i> Edit</button>
              </div>
            </div>
          </div>
          <div class="card-row1">
            <div class="card-detail-row1">
              <div class="card-logo-row1">
                <img src="../assets/icon-graduate.png" alt="graduate Icon" />
              </div>
              <div class="card-info-row1">
                <div class="vertical-divider"></div>
                <div class="card-info-row1-detail">
                  <h2 class="card-title-row1">Lulusan</h2>
                  <p class="card-amount-row1">1,110</p>
                </div>
              </div>
              <div class="btn-container-row1">
                <div></div>
                <button class="button-card-row1"><i class="fa-regular fa-pen-to-square"></i> Edit</button>
              </div>
            </div>
          </div>
          <div class="card-row1">
            <div class="card-detail-row1">
              <div class="card-logo-row1">
                <img
                  src="../assets/icon-extracurricular.svg"
                  alt="Extracurricular Icon"
                />
              </div>
              <div class="card-info-row1">
                <div class="vertical-divider"></div>
                <div class="card-info-row1-detail">
                  <h2 class="card-title-row1">Ekstrakulikuler</h2>
                  <p class="card-amount-row1">8</p>
                </div>
              </div>
              <div class="btn-container-row1">
                <div></div>
                <button class="button-card-row1"><i class="fa-regular fa-pen-to-square"></i> Edit</button>
              </div>
            </div>
          </div>
        </div>

        <!-- main content row 21-->
        <div class="container-row2">
          <div class="row2">
            <div class="card-row2">
              <form action="" class="card-detail-row2">
                <div class="card-logo-row2">
                  <img
                    src="../assets/icon-instagram.png"
                    alt="instagram Icon"
                  />
                </div>
                <div class="card-info-row2">
                  <div class="card-info-row2-detail">
                    <label class="card-title-row2" for="instagram"
                      >Instagram</label
                    >
                    <input
                      id="instagram"
                      name="instagram"
                      type="text"
                      required
                      placeholder="https://instagram.com/....."
                    />
                  </div>
                </div>
              </form>
            </div>

            <div class="card-row2">
              <form action="" class="card-detail-row2">
                <div class="card-logo-row2">
                  <img src="../assets/icon-facebook.png" alt="facebook Icon" />
                </div>
                <div class="card-info-row2">
                  <div class="card-info-row2-detail">
                    <label class="card-title-row2" for="facebook"
                      >Facebook</label
                    >
                    <input
                      id="facebook"
                      name="facebook"
                      type="text"
                      required
                      placeholder="https://facebook.com/....."
                    />
                  </div>
                </div>
              </form>
            </div>
          </div>

          <!-- main content row 22 -->
          <div class="row2">
            <div class="card-row2">
              <form action="" class="card-detail-row2">
                <div class="card-logo-row2">
                  <img src="../assets/icon-youtube.png" alt="youtube Icon" />
                </div>
                <div class="card-info-row2">
                  <div class="card-info-row2-detail">
                    <label class="card-title-row2" for="youtube">Youtube</label>
                    <input
                      id="youtube"
                      name="youtube"
                      type="text"
                      required
                      placeholder="https://youtube.com/....."
                    />
                  </div>
                </div>
              </form>
            </div>

            <div class="card-row2 card-right">
              <form action="" class="card-detail-row2">
                <div class="card-logo-row2">
                  <img src="../assets/icon-email.png" alt="email Icon" />
                </div>
                <div class="card-info-row2">
                  <div class="card-info-row2-detail">
                    <label class="card-title-row2" for="email">Email</label>
                    <input
                      id="email"
                      name="email"
                      type="text"
                      required
                      placeholder="email@example.com"
                    />
                  </div>
                </div>
              </form>
            </div>
          </div>

          <!-- main content row 23 -->
          <div class="row2 row23">
            <div class="card-row2 card23">
              <form action="" class="card-detail-row2">
                <div class="card-logo-row2">
                  <img
                    src="../assets/icon-alamat.png"
                    alt="Extracurricular Icon"
                  />
                </div>
                <div class="card-info-row2">
                  <div class="card-info-row2-detail">
                    <label class="card-title-row2" for="location">Alamat</label>
                    <input
                      id="location"
                      name="location"
                      type="text"
                      required
                      placeholder="Masukkan Alamat Lengkap"
                    />
                  </div>
                </div>
              </form>
            </div>
          </div>

          <!-- main content row 24 -->
          <div class="row2">
            <div class="card-row2 card24">
              <form action="" class="card-detail-row2">
                <div class="card-logo-row2">
                  <img
                    src="../assets/icon-link.svg"
                    alt="Extracurricular Icon"
                  />
                </div>
                <div class="card-info-row2">
                  <div class="card-info-row2-detail">
                    <label class="card-title-row2" for="maps"
                      >Tautan Google maps</label
                    >
                    <input
                      id="maps"
                      name="maps"
                      type="text"
                      value="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6104228699833!2d117.09752919999998!3d-0.584908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df6813f36fcb987%3A0x2a58352fcfdf7056!2sMTs%20DDI%20Tani%20Aman!5e0!3m2!1sid!2sid!4v1762111103905!5m2!1sid!2sid"
                      required
                      placeholder="Masukkan Alamat Lengkap"
                    />
                  </div>
                </div>
              </form>
            </div>
          </div>
          
          <div class="button-container">
            <div></div>
            <button class="button-row2"> 
             <i class="fa-regular fa-floppy-disk"></i> Simpan</button>
          </div>

        </div>
      </div>
    </div>
    <script src="./script/dashboard-admin.js"></script>
  </body>
</html>
