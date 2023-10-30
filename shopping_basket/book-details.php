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



<?php
// 3. Perform database query
$query = "SELECT * FROM book_items WHERE id=$selected_book LIMIT 1";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Database query failed: " . mysqli_error($connection));
}
// print_r($result);
$book;
if ($book_set = mysqli_fetch_array($result)) {
    // print_r($book_set);
    $book = $book_set;
}
?>


<div class="content-wrapper">
    <div class="card mt-5">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-auto">
                    <!-- Product info -->
                    <div class="image">
                        <?php
                        echo "<img src={$book['image']}>";
                        ?>
                    </div>
                </div>
                <div class="col-12 col-md-auto">
                    <div class="title fs-300 fw-bold">
                        <?php
                        echo $book['title'];
                        ?>
                    </div>
                    <div class="author fs-200 ">
                        <?php
                        echo $book['author'];
                        ?>
                    </div>
                    <div class="price fs-250 ">
                        <?php
                        if ($book['discount_price']) {
                            echo $book['discount_price'];
                        } else {
                            echo $book['sale_price'];
                        }
                        ?>
                    </div>
                    <?php
                    echo "<div class=\"stock\">";
                    if ($book['stock'] < 1) {
                        echo "Out of stock";
                    }
                    echo "</div>";
                    ?>
                    <div class="description">
                        <?php
                        echo $book['description'];
                        ?>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-lg btn-warning text-white">Add To Cart</button>
                        <button class="btn btn-lg btn-success">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include("./includes/footer.php"); ?>