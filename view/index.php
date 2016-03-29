<?php
/**
*Index général de l'application.
*Invoque le module d'accés aux scripts et à la base de donnée puis initialise la construction de la page avec le bodyswitcher.
*/
/**
*
*/
include("../model/BDDAccess.php");
if(!isset($_COOKIE['hideModeWrite']))
    setcookie("hideModeWrite", 1);
?>
<!DOCTYPE html>
<html>
    <body>
    <?php include("../controler/head.php"); ?>
        <div class="container-fluid">
        <?php include("../view/menu.php"); ?>   
        <div id="corps">  
            <?php 
            include("../model/readBDD.php"); 
            include("../controler/bodySwitcher.php"); 
            ?>
        </div>
        </div>
    </body>
</html>