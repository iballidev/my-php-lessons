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

function get_subject_by_id($subject_id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM subjects ";
    $query .= "WHERE id=" . $subject_id . " ";
    $query .= "LIMIT 1";


    // echo  "{$query}";
    $result_set = mysqli_query($connection, $query);
    confirm_query($result_set, $connection);
    // REMEMBER:
    // if no row are returned, fetch_array will return false
    if ($subject = mysqli_fetch_array($result_set)) {
        return $subject;
    }
    return NULL;
}


function get_page_by_id($page_id)
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM pages ";
    $query .= "WHERE id=" . $page_id . " ";
    $query .= "LIMIT 1";

    $result_set = mysqli_query($connection, $query);
    confirm_query($result_set, $connection);
    // REMEMBER:
    // if no row are returned, fetch_array will return false
    if ($page = mysqli_fetch_array($result_set)) {
        return $page;
    }
    return NULL;
}
