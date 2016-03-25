<?php

if($formMode=='mod'){
	?>
    
    <?php
	switch($modeRead){
		case 'financier':
			$tmpWhere = 'IDLienFinancier = '.$IDRelationMode;
			$donneesLien = readAllTableWhere('lienFinancier',$tmpWhere)->fetch();
			break;
		case 'sang':
			$tmpWhere = 'IDLienSang = '.$IDRelationMode;
			$donneesLien = readAllTableWhere('lienSang',$tmpWhere)->fetch();
			break;
		case 'sexuel':
			$tmpWhere = 'IDLienSexuel = '.$IDRelationMode;
			$donneesLien = readAllTableWhere('lienSexuel',$tmpWhere)->fetch();
			break;
		case 'connaissance':
			$tmpWhere = 'IDLienConnaissance = '.$IDRelationMode;
			$donneesLien = readAllTableWhere('lienConnaissance',$tmpWhere)->fetch();
			break;
		case 'soutien':
			$tmpWhere = 'IDLienSoutien = '.$IDRelationMode;
			$donneesLien = readAllTableWhere('lienSoutien',$tmpWhere)->fetch();
			break;
		case 'juju':
			$tmpWhere = 'IDLienJuju = '.$IDRelationMode;
			$donneesLien = readAllTableWhere('lienJuju',$tmpWhere)->fetch();
			break;
		case 'réseau':
			$tmpWhere = 'IDLienReseau = '.$IDRelationMode;
			$donneesLien = readAllTableWhere('lienReseau',$tmpWhere)->fetch();
			break;
	}
	$donneesRelation = readAllTableWhere('relation','IDRelation = '.$donneesLien['IDRelation'])->fetch();
	?>
	
	<?php
	/*?>
	<pre>
	<?php //print_r($donneesRelation); ?>
	</pre>
	<?php
	*/
}
else{
	$donneesRelation = NULL;
	$donneesLien = NULL;
}



?>

<form id="formAddModDel" method="post" action="../model/writeBDDRelationMain.php">
	<input type='hidden' name='IDLien' value=<?php echo '"'.$IDRelationMode.'"';?>>
    <input type='hidden' name='formMode' value=<?php echo '"'.$formMode.'"';?>>    
    <input type='hidden' name='IDOldRelation' value=<?php echo '"'.$donneesRelation['IDRelation'].'"';?>> 
    <!--<input type='hidden' name='IDRelationMode' value=<?php echo '"'.$IDRelationMode.'"';?> > -->       
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
	selectIDPersonne('Ego :','IDEgo',$donneesRelation['IDEgo']);
	selectIDPersonne('Alter :','IDAlter',$donneesRelation['IDAlter']);
	//addLinkedDataEntry(readAllTable('cote'),'Cote initiale :','IDCoteInitiale','IDCote','NomCote',true);
	?>
	<label>Trace du lien dans le dossier :</label>
	<select class="form-control" type='text' name='TraceLienDossier'>
		<option value='avéré (admin)' <?php if($formMode){if($donneesRelation['TraceLienDossier']=='avéré (admin)') echo ' selected';}?>>Avéré (admin)</option>
		<option value='téléphonique' <?php if($formMode){if($donneesRelation['TraceLienDossier']=='téléphonique') echo ' selected';}?>>Téléphonique</option>
		<option value='déclaratif' <?php if($formMode){if($donneesRelation['TraceLienDossier']=='déclaratif') echo ' selected';}?>>Déclaratif</option>
		<option value='sms' <?php if($formMode){if($donneesRelation['TraceLienDossier']=='sms') echo ' selected';}?>>SMS</option>
		<option value='internet' <?php if($formMode){if($donneesRelation['TraceLienDossier']=='internet') echo ' selected';}?>>Internet</option>
		<option value='visuel' <?php if($formMode){if($donneesRelation['TraceLienDossier']=='visuel') echo ' selected';}?>>Visuel</option>
		<option value='autre' <?php if($formMode){if($donneesRelation['TraceLienDossier']=='autre') echo ' selected';}?>>Autre</option>
		<option value='inconnu' <?php if($formMode){if($donneesRelation['TraceLienDossier']=='inconnu') echo ' selected';}?>>Inconnu</option>
	</select>

	<?php

	addLinkedDataEntry(readAllTable('contexteSocioGeo'),'Contexte Socio/Géo :','IDContexteSocioGeo','IDContexteSocioGeo','ContexteSocioGeo',True,$donneesRelation['IDContexteSocioGeo']);

	?>


	<?php
	//-------------------- FINANCIER --------------------
	if($_GET['subMode']=='financier'){
		addLinkedDataEntry(readAllTable('actionEnContrepartie'),'Action en contrepartie :','IDActionEnContrepartie','IDActionEnContrepartie','ActionEnContrepartie',True, $donneesLien['IDActionEnContrepartie']);
		addSimpleInput('Date du flux :', 'date','DateFlux', $donneesLien['DateFlux']);
    	addSimpleInput('Date du flux approximation :','text','DateFluxApx',$donneesLien['DateFluxApx']);
		//addSimpleInput('Fréquence :', 'number','Frequence');
		selectInput('Fréquence :','frequenceFluxFinancier','IDFrequence','IDFrequence','Frequence',true,true,$donneesLien['IDFrequence']);
		addSimpleInput('Montant en euro :', 'number','MontantEuro',$donneesLien['MontantEuro']);
		selectInput('Modalité 1 :','modalite','IDModalite','IDModalite','Modalite', true, true,$donneesLien['IDModalite']);
		selectIDPersonneWithEmptyOption('Intermédiaire 1 :','IDIntermediaire',$donneesLien['IDIntermediaire']);
		selectInput('Modalité 2 :','modalite','IDModalite2','IDModalite','Modalite', true, true, $donneesLien['IDModalite2']);
		selectIDPersonneWithEmptyOption('Intermédiaire 2 :','IDIntermediaire2',$donneesLien['IDIntermediaire2']);
		selectLocalisation('Localisation Alter :','IDLocalisationAlter',$donneesLien['IDLocalisationAlter']);
		selectLocalisation('Localisation Ego :','IDLocalisationEgo',$donneesLien['IDLocalisationEgo']);
		?>
		<label>Intermediaire :</label>
		<div class="form-control">
			<label class="radio-inline">
				<input name="Intermediaire" value="1" checked="checked" type="radio"
				<?php if($formMode = 'mod'){if($donneesLien['Intermediaire']==1) echo ' checked';}?>
				>
				Oui
			</label> 
			<label class="radio-inline">
				<input name="Intermediaire" value="0" type="radio"
				<?php if($formMode = 'mod'){if($donneesLien['Intermediaire']==0) echo ' checked';}?>
				>
				Non
			</label>
		</div>
		<?php
		addSimpleInput('Action du flux :', 'text','ActionDuFlux',$donneesLien['ActionDuFlux']);
		$maxID = checkMaxID('IDFlux','lienFinancier');
		addSimpleInput('Identification du flux :', 'number','IdentificationFlux',$donneesLien['IDFlux']);
		echo 'Nt: ID maximum actuel : '.$maxID.'</br>';
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
			<option value="fratrie" <?php if($formMode=='mod'){if($donneesLien['Type']=='fratrie') echo ' selected';}?>>Fratrie</option>
			<option value="parent" <?php if($formMode=='mod'){if($donneesLien['Type']=='parent') echo ' selected';}?>>Parent</option>
			<option value="enfant" <?php if($formMode=='mod'){if($donneesLien['Type']=='enfant') echo ' selected';}?>>Enfant</option>
			<option value="oncle/tante" <?php if($formMode=='mod'){if($donneesLien['Type']=='oncle/tante') echo ' selected';}?>>Oncle/Tante</option>
			<option value="grands parents" <?php if($formMode=='mod'){if($donneesLien['Type']=='grands parents') echo ' selected';}?>>Grands Parents</option>
			<option value="demi-fratrie" <?php if($formMode=='mod'){if($donneesLien['Type']=='demi-fratrie') echo ' selected';}?>>Demi-Fratrie</option>
			<option value="cousin(e)" <?php if($formMode=='mod'){if($donneesLien['Type']=='cousin(e)') echo ' selected';}?>>Cousin(e)</option>
			<option value="autre" <?php if($formMode=='mod'){if($donneesLien['Type']=='autre') echo ' selected';}?>>Autre</option>
		</select>
		<label>Certification :</label>
		<select class="form-control" type='text' name="Certification">
			<option value="avéré" <?php if($formMode=='mod'){if($donneesLien['Certification']=='avéré') echo ' selected';}?>>Avéré</option>
			<option value="prétendu" <?php if($formMode=='mod'){if($donneesLien['Certification']=='prétendu') echo ' selected';}?>>Prétendu</option>
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
				<input name="Prostitution" value="1" type="radio"
				<?php if($formMode == 'mod'){if($donneesLien['Prostitution']==1) echo ' checked';}?>
				>
				Oui
			</label> 
			<label class="radio-inline">
				<input name="Prostitution" value="0" type="radio"
				<?php if($formMode == 'mod'){if($donneesLien['Prostitution']==0) echo ' checked';}?>
				>
				Non
			</label>
			<label class="radio-inline">
				<input name="Prostitution" value="" <?php if($formMode != 'mod') echo ' checked ';?> type="radio"
				<?php if($formMode == 'mod'){if($donneesLien['Prostitution']==NULL) echo ' checked';}?>
				>
				Inconnu
			</label>
		</div>
		<label>Viol :</label>
		<div class="form-control">
			<label class="radio-inline">
				<input name="Viol" value="1" type="radio"
				<?php if($formMode == 'mod'){if($donneesLien['Viol']==1) echo ' checked';}?>
				>
				Oui
			</label> 
			<label class="radio-inline">
				<input name="Viol" value="0" type="radio"
				<?php if($formMode == 'mod'){if($donneesLien['Viol']==0) echo ' checked';}?>
				>
				Non
			</label>
			<label class="radio-inline">
				<input name="Viol" value="" <?php if($formMode != 'mod') echo ' checked ';?> type="radio"
				<?php if($formMode == 'mod'){if($donneesLien['Viol']==NULL) echo ' checked';}?>
				>
				Inconnu
			</label>
		</div>
		<label>En Couple :</label>
		<div class="form-control">
			<label class="radio-inline">
				<input name="EnCouple" value="1" type="radio"
				<?php if($formMode == 'mod'){if($donneesLien['EnCouple']==1) echo ' checked';}?>
				>
				Oui
			</label> 
			<label class="radio-inline">
				<input name="EnCouple" value="0" type="radio"
				<?php if($formMode == 'mod'){if($donneesLien['EnCouple']==0) echo ' checked';}?>
				>
				Non
			</label>
			<label class="radio-inline">
				<input name="EnCouple" value="" <?php if($formMode != 'mod') echo 'checked ';?> type="radio"
				<?php if($formMode == 'mod'){if($donneesLien['EnCouple']==NULL) echo ' checked';}?>
				>
				Inconnu
			</label>
		</div>
		<?php
		addSimpleInput('Date du début :', 'date','DateDebut', $donneesLien['DateDebut']);
		addSimpleInput('Date de fin :', 'date','DateFin',$donneesLien['DateFin']);
		addSimpleInput('Date Aproximation :','text','DateApx',$donneesLien['DateApx']);
		?>
		<label>Type du lien sexuel :</label>
		<select class="form-control" type='text' name='TypeLienSexuel'>
			<option value="Mari" <?php if($formMode=='mod'){if($donneesLien['TypeLienSexuel']=='Mari') echo ' selected';}?>>Mari</option>
			<option value="Concubin" <?php if($formMode=='mod'){if($donneesLien['TypeLienSexuel']=='Concubin') echo ' selected';}?>>Concubin</option>
			<option value="Amant" <?php if($formMode=='mod'){if($donneesLien['TypeLienSexuel']=='Amant') echo ' selected';}?>>Amant</option>
			<option value="Petit-Ami" <?php if($formMode=='mod'){if($donneesLien['TypeLienSexuel']=='Petit-Ami') echo ' selected';}?>>Petit-Ami</option>
			<option value="Autre" <?php if($formMode=='mod'){if($donneesLien['TypeLienSexuel']=='Autre') echo ' selected';}?>>Autre</option>
		</select>
		<input type="hidden"  name="TypeLien"  value="sexuel">
		<?
	}

	//-------------------- RESEAU --------------------
	if($_GET['subMode']=='réseau'){
		selectInput('Action du réseau :','actionReseau','IDActionReseau','IDActionReseau','ActionReseau',true,true,$donneesLien['IDActionReseau']);
		addSimpleInput('Date Identification :', 'date','DateIdentification',$donneesLien['DateIdentification']);
		addSimpleInput('Date Identification approximation :','text','DateIdentificationApx',$donneesLien['DateIdentificationApx']);
		selectLocalisation('Localisation Ego :','IDLocalisationEgo',$donneesLien['IDLocalisationEgo']);
		selectLocalisation('Localisation Alter :','IDLocalisationAlter',$donneesLien['IDLocalisationAlter']);
		?>
		<label>Intermediaire :</label>
		<div class="form-control">
			<label class="radio-inline">
				<input name="Intermediaire" value="1" checked="checked" type="radio"
				<?php if($formMode == 'mod'){if($donneesLien['Intermediaire']==1) echo ' checked';}?>
				>
				Oui
			</label> 
			<label class="radio-inline">
				<input name="Intermediaire" value="0" type="radio"
				<?php if($formMode == 'mod'){if($donneesLien['Intermediaire']==0) echo ' checked';}?>
				>
				Non
			</label>
		</div>
		<?php
		addSimpleInput('Note sur l\'action du réseau :', 'text','NoteAction',$donneesLien['NoteAction']);
		$maxID = checkMaxID('IDReseau','lienReseau');
		addSimpleInput('Identification Réseau :', 'number','IDReseau',$donneesLien['IDReseau']);
		echo 'Nt: ID maximum actuel : '.$maxID.'</br>';
		?>
		<input type="hidden"  name="TypeLien"  value="réseau">
		<?php
	}

	//-------------------- CONNAISSANCE --------------------
	if($_GET['subMode']=='connaissance'){
		addSimpleInput('Premier évènement :', 'date','PremierEvenement',$donneesLien['PremierEvenement']);
		selectLocalisation('Localisation Ego :','IDLocalisationEgo',$donneesLien['IDLocalisationEgo']);
		selectLocalisation('Localisation Alter :','IDLocalisationAlter',$donneesLien['IDLocalisationAlter']);
		?>
		
		<label>Contact direct :</label>
    	<div class="form-control">
	        <label class="radio-inline">
	            <input name="ContactDirect" value="0" type="radio" 
	            <?php if($formMode = 'mod'){if($donneesLien['ContactDirect']==0) echo ' checked';}?>
	            >
	            Non
	        </label> 
	        <label class="radio-inline">
	            <input name="ContactDirect" value="1" type="radio"
	            <?php if($formMode = 'mod'){if($donneesLien['ContactDirect']==1) echo ' checked';}?>
	            >
	            Oui
	        </label> 
	            <label class="radio-inline">
	            <input name="ContactDirect" value="NC" type="radio"
	            <?php if($formMode = 'mod'){if($donneesLien['ContactDirect']=='NC') echo ' checked';}?>
	            >
	            NC
	        </label> 
	        <label class="radio-inline">
	            <input name="ContactDirect" value="" type="radio"
	            <?php if($formMode = 'mod'){if($donneesLien['ContactDirect']=='') echo ' checked';}?>
	            >
	            Inconnu
	        </label> 
    	</div>

		<label>Lien Orienté :</label>
    	<div class="form-control">
	        <label class="radio-inline">
	            <input name="LienOriente" value="0" type="radio" 
	            <?php if($formMode = 'mod'){if($donneesLien['LienOriente']==0) echo ' checked';}?>
	            >
	            Non
	        </label> 
	        <label class="radio-inline">
	            <input name="LienOriente" value="1" type="radio"
	            <?php if($formMode = 'mod'){if($donneesLien['LienOriente']==1) echo ' checked';}?>
	            >
	            Oui
	        </label> 
	            <label class="radio-inline">
	            <input name="LienOriente" value="NC" type="radio"
	            <?php if($formMode = 'mod'){if($donneesLien['LienOriente']=='NC') echo ' checked';}?>
	            >
	            NC
	        </label> 
	        <label class="radio-inline">
	            <input name="LienOriente" value="" type="radio"
	            <?php if($formMode = 'mod'){if($donneesLien['LienOriente']=='') echo ' checked';}?>
	            >
	            Inconnu
	        </label> 
    	</div>

		<input type="hidden"  name="TypeLien"  value="connaissance">
		<?php
	}

	//-------------------- JUJU -------------------- 
	if($_GET['subMode']=='juju'){
		addSimpleInput('Date :', 'date','Date',$donneesLien['Date']);
		selectLocalisation('Localisation de la cérémonie :','IDLocalisationCeremonie',$donneesLien['IDLocalisationCeremonie']);
		selectInput('Fonction Alter :','fonctionJuju','IDFonctionAlterJuju','IDFonctionJuju','FonctionJuju',true,true,$donneesLien['IDFonctionAlterJuju']);
		selectInput('Fonction Ego :','fonctionJuju','IDFonctionEgoJuju','IDFonctionJuju','FonctionJuju',true,true,$donneesLien['IDFonctionEgoJuju']);
		$maxID = checkMaxID('IDJuju','lienJuju');
		addSimpleInput('Identification Juju :', 'number','IDJuju',$donneesLien['IDJuju']);
		echo 'Nt: ID maximum actuel : '.$maxID.'</br>';
		?>
		<input type="hidden"  name="TypeLien"  value="juju">
		<?php
	}

	//------------------------- SOUTIEN --------------------
	if($_GET['subMode']=='soutien'){
		addSimpleInput('Date du premier contact :', 'date','DatePremierContact',$donneesLien['DatePremierContact']);
		addSimpleInput('Date du premier contact approximation :','text','DatePremierContactApx',$donneesLien['DatePremierContactApx']);
		selectInput('Type d\'accompagnement :','typeSoutien','IDTypeSoutien','IDTypeSoutien','TypeSoutien',true,true,$donneesLien['IDTypeSoutien']);
		?>
		<label>Intermediaire :</label>
		<div class="form-control">
			<label class="radio-inline">
				<input name="Intermediaire" value="1" type="radio"
				<?php if($formMode == 'mod'){if($donneesLien['Intermediaire']==1) echo ' checked';}?>
				>
				Oui
			</label> 
			<label class="radio-inline">
				<input name="Intermediaire" value="0" type="radio"
				<?php if($formMode == 'mod'){if($donneesLien['Intermediaire']==0) echo ' checked';}?>
				>
				Non
			</label>
			<label class="radio-inline">
				<input name="Intermediaire" value="" <?php if($formMode != 'mod') echo 'checked ';?> type="radio"
				<?php if($formMode == 'mod'){if($donneesLien['Intermediaire']==NULL) echo ' checked';}?>
				>
				Inconnu
			</label>
		</div>
		<?php
		$maxID = checkMaxID('IDSoutien','lienSoutien');
		addSimpleInput('Identification Soutien :', 'number','IDSoutien',$donneesLien['IDSoutien']);
		echo 'Nt: ID maximum actuel : '.$maxID.'</br>';
		?>
		<input type="hidden"  name="TypeLien"  value="soutien">
		<?php
	}
	

	?>

	 </br>
	    <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Valider </button>
	    <button class="btn btn-warning" type="reset"><span class="glyphicon glyphicon-repeat"></span> Reset </button>
	    <?php 
    	if($formMode=='mod')
    	{
   		?>
        	<input id="deleteValue" type="hidden"  name="delete"  value="0">
        	<button class="btn btn-danger" id="deleteSubmit"/><span class="glyphicon glyphicon-remove-sign"></span> Supprimer </button> 
   		<?php
    	}
    	?>
<?php
}
?>

</form>