<?php require 'partials/_dbConnect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Website | Welcome</title>

    <!-- ======== Linking Fonts ======== -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital@0;1&family=Source+Code+Pro&family=Ubuntu&display=swap"
        rel="stylesheet">

    <!-- ======== Linking CSS ======== -->
    <link rel="stylesheet" href="partials/style.css">

</head>

<body>
    <?php include "partials/_navbar.php"; ?>
    <div class="container" id="home">
        <div id="welcomeBox">
            <h1 class="heading1"> Welcome to my website </h1>
            <div id="navigate">
                <a href="login.php"> Login </a>
                <a href="signup.php"> Sign-up </a>
            </div>
        </div>
    </div>
</body>

</html>