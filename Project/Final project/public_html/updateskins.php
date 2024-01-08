<?php
    include 'db.php';
    if ($_SESSION['usertype'] =='user' || $_SESSION['usertype'] =='admin') 
    {
        $id = $_POST["skinID"];
        $name = $_POST["championName"];
        $skin = $_POST["skinName"];
        $date = $_POST["releaseDate"];
        $tier = $_POST["skinTierID"];
        $sql = "update skins set championName='$name', skinName='$skin', releaseDate='$date', skinTierID='$tier' where skinID=$id";
        #echo $sql;
        $result = $conn->query($sql);
        $conn->close();
        header("location: index_skins.php");
    }
    else
    {
        header("location: default.php");
    }
?>
