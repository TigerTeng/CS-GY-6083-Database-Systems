<?php
    include 'db.php';
    if ($_SESSION['usertype'] =='user' || $_SESSION['usertype'] =='admin') 
    {
        $id = $_POST["iconID"];
        $name = $_POST["iconName"];
        $date = $_POST["releaseDate"];
        
        $sql = "update icons set iconName='$name', releaseDate='$date' where iconID=$id";
        $result = $conn->query($sql);
        $conn->close();
        header("location: index_icons.php");
    }
    else
    {
        header("location: default.php");
    }
?>