<?php
    include 'db.php';
    
    if ($_SESSION['usertype'] =='user')
    {
        $sql = "SELECT originID_disp, region FROM origins WHERE originID != (SELECT MAX(originID) FROM origins) ORDER BY originID_disp ASC";
        
        $result = mysqli_query($conn, $sql);
    
        while($row = $result->fetch_assoc()) 
        {
            echo "<tr>";
            echo "<td>" . $row['originID_disp'] . "</td>";
            echo "<td>" . $row['region'] . "</td>";
            echo "</tr>";
        }
    }
    elseif ($_SESSION['usertype'] =='admin')
    {
        $sql = "SELECT originID_disp, region FROM origins ORDER BY originID_disp ASC";
        
        $result = mysqli_query($conn, $sql);
        
        while($row = $result->fetch_assoc()) 
        {
            if ($row['originID_disp'] == $_GET['id']) 
            {
                echo '<form class="form-inline m-2" action="updateorigins.php" method="POST">';
                echo "<td>" . $row['originID_disp'] . "</td>";
                echo '<td><input type="text" class="form-control" name="region" value="'.$row['region'].'"></td>';
                echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
                echo '<input type="hidden" name="originID_disp" value="'.$row['originID_disp'].'">';
                echo '</form>';
            } 
    
            else 
            {
                echo "<tr>";
                echo "<td>" . $row['originID_disp'] . "</td>";
                echo "<td>" . $row['region'] . "</td>";
                echo '<td><a class="btn btn-primary" href="index_origins.php?id='.$row['originID_disp'].'" role="button">Update</a></td>';
                echo '<td><a class="btn btn-danger" href="deleteorigins.php?id='.$row['originID_disp'].'" role="button">Delete</a></td>';

            }
            echo "</tr>";
        }
    }
?>
