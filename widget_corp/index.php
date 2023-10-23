<?php require_once("./includes/connection.php"); ?>
<?php require_once("./includes/functions.php"); ?>
<?php include("./includes/header.php"); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <div class="sidebar">
            <!-- Navigation -->
            <ul id="navigation">
                <?php
                // 3. Perform database query
                $subject_set = mysqli_query($connection, "SELECT * FROM subjects");
                if (!$subject_set) {
                    die("Database query failed: " . mysqli_error($connection));
                }


                // 4. Use returned data
                while ($subject = mysqli_fetch_array($subject_set)) {
                    echo "<li>";
                  echo "  <span>{$subject['menu_name']}</span>";
                    echo "<ul>";

                    // 3. Perform database query
                    $page_set = mysqli_query($connection, "SELECT * FROM pages WHERE subject_id={$subject['id']}");
                    if (!$page_set) {
                        die("Database query failed: " . mysqli_error($connection));
                    }

                    while ($page = mysqli_fetch_array($page_set)) {
                        echo "<li>{$page['menu_name']}</li>";
                    }
    
                    echo "</ul>";
                    echo "</li>";
                }

                ?>
            </ul>
            </div>
        </div>
        <div class="col-10">
            <main>
                <!-- -->
                <h2>Content area </h2>
            </main>
        </div>
    </div>
</div>
<?php require("./includes/footer.php"); ?>
