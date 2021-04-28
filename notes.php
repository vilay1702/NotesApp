<?php

// Start the session 
require "partials/base.php";
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
    <title> Website | Notes |<?php $_SESSION['username']?> </title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            font-family: 'Ubuntu', sans-serif;
            font-size: 20px;
            background-color: #ffffff;
        }

        .container {
            max-width: 60%;
            margin: auto;
            padding: 30px;
            box-sizing: border-box;
            background-color: #051f2e;
        }

        /*========================= ADD NOTES SECTION =========================*/
        .background {
            height: 100vh;
            width: 100vw;
            padding-top: 100px;
            /* display: flex; */
            align-items: center;
            justify-content: center;
            background-color:#051f2e;
            box-sizing: border-box;

        }

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
            color: #bff3f7;
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

        label {
            color: #ffffff;
        }

        .userInput {
            margin-top: 5px;
            margin-bottom: 20px;
        }

        #title {
            height: 30px;
            background-color: #ffffff;
            border: 1px solid black;
            padding: 0px 10px;
        }

        #description {
            padding: 5px;
            font-size: 18px;
            background-color: #ffffff;
            border: 1px solid black;
            padding: 5px 10px;
        }

        /* ============================== Insert Box ============================== */



        /* ============================== Display Notes Section ============================== */

        #displayNotes {
            max-width: 80vw;
            margin: 50px auto;
            box-sizing: border-box;
        }

        #displayNotes h2{
            margin-bottom: 30px;
            color: #241501;
        }

        .notesBody {
            background-color: #d5fbfd;
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
            border: 0px solid transparent;
        }

        .notesDesc {
            margin-bottom: 30px;
            text-align: justify;
            padding: 10px 0px;
            color: #202020;
        }

        .notesDateTime {
            text-align: right;
            font-size: 18px;
            color: #636363;
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
    <section class="background">
        <div class="container">
            <h2 class="heading"><u> <?php echo $_SESSION['username']?>'s notes section </u></h2>
            
            <form action="notes.php" method="post" id="notes">
                <label for="" class="labels">Title</label>
                <input type="text" name="heading" id="title" class="userInput">

                <label for="" class="labels">Description</label>
                <textarea name="main" id="description" cols="30" rows="6 " class="userInput"></textarea>

                <button type="submit" id="addNotes"> Add </button>
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