<?php
  include 'db.php';
    if ($_SESSION['usertype'] =='user' || $_SESSION['usertype'] =='admin') 
    {
        $id = $_GET['id'];
        $sql = "delete from playstyles where playstyleID=$id";
        
        $conn->query($sql);  
        $conn->close();
        header("location: index_playstyles.php");
    }
    else
    {
        header("location: default.php");
    }
?>
