<?php
// 1. Create a database connection
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// 2. Select a database to use
$db_select = mysqli_select_db($connection, "my_test_db");
if (!$db_select) {
    die("Database connection failed: " . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connecting-to-mysql-database</title>
</head>

<body>
    <?php
    // 3. Perform database query
    $result = mysqli_query($connection, "SELECT * FROM subjects");
    // print_r($result)
    if (!$result) {
        die("Database query failed: " . mysqli_error($connection));
    }


    // 4. Use returned data
    while ($row = mysqli_fetch_array($result)) {
        // print("<pre>". print_r($row). "</pre>");
        // print("<pre>". print_r($row["menu_name"]). "</pre>");
        // echo "</br>---------------------------</br>";
        // echo $row[0] . " ". $row[1] . " " . $row[2] . "<br/>";
        // echo $row[1] . " " . $row[2] . "<br/>";
        echo $row["menu_name"] . " " . $row["position"] . "<br/>";
    }

    ?>
</body>

</html>

<?php
// 5. Close connection
mysqli_close($connection);
?>