<?php

$input = readline("Input a sentence for the file: ");

$file = fopen("test.txt", "w");

fwrite($file, $input);

fclose($file);

echo "The file test.txt created successfully";