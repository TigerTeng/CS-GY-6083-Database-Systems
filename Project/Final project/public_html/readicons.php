<?php
  include 'db.php';
  $sql = "SELECT * FROM icons";
  $result = mysqli_query($conn, $sql);

  while($row = $result->fetch_assoc()) {
    
    if ($row['iconID'] == $_GET['id']) {

      echo '<form class="form-inline m-2" action="updateicons.php" method="POST">';
      echo '<td><input type="text" class="form-control" name="iconName" value="'.$row['iconName'].'"></td>';
      echo '<td><input type="date" class="form-control" name="releaseDate" value="'.$row['releaseDate'].'"></td>';
      echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
      echo '<input type="hidden" name="iconID" value="'.$row['iconID'].'">';
      echo '</form>';
    } 
    
    else {
    echo "<tr>";
    //echo "<table border=1 cellspacing=5 cellpading=0>";
    echo "<td>" . $row['iconName'] . "</td>";
    echo "<td>" . $row['releaseDate'] . "</td>";
    echo '<td><a class="btn btn-primary" href="index_icons.php?id='.$row['iconID'].'" role="button">Update</a></td>';
    }
    echo '<td><a class="btn btn-danger" href="deleteicons.php?id='.$row['iconID'].'" role="button">Delete</a></td>';
    echo "</tr>";
 
}
?>