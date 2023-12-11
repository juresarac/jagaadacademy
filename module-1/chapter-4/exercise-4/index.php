<?php
require_once "app.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Do List</title>
    <meta name="description" content="First web-application.">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<form name="task-form" method="post" action="index.php">
    <div class="container">
        <div id="task-form" class="header">
            <h2>My To Do List</h2>
            <input type="text" name="title" placeholder="Title...">
            <button type="submit" name="add-task" value="1" class="addBtn">Add</button>
            <input type="hidden" name="taskIndex" value="#" />
            <button type="submit" name="clear-tasks" value="1" class="addBtn">Clear</button>
        </div>

        <ul id="task-list">
            <?php foreach ($tasks as $task) { ?>
                <li class="<?php echo (strtolower($task['status']) === 'done') ? 'checked' : ''; ?>">
                    <?php echo $task['taskName']; ?>
                    <button type="submit" name="remove-task" value="<?php echo $task['taskName']; ?>" class="close">×
                    </button>
                    <button type="submit" name="task-done" value="<?php echo $task['taskName']; ?>" class="close">V
                    </button>
                </li>
            <?php } ?>
        </ul>
    </div>
</form>
</body>

</html>

