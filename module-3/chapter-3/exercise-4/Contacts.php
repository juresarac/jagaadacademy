<?php

$host = 'localhost';
$dbname = 'contacts_db';
$username = 'root';
$password = '';

try
{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $orderBy = isset($_GET['colToSort']) ? $_GET['colToSort'] : 'id';
    $sort = isset($_GET['sort']) && strtoupper($_GET['sort']) === 'DESC' ? 'DESC' : 'ASC';

    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

    echo '<h1>List of Contacts</h1>';

    echo '<form method="GET">';
    echo 'Search: <input type="text" name="search" value="' . htmlspecialchars($searchTerm) . '">';
    echo '<input type="submit" value="Search">';
    echo '</form>';

    $fetchMode = PDO::FETCH_ASSOC;

    echo '<table border="1">';
    echo '<tr>';
    echo '<th><a href="?colToSort=id&sort=' . ($sort === 'ASC' ? 'DESC' : 'ASC') . '">ID</a></th>';
    echo '<th><a href="?colToSort=name&sort=' . ($sort === 'ASC' ? 'DESC' : 'ASC') . '">Name</a></th>';
    echo '<th><a href="?colToSort=email&sort=' . ($sort === 'ASC' ? 'DESC' : 'ASC') . '">Email</a></th>';
    echo '<th><a href="?colToSort=phone&sort=' . ($sort === 'ASC' ? 'DESC' : 'ASC') . '">Phone</a></th>';
    echo '</tr>';

    $stmt = $conn->prepare('SELECT * FROM contacts WHERE name LIKE :searchTerm ORDER BY ' . $orderBy . ' ' . $sort);
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
    $stmt->execute();

    while ($row = $stmt->fetch($fetchMode))
    {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['phone'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} catch (PDOException $e)
{
    echo 'Error: ' . $e->getMessage();
}
