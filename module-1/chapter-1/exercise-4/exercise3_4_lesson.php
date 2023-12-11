<?php
$num_lines = readline("Input the number of lines to be writen: ");
$file = fopen("testt.txt","w");
echo ":: The lines are :: \n";
for ($i = 1; $i <= $num_lines; $i++){
    $line = readline("Enter line " . $i . ":");
    fwrite($file,$line . "\n");
}

fclose($file);

$file_content = file_get_contents("testt.txt");
echo "The content of the file testt.txt is: \n" . $file_content;