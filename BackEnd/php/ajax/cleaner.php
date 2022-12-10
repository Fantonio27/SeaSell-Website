<?php
function cleandata($input)
 {
    $data = trim($input);
    $output = htmlspecialchars($data);
    return $output;
 }
