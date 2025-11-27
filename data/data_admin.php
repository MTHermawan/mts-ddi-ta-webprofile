<?php
include_once "koneksi.php";

function GetAllAdmin()
{
    global $koneksi;
    $sql = "SELECT * FROM admin";
    $result = mysqli_query($koneksi, $sql);
    
    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }
    
    return $result;
}

function GetAdminByUsername($email)
{
    global $koneksi;
    $email = mysqli_real_escape_string($koneksi, $email);
    $sql = "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($koneksi, $sql);
    
    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }
    
    return mysqli_fetch_assoc($result);
}

function ValidasiLogin($email, $password)
{
    $admin = GetAdminByUsername($email);
    $stored_hash = password_hash($admin['password'], PASSWORD_DEFAULT);
    
    if ($admin && password_verify($password, $stored_hash)) {
        return $admin;
    }
    
    return false;
}

function CreateRememberToken($email, $token, $expires_days = 30)
{
    global $koneksi;
    $email = mysqli_real_escape_string($koneksi, $email);
    $token = mysqli_real_escape_string($koneksi, $token);
    
    $expires_at = date('Y-m-d H:i:s', strtotime("+{$expires_days} days"));
    
    $sql = "INSERT INTO admin_remember_tokens (email, token, expires_at) 
            VALUES ('$email', '$token', '$expires_at')";
    $result = mysqli_query($koneksi, $sql);
    
    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }
    
    return true;
}

function ValidateRememberToken($token)
{
    global $koneksi;
    $token = mysqli_real_escape_string($koneksi, $token);
    
    // Check if token exists and hasn't expired
    $sql = "SELECT art.id, art.email, art.token, art.expires_at, a.* 
            FROM admin_remember_tokens AS art
            JOIN admin a ON art.email = a.email
            WHERE art.token = '$token' AND art.expires_at > NOW()";
    $result = $koneksi->query($sql);
    
    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }
    
    $admin = mysqli_fetch_assoc($result);
    
    if (!$admin) {
        // Token not found or expired, delete it
        DeleteRememberToken($token);
        return false;
    }
    
    return $admin;
}

function DeleteRememberToken($token)
{
    global $koneksi;
    $token = mysqli_real_escape_string($koneksi, $token);
    
    $sql = "DELETE FROM admin_remember_tokens WHERE token = '$token'";
    $result = mysqli_query($koneksi, $sql);
    
    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }
    
    return true;
}

function DeleteAdminRememberTokens($email)
{
    global $koneksi;
    $email = mysqli_real_escape_string($koneksi, $email);
    
    $sql = "DELETE FROM admin_remember_tokens WHERE email = '$email'";
    $result = mysqli_query($koneksi, $sql);
    
    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }
    
    return true;
}

function CleanupExpiredTokens()
{
    global $koneksi;
    
    $sql = "DELETE FROM admin_remember_tokens WHERE expires_at < NOW()";
    $result = mysqli_query($koneksi, $sql);
    
    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }
    
    return true;
}

function LogoutAdmin()
{
    global $koneksi;
    
    // Delete all remember tokens for this admin (logout all devices)
    if (isset($_SESSION['email'])) {
        DeleteAdminRememberTokens($_SESSION['email']);
    }
    
    session_destroy();
    setcookie('admin_remember', '', time() - 3600, '/');
}
?>