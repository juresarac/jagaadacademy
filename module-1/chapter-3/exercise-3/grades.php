<?php
// Function to calculate the average grade
function calculateAverage($grades) {
    $sum = array_sum($grades);
    $count = count($grades);

    if ($count > 0) {
        return $sum / $count;
    } else {
        return 0;
    }
}

// Function to find the student with the highest grade
function findHighestGradeStudent($students) {
    $highestGrade = 0;
    $highestGradeStudent = '';

    foreach ($students as $student) {
        if ($student['grade'] > $highestGrade) {
            $highestGrade = $student['grade'];
            $highestGradeStudent = $student['name'];
        }
    }

    return $highestGradeStudent;
}

// Reading the number of students
$numberOfStudents = (int) readline('Enter the number of students: ');

// Creating an empty array to store student data
$students = [];

// Reading student data
for ($i = 1; $i <= $numberOfStudents; $i++) {
    echo "Student $i\n";
    $name = readline('Enter student name: ');
    $grade = (float) readline('Enter student grade: ');

    $student = [
        'name' => $name,
        'grade' => $grade,
    ];

    // Adding student data to the array
    $students[] = $student;
}

// Calculating average grade
$averageGrade = calculateAverage(array_column($students, 'grade'));

// Finding the student with the highest grade
$highestGradeStudent = findHighestGradeStudent($students);

// Displaying the average grade and student with the highest grade
echo "Average grade of the class: $averageGrade\n";
echo "Student with the highest grade: $highestGradeStudent\n";
