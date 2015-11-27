<form method="post" action="../model/writeBDDRelationMain.php">

 <?php 
    $url = './index.php?relationView=1&modeRead='.$modeRead.'&IDPersonneMode='.$IDPersonneMode.'&attributsMode='.$attributsMode.'&modeWrite='.$modeWrite.'&subMode=';
    $varSubMode = $subMode;
    if($varSubMode == '' OR $varSubMode == 'undefined')
        $varSubMode = 'Veuillez choisir une valeur'; //Sélectionnez une valeur
    else
        $varSubMode = 'Actuel : '.$varSubMode;
?>

<select class="btn btn-primary btn-xs" onchange="location = this.options[this.selectedIndex].value;">
    <option value= <?php echo '\''. $url . ''.'\'';?>><?php echo $varSubMode; ?></option>
    <option value= <?php echo '\''. $url . 'financier'.'\'';?>>Financier</option>
    <option value= <?php echo '\''. $url . 'sang'.'\'';?>>Sang</option>
    <option value= <?php echo '\''. $url . 'sexuel'.'\'';?>>Sexuel</option>
    <option value= <?php echo '\''. $url . 'réseau'.'\'';?>>Réseau</option>
    <option value= <?php echo '\''. $url . 'connaissance'.'\'';?>>Connaissance</option>
    <option value= <?php echo '\''. $url . 'juju'.'\'';?>>Juju</option>
    <option value= <?php echo '\''. $url . 'soutien'.'\'';?>>Soutien</option>
</select></br></br>




<?php
if(isset($_GET['subMode']) AND $_GET['subMode']!='undefined' AND $_GET['subMode']!=''){

	selectIDPersonne('Alter :','IDAlter');
	selectIDPersonne('Ego :','IDEgo');
	addLinkedDataEntryWithoutEmptyOption(readAllTable('cote'),'Cote initiale :','IDCoteInitiale','IDCote','NomCote',true);
	?>
	<label>Trace du lien dans le dossier :</label>
	<select class="form-control" type='text' name='TraceLienDossier'>
		<option value='avéré (admin)'>Avéré (admin)</option>
		<option value='téléphonique'>Téléphonique</option>
		<option value='déclaratif'>Déclaratif</option>
		<option value='sms'>SMS</option>
		<option value='internet'>Internet</option>
		<option value='visuel'>Visuel</option>
		<option value='autre'>Autre</option>
		<option value='inconnu'>Inconnu</option>
	</select>

	<?php

	addLinkedDataEntry(readAllTable('contexteSocioGeo'),'Contexte Socio/Géo :','IDContexteSocioGeo','IDContexteSocioGeo','ContexteSocioGeo',True);

	?>


	<?php
	//-------------------- FINANCIER --------------------
	if($_GET['subMode']=='financier'){
		addLinkedDataEntry(readAllTable('actionEnContrepartie'),'Action en contrepartie :','IDActionEnContrepartie','IDActionEnContrepartie','ActionEnContrepartie',True);
		addSimpleInput('Date du flux :', 'date','DateFlux');
		?>
		<label>Date du flux approximation :</label>
    	<input class="form-control" type="text" name="DateFluxApx"/>
		<?php
		//addSimpleInput('Fréquence :', 'number','Frequence');
		selectInput('Fréquence :','frequenceFluxFinancier','IDFrequence','IDFrequence','Frequence');
		addSimpleInput('Montant en euro :', 'number','MontantEuro');
		selectInput('Modalité 1 :','modalite','IDModalite','IDModalite','Modalite');
		selectIDPersonneWithEmptyOption('Intermédiaire 1 :','IDIntermediaire');
		selectInput('Modalité 2 :','modalite','IDModalite2','IDModalite','Modalite');
		selectIDPersonneWithEmptyOption('Intermédiaire 2 :','IDIntermediaire2');
		selectLocalisation('Localisation Alter :','IDLocalisationAlter');
		selectLocalisation('Localisation Ego :','IDLocalisationEgo');
		?>
		<label>Intermediaire :</label>
		<div class="form-control">
			<label class="radio-inline">
				<input name="Intermediaire" value="1" checked="checked" type="radio">
				Oui
			</label> 
			<label class="radio-inline">
				<input name="Intermediaire" value="0" type="radio">
				Non
			</label>
		</div>
		<?php
		addSimpleInput('Identification du flux :', 'number','IdentificationFlux');
		addSimpleInput('Action du flux :', 'text','ActionDuFlux');
		?>
		<input type="hidden"  name="TypeLien"  value="financier">
		<?php
	//formLinkDuo('alias','LinkAlias','Alias :','AliasNew',readAllTable('alias'),'IDAlias','IDAlias','Alias');
	}

	//-------------------- SANG --------------------
	if($_GET['subMode']=='sang'){
		?>
		<label>Type de la relation :</label>
		<select class="form-control" type='text' name='Type'>
			<option value="fratrie">Fratrie</option>
			<option value="parent">Parent</option>
			<option value="enfant">Enfant</option>
			<option value="oncle/tante">Oncle/Tante</option>
			<option value="grands parents">Grands Parents</option>
			<option value="demi-fratrie">Demi-Fratrie</option>
			<option value="autre">Autre</option>
		</select>
		<label>Certification :</label>
		<select class="form-control" type='text' name="Certification">
			<option value="avéré">Avéré</option>
			<option value="prétendu">Prétendu</option>
		</select>
		<input type="hidden"  name="TypeLien"  value="sang">
	<?php
	}

	//-------------------- SEXUEL ---------------------
	if($_GET['subMode']=='sexuel'){
		?>
		<label>Prostitution :</label>
		<div class="form-control">
			<label class="radio-inline">
				<input name="Prostitution" value="1" type="radio">
				Oui
			</label> 
			<label class="radio-inline">
				<input name="Prostitution" value="0" type="radio">
				Non
			</label>
			<label class="radio-inline">
				<input name="Prostitution" value="" checked="checked" type="radio">
				Inconnu
			</label>
		</div>
		<label>Viol :</label>
		<div class="form-control">
			<label class="radio-inline">
				<input name="Viol" value="1" type="radio">
				Oui
			</label> 
			<label class="radio-inline">
				<input name="Viol" value="0" type="radio">
				Non
			</label>
			<label class="radio-inline">
				<input name="Viol" value="" checked="checked" type="radio">
				Inconnu
			</label>
		</div>
		<label>En Couple :</label>
		<div class="form-control">
			<label class="radio-inline">
				<input name="EnCouple" value="1" type="radio">
				Oui
			</label> 
			<label class="radio-inline">
				<input name="EnCouple" value="0" type="radio">
				Non
			</label>
			<label class="radio-inline">
				<input name="EnCouple" value="" checked="checked" type="radio">
				Inconnu
			</label>
		</div>
		<?php
		addSimpleInput('Date du début :', 'date','DateDebut');
		addSimpleInput('Date de fin :', 'date','DateFin');
		?>
		<label>Date approximation :</label>
    	<input class="form-control" type="text" name="DateApx"/>
		<label>Type du lien sexuel :</label>
		<select class="form-control" type='text' name='TypeLienSexuel'>
			<option value="Mari">Mari</option>
			<option value="Concubin">Concubin</option>
			<option value="Amant">Amant</option>
			<option value="Petit-Ami">Petit-Ami</option>
			<option value="Autre">Autre</option>
		</select>
		<input type="hidden"  name="TypeLien"  value="sexuel">
		<?
	}

	//-------------------- RESEAU --------------------
	if($_GET['subMode']=='réseau'){
		selectInput('Action du réseau :','actionReseau','IDActionReseau','IDActionReseau','ActionReseau');
		addSimpleInput('Date Identification :', 'date','DateIdentification');
		?>
		<label>Date Identification approximation :</label>
    	<input class="form-control" type="text" name="DateIdentificationApx"/>
		<?php
		selectLocalisation('Localisation Alter :','IDLocalisationAlter');
		selectLocalisation('Localisation Ego :','IDLocalisationEgo');
		?>
		<label>Intermediaire :</label>
		<div class="form-control">
			<label class="radio-inline">
				<input name="Intermediaire" value="1" checked="checked" type="radio">
				Oui
			</label> 
			<label class="radio-inline">
				<input name="Intermediaire" value="0" type="radio">
				Non
			</label>
		</div>
		<?php
		addSimpleInput('Identification Réseau :', 'number','IDReseau');
		addSimpleInput('Note sur l\'action du réseau :', 'text','NoteAction');
		?>
		<input type="hidden"  name="TypeLien"  value="réseau">
		<?php
	}

	//-------------------- CONNAISSANCE --------------------
	if($_GET['subMode']=='connaissance'){
		addSimpleInput('Premier évènement :', 'date','PremierEvenement');
		selectLocalisation('Localisation Alter :','IDLocalisationAlter');
		selectLocalisation('Localisation Ego :','IDLocalisationEgo');
		?>
		<input type="hidden"  name="TypeLien"  value="connaissance">
		<?php
	}

	//-------------------- JUJU -------------------- 
	if($_GET['subMode']=='juju'){
		addSimpleInput('Date :', 'date','Date');
		selectLocalisation('Localisation de la cérémonie :','IDLocalisationCeremonie');
		selectInput('Fonction Alter :','fonctionJuju','IDFonctionAlterJuju','IDFonctionJuju','FonctionJuju');
		selectInput('Fonction Ego :','fonctionJuju','IDFonctionEgoJuju','IDFonctionJuju','FonctionJuju');
		addSimpleInput('Identification Juju :', 'number','IDJuju');
		?>
		<input type="hidden"  name="TypeLien"  value="juju">
		<?php
	}

	//------------------------- SOUTIEN --------------------
	if($_GET['subMode']=='soutien'){
		addSimpleInput('Date du premier contact :', 'date','DatePremierContact');
		?>
		<label>Date du premier contact approximation :</label>
    	<input class="form-control" type="text" name="DatePremierContactApx"/>
		<?php
		selectInput('Type d\'accompagnement :','typeSoutien','IDTypeSoutien','IDTypeSoutien','TypeSoutien');
		?>
		<label>Intermediaire :</label>
		<div class="form-control">
			<label class="radio-inline">
				<input name="Intermediaire" value="1" type="radio">
				Oui
			</label> 
			<label class="radio-inline">
				<input name="Intermediaire" value="0" type="radio">
				Non
			</label>
			<label class="radio-inline">
				<input name="Intermediaire" value="" checked="checked" type="radio">
				Inconnu
			</label>
		</div>
		<?php
		addSimpleInput('Identification Soutien :', 'number','IDSoutien');
		?>
		<input type="hidden"  name="TypeLien"  value="soutien">
		<?php
	}
	

	?>

	 </br>
	    <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Valider </button>
	    <button class="btn btn-warning" type="reset"><span class="glyphicon glyphicon-repeat"></span> Reset </button>

<?php
}
?>

</form>