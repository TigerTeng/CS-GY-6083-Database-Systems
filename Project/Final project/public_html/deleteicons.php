<?php
  include 'db.php';
    if ($_SESSION['usertype'] =='user' || $_SESSION['usertype'] =='admin') 
    {
        $id = $_GET['id'];
        $sql = "delete from icons where iconID=$id";
        
        $conn->query($sql);  
        $conn->close();
        header("location: index_icons.php");
    }
    else
    {
        header("location: default.php");
    }
?>
