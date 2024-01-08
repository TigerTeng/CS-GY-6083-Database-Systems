<?php
    $servername = "localhost";
    $database = "u204255896_leagueproject";
    $username = "u204255896_root";
    $password = "League123";

    // Create connection
 
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    // Check connection
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Connected successfully";
    mysqli_close($conn);

?>