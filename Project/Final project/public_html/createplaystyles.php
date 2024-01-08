<?php
    include 'db.php';
    if ($_SESSION['usertype'] =='user' || $_SESSION['usertype'] =='admin') 
    {
        $name = $_POST["playstyle"];
        $sql = "INSERT INTO playstyles (playstyle) VALUES ('$name')";
        $conn->query($sql);
        $conn->close();
        header("location: index_playstyles.php");
    }
    else
    {
        header("location: default.php");
    }
?>