<?php require_once("./includes/connection.php"); ?>
<?php require_once("./includes/functions.php"); ?>
<?php include("./includes/header.php"); ?>

<?php
find_selected_page();
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <div class="sidebar">
                <!-- Navigation -->
                <?php echo navigation($selected_subject, $selected_page); ?>
                <br />
                <br />
                <a href="new_subject.php" class="mx-2 text-center d-block">+&nbsp;Add a new subject</a>
            </div>
        </div>
        <div class="col-10">
            <main>
                <!-- -->
                <h2> <?php
                        if (!is_null($selected_subject)) {
                            echo $selected_subject["menu_name"];
                        }
                        if (!is_null($selected_page)) {
                            echo $selected_page["menu_name"];
                        }
                        ?>
                </h2>
                <div>
                    <?php if (isset($selected_page)) {
                        echo $selected_page["content"];
                    };
                    ?>
                </div>
            </main>
        </div>
    </div>
</div>
<?php require("./includes/footer.php"); ?>