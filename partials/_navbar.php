<?php

// ========================== Linking Navbar ==========================

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