<?php

$nope = NULL;

if($nope){
echo 'Welcome Hell : (2/2)</br>';
}
//------------------------------------------------------------------------------


//Ouverture de la base de données
try
{
    $bdd = new PDO('mysql:host=sequelle.labri.fr;dbname=tetrum;charset=utf8','bpinaud','b27Trans#3!',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	//$bdd = new PDO('mysql:host=localhost;dbname=TETRUM;charset=utf8', 'root', '',
	//	array(PDO::ATTR_PERSISTENT => true));
}
catch (PDOException $e)
{

	echo 'Bonjour, voilà l\'erreur à rapporter  : '.$e->getMessage();
	echo '</br>';
	echo 'NT: Une erreur survient (pour le moment) si vous indiquez une donnée déjà saisie. Assurez vous de ne pas créer de doublons.';
    //die('Erreur : ' . $e->getMessage());

}

/*
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=TETRUM;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	//$bdd = new PDO('mysql:host=localhost;dbname=TETRUM;charset=utf8', 'root', '',
	//	array(PDO::ATTR_PERSISTENT => true));
}
catch (PDOException $e)
{

	echo 'Hi, ça plante ici : '.$e->getMessage();
    //die('Erreur : ' . $e->getMessage());

}
*/


/*
foreach($tabRelation as $elementKey => $tmpRel){
	unset($tabRelation[$elementKey]);
}

?>
	<pre>
	<?php
	print_r($tabRelation);
	?>
	</pre>
	<?php
*/

//$tabTest = [[1,'croix'],[2,'carré'],[3,'triangle'],[4,'rond'],[5,'carré'],[6,'croix'],[7,'croix'],[8,'triangle']];

/*
?>
<pre>
<?php
print_r($tabTest);
?>
</pre>
<?php
*/

/*
$rel = array_shift($tabTest);
$groupTmp[] = $rel;
$rel = array_shift($tabTest);
$groupTmp[] = $rel; 

?> <pre> <?php
print_r($groupTmp);
?> </pre> <?php
*/

//------------------------------------------------------------------------------

function equalRel($rel1,$rel2){
	return 
	(
		($rel1['IDAlter'] == $rel2['IDAlter']) and
		($rel1['IDEgo'] == $rel2['IDEgo']) and
		($rel1['IDCoteInitiale'] == $rel2['IDCoteInitiale']) and			
		($rel1['TraceLienDossier'] == $rel2['TraceLienDossier']) and
		($rel1['TypeLien'] == $rel2['TypeLien']) and
		($rel1['IDContexteSocioGeo'] == $rel2['IDContexteSocioGeo'])					
	);
}

function attributionRef($bdd,$group){
	
	$refRel = $group[0];
	
	for($i=1; $i < count($group); $i++){
		$rep = $bdd->query('SELECT * FROM relationToCote WHERE IDRelation ='.$group[$i]['IDRelation']);
		$tabRtC = [];
		while($donnees = $rep->fetch()){
			$tabRtC[] = $donnees; 
		}
		//on a toutes les relationToCote pour une relation donnée du groupe

		foreach ($tabRtC as $key => $rtC) {
			$rep2 = $bdd->query('SELECT * FROM relationToCote WHERE (IDRelation = '.$refRel['IDRelation'].' AND IDCote = '.$rtC['IDCote'].')');
			$donnees = $rep2->fetch();
			if($donnees == NULL){
				$rep3 = $bdd->query('UPDATE relationToCote SET IDRelation = '.$refRel['IDRelation'].' WHERE (IDRelation = '.$rtC['IDRelation'].' AND IDCote = '.$rtC['IDCote'].')');
				
			}
		}
		//on redirige toutes les cotes vers la relation de référence sauf si elles sont déjà liée à la réf
		
		//---------- Lien Connaissance ----------
		$rep = $bdd->query('SELECT * FROM lienConnaissance WHERE IDRelation = '.$group[$i]['IDRelation']);
		$tabLien = [];
		while($donnees = $rep->fetch()){
			$tabLien[] = $donnees;
		}
		foreach ($tabLien as $key => $lien) {
			$rep2 = $bdd->query('UPDATE lienConnaissance SET IDRelation = '.$refRel['IDRelation'].' WHERE (IDRelation = '.$lien['IDRelation'].')');
		}

		//---------- Lien Financier ----------
		$rep = $bdd->query('SELECT * FROM lienFinancier WHERE IDRelation = '.$group[$i]['IDRelation']);
		$tabLien = [];
		while($donnees = $rep->fetch()){
			$tabLien[] = $donnees;
		}
		foreach ($tabLien as $key => $lien) {
			$rep2 = $bdd->query('UPDATE lienFinancier SET IDRelation = '.$refRel['IDRelation'].' WHERE (IDRelation = '.$lien['IDRelation'].')');
		}
		//---------- Lien Sang ----------
		$rep = $bdd->query('SELECT * FROM lienSang WHERE IDRelation = '.$group[$i]['IDRelation']);
		$tabLien = [];
		while($donnees = $rep->fetch()){
			$tabLien[] = $donnees;
		}
		foreach ($tabLien as $key => $lien) {
			$rep2 = $bdd->query('UPDATE lienSang SET IDRelation = '.$refRel['IDRelation'].' WHERE (IDRelation = '.$lien['IDRelation'].')');
		}
		//---------- Lien Sexuel ----------
		$rep = $bdd->query('SELECT * FROM lienSexuel WHERE IDRelation = '.$group[$i]['IDRelation']);
		$tabLien = [];
		while($donnees = $rep->fetch()){
			$tabLien[] = $donnees;
		}
		foreach ($tabLien as $key => $lien) {
			$rep2 = $bdd->query('UPDATE lienSexuel SET IDRelation = '.$refRel['IDRelation'].' WHERE (IDRelation = '.$lien['IDRelation'].')');
		}
		//---------- Lien Réseau ----------
		$rep = $bdd->query('SELECT * FROM lienReseau WHERE IDRelation = '.$group[$i]['IDRelation']);
		$tabLien = [];
		while($donnees = $rep->fetch()){
			$tabLien[] = $donnees;
		}
		foreach ($tabLien as $key => $lien) {
			$rep2 = $bdd->query('UPDATE lienReseau SET IDRelation = '.$refRel['IDRelation'].' WHERE (IDRelation = '.$lien['IDRelation'].')');
		}
		//---------- Lien Juju ----------
		$rep = $bdd->query('SELECT * FROM lienJuju WHERE IDRelation = '.$group[$i]['IDRelation']);
		$tabLien = [];
		while($donnees = $rep->fetch()){
			$tabLien[] = $donnees;
		}
		foreach ($tabLien as $key => $lien) {
			$rep2 = $bdd->query('UPDATE lienJuju SET IDRelation = '.$refRel['IDRelation'].' WHERE (IDRelation = '.$lien['IDRelation'].')');
		}
		//---------- Lien Soutien ----------
		$rep = $bdd->query('SELECT * FROM lienSoutien WHERE IDRelation = '.$group[$i]['IDRelation']);
		$tabLien = [];
		while($donnees = $rep->fetch()){
			$tabLien[] = $donnees;
		}
		foreach ($tabLien as $key => $lien) {
			$rep2 = $bdd->query('UPDATE lienSoutien SET IDRelation = '.$refRel['IDRelation'].' WHERE (IDRelation = '.$lien['IDRelation'].')');
		}

	}
}

function blackHole($bdd,$group){
	
	$saveRel = $group[0];
	unset($group[0]);

	foreach ($group as $key => $value) {
		$rep = $bdd->query('DELETE FROM relation WHERE (IDRelation = '.$value['IDRelation'].')');
	}
}

//------------------------------------------------------------------------------

if($nope){

	$rep = $bdd->query('SELECT * FROM relation');
	$tabRel = array();

	while($donnees = $rep->fetch()){ 
		$tabRel[] = $donnees;
	}

	$tabGroupRel = [];
	$tmpGroup;

	while($tabRel != NULL){
		$rel = array_shift($tabRel);
		$tmpGroup[] = $rel;
		foreach($tabRel as $key => $tmpRel){
			if(equalRel($rel,$tmpRel)){ 
				$tmpGroup[]=$tmpRel;
				unset($tabRel[$key]);
			}
		}
		$tabGroupRel[] = $tmpGroup;
		$tmpGroup = [];
	}

	foreach($tabGroupRel as $key => $group){
		attributionRef($bdd,$group);
		blackHole($bdd,$group);
	}






	//affichage ------------------------------------------------------------

	$rep = $bdd->query('SELECT * FROM relation');
	$tabRel = array();

	while($donnees = $rep->fetch()){
		$tabRel[] = $donnees;
	}

	$tabGroupRel = [];
	$tmpGroup;

	while($tabRel != NULL){
		$rel = array_shift($tabRel);
		$tmpGroup[] = $rel;
		foreach($tabRel as $key => $tmpRel){
			if(equalRel($rel,$tmpRel)){ 
				$tmpGroup[]=$tmpRel;
				unset($tabRel[$key]);
			}
		}
		$tabGroupRel[] = $tmpGroup;
		$tmpGroup = [];
	}

	?> <pre> <?php
	print_r($tabGroupRel);
	?> </pre> <?php

}

?>