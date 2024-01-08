<?php
    include 'db.php';
    $sql = "CALL allCount()";
    $result = mysqli_query($conn, $sql);
    
    while($row = $result->fetch_assoc()) 
    {
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel='stylesheet' href='style.css'/>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
    <?php 
        if ($_SESSION['usertype'] =='user' || $_SESSION['usertype'] =='admin') 
        {
    ?>
        <ul>
            <li><a href="https://sp23-tiger-db-project.com/home.php">Home</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_skins.php">Skins</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_champions.php">Champions</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_icons.php">Icons</a></li>
            <li><a class="active" href="https://sp23-tiger-db-project.com/index_items.php">Items</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_origins.php">Origins</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_playstyles.php">Playstyles</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_preferreditems.php">Preferred Items</a></li>
            <li><a href="https://sp23-tiger-db-project.com/logout.php">Logout</a></li>
        </ul>
        <div class="container">
            <h1>CSGY Principle of Databases</h1>
            <p>Table for league of legends items to buy in game</p>
            <p>As a <?php echo $_SESSION["usertype"]?>, you can add, update, or delete items</p>
  
            <form class="form-inline m-2" action="createitems.php" method="POST">
                <b><label for="Name">Item Name:</label></b>
                <input type="text" class="form-control m-2" id="itemName" name="itemName">
                
                <b><label for="date">Item Cost:</label></b>
                <input type="number" class="form-control m-2" id="itemCost" name="itemCost">
                
                <b><label for="date">Attack Damage:</label></b>
                <input type="number" class="form-control m-2" id="itemAD" name="itemAD">
                
                <b><label for="date">Critical Rate:</label></b>
                <input type="number" class="form-control m-2" id="itemCR" name="itemCR">
                
                <b><label for="date">Attack Speed:</label></b>
                <input type="number" class="form-control m-2" id="itemAS" name="itemAS">
                
                <b><label for="date">Armor Penetration:</label></b>
                <input type="number" class="form-control m-2" id="itemAPEN" name="itemAPEN">
                
                <b><label for="date">Lethality:</label></b>
                <input type="number" class="form-control m-2" id="itemLE" name="itemLE">
                
                <b><label for="date">Ability Power:</label></b>
                <input type="number" class="form-control m-2" id="itemAP" name="itemAP">
                
                <b><label for="date">Mana:</label></b>
                <input type="number" class="form-control m-2" id="itemMP" name="itemMP">
                
                <b><label for="date">Magic Penetration:</label></b>
                <input type="number" class="form-control m-2" id="itemMPEN" name="itemMPEN">
                
                <b><label for="date">Health:</label></b>
                <input type="number" class="form-control m-2" id="itemHP" name="itemHP">
                
                <b><label for="date">Armor:</label></b>
                <input type="number" class="form-control m-2" id="itemAR" name="itemAR">
                
                <b><label for="date">Magic Resistance:</label></b>
                <input type="number" class="form-control m-2" id="itemMR" name="itemMR">
                
                <b><label for="date">Ability Haste:</label></b>
                <input type="number" class="form-control m-2" id="itemAH" name="itemAH">
                
                <b><label for="date">Movement Speed:</label></b>
                <input type="number" class="form-control m-2" id="itemMOVE" name="itemMOVE">
                
                <b><label for="date">Life Steal:</label></b>
                <input type="number" class="form-control m-2" id="itemLS" name="itemLS">
  		
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
      
            <table class="table" table style="width:125%">
                <tr>
                    There are currently <?php echo $row['itemCount']?> items in this database
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Cost</th>
                    <th scope="col">Item Tier</th>
                    <th scope="col">Attack Damage</th>
                    <th scope="col">Critical Rate</th>
                    <th scope="col">Attack Speed</th>
                    <th scope="col">Armor Penetration</th>
                    <th scope="col">Lethality</th>
                    <th scope="col">Ability Power</th>
                    <th scope="col">Mana</th>
                    <th scope="col">Magic Penetration</th>
                    <th scope="col">Health</th>
                    <th scope="col">Armor</th>
                    <th scope="col">Magic Resistance</th>
                    <th scope="col">Ability Haste</th>
                    <th scope="col">Move Speed</th>
                    <th scope="col">Life Steal</th>
                </tr>
                <tbody>
                    <?php
                    include 'readitems.php'; 
        }
        else
        {
            header("location: default.php");
        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
<?php 
    }
?>