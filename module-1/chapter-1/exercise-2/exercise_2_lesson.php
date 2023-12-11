<?php
/*Write a PHP program that prompts the user to enter their grade (out of 100) for a course and calculates their letter
 grade and percentage score based on a grading scale. The grading scale is as follows:

A: 90-100
B: 80-89
C: 70-79
D: 60-69
F: 0-59

Assume that the course is worth 3 credits and that the maximum possible points for the course is 4.0 per credit.
The program should use conditional statements to determine the user's letter grade and percentage score based on their grade,
and should use arithmetic operators to calculate the user's percentage score based on the number of credits for the course.
The program should then output a message that includes the user's grade, letter grade, and percentage score in the following format:

"Your grade of X corresponds to a letter grade of Y and a percentage score of Z%."

where X is the user's grade, Y is their letter grade, and Z is their percentage score rounded to two decimal places.*/
$grade = readline('Enter your grade : ');

if ($grade >= 90 && $grade <= 100){
    $letter_grade = 'A';
    $percentage_num = 4;
} elseif ($grade >=80 && $grade <= 89){
    $letter_grade = 'B';
    $percentage_num = 3;
} elseif ($grade >= 70 && $grade <= 79){
    $letter_grade = 'C';
    $percentage_num = 2;
} elseif ($grade >= 60 && $grade <= 69){
    $letter_grade = 'D';
    $percentage_num = 1;
} else {
    $letter_grade = 'F';
    $percentage_num = 0;
}
$num_score = $percentage_num * 3;
$percentage = $num_score / 12 *100;

echo "Your grade of $grade corresponds to a letter grade of $letter_grade and a percentage score of $percentage %.";

