<?php
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$script_path = $_SERVER['SCRIPT_NAME'];

$path_parts = array_filter(explode('/', $script_path));
$project_folder = isset($path_parts[1]) ? $path_parts[1] : '';
$base_url = $protocol . $host . '/' . $project_folder . '/'; 

define('DOCUMENT_ROOT', $base_url);
define('ADMIN_PATH', $base_url . "admin/");
define('ASSET_PATH', $base_url . "assets/");
define('DATA_PATH', $base_url . "data/");
define('CURRENT_PAGE', basename($_SERVER['PHP_SELF']));

$project_root_fs = realpath(__DIR__ . '/../../') . DIRECTORY_SEPARATOR;
define('PROJECT_ROOT_FS', $project_root_fs);
define('ASSET_DIR', $project_root_fs . 'assets/');
define('ADMIN_DIR', $project_root_fs . 'admin/');
?>