<?php
    include 'db.php';
    if ($_SESSION['usertype'] =='user' || $_SESSION['usertype'] =='admin') 
    {
        $name = $_POST["iconName"];
        $date = $_POST["releaseDate"];
        
        $sql = "INSERT INTO icons (iconName, releaseDate) VALUES ('$name', '$date')";
        $conn->query($sql);
        
        $sql = "UPDATE icons SET releaseDate = DEFAULT WHERE releaseDate = '0000-00-00'";
        $conn->query($sql);
        $conn->close();
        header("location: index_icons.php");
    }
    else
    {
        header("location: default.php");
    }
?>