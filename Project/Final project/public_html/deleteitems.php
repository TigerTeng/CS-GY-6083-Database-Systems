<?php
  include 'db.php';
    if ($_SESSION['usertype'] =='user' || $_SESSION['usertype'] =='admin') 
    {
        $id = $_GET['id'];
        $sql = "delete from items where itemID=$id";
        
        $conn->query($sql);  
        $conn->close();
        header("location: index_items.php");
    }
    else
    {
        header("location: default.php");
    }
?>
