<?php
session_start();
include_once "../../../data/koneksi.php";
include_once "../../../data/data_admin.php";

$redirect_url = "../../login-admin.php";

function ValidateTurnstile($token, $secret, $remoteip = null)
{
    $url = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';

    $data = [
        'secret' => $secret,
        'response' => $token,
    ];

    if ($remoteip) {
        $data['remoteip'] = $remoteip;
    }

    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data),
        ],
    ];

    $context = stream_context_create($options);
    $response = @file_get_contents($url, false, $context);

    if ($response === FALSE) {
        return ['success' => false];
    }

    return json_decode($response, true);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $input_email = htmlspecialchars($_POST['email'] ?? '');
    $input_password = htmlspecialchars($_POST['password'] ?? '');

    $secret_key = '0x4AAAAAACDLppK94AcGZ0NgzuJkrRRV8c4';
    $token = $_POST['cf-turnstile-response'] ?? '';

    // Validasi Captcha Turnstile
    $validation = ValidateTurnstile($token, $secret_key);

    if (!$validation['success']) {
        $_SESSION['login_error'] = "Verifikasi CAPTCHA gagal. Silakan coba lagi.";
        header("Location: ../../login-admin.php");
    }

    $data = ValidasiLogin($input_email, $input_password);

    if ($data) {
        $_SESSION['email'] = $data['email'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['login_success_message'] = "Login berhasil!";

        if ((isset($_POST['remember']) && $_POST['remember'] == 'on' ) || true) {
            $remember_token = bin2hex(string: random_bytes(32));

            CreateRememberToken($data['email'], $remember_token, 30);

            setcookie(
                'admin_remember',
                $remember_token,
                [
                    'expires' => time() + (30 * 24 * 60 * 60), // 30 days
                    'path' => '/',
                    'secure' => isset($_SERVER['HTTPS']),
                    'httponly' => true,
                    'samesite' => 'Strict'
                ]
            );
        }

        $redirect_url = "../../pengaturan.php";
        if (isset($_SESSION['redirect_after_login'])) {
            $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
            $host = $_SERVER['HTTP_HOST'];
            $check_redirect = $protocol . $host . "/" . $_SESSION['redirect_after_login'];
            unset($_SESSION['redirect_after_login']);
            
            if (filter_var($check_redirect, FILTER_VALIDATE_URL)) {
                $redirect_url = $check_redirect;
            }
        }
    } else {
        $_SESSION['last_email_input'] = $input_email;
        $_SESSION['login_error'] = "Email atau password salah.";
    }
}
header("Location: $redirect_url");
?>