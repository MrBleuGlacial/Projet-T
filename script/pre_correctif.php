<?php


$nope = NULL;

if($nope){
	echo 'Welcome Hell : (1/2)</br>';
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

	function relationToCoteAllocation($bdd,$rel){
		if($rel['IDCoteInitiale'] != NULL){
			$rep = $bdd->query('SELECT * FROM relationToCote WHERE (IDRelation = '.$rel['IDRelation'].' AND IDCote = '.$rel['IDCoteInitiale'].')');
			$donnees = $rep->fetch();
			if($donnees == NULL){
				$rep = $bdd->prepare('INSERT INTO relationToCote(IDRelation,IDCote) VALUES (:IDRelation, :IDCote)');
				$rep->execute(array('IDRelation' => $rel['IDRelation'],'IDCote' => $rel['IDCoteInitiale']));
			}
			$rep2 = $bdd->prepare('UPDATE relation SET IDCoteInitiale = NULL WHERE IDRelation = :IDRelation');
			$rep2->execute(array('IDRelation' => $rel['IDRelation']));
		}
	}

if($nope){
	$rep = $bdd->query('SELECT * FROM relation');
	$tabRel = array();

	while($donnees = $rep->fetch()){ 
		$tabRel[] = $donnees;
	}

	foreach ($tabRel as $key => $rel) {
		relationToCoteAllocation($bdd,$rel);
	}

	echo '--- ended ---';
}
?>