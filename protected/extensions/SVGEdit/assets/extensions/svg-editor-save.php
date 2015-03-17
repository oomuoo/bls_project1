<?php

    $svg = $saveData; $svg_data = urldecode($svg); 
    $file = "saved.svg"; 
    $fh = fopen($file, "w") or die("Can't open file"); 
    fwrite($fh, $svg_data); 
    fclose($fh); 

?> 
