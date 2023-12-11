<?php
$fileName = 'data.json';

if (!empty($_POST)) {
    $newTaskName = $_POST['title'] ?? '';
    handleActions($fileName, $newTaskName);
    $tasks = readFromFileJSON($fileName);
}

