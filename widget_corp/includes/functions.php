<?php

function confirm_query($result_set, $connection)
{
    if (!$result_set) {
        die("Database query failed: " . mysqli_error($connection));
    }
}

function get_all_subjects($connection)
{
    $query =  "SELECT * FROM subjects ORDER BY position ASC";
    $subject_set = mysqli_query($connection, $query);
    confirm_query($subject_set, $connection);
    return  $subject_set;
}


function get_all_pages($subject_id, $connection)
{
    /**
     * global $connection;
     * NOTE we can pass in $connection globally instead of passing it as an argument on each function
     * */

    $query = "SELECT * FROM pages WHERE subject_id={$subject_id} ORDER BY position ASC";
    $page_set = mysqli_query($connection, $query);
    confirm_query($page_set, $connection);
    return $page_set;
}
