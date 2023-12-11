<?php

$file_name = readline("Input the file name to be opend: ");

$file  = fopen($file_name, "r");

$file_content = fread($file, filesize($file_name));

fclose($file);

echo "The content of the file " . $file_name . " is: " . $file_content;