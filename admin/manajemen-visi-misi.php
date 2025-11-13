<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="./style/dashboard.css" />
    <link rel="stylesheet" href="./style/manajemen-visi-misi.css" />
    <link
      rel="icon"
      href="../assets/logo-sekolah.png"
      type="image/png/jpeg/jpg"
    />
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
      <h1 class="menu-title">Visi Misi</h1>

      <!-- Main Content -->
      <div class="main-content">
        <!-- main content row 21-->
        <div class="container">
          <!-- main content row 24 -->
          <form action="" class="form">
            <div class="card">
              <div class="card-detail">
                <div class="card-header">
                  <div class="card-logo">
                    <img
                      src="../assets/icon-visi.svg"
                      alt="visi-misi Icon"
                    />
                  </div>
                  <label class="card-label" for="visi"
                    >Visi Sekolah</label
                  >
                </div>
                <div class="card-input">
                  <div class="card-input-detail">
                    <textarea
                      class="visi"
                      name="visi"
                      placeholder="Visi MTs Tani Aman"
                    ></textarea>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-detail">
                <div class="card-header">
                  <div class="card-logo">
                    <img
                      src="../assets/icon-misi.svg"
                      alt="visi-misi Icon"
                    />
                  </div>
                  <label class="card-label" for="misi"
                    >Misi Sekolah</label
                  >
                </div>
                <div class="card-input">
                  <div class="card-input-detail">
                    <textarea
                      class="misi"
                      name="misi"
                      placeholder="Misi MTs Tani Aman"
                    ></textarea>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-detail">
                <div class="card-header">
                  <div class="card-logo">
                    <img
                      src="../assets/icon-tujuan.svg"
                      alt="visi-misi Icon"
                    />
                  </div>
                  <label class="card-label" for="tujuan"
                    >Tujuan Sekolah</label
                  >
                </div>
                <div class="card-input">
                  <div class="card-input-detail">
                    <textarea
                      class="tujuan"
                      name="tujuan"
                      id="tujuan"
                      placeholder="Visi Misi MTs Tani Aman"
                    ></textarea>
                  </div>
                </div>
              </div>
            </div>

            <div class="button-container">
              <div></div>
              <button class="button">
                <i class="fa-regular fa-floppy-disk"></i> Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="./script/dashboard-admin.js"></script>
  </body>
</html>
