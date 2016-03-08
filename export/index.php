<?php
include("../model/BDDAccess.php");
if(!isset($_COOKIE['mainMenu']))
    setcookie("mainMenu", 4);
?>
<!DOCTYPE html>
<html>
    <?php include("../controler/head.php"); ?>
    <body>
        <div class="container-fluid">
        <?php include("../view/menu.php"); ?>   
            <div id="corps"> 
                </br> 
                <h3>Que voulez-vous exporter ?</h3>
                </br>
                </br>
                    <p class="row">
                        <p class="row">
                            <button class="btn btn-info btn-lg col-lg-offset-3 col-lg-6"
                            onclick="window.open('../export/personne.php','_self');">
                            Personne </button>
                        </p>
                        <p class="row">
                            <button class="btn btn-info btn-lg col-lg-offset-2 col-lg-3"
                            onclick="window.open('../export/lienfinancier.php','_self');">
                            Liens Financiers</button>
                            
                            <button class="btn btn-info btn-lg col-lg-offset-2 col-lg-3"
                            onclick="window.open('../export/liensexuel.php','_self');">
                            Liens Sexuels</button>
                        </p>
                    
                        <p class="row">
                            <button class="btn btn-info btn-lg col-lg-offset-2 col-lg-3"
                            onclick="window.open('../export/lienreseau.php','_self');">
                            Liens Réseaux</button>
                            
                            <button class="btn btn-info btn-lg col-lg-offset-2 col-lg-3"
                            onclick="window.open('../export/liensang.php','_self');">
                            Liens Sang</button>
                        </p>
                        <p class="row">
                            <button class="btn btn-info btn-lg col-lg-offset-2 col-lg-3"
                            onclick="window.open('../export/liensoutien.php','_self');">
                            Liens Soutien</button>
                            
                            <button class="btn btn-info btn-lg col-lg-offset-2 col-lg-3"
                            onclick="window.open('../export/lienconnaissance.php','_self');">
                            Liens Connaissance</button>
                        </p>
                    </p>
            </div>
        </div>
    </body>
</html>