<?php require("./includes/constants.php"); ?>
<?php
// 1. Create a database connection
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}


// 2. Select a database to use
$db_select = mysqli_select_db($connection, "widget_corp");
if (!$db_select) {
    die("Database connection failed: " . mysqli_error($connection));
}
?>