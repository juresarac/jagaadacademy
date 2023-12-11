<?php
/*Task: Implement a program in PHP that sorts an array of integers using different sorting algorithms.
The program should use a function to generate a random array of integers and display the unsorted and sorted arrays.

Here are the requirements for the program:
The program should prompt the user for the number of elements to generate in the array.
Use a function to generate an array of random integers based on the user's input.
Display the unsorted array to the user. Sort this array with Bubble Sort algorithm.
Display the sorted array to the user.

Here's an example of the expected output:

Enter the number of elements to generate: 10
Unsorted Array:
[72, 15, 69, 1, 62, 95, 8, 51, 55, 39]

Sorted Array:
[1, 8, 15, 39, 51, 55, 62, 69, 72, 95]*/
$inputNum = readline("Enter the number of element to generate an array: ");
$random_array = array();
for($i = 0; $i < $inputNum; $i++) {
    $random_array[] = rand (1,100);
}
echo 'Unsorted Array:' . PHP_EOL . '[';
foreach ($random_array as $unsortedArray){
    echo " $unsortedArray " ;
}
echo ']' . PHP_EOL;

//bubble sort
$size = count($random_array)-1;
for ($i=0; $i<$size; $i++) {
    for ($j=0; $j<$size-$i; $j++) {
        $k = $j+1;
        if ($random_array[$k] < $random_array[$j]) {
            list($random_array[$j], $random_array[$k]) = array($random_array[$k], $random_array[$j]);
        }
    }
}

echo 'Sorted Array :' . PHP_EOL . '[';

foreach ($random_array as $sortedArray){
    echo " $sortedArray " ;
}
echo ']';

