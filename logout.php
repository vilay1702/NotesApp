<?php
    session_start();
    session_unset();
    session_destroy();
    // echo "<h2> You have been logged out </h2>";
    header("location: index.php");
?>