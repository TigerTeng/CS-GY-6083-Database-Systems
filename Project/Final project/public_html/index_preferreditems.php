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
            <li><a href="https://sp23-tiger-db-project.com/index_icons.php">Icons</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_items.php">Items</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_origins.php">Origins</a></li>
            <li><a href="https://sp23-tiger-db-project.com/index_playstyles.php">Playstyles</a></li>
            <li><a class="active" href="https://sp23-tiger-db-project.com/index_preferreditems.php">Preferred Items</a></li>
            <li><a href="https://sp23-tiger-db-project.com/logout.php">Logout</a></li>
        </ul>
        <div class="container">
            <h1>CSGY Principle of Databases</h1>
            <p>Table for winrate of items based on playstyle </p>
            <p>As a <?php echo $_SESSION["usertype"]?>, you can <b>NOT</b> add, update, or delete here</p>
            <table class="table">
                <tr>
                    <th scope="col">Playstyle</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Win Rate</th>
                    <th scope="col">Item Cost</th>
                </tr>
                <tbody>
                    <?php
                    include 'readpreferreditems.php';
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
