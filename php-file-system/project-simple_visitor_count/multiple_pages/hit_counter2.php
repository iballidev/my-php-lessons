<?php
$counterFile = "count.dat";
if (!file_exists($counterFile)) {
    if (!($handle = fopen($counterFile, "w"))) {
        die("Cannot create the counter file.");
    } else {
        fwrite($handle, 0);
        fclose($handle);
    }
}
if (!($handle = fopen($counterFile, "r"))) {
    die("Cannot read the counter file.");
}
$counter = (int) fread($handle, 20);
fclose($handle);
$counter++;
echo "<h1>You're visitor No. $counter.</h1>";
if (!($handle = fopen($counterFile, "w"))) {
    die("Cannot open the counter file for writing.");
}
fwrite($handle, $counter);
fclose($handle);
?>