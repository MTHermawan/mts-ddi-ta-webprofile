<?php
$asset_dir = realpath(__DIR__ . "/../assets/");

function GenerateImagePath($original_filename, $target_dir, $prefix = "")
{
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $unique_id = uniqid($prefix);
    $file_extension = pathinfo($original_filename, PATHINFO_EXTENSION);
    $new_filename = $unique_id . '.' . $file_extension;

    $target_path = $target_dir . $new_filename;

    $counter = 0;
    while (file_exists($target_path)) {
        $counter++;
        $new_filename = $unique_id . '_' . $counter . '.' . $file_extension;
        $target_path = $target_dir . $new_filename;
    }

    return $target_path;
}

function TambahFile($file_foto, $asset_subdir)
{
    global $asset_dir;
    $target_dir = $asset_dir ."/". $asset_subdir;

    if ($target_path = GenerateImagePath($file_foto['name'], $target_dir)) {
        if (move_uploaded_file($file_foto['tmp_name'], $target_path)) {
            $filename = basename($target_path);
            return $asset_subdir . $filename;
        }
    }
    return null;
}

function HapusFile($asset_file_url)
{
    global $asset_dir;
    $target_file = realpath($asset_dir ."/". $asset_file_url);
    
    if (file_exists($target_file))
        unlink($target_file);
}

function ReorganizeFilesArray($files_array)
{
    $reorganized = [];
    
    // Check if array is in the grouped format (name, type, tmp_name, error, size are arrays)
    if (isset($files_array['name']) && is_array($files_array['name'])) {
        $count = count($files_array['name']);
        
        for ($i = 0; $i < $count; $i++) {
            $reorganized[] = [
                'name' => $files_array['name'][$i],
                'full_path' => $files_array['full_path'][$i] ?? $files_array['name'][$i],
                'type' => $files_array['type'][$i],
                'tmp_name' => $files_array['tmp_name'][$i],
                'error' => $files_array['error'][$i],
                'size' => $files_array['size'][$i]
            ];
        }
    }
    
    return $reorganized;
}

?>