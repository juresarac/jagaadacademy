<?php
$input = [1, 3, 67, 1, 8, 34, 90, 2, 88, 1, 777, 1, 0, 3, 8, 2, 9, 7, 8, 6, 5];

function findMaxNumber($array) {
    $max = $array[0];

    foreach ($array as $number) {
        if ($number > $max) {
            $max = $number;
        }
    }

    return $max;
}

$maxNumber = findMaxNumber($input);
echo "The maximum number is: $maxNumber";

