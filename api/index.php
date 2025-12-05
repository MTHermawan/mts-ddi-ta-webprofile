<?php
define('IN_API', true);

header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST");

$path = trim($_SERVER["REQUEST_URI"], '/');
$path = preg_replace('#^[^/]*/api/#', '', $path);
$path = explode('?', $path)[0];
$segments = explode("/", $path);

if ($segments[0] === "staff") {
    $id_staff = $segments[1] ?? null;
    require "./controllers/staff.php";
    exit;
}
else if ($segments[0] === "ekskul") {
    $id_ekskul = $segments[1] ?? null;
    require "./controllers/ekskul.php";
    exit;
}
else if ($segments[0] === "fasilitas") {
    $id_fasilitas = $segments[1] ?? null;
    require "./controllers/fasilitas.php";
    exit;
}
else if ($segments[0] === "galeri") {
    $id_galeri = $segments[1] ?? null;
    require "./controllers/galeri.php";
    exit;
}
else if ($segments[0] === "agenda") {
    $id_agenda = $segments[1] ?? null;
    require "./controllers/agenda.php";
    exit;
}
else if ($segments[0] === "berita") {
    $id_berita = $segments[1] ?? null;
    require "./controllers/berita.php";
    exit;
}
else if ($segments[0] === "sejarah") {
    $id_sejarah = $segments[1] ?? null;
    require "./controllers/sejarah.php";
    exit;
}
else if ($segments[0] === "struktur_organisasi") {
    $id_sejarah = $segments[1] ?? null;
    require "./controllers/struktur_organisasi.php";
    exit;
}

echo json_encode(["error" => "Endpoint not found"]);
