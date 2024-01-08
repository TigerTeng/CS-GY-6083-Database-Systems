<?php
  include 'db.php';
  $sql = "SELECT *, itemTier(itemCost)
    FROM `items`
	ORDER BY `itemCost` ASC";
  $result = mysqli_query($conn, $sql);
  while($row = $result->fetch_assoc()) {
    
    if ($row['itemID'] == $_GET['id']) {

        echo '<form class="form-inline m-2" action="updateitems.php" method="POST">';
        echo '<td><input type="text" class="form-control" name="itemName" value="'.$row['itemName'].'"></td>';
        echo '<td><input type="number" class="form-control" name="itemCost" value="'.$row['itemCost'].'"></td>';
        echo "<td>" . $row['itemTier(itemCost)'] . "</td>";
        echo '<td><input type="number" class="form-control" name="itemAD" value="'.$row['itemAD'].'"></td>';
        echo '<td><input type="number" class="form-control" name="itemCR" value="'.$row['itemCR'].'"></td>';
        echo '<td><input type="number" class="form-control" name="itemAS" value="'.$row['itemAS'].'"></td>';
        echo '<td><input type="number" class="form-control" name="itemAPEN" value="'.$row['itemAPEN'].'"></td>';
        echo '<td><input type="number" class="form-control" name="itemLE" value="'.$row['itemLE'].'"></td>';
        echo '<td><input type="number" class="form-control" name="itemAP" value="'.$row['itemAP'].'"></td>';
        echo '<td><input type="number" class="form-control" name="itemMP" value="'.$row['itemMP'].'"></td>';
        echo '<td><input type="number" class="form-control" name="itemMPEN" value="'.$row['itemMPEN'].'"></td>';
        echo '<td><input type="number" class="form-control" name="itemHP" value="'.$row['itemHP'].'"></td>';
        echo '<td><input type="number" class="form-control" name="itemAR" value="'.$row['itemAR'].'"></td>';
        echo '<td><input type="number" class="form-control" name="itemMR" value="'.$row['itemMR'].'"></td>';
        echo '<td><input type="number" class="form-control" name="itemAH" value="'.$row['itemAH'].'"></td>';
        echo '<td><input type="number" class="form-control" name="itemMOVE" value="'.$row['itemMOVE'].'"></td>';
        echo '<td><input type="number" class="form-control" name="itemLS" value="'.$row['itemLS'].'"></td>';
        echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
        echo '<input type="hidden" name="itemID" value="'.$row['itemID'].'">';
        echo '</form>';
    } 
    
    else {
        
    echo "<tr>";
    //echo "<table border=1 cellspacing=5 cellpading=0>";
    echo "<td>" . $row['itemName'] . "</td>";
    echo "<td>" . $row['itemCost'] . "</td>";
    echo "<td>" . $row['itemTier(itemCost)'] . "</td>";
    echo "<td>" . $row['itemAD'] . "</td>";
    echo "<td>" . $row['itemCR'] . "</td>";
    echo "<td>" . $row['itemAS'] . "</td>";
    echo "<td>" . $row['itemAPEN'] . "</td>";
    echo "<td>" . $row['itemLE'] . "</td>";
    echo "<td>" . $row['itemAP'] . "</td>";
    echo "<td>" . $row['itemMP'] . "</td>";
    echo "<td>" . $row['itemMPEN'] . "</td>";
    echo "<td>" . $row['itemHP'] . "</td>";
    echo "<td>" . $row['itemAR'] . "</td>";
    echo "<td>" . $row['itemMR'] . "</td>";
    echo "<td>" . $row['itemAH'] . "</td>";
    echo "<td>" . $row['itemMOVE'] . "</td>";
    echo "<td>" . $row['itemLS'] . "</td>";
    echo '<td><a class="btn btn-primary" href="index_items.php?id='.$row['itemID'].'" role="button">Update</a></td>';
    }
    echo '<td><a class="btn btn-danger" href="deleteitems.php?id='.$row['itemID'].'" role="button">Delete</a></td>';
    echo "</tr>";
 
}
?>
