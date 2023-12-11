<?php

$wordToNumber = array(
    "zero" => 0,
    "one" => 1,
    "two" => 2,
    "three" => 3,
    "four" => 4,
    "five" => 5,
    "six" => 6,
    "seven" => 7,
    "eight" => 8,
    "nine" => 9
);

$input = strtolower(readline("Enter words from zero to nine: ")); //making the user input to lowercase to avoid errors
$words = explode(", ", $input);
//$words = preg_split('/\W+/', $input); I found this to resolve the issue when the user inputs only backspace and not commas
$numbers  = array();
foreach ($words as $word){
    if (isset($wordToNumber[$word])) {
        $numbers[]  = $wordToNumber[$word];
    }
}
echo "The numbers are : " . implode(",", $numbers) . ".";