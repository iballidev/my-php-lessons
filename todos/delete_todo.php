<?php include("includes/connection.php"); ?>
<?php include("includes/functions.php"); ?>


<?php

$error;
$todo_id = mysqli_prep($_GET["id"]);

// Form Validation
if (!isset($_GET[$todo_id])) {
    $error = $todo_id;
}

print_r($errors);

if (!empty($errors)) {
    header("Location: index.php");
    exit;
}



$query = "DELETE FROM todos WHERE id = $todo_id";

echo $query;

$result = mysqli_query($connection, $query);

if ($result) {
    // Success
    header("Location: index.php");
    exit;
} else {
    // Display error message.
    echo "<p>Deleting todo failed!.</p>";
    echo "<p>***" . mysqli_error($connection) . "</p>";
};


?>
