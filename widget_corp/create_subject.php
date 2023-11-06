<?php require_once("./includes/connection.php"); ?>
<?php require_once("./includes/functions.php"); ?>


<?php
// Form validation
$errors = array();
$fields = array("menu_name","position","visible");

// for($i=0; $i<$fields; $i++){

// }
if (!isset($_POST["menu_name"]) || empty($_POST['menu_name'])) {
    $errors[] = 'menu_name';
}

if (!empty($errors)) {
    redirect_to("new_subject.php");
}

?>

<?php
$menu_name = mysqli_prep($_POST['menu_name']);
$position = mysqli_prep($_POST['position']);
$visible = mysqli_prep($_POST['visible']);
?>

<?php
$query = "INSERT INTO subjects (id, menu_name, position, visible)
VALUES (NULL, '$menu_name',{$position}, {$visible})";

$result = mysqli_query($connection, $query);

if ($result) {
    // Success
    header("Location: index.php");
    exit;
} else {
    // Display error message.
    echo "<p>Subject creation failed!.</p>";
    echo "<p>***" . mysqli_error($connection) . "</p>";
}; ?>


<?php
// 5. Close connection
if (isset($connection)) {
    mysqli_close($connection);
}
?>