<?php
if (isset($_GET['task'])) {
    $taskToDelete = $_GET['task'];
    $tasks = file('tasks.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $newTasks = array_diff($tasks, [$taskToDelete . PHP_EOL]);
    file_put_contents('tasks.txt', implode(PHP_EOL, $newTasks));
}
header('Location: index.php');
?>
