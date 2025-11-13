<?php
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
    while(file_exists($target_path))
    {
        $counter++;
        $new_filename = $unique_id . '_' . $counter . '.' . $file_extension;
        $target_path = $target_dir . $new_filename;
    }

    return $target_path;
}

?>