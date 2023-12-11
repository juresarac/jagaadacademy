<?php

$input = readline("Enter a digit: ");

if (!is_numeric($input) || $input === "") {
    echo "Incorrect number passed. Number should be integer.";
    exit();
}

$binary = str_pad(decbin($input), 8, "0", STR_PAD_LEFT);

echo $binary;
