<?php
    include 'db.php';
    if ($_SESSION['usertype'] =='user' || $_SESSION['usertype'] =='admin') 
    {
        $id = $_POST["itemID"];
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
        $sql = "UPDATE items set itemName='$name', itemCost='$cost', itemAD='$AD', itemCR='$CR', itemAS='$AS', itemAPEN='$APEN', itemLE='$LE', itemAP='$AP', itemMP='$MP', itemMPEN='$MPEN', itemHP='$HP', itemAR='$AR', itemMR='$MR', itemAH='$AH', itemMOVE='$MOVE', itemLS='$LS' where itemID=$id";
        
        $result = $conn->query($sql);
        $conn->close();
        header("location: index_items.php"); 
    }
    else
    {
        header("location: default.php");
    }
?>
