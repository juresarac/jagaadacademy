<?php
declare(strict_types=1);

require_once "json.php";
require_once "actions.php";
require_once "routing.php";

$fileName = 'data.json';

$tasks = readFromFileJSON($fileName);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newTaskName = $_POST['title'] ?? '';
    handleActions($fileName, $newTaskName);
}

