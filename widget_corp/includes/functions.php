<?php


// Escape special characters with slashes
function mysqli_prep($value)
{
    $new_enough_php = function_exists("mysqli_real_escape_string");
    echo $new_enough_php;

    if ($new_enough_php) {
        $value = addslashes($value);
        echo $value;
        return $value;
    }
}

function redirect_to($location = NULL)
{
    if ($location != NULL) {
        header("Location: {$location}");
        exit;
    }
}


function confirm_query($result_set, $connection)
{
    if (!$result_set) {
        die("Database query failed: " . mysqli_error($connection));
    }
}

function get_all_subjects()
{
    global $connection;

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


function find_selected_page()
{

    global $selected_subject;
    global $selected_page;


    if (isset($_GET["subj"])) {
        $selected_subject = get_subject_by_id($_GET["subj"]);
        $selected_page = NULL;
    } elseif (isset($_GET["page"])) {
        $selected_page = get_page_by_id($_GET["page"]);
        $selected_subject = NULL;
    } else {
        $selected_subject = NULL;
        $selected_page = NULL;
    }
}


function navigation($selected_subject, $selected_page)
{
    global $connection;

    $output = "<ul id=\"navigation\">";

    // 3. Perform database 
    $subject_set =  get_all_subjects();

    // 4. Use returned data
    while ($subject = mysqli_fetch_array($subject_set)) {
        $output .= "<li>";
        // echo "<a href=\"index.php?subj=" . urlencode($subject["id"]) . "\">{$subject['menu_name']}</a>";
        $output .=  "<a href=\"index.php?subj=" . urlencode($subject["id"]) . "\"";

        if ($subject["id"] == $selected_subject["id"]) {
            $output .=  " class=\"fw-bold\"";
        }

        $output .=  ">{$subject['menu_name']}</a>";
        $output .=  "<ul>";

        // 3. Perform database query
        $page_set = get_all_pages($subject['id'], $connection);

        while ($page = mysqli_fetch_array($page_set)) {
            $output .=  "<li>";

            $output .=  "<a href=\"index.php?page=" . urlencode($page['id']) . "\" ";

            if ($page["id"] == $selected_page["id"]) {
                $output .=  " class=\"fw-bold\"";
            }

            $output .=  ">{$page['menu_name']}</a>";

            $output .=  "</li>";
        }

        $output .=  "</ul>";
        $output .=  "</li>";
    }

    $output .=  "</ul>";

    return $output;
}
