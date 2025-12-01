<?php
include_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "path.php";

if (isset($_GET['url'])) {
    $clean_path = PROJECT_ROOT_FS . $_GET['url'];
    if (file_exists($clean_path))
    {
        echo json_encode(['found' => true, 'path' => $clean_path]);
    }
    else
    {
        echo json_encode(['found' => false, 'path' => $clean_path]);
    }
} else {
    http_response_code(400);
    echo json_encode(['found' => false, 'error' => 'No URL provided']);
}

header('Content-Type: application/json');
?>