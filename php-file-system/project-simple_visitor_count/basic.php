<!-- /**
A Simple Visitor Counter

One very popular use for Web scripts is a visitor hit counter, which is used to show
how many times a Web page has been visited and therefore how popular the Web
site is.
Hit counters come in different forms, the simplest of which is a text counter.
In a text counter, the current value of the counter is stored in a file and increased
each time the page is visited.
Let's create a simple script to do that.
*/ -->

<!DOCTYPE html>

<head>
    <title>Hit counter</title>
    <link rel=”stylesheet” type=”text/css” href=”css/style.css” />
</head>

<body>
    <h1>This is my home page!</h1>
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
</body>

</html>