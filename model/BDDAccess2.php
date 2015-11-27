<?php
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
?>