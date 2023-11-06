<?php include("./includes/connection.php"); ?>
<?php include("./includes/functions.php"); ?>

<?php
$todo_set = get_all_todos(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Custom style -->
    <link rel="stylesheet" href="./todo.css">
</head>

<body>

    <main class="main">
        <h1>Todos</h1>
        <div class="container-fluid">
            <form action="create_todo.php" method="POST" class="py-4">
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="body">Body</label>
                    <textarea name="body" id="body" cols="30" rows="3" class="form-control" name="body"></textarea>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>
                    <div class="col-6">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                    </div>
                </div>
                <div class="d-grid">
                    <button class="btn btn-secondary">Add Todo</button>
                </div>
            </form>
            <ul class="todo-list list-group">

                <?php
                // 4. Use returned data
                while ($todo = mysqli_fetch_array($todo_set)) {
                    // echo $todo["id"];


                    echo "<li class=\"list-group-item";
                    if ($todo['isDone']) {
                        // echo $todo['isDone'];
                        echo " done";
                    }
                    echo "\">";
                    echo "<div class=\"body mb-2\">";
                    echo   $todo['body'];
                    echo "</div>";
                    echo "<div class=\"actions btn-group\">";
                    echo "<button class=\"btn btn-sm btn-success\">Done</button>";
                    echo "<a class=\"btn btn-sm btn-danger\" href=\"delete_todo.php?id=" . urlencode($todo['id']) . "\">Delete</a>";
                    echo "</div>";
                    echo "</li>";
                }; ?>

                <!-- <li class="list-group-item done">
                <div class="body mb-2">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias iure consequatur deserunt, repudiandae eligendi cupiditate ratione nobis nulla voluptatum. Ullam?
                </div>
                <div class="actions">
                    <button class="btn btn-sm btn-success">Done</button>
                    <button class="btn btn-sm btn-danger">Delete</button>
                </div>
            </li>
            <li class="list-group-item done">
                <div class="body mb-2">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias iure consequatur deserunt, repudiandae eligendi cupiditate ratione nobis nulla voluptatum. Ullam?
                </div>
                <div class="actions">
                    <button class="btn btn-sm btn-success">Done</button>
                    <button class="btn btn-sm btn-danger">Delete</button>
                </div>
            </li> -->
            </ul>
        </div>
    </main>


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>