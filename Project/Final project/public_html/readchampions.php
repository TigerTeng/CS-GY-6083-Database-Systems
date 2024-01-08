<?php
  include 'db.php';
  $sql = "SELECT * FROM championsInfo ORDER BY championName";
  $result = mysqli_query($conn, $sql);

  while($row = $result->fetch_assoc()) {
    
    if ($row['championID'] == $_GET['id']) {

      echo '<form class="form-inline m-2" action="updatechampions.php" method="POST">';
      echo '<td><input type="text" class="form-control" name="championName" value="'.$row['championName'].'"></td>';
      echo '<td><input type="date" class="form-control" name="releaseDate" value="'.$row['releaseDate'].'"></td>';
      echo '<td><input type="number" class="form-control" name="championCost" value="'.$row['championCost'].'"></td>';
      echo '<td><input type="number" class="form-control" name="originID_disp" value="'.$row['originID_disp'].'"></td>';
      echo '<td><input type="number" class="form-control" name="playstyleID" value="'.$row['playstyleID'].'"></td>';
      echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
      echo '<input type="hidden" name="championID" value="'.$row['championID'].'">';
      echo '</form>';
    } 
    
    else {
    echo "<tr>";
    //echo "<table border=1 cellspacing=5 cellpading=0>";
    echo "<td>" . $row['championName'] . "</td>";
    echo "<td>" . $row['releaseDate'] . "</td>";
    echo "<td>" . $row['championCost'] . "</td>";
    echo "<td>" . $row['region'] . "</td>";
    echo "<td>" . $row['playstyle'] . "</td>";
    echo '<td><a class="btn btn-primary" href="index_champions.php?id='.$row['championID'].'" role="button">Update</a></td>';
    }
    echo '<td><a class="btn btn-danger" href="deletechampions.php?id='.$row['championID'].'" role="button">Delete</a></td>';
    echo "</tr>";
 
}
?>