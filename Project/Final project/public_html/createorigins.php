<?php
    include 'db.php';
    if ($_SESSION['usertype'] =='user' || $_SESSION['usertype'] =='admin') 
    {
        $name = $_POST["region"];
        
        $count = "CALL allCount()";
        $result = mysqli_query($conn, $count);
        while($row = $result->fetch_assoc()) 
        {
            $id_disp = $row['originCount'];
        }
    
        $conn->close();
        
        
        include 'db.php';
        $sql = "INSERT INTO origins (originID_disp, region) VALUES ('$id_disp','$name')";
        $conn->query($sql);
    
        $conn->close();
        
        include 'db.php';
        $defaultid = $id_disp + 1;
        $sql = "UPDATE origins SET originID_disp = '$defaultid' WHERE region = 'N/A'";
        $conn->query($sql);
    
        $conn->close();
        
        header("location: index_origins.php");
    }
    else
    {
        header("location: default.php");
    }
?>