<?php
/**
*Gère le formulaire pour ajouter ou désattribuer des cotes à des relations.
*/
/**
*
*/
?>

<form method="post" action="../model/writeBDDRelationLink.php">
	<input type='hidden' name='formMode' value=<?php echo '"'.$formMode.'"';?>>
	<?php
	if(isset($formMode) AND $formMode == 'mod'){
		echo '<b>Relation '.$IDRelationMode.' :</b></br>';
		echo 'Quels sources voulez vous dé-attribuer ?</br>';
		$rep = readRelationAndSourceAssociationForForm($IDRelationMode);
		checkBoxToDelRep($rep,'IDCote','NomCote');

		?>
		<input type='hidden' name='IDRelation' value=<?php echo '"'.$IDRelationMode.'"';?>>
		<?php
	}
	else{
		//echo 'Relation concernée :';
		selectIDRelation('Relation concernée :','IDRelation'); 
		addLinkedDataEntryWithoutEmptyOption(readAllTable('cote'),'Cote à ajouter :','IDCote','IDCote','NomCote',True);
	} ?>
	</br>
    <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Valider </button>
</form>