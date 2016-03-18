<?php
include("../controler/inputForForm.php");



function caseFunction($hiddenValue,$inputPrint,$inputName,$IDValue = NULL,$donnees = NULL){
	?>
	<input type="hidden"  name="modeWrite"  value=<?php echo '\''.$hiddenValue.'\''; ?>>
	<?php echo $inputPrint; ?>
    <input type="text" name=<?php echo '\''.$inputName.'\''; ?> required
    	<?php if($IDValue) echo 'value = "'.str_replace('"','\'',$donnees).'"';?>
    />
    <?php
}


if(isset($_GET['mode']))
{
	include("../model/readBDD.php");
	include("../model/BDDAccess.php");
	
	$IDValue = NULL;
	?>
	
	<form id="formAddModDel" method="post" action="../model/writeBDDBackground.php"> 
	<?php

	if(isset($_GET['IDValue'])){
		$IDValue = $_GET['IDValue'];
		?>
			<input type='hidden' name='IDValue' value=<?php echo '"'.$IDValue.'"';?>>
		<?php
	}

	$url = '../view/popUp.php?mode='.$_GET['mode'].'&IDValue=';
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
	    	?>
	    	<div class="row">
	    		<div class='col-lg-3'>
	    			<p>
				    	<input class="form-control" type="hidden" name="modeWrite" value="localisation">
				    	<fieldset>
						<?php
						if($IDValue){
	    					$donnees = readAllTableWhere('localisation','IDLocalisation = '.$IDValue)->fetch();
	    					echo "<legend><b>Modification Localisation :</b></legend>";
	    				}
	    				else
	    				{
	    					echo "<legend><b>Nouvelle Localisation :</b></legend>";
	    				}
	    				
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
			            	<?php if($IDValue) echo 'value = "'.str_replace('"','\'',$donnees['Adresse']).'"';?>
			            ></br>
			            <label>Code Postal :</label>
			            <input class="form-control" type="text" name="CodePostal"
			            	<?php if($IDValue) echo 'value = "'.str_replace('"','\'',$donnees['CodePostal']).'"';?>
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
	    	?>
	    	<div class="row">
	    		<div class='col-lg-3'>
			    	<p>
				    	<input class="form-control" type="hidden"  name="modeWrite"  value="source">
				    	<fieldset>
				    	
				    	<?php
				    	if($IDValue){
				    		$donnees = readAllTableWhere('cote','IDCote = '.$IDValue)->fetch();
	    					echo "<legend><b>Modification Source :</b></legend>";
	    				}
	    				else
	    				{
	    					echo "<legend><b>Nouvelle Source :</b></legend>";
	    				}
	    				?>

				    	<label>Nom cote :</label>
					    <input class="form-control" type="text" name="NomCote" required
					    	<?php if($IDValue) echo 'value = "'.str_replace('"','\'',$donnees['NomCote']).'"';?>
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
					    	<?php if($IDValue) echo 'value = "'.str_replace('"','\'',$donnees['DateCote']).'"';?>
					    />
						</br><label>Informations non exploitées :</label>
						<input class="form-control" type="textarea" name="InfoCote"
							<?php if($IDValue) echo 'value = "'.str_replace('"','\'',$donnees['InformationsNonExploitees']).'"';?>
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
			?><fieldset><?php
			if($IDValue){
	    		$donnees = readAllTableWhere('natureCote','IDNatureCote = '.$IDValue)->fetch();
	    		echo "<legend><b>Modification Nature de Cote :</b></legend>";
	    	}
	    	else{
	    		$donnees = NULL;
	    		echo "<legend><b>Nouvelle Nature de Cote :</b></legend>";
	        }
	        caseFunction('natureCote','','NatureCote',$IDValue,$donnees['NatureCote']);
	        ?><input type="submit" value="Valider"/>
			</br></br><?php
	        $rep = readAllTable('natureCote');
			showTabBin('ID','Nature de la Cote',$rep,'IDNatureCote','NatureCote',1,$url);
			?></fieldset><?php
	        break;

		case "ville":
	    	?><fieldset><?php
			if($IDValue){
	    		$donnees = readAllTableWhere('ville','IDVille = '.$IDValue)->fetch();
	    		echo "<legend><b>Modification Ville :</b></legend>";
	    	}
	    	else{
    			$donnees = NULL;
    			echo "<legend><b>Nouvelle Ville :</b></legend>";
	    	}
	        caseFunction('ville','','Ville',$IDValue,$donnees['Ville']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAllTable('ville');
			showTabBin('ID','Ville',$rep,'IDVille','Ville',1,$url);
			?></fieldset><?php
	        break;

	    case "pays":
	    	?><fieldset><?php
	    	if($IDValue)
    		{
    			$donnees = readAllTableWhere('pays','IDPays = '.$IDValue)->fetch();
	    		echo "<legend><b>Modification Pays :</b></legend>";
	    	}
	    	else{
	    		$donnees = NULL;
	        	echo "<legend><b>Nouveau Pays :</b></legend>";
	        }
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
	    	?><fieldset><?php
       		if($IDValue){
	    		$donnees = readAllTableWhere('langue','IDLangue = '.$IDValue)->fetch();
	    		echo "<legend><b>Modification Langue :</b></legend>";
	    	}
	    	else{
	    		$donnees = NULL;
	    		echo "<legend><b>Nouvelle Langue :</b></legend>";
	    	}
	        caseFunction('langue','','Langue',$IDValue,$donnees['Langue']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readLangue($bdd);
	       	showTabBin('ID','Langue',$rep,'IDLangue','Langue',1,$url);
			?></fieldset><?php	       	
	        break;

       case "alias":
	    	?><fieldset><?php
       		if($IDValue){
	    		$donnees = readAllTableWhere('alias','IDAlias = '.$IDValue)->fetch();
	    		echo "<legend><b>Modification Alias :</b></legend>";       
	    	}
	    	else{
	    		$donnees = NULL;
	    		echo "<legend><b>Nouvel Alias :</b></legend>";       
	    	}
	        caseFunction('alias','','Alias',$IDValue,$donnees['Alias']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAlias($bdd);
	        showTabBin('ID','Alias',$rep,'IDAlias','Alias',1,$url);
			?></fieldset><?php	        
	        break;;
       
       case "telephone":
	    	?><fieldset><?php
       		if($IDValue){
	    		$donnees = readAllTableWhere('telephone','IDTelephone = '.$IDValue)->fetch();
	    		echo "<legend><b>Modification Téléphone :</b></legend>";       
	    	}
	    	else{
	    		$donnees = NULL;
	    		echo "<legend><b>Nouveau Téléphone :</b></legend>";       
	    	}
	        caseFunction('telephone','','Telephone',$IDValue,$donnees['NumTelephone']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readTelephone($bdd);
	        showTabBin('ID','Téléphone',$rep,'IDTelephone','NumTelephone',1,$url);
			?></fieldset><?php	        
	        break;

	  	case "profession":
	  		?><fieldset><?php
	  		if($IDValue){
	    		$donnees = readAllTableWhere('profession','IDProfession = '.$IDValue)->fetch();
	    		echo "<legend><b>Modification Profession :</b></legend>";       
	    	}
	    	else{
	    		$donnees = NULL;
	    		echo "<legend><b>Nouvelle Profession :</b></legend>";       
	  		}
	        caseFunction('profession','','Profession',$IDValue,$donnees['Profession']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAllTable('profession');
	        showTabBin('ID','Profession',$rep,'IDProfession','Profession',1,$url);
			?></fieldset><?php	        
	        break;

	  	case "role":
	  		?><fieldset><?php
	  		if($IDValue){
	    		$donnees = readAllTableWhere('role','IDRole = '.$IDValue)->fetch();
	    		echo "<legend><b>Modification Rôle :</b></legend>";       
	    	}
	    	else{
	    		$donnees = NULL;
	    		echo "<legend><b>Nouveau Rôle :</b></legend>";       
	  		}
	        caseFunction('role','','Role',$IDValue,$donnees['Role']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAllTable('role');
	        showTabBin('ID','Rôle',$rep,'IDRole','Role',1,$url);
			?></fieldset><?php	        
	        break;
//----------------------------------------------------------------------------------------
	  	case "sociogeo":
	  		?><fieldset><?php
	  		if($IDValue)
	    	{
	    		$donnees = readAllTableWhere('contexteSocioGeo','IDContexteSocioGeo = '.$IDValue)->fetch();
	    		echo "<legend><b>Modification Contexte Socio-Géo :</b></legend></br>";       
	    	}
	    	else
	    	{
	    		$donnees = NULL;
	    		echo "<legend><b>Nouveau Contexte Socio-Géo :</b></legend></br>";       
	    	}   	
	        caseFunction('sociogeo','','ContexteSocioGeo',$IDValue,$donnees['ContexteSocioGeo']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAllTable('contexteSocioGeo');
	        showTabBin('ID','Contexte Socio/Géo',$rep,'IDContexteSocioGeo','ContexteSocioGeo',1,$url);
			?></fieldset><?php	        
	        break;

	  	case "actioncontrepartie":
	  		?><fieldset><?php
	  		if($IDValue)
	    	{
	    		$donnees = readAllTableWhere('actionEnContrepartie','IDActionEnContrepartie = '.$IDValue)->fetch();
	    		echo "<legend><b>Modification Action en Contrepartie (financier):</b></legend>";      
	    	}
	    	else
	    	{
	    		$donnees = NULL;
	    		echo "<legend><b>Nouvelle Action en Contrepartie (financier):</b></legend>";      
	    	}
	        caseFunction('actioncontrepartie','','ActionEnContrepartie',$IDValue,$donnees['ActionEnContrepartie']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAllTable('actionEnContrepartie');
	        showTabBin('ID','Action en Contrepartie',$rep,'IDActionEnContrepartie','ActionEnContrepartie',1,$url);
			?></fieldset><?php	        
	        break;

	    case "modalite":
	  		?><fieldset><?php
	    	if($IDValue)
	    	{
	    		$donnees = readAllTableWhere('modalite','IDModalite = '.$IDValue)->fetch();
	    		echo "<legend><b>Modification Modalité (financier) :</b></legend></br>";       
	    	}
	    	else
	    	{
	    		$donnees = NULL;
	    		echo "<legend><b>Nouvelle Modalité (financier) :</b></legend></br>";       
	    	}
	        caseFunction('modalite','','Modalite',$IDValue,$donnees['Modalite']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAllTable('modalite');
	        showTabBin('ID','Modalité',$rep,'IDModalite','Modalite',1,$url);
			?></fieldset><?php	        
	        break;

	    case "actionreseau":
	  		?><fieldset><?php
	    	if($IDValue)
	    	{
	    		$donnees = readAllTableWhere('actionReseau','IDActionReseau = '.$IDValue)->fetch();
	    		echo "<legend><b>Modification Action Réseau (réseau) :</b></legend></br>";       
	    	}
	    	else
	    	{
	    		$donnees = NULL;
	    		echo "<legend><b>Nouvelle Action Réseau (réseau) :</b></legend></br>";       
	    	}
	        caseFunction('actionreseau','','ActionReseau',$IDValue,$donnees['ActionReseau']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAllTable('actionReseau');
	        showTabBin('ID','Action Réseau',$rep,'IDActionReseau','ActionReseau',1,$url);
			?></fieldset><?php	        
	        break;

	    case "fonctionjuju":
	  		?><fieldset><?php
	    	if($IDValue)
	    	{
	    		$donnees = readAllTableWhere('fonctionJuju','IDFonctionJuju = '.$IDValue)->fetch();
	    		echo "<legend><b>Modification Fonction Juju (juju) :</b></legend></br>";       
	    	}
	    	else
	    	{
	    		$donnees = NULL;
	    		echo "<legend><b>Nouvelle Fonction Juju (juju) :</b></legend></br>";       
	    	}
	        caseFunction('fonctionjuju','','FonctionJuju',$IDValue,$donnees['FonctionJuju']);
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAllTable('fonctionJuju');
	        showTabBin('ID','Fonction Juju',$rep,'IDFonctionJuju','FonctionJuju',1,$url);
			?></fieldset><?php	        
	        break;

	    case "typesoutien":
	  		?><fieldset><?php
	    	if($IDValue)
	    	{
	    		$donnees = readAllTableWhere('typeSoutien','IDTypeSoutien = '.$IDValue)->fetch();
	    		echo "<legend><b>Modification Type Soutien (soutien) :</b></legend></br>";   
	    	}
	    	else
	    	{
	    		$donnees = NULL;
	    		echo "<legend><b>Nouveau Type Soutien (soutien) :</b></legend></br>";       
	    	}
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
	if(isset($_GET['IDValue'])){
	?>
		<input id="deleteValue" type="hidden"  name="delete"  value="0">
		<input id="deleteSubmit" type="button" value="Supprimer" /> 
	<?php
	} ?>	
	</form>	
	<!--
	<form method="post" action="../model/writeBDDBackground.php">
		<?php
		if(isset($_GET['IDValue'])){
			switch($_GET['mode']){
				case "localisation":
					?> <input class="form-control" type="hidden"  name="modeWrite"  value="localisation"> <?php
					break;
				case "source":
					?> <input class="form-control" type="hidden"  name="modeWrite"  value="source"> <?php
					break;
				case "natureCote":
					?> <input class="form-control" type="hidden"  name="modeWrite"  value="natureCote"> <?php
					break;
				case "ville":
					?> <input class="form-control" type="hidden"  name="modeWrite"  value="ville"> <?php
					break;
				case "pays":
					?> <input class="form-control" type="hidden"  name="modeWrite"  value="pays"> <?php
					break;
				case "langue":
					?> <input class="form-control" type="hidden"  name="modeWrite"  value="langue"> <?php
					break;
				case "alias":
					?> <input class="form-control" type="hidden"  name="modeWrite"  value="alias"> <?php
					break;
				case "telephone":
					?> <input class="form-control" type="hidden"  name="modeWrite"  value="telephone"> <?php
					break;
				case "profession":
					?> <input class="form-control" type="hidden"  name="modeWrite"  value="profession"> <?php
					break;
				case "role":
					?> <input class="form-control" type="hidden"  name="modeWrite"  value="role"> <?php
					break;	  	
				case "sociogeo":
					?> <input class="form-control" type="hidden"  name="modeWrite"  value="sociogeo"> <?php
					break;
				case "actioncontrepartie":
					?> <input class="form-control" type="hidden"  name="modeWrite"  value="actioncontrepartie"> <?php
					break;
				case "modalite":
					?> <input class="form-control" type="hidden"  name="modeWrite"  value="modalite"> <?php
					break;
				case "actionreseau":
					?> <input class="form-control" type="hidden"  name="modeWrite"  value="actionreseau"> <?php
					break;
				case "fonctionjuju":
					?> <input class="form-control" type="hidden"  name="modeWrite"  value="fonctionjuju"> <?php
					break;
				case "typesoutien":
					?> <input class="form-control" type="hidden"  name="modeWrite"  value="typesoutien"> <?php
					break;
			}
			?> 
			<input class="deleteValue" type="hidden"  name="delete"  value="1">
			<input type="submit" value="Supprimer" /> 
			<?php
		}
		?>
	</form>-->
	<?php
}
?>