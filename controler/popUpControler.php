<?php
include("../controler/inputForForm.php");



function caseFunction($hiddenValue,$inputPrint,$inputName,$IDValue = NULL,$donnees = NULL){
	?>
	<input type="hidden"  name="modeWrite"  value=<?php echo '\''.$hiddenValue.'\''; ?>>
	<?php echo $inputPrint; ?>
    <input type="text" name=<?php echo '\''.$inputName.'\''; ?> required
    	<?php if($IDValue) echo 'value = "'.$donnees.'"';?>
    />
    <?php
}


if(isset($_GET['mode']))
{
	include("../model/readBDD.php");
	include("../model/BDDAccess.php");
	
	$IDValue = NULL;
	?>
	
	<form method="post" action="../model/writeBDDBackground.php"> 
	<?php

	if(isset($_GET['IDValue'])){
		$IDValue = $_GET['IDValue'];
		?>
			<input type='hidden' name='IDValue' value=<?php echo '"'.$IDValue.'"';?>>
		<?php
	}

	$url = 'http://localhost/Projet-T/view/popUp.php?mode='.$_GET['mode'].'&IDValue=';
	switch ($_GET['mode']) {
	    /*
	    case "ville":
	    	?>
	    	<input type="hidden"  name="modeWrite"  value="ville">
	    	<fieldset>
	    	<legend><b>Nouvelle Ville :</b></legend>
	    	Nom de la ville :
		    </br><input type="text" name="Ville" required/></br>
		    Code postal :
		    </br><input type="number" min="0" value="0" name="CodePostal"/></br>
	        
	        <?php
	        $rep = readVille();
	        ?>

	        <table class="rowTitle tabRead">
	        	<tr><th>ID</th><th>Ville</th><th>Code Postal</th></tr> 
	        <?php
	        while($donnees = $rep->fetch()){
	        ?>	
	        	<tr>
	        	<td><?php echo $donnees['IDVille'] ?></td>
   				<td><?php echo $donnees['Ville'] ?></td>
   				<td><?php echo $donnees['CodePostal'] ?></td>
   				</tr>
	        <?php
	        }	
	        ?>
	    	</table>
	    	</fieldset>
	    	<?php
	        break;
		*/
	    case "localisation":
	    	if($IDValue)
	    		$donnees = readAllTableWhere('localisation','IDLocalisation = '.$IDValue)->fetch();
	    	?>
	    	<div class="row">
	    		<div class='col-lg-3'>
	    			<p>
				    	<input class="form-control" type="hidden" name="modeWrite" value="localisation">
				    	<fieldset>
						<legend><b>Nouvelle Localisation :</b></legend>
						<?php
						if($IDValue){
			            	addLinkedDataEntry(readAllTable('pays'),'Pays : ','IDPays','IDPays','Pays',True, $donnees['IDPays']);
			            	?></br></br><?php
			            	addLinkedDataEntry(readAllTable('ville'),'Ville : ','IDVille','IDVille','Ville',True, $donnees['IDVille']);
			            }
			            else{
			            	addLinkedDataEntry(readAllTable('pays'),'Pays : ','IDPays','IDPays','Pays',True);
			            	?></br></br><?php
			            	addLinkedDataEntry(readAllTable('ville'),'Ville : ','IDVille','IDVille','Ville',True);
			            }
			     		?>
			        	</br></br>
			            <label>Adresse :</label> 
			            <input class="form-control" type="text" name="Adresse"
			            	<?php if($IDValue) echo 'value = "'.$donnees['Adresse'].'"';?>
			            ></br>
			            <label>Code Postal :</label>
			            <input class="form-control" type="text" name="CodePostal"
			            	<?php if($IDValue) echo 'value = "'.$donnees['CodePostal'].'"';?>
			            >
				    	</fieldset>	
				    	</br>
						<div class="row">
							<div class="col-lg-12">
						<input type="submit" value="Valider" />
						<input type="reset" value="Reset" />
							</div>
						</div>
				    </p>
	    		</div>
	    		</br>
	    		<div class="col-lg-9">
			    	<table class="table readTab table-bordered table-striped">
			    		<thead>
			    		<tr class="info"><th>Numéro</th><th>ID</th><th>Pays</th><th>Ville</th><th>Adresse</th><th>Code Postal</th></tr> 
			    		</thead>
			    	<?php
			    	$i = 0;
			    	$rep = readLocalisation();
			    	while($donnees = $rep->fetch()){
			    		?>
			    		<tr>
			    			<td><?php $i++; echo $i;?></td>
			    			<td><a class="glyphicon glyphicon-wrench" href=<?php echo '"'.$url.$donnees['IDLocalisation'].'"'; ?>></a><?php echo ' '.$donnees['IDLocalisation'] ?></td>
			    			<td><?php echo $donnees['Pays'] ?></td>
			    			<td><?php echo $donnees['Ville'] ?></td>
			    			<td><?php echo $donnees['Adresse'] ?></td>
			    			<td><?php echo $donnees['CodePostal'] ?></td>
			    		</tr>
			    		<?php
			    	} ?>
			    	</table>
			    </div>
			</div>
	    	<?php
	    	break;


	    case "source":
	    	if($IDValue)
	    		$donnees = readAllTableWhere('cote','IDCote = '.$IDValue)->fetch();
	    	?>
	    	<div class="row">
	    		<div class='col-lg-3'>
			    	<p>
				    	<input class="form-control" type="hidden"  name="modeWrite"  value="source">
				    	<fieldset>
				    	<legend><b>Nouvelle Source :</b></legend>
				    	<label>Nom cote :</label>
					    <input class="form-control" type="text" name="NomCote" required
					    	<?php if($IDValue) echo 'value = "'.$donnees['NomCote'].'"';?>
					    /></br>
					    <!-- </br><label>Nature :</label> -->
					    <?php 
					    if($IDValue){
					    	addLinkedDataEntryWithoutEmptyOption(readAllTable('natureCote'),'Nature :','IDNatureCote','IDNatureCote','NatureCote',true,$donnees['IDNatureCote']); 
					    }
					    else
					    	addLinkedDataEntryWithoutEmptyOption(readAllTable('natureCote'),'Nature :','IDNatureCote','IDNatureCote','NatureCote',true); 
					    ?>
					    </br><label>Date :</label>
					    <input class="form-control" type="date" name="DateCote" title="aaaa-mm-dd"
					    	<?php if($IDValue) echo 'value = "'.$donnees['DateCote'].'"';?>
					    />
						</br><label>Informations non exploitées :</label>
						<input class="form-control" type="textarea" name="InfoCote"
							<?php if($IDValue) echo 'value = "'.$donnees['InformationsNonExploitees'].'"';?>
						/>
						</fieldset>
						</br>
						<div class="row">
							<div class="col-lg-12">
						<input type="submit" value="Valider" />
						<input type="reset" value="Reset" />
							</div>
						</div>
					</p>				
				</div>
			
			</br>
			<?php
			$rep = readSource();
			?>
	    		<div class="col-lg-9">
			        <table class="rowTitle readTab table table-bordered table-striped ">
			        	<thead>
			        	<tr class="info"><th>Numéro</th><th>ID</th><th>Cote</th><th>Nature</th><th>Date</th><th>Informations non exploitées</th></tr> 
			        	</thead>
			        <?php
			        $i = 0;
			        while($donnees = $rep->fetch()){
			        ?>	
			        	<tr>
			        	<td><?php $i++; echo $i;?></td>
			        	<td><a class="glyphicon glyphicon-wrench" href=<?php echo '"'.$url.$donnees['IDCote'].'"'; ?>></a><?php echo ' '.$donnees['IDCote'] ?></td>
		   				<td><?php echo $donnees['NomCote'] ?></td>
		   				<td><?php echo $donnees['NatureCote'] ?></td>
		   				<td><?php echo $donnees['DateCote'] ?></td>
		   				<td><?php echo $donnees['InformationsNonExploitees'] ?></td>
		   				</tr>
			        <?php
			        }	
			        ?>
			    	</table>
			    </div>
			</div>
	    	
			<?php	
			break;

		case "natureCote":
			if($IDValue)
	    		$donnees = readAllTableWhere('natureCote','IDNatureCote = '.$IDValue)->fetch();
	    	else
	    		$donnees = NULL;
			?><fieldset>
	    	<legend><b>Nouvelle Nature de Cote :</b></legend><?php
	        caseFunction('natureCote','','NatureCote',$IDValue,$donnees['NatureCote']);
	        ?><input type="submit" value="Valider"/>
			</br></br><?php
	        $rep = readAllTable('natureCote');
			showTabBin('ID','Nature de la Cote',$rep,'IDNatureCote','NatureCote',1,$url);
			?></fieldset><?php
	        break;

		case "ville":
			if($IDValue)
	    		$donnees = readAllTableWhere('ville','IDVille = '.$IDValue)->fetch();
	    	else
	    		$donnees = NULL;
	    	?><fieldset>
	    	<legend><b>Nouvelle Ville :</b></legend><?php
	        caseFunction('ville','','Ville',$IDValue,$donnees['Ville']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAllTable('ville');
			showTabBin('ID','Ville',$rep,'IDVille','Ville',1,$url);
			?></fieldset><?php
	        break;

	    case "pays":
	    	if($IDValue)
	    		$donnees = readAllTableWhere('pays','IDPays = '.$IDValue)->fetch();
	    	else
	    		$donnees = NULL;
	    	?><fieldset>
	    	<legend><b>Nouveau Pays :</b></legend><?php
	        caseFunction('pays','','Pays',$IDValue,$donnees['Pays']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readPays($bdd);
			showTabBin('ID','Pays',$rep,'IDPays','Pays',1,$url);
			?></fieldset><?php
	        break;
	    /*
	    case "nationalite":
	    	?><fieldset>
	    	<legend><b>Nouvelle Nationalité :</b></legend><?php
	        caseFunction('nationalite','',"Nationalite");
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readNationalite($bdd);
	        showTabBin('ID','Nationalite',$rep,'IDNationalite','Nationalite');
			?></fieldset><?php	        
	        break;
		*/
	        
       case "langue":
       		if($IDValue)
	    		$donnees = readAllTableWhere('langue','IDLangue = '.$IDValue)->fetch();
	    	else
	    		$donnees = NULL;
	    	?><fieldset>
	    	<legend><b>Nouvelle Langue :</b></legend><?php
	        caseFunction('langue','','Langue',$IDValue,$donnees['Langue']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readLangue($bdd);
	       	showTabBin('ID','Langue',$rep,'IDLangue','Langue',1,$url);
			?></fieldset><?php	       	
	        break;

       case "alias":
       		if($IDValue)
	    		$donnees = readAllTableWhere('alias','IDAlias = '.$IDValue)->fetch();
	    	else
	    		$donnees = NULL;
	    	?><fieldset>
	    	<legend><b>Nouvel Alias :</b></legend><?php       
	        caseFunction('alias','','Alias',$IDValue,$donnees['Alias']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAlias($bdd);
	        showTabBin('ID','Alias',$rep,'IDAlias','Alias',1,$url);
			?></fieldset><?php	        
	        break;;
       
       case "telephone":
       		if($IDValue)
	    		$donnees = readAllTableWhere('telephone','IDTelephone = '.$IDValue)->fetch();
	    	else
	    		$donnees = NULL;
	    	?><fieldset>
	    	<legend><b>Nouveau Téléphone :</b></legend><?php       
	        caseFunction('telephone','','Telephone',$IDValue,$donnees['NumTelephone']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readTelephone($bdd);
	        showTabBin('ID','Téléphone',$rep,'IDTelephone','NumTelephone',1,$url);
			?></fieldset><?php	        
	        break;

	  	case "profession":
	  		if($IDValue)
	    		$donnees = readAllTableWhere('profession','IDProfession = '.$IDValue)->fetch();
	    	else
	    		$donnees = NULL;
	  		?><fieldset>
	    	<legend><b>Nouvelle Profession :</b></legend><?php       
	        caseFunction('profession','','Profession',$IDValue,$donnees['Profession']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAllTable('profession');
	        showTabBin('ID','Profession',$rep,'IDProfession','Profession',1,$url);
			?></fieldset><?php	        
	        break;

	  	case "role":
	  		if($IDValue)
	    		$donnees = readAllTableWhere('role','IDRole = '.$IDValue)->fetch();
	    	else
	    		$donnees = NULL;
	  		?><fieldset>
	    	<legend><b>Nouveau Rôle :</b></legend><?php       
	        caseFunction('role','','Role',$IDValue,$donnees['Role']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAllTable('role');
	        showTabBin('ID','Rôle',$rep,'IDRole','Role',1,$url);
			?></fieldset><?php	        
	        break;
//----------------------------------------------------------------------------------------
	  	case "sociogeo":
	  		if($IDValue)
	    		$donnees = readAllTableWhere('contexteSocioGeo','IDContexteSocioGeo = '.$IDValue)->fetch();
	    	else
	    		$donnees = NULL;
	  		?><fieldset>
	    	<legend><b>Nouveau Contexte Socio-Géo :</b></legend></br><?php       
	        caseFunction('sociogeo','','ContexteSocioGeo',$IDValue,$donnees['ContexteSocioGeo']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAllTable('contexteSocioGeo');
	        showTabBin('ID','Contexte Socio/Géo',$rep,'IDContexteSocioGeo','ContexteSocioGeo',1,$url);
			?></fieldset><?php	        
	        break;

	  	case "actioncontrepartie":
	  		if($IDValue)
	    		$donnees = readAllTableWhere('actionEnContrepartie','IDActionEnContrepartie = '.$IDValue)->fetch();
	    	else
	    		$donnees = NULL;
	  		?><fieldset>
	    	<legend><b>Nouvelle Action en Contrepartie (financier):</b></legend><?php       
	        caseFunction('actioncontrepartie','','ActionEnContrepartie',$IDValue,$donnees['ActionEnContrepartie']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAllTable('actionEnContrepartie');
	        showTabBin('ID','Action en Contrepartie',$rep,'IDActionEnContrepartie','ActionEnContrepartie',1,$url);
			?></fieldset><?php	        
	        break;

	    case "modalite":
	    	if($IDValue)
	    		$donnees = readAllTableWhere('modalite','IDModalite = '.$IDValue)->fetch();
	    	else
	    		$donnees = NULL;
	  		?><fieldset>
	    	<legend><b>Nouvelle Modalité (financier) :</b></legend></br><?php       
	        caseFunction('modalite','','Modalite',$IDValue,$donnees['Modalite']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAllTable('modalite');
	        showTabBin('ID','Modalité',$rep,'IDModalite','Modalite',1,$url);
			?></fieldset><?php	        
	        break;

	    case "actionreseau":
	    	if($IDValue)
	    		$donnees = readAllTableWhere('actionReseau','IDActionReseau = '.$IDValue)->fetch();
	    	else
	    		$donnees = NULL;
	  		?><fieldset>
	    	<legend><b>Nouvelle Action Réseau (réseau) :</b></legend></br><?php       
	        caseFunction('actionreseau','','ActionReseau',$IDValue,$donnees['ActionReseau']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAllTable('actionReseau');
	        showTabBin('ID','Action Réseau',$rep,'IDActionReseau','ActionReseau',1,$url);
			?></fieldset><?php	        
	        break;

	    case "fonctionjuju":
	    	if($IDValue)
	    		$donnees = readAllTableWhere('fonctionJuju','IDFonctionJuju = '.$IDValue)->fetch();
	    	else
	    		$donnees = NULL;
	  		?><fieldset>
	    	<legend><b>Nouvelle Fonction Juju (juju) :</b></legend></br><?php       
	        caseFunction('fonctionjuju','','FonctionJuju',$IDValue,$donnees['FonctionJuju']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAllTable('fonctionJuju');
	        showTabBin('ID','Fonction Juju',$rep,'IDFonctionJuju','FonctionJuju',1,$url);
			?></fieldset><?php	        
	        break;

	    case "typesoutien":
	    	if($IDValue)
	    		$donnees = readAllTableWhere('typeSoutien','IDTypeSoutien = '.$IDValue)->fetch();
	    	else
	    		$donnees = NULL;
	  		?><fieldset>
	    	<legend><b>Nouveau Type Soutien (soutien) :</b></legend></br><?php       
	        caseFunction('typesoutien','','TypeSoutien',$IDValue,$donnees['TypeSoutien']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAllTable('typeSoutien');
	        showTabBin('ID','Type Soutien',$rep,'IDTypeSoutien','TypeSoutien',1,$url);
			?></fieldset><?php	        
	        break;

       default:
	        echo "Aucun mode sélectionné";
	        break;

	}
	?>
	</form>	
	<?php
}
?>