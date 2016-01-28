<!-- ADD GEO LINK -->


<form method="post" action="../model/writeBDDGeoLink.php">
	<input type='hidden' name='formMode' value=<?php echo '"'.$formMode.'"';?>>
	<?php
	if(isset($formMode) AND $formMode == 'mod'){
		echo '<b>Déplacement '.$IDGeoMode.' :</b></br>';
		echo 'Quels sources voulez vous dé-attribuer ?</br>';
		$rep = readGeoToCoteAssociation($IDGeoMode);
		/*
		?>
		<pre>
        <?php print_r($rep); ?>
        </pre>
		<?php
		*/
		checkBoxToDelRep($rep,'IDCote','NomCote');
		?>
		<input type='hidden' name='IDGeo' value=<?php echo '"'.$IDGeoMode.'"';?>>
		<?php
	}
	else{
	//echo 'Relation concernée :';
	selectIDGeo('Voyage Concerné :','IDGeo'); 
	addLinkedDataEntryWithoutEmptyOption(readAllTable('cote'),'Cote à ajouter :','IDCote','IDCote','NomCote',True);
	}
	?>
	</br>
	</br>
    


    <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Valider </button>
</form>