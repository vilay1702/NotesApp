<?php

    //============ connecting database ============
    $servername = "localhost";
    $username = "root";
    $password = "sql123";
    $database = "notesApp";

    $conn = mysqli_connect($servername, $username, $password, $database);

    // alert if database is not connected
    if(!$conn){
        die('<script> alert("Database not connected!!"); </script>');
    }

    //====================== Inserting notes ======================
    $resultInsert = false;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $heading = $_POST["heading"];
        $main = $_POST["main"];

        $sqlInsert = "INSERT INTO `notes`(`heading`, `main`) VALUES ('$heading', '$main')";
        $resultInsert = mysqli_query($conn, $sqlInsert);

    }

    // Displaying all notes
    $allNSql = "SELECT * FROM `notes`";
    $allNResult = mysqli_query($conn, $allNSql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App</title>

    <!-- linking javascript -->
    <script src="script.js"></script>

    <!-- Linking style sheet -->
    <!-- <link rel="stylesheet" href="style.css"> -->

    <!-- Linking fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

    <!-- ================================== CSS ================================== -->
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            font-family: 'Ubuntu', sans-serif;
            font-size: 20px;
            background-color: #e96b6b;
        }

        .container {
            max-width: 80vw;
            margin: auto;
            margin-top: 30px;
            padding: 30px;
            box-sizing: border-box;
            background-color: #00000018;
            /* border-radius: 50px; */
            /* border: 2px dashed #90a6c9; */
        }

        /*========================= ADD NOTES SECTION =========================*/

        #notes {
            /* width: 600px;
            margin: auto; */
            display: flex;
            flex-direction: column;
            color: #0c2b81;
        }

        .heading {
            /* text-align: center; */
            margin-bottom: 30px;
            color: #ffffff;
        }

        #addNotes {
            font-family: 'Ubuntu', sans-serif;
            font-size: 20px;
            width: 100px;
            height: 40px;
            margin: 10px 0px;
            background-color: #74eb74;
            color: white;
            border: 0px;
            border-radius: 5px;
            cursor: pointer;
        }

        label{
            color: #ffffff;
        }

        .userInput {
            margin-top: 5px;
            margin-bottom: 20px;
        }

        #title {
            height: 30px;
            background-color: #ffffff4f;
            border: 1px solid #424242;
            padding: 0px 10px;
        }

        #description {
            padding: 5px;
            font-size: 18px;
            background-color: #ffffff4f;
            border: 1px solid #424242;
            padding: 5px 10px;
        }

        /* ============================== Insert Box ============================== */



        /* ============================== Display Notes Section ============================== */

        #displayNotes {
            max-width: 80vw;
            margin: 50px auto;
            box-sizing: border-box;
        }

        .notesBody {
            background-color: #ffffff3f;
            /* border: 1px solid #c4dad6; */
            padding: 30px;
            box-sizing: border-box;
            margin: 30px 0px;
        }

        .notesTitle {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #3b230c;
        }

        .line {
            background-color: #494949;
            height: 5px;
            width: 95%;
            margin: 0px 25px;
            border: 0px solid transparent;
        }

        .notesDesc {
            margin-bottom: 30px;
            text-align: justify;
            padding: 10px 25px;
            color: #3b360c;
        }

        .notesDateTime {
            text-align: right;
            font-size: 18px;
            color: #494949;
        }

        .edit {
            font-family: 'Ubuntu', sans-serif;
            font-size: 16px;
            width: 100px;
            height: 40px;
            box-sizing: border-box;
            padding: 5px 20px;
            background-color: #185ae7;
            color: #ffffff;
            border: 0px solid transparent;
            border-radius: 5px;
            margin: 5px 5px;
            cursor: pointer;
        }

        .delete {
            font-family: 'Ubuntu', sans-serif;
            font-size: 16px;
            width: 100px;
            height: 40px;
            box-sizing: border-box;
            padding: 5px 20px;
            background-color: #eb4040;
            color: #ffffff;
            border: 0px solid transparent;
            border-radius: 5px;
            margin: 0px 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="heading">Notes App</h2>
        <?php
            if($resultInsert)
            echo "<script>alert('Note has been inserted Successfully');</script>";
        ?>
        <form action="index.php" method="post" id="notes">
            <label for="" class="labels">Title</label>
            <input type="text" name="heading" id="title" class="userInput">

            <label for="" class="labels">Description</label>
            <textarea name="main" id="description" cols="30" rows="6 " class="userInput"></textarea>

            <button type="submit" id="addNotes"> Add </button>
        </form>
    </div>

    <section id="displayNotes">
        <h2 class="heading">Your Notes</h2>

        <?php
            foreach($allNResult as $i){
                echo "
                <div class='notesBody'>
                    <p class='notesTitle'>" . $i['sno'] . ". " . $i['heading'] . "</p>
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

