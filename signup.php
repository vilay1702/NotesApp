<?php
require "partials/_dbConnect.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cPassword = $_POST["cPassword"];
    $password = $_POST["password"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];

    // Matching Name 
    $getNames = "SELECT name FROM `useraccount` WHERE name = '$name'";
    $getNamesResult = mysqli_query($conn, $getNames);


    // if(!$getNamesResult){
    //     echo "<script> alert('Names not selected'); </script>";
    // }
    if (mysqli_num_rows($getNamesResult)>0){
        echo "<script> alert('Username not available');</script>";
    }

    // Match Passwords
    elseif($password != $cPassword){
        echo "<script> alert('Passwords not match');</script>";
    }

    else{
        // INSERT INTO `useraccount` (`sno`, `name`, `email`, `password`, `age`, `gender`, `timestamp`) VALUES (NULL, 'testname01', 'testname02@mail.com', 'testname1', '20', 'M', CURRENT_TIMESTAMP);
        $insertSignup = "INSERT INTO `useraccount`(`name`, `email`, `password`, `age`, `gender`) VALUES('$name', '$email', '$password', '$age', '$gender');";
        $insertSignupResult = mysqli_query($conn, $insertSignup);
        if(!$insertSignupResult){
            echo "<script> alert('Error');</script>";
        }
        else {
            header("location: login.php");
        }
    }

 }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Website | Sign-up </title>
    <!-- <link rel="stylesheet" href="partials/style.css"> -->
    <link rel="stylesheet" href="partials/style.css">
</head>

<body>

    <?php include "partials/_navbar.php"; ?>

    <form class="signupForm" action="signup.php" method="post">
        <h1 class="heading1"> Sign-up to continue </h1>

        <label for="">Name</label>
        <input type="text" name="name" id="name" required>

        <label for="">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="">Password</label>
        <input type="password" name="password" id="password" required>

        <label for="">Confirm Password</label>
        <input type="password" name="cPassword" id="cPassword" required>

        <label for="">Age</label>
        <input type="number" name="age" id="age" required>

        <label for="">Gender (M/F/O)</label>
        <input type="text" name="gender" id="gender" required>

        <button type="submit"> Submit </button>
    </form>

</body>

</html>