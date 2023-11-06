<?php

$handle = fopen("../data/greet.txt", "r");
$text = "";

while (!feof($handle)) {
    $text .= fread($handle, 3) . "<br>"; // Read 3 chars at a time
}
echo $text . "<br/>"; // Displays “Hello, world!”
fclose($handle);
