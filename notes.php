<?php

require "partials/_dbConnect.php";

// Start the session 
session_start();
if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)){
    header("location: login.php");
    exit;
}



$name = $_SESSION['username'];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $heading = $_POST["heading"];
    $main = $_POST["main"];
    
    $sqlInsert = "INSERT INTO `notes`(`name`, `heading`, `main`) VALUES ('$name', '$heading', '$main')";
    $resultInsert = mysqli_query($conn, $sqlInsert);

}

// Displaying all notes
$allNSql = "SELECT * FROM `notes` WHERE name='$name'";
$allNResult = mysqli_query($conn, $allNSql);

?>
<html>

<head>

    <title> Website | Notes |
        <?php $_SESSION['username']?>
    </title>
    <link rel="stylesheet" href="partials/style.css">
</head>

<body>

    <?php require "partials/_navbar.php" ?>

    <section class="background">
        <div class="addNotes">
            <h2 class="heading"><u>
                    <?php echo $_SESSION['username']?>'s notes section
                </u></h2>

            <form action="notes.php" method="post" id="notes">
                <label for="" class="labels">Title</label>
                <input type="text" name="heading" id="title" class="userInput">

                <label for="" class="labels">Description</label>
                <textarea name="main" id="description" cols="30" rows="6 " class="userInput"></textarea>

                <button type="submit" id="add"> Add </button>
            </form>
        </div>
    </section>

    <section id="displayNotes">
        <h2 class="heading">Your Notes</h2>

        <?php
            foreach($allNResult as $i){
                echo "
                <div class='notesBody'>
                    <p class='notesTitle'>" . $i['heading'] . "</p>
                    <hr class='line'>
                    <p class='notesDesc'>" . $i['main'] . "</p>
                    <p class='notesDateTime'>" . $i['timestamp'] . "</p> 
                    <div class='editDelete'>
                        <button class='edit'>Edit</button>
                        <button class='delete'>Delete</button>
                    </div>
                </div>";
            }
        ?>

    </section>

</body>

</html>