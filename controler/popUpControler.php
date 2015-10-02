<?php
include("../controler/inputForForm.php");



function caseFunction($hiddenValue,$inputPrint,$inputName){
	?>
	<input type="hidden"  name="modeWrite"  value=<?php echo '\''.$hiddenValue.'\''; ?>>
	<?php echo $inputPrint; ?>
    <input type="text" name=<?php echo '\''.$inputName.'\''; ?> required/>
    <?php
}


if(isset($_GET['mode']))
{
	include("../model/readBDD.php");
	?>
	<form method="post" action="../model/writeBDDBackground.php"> 
	<?php
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
						<legend><b>Nouvelle Localisation :</b></legend>
						<?php
			            addLinkedDataEntry(readAllTable('pays'),'Pays : ','IDPays','IDPays','Pays',True);
			            ?></br><?php
			            addLinkedDataEntry(readAllTable('ville'),'Ville : ','IDVille','IDVille','Ville',True);
			            ?>
			        	</br>
			            <label>Adresse :</label> 
			            <input class="form-control" type="text" name="Adresse"></br>
			            <label>Code Postal :</label>
			            <input class="form-control" type="text" name="CodePostal">
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
			    	<table class="table table-bordered table-striped">
			    		<tr class="info"><th>ID</th><th>Pays</th><th>Ville</th><th>Adresse</th><th>Code Postal</th></tr> 
			    	<?php
			    	$rep = readLocalisation();
			    	while($donnees = $rep->fetch()){
			    		?>
			    		<tr>
			    			<td><?php echo $donnees['IDLocalisation'] ?></td>
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
				    	<legend><b>Nouvelle Source :</b></legend>
				    	<label>Nom cote :</label>
					    <input class="form-control" type="text" name="NomCote" required/>
					    </br><label>Nature :</label>
					    <?php selectNatureCote('NatureCote'); ?>
					    </br><label>Date :</label>
					    <input class="form-control" type="date" name="DateCote" title="aaaa-mm-dd"/>
						</br><label>Informations non exploitées :</label>
						<input class="form-control" type="textarea" name="InfoCote"/>
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
			$rep = readAllTable('cote');
			?>
	    		<div class="col-lg-9">
			        <table class="rowTitle tabRead table table-bordered table-striped ">
			        	<tr class="info"><th>ID</th><th>Cote</th><th>Nature</th><th>Date</th><th>Informations non exploitées</th></tr> 
			        <?php
			        while($donnees = $rep->fetch()){
			        ?>	
			        	<tr>
			        	<td><?php echo $donnees['IDCote'] ?></td>
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

		case "ville":
	    	?><fieldset>
	    	<legend><b>Nouvelle Ville :</b></legend><?php
	        caseFunction('ville','','Ville');
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAllTable('ville');
			showTabBin('ID','Ville',$rep,'IDVille','Ville');
			?></fieldset><?php
	        break;

	    case "pays":
	    	?><fieldset>
	    	<legend><b>Nouveau Pays :</b></legend><?php
	        caseFunction('pays','','Pays');
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readPays($bdd);
			showTabBin('ID','Pays',$rep,'IDPays','Pays');
			?></fieldset><?php
	        break;

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

       case "langue":
	    	?><fieldset>
	    	<legend><b>Nouvelle Langue :</b></legend><?php
	        caseFunction('langue','','Langue');
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readLangue($bdd);
	       	showTabBin('ID','Langue',$rep,'IDLangue','Langue');
			?></fieldset><?php	       	
	        break;

       case "alias":
	    	?><fieldset>
	    	<legend><b>Nouvel Alias :</b></legend><?php       
	        caseFunction('alias','','Alias');
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAlias($bdd);
	        showTabBin('ID','Alias',$rep,'IDAlias','Alias');
			?></fieldset><?php	        
	        break;;
       
       case "telephone":
	    	?><fieldset>
	    	<legend><b>Nouveau Téléphone :</b></legend><?php       
	        caseFunction('telephone','','Telephone');
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readTelephone($bdd);
	        showTabBin('ID','Téléphone',$rep,'IDTelephone','NumTelephone');
			?></fieldset><?php	        
	        break;

	  	case "profession":
	  		?><fieldset>
	    	<legend><b>Nouvelle Profession:</b></legend><?php       
	        caseFunction('profession','','Profession');
	        ?><input type="submit" value="Valider" />
			</br></br><?php
	        $rep = readAllTable('profession');
	        showTabBin('ID','Profession',$rep,'IDProfession','Profession');
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