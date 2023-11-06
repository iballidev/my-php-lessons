<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = $_POST['task'];
    if (!empty($task)) {
        file_put_contents('tasks.txt', $task . PHP_EOL, FILE_APPEND);
    }
}
header('Location: index.php');
?>