<?php
include("../model/BDDAccess.php");
?>

<!DOCTYPE html>
<html>

    <?php include("../controler/head.php"); ?>
    
    <body>

    <!-- L'en-tête -->  
    <?php include("header.php"); ?>
    
    <!-- Le menu -->
    <?php include("menu.php"); ?>   
    
    <!-- Le corps -->
    <div id="corps">  
        <?php 
        include("../model/readBDD.php"); 
        include("../controler/bodySwitcher.php"); 
        ?>
    </div>
    
    <!-- Le pied de page -->
    <?php include("footer.php"); ?>
    
    </body>

</html>