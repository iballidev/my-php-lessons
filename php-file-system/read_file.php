<?php
$file = "./data/index.txt";
$data = fopen($file, "r"); // Open the file

if (!$data) { // Conditional Test
    die("Cannot open the file");
} else {
    echo $data . "<br/>"; // Read the file
    /**fread() */
    echo fread($data, 30); // Read the first 30 character in the file
    echo  "<br/>";
    echo fread($data, 30); // Read the next 30 character in the file
    echo  "<br/>";

    /**fgetc() */
    echo fgetc($data); // read only one character at a time 
    echo fgetc($data); // read the next 'only one' character
    //NOTE: it returns false when it reaches the end of the file: $one_char = fgetc( $handle );
}


fclose($data); // Close the file
