<?php
//Ouverture de la base de données
try
{
    //$bdd = new PDO('mysql:host=localhost;dbname=TETRUM;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$bdd = new PDO('mysql:host=localhost;dbname=TETRUM;charset=utf8', 'root', '',
		array(PDO::ATTR_PERSISTENT => true));
}
catch (PDOException $e)
{

	echo 'Hi, ça plante ici : '.$e->getMessage();
    //die('Erreur : ' . $e->getMessage());

}
?>