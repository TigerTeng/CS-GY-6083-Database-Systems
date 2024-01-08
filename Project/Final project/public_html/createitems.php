<?php
    include 'db.php';
    if ($_SESSION['usertype'] =='user' || $_SESSION['usertype'] =='admin') 
    {
        $name = $_POST["itemName"];
        $cost = $_POST["itemCost"];
        $AD = $_POST["itemAD"];
        $CR = $_POST["itemCR"];
        $AS = $_POST["itemAS"];
        $APEN = $_POST["itemAPEN"];
        $LE = $_POST["itemLE"];
        $AP = $_POST["itemAP"];
        $MP = $_POST["itemMP"];
        $MPEN = $_POST["itemMPEN"];
        $HP = $_POST["itemHP"];
        $AR = $_POST["itemAR"];
        $MR = $_POST["itemMR"];
        $AH = $_POST["itemAH"];
        $MOVE = $_POST["itemMOVE"];
        $LS = $_POST["itemLS"];
        
        $sql = "INSERT INTO items (itemName, itemCost, itemAD, itemCR, itemAS, itemAPEN, itemLE, itemAP, itemMP, itemMPEN, itemHP, itemAR, itemMR, itemAH, itemMOVE, itemLS) VALUES ('$name', '$cost', '$AD', '$CR', '$AS', '$APEN', '$LE', '$AP', '$MP', '$MPEN', '$HP', '$AR', '$MR', '$AH', '$MOVE', '$LS')";
        
        
        $conn->query($sql);
        $sql = "UPDATE items SET itemCost = DEFAULT WHERE itemCost = '0'";
        $conn->query($sql);
        $sql = "UPDATE items SET itemAD = DEFAULT WHERE itemAD = '0'";
        $conn->query($sql);
        $sql = "UPDATE items SET itemCR = DEFAULT WHERE itemCR = '0'";
        $conn->query($sql);
        $sql = "UPDATE items SET itemAS = DEFAULT WHERE itemAS = '0'";
        $conn->query($sql);
        $sql = "UPDATE items SET itemAPEN = DEFAULT WHERE itemAPEN = '0'";
        $conn->query($sql);
        $sql = "UPDATE items SET itemLE = DEFAULT WHERE itemLE = '0'";
        $conn->query($sql);
        $sql = "UPDATE items SET itemAP = DEFAULT WHERE itemAP = '0'";
        $conn->query($sql);
        $sql = "UPDATE items SET itemMP = DEFAULT WHERE itemMP = '0'";
        $conn->query($sql);
        $sql = "UPDATE items SET itemMPEN = DEFAULT WHERE itemMPEN = '0'";
        $conn->query($sql);
        $sql = "UPDATE items SET itemHP = DEFAULT WHERE itemHP = '0'";
        $conn->query($sql);
        $sql = "UPDATE items SET itemAR = DEFAULT WHERE itemAR = '0'";
        $conn->query($sql);
        $sql = "UPDATE items SET itemMR = DEFAULT WHERE itemMR = '0'";
        $conn->query($sql);
        $sql = "UPDATE items SET itemAH = DEFAULT WHERE itemAH = '0'";
        $conn->query($sql);
        $sql = "UPDATE items SET itemMOVE = DEFAULT WHERE itemMOVE = '0'";
        $conn->query($sql);
        $sql = "UPDATE items SET itemLS = DEFAULT WHERE itemLS = '0'";
        $conn->query($sql);
        $conn->close();
        header("location: index_items.php");
    }
    else
    {
        header("location: default.php");
    }
?>