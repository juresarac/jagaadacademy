<?php

$inputx = $argv[1];
$inputy = $argv[2];

if (!is_numeric($inputy) || !is_numeric($inputx) || $inputx >= $inputy){
    echo "Incorrect digits passed. Digits should be integers and x < y";
    exit;
}

for ($i = $inputx; $i <= $inputy; $i++ ){
    echo $i . "\n";
}
