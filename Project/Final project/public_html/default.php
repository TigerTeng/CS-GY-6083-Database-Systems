<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
        <link rel='stylesheet' href='style.css'/>
    </head>
    <body>

<!--    
    <ul>
        <li><a class="active" href="https://sp23-tiger-db-project.com/default.php">Home</a></li>
        <li><a href="https://sp23-tiger-db-project.com/index_skins.php">Skins</a></li>
        <li><a href="https://sp23-tiger-db-project.com/index_champions.php">Champions</a></li>
        <li><a href="https://sp23-tiger-db-project.com/index_icons.php">Icons</a></li>
        <li><a href="https://sp23-tiger-db-project.com/index_items.php">Items</a></li>
        <li><a href="https://sp23-tiger-db-project.com/index_origins.php">Origins</a></li>
        <li><a href="https://sp23-tiger-db-project.com/index_playstyles.php">Playstyles</a></li>
        <li><a href="https://sp23-tiger-db-project.com/index_preferreditems.php">Preferred Items</a></li>
    </ul>
-->
    <div class="container">
        <h1>CSGY Principle of Databases</h1>
        <p>A (simple) League of Legends Database</p>
    </div>

    <div class="container">
         <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>
    <form class="form-inline m-2" action="login.php" method="POST">
        <b><label for="Name">Username:</label></b>
        <input type="text" class="form-control m-2" id="username" name="username">
        <p>User: teemo</p>
    
        <b><label for="password">password:</label></b>
        <input type="password" class="form-control m-2" id="password" name="password">
        <p>Pass: teemo12345</p>
    
  		
        <button type="submit" class="btn btn-primary">Add</button>
    </form> 
    </div>
    </body>
    
</html>
