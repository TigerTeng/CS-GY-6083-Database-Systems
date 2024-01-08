<?php
    include 'db.php';
    if ($_SESSION['usertype'] =='user' || $_SESSION['usertype'] =='admin') 
    {
        $id = $_POST["championID"];
        $name = $_POST["championName"];
        $date = $_POST["releaseDate"];
        $cost = $_POST["championCost"];
        $origin = $_POST["originID_disp"];
        $playstyle = $_POST["playstyleID"];
        $sql = "update champions set championName='$name', releaseDate='$date', championCost='$cost', originID_disp='$origin', playstyleID='$playstyle' where championID=$id";
        $result = $conn->query($sql);
        $conn->close();
        header("location: index_champions.php");
    }
    else
    {
        header("location: default.php");
    }
?>