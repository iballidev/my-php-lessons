<?php
$handle = fopen( "data.txt", "w" );
fwrite( $handle, "ABCxyz" );
fwrite( $handle, "12345" );
