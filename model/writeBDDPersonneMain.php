<?php

include("../model/writeBDDFather.php");

/*
	echo $_POST["Prenom"] . '</br>';
	echo $_POST["Nom"] . '</br>';
	echo $_POST["Sexe"] . '</br>';
	echo $_POST["DateNaissance"] . '</br>';
	echo $_POST["ProfessionAvantMigration"] . '</br>';
	echo $_POST["ProfessionDurantInterrogatoire"] . '</br>';
	echo $_POST["DetteInitiale"] . '</br>';
	echo $_POST["DetteRenegociee"] . '</br>';
	echo $_POST["DateDettePayee"] . '</br>';
	echo $_POST["DateEstRecrute"] . '</br>';
	echo $_POST["DateRecrute"] . '</br>';
	echo $_POST["Diplome"] . '</br>';
*/
	/*
 	?>
	<pre>
	<?php print_r($_POST); echo "------------------------<br>";?>
	</pre>
	<?php
	*/
	
if(isset($_POST['Prenom']) AND isset($_POST['Nom']))
{
	if(isset($_POST['formMode']) AND $_POST['formMode']=='mod' AND isset($_POST['IDPersonne']))
	{
		$IDPersonne = $_POST['IDPersonne'];
		$req = $bdd->prepare('UPDATE personne SET Prenom = :Prenom, Nom = :Nom, IDDossier = :IDDossier, Sexe = :Sexe, 
		DateNaissance = :DateNaissance, IDProfessionAvantMigration = :IDProfessionAvantMigration, 
		IDProfessionDurantInterrogatoire = :IDProfessionDurantInterrogatoire, DetteInitiale = :DetteInitiale,
		DetteRenegociee = :DetteRenegociee, DateDettePayee = :DateDettePayee, DateEstRecrute = :DateEstRecrute, 
		DateRecrute = :DateRecrute, Diplome = :Diplome, IDNationalite =:IDNationalite, 
		IDVilleNaissance = :IDVilleNaissance, IDPaysNaissance = :IDPaysNaissance, SeProstitue = :SeProstitue, 
		TypePersonne = :TypePersonne, IDCoteInitiale = :IDCoteInitiale WHERE IDPersonne = '.$IDPersonne
		);
	}
	else
	{
		$req = $bdd->prepare('INSERT INTO personne(Prenom, Nom, IDDossier, Sexe, DateNaissance,
		IDProfessionAvantMigration, IDProfessionDurantInterrogatoire, DetteInitiale,
		DetteRenegociee, DateDettePayee, DateEstRecrute, DateRecrute, Diplome, IDNationalite, 
		IDVilleNaissance, IDPaysNaissance, SeProstitue, TypePersonne, IDCoteInitiale)
		VALUES (:Prenom, :Nom, :IDDossier, :Sexe, :DateNaissance, :IDProfessionAvantMigration,
		 :IDProfessionDurantInterrogatoire, :DetteInitiale, :DetteRenegociee, 
		 :DateDettePayee, :DateEstRecrute, :DateRecrute, :Diplome, :IDNationalite, :IDVilleNaissance, 
		 :IDPaysNaissance, :SeProstitue, :TypePersonne, :IDCoteInitiale
		 )');
	}


	if($_POST["DetteInitiale"]=="")
		$_POST["DetteInitiale"]=NULL;
	if($_POST["DetteRenegociee"]=="")
		$_POST["DetteRenegociee"]=NULL;

	if($_POST["Nationalite"]=="")
		$_POST["Nationalite"]=NULL;
	if($_POST["SeProstitue"]=="")
		$_POST["SeProstitue"]=NULL;
	if($_POST["VilleNaissance"]=="")
		$_POST["VilleNaissance"]=NULL;
	if($_POST["PaysNaissance"]=="")
		$_POST["PaysNaissance"]=NULL;
	if($_POST["ProfessionAvantMigration"]=="")
		$_POST["ProfessionAvantMigration"]=NULL;
	if($_POST["ProfessionDurantInterrogatoire"]=="")
		$_POST["ProfessionDurantInterrogatoire"]=NULL;

	if($_POST["DateNaissance"]=="" OR $_POST["DateNaissance"]=='aaaa-mm-jj')
		$_POST["DateNaissance"]=NULL;
	if($_POST["DateDettePayee"]=="" OR $_POST["DateDettePayee"]=='aaaa-mm-jj')
		$_POST["DateDettePayee"]=NULL;
	if($_POST["DateEstRecrute"]=="" OR $_POST["DateEstRecrute"]=='aaaa-mm-jj')
		$_POST["DateEstRecrute"]=NULL;
	if($_POST["DateRecrute"]=="" OR $_POST["DateRecrute"]=='aaaa-mm-jj')
		$_POST["DateRecrute"]=NULL;

	$req->execute(array(
		'Prenom' => $_POST["Prenom"],
		'Nom' => $_POST["Nom"],
		'IDDossier' => $_POST["IDDossier"],
		'Sexe' => $_POST["Sexe"],
		'DateNaissance' => testDate($_POST["DateNaissance"]),
		'IDProfessionAvantMigration' => $_POST["ProfessionAvantMigration"],
		'IDProfessionDurantInterrogatoire' => $_POST["ProfessionDurantInterrogatoire"],
		'DetteInitiale' => testNumber($_POST["DetteInitiale"]),
		'DetteRenegociee' => testNumber($_POST["DetteRenegociee"]), 
		'DateDettePayee' => testDate($_POST["DateDettePayee"]),
		'DateEstRecrute' => testDate($_POST["DateEstRecrute"]),
		'DateRecrute' => testDate($_POST["DateRecrute"]),
		'Diplome' => $_POST["Diplome"],
		'IDNationalite' => $_POST["Nationalite"],
		'IDVilleNaissance' => $_POST["VilleNaissance"],
		'IDPaysNaissance' => $_POST["PaysNaissance"],
		'SeProstitue' => $_POST["SeProstitue"],
		'TypePersonne' => $_POST["TypePersonne"],
		'IDCoteInitiale'=>$_POST["IDCoteInitiale"]
		));

/*
if(isset($_POST['Nationalite'])
{
	$bdd->exec('INSERT INTO personne(Nationalite) VALUES '. $_POST['Nationalite']);
}
if(isset($_POST['VilleNaissance'])
{
	$bdd->exec('INSERT INTO personne(Nationalite) VALUES '. $_POST['VilleNaissance']);
}
if(isset($_POST['PaysNaissance'])
{
	$bdd->exec('INSERT INTO personne(Nationalite) VALUES '. $_POST['PaysNaissance']);
}
*/

//TODOTODOTODOTODOTODOTODOTODOTODOTODOTODOTODOTODOTODOTODOTODOTODOTODOTODOTODOTODOTODOTODOTODOTODOTODOTODOTODOTODOTODO

/*
	if($_POST["Nationalite"] != '')
		$req->execute(array('IDNationalite' => $_POST["Nationalite"]));
	if($_POST["VilleNaissance"] != '')
		$req->execute(array('IDVilleNaissance' => $_POST["VilleNaissance"]));
	if($_POST["PaysNaissance"] != '')
		$req->execute(array('IDPaysNaissance' => $_POST["PaysNaissance"]));
*/
	//echo 'Base : |' . $_POST["DateDettePayee"] . "|";
	//echo '</br>Traité : ' . testDate($_POST["DateDettePayee"]);
	header('Location: ../view/index.php?modeRead=main&modeWrite=main');   
}
/*
$valDate = "2012/11/30";
echo testDate($valDate) . '</br>';
$valDate = "31/12/1998";
echo testDate($valDate);
*/
?>