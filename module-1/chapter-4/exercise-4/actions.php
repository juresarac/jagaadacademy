<?php

function addTask(string $fileName, string $newTaskName): void
{
    if (!empty($newTaskName)) {
        addDataToFileJSON($fileName, $newTaskName);
    }
}

function removeTask(string $fileName): void
{
    $tasks = readFromFileJSON($fileName);
    $taskToRemove = $_POST['remove-task'];
    $tasks = array_filter($tasks, function ($task) use ($taskToRemove) {
        return $task['taskName'] !== $taskToRemove;
    });
    updateFileJSON($fileName, $tasks);
}

function changeTaskStatus(string $fileName): void
{
    $tasks = readFromFileJSON($fileName);
    $taskToBeMarkedAsDone = $_POST['task-done'];
    foreach ($tasks as &$task) {
        if ($task['taskName'] === $taskToBeMarkedAsDone) {
            $task['status'] = 'done';
        }
    }
    unset($task); // Unset reference
    updateFileJSON($fileName, $tasks);
}
function handleActions(string $fileName, string $newTaskName): void
{
    if (isset($_POST['add-task']) && $_POST['add-task'] == 1) {
        addTask($fileName, $newTaskName);
    } elseif (isset($_POST['clear-tasks']) && $_POST['clear-tasks'] == 1) {
        clearAndWriteTheFileJSON($fileName);
    } elseif (isset($_POST['remove-task']) && !empty($_POST['remove-task'])) {
        removeTask($fileName);
    } elseif (isset($_POST['task-done']) && !empty($_POST['task-done'])) {
        changeTaskStatus($fileName);
    }
}
