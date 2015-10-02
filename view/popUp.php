<?php
include("../controler/head.php");
?>
<div class="popUpBody">
	<div class="" style="">
		<div class="row">
			<div class="col-lg-12">
				<div class="btn-group  btn-group-justified">
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('source');" value="Ajout d'une Source">
					</div>
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('localisation');" value="Ajout d'une Localisation">
					</div>
				</div>
			</div>
		</div>
		</br>
		<div class = "row">
			<div class="col-lg-12">
				<div class="btn-group  btn-group-justified">
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('ville');" value="Ajout d'une Ville">
					</div>
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('pays');" value="Ajout d'un Pays"> 
					</div>
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('nationalite');" value="Ajout d'une Nationalité"> 
					</div>
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('langue');" value="Ajout d'une Langue"> 
					</div>
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('alias');" value="Ajout d'un Alias"> 
					</div>
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('telephone');" value="Ajout d'un Téléphone"> 
					</div>
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('profession');" value="Ajout d'une Profession"> 
					</div>
				</div>
			</div>
		</div>
	</div>
	</br>
	<div class="row">
		<div class="scrollable col-lg-12">
			<script type="text/javascript" src="../controler/utils.js"></script>
			<?php
			include("../controler/popUpControler.php");
			?>
		</div>
	</div>
</div>
<hr>