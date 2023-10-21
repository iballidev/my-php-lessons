<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forms | Initial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Forms</h1>

        <?php
        if (isset($_POST["email_address"]) && isset($_POST["password"]) || isset($_POST["subscribe_newsletter"])) {
            $email_address = $_POST["email_address"];
            $password = $_POST["password"];
            if (isset($_POST["subscribe_newsletter"])) {
                $subscribe_newsletter = $_POST["subscribe_newsletter"];
            }

            echo ("$email_address .$password .$subscribe_newsletter");
        }
        ?>

        <div class="card" style="max-width: 400px; margin: 0 auto">
            <div class="card-body">
                <form action="initial.php" method="POST">
                    <div class="mb-3">
                        <label for="email_address" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email_address" name="email_address" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="subscribe_newsletter" name="subscribe_newsletter">
                        <label class="form-check-label" for="subscribe_newsletter">Subscribe for newsletter</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>