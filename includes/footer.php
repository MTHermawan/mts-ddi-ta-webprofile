<?php
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$script_path = $_SERVER['SCRIPT_NAME'];

$path_parts = array_filter(explode('/', $script_path));
$project_folder = isset($path_parts[1]) ? $path_parts[1] : '';
$base_url = $protocol . $host . '/' . $project_folder . '/';
?>

<footer id="footer">
    <div class="footer-container">
        <div class="footer-about">
            <h1>MTS DDI TANI AMAN</h1>
            <p>MTS DDI Tani Aman: Menjadi sekolah unggulan yang membentuk generasi Qur’ani, cerdas, dan berakhlak mulia
            </p>

            <ul>
                <li><img src="<?php echo $base_url; ?>assets/icon-alamat.png" alt="Alamat">Jl. Soekarno Hatta, Tani Aman, Kec. Loa Janan Ilir,
                    Kota Samarinda, Kalimantan Timur 75251</li>
                <li><img src="<?php echo $base_url; ?>assets/icon-email.png" alt="Email">www@</li>
                <li><img src="<?php echo $base_url; ?>assets/icon-telepon.png" alt="Telepon">0</li>
            </ul>
        </div>
        <div class="footer-menu">
            <h3>Menu</h3>
            <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Profil</a></li>
                <li><a href="#">Galeri</a></li>
                <li><a href="#">Informasi</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
        </div>
        <div class="footer-follow">
            <h3>Temukan Kami</h3>
            <ul>
                <li><a href="#">Youtube</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Instagram</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <ul>
            <li><a href="#">a</a></li>
            <li><a href="#">b</a></li>
            <li><a href="#">c</a></li>
            <li><a href="#">d</a></li>
            <li><a href="#">e</a></li>
        </ul>
        <p>P</p>
    </div>
</footer>