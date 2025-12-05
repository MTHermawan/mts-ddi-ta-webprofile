<?php
include_once "koneksi.php";
include_once "utility.php";

function GetAdmin($email = null)
{
    global $koneksi;

    $admin = [];
    try {
        $sql = "SELECT * FROM admin";
        if ($email !== null) {
            $sql .= " WHERE email = ?";
        }

        $stmt = $koneksi->prepare($sql);

        if ($email !== null) {
            $stmt->bind_param("s", $email);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        $admin = $result->fetch_assoc();

        $result->close();
        $koneksi->next_result();

    } catch (Exception $e) {
        SendServerError($e);
    }
    return $admin;
}


function ValidasiLogin($email, $password)
{
    $admin = GetAdmin($email);
    $stored_hash = password_hash($admin['password'], PASSWORD_DEFAULT);

    if (!($admin && password_verify($password, $stored_hash))) {
        // Password salah
        return null;
    }

    return $admin;
}

function CreateRememberToken($email, $token, $expires_days = 30)
{
    global $koneksi;

    $success = false;
    try {
        $email = mysqli_real_escape_string($koneksi, $email);
        $token = mysqli_real_escape_string($koneksi, $token);
        $expires_at = date('Y-m-d H:i:s', strtotime("+{$expires_days} days"));

        $sql = "INSERT INTO admin_remember_tokens (email, token, expires_at) VALUES (?, ?, ?)";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param('sss', $email, $token, $expires_at);
        $stmt->execute();
        
        $success = true;
    } catch (Exception $e) {
        SendServerError($e);
    }
    return $success;
}

function ValidateRememberToken($token)
{
    global $koneksi;
    $admin = null;

    try {
        $token = mysqli_real_escape_string($koneksi, $token);

        // Periksa jika token belum kadaluarsa
        $sql = "SELECT art.id, art.email, art.token, art.expires_at, a.* 
                FROM admin_remember_tokens AS art
                JOIN admin a ON art.email = a.email
                WHERE art.token = ? AND art.expires_at > NOW()";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param('s', $token);
        $stmt->execute();

        $result = $stmt->get_result();
        $admin = $result->fetch_assoc();

        if (!$admin) {
            // Token tidak ditemukan atau sudah kadaluarsa, maka dihapus
            DeleteRememberToken($token);
            return null;
        }
    } catch (Exception $e) {
        SendServerError($e);
    }
    return $admin;
}

function DeleteRememberToken($token)
{
    global $koneksi;

    $success = false;
    try {
        $token = mysqli_real_escape_string($koneksi, $token);
        
        $sql = "DELETE FROM admin_remember_tokens WHERE token = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param('s', $token);
        $stmt->execute();
        
        $success = true;
    } catch (Exception $e) {
        SendServerError($e);
    }
    return $success;
}

function DeleteAdminRememberTokens($email)
{
    global $koneksi;
    
    $success = false;
    try {
        $email = mysqli_real_escape_string($koneksi, $email);

        $sql = "DELETE FROM admin_remember_tokens WHERE email = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();

        $success = true;
    } catch (Exception $e) {
        SendServerError($e);
    }
    return $success;
}

function CleanupExpiredTokens()
{
    global $koneksi;

    $success = false;
    try {
        $sql = "DELETE FROM admin_remember_tokens WHERE expires_at < NOW()";
        $koneksi->query($sql);
        $success = true;
    } catch (Exception $e) {
        SendServerError($e);
    }
    return $success;
}

function LogoutAdmin()
{
    if (isset($_SESSION['email'])) {
        DeleteAdminRememberTokens($_SESSION['email']);
    }

    session_destroy();
    setcookie('admin_remember', '', time() - 3600, '/');
}

function UpdatePassword($password_baru, $password_konfirmasi, $email)
{
    global $koneksi;
    $success = false;
    try {
        if (!strcmp($password_baru, $password_konfirmasi))
            throw new Exception("Konfirmasi password gagal!");

        $sql = "UPDATE admin SET password = ? WHERE email = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("s", $password_baru, $email);
        $stmt->execute();
        $stmt->close();

        $success = true;
    } catch (Exception $e) {
        SendServerError($e);
    }
    return $success;
}
?>