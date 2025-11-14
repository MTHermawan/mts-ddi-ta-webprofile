<?php include_once "../data/koneksi.php";
include_once "../data/data_admin.php";

$error_message = '';


?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Login</title>
    <link rel="stylesheet" href="./style/login-admin.css" />
  </head>

  <body>
    <header class="header">
      <div class="logo">
        <img src="../assets/logo-sekolah.png" alt="logo MTs DDI TA" />
        <p>MTs DDI Tani Aman</p>
      </div>
      <div></div>
    </header>
    <div class="container">
      <div class="login-container">
        <div class="image-container">
          <img src="../assets/login.jpg" alt="logo login" />
        </div>
        <div class="form-container">
          <h2 class="login-header">Login</h2>
          <p class="login-description">
            Masukkan email dan kata sandi untuk masuk ke akun Anda.
          </p>
          <form action="./post/login-admin/validasi-login.php" method="POST" class="login-form">
            <label class="email-label" for="email">Email</label>
            <input
              id="email"
              name="email"
              type="email"
              required
              placeholder="email@gmail.com"
            />
            <div class="password">
              <label class="password-label" for="password">Kata Sandi</label>
              <input
                id="password"
                name="password"
                type="password"
                required
                placeholder="Masukkan kata sandi"
              />
              <img
                class="visibility-logo"
                src="../assets/hide.svg"
                alt="logo show"
              />
            </div>
            <div class="form-options">
              <label> <input type="checkbox" /> Ingat saya </label>
            </div>
            <p class="message-error">
              <?php echo htmlspecialchars($error_message); ?>
            </p>
            <button type="submit">Login</button>
          </form>
        </div>
      </div>
    </div>
  </body>
  <script src="./script/login-admin.js"></script>
</html>
