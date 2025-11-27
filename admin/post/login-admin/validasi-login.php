<?php include_once "../../../data/data_admin.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $input_email = htmlspecialchars($_POST['email']);
    $input_password = htmlspecialchars($_POST['password']);

    $data = array(
        'secret' => '0x4AAAAAACDLppK94AcGZ0NgzuJkrRRV8c4',
        'response' => $_POST['cf-turnstile-response'],
        'remoteip' => $_SERVER['REMOTE_ADDR']
    );

    $verify = curl_init();
    curl_setopt($verify, CURLOPT_URL, "https://challenges.cloudflare.com/turnstile/v0/siteverify");
    curl_setopt($verify, CURLOPT_POST, true);
    curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($verify);
    curl_close($verify);
    
    $responseData = json_decode($response);
    if (!$responseData->success) {
        $_SESSION['login_error'] = "Verfikasi CAPTCHA gagal. Silakan coba lagi.";
        header("Location: ../../login-admin.php");
        exit();
    }

    if ($data = ValidasiLogin($input_email, $input_password)) {
        $_SESSION['email'] = $data['email'];
        header("Location: ../../halaman-utama.php");
    }
    else
    {
        $_SESSION['login_error'] = "Email atau password salah.";
        header("Location: ../../login-admin.php");
    }
}

?>