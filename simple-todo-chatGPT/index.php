<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Todo (ChatGPT)</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Custom style -->
    <link rel="stylesheet" href="./main.css">
</head>
<body>
<h1>Todo List</h1>
    <form action="add_task.php" method="post">
        <input type="text" name="task" placeholder="Enter task...">
        <button type="submit">Add Task</button>
    </form>
    <ul>
        <?php include 'display_tasks.php'; ?>
    </ul>
</body>
</html>