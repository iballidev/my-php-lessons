<?php include("includes/connection.php"); ?>
<?php include("includes/functions.php"); ?>


<?php

$errors = array();

$title;
$body;
$start_date;
$end_date;
$isDone = 0;

// Form Validation
$required_fields = array("title", "body", "start_date");
$fields_with_lengths = array("title" => 100, "body" => 550);

foreach ($required_fields as $required_field) {
    if (!isset($_POST[$required_field]) || empty($_POST[$required_field])) {
        $errors[] = $required_field;
    }
}

foreach ($fields_with_lengths as $fieldname => $maxlength) {
    if (strlen(trim(strip_tags($_POST[$fieldname]))) > $maxlength) {
        $errors[] = $fieldname;
    }
}


print_r($errors);

if (!empty($errors)) {
    header("Location: index.php");
    exit;
}

$title = mysqli_prep($_POST["title"]);
$body =  mysqli_prep($_POST["body"]);
$start_date =  mysqli_prep($_POST["start_date"]);
$end_date =  mysqli_prep($_POST["end_date"]);


$query = "INSERT INTO todos (id, title, body, start_date, end_date, isDone)
VALUES (NULL, '$title','$body', '$start_date', '$end_date', {$isDone})";

echo $query;

$result = mysqli_query($connection, $query);

if ($result) {
    // Success
    header("Location: index.php");
    exit;
} else {
    // Display error message.
    echo "<p>Creating todo failed!.</p>";
    echo "<p>***" . mysqli_error($connection) . "</p>";
};


?>


// if (isset($_POST["title"]) && isset($_POST["body"])) {
// $title = $_POST["title"];
// $body = $_POST["body"];
// echo $title;
// echo $body;
// };