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
            </div>
        </div>
        <div class="col-10">
            <main>
                <!-- -->
                <h2>
                    Add New Subject
                </h2>
                <div>
                    <form action="create_subject.php" method="POST">
                        <div class="mb-3">
                            <label for="menu_name" class="mb-2">Subject Name:</label>
                            <input type="text" id="menu_name" name="menu_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="position" class="mb-2">Position:</label>
                            <select type="text" id="position" name="position" class="form-control">
                                <!-- <option value="1">1</option>
                                <option value="2">2</option> -->

                                <?php
                                $subject_set = get_all_subjects();
                                $subject_count = mysqli_num_rows($subject_set);

                                // subject_count+1 because we need the additional position for our new item
                                for ($count = 1; $count <= $subject_count+1; $count++) {
                                    echo "<option value=\"{$count}\">$count</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="mb-2">Visible:</div>
                            <ul>
                                <li>
                                    <input type="radio" name="visible" value="1" id="yes">
                                    <label for="yes">Yes</label>
                                </li>
                                <li>
                                    <input type="radio" name="visible" value="0" id="no">
                                    <label for="no">No</label>
                                </li>
                            </ul>
                        </div>
                        <button>Add Subject</button>
                    </form>
                </div>
                <br />
                <a href="index.php">Cancel</a>
            </main>
        </div>
    </div>
</div>



<?php require("./includes/footer.php"); ?>