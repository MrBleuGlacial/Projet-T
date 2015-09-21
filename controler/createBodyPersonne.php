
<div class="readPanel panelShadow panelBackground scrollable">
    
<h3>Données disponibles :</h3>

<?php
    $modeWrite = "";
    $modeRead = "";
    $subMode = "";
    $IDPersonneMode = "";
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
        $subMode = $_GET['IDPersonneMode'];
    }

    if(isset($_GET['modeRead']) AND $_GET['modeRead']=='link'){
    ?>
        <div id="menu">
            <ul id="onglets">
                <li ><a href=<?php echo '"'.'../view/index.php?modeRead=main&modeWrite='.$modeWrite.'&subMode='.$subMode.'"';?>> Données Uniques </a></li>
                <li class="active"><a href=<?php echo '"'.'../view/index.php?modeRead=link&modeWrite='.$modeWrite.'&subMode='.$subMode.'"';?>> Données Multiples </a></li>
            </ul>
        </div>
    <?php
    }

    else{
    ?>
    <div id="menu">
        <ul id="onglets">
            <li class="active"><a href=<?php echo '"'.'../view/index.php?modeRead=main&modeWrite='.$modeWrite.'&subMode='.$subMode.'"';?>> Données Uniques </a></li>
            <li><a href=<?php echo '"'.'../view/index.php?modeRead=link&modeWrite='.$modeWrite.'&subMode='.$subMode.'"';?>> Données Multiples </a></li>
        </ul>
    </div>

    <?php 
}
 
    if($modeRead == "main"){
        //echo $_GET['modeRead'];
        include("../controler/tabPersonneMain.php");
    }
    if($modeRead == "link"){
        //echo $_GET['modeRead'];
        include("../controler/tabPersonneLink.php");
    }

    ?>
    
</div>


<div class="buttonTop buttonBottom">
    <button onclick=<?php echo '"'.'switchModeRW(\'../view/index.php\',\''.$modeRead.'\',\'main\');'.'"';?>> Données primaires </button>
    <button onclick=<?php echo '"'.'switchModeRW(\'../view/index.php\',\''.$modeRead.'\',\'link\');'.'"';?>> Données multiples </button>
    <button onclick=<?php echo '"'.'switchModeRW(\'../view/index.php\',\''.$modeRead.'\',\'attributs\');'.'"';?>> Attributs </button>
</div>


<?php
//-----------------------------------------------------------
if(isset($_GET['modeWrite']) AND $_GET['modeWrite']=='link'){
?>
    <div class="writePanel panelShadow panelBackground" id="linkPanelPersonne">
        <h3>Ajout de données :</h3>  
        <?php
        include("../controler/addPersonneLink.php");
        ?>
    </div>
<?php
}

//-----------------------------------------------------------
elseif(isset($_GET['modeWrite']) AND $_GET['modeWrite']=='attributs'){
?>
    <div class="writePanel panelShadow panelBackground" id="linkPanelPersonne">
        <?php
        include("../controler/addPersonneAttributs.php");
        ?>
    </div>


<?php
}
//-----------------------------------------------------------
else{
?>
    <div class="writePanel panelShadow panelBackground scrollable" id="createPanelPersonne">
            <h3>Ajout de données :</h3>
            <?php
            include("../controler/addPersonneMain.php");
            ?>
    </div>
<?php
}
?>