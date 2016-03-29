<?php
/**
*Page d'erreur en cas de saisie de donnée unique déjà existante dans la BDD.
*/
/**
*
*/
?>
<!DOCTYPE html>
<html>
    <body>
    <?php include("../controler/head.php"); ?>
        <div class="container-fluid">
            <?php include("../view/menu.php"); ?>   
            <div id="corps">  
                </br>
                Erreur : la donnée a déjà été saisie.
                </br>
                </br>
                <button onclick="javascript:history.back();" class="btn btn-warning"> Précédent </button>
            </div>
        </div>
    </body>
</html>