<?php
function RemoveProperties($data, $properties)
{
    for ($i=0; $i < count($data); $i++) {
        for ($j=0; $j < count($properties); $j++) { 
            unset($data[$i][$properties[$j]]);
        } 
    }
    return $data;
}


?>