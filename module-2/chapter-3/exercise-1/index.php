<?php


$mysqli = new mysqli(
    'localhost',
    'root',
    '',
    'Corp'
);

if ($mysqli->connect_errno)
{
    echo 'Failed to connect to MySQL: ' . $mysqli->connect_error;
    exit;
}

$createTableQuery = "CREATE TABLE Employees (
    id INT PRIMARY KEY,
    name VARCHAR(50),
    age INT,
    department VARCHAR(50),
    salary DECIMAL(10, 2)
)";

if ($mysqli->query($createTableQuery) === TRUE) {
    echo "Table created successfully" . PHP_EOL;
} else {
    echo "Error creating table: " . $mysqli->error;
    exit;
}


$insertQuery = "INSERT INTO Employees
    VALUES
    (1, 'Jure', 25, 'IT', 1000),
    (2, 'Filipa', 21, 'Marketing', 3000),
    (3, 'Klara', 22, 'IT', 2000),
    (4, 'Lutko', 45, 'Sales', 4000),
    (5, 'Zvonko', 33, 'IT', 6000)
";

if ($mysqli->query($insertQuery) === TRUE) {
    echo "Records inserted successfully" . PHP_EOL;
} else {
    echo "Error inserting records: " . $mysqli->error;
    exit;
}


$selectQuery = "SELECT * FROM Employees";


$updateQuery = "UPDATE Employees SET salary = salary * 1.1 WHERE id = 1";

if ($mysqli->query($updateQuery) === TRUE) {
    echo "Salary updated successfully" . PHP_EOL;
} else {
    echo "Error updating salary: " . $mysqli->error;
}

$deleteQuery = "DELETE FROM Employees WHERE id = 3";

if ($mysqli->query($deleteQuery) === TRUE) {
    echo "Employee deleted successfully" . PHP_EOL;
} else {
    echo "Error deleting employee: " . $mysqli->error;
}

$addColumnQuery = "ALTER TABLE Employees ADD position VARCHAR(50)";

if ($mysqli->query($addColumnQuery) === TRUE) {
    echo "Column added successfully" . PHP_EOL;
} else {
    echo "Error adding column: " . $mysqli->error;
}

$truncateTableQuery = "TRUNCATE TABLE Employees";

if ($mysqli->query($truncateTableQuery) === TRUE) {
    echo "Table truncated successfully" . PHP_EOL;
} else {
    echo "Error truncating table: " . $mysqli->error;
}


$dropTableQuery = "DROP TABLE Employees";
if ($mysqli->query($dropTableQuery) === TRUE) {
    echo "Table dropped successfully" . PHP_EOL;
} else {
    echo "Error dropping table: " . $mysqli->error;
}


