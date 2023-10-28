<!-- Header -->
<?php include("./includes/header.php"); ?>

<?php
if (isset($_GET['book_id'])) {
    $selected_book = $_GET['book_id'];
    echo $selected_book;
} else {
    $selected_book = NULL;
};
?>


<div class="content-wrapper">
    <div class="card mt-5">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-4">
                    <!-- Product info -->
                    <?php
                    // 3. Perform database query
                    $query = "SELECT * FROM book_items WHERE id=$selected_book LIMIT 1";
                    $result = mysqli_query($connection, $query);
                    if (!$result) {
                        die("Database query failed: " . mysqli_error($connection));
                    }

                    // print_r($result);

                    if ($book = mysqli_fetch_array($result)) {
                        echo "<div class=\"title\">";
                        echo $book['title'];
                        echo "</div>";
                        echo "<div class=\"image\">";
                        echo "<img src={$book['image']}>";
                        echo "</div>";
                    };

                    ?>
                </div>
                <div class="col-12 col-md-8">
                    Product details
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include("./includes/footer.php"); ?>