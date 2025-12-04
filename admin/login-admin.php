<?php 
session_start();
include_once "../data/koneksi.php";
include_once "../data/data_admin.php";

if (rand(1, 100) === 1) {
    CleanupExpiredTokens();
}

// if (isset($_SESSION['email'])) {
//     header("Location: ./halaman-utama.php");
//     exit();
// }

// if (isset($_COOKIE['admin_remember'])) {
//     $admin = ValidateRememberToken($_COOKIE['admin_remember']);
//     if ($admin) {
//         $_SESSION['email'] = $admin['email'];
//         header("Location: ./halaman-utama.php");
//         exit();
//     }
// }

$error_message = '';
if (isset($_SESSION['login_error'])) {
    $error_message = $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}

if (isset($_SESSION['last_email_input'])) {
    $last_email_input = $_SESSION['last_email_input'];
    unset($_SESSION['last_email_input']);
} else {
    $last_email_input = '';
}

?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Login</title>
    <link rel="icon" href="../assets/logo-sekolah.png" type="image/png/jpeg/jpg">
    <link rel="stylesheet" href="./style/login-admin.css" />
    <link rel="preconnect" href="https://challenges.cloudflare.com">
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
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
            <div class="email">  
              <label class="email-label" for="email">Email -> Note: <font color="red">admin@mtsddi.sch.id</font></label>
              <input
                id="email"
                name="email"
                type="email"
                required
                placeholder="email@gmail.com"
                value="<?php echo htmlspecialchars($last_email_input); ?>"
              />
            </div>
            <div class="password">
              <label class="password-label" for="password">Kata Sandi -> Note: <font color="red">admin123</font></label>
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
            <?php if (!empty($error_message)): ?>
              <p class="message-error">
                <?php echo htmlspecialchars($error_message); ?>
              </p>
            <?php endif ?>
            <div class="captcha"> 
              <label class="captcha-label" for="password">Captcha</label>
              <div class="cf-turnstile" data-sitekey="0x4AAAAAACDLpnaIbrSMA1VB"></div>
            </div>
            <button type="submit">Login</button>
          </form>
        </div>
      </div>
    </div>
  </body>
  <script src="./script/login-admin.js"></script>
</html>
