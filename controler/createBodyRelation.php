<?php
	$modeWrite = "";
	$modeRead = "";
	$subMode = "";
	$IDPersonneMode = "";
	$IDRelationMode = "";
	$attributsMode = "";
	$formMode = "";

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
	if(isset($_GET['IDRelationMode']))
	{
		$IDRelationMode = $_GET['IDRelationMode'];
	}
	if(isset($_GET['attributsMode']))
	{
		$attributsMode = $_GET['attributsMode'];
	}
    if(isset($_GET['formMode']))
    {
        $formMode = $_GET['formMode'];
    }
?>

<div class="row">
	<?php
	//---------------- READ PANEL ---------------
	?>
	<div class="col-lg-9" id="readPan">
        <div class="col-lg-12">
			<h3>Données disponibles :</h3></br>
			<div class="readPanel panelShadow panelBackground scrollable table-responsive">
				<?php
				include("../controler/tabRelationMain.php");
				?>
			</div>
		</div>
	</div>
	<?php
	//---------------- WRITE PANEL --------------
	?>
	<div class="col-lg-3" id="writePan">
		<h3>Ajout de données :</h3>  

			<p>
	        <div class="btn-toolbar menuDonneesPMA">
	            <div class="btn-group  btn-group-justified">
	                <div class="btn-group">
	                    <button class="btn btn-custom2" onclick=<?php echo '"'.'switchModeR(\'../view/index.php\',\''.$modeRead.'\',\'main\',\''.$subMode.'\',\''.$IDPersonneMode.'\');'.'"';?>> Relations </button>
	                </div>
	                <div class="btn-group">
	                    <button class="btn btn-custom1" onclick=<?php echo '"'.'switchModeR(\'../view/index.php\',\''.$modeRead.'\',\'link\',\''.$subMode.'\',\''.$IDPersonneMode.'\');'.'"';?>> Sources </button>
	                </div>
	            </div>
	        </div>
	        </p>


			<?php
			if(isset($_GET['modeWrite']) AND $_GET['modeWrite']=='main'){
				include("../controler/addRelationMain.php");
			}
			?>
			<?php 
			if(isset($_GET['modeWrite']) AND $_GET['modeWrite']=='link'){
				include("../controler/addRelationLink.php");
			}
			?>
	</div>

</div>
