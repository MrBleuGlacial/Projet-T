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
	?>
	<div class="col-lg-9" id="readPan">
		<h3>Données disponibles :</h3>
			<div class="readPanel panelShadow panelBackground scrollable table-responsive">
				<?php
				include("../controler/tabRelationMain.php");
				?>
			</div>
	</div>
	<div class="col-lg-3" id="writePan">
		<h3>Ajout de données :</h3>  
		<?php
		include("../controler/addRelationMain.php");
		?>
	<div> 
</div>
