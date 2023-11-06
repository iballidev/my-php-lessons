<?php


function mysqli_prep($value)
{
    $new_enough_php = function_exists("mysqli_real_escape_string");

    if ($new_enough_php) {
        $value = addslashes($value);
        echo $value;
        return $value;
    }
}

function confirm_query($result_set)
{
    global $connection;

    if (!$result_set) {
        die("Database query failed: " . mysqli_error($connection));
    }
}

function get_all_todos()
{
    global $connection;

    $query = "SELECT * FROM todos ORDER BY title ASC";
    $todo_set = mysqli_query($connection, $query);

    confirm_query($todo_set);
    if (!$todo_set) {
        die("Database query failed: " . mysqli_error($connection));
    }
    return $todo_set;
}
