<?php
include("../controler/inputForForm.php");

function readPopUp($colonne1,$colonne2,$rep,$attribut1,$attribut2){
    ?>
    <table class="rowTitle tabRead scrollable">
    <tr><th><?php echo $colonne1 ?></th><th><?php echo $colonne2 ?></th></tr> 
    <?php
    while($donnees = $rep->fetch()){
    ?>	
    	<tr>
	    	<td><?php echo $donnees[$attribut1] ?></td>
			<td><?php echo $donnees[$attribut2] ?></td>
		</tr>
    <?php
    }	
    ?>
	</table>
	<?php
}

function caseFunction($hiddenValue,$inputPrint,$inputName){
	?>
	<input type="hidden"  name="modeWrite"  value=<?php echo '\''.$hiddenValue.'\''; ?>>
	<?php echo $inputPrint; ?>
    <input type="text" name=<?php echo '\''.$inputName.'\''; ?> required/>
    </br>
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
	    	<input type="hidden" name="modeWrite" value="localisation">
	    	<fieldset>
			<legend><b>Nouvelle Localisation :</b></legend>
			<?php
            addLinkedDataEntry(readAllTable('pays'),'Pays : ','IDPays','IDPays','Pays',True);
            addLinkedDataEntry(readAllTable('ville'),'Ville : ','IDVille','IDVille','Ville',True);
            ?>
            Adresse :</br>  
            <input type="text" name="Adresse">
            </br>Code Postal :</br>
            <input type="text" name="CodePostal">
	    	</fieldset>
	    	
	    	<table class="rowTitle tabRead">
	    		<tr><th>ID</th><th>Pays</th><th>Ville</th><th>Adresse</th><th>Code Postal</th></tr> 
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
	    	</fieldset>
	    	<?php
	    	break;


	    case "source":
	    ?>
	    	<input type="hidden"  name="modeWrite"  value="source">
	    	<fieldset>
	    	<legend><b>Nouvelle Source :</b></legend>
	    	Nom cote :
		    </br><input type="text" name="NomCote" required/></br>
		    Nature :
		    </br><?php selectNatureCote('NatureCote'); ?></br>
		    Date :
		    </br><input type="date" name="DateCote" title="aaaa-mm-dd"/></br>
			Informations non exploitées :
			</br><input type="textarea" name="InfoCote"/></br>

			<?php
			$rep = readAllTable('cote');
			?>

	        <table class="rowTitle tabRead">
	        	<tr><th>ID</th><th>Cote</th><th>Nature</th><th>Date</th><th>Informations non exploitées</th></tr> 
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
	    	</fieldset>
			<?php	
			break;

		case "ville":
	    	?><fieldset>
	    	<legend><b>Nouvelle Ville :</b></legend><?php
	        caseFunction('ville','','Ville');
	        $rep = readAllTable('ville');
			readPopUp('ID','Ville',$rep,'IDVille','Ville');
			?></fieldset><?php
	        break;

	    case "pays":
	    	?><fieldset>
	    	<legend><b>Nouveau Pays :</b></legend><?php
	        caseFunction('pays','','Pays');
	        $rep = readPays($bdd);
			readPopUp('ID','Pays',$rep,'IDPays','Pays');
			?></fieldset><?php
	        break;

	    case "nationalite":
	    	?><fieldset>
	    	<legend><b>Nouvelle Nationalité :</b></legend><?php
	        caseFunction('nationalite','',"Nationalite");
	        $rep = readNationalite($bdd);
	        readPopUp('ID','Nationalite',$rep,'IDNationalite','Nationalite');
			?></fieldset><?php	        
	        break;

       case "langue":
	    	?><fieldset>
	    	<legend><b>Nouvelle Langue :</b></legend><?php
	        caseFunction('langue','','Langue');
	        $rep = readLangue($bdd);
	       	readPopUp('ID','Langue',$rep,'IDLangue','Langue');
			?></fieldset><?php	       	
	        break;

       case "alias":
	    	?><fieldset>
	    	<legend><b>Nouvel Alias :</b></legend><?php       
	        caseFunction('alias','','Alias');
	        $rep = readAlias($bdd);
	        readPopUp('ID','Alias',$rep,'IDAlias','Alias');
			?></fieldset><?php	        
	        break;;
       
       case "telephone":
	    	?><fieldset>
	    	<legend><b>Nouveau Téléphone :</b></legend><?php       
	        caseFunction('telephone','','Telephone');
	        $rep = readTelephone($bdd);
	        readPopUp('ID','Téléphone',$rep,'IDTelephone','NumTelephone');
			?></fieldset><?php	        
	        break;

	  	case "profession":
	  		?><fieldset>
	    	<legend><b>Nouvelle Profession:</b></legend><?php       
	        caseFunction('profession','','Profession');
	        $rep = readAllTable('profession');
	        readPopUp('ID','Profession',$rep,'IDProfession','Profession');
			?></fieldset><?php	        
	        break;


       default:
	        echo "Aucun mode sélectionné";
	        break;

	}
	?>
	</br>
	<input type="submit" value="Valider" />
		<input type="reset" value="Reset" />
		</form>
	<?php
}
?>