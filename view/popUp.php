<?php
include("../controler/head.php");
?>
<div class="popUpBody">
	<div class="" style="">
		<div class="row">
			<div class="col-lg-12">
				<div class="btn-group  btn-group-justified">
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('source');" value="Source">
					</div>
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('localisation');" value="Localisation">
					</div>
				</div>
			</div>
		</div>
		</br>
		<div class = "row">
			<div class="col-lg-12">
				<div class="btn-group  btn-group-justified">
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('natureCote');" value="Nature Cote">
					</div>
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('ville');" value="Ville">
					</div>
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('pays');" value="Pays"> 
					</div>
					<!--
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('nationalite');" value="Nationalité"> 
					</div>
					-->
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('langue');" value="Langue"> 
					</div>
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('alias');" value="Alias"> 
					</div>
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('telephone');" value="Téléphone"> 
					</div>
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('profession');" value="Profession"> 
					</div>
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('role');" value="Rôle"> 
					</div>
				</div>
			</div>
		</div>
		</br>
		<div class = "row">
			<div class="col-lg-12">
				<div class="btn-group  btn-group-justified">
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('sociogeo');" value="Contexte Socio/Géo">
					</div>
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('actioncontrepartie');" value="Action en contrepartie"> 
					</div>
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('modalite');" value="Modalité"> 
					</div>
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('actionreseau');" value="Action Réseau"> 
					</div>
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('fonctionjuju');" value="Fonction Juju"> 
					</div>
					<div class="btn-group">
					<input class="btn btn-primary" type=button onclick="refreshPopUp('typesoutien');" value="Type de soutien"> 
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