<?php

include("../model/writeBDDFather.php");

/*
function writeBDDVille($bdd){
	if(isset($_POST['Ville']) AND isset($_POST['CodePostal']))
	{
		$req = $bdd->prepare('INSERT INTO ville(Ville,CodePostal)
		VALUES (:Ville, :CodePostal)');

		$req->execute(array(
			'Ville' => $_POST["Ville"],
			'CodePostal' => $_POST["CodePostal"]
			));
		
		header('Location: ../view/popUp.php?mode=ville');   
	}
}
*/
function writeBDDSource($bdd){
	if(isset($_POST['NomCote']) AND isset($_POST['IDNatureCote']) AND isset($_POST['DateCote']) AND isset($_POST['InfoCote']))
	{
		$req = $bdd->prepare('INSERT INTO cote(NomCote, IDNatureCote, DateCote, InformationsNonExploitees)
		VALUES (:NomCote, :IDNatureCote, :DateCote, :InformationsNonExploitees)');

		$req->execute(array(
			'NomCote' => $_POST["NomCote"],
			'IDNatureCote' => $_POST["IDNatureCote"],
			'DateCote' => $_POST["DateCote"],
			'InformationsNonExploitees' => $_POST["InfoCote"]
			));
		
		header('Location: ../view/popUp.php?mode=source'); 
	}
	/*
	else
		?>
	<pre><?php
		print_r($_POST);
	?></pre><?php	

		echo "Kaput"; 
	*/
}


function writeBDDBackground($bdd,$postvalue,$tableValue,$insertValue,$url){
	if(isset($postvalue))
	{
		$req = $bdd->prepare('INSERT INTO '.$tableValue.'('.$insertValue.') VALUES (:Value)');
		$req->execute(array('Value'=>$postvalue));
		header($url);   
	}
}

if(isset($_POST['modeWrite']))
{
	switch ($_POST['modeWrite']){
		case "source":
			writeBDDSource($bdd);
			break;
		case "localisation":
			writeBDDLocalisation($bdd);
			break;
		case "natureCote":
			writeBDDBackground($bdd,$_POST['NatureCote'],'natureCote','NatureCote','Location: ../view/popUp.php?mode=natureCote');
			break;
		case "ville":
			writeBDDBackground($bdd,$_POST['Ville'],'ville','Ville','Location: ../view/popUp.php?mode=ville');
			break;
		case 'pays':
			writeBDDBackground($bdd,$_POST['Pays'],'pays','Pays','Location: ../view/popUp.php?mode=pays');
			break;
		case 'nationalite':
			writeBDDBackground($bdd,$_POST['Nationalite'],'nationalite','Nationalite','Location: ../view/popUp.php?mode=nationalite');
			break;
		case 'langue':
			writeBDDBackground($bdd,$_POST['Langue'],'langue','Langue','Location: ../view/popUp.php?mode=langue');
			break;
		case 'alias':
			writeBDDBackground($bdd,$_POST['Alias'],'alias','Alias','Location: ../view/popUp.php?mode=alias');
			break;
		case 'telephone':
			writeBDDBackground($bdd,$_POST['Telephone'],'telephone','NumTelephone','Location: ../view/popUp.php?mode=telephone');
			break;
		case 'profession':
			writeBDDBackground($bdd,$_POST['Profession'],'profession','Profession','Location: ../view/popUp.php?mode=profession');
			break;
		//------------------------------------------------------------------------------------------------
		case 'sociogeo':
			writeBDDBackground($bdd,$_POST['ContexteSocioGeo'],'contexteSocioGeo','ContexteSocioGeo','Location: ../view/popUp.php?mode=sociogeo');
			break;
		case 'actioncontrepartie':
			writeBDDBackground($bdd,$_POST['ActionEnContrepartie'],'actionEnContrepartie','ActionEnContrepartie','Location: ../view/popUp.php?mode=actioncontrepartie');
			break;
		case 'modalite':
			writeBDDBackground($bdd,$_POST['Modalite'],'modalite','Modalite','Location: ../view/popUp.php?mode=modalite');
			break;
		case 'actionreseau':
			writeBDDBackground($bdd,$_POST['ActionReseau'],'actionReseau','ActionReseau','Location: ../view/popUp.php?mode=actionreseau');
			break;
		case 'fonctionjuju':
			writeBDDBackground($bdd,$_POST['FonctionJuju'],'fonctionJuju','FonctionJuju','Location: ../view/popUp.php?mode=fonctionjuju');
			break;
		case 'typesoutien':
			writeBDDBackground($bdd,$_POST['TypeSoutien'],'typeSoutien','TypeSoutien','Location: ../view/popUp.php?mode=typesoutien');
			break;
	}
}

/*

function writeBDDTelephone($bdd){
	if(isset($_POST['Telephone']))
		{
			$req = $bdd->prepare('INSERT INTO telephone(NumTelephone) VALUES (:Telephone)');
			$req->execute(array('Telephone'=>$_POST['Telephone']));
			//$bdd->exec('INSERT INTO pays(Pays) VALUES(\''.$_POST['Pays'].'\')');
			
			header('Location: ../view/popUp.php?mode=telephone');   
		}
}
function writeBDDAlias($bdd){
	if(isset($_POST['Alias']))
		{
			$req = $bdd->prepare('INSERT INTO alias(Alias) VALUES (:Alias)');
			$req->execute(array('Alias'=>$_POST['Alias']));
			//$bdd->exec('INSERT INTO pays(Pays) VALUES(\''.$_POST['Pays'].'\')');
			
			header('Location: ../view/popUp.php?mode=alias');   
		}
}
function writeBDDLangue($bdd){
	if(isset($_POST['Langue']))
		{
			$req = $bdd->prepare('INSERT INTO langue(Langue) VALUES (:Langue)');
			$req->execute(array('Langue'=>$_POST['Langue']));
			//$bdd->exec('INSERT INTO pays(Pays) VALUES(\''.$_POST['Pays'].'\')');
			
			header('Location: ../view/popUp.php?mode=langue');   
		}
}
function writeBDDNationalite($bdd){
	if(isset($_POST['Nationalite']))
		{
			$req = $bdd->prepare('INSERT INTO nationalite(Nationalite) VALUES (:Nationalite)');
			$req->execute(array('Nationalite'=>$_POST['Nationalite']));
			//$bdd->exec('INSERT INTO pays(Pays) VALUES(\''.$_POST['Pays'].'\')');
			
			header('Location: ../view/popUp.php?mode=nationalite');   
		}
}

*/

?>