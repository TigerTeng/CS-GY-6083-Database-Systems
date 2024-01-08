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
            <li><a class="active" href="https://sp23-tiger-db-project.com/index_champions.php">Champions</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_icons.php">Icons</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_items.php">Items</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_origins.php">Origins</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_playstyles.php">Playstyles</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_preferreditems.php">Preferred Items</a></li>
            <li><a href="https://sp23-tiger-db-project.com/logout.php">Logout</a></li>
        </ul>
        <div class="container">
            <h1>CSGY Principle of Databases</h1>
            <p>Table for league of legends champions</p>
            <p>As a <?php echo $_SESSION["usertype"]?>, you can add, update, or delete champions</p>
      
            <form class="was-validated" action="createchampion.php" method="POST" novalidate>
    
            <div class="form-inline m-2">
                <b><label for="Name">Champion Name:</label></b>
                <input type="text" class="form-control m-2" id="championName" name="championName">
                <div class="valid-feedback"> Can be default (blank)</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        
            <div class="form-inline m-2">
                <b><label for="date">Release Date:</label></b>
                <input type="date" class="form-control m-2" id="releaseDate" name="releaseDate">
                <div class="valid-feedback"> Can be default (mm/dd/yyyy)</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
    
        	<div class="form-inline m-2">
                <b><label for="championCost">Blue Essense Cost:</label></b>
                <br><font size="-1"> 450, 1350, 3150, 4800, 6300</font></br>
                <input type="number" class="form-control m-2" id="championCost" name="championCost">
                <div class="valid-feedback"> Can be default (blank)</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
    
    	    <div class="form-inline m-2">
                <b><label for="origin">Origin Region (Required, number only):</label></b>
                <br><font size="-1"> 1- Bandle City, 2 - Bilgewater, 3 - Demacia, 4 - Ionia, 5 - Ixtal, 6 - Noxus, 7 - Piltover, 8 - Shadow Isles, 9 - Shurima, 10 - Targon, 11 - The Freljord, 12 - The Void, 13 - Zaun, 14 - N/A</font></br>
                <input type="number" class="form-control m-2" id="originID_disp" name="originID_disp" min="1" max="<?php echo $row['originCount']?>" required>
                <div class="valid-feedback"> Valid Region</div>
                <div class="invalid-feedback">Please input a valid region.</div>
            </div>
    
    	    <div class="form-inline m-2">
                <b><label for="playstyle">Champion Playstyle (Required, number only):</label></b>
                <br><font size="-1"> 1 - Controller, 2 - Fighter, 3 - Mage, 4 - Marksman, 5 - Slayer, 6 - Tank, 7 - N/A</font></br>
                <input type="number" class="form-control m-2" id="playstyleID" name="playstyleID" min="1" max="<?php echo $row['playstyleCount']?>" required>
                <div class="valid-feedback"> Valid Playstyle(blank)</div>
                <div class="invalid-feedback">Please input a valid playstyle.</div>
            </div>
    
            <button type="submit" class="btn btn-primary">Add</button>
    
            </form>
            <table class="table">
                <tr>
                    There are currently <?php echo $row['championCount']?> champions in this database
                    <th scope="col">Name</th>
                    <th scope="col">Release Date</th>
                    <th scope="col">Blue Essence Cost</th>
                    <th scope="col">Origin Region</th>
                    <th scope="col">Champion Playstyle</th>
                </tr>
                <tbody>
                    <?php
                    include 'readchampions.php'; 
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