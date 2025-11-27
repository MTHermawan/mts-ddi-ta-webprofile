<?php 
session_start();
include_once "../../../data/koneksi.php";
include_once "../../../data/data_admin.php";

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
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
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
        exit();
    }

    $data = ValidasiLogin($input_email, $input_password);
    
    if ($data) {
        $_SESSION['admin_email'] = $data['email'];

        if (isset($_POST['remember']) && $_POST['remember'] == 'on') {
            $remember_token = bin2hex(random_bytes(32));
            
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

        header("Location: ../../halaman-utama.php");
        exit();

    } else {
        $_SESSION['last_email_input'] = $input_email;
        $_SESSION['login_error'] = "Email atau password salah.";
        header("Location: ../../login-admin.php");
        exit();
    }
} else {
    header("Location: ../../login-admin.php");
    exit();
}
?>