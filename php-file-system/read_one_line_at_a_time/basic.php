<?php
$handle = fopen("milton.txt", "r");

$lineNumber = 1;

while ($line = fgets($handle)) {
    echo $lineNumber++ . ": $line <br/> ";
}


fclose($handle);
