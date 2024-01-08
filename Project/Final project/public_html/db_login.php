<?php
    $servername = "localhost";
    $database = "u204255896_useraccess";
    $username = "u204255896_tiggyadmin";
    $password = "z6k!Xr08YHh7";
    
    session_start();
    // Create connection
 
    $conn = new mysqli($servername, $username, $password, $database);

    /*if (!$conn) {
     
        die("Connection failed: " . mysqli_connect_error());
     
    }
    echo "Connected successfully";
    mysqli_close($conn);*/

?>
