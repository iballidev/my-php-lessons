<!-- Header -->
<?php include("./includes/header.php"); ?>

<main>
    <section>
        <div class="banner">
            <div class="content-wrapper">
                <!-- <h1>banner</h1> -->
                <img src="./assets/images/banner.png" alt="">
            </div>
        </div>
    </section>
    <section class="mt-4">



        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h2 class="fs-5 fw-bold">New Arrival</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php

                        // 3. Perform database query
                        $result = mysqli_query($connection, "SELECT * FROM book_items");
                        if (!$result) {
                            die("Database query failed: " . mysqli_error($connection));
                        }


                        // 4. Use returned data
                        while ($book = mysqli_fetch_array($result)) {
                            // echo $book["title"] . " " . $book["author"] . "<br />";
                            echo "<div class=\"col-6 col-md-2\">";
                                echo "<div class=\"card prod-item-card\">";
                                    echo "<div class=\"img\">";
                                        echo "<img class=\"card-img-top\" src=\"{$book["image"]}\" alt=\"\">";
                                    echo "</div>";
                                    echo "<div class=\"card-body\">";
                                        echo "<a href=\"./book-details.php?book_id=" . urlencode($book["id"]) . "\" class=\"text-decoration-none\">";
                                            echo "<div class=\"title\">";
                                                echo "{$book['title']}";
                                            echo "</div>";
                                        echo "</a>";
                                        echo "<div class=\"author\">";
                                            echo "{$book['author']}";
                                        echo "</div>";
                                        echo "<div class=\"price\">";
                                            echo "<span class=\"discount-price fs-5\">";
                                                echo "$book[discount_price]";
                                                echo "</span>";
                                            // echo "<span class=\"sale-price text-muted fs-6\">{$book['sale_price']}</span>";
                                        echo "</div>";                                        
                                        echo "<div class=\"rating\">";
                                        echo "<ul class=\"ps-0 mb-0 list-style-none d-flex rating\">";
                                        $x =0;
                                        while($x < 5){
                                            echo "<li>";
                                                echo "<i class=\"fas fa-star\"></i>";
                                            echo "</li>";
                                            $x++;
                                        }
                                            echo "</ul>";
                                            echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        }
                        ?>
                        <!-- Item 1 -->
                        <!-- <div class="col-6 col-md-2">
                            <div class="card prod-item-card">
                                <div class="img">
                                    <img class="card-img-top" src="https://images-na.ssl-images-amazon.com/images/I/51Gx9KsFLkL._AC_SX284_.jpg" alt="">
                                </div>
                                <div class="card-body">
                                    <a href="#" class="text-decoration-none">
                                        <div class="title">Mr. Lemoncello's Very First Game (Mr. Lemoncello's Library)
                                        </div>
                                    </a>
                                    <div class="author">Chris Grabenstein</div>
                                    <div class="price">
                                        <span class="discount-price fs-5">$10 <sup>20</sup></span>
                                        <span class="sale-price text-muted fs-6">$13</span>
                                    </div>
                                    <div class="rating">
                                        <ul class="ps-0 mb-0 list-style-none d-flex rating">
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="far fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="far fa-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Item 2 -->

                        <!-- <div class="col-6 col-md-2">
                            <div class="card prod-item-card">
                                <div class="img">
                                    <img class="card-img-top" src="https://images-na.ssl-images-amazon.com/images/I/51tryArXkQL._AC_SX284_.jpg" alt="">
                                </div>
                                <div class="card-body">
                                    <a href="#" class="text-decoration-none">
                                        <div class="title">Sir Ladybug (Sir Ladybug, 1)
                                        </div>
                                    </a>
                                    <div class="author">Corey R. Tabor</div>
                                    <div class="price">
                                        <span class="discount-price fs-5">$10 <sup>29</sup></span>
                                        <span class="sale-price text-muted fs-6">$14.99</span>
                                    </div>
                                    <div class="rating">
                                        <ul class="ps-0 mb-0 list-style-none d-flex rating">
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Footer -->
    <?php include("./includes/footer.php"); ?>