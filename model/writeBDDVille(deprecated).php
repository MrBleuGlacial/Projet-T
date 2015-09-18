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

/*
	echo $_POST["Ville"] . '</br>';
	echo $_POST["CodePostal"] . '</br>';
*/

include("../controler/utils.php");


if(isset($_POST['Ville']) AND isset($_POST['CodePostal']))
{
	$req = $bdd->prepare('INSERT INTO ville(Ville,CodePostal)
	VALUES (:Ville, :CodePostal)');

	$req->execute(array(
		'Ville' => $_POST["Ville"],
		'CodePostal' => $_POST["CodePostal"],
		));
	//echo 'Base : |' . $_POST["DateDettePayee"] . "|";
	//echo '</br>Traité : ' . testDate($_POST["DateDettePayee"]);
	header('Location: ../view/popUp.php?mode=ville');   
	//http://localhost/tetrum/view/popUp.php&mode=ville (X)
	//http://localhost/tetrum/view/popUp.php?mode=ville (V)
}
/*
$valDate = "2012/11/30";
echo testDate($valDate) . '</br>';
$valDate = "31/12/1998";
echo testDate($valDate);
*/
?>