<?php

$array1 = ["foo", "bar", "cab"];
$array2 = array("tunde", "ednut", "davido");


print_r ($array1);

echo "<br/>";

// Using the short array syntax
print_r ($array2);
echo "<br/>";
var_dump ($array2);
echo "<br/>";
var_dump($array2[2]);
echo "<br/>";
print_r ($array2[2]);
echo "<br/>";



function getArray() {
    return array(1, 2, 3);
}

$secondElement = getArray()[1];
echo ($secondElement);


echo "<br/>";


// unset($array1[0]);

function removeItem($item, $array){
   unset($array[$item]);

   $newArr =  array_values($array);
    // var_dump($newArr);
    return $newArr;
}
$removeItem = removeItem(1, $array1);
var_dump ($removeItem);

echo "<br/>";

$array1 = array("a" => "green", "red", "blue", "red");
$array2 = array("b" => "green", "yellow", "red");
$result = array_diff($array1, $array2);

print_r($result);

?>