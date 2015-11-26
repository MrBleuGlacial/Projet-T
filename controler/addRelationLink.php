
<form method="post" action="../model/writeBDDRelationLink.php">
	<?php

	//echo 'Relation concernée :';
	selectIDRelation('Relation concernée :','IDRelation'); 
	addLinkedDataEntryWithoutEmptyOption(readAllTable('cote'),'Cote à ajouter :','IDCote','IDCote','NomCote',True);
	?>
</br>
    <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Valider </button>
</form>