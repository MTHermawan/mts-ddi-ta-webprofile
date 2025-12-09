<?php session_start();
require_once "./data/koneksi.php";
require_once "./data/utility.php";

define('IN_INDEX', true);

$base = "/" . basename(__DIR__);
define("BASE_URL", $base);

$dir_name = basename(__DIR__);
$raw_path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$raw_path = preg_replace('#/+#', '/', $raw_path);
if ($raw_path !== "/") {
  $raw_path = rtrim($raw_path, "/");
}
$path = trim($raw_path, '/');
$path = rtrim($path, "/");

$segments = $path ? explode("/", $path) : [];



$idx = array_search($dir_name, $segments);

if ($idx !== false) {
  $segments = array_slice($segments, $idx + 1);
}

if (!isset($segments[0])) {
  // include_once "./data/data_pengaturan.php";
  // include_once "./data/data_agenda.php";
  // include_once "./data/data_berita.php";
  // include_once "./data/data_galeri.php";
  require "./home.html";
  exit;
}

switch ($segments[0]) {
  case 'profile':
    if ($segments[1]) {
      switch ($segments[1]) {
        case 'ekskul':
          include_once "./data/data_ekskul.php";
          require "./profile/ekskul.php";
          exit;
        case 'fasilitas':
          include_once "./data/data_fasilitas.php";
          require "./profile/fasilitas.php";
          exit;
        case 'guru':
          include_once "./data/data_staff.php";
          require "./profile/guru.php";
          exit;
        case 'sejarah':
          include_once "./data/data_sejarah.php";
          require "./profile/sejarah.php";
          exit;
        case 'struktur-organisasi':
          include_once "./data/data_struktur_organisasi.php";
          require "./profile/struktur-organisasi.php";
          exit;
      }
    }
    break;

  case 'informasi':

    if (isset($segments[1])) {
      switch ($segments[1]) {
        case 'berita':
          include_once "./data/data_berita.php";
          $id_berita = isset($segments[2]) ? $segments[2] : null;
          if ($id_berita) {
            require "./informasi/adv-berita.php";
            exit;
          } else {
            require "./informasi/berita.php";
            exit;
          }
        case 'agenda':
          include_once "./data/data_agenda.php";
          $id_agenda = isset($segments[2]) ? $segments[2] : null;
          if ($id_agenda) {
            require "./informasi/adv-agenda.php";
            exit;
          } else {
            require "./informasi/agenda.php";
            exit;
          }
        case 'galeri':
          include_once "./data/data_galeri.php";
            require "./informasi/galeri.php";
      }
    }
    break;
}

http_response_code(404);
// echo json_encode([
//   "dir_name" => $dir_name,
//   "segments" => $segments
// ]);