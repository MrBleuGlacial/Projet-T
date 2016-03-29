<?php
/**
*Script utilisé lors de la rectification des données des relations. A ne pas utiliser à nouveau.
*/
/**
*
*/
/*try
{
	$bdd = new PDO('mysql:host=localhost;dbname=TETRUM;charset=utf8', 'root', '');
	$bdd->setAttribute(PDO::ATTR_PERSISTENT, true); 
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
}
catch (PDOException $e)
{
    die('Erreur de la base de données :<br>'.$e->getMessage());
}
/*
//---------------------------------------------------------------------------------------
$IDOldRelation = 1960;
$IDNewRelation = 1958;

$testRtC = $bdd->query('SELECT * FROM relationToCote WHERE IDRelation = '.$IDOldRelation);
$testStackRtC = array();

while($donneesRtC = $testRtC->fetch()){
	array_push($testStackRtC,[$donneesRtC['IDRelation'],$donneesRtC['IDCote']]);
}

//?><pre><?php print_r($testStackRtC); ?></pre><?php

$cmptCote = 0;
foreach($testStackRtC as $tabIDRelationIDCote) {
	echo 'IDRel : '.$tabIDRelationIDCote[0].' & IDCote : '.$tabIDRelationIDCote[1].'<br>';
	$tmp = $bdd->query('SELECT * FROM relationToCote WHERE (IDRelation = '.$IDNewRelation.' AND IDCote ='.$tabIDRelationIDCote[1].')')->fetch();
	if($tmp){echo 'True <br>'; $cmptCote++; }else echo 'Faux <br>';
}
echo 'Cotes en commun : '.$cmptCote;

?>*/
/*
?><pre><?php print_r($_POST); ?></pre>