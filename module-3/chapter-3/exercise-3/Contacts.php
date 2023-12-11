<?php

$host = 'localhost';
$dbname = 'contacts_db';
$username = 'root';
$password = '';

try
{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo '<h1>List of Contacts</h1>';
    echo '<table border="1">';
    echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th></tr>';

    $fetchModes = [
    PDO::FETCH_ASSOC => 'Fetch Mode: PDO::FETCH_ASSOC',
    PDO::FETCH_BOTH => 'Fetch Mode: PDO::FETCH_BOTH',
    PDO::FETCH_BOUND => 'Fetch Mode: PDO::FETCH_BOUND',
    PDO::FETCH_CLASS => 'Fetch Mode: PDO::FETCH_CLASS',
    PDO::FETCH_OBJ => 'Fetch Mode: PDO::FETCH_OBJ',
    ];

    foreach ($fetchModes as $fetchMode => $label)
    {
        echo '<tr><td colspan="4"><strong>' . $label . '</strong></td></tr>';
        $stmt = $conn->query('SELECT * FROM contacts');
        while ($row = $stmt->fetch($fetchMode))
        {
            echo '<tr><td>' . $row['id'] . '</td><td>' . $row['name'] . '</td><td>' . $row['email'] . '</td><td>' . $row['phone'] . '</td></tr>';
        }
    }

    echo '</table>';
} catch (PDOException $e)
{
    echo 'Error: ' . $e->getMessage();
}