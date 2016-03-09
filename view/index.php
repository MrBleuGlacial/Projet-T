<?php
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