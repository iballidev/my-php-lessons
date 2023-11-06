<?php
// data/greet.txt contains the characters "Hello, world!"
$handle = fopen("../data/greet.txt", "r");
$hello = fread($handle, 13);

echo $hello . "<br/>"; // Displays "Hello, world!"

echo feof($handle) . "<br/>"; // Displays "" (false)

$five_more_chars = fread($handle, 5);

echo $five_more_chars . "<br/>"; // Displays "" (or possibly a newline)

echo feof($handle) . "<br/>"; // Displays "1" (true)

fclose($handle);
