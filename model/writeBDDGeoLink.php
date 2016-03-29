<?php
/**
*Gère les requêtes d'écriture et de suppression relatives aux cotes liées aux déplacements.
*/
/**
*
*/

include("../model/writeBDDFather.php");


if($_POST['formMode']=='mod'){
	for($i = 0; $i < $_POST['numberElement']; $i++){
		$element = 'element'.$i;
		if(isset($_POST[$element])){
			$req = $bdd->prepare('DELETE FROM geoToCote WHERE (IDGeo = :IDGeo AND IDCote = :IDCote)');
			$req->execute(array(
				'IDGeo' => $_POST['IDGeo'],
				'IDCote' => $_POST[$element]
			));
		}
	}
}
else{
	if(isset($_POST['IDGeo']) AND isset($_POST['IDCote'])){
		$bdd->exec('INSERT INTO geoToCote (IDGeo, IDCote)
					VALUES('.$_POST['IDGeo'].','.$_POST['IDCote'].')');
	}
}

header('Location: ../view/index.php?geoView=1&modeRead=main&modeWrite=link&formMode=mod&IDGeoMode='.$_POST['IDGeo']);
