<?php

function readFromFileJSON(string $fileName): array
{
    if (file_exists($fileName)) {
        $json = file_get_contents($fileName);
        return json_decode($json, true) ?? [];
    }
    return [];
}

function updateFileJSON(string $fileName, array $data): void
{
    $json = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($fileName, $json);
}

function addDataToFileJSON(string $fileName, string $data): void
{
    $tasks = readFromFileJSON($fileName);

    // Check if the task already exists
    $taskExists = false;
    foreach ($tasks as $task) {
        if ($task['taskName'] === $data) {
            $taskExists = true;
            break;
        }
    }

    // If the task dose not exist, add it
    if (!$taskExists) {
        $tasks[] = ['taskName' => $data, 'status' => 'not-done'];
        updateFileJSON($fileName, $tasks);
    }
}
