<?php
//Ouverture de la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=TETRUM;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>

<?php

include("../controler/utils.php");

if(isset($_POST['Pays']))
{
	$req = $bdd->prepare('INSERT INTO pays(Pays)
	VALUES (:Pays)');
	$bdd->exec('INSERT INTO pays(Pays) VALUES($_POST["Pays"])');
	
	header('Location: ../view/popUp.php?mode=pays');   
}

?>