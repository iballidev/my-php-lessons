<?php require_once("./includes/connection.php"); ?>
<?php require_once("./includes/functions.php"); ?>
<?php include("./includes/header.php"); ?>

<?php

if (isset($_GET["subj"])) {
    $selected_subject = get_subject_by_id($_GET["subj"]);
    $selected_page = NULL;
} elseif (isset($_GET["page"])) {
    $selected_page = get_page_by_id($_GET["page"]);
    $selected_subject = NULL;
} else {
    $selected_subject = NULL;
    $selected_page = NULL;
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

                        if ($subject["id"] == $selected_subject["id"]) {
                            echo " class=\"fw-bold\"";
                        }

                        echo ">{$subject['menu_name']}</a>";
                        echo "<ul>";

                        // 3. Perform database query
                        $page_set = get_all_pages($subject['id'], $connection);

                        while ($page = mysqli_fetch_array($page_set)) {
                            echo "<li>";

                            echo "<a href=\"index.php?page=" . urlencode($page['id']) . "\" ";

                            if ($page["id"] == $selected_page["id"]) {
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
                <h2> <?php
                        if (!is_null($selected_subject)) {
                            echo $selected_subject["menu_name"];
                        }
                        ?>
                        </h2>
                <p>
                    <?php if(isset($selected_page)){
                        echo $selected_page["menu_name"];
                    };
                    ?>
                </p>
            </main>
        </div>
    </div>
</div>
<?php require("./includes/footer.php"); ?>