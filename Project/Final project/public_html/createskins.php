<?php
    include 'db.php';
    if ($_SESSION['usertype'] =='user' || $_SESSION['usertype'] =='admin') 
    {
        $name = $_POST["championName"];
        $skin = $_POST["skinName"];
        $date = $_POST["releaseDate"];
        $tier = $_POST["skinTierID"];
        $sql = "CALL skinInsert('$name', '$skin', '$date', '$tier', @status)";
        //$sql = "INSERT INTO skins (championName, skinName, releaseDate, skinTierID) VALUES ('$name', '$skin', '$date', '$tier')";

        $conn->query($sql);

        $sql = "UPDATE skins SET releaseDate = DEFAULT WHERE releaseDate = '0000-00-00'";
        $conn->query($sql);
        $conn->close();

        header("location: index_skins.php");

    }
    else
    {
        header("location: default.php");
    }
?>