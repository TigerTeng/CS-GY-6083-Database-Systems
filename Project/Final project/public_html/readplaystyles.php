<?php
    include 'db.php';
    
    if ($_SESSION['usertype'] =='user')
    {
        $sql = "SELECT * FROM playstyles WHERE playstyleID != (SELECT MAX(playstyleID) FROM playstyles) ORDER BY playstyleID ASC";
        
        $result = mysqli_query($conn, $sql);
    
        while($row = $result->fetch_assoc()) 
        {
            echo "<tr>";
            echo "<td>" . $row['playstyleID'] . "</td>";
            echo "<td>" . $row['playstyle'] . "</td>";
            echo "</tr>";
        }
    }
    elseif ($_SESSION['usertype'] =='admin')
    {
        $sql = "SELECT * FROM playstyles ORDER BY playstyleID ASC";
        
        $result = mysqli_query($conn, $sql);
        
        while($row = $result->fetch_assoc()) 
        {
            if ($row['playstyleID'] == $_GET['id']) 
            {
                echo '<form class="form-inline m-2" action="updateplaystyles.php" method="POST">';
                echo "<td>" . $row['playstyleID'] . "</td>";
                echo '<td><input type="text" class="form-control" name="playstyle" value="'.$row['playstyle'].'"></td>';
                echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
                echo '<input type="hidden" name="playstyleID" value="'.$row['playstyleID'].'">';
                echo '</form>';
            } 
    
            else 
            {
                echo "<tr>";
                echo "<td>" . $row['playstyleID'] . "</td>";
                echo "<td>" . $row['playstyle'] . "</td>";
                echo '<td><a class="btn btn-primary" href="index_playstyles.php?id='.$row['playstyleID'].'" role="button">Update</a></td>';
                echo '<td><a class="btn btn-danger" href="deleteplaystyles.php?id='.$row['playstyleID'].'" role="button">Delete</a></td>';

            }
            echo "</tr>";
        }
    }
?>
