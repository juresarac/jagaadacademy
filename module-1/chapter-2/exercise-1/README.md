# Exercise

## Word to number convert (exercise_5_lesson.php)

This PHP program converts word from zero to nine into their numerical values.

### Usage

- Run the program 
- Enter the words from zero to nine seperated by commas
- The program converts the words into numerical values and displays them

### Code explanation

This program starts by defining an array '$wordToNumber' that maps the word form zero to nine to their numerical version.

The user is prompted to enter the words and the input is converted to lowercase using 'strtolower' to avoid errors.

The 'explode' function is used to split the input string into an array of words using commas as the delimiter. The resulting array is then looped, and each word is checked if it exists in the '$wordToNumber' array using 'isset'. If the word exists its numerical value is added to the new array '$numbers'.

Finally, the program displays the converted values using the 'implode' function to join the values with commas.

## Creating local Git repository

The picture shows all the exercises being added and then committed using Git Bash.

<img src="https://github.com/jagaad-academy/classroom-be-2304-002-jure-sarac/blob/Initial/module-1/chapter-2/exercise-1/Snimka%20zaslona%20(105).png">

