<?php
    include 'db.php';
    if ($_SESSION['usertype'] =='user' || $_SESSION['usertype'] =='admin') 
    {
        $id = $_GET['id'];
        $sql = "delete from origins where originID_disp=$id";
        
        $conn->query($sql);  
        $conn->close();
        
        include 'db.php';
        $sql = "SELECT * FROM origins WHERE originID_disp > '$id' ORDER BY `originID_disp` ASC";
        $result = mysqli_query($conn, $sql);
        $conn->close();
            while($row = $result->fetch_assoc()) 
            {
                $newid = $id + 1;
                include 'db.php';
                $sql = "UPDATE origins SET originID_disp = '$id' WHERE originID_disp = '$newid'";
                echo $sql;
                $conn->query($sql);
                $conn->close();
                $id = $id + 1;
            }
        header("location: index_origins.php");
    }
    else
    {
        header("location: default.php");
    }
?>
