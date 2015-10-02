<?php
include("../model/BDDAccess.php");

/*
if(!isset($_SESSION))
    session_start();
if(!isset($_SESSION['hideModeWrite']))
    $_SESSION['hideModeWrite'] = 1;
if()
*/

if(!isset($_COOKIE['hideModeWrite']))
    setcookie("hideModeWrite", 1);

//$_SESSION['test'] = '\o/';

?>

<!DOCTYPE html>
<html>

    <?php include("../controler/head.php"); ?>
    
    <body>
        <div class="container-fluid">
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

        
        </div>
    </body>

</html>