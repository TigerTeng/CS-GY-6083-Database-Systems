<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel='stylesheet' href='style.css'/>
    </head>
    <body>
    <?php 
            if ($_SESSION['usertype'] =='user') 
            {   
            ?>
        <ul>
            <li><a href="https://sp23-tiger-db-project.com/home.php">Home</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_skins.php">Skins</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_champions.php">Champions</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_icons.php">Icons</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_items.php">Items</a></li>
            <li><a class="active" href="https://sp23-tiger-db-project.com/index_origins.php">Origins</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_playstyles.php">Playstyles</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_preferreditems.php">Preferred Items</a></li>
            <li><a href="https://sp23-tiger-db-project.com/logout.php">Logout</a></li>
        </ul>

        <div class="container">
            <h1>CSGY Principle of Databases</h1>
            <p>Table for league of legends champions' origins</p>
            
                <p>As a <?php echo $_SESSION["usertype"]?>, you can <b>NOT</b> add, update, or delete origins</p>
  
      
                <table class="table">
                    <tr>
                        <th scope="col">Origin ID</th>
                        <th scope="col">Origin Name</th>
                    </tr>
                    <tbody>
                        <?php
                        include 'readorigins.php'; 
                        ?>
                    </tbody>
                </table>
            <?php
            }
            elseif ($_SESSION['usertype'] =='admin')
            {
            ?>
            <ul>
            <li><a href="https://sp23-tiger-db-project.com/home.php">Home</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_skins.php">Skins</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_champions.php">Champions</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_icons.php">Icons</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_items.php">Items</a></li>
            <li><a class="active" href="https://sp23-tiger-db-project.com/index_origins.php">Origins</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_playstyles.php">Playstyles</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_preferreditems.php">Preferred Items</a></li>
            <li><a href="https://sp23-tiger-db-project.com/logout.php">Logout</a></li>
        </ul>

        <div class="container">
            <h1>CSGY Principle of Databases</h1>
            <p>Table for league of legends champions' origins</p>
                <p>As a <?php echo $_SESSION["usertype"]?>, you can add, update, or delete origins</p>
                <form class="was-validated" action="createorigins.php" method="POST" novalidate>
    
                    <div class="form-inline m-2">
                        <b><label for="Name">Region:</label></b>
                        <input type="text" class="form-control m-2" id="region" name="region" required>
                        <div class="invalid-feedback">Please fill out this field.</div>
                        <button type="submit" class="btn btn-primary">Add</button>
                
                </form>
          
                <table class="table">
                    <tr>
                        <th scope="col">Origin ID</th>
                        <th scope="col">Origin Name</th>
                    </tr>
                    <tbody>
                        <?php
                        include 'readorigins.php'; 
                        ?>
                    </tbody>
                </table>
            <?php
            
            }
            else
            {
                header("location: default.php");
            }
            ?>
</div>
</body>
</html>
