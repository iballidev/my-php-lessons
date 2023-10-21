<?php
// remove cookie by setting it to past using negative sign
// setcookie("test", "my_cookie", time() - (60 * 60 * 24 * 7), "/");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies | read cookies</title>
</head>

<body>

    <?php
     $cookie;
    if(isset($_COOKIE["test"])){
        $cookie = $_COOKIE["test"];
    }
    echo "$cookie";
    
    ?>
</body>

</html>