<?php
  include 'db.php';
    if ($_SESSION['usertype'] =='user' || $_SESSION['usertype'] =='admin') 
    {
        $id = $_GET['id'];
        $sql = "delete from skins where skinID=$id";
        
        $conn->query($sql);  
        $conn->close();
        header("location: index_skins.php");
    }
    else
    {
        header("location: default.php");
    }
?>
