<?php
// 1. Create a database connection
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// 2. Select a database to use
$db_select = mysqli_select_db($connection, "shopping_basket");

if (!$db_select) {
    die("Database connection failed: " . mysqli_error($connection));
}
