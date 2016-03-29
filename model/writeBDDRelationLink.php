 <?php
/**
*Gère les requêtes d'écriture et de suppression relatives aux cotes liées aux relations.
*/
/**
*
*/

include("../model/writeBDDFather.php");

if($_POST['formMode']=='mod'){
	for($i = 0; $i < $_POST['numberElement']; $i++){
		$element = 'element'.$i;
		if(isset($_POST[$element])){
			$req = $bdd->prepare('DELETE FROM relationToCote WHERE (IDRelation = :IDRelation AND IDCote = :IDCote)');
			$req->execute(array(
				'IDRelation' => $_POST['IDRelation'],
				'IDCote' => $_POST[$element]
			));
		}
	}
}
else{
	if(isset($_POST['IDRelation']) AND isset($_POST['IDCote'])){
		$bdd->exec('INSERT INTO relationToCote (IDRelation, IDCote)
					VALUES('.$_POST['IDRelation'].','.$_POST['IDCote'].')');
	}
}

$url = 'Location: ../view/index.php?relationView=1&modeRead=main&modeWrite=link&formMode=mod&IDRelationMode='.$_POST['IDRelation'];
header($url);  