<?php
    include 'db.php';
    if ($_SESSION['usertype'] =='user' || $_SESSION['usertype'] =='admin') 
    {
        $id = $_POST["playstyleID"];
        $name = $_POST["playstyle"];
        $sql = "update playstyles set playstyle='$name' where playstyleID=$id";
        $result = $conn->query($sql);
        $conn->close();
        header("location: index_playstyles.php");
    }
    else
    {
        header("location: default.php");
    }
?>