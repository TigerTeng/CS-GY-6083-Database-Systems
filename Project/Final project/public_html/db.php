<?php
    $servername = "localhost";
    $database = "u204255896_leagueproject";
    $username = "u204255896_root";
    $password = "B#jO|oG6";
    
    session_start();

    // Create connection
 
    $conn = new mysqli($servername, $username, $password, $database);

    /*if (!$conn) {
     
        die("Connection failed: " . mysqli_connect_error());
     
    }
    echo "Connected successfully";
    mysqli_close($conn);*/

?>
