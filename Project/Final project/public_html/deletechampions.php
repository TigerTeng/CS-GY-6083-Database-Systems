<?php
    include 'db.php';
    if ($_SESSION['usertype'] =='user' || $_SESSION['usertype'] =='admin') 
    {
        $id = $_GET['id'];
        $sql = "delete from champions where championID=$id";
        
        $conn->query($sql);  
        $conn->close();
        header("location: index_champions.php");
    }
    else
    {
        header("location: default.php");
    }
?>
