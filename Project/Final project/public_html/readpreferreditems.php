<?php
  include 'db.php';
  
  $sql = "SELECT * FROM itemsWinrate";
  
  $result = mysqli_query($conn, $sql);

  while($row = $result->fetch_assoc()) {
    
    echo "<tr>";
    //echo "<table border=1 cellspacing=5 cellpading=0>";
    echo "<td>" . $row['playstyle'] . "</td>";
    echo "<td>" . $row['itemName'] . "</td>";
    echo "<td>" . ($row['winRate'] * 100) . "%" . "</td>";
    echo "<td>" . $row['itemCost'] . "</td>";

    echo "</tr>";
 
}
?>