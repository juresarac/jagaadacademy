<?php
$input = "1,5,6,2,7,1,8,3,9,7,8";

// Explode the input into an array
$inputArray = explode(",", $input);

// Remove duplicates using array_unique
$uniqueArray = array_unique($inputArray);

// Generate the output string
$output = implode(",", $uniqueArray);

// Output the result
echo $output;


