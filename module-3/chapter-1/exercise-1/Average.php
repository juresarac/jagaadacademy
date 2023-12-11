<?php
class Average {
    public function calculateAverage($num1, $num2, $num3) {
        $average = ($num1 + $num2 + $num3) / 3;
        echo "The average is: " . $average . "\n";
    }
}

$averageCalculator = new Average();
$num1 = (float) readline("Enter the first number: ");
$num2 = (float) readline("Enter the second number: ");
$num3 = (float) readline("Enter the third number: ");

$averageCalculator->calculateAverage($num1, $num2, $num3);


