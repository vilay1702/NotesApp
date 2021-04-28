<?php

require "partials/_dbConnect.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = $_POST['name'];
    $password = $_POST['password'];

    $getName = "SELECT * FROM `useraccount` WHERE name='$name'";
    $getNameResult = mysqli_query($conn, $getName);
    
    $getPassword = "SELECT password FROM `useraccount` WHERE name='$name' && password='$password'";
    $getPasswordResult = mysqli_query($conn, $getPassword);
    
    // CHECKING IF USER HAVE ACCOUNT OR NOT
    if(!mysqli_num_rows($getNameResult)>0){
        echo "<script> alert('Username does not exist');</script>";
    }

    // CHECKING PASSWORD MATCHING OR NOT
    elseif(!mysqli_num_rows($getPasswordResult)>0){
        echo "<script> alert('Incorrect Password');</script>";
    }

    // STARTING SESSION
    else{
        // echo "<script>alert('You are successfully logged in');</script>" ;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $name;

        //redirecting
        header("location: notes.php");
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website | Login</title>

    <link rel="stylesheet" href="partials/style.css">
</head>

<body>

    <?php include "partials/_navbar.php"; ?>

    <form class="loginForm" action="login.php" method="post">
        <h1 class="heading1"> Login to continue </h1>

        <label for="">Name</label>
        <input type="text" name="name" id="name" required>

        <label for="">Password</label>
        <input type="password" name="password" id="password" required>

        <button type="submit"> Submit </button>
    </form>
</body>

</html>