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
        if ($_SESSION['usertype'] =='user' || $_SESSION['usertype'] =='admin') 
        {
        ?>
        <ul>
            <li><a href="https://sp23-tiger-db-project.com/home.php">Home</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_skins.php">Skins</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_champions.php">Champions</a></li>
            <li><a class="active" href="https://sp23-tiger-db-project.com/index_icons.php">Icons</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_items.php">Items</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_origins.php">Origins</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_playstyles.php">Playstyles</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_preferreditems.php">Preferred Items</a></li>
            <li><a href="https://sp23-tiger-db-project.com/logout.php">Logout</a></li>
        </ul>
        <div class="container">
            <h1>CSGY Principle of Databases</h1>
            <p>Table for icons</p>
            <p>As a <?php echo $_SESSION["usertype"]?>, you can add, update, or delete icons</p>
  
            <form class="form-inline m-2" action="createicons.php" method="POST">
                <b><label for="Name">Icon Name:</label></b>
                <input type="text" class="form-control m-2" id="iconName" name="iconName">
    
                <b><label for="date">Release Date:</label></b>
                <input type="date" class="form-control m-2" id="releaseDate" name="releaseDate">
    
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
            <table class="table">
                <tr>
                    <th scope="col">Icon Name</th>
                    <th scope="col">Release Date</th>
                </tr>
                <tbody>
                    <?php
                    include 'readicons.php'; 
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
