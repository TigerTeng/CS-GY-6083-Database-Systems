<?php
    include 'db.php';
    if ($_SESSION['usertype'] =='user' || $_SESSION['usertype'] =='admin') 
    {
        $id = $_POST["originID_disp"];
        $name = $_POST["region"];
        $sql = "update origins set region='$name' where originID_disp=$id";
        $result = $conn->query($sql);
        $conn->close();
        header("location: index_origins.php");
    }
    else
    {
        header("location: default.php");
    }
?>