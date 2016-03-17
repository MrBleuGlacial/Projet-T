<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=TETRUM;charset=utf8', 'root', '');
	$bdd->setAttribute(PDO::ATTR_PERSISTENT, true); 
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
}
catch (PDOException $e)
{
    die('Erreur de la base de données :<br>'.$e->getMessage());
}
?>