<?php
/**
*Gère les requêtes d'écriture, de modification et de suppression relatives aux déplacements.
*/
/**
*
*/

include("../model/writeBDDFather.php");

if(isset($_POST['delete']) AND isset($_POST['IDGeo']) AND $_POST['delete']==1){
				$req = $bdd->exec('DELETE FROM geo WHERE IDGeo = '.$_POST['IDGeo']);
}
else{
	if(isset($_POST['formMode']) AND $_POST['formMode']=='mod'){
		$req = $bdd->prepare('UPDATE geo SET IDPersonne = :IDPersonne, IDLocalisationDepart = :IDLocalisationDepart,
		IDLocalisationArrivee = :IDLocalisationArrivee, Date = :Date, Identifiant = :Identifiant,
		CauseDeplacement = :CauseDeplacement, ModeTransport = :ModeTransport WHERE IDGeo = '.$_POST['IDGeo']);
	}
	else{
		$req = $bdd->prepare('INSERT INTO geo (IDPersonne, IDLocalisationDepart, 
		IDLocalisationArrivee, Date, Identifiant, CauseDeplacement, ModeTransport) 
		VALUES (:IDPersonne, :IDLocalisationDepart, :IDLocalisationArrivee, :Date, :Identifiant,
		:CauseDeplacement,:ModeTransport)');
	}

	if($_POST['Date']=='')
		$_POST['Date']=NULL;
	if($_POST['Identifiant']=='')
		$_POST['Identifiant']=NULL;
	if($_POST['CauseDeplacement']=='')
		$_POST['CauseDeplacement']=NULL;
	if($_POST['ModeTransport']=='')
		$_POST['ModeTransport']=NULL;

	$req->execute(array(
		'IDPersonne' => $_POST['IDPersonne'],
		'IDLocalisationDepart' => $_POST['IDLocalisationDepart'],
		'IDLocalisationArrivee' => $_POST['IDLocalisationArrivee'],
		'Date' => $_POST['Date'],
		'Identifiant' => $_POST['Identifiant'],
		'CauseDeplacement' => $_POST['CauseDeplacement'],
		'ModeTransport' => $_POST['ModeTransport']
	));
}
//$url = "../view/index.php?geoView=1&modeRead=main&modeWrite=main&subMode=";
header('Location: ../view/index.php?geoView=1&modeRead=main&modeWrite=main');


?>