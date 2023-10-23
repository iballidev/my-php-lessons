<?php require_once("./includes/connection.php"); ?>
<?php require_once("./includes/functions.php"); ?>
<?php include("./includes/header.php"); ?>

<?php

if (isset($_GET["subj"])) {
    $selected_subj = $_GET["subj"];
    $selected_page = "";
} elseif (isset($_GET["page"])) {
    $selected_page = $_GET["page"];
    $selected_subj = "";
} else {
    $selected_subj = "d";
    $selected_page = "ww";
}


?>

<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <div class="sidebar">
                <!-- Navigation -->
                <ul id="navigation">
                    <?php
                    // 3. Perform database 
                    $subject_set =  get_all_subjects($connection);

                    // 4. Use returned data
                    while ($subject = mysqli_fetch_array($subject_set)) {
                        echo "<li>";
                        // echo "<a href=\"index.php?subj=" . urlencode($subject["id"]) . "\">{$subject['menu_name']}</a>";
                        echo "<a href=\"index.php?subj=" . urlencode($subject["id"]) . "\"";

                        if ($subject["id"] == $selected_subj) {
                            echo " class=\"fw-bold\"";
                        }

                        echo ">{$subject['menu_name']}</a>";
                        echo "<ul>";

                        // 3. Perform database query
                        $page_set = get_all_pages($subject['id'], $connection);

                        while ($page = mysqli_fetch_array($page_set)) {
                            echo "<li>";

                            echo "<a href=\"index.php?page=" . urlencode($page['id']) . "\" ";

                            if ($page["id"] == $selected_page) {
                                echo " class=\"fw-bold\"";
                            }

                            echo ">{$page['menu_name']}</a>";

                            echo "</li>";
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
                <h2>Content area
                    <?php
                    echo $selected_subj;
                    ?></h2>
                <p>
                    <?php
                    echo $selected_page;
                    ?>
                </p>
            </main>
        </div>
    </div>
</div>
<?php require("./includes/footer.php"); ?>