<?php
if (file_exists('tasks.txt')) {
    $tasks = file('tasks.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($tasks as $task) {
        echo '<li>' . $task . ' <a href="delete_task.php?task=' . urlencode($task) . '">Delete</a></li>';
    }
}
?>