<?php

$serverName = "localhost";
$userName = "root";
$password = "sql123";
$database = "projectone";

$conn = mysqli_connect($serverName, $userName, $password, $database);

if(!$conn){
    die("<script> alert('Database not connected'); </script>");
}

?>