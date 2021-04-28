<?php

// ========================= Linking database =========================
require "partials/_dbConnect.php";

// ========================== Linking Navbar ==========================

echo '<link rel="stylesheet" href="partials/style.css">';

echo '
    <nav>  
        <div class="brand"><a href="index.php"> WEBSITE </a></div>
        <div id="navList">
';
if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)){
    echo '
        <a href="login.php" class="navLink"> Login </a>
        <a href="signup.php" class="navLink"> Sign-up </a>
    ';
}
else{
    echo '
        <a href="notes.php" class="navLink"> Notes </a>
        <a href="logout.php" class="navLink"> Log-out </a>    
    ';
}
echo '
        </div>
    </nav>
';
?>