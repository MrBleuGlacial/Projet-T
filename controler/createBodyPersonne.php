
<div class="row">   

    <?php
    $modeWrite = "";
    $modeRead = "";
    $subMode = "";
    $IDPersonneMode = "";
    $attributsMode = "";

    //$hideModeWrite = "";
    if(isset($_GET['modeWrite']))
    {
        $modeWrite = $_GET['modeWrite'];
    }
    if(isset($_GET['modeRead']))
    {
        $modeRead = $_GET['modeRead'];
    }
    if(isset($_GET['subMode']))
    {
        $subMode = $_GET['subMode'];
    }
    if(isset($_GET['IDPersonneMode']))
    {
        $IDPersonneMode = $_GET['IDPersonneMode'];
    }
    if(isset($_GET['attributsMode']))
    {
        $attributsMode = $_GET['attributsMode'];
    }
    //--------------------------------------------------------------------------------------------
    ?>
    <div class="col-lg-9" id="readPan">
        <div class="col-lg-12">
            <h3>Données disponibles :</h3>
            <!--
            <div id="calcul">
            <span id="AppearDesappear"> POP-AND-DEPOP </span>
            </div>
            -->
            
            <?php
            if(isset($_GET['modeRead']) AND $_GET['modeRead']=='link'){
            ?>
                <div id="menu">
                    <ul id="onglets">
                        <li class="btn"><a href=<?php echo '"'.'../view/index.php?modeRead=main&modeWrite='.$modeWrite.'&subMode='.$subMode.'&attributsMode='.$attributsMode.'"';?>> Vue Générale </a></li>
                        <li class="active btn"><a href=<?php echo '"'.'../view/index.php?modeRead=link&modeWrite='.$modeWrite.'&subMode='.$subMode.'&attributsMode='.$attributsMode.'"';?>> Liste Multiples </a></li>
                    </ul>
                </div>
            <?php
            }

            else{
            ?>
            <div id="menu">
                <ul id="onglets">
                    <li class="active btn"><a href=<?php echo '"'.'../view/index.php?modeRead=main&modeWrite='.$modeWrite.'&subMode='.$subMode.'&attributsMode='.$attributsMode.'"';?>> Vue Générale </a></li>
                    <li class="btn"><a href=<?php echo '"'.'../view/index.php?modeRead=link&modeWrite='.$modeWrite.'&subMode='.$subMode.'&attributsMode='.$attributsMode.'"';?>> Liste Multiples </a></li>
                </ul>
            </div>


            <?php 
            }
           ?> <div class="readPanel panelShadow panelBackground scrollable table-responsive"> <?php
            if($modeRead == "link"){
                //echo $_GET['modeRead'];
                include("../controler/tabPersonneLink.php");
            }
            elseif($modeRead == "attributs"){
                //echo $_GET['modeRead'];
                include("../controler/tabPersonneAttributs.php");
            }
            else{
                //echo $_GET['modeRead'];
                include("../controler/tabPersonneMain.php");
            }

            ?>
            </div>
        </div>
       
    </div>

   
<?php
//--------------------------------------------------------------------------------------------
?>

    <div class="col-lg-3" id="writePan">
    <h3>Ajout de données :</h3>  
    
     <div class="col-lg-12">
        <p>
        <div class="btn-toolbar menuDonneesPMA">
            <div class="btn-group  btn-group-justified">
                <div class="btn-group">
                    <button class="btn btn-custom2" onclick=<?php echo '"'.'switchModeP(\'../view/index.php\',\''.$modeRead.'\',\'main\',\''.$subMode.'\',\''.$IDPersonneMode.'\');'.'"';?>> Identifiants </button>
                </div>
                <div class="btn-group">
                    <button class="btn btn-custom1" onclick=<?php echo '"'.'switchModeP(\'../view/index.php\',\''.$modeRead.'\',\'link\',\''.$subMode.'\',\''.$IDPersonneMode.'\');'.'"';?>> Multiples </button>
                </div>
                <div class="btn-group">
                    <button class="btn btn-custom2" onclick=<?php echo '"'.'switchModeP(\'../view/index.php\',\''.$modeRead.'\',\'attributs\',\''.$subMode.'\',\''.$IDPersonneMode.'\');'.'"';?>> Attributs </button>
                </div>
            </div>
        </div>
        </p>
    </div>

    <?php
    //-------------------------------------
    if(isset($_GET['modeWrite']) AND $_GET['modeWrite']=='link'){
    ?>
        <div class="writePanel panelShadow panelBackground" id="linkPanelPersonne">
            <?php
            include("../controler/addPersonneLink.php");
            ?>
        </div>
    <?php
    }

    //-------------------------------------
    elseif(isset($_GET['modeWrite']) AND $_GET['modeWrite']=='attributs'){
    ?>
        <div class="writePanel panelShadow panelBackground" id="attributsPanelPersonne">
            <?php
            include("../controler/addPersonneAttributs.php");
            ?>
        </div>


    <?php
    }
    //--------------------------------------
    else{
    ?>
        <div class="writePanel panelShadow panelBackground scrollable" id="createPanelPersonne">
                <?php
                include("../controler/addPersonneMain.php");
                ?>
        </div>
    <?php
    }
    ?>
       
    </div>
</div>
