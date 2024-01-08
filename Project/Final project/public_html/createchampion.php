<?php
    include 'db.php';
    if ($_SESSION['usertype'] =='user' || $_SESSION['usertype'] =='admin') 
    {
        $name = $_POST["championName"];
        $date = $_POST["releaseDate"];
        $cost = $_POST["championCost"];
        $origin = $_POST["originID_disp"];
        $playstyle = $_POST["playstyleID"];
        $sql = "INSERT INTO champions (championName, releaseDate, championCost, originID_disp, playstyleID) VALUES ('$name', '$date', '$cost', '$origin', '$playstyle')";
        $conn->query($sql);
        $sql = "UPDATE champions SET releaseDate = DEFAULT WHERE releaseDate = '0000-00-00'";
        $conn->query($sql);
        $sql = "UPDATE champions SET championCost = DEFAULT WHERE championCost = '0'";
        $conn->query($sql);
        $sql = "UPDATE champions SET originID_disp = DEFAULT WHERE originID_disp = '0'";
        $conn->query($sql);
        $sql = "UPDATE champions SET playstyleID = DEFAULT WHERE playstyleID = '0'";
        $conn->query($sql);
        $conn->close();
        header("location: index_champions.php");
    }
    else
    {
        header("location: default.php");
    }
?>