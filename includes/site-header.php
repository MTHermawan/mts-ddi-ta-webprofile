<?php
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$script_path = $_SERVER['SCRIPT_NAME'];

$path_parts = array_filter(explode('/', $script_path));
$project_folder = isset($path_parts[1]) ? $path_parts[1] : '';
$base_url = $protocol . $host . '/' . $project_folder . '/';
?>

<div class="site-header">
    <div class="container-header">
        <div class="left-header">
            <p><img src="<?php echo $base_url; ?>assets/icon-alamat.png" alt="Alamat" class="icon-header">Jl. Soekarno
                Hatta, Tani Aman, Kec. Loa Janan Ilir, Kota Samarinda.</p>
            <p><img src="<?php echo $base_url; ?>assets/icon-email.png" alt="Email" class="icon-header">email sekolah
            </p>
        </div>

        <div class="right-header">
            <a href="#"><img src="<?php echo $base_url; ?>assets/icon-youtube.png" alt="Youtube"
                    class="social-icon"></a>
            <a href="#"><img src="<?php echo $base_url; ?>assets/icon-facebook.png" alt="Facebook"
                    class="social-icon"></a>
            <a href="#"><img src="<?php echo $base_url; ?>assets/icon-instagram.png" alt="Instagram"
                    class="social-icon"></a>
        </div>
    </div>
</div>