<?php
  include 'db.php';
  
  $sql = "SELECT * FROM championsSkinsInfo";
  $result = mysqli_query($conn, $sql);

  while($row = $result->fetch_assoc()) {
    if ($row['skinID'] == $_GET['id']) {

      echo '<form class="form-inline m-2" action="updateskins.php" method="POST">';
      echo '<td><input type="text" class="form-control" name="championName" value="'.$row['championName'].'"></td>';
      echo '<td><input type="text" class="form-control" name="skinName" value="'.$row['skinName'].'"></td>';
      echo '<td><input type="date" class="form-control" name="releaseDate" value="'.$row['releaseDate'].'"></td>';
      echo '<td><input type="number" class="form-control" name="skinTierID" value="'.$row['skinTierID'].'"></td>';
      echo "<td>" . $row['skinTier'] . "</td>";
      echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
      echo '<input type="hidden" name="skinID" value="'.$row['skinID'].'">';
      echo '</form>';
    } 
    
    else {
    echo "<tr>";
    //echo "<table border=1 cellspacing=5 cellpading=0>";
    echo "<td>" . $row['championName'] . "</td>";
    echo "<td>" . $row['skinName'] . "</td>";
    echo "<td>" . $row['releaseDate'] . "</td>";
    echo "<td>" . $row['skinCost'] . "</td>";
    echo "<td>" . $row['skinTier'] . "</td>";
    echo '<td><a class="btn btn-primary" href="index_skins.php?id='.$row['skinID'].'" role="button">Update</a></td>';
    }
    echo '<td><a class="btn btn-danger" href="deleteskins.php?id='.$row['skinID'].'" role="button">Delete</a></td>';
    echo "</tr>";
 
}
?>